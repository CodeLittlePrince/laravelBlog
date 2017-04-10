@extends('main')

@section('title', '| create blog')

@section('content')
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<h2 class="text-center">Create Posts</h2>
			<hr/>
			{{-- 编辑&发布公用 --}}
			@if (isset($isEdit))
				<form method="post" action="/posts/{{ $post->id }}">
				<input name="_method" type="hidden" value="PUT">
			@else
				<form method="post" action="/posts">
			@endif
				<div class="form-group">
					<label for="title">title</label>
					<input id="title" class="form-control" type="text" name="title" maxlength="50" value="{{ $post->title or '' }}">
				</div>
				<div class="form-group">
					<label for="desc">description</label>
					<input id="desc" class="form-control" type="text" name="desc" maxlength="100" value="{{ $post->desc or '' }}">
				</div>
				<div class="form-group">
					<label for="content">content</label>
					<textarea id="content" class="form-control" name="content" placeholder="input article content here">{{ $post->content or '' }}</textarea>
				</div>
				<div class="form-group">
					@if (isset($isEdit))
						<input class="btn btn-success form-control" type="submit" value="保存修改">
					@else
						<input class="btn btn-success form-control" type="submit" value="发布">
					@endif
				</div>
				<input type="hidden" name="uid" value="1">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>
	</div>
@endsection