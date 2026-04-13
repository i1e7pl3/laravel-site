<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function about()
    {
        return view('about');
    }

    public function contacts()
    {
        $data = [
            'phone'   => '+7 999 123-45-67',
            'email'   => 'mail@example.com',
            'address' => 'г. Москва, ул. Пример, д. 1',
        ];

        return view('contacts', $data);
    }
}