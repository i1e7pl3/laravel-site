<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой сайт</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('main') }}">Главная</a>
            <a href="{{ route('about') }}">О нас</a>
            <a href="{{ route('contacts') }}">Контакты</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        ФИО, группа
    </footer>
</body>
</html>