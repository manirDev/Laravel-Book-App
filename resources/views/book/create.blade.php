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
                    Create a new Book
                </div>
                <div class="card-body">
                    <form action="{{route('book.store')}}" method="post">
                        @csrf
                        <label>Name of book</label>
                        <input type="text" name="name" placeholder="name of the book" class="form-control">
                        @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                        <br>
                        <label>Description of book</label>
                        <textarea name="description" class="form-control"></textarea>
                        @if($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                        <br>
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="">Select</option>
                            <option value="biography">Biography</option>
                            <option value="fictional">Fictional</option>
                            <option value="comedy">Comedy</option>
                            <option value="educational">Education</option>
                        </select>
                        @if($errors->has('category'))
                            <span class="text-danger">{{$errors->first('category')}}</span>
                        @endif
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


