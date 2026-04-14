@extends('layouts.app')

@section('content')
    <div class="news-page">
        <div class="news-page__header">
            <h1 class="news-page__title">Новости</h1>

            @auth
                <a href="{{ route('articles.create') }}" class="btn btn--primary">Добавить новость</a>
            @endauth
        </div>

        <div class="news-grid">
            @forelse($articles as $article)
                <article class="news-card">
                    @if($article->image)
                        <div class="news-card__image">
                            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}">
                        </div>
                    @endif

                    <div class="news-card__body">
                        <div class="news-card__date">
                            {{ $article->created_at->format('d.m.Y') }}
                        </div>

                        <h2 class="news-card__title">
                            <a href="{{ route('articles.show', $article) }}" class="news-card__link">
                                {{ $article->title }}
                            </a>
                        </h2>

                        <p class="news-card__text">
                            {{ \Illuminate\Support\Str::limit($article->content, 140) }}
                        </p>

                        @auth
                            <div class="news-card__actions">
                                <a href="{{ route('articles.edit', $article) }}" class="btn btn--secondary">Редактировать</a>

                                <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn--danger" onclick="return confirm('Удалить новость?')">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </article>
            @empty
                <p class="news-empty">Новостей пока нет.</p>
            @endforelse
        </div>
    </div>
@endsection