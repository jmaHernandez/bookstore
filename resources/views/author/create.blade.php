@extends('layouts.default')

@section('title','Books')

@section('content')
	
	<div class="page-header">
		<h1>Add Author</h1>
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
			<form method="post" action="{{ url('/authors/store') }}">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" />
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-floppy-o" aria-hidden="true"></i> Save
					</button>
				</div>
			</form>
		</div>
	</div>

@endsection