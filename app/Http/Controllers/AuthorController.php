<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function __contruct() {

	}

    public function index() {
    	$authors = Author::orderBy('name', 'asc')->get();

    	return view('author.index')->with([ 'authors' => $authors ]);
    }

    public function create() {
    	return view('author.create');
    }

    public function store(Request $request) {
    	$this->validate($request, [
			'name' => 'required',
    	]);

    	$author = new Author;

    	$author->name = $request->get('name');

    	$author->save();

    	return redirect('/authors')->with('success', 'Author Saved');
    }

    public function show(Author $author) {
        return view('author.show')->with([ 'author' => $author ]);
    }

    public function edit(Author $author) {
        return view('author.edit')->with([ 'author' => $author ]);
    }

    public function update(Author $author, Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $author->name = $request->get('name');

        $author->save();

        return redirect('/authors')->with('success', 'Author Updated');
    }

    public function delete(Author $author) {
        $author->delete();

        return redirect('/authors')->with('success', 'Author Deleted');
    }
}
