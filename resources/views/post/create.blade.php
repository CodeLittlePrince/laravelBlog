@extends('main')

@section('title', '| create blog')

@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/css/select2.min.css') }}">
	<style type="text/css">
		.select2-selection__choice {
			background-color: #009999 !important;
			border-color: #008888 !important;
			color: #fff !important;
		}
		.select2-selection__choice__remove, .select2-selection__choice__remove:hover {
			color: #fff !important;
		}
		.select2-selection--multiple {
			border-color: #ccd0d2 !important;
		}
	</style>
@endsection
@section('scripts')
	<script type="text/javascript" src="{{ mix('js/post/create.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendors/select2/js/i18n/zh-CN.js') }}"></script>
	<script type="text/javascript">
		$('input[type=button]').on('click', function(e) {
			$('form').submit();
		});
		// select2
		var tagsSelect = $('#tags').select2({
			language: 'zh-CN',
			placeholder: '填写标签',
			maximumSelectionLength: 5
		});
		var defaultTags = $('#tags').data('defaultTags');
		tagsSelect.val(defaultTags).trigger('change');
	</script>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<h2 class="text-center">创建文章</h2>
			<hr/>
			{{-- 编辑&发布公用 --}}
			@if (isset($isEdit))
				<form id="form" method="post" action="/post/{{ $post->id }}">
				<input name="_method" type="hidden" value="PUT">
			@else
				<form id="form" method="post" action="/post">
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
					<label for="tags">标签</label>
					@if (isset($post))
						<select id="tags" class="form-control" name="tags[]" multiple data-default-tags="{{ $post->tags()->allRelatedIds() }}">
							@foreach ($tags as $tag)
								<option value="{{ $tag->id }}">{{ $tag->name }}</option>
							@endforeach
						</select>
					@else
						<select id="tags" class="form-control" name="tags[]" multiple data-default-tags="[]">
							@foreach ($tags as $tag)
								<option value="{{ $tag->id }}">{{ $tag->name }}</option>
							@endforeach
						</select>
					@endif
					
				</div>
				<div class="form-group">
					<label for="content">内容</label>
					<textarea id="content" class="form-control" name="content" placeholder="输入文章内容...">{{ $post->content or '' }}</textarea>
				</div>
				<div class="form-group">
					@if (isset($isEdit))
						<input class="btn btn-primary form-control" type="button" value="保存修改">
					@else
						<input class="btn btn-primary form-control" type="button" value="发布">
					@endif
				</div>
				<input type="hidden" name="uid" value="{{ $post->uid or Auth::user()->id }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>
	</div>
@endsection