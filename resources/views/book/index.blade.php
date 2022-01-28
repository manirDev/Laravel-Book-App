@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card mt-5">
                <div class="card-header">
                    List of all Books
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>
                                    @if($book->image)
                                        <img src="{{Storage::url($book->image)}}" style="height: 60px; width: 70px"/>
                                    @endif
                                </td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->description}}</td>
                                <td>{{$book->category}}</td>
                                <td>
                                    <a href="{{route('book.edit', ['id'=>$book->id])}}">
                                        <button class="btn btn-info"> <i class="fas fa-edit text-white"></i></button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('book.delete', ['id'=>$book->id])}}" onclick="return confirm('Delete! Are you sure?')">
                                        <button class="btn btn-danger"> <i class="fas fa-trash btn-danger"></i></button>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$books->links()}}
            </div>
        </div>
    </div>
@endsection
