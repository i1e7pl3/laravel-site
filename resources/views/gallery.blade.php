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

        @auth
            @can('update', $article)
                <p class="news-show__admin">
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn--secondary">Редактировать новость</a>
                </p>
            @endcan

            <section class="comments" aria-labelledby="comments-heading">
                <h2 id="comments-heading" class="comments__title">Комментарии</h2>

                @if($article->comments->isEmpty())
                    <p class="comments__empty">Пока нет комментариев.</p>
                @else
                    <ul class="comments__list">
                        @foreach($article->comments as $comment)
                            <li class="comments__item">
                                <div class="comments__meta">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <span class="comments__date">{{ $comment->created_at->format('d.m.Y H:i') }}</span>
                                </div>
                                <p class="comments__body">{{ $comment->body }}</p>
                                @can('delete', $comment)
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--danger btn--small">Удалить</button>
                                    </form>
                                @endcan
                            </li>
                        @endforeach
                    </ul>
                @endif

                @can('create', App\Models\Comment::class)
                    <form action="{{ route('articles.comments.store', $article) }}" method="POST" class="comments__form">
                        @csrf
                        <label for="comment-body" class="comments__label">Ваш комментарий</label>
                        <textarea id="comment-body" name="body" rows="4" class="comments__textarea" required>{{ old('body') }}</textarea>
                        @error('body')
                            <p class="comments__error">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn--primary">Отправить</button>
                    </form>
                @endcan
            </section>
        @endauth

        @guest
            <p class="news-show__hint"><a href="{{ route('login.form') }}">Войдите</a>, чтобы оставить комментарий.</p>
        @endguest

        <a href="{{ route('main') }}" class="btn btn--secondary">Назад</a>
    </div>
@endsection
