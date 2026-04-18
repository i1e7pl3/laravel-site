<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Support\Facades\File;

class MainController extends Controller
{
public function index()
{
    $items = Article::latest()->get();

    return view('main', compact('items'));
}

public function gallery($id)
{
<<<<<<< HEAD
    $item = Article::findOrFail($id);

    return view('gallery', compact('item'));
=======
    $article = Article::findOrFail($id);
    $article->load(['comments.user']);

    return view('gallery', compact('article'));
>>>>>>> d2046f5 (7 practice)
}
}