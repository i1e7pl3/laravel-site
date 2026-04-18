@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <h1 class="form-title">Добавить новость</h1>

    @if($errors->any())
        <div class="error-box">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label" for="title">Заголовок</label>
            <input class="form-input" type="text" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label class="form-label" for="content">Текст</label>
            <textarea class="form-textarea" id="content" name="content">{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Картинка</label>
            <input class="form-input" type="text" id="image" name="image" value="{{ old('image') }}">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Отмена</a>
        </div>
    </form>
</div>
@endsection