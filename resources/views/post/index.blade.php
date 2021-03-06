@extends('main')

@section('title', '| 文章列表')

@section('content')
  <div class="row">
    <div class="col-xs-4">
      <h2>博客列表</h2>
    </div>
    <div class="col-xs-2 col-xs-offset-6">
      <a class="btn btn-success btn-block" href="/post/create">写文章</a>
    </div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>标题</th>
        <th>描述</th>
        <th>创建时间</th>
        <th>更新时间</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <th>{{ $post->title }}</th>
          <td>{{ $post->desc }}</td>
          <td>{{ $post->created_at }}</td>
          <td>{{ $post->updated_at }}</td>
          <td>
            <a href="/post/{{ $post->id }}" class="btn btn-info btn-sm">查看</a>
            <a href="/post/{{ $post->id }}/edit" class="btn btn-primary btn-sm">编辑</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
    {{ $posts->links() }}
  </div>
@endsection