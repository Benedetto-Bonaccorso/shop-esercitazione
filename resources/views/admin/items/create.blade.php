@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.items.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">title</label>
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

        <button type="submit">Submit</button>
    </form>
@endsection
