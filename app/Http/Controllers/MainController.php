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
    $item = Article::findOrFail($id);

    return view('gallery', compact('item'));
}
}