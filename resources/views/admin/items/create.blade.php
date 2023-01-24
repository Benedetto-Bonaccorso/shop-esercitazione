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
            <div class="mb-3">
                <label for="categories" class="form-label">Categories</label>
                <select multiple class="form-select form-select-sm" name="categories[]" id="categories">
                    <option value="" disabled>Select a category</option>
                    @forelse ($categories as $category)
                        @if ($errors->any())
                            <option value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @empty
                        <option value="" disabled>No categories in the system</option>
                    @endforelse
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
