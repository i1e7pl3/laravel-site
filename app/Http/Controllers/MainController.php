<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class MainController extends Controller
{
    public function index()
    {
        $path = public_path('articles.json');
        $json = File::get($path);
        $items = json_decode($json, true);

        return view('main', compact('items'));
    }

    public function gallery($id)
{
    $path = public_path('articles.json');
    $json = File::get($path);
    $items = json_decode($json, true) ?? [];

    $item = $items[$id] ?? null;

    return view('gallery', compact('item'));
}
}