@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.categories.store') }}" method="post">

        @csrf

        <label for="name">name</label>
        <input type="text" name="name" id="name">

        <button type="submit">submit</button>
        
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>actions</th>
            </tr>
        </thead>
        @foreach ($categories as $category)
            <tbody>
                <tr>
                    <td scope="row">{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="post">

                            @csrf
                            @method("put")
                    
                            <label for="name">name</label>
                            <input type="text" name="name" id="name">
                    
                            <button type="submit">edit</button>
                            
                        </form>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">

                            @csrf
                            @method("delete")
                    
                            <button type="submit">delete</button>
                            
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach

    </table>
@endsection
