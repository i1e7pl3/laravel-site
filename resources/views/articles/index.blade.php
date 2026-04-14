@extends('layouts.app')

@section('content')
    <h1>Новости</h1>

    @foreach($articles as $article)
        <div class="article">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
            @if($article->image)
                <img src="{{ $article->image }}" alt="{{ $article->title }}" width="300">
            @endif
        </div>
    @endforeach
@endsection