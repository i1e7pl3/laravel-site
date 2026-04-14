@extends('layouts.app')

@section('content')
<div class="article-container">
    <div class="article-card">
        <h1 class="article-title">{{ $article->title }}</h1>
        <p class="article-text">{{ $article->content }}</p>

        @if($article->image)
            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="article-image">
        @endif

        <div class="article-actions">
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Редактировать</a>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
</div>
@endsection