<?php

namespace App\Http\Controllers;

use App\Models\Article;

class MainController extends Controller
{
    public function index()
    {
        $items = Article::query()->latest()->paginate(6)->withQueryString();

        return view('main', compact('items'));
    }

    public function gallery($id)
    {
        $article = Article::findOrFail($id);
        $article->load(['comments.user']);

        return view('gallery', compact('article'));
    }
}