@extends('main')

@section('title', '| create blog')

@section('scripts')
	<script type="text/javascript" src="{{ mix('js/post/create.js') }}"></script>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<h2 class="text-center">创建文章</h2>
			<hr/>
			{{-- 编辑&发布公用 --}}
			@if (isset($isEdit))
				<form method="post" action="/post/{{ $post->id }}">
				<input name="_method" type="hidden" value="PUT">
			@else
				<form method="post" action="/post">
			@endif
				<div class="form-group">
					<label for="title">标题</label>
					<input id="title" class="form-control" type="text" name="title" maxlength="50" value="{{ $post->title or '' }}" placeholder="输入标题，不超过50字...">
				</div>
				<div class="form-group">
					<label for="desc">描述</label>
					<input id="desc" class="form-control" type="text" name="desc" maxlength="100" value="{{ $post->desc or '' }}" placeholder="输入描述，不超过100字...">
				</div>
				<div class="form-group">
					<label for="content">内容</label>
					<textarea id="content" class="form-control" name="content" placeholder="输入文章内容...">{{ $post->content or '' }}</textarea>
				</div>
				<div class="form-group">
					@if (isset($isEdit))
						<input class="btn btn-primary form-control" type="submit" value="保存修改">
					@else
						<input class="btn btn-primary form-control" type="submit" value="发布">
					@endif
				</div>
				<input type="hidden" name="uid" value="{{ Auth::user()->id }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>
	</div>
@endsection