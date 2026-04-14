<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $path = public_path('users.json');
        $users = [];

        if (File::exists($path)) {
            $users = json_decode(File::get($path), true) ?? [];
        }

        $users[] = $validated;

        File::put($path, json_encode($users, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        return response()->json([
            'message' => 'Данные успешно сохранены',
            'data' => $validated,
        ]);
    }
}