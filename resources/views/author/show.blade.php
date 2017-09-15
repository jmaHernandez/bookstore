@extends('layouts.default')

@section('title','Books')

@section('content')
	
	<div class="page-header">
		<h1>Show Author</h1>
	</div>

	@if (!Auth::guest())
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
					<a href="{{ url('/authors/edit', [ 'author' => $author->id ]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-danger">
						<i class="fa fa-trash" aria-hidden="true"></i>
						<form method="post" action="{{ url('/authors/delete', [ 'author' => $author->id ])}}">
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
				<label for="name">Name</label>
				<p>{{ $author->name }}</p>
			</div>
		</div>
	</div>

@endsection