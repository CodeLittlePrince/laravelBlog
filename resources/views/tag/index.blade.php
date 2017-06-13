@extends('main')

@section('title', '| post index')

@section('content')
  <div class="row">
    <div class="col-xs-4">
      <h2>标签列表</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-8">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>标签名</th>
            <th>创建时间</th>
            <th>更新时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
            <tr>
              <th>{{ $tag->id }}</th>
              <td>{{ $tag->name }}</td>
              <td>{{ $tag->created_at->format('Y年n月j日') }}</td>
              <td>{{ $tag->updated_at->format('Y年n月j日') }}</td>
              <td class="row">
                <a href="/tag/{{ $tag->id }}/edit" class="btn btn-primary btn-sm col-xs-5">编辑</a>
                <a href="/tag/{{ $tag->id }}" class="btn btn-info btn-sm col-xs-5 col-xs-offset-2">删除</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-xs-4">
      <form class="well">
        <div class="form-group">
          <input type="tag" class="form-control" id="tag" placeholder="输入标签">
        </div>
        <input type="submit" class="btn btn-primary form-control" value="新建标签">
      </form>
    </div>
  </div>
@endsection