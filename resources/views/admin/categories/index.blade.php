@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between">
            <h1>Cathegories</h1>

            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf

                <div class="mb-3 d-flex gap-2">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Add new cathegory">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @foreach ($categories as $category)
                <tbody>
                    <tr>
                        <td scope="row">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex gap-2">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                                @csrf
                                @method('put')

                                <div class="mb-3 d-flex gap-2">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Edit name">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
