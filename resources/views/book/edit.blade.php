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
                    Edit the Book
                </div>
                <div class="card-body">
                    <form action="{{route('book.update', ['id'=>$book->id])}}" method="post"enctype="multipart/form-data">
                        @csrf
                        <label>Name of book</label>
                        <input type="text" name="name" value="{{$book->name}}" class="form-control">
                        @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                        <br>
                        <label>Description of book</label>
                        <textarea name="description" class="form-control">{{$book->description}}</textarea>
                        @if($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                        <br>
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="">Select</option>
                            <option value="biography"  @if($book->category=='biography') selected @endif>Biography</option>
                            <option value="fictional"  @if($book->category=='fictional') selected @endif>Fictional</option>
                            <option value="comedy"  @if($book->category=='comedy') selected @endif>Comedy</option>
                            <option value="educational" @if($book->category=='educational')selected @endif>Education</option>
                        </select>
                        @if($errors->has('category'))
                            <span class="text-danger">{{$errors->first('category')}}</span>
                        @endif
                        <br>
                        <label>Name of book</label>
                        <input type="file" name="image"  class="form-control">
                        @if($book->image)
                            <img src="{{Storage::url($book->image)}}" style="height: 50px; width: 50px"/>
                        @endif
                        @if($errors->has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                        @endif
                        <br>

                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
            </div>
        </div>
@endsection
