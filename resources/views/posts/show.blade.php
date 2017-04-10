@extends('main')

@section('title', '| show')

@section('content')
  <div class="row">
  	<div class="col-xs-8">
  		<div class="well">
  			<h3>{{ $post->title }}</h3>
  			<h4>{{ $post->desc }}</h4>
  			<article>{{ $post->content }}</article>
  		</div>
  	</div>
  	<div class="col-xs-4">
  		<div class="well">
  			<dl class="dl-horizontal">
  				<dt>创建于:</dt>
  				<dd>{{ date('Y年n月j日', strtotime($post->created_at)) }}</dd>
  			</dl>
  			<dl class="dl-horizontal">
  				<dt>上次更新于:</dt>
  				<dd>{{ date('Y年n月j日', strtotime($post->updated_at)) }}</dd>
  			</dl>
  			<hr>
  			<div class="row">
  				<div class="col-xs-6">
  					<a class="btn btn-primary btn-block" href="/posts/{{ $post->id }}/edit">编辑</a>
  				</div>
  				<div class="col-xs-6">
  					<form method="post" action="/posts/{{ $post->id }}">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
  						<input class="btn btn-danger btn-block" type="submit" value="删除">
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
@endsection