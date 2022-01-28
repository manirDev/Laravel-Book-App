<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
//book index blade
    public function index(){
        $books = Book::paginate(5);
        return view('book.index', compact('books'));
    }
//book create view
    public function create(){
        return view('book.create');
    }
//store book
    public function store(BookStoreRequest $request){
        $image = $request->file('image')->store('public/product');
        Book::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'category'=>$request->category,
            'image'=>$image
        ]);
        return back()->with('message', 'New book added');
    }
//edit book
    public function edit($id){
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }
    public function update(UpdateBookRequest $request, $id){
        $book = Book::find($id);
        if ($request->hasFile('image')){
            $image = $request->file('image')->store('public/product');
            $book->name = $request->input('name');
            $book->description = $request->input('description');
            $book->category = $request->input('category');
            $book->image = $image;
            $book->save();
        }else{
            $book->name = $request->input('name');
            $book->description = $request->input('description');
            $book->category = $request->input('category');
            $book->save();
        }

        return redirect()->route('book.index')->with('message', 'Book updated');
    }
    public function destroy($id){
        $book = Book::find($id);
        $book->delete();
        return back()->with('message', 'Book deleted');
    }
}
