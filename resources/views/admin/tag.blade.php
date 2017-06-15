@extends('admin.layout')

@section('content')
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Actions</h3>
      </div>
      <div class="panel-body">
        <div class="row">
            <form>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input class="form-control" type="text" name="tag" placeholder="Input tag name you wanna search">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="btn btn-success btn-block">Search</div>
              </div>
            </form>
        </div>
        
        <div class="row">
            <form>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input class="form-control" type="text" name="tag" placeholder="Input tag name you wanna create">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="btn btn-info btn-block">Create</div>
              </div>
            </form>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#deleteModal">
              Delete all selected items
            </button>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">三思</h5>
                  </div>
                  <div class="modal-body">
                    你要删除所有你选中的标签吗？
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">不</button>
                    <button id="deleteAllSubmit" type="button" class="btn btn-primary">嗯呐</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tags Table</h2>
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
                <th>
                  <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">ID </th>
                <th class="column-title">Name </th>
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
              @foreach ($tags as $tag)
                <tr class="even pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">{{ $tag->id }}</td>
                  <td class=" ">{{ $tag->name }}</td>
                  <td class=" ">{{ $tag->created_at }}</td>
                  <td class=" ">{{ $tag->updated_at }}</td>
                  <td class=" last">
                    <div class="btn btn-xs btn-danger">Delete</div>
                    <div class="btn btn-xs btn-info">Edit</div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center">
            {{ $tags->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $('#deleteAllSubmit').on('click', function() {
      $('#deleteModal').modal('hide');
    });
  </script>
@endsection