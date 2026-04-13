@extends('layouts.app')

@section('content')
    <h1>Контакты</h1>
    <p>Телефон: {{ $phone }}</p>
    <p>Email: {{ $email }}</p>
    <p>Адрес: {{ $address }}</p>
@endsection