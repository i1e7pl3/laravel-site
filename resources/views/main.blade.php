@extends('layouts.app')

@section('content')
    <div class="news-page">
        <h1 class="news-page__title">Главная страница</h1>

        @if($items->total() > 0)
            <div class="news-grid">
                @foreach($items as $item)
                    <article class="news-card">
                        <a href="{{ route('articles.show', $item) }}" class="news-card__image-link">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="news-card__image">
                        </a>

                        <div class="news-card__body">
                            <div class="news-card__date">
                                {{ $item->created_at->format('d.m.Y') }}
                            </div>

                            <h2 class="news-card__title">{{ $item->title }}</h2>

                            <p class="news-card__text">
                                {{ \Illuminate\Support\Str::limit($item->content, 120) }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>

            @if($items->hasPages())
                <nav class="news-pagination" aria-label="Страницы новостей">
                    {{ $items->links() }}
                </nav>
            @endif
        @else
            <p class="news-empty">Новостей пока нет.</p>
        @endif
    </div>
@endsection