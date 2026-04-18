<?php

namespace App\Http\Controllers;

use App\Mail\NewArticleForModeratorsMail;
use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string|max:255',
        ]);

        $article->update($validated);

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string|max:255',
        ]);

        $article = Article::create($validated);

        $moderators = User::query()
            ->whereHas('role', function ($query) {
                $query->where('slug', Role::SLUG_MODERATOR);
            })
            ->get();

        foreach ($moderators as $moderator) {
            if (! filter_var($moderator->email, FILTER_VALIDATE_EMAIL)) {
                Log::warning('Пропуск уведомления модератору: некорректный email', [
                    'article_id' => $article->id,
                    'moderator_id' => $moderator->id,
                    'moderator_email' => $moderator->email,
                ]);

                continue;
            }

            try {
                Mail::to($moderator->email)->send(new NewArticleForModeratorsMail($article));
            } catch (\Throwable $e) {
                Log::error('Почта модератору о новой статье не отправлена', [
                    'article_id' => $article->id,
                    'moderator_id' => $moderator->id,
                    'moderator_email' => $moderator->email,
                    'message' => $e->getMessage(),
                ]);
            }
        }

        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $article->load(['comments.user']);

        return view('gallery', compact('article'));
    }
}