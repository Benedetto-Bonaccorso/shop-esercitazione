@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        <form action="{{ route('admin.items.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="title">
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control" placeholder="">
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">body</label>
                <textarea class="form-control" name="body" id="body" rows="3"></textarea>
            </div>

            <p>Select item categories</p>
            @foreach ($categories as $category)
            <div class="form-check @error('categories') is-invalid @enderror">
                <label class="form-check-label">
                    <input name="categories[]" type="checkbox" value="{{ $category->id }}" class="form-check-input" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                    {{ $category->name }}
                   </label>
            </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
