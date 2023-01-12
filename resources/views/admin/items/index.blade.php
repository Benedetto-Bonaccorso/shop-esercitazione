@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="">
                    <td scope="row">{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        <div>
                            <a href="" class="btn btn-primary">Show</a>
                            <a href="" class="btn btn-secondary">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
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