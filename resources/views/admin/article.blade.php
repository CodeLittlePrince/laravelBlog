@extends('admin.layout')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">操作</h3>
        </div>
        <div class="panel-body">
          <div class="row">
              <form action="/admin/article" method="get">
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <input class="form-control" type="text" name="keywords" placeholder="输入文章名">
                </div>
                <div class="col-md-3 hidden-sm hidden-xs">
                  <input class="btn btn-success btn-block" type="submit" value="查找" />
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>文章</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
    
        <div class="x_content">
    
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Title </th>
                  <th class="column-title">Desc </th>
                  <th class="column-title">Created at</th>
                  <th class="column-title">Updated at</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                  </th>
                  <th class="bulk-actions" colspan="5">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
                </tr>
              </thead>

              <tbody>
                @foreach ($articles as $post)
                  <tr class="even pointer">
                    <td >{{ $post->id }}</td>
                    <td >{{ $post->title }}</td>
                    <td >{{ $post->desc }}</td>
                    <td class=" ">{{ $post->created_at }}</td>
                    <td class=" ">{{ $post->updated_at }}</td>
                    <td class=" last">
                    <a href="/post/{{ $post->id }}">
                      <div class="btn btn-xs btn-success">查看</div>
                    </a>
                    </td>
                  </tr>
                @endforeach
                {{-- Modal --}}
                <div class="modal fade" id="editeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel">编辑标签</h5>
                      </div>
                      <div class="modal-body">
                        <input id="editeID" type="hidden">
                        <input id="editeName" class="form-control" type="text">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button id="submitEdit" type="button" class="btn btn-primary">确定</button>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- /Modal --}}
              </tbody>
            </table>
            <div class="text-center">
              {{ $articles->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection