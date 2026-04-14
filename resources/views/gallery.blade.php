@extends('layouts.app')

@section('content')
    <div class="news-show">
        
        <h1 class="news-show__title">{{ $article->title }}</h1>

        <div class="news-show__date">
            {{ $article->created_at->format('d.m.Y') }}
        </div>

        @if($article->image)
            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="news-show__image">
        @endif

        <div class="news-show__content">
            {{ $article->content }}
        </div>

        <a href="{{ route('main') }}" class="btn btn--secondary">Назад</a>
    </div>
@endsection