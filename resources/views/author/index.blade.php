@extends('layouts.default')

@section('title','Authors')

@section('content')
	
	<div class="page-header">
		@if (!Auth::guest())
			<a href="{{ url('/authors/create') }}" class="btn btn-primary pull-right">
				<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Author
			</a>
		@endif

		<h1>Authors <small>{{ $authors->count() }}</small></h1>
	</div>

	@foreach ($authors as $author)
		<div class="row box">
			<div class="col-md-8">
				<div>
					<h4>{{ $author->name }}</h4>
				</div>
			</div>
			<div class="col-md-4">
				<div class="pull-right">
					@if (!Auth::guest())
						<a href="{{ url('/authors/show', [ 'author' => $author->id ]) }}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a href="{{ url('/authors/edit', [ 'author' => $author->id ]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-danger">
							<i class="fa fa-trash" aria-hidden="true"></i>
							<form method="post" action="{{ url('/authors/delete', [ 'author' => $author->id ])}}">
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