@extends('main')

@section('title', '| show')

@section('content')
  <div class="row">
  	<div class="col-xs-9">
  		<div class="_box card-detail-article">
        <div>
          <div class="time">
            <div class="updatedAt">
              更新于 - {{ $post->updated_at->format('Y年n月j日') }}
            </div>
            <div class="createdAt">
              创建于 - {{ $post->created_at->format('Y年n月j日') }}
            </div>
          </div>
          <div>
            @foreach ($post->tags as $tag)
              <span class="badge">{{ $tag->name }}</span>  
            @endforeach
          </div>
          <h2 class="title">{{ $post->title }}</h2>
          <div class="author">作者：<a href="/?author={{ $authorName }}">{{ $authorName }}</a></div>
          <h3 class="desc">{{ $post->desc }}</h3>
          <div class="content">{!! $post->content !!}</div>
        </div>
      </div>
  	</div>
  	<div class="col-xs-3">
      @if ($isAuthor)
        <div class="well _box">
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
      @endif
      @include('pages/partials/_cardAside')
  	</div>
  </div>
@endsection