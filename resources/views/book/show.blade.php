@extends('layouts.default')

@section('title','Books')

@section('content')
	
	<div class="page-header">
		<h1>Show Book</h1>
	</div>

	@if (!Auth::guest())
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
					<a href="{{ url('/books/edit', [ 'book' => $book->id ]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-danger">
						<i class="fa fa-trash" aria-hidden="true"></i>
						<form method="post" action="{{ url('/books/delete', [ 'book' => $book->id ])}}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
						</form>
					</a>
				</div>
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="title">Title</label>
				<p>{{ $book->title }}</p>
			</div>

			<div class="form-group">
				<label for="author">Author</label>
				<p>{{ $book->author or 'Author Not Exist' }}</p>
			</div>
			
			<div class="form-group">
				<label for="publication">Publication</label>
				<p>{{ $book->publication }}</p>
			</div>

			<div class="form-group">
				<label for="isbn">ISBN</label>
				<p>{{ $book->isbn }}</p>
			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<p>{{ $book->price }}</p>
			</div>

			<div class="form-group">
				<label for="filename">Image</label>
				<div class="box">
					@if (!empty($book->filename))
						<img src="{{ asset('images/' . $book->filename) }}" class="img-circle img-responsive" alt="image">
					@else
						<img src="{{ asset('images/image_not_available.png') }}" class="img-circle img-responsive" alt="image">
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection