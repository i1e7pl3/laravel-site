@extends('layouts.app')

@section('content')
<div class="auth-form">
    <h1>Регистрация</h1>

    <form method="POST" action="{{ route('signin') }}">
        @csrf

        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Повтор пароля</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
@endsection