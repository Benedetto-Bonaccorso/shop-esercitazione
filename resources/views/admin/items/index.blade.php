@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex my-3">
            <h1>Items</h1>
            <a href="{{ route('admin.items.create') }}" class="btn btn-primary ms-2">Add Item</a>
        </div>

        <div class="table-responsive">


            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr class="">
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <img width="100" src="{{ asset('storage/' . $item->cover_image) }}" alt="">
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('admin.items.show', $item->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-secondary">Edit</a>
                                    <form action="{{ route('admin.items.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row">Nothing to show</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
