@extends('layouts.default')

@section('title','Welcome')

@section('content')

	<div class="jumbotron">
		<h1>Welcome</h1>
		<hr>
		<p class="lead">Bookstore es un ejemplo de un sitio web para una tienda de libros creado con PHP.</p>
		<p class="text-center">
			<a href="{{ url('/books') }}" class="btn btn-lg btn-success">
				<i class="fa fa-book" aria-hidden="true"></i> Books
			</a>
		</p>
	</div>

@endsection