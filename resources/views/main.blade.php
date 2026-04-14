@extends('layouts.app')

@section('content')
    <h1>Главная страница</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Название</th>
                <th>Превью</th>
                <th>Кратко</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['date'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <a href="{{ route('gallery', ['id' => $loop->index]) }}">
                            <img src="{{ asset($item['preview_image']) }}" alt="{{ $item['name'] }}" width="120">
                        </a>
                    </td>
                    <td>{{ $item['shortDesc'] ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection