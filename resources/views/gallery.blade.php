@extends('layouts.app')

@section('content')
    <h1>Галерея</h1>

    @if($item)
        <h2>{{ $item['title'] }}</h2>
        <img src="{{ asset($item['full_image']) }}" alt="{{ $item['title'] }}" style="max-width: 100%;">
    @else
        <p>Изображение не найдено.</p>
    @endif
@endsection