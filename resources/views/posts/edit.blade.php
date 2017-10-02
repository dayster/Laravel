@extends('layouts.master')

@section('content')
	<h1>Add New Post</h1>
	<form method="post" action="/posts/{{ $post->id }}/edit">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Title</label>
			<input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
		</div>
		<div class="form-group">
			<label>Body</label>
			<textarea class="form-control" id="body" name="body" rows="3">{{ $post->body }}</textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
	
@endsection