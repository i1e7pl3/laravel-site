<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $this->authorize('view', $article);
        $this->authorize('create', Comment::class);

        $validated = $request->validate([
            'body' => 'required|string|min:2|max:2000',
        ]);

        $article->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $validated['body'],
        ]);

        return redirect()
            ->route('articles.show', $article)
            ->with('status', 'Комментарий добавлен.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $article = $comment->article;
        $comment->delete();

        return redirect()
            ->route('articles.show', $article)
            ->with('status', 'Комментарий удалён.');
    }
}
