@extends('main')

@section('title', '| create blog')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="text-center">Create Posts</h2>
			<hr/>
			<form method="post" action="/posts">
				<div class="form-group">
					<label for="title">title</label>
					<input id="title" class="form-control" type="text" name="title" maxlength="50">
				</div>
				<div class="form-group">
					<label for="desc">description</label>
					<input id="desc" class="form-control" type="text" name="desc" maxlength="100">
				</div>
				<div class="form-group">
					<label for="content">content</label>
					<textarea id="content" class="form-control" name="content" placeholder="input article content here"></textarea>
				</div>
				<div class="form-group">
					<input class="btn btn-success form-control" type="submit" value="submit">
				</div>
				<input type="hidden" name="uid" value="1">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>
	</div>
@endsection