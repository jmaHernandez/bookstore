@extends('layouts.default')

@section('title','Books')

@section('content')
	
	<div class="page-header">
		<h1>Edit Author</h1>
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
			<form method="post" action="{{ url('/authors/update', [ 'author' => $author->id ]) }}">
				{{ csrf_field() }}

				{{ method_field('PUT') }}

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" id="name" name="name" class="form-control" value="{{ $author->name }}" />
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-floppy-o" aria-hidden="true"></i> Update
					</button>
				</div>
			</form>
		</div>
	</div>

@endsection