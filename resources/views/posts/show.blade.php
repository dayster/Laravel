@extends('layouts.master')

@section('content')
<div class="blog-post">
<h2 class="blog-post-title">{{ $post->title }}</h2>
<p class="blog-post-meta">{{ $post->created_at->ToFormattedDateString() }} by <a href="#">Mark</a></p>

<p>{{ $post->body }}
</p>
</div><!-- /.blog-post -->
<form action="/posts/{{ $post->id }}" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<button class="btn btn-danger">Delete</button>	
	</div>
</form>
<ul class="list-group">
	@foreach($post->comments as $post)
	<li class="list-group-item">{{ $post->created_at->diffForHumans() }}{{  $post->body }}</li>
	@endforeach
</ul>
<form method="post" action="/posts/{{ $post->id }}">

	{{ csrf_field() }}

	<div class="form-group">
		<label>Body</label>
		<textarea class="form-control" id="body" name="body" rows="3"></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Add Comment</button>
	</div>

	@if(count($errors))
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{  $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif
</form>

@endsection