<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Author;

class BookController extends Controller
{
	public function __contruct() {

	}

    public function index(Request $request) {
        $query_builder = DB::table('books');

        if ($request->has('title') && $request->get('title') != '') {
            $query_builder->where('title', 'like', '%' . $request->get('title') . '%');
        }

        if ($request->has('author') && $request->get('author') != '') {
            $query_builder->where('author', 'like', '%' . $request->get('author') . '%');
        }

        if ($request->has('price') && $request->get('price') != '') {
            if ($request->get('option') == 'lt') {
                $operator = '<';
            }

            if ($request->get('option') == 'gt') {
                $operator = '>';
            }

            $query_builder->where('price', $operator, $request->get('price'));
        }

        $books = $query_builder->orderBy('id', 'desc')->get();

    	return view('book.index')->with([ 'books' => $books ]);
    }

    public function create() {
        $authors = Author::orderBy('name', 'asc')->get();

    	return view('book.create')->with([ 'authors' => $authors ]);
    }

    public function store(Request $request) {
    	$this->validate($request, [
			'title' => 'required',
			'author' => 'required',
			'publication' => 'required',
			'isbn' => 'required|alpha_num|max:13',
			'price' => 'required|numeric',
			'filename' => 'image|mimes:jpeg,png|max:2048', 
    	]);

        if ($request->hasFile('filename')) {
            $filename = $request->file('filename')->getClientOriginalName();
            $request->file('filename')->move(public_path('/images'), $filename);
        } else {
            $filename = '';
        }

    	$book = new Book;

    	$book->title = $request->get('title');
    	$book->author = $request->get('author');
    	$book->publication = $request->get('publication');
    	$book->isbn = $request->get('isbn');
    	$book->price = $request->get('price');
    	$book->filename = $filename;

    	$book->save();

    	return redirect('/books')->with('success', 'Book Saved');
    }

    public function show(Book $book) {
        return view('book.show')->with([ 'book' => $book ]);
    }

    public function edit(Book $book) {
        $authors = Author::orderBy('name', 'asc')->get();

        return view('book.edit')->with([ 'book' => $book, 'authors' => $authors ]);
    }

    public function update(Book $book, Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'publication' => 'required',
            'price' => 'required|numeric',
            'filename' => 'image|mimes:jpeg,png|max:2048',
        ]);

        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->publication = $request->get('publication');
        $book->price = $request->get('price');

        if ($request->hasFile('filename')) {
            $filename = $request->file('filename')->getClientOriginalName();
            $request->file('filename')->move(public_path('/images'), $filename);

            $book->filename = $filename;
        }

        $book->save();

        return redirect('/books');
    }

    public function delete(Book $book) {
        $book->delete();

        return redirect('/books')->with('success', 'Book Deleted');
    }
}
