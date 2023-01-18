@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        <h1>Showing image: {{ $item->id }}</h1>
        @if ($item->cover_image)
            <img width="200" src="{{ asset('storage/' . $item->cover_image) }}" alt="{{ $item->title }}">
        @else
            <img src="https://via.placeholder.com/600x300.png?text=Cover+Image" alt="placeholder" width="300">
        @endif
    </div>
    <div><strong>Title</strong>: {{ $item->title }}</div>
    <div><strong>Body</strong>: {{ $item->body }}</div>
@endsection
