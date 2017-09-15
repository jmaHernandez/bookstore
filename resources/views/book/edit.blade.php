@extends('layouts.default')

@section('title','Books')

@section('content')
	
	<div class="page-header">
		<h1>Edit Book</h1>
	</div>

	@if (count($errors))
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="row">
		<div class="col-md-12">
			<form id="book-form" method="post" action="{{ url('/books/update', [ 'book' => $book->id ]) }}" enctype="multipart/form-data">
				{{ csrf_field() }}

				{{ method_field('PUT') }}

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}" />
				</div>

				<div class="form-group">
					<label for="author">Author</label>
					<select id="author" name="author" class="form-control">
						<option value="">Seleccione un author ...</option>
						@foreach ($authors as $author)
							@if ($book->author and $book->author == $author->name)
								<option value="{{ $author->name }}" selected="selected">{{ $author->name }}</option>
							@else
								<option value="{{ $author->name }}">{{ $author->name }}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="publication">Publication</label>
					<input type="text" id="publication" name="publication" class="form-control" value="{{ $book->publication }}" />
				</div>

				<div class="form-group">
					<label for="isbn">ISBN</label>
					<input type="text" id="isbn" name="isbn" class="form-control" value="{{ $book->isbn }}" disabled />
				</div>

				<div class="form-group">
					<label for="price">Price</label>
					<input type="text" id="price" name="price" class="form-control" value="{{ $book->price }}" />
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

				<div class="form-group">
					<label for="filename">Change Image</label>
					<input type="file" id="filename" name="filename" />
				</div>

				<div class="form-group">
					<button type="button" class="btn btn-primary update">
						<i class="fa fa-floppy-o" aria-hidden="true"></i> Update
					</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')

	<script src="{{ asset('js/book/edit.js') }}"></script>

@endsection