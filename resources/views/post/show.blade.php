@extends('main')

@section('title', '| show')

@section('content')
  <div class="row">
  	<div class="col-xs-9">
  		<div class="_box card-detail-article">
        <div>
          <div class="time">
            <span class="updatedAt">更新于 - {{ $post->updated_at->format('Y年n月j日') }}</span>
            <span class="createdAt">创建于 - {{ $post->created_at->format('Y年n月j日') }}</span>
          </div>
          <div>
            <span class="badge">web前端</span>
            <span class="badge">web后端</span>
            <span class="badge">全栈</span>
            <span class="badge">打酱油</span>
          </div>
          <h2 class="title">{{ $post->title }}</h2>
          <h3 class="desc">{{ $post->desc }}</h3>
          <div class="content">{!! $post->content !!}</div>
        </div>
      </div>
  	</div>
  	<div class="col-xs-3">
  		<div class="well">
  			<div class="row">
  				<div class="col-xs-6">
  					<a class="btn btn-primary btn-block" href="/post/{{ $post->id }}/edit">编辑</a>
  				</div>
  				<div class="col-xs-6">
  					<form method="post" action="/post/{{ $post->id }}">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
  						<input class="btn btn-danger btn-block" type="submit" value="删除">
  					</form>
  				</div>
  			</div>
  		</div>
      <div class="_box card-index-aside">
        <form>
          <input type="text" class="form-control" placeholder="输入关键词搜索...">
        </form>
      </div>
  	</div>
  </div>
@endsection