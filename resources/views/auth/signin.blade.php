@extends('layouts.app')

@section('content')
<div class="auth-form">
    <h1>Регистрация</h1>

    <form method="POST" action="{{ route('signin') }}">
        @csrf

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Отправить</button>
    </form>
</div>
@endsection