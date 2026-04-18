@extends('layouts.app')

@section('content')
    <div class="news-show">
        <h1 class="news-show__title">Контакты</h1>

        <p class="news-show__content">
            По вопросам, связанным с проектом или учебным заданием, можно воспользоваться контактами ниже.
            Ответ обычно в течение одного–двух рабочих дней.
        </p>

        <ul class="contacts-list">
            <li><strong>Телефон:</strong> {{ $phone }}</li>
            <li><strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></li>
            <li><strong>Адрес:</strong> {{ $address }}</li>
        </ul>
    </div>
@endsection
