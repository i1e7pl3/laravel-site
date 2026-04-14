<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel')</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page">
    <header class="header">
        <nav class="nav">
            <a href="{{ route('main') }}">Главная</a>
            <a href="{{ route('about') }}">О нас</a>
            <a href="{{ route('contacts') }}">Контакты</a>

            @auth
                <a href="{{ route('articles.index') }}">Статьи</a>

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit">Выход</button>
                </form>
                
            @endauth

            @guest
                <a href="{{ route('signin.form') }}">Регистрация</a>
                <a href="{{ route('login.form') }}">Вход</a>
            @endguest
        </nav>
    </header>

    <main class="content">
        @yield('content')
    </main>

    <footer class="footer">
        Бойченко О.А. 243-323 2026
    </footer>
</div>
</body>
</html>