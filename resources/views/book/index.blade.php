@extends('layouts.default')

@section('title','Books')

@section('content')
	
	<div class="page-header">
		@if (!Auth::guest())
			<a href="{{ url('/books/create') }}" class="btn btn-primary pull-right">
				<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Book
			</a>
		@endif

		<h1>Books <small>{{ $books->count() }}</small></h1>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="well" style="background: #3a9ff2;">
				<form id="search-form" method="get" action="{{ url('/books') }}" class="form-inline">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" id="title" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="author">Author</label>
						<input type="text" id="author" name="author" class="form-control">
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input type="text" id="price" name="price" class="form-control">
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" id="option_1" name="option" value="lt" checked="checked"> Less than
					  </label>
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" id="option_2" name="option" value="gt"> Greater than
					  </label>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-primary search">
							<i class="fa fa-search" aria-hidden="true"></i> Search
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	@foreach ($books as $book)
		<div class="row box">
			<div class="col-md-2">
				<div class="text-center">
					@if (!empty($book->filename))
						<img src="{{ asset('images/' . $book->filename) }}" class="img-circle img-responsive" alt="image">
					@else
						<img src="{{ asset('images/image_not_available.png') }}" class="img-circle img-responsive" alt="image">
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div>
					<div class="title">{{ $book->title }}</div>
					<div class="author">{{ $book->author or 'Author Not Exist' }}</div>
					<div class="price">Price: $ {{ $book->price }}</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="pull-right">
					@if (!Auth::guest())
						<a href="{{ url('/books/show', [ 'book' => $book->id ]) }}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
						<a href="{{ url('/books/edit', [ 'book' => $book->id ]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-danger">
							<i class="fa fa-trash" aria-hidden="true"></i>
							<form method="post" action="{{ url('/books/delete', [ 'book' => $book->id ])}}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
							</form>
						</a>
					@endif
				</div>
			</div>
		</div>
	@endforeach

@endsection

@section('scripts')

	<script src="{{ asset('js/book/index.js') }}"></script>

@endsection