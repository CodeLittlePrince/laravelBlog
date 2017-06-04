@extends('main')

@section('title', '| home')

{{-- This section is for loading stylesheets --}}
@section('stylesheets')
  {{-- <link rel="stylesheet" type="text/css" href="/public/css/app.css"> --}}
@endsection

@section('content')
  <div class="row">
    <div class="col-xs-9">
      @foreach ($articles as $article)
        <div class="_box card-index-article">
          <div>
            <div class="time">
              <span class="updatedAt">更新于 - {{ $article->updated_at->format('Y年n月j日') }}</span>
              <span class="createdAt">创建于 - {{ $article->created_at->format('Y年n月j日') }}</span>
            </div>
            <div>
              <span class="badge">web前端</span>
              <span class="badge">web后端</span>
              <span class="badge">全栈</span>
              <span class="badge">打酱油</span>
            </div>
            <h2 class="title">{{ $article->title }}</h2>
            <h3 class="desc">{{ $article->desc }}</h3>
            <p class="content">{{ $article->content }}</p>
          </div>
          <a href="/post/{{ $article->id }}" target="_blank"><button class="btn btn-info">阅读全文</button></a>
        </div>
      @endforeach
      <div class="text-center">
        {{ $articles->links() }}
      </div>
    </div>
    <div class="col-xs-3">
      <div class="_box card-index-aside">
        <form>
          <input type="text" class="form-control" placeholder="输入关键词搜索...">
        </form>
      </div>
    </div>
  </div>
@endsection

{{-- This section is for loading scripts --}}
@section('scripts')
  <script type="text/javascript">
    console.log('welcome!');
  </script>
@endsection