@extends('layouts.admin')

@section('content')
    <form action="{{route('admin.items.update', $item->id)}}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
          <label for="title" class="form-label">title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="title" value="{{old('title', $item->title)}}">
        </div>

        <div class="mb-3">
          <label for="body" class="form-label">body</label>
          <textarea class="form-control" name="body" id="body" rows="3"> {{old('body', $item->body)}}</textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection