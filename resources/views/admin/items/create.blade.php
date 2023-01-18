@extends('layouts.admin')

@section('content')
    <form action="{{route('admin.items.store')}}" method="post">
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="title">
        </div>

        <div class="mb-3">
          <label for="body" class="form-label">body</label>
          <textarea class="form-control" name="body" id="body" rows="3"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection