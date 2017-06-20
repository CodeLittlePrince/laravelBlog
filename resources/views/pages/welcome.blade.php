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
              @foreach ($article->tags as $tag)
                <a href="/?keywords={{ $tag->name }}">
                  <span class="badge">{{ $tag->name }}</span>
                </a>
              @endforeach
            </div>
            <h2 class="title">{{ $article->title }}</h2>
            <h3 class="desc">{{ $article->desc }}</h3>
            <div class="content _box">{!! $article->content !!}</div>
          </div>
          <div class="readMore">
            <a href="/post/{{ $article->id }}" target="_blank">
              <button class="btn btn-primary">阅读全文</button>
            </a>
          </div>
        </div>
      @endforeach
      <div class="text-center">
        {{ $articles->links() }}
      </div>
    </div>
    <div class="col-xs-3">
      @include('pages/partials/_cardAside')
    </div>
  </div>
@endsection

{{-- This section is for loading scripts --}}
@section('scripts')
  <script type="text/javascript">
    console.log('welcome!');
  </script>
@endsection