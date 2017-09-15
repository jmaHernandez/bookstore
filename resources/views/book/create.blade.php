@extends('layouts.default')

@section('title','Books')

@section('content')
	
	<div class="page-header">
		<h1>Add Book</h1>
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
			<form id="book-form" method="post" action="{{ url('/books/store') }}" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" />
				</div>

				<div class="form-group">
					<label for="author">Author</label>
					<select id="author" name="author" class="form-control">
						<option value="">Seleccione un author ...</option>
						@foreach ($authors as $author)
							@if ($author->name == old('author'))
								<option value="{{ $author->name }}" selected="selected">{{ $author->name }}</option>
							@else
								<option value="{{ $author->name }}">{{ $author->name }}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="publication">Publication</label>
					<input type="text" id="publication" name="publication" class="form-control" value="{{ old('publication') }}" />
				</div>

				<div class="form-group">
					<label for="isbn">ISBN</label>
					<input type="text" id="isbn" name="isbn" class="form-control" value="{{ old('isbn') }}" />
				</div>

				<div class="form-group">
					<label for="price">Price</label>
					<input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}" />
				</div>

				<div class="form-group">
					<label for="filename">Image</label>
					<input type="file" id="filename" name="filename" />
				</div>

				<div class="form-group">
					<button type="button" class="btn btn-primary save">
						<i class="fa fa-floppy-o" aria-hidden="true"></i> Save
					</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')

	<script src="{{ asset('js/book/create.js') }}"></script>

@endsection