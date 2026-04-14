@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <h1 class="form-title">Редактировать новость</h1>

    @if($errors->any())
        <div class="error-box">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="title">Заголовок</label>
            <input class="form-input" type="text" id="title" name="title" value="{{ old('title', $article->title) }}">
        </div>

        <div class="form-group">
            <label class="form-label" for="content">Текст</label>
            <textarea class="form-textarea" id="content" name="content">{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Картинка</label>
            <input class="form-input" type="text" id="image" name="image" value="{{ old('image', $article->image) }}">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Обновить</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Назад</a>
        </div>
    </form>
</div>
@endsection