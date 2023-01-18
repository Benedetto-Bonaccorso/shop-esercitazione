@extends('layouts.admin')

@section('content')
    <img width="200" src="{{ asset('storage/' . $item->cover_image) }}" alt="{{ $item->title }}">
    <h1>{{ $item->id }}</h1>
    <h1>{{ $item->title }}</h1>
    <h1>{{ $item->body }}</h1>
@endsection
