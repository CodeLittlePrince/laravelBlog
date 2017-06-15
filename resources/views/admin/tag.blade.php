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
                <input class="form-control" type="text" name="keywords" placeholder="Input tag name you wanna search">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <input class="btn btn-success btn-block" value="Search" />
              </div>
            </form>
        </div>
        
        <div class="row">
            <form>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input class="form-control" type="text" name="tagname" placeholder="Input tag name you wanna create">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <input id="addTag" class="btn btn-info btn-block" value="Create" />
              </div>
              <div id="tagTip" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    标签名不能为空
                  </div>
                </div>
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
                  <td class="js-tag-id">{{ $tag->id }}</td>
                  <td class="js-tag-name">{{ $tag->name }}</td>
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
    // 加键盘控制提交
    $('[name=tagname]').on('keydown', function(e) {
      if (e.keyCode == 13) {
        $('#addTag').trigger('click');
      }
    });
    $('#addTag').on('click', function() {
      var tagname = $('[name=tagname]').val();
      if (tagname == '') {
        $('#tagTip').modal('show');
      }else {
        $.post('/admin/tag', {
          name: tagname,
          _token: Laravel.csrfToken
        })
        .done(function(res) {
          alert(res.msg);
        })
        .fail(function(res) {
          if (res.status == 422) {
            var responseText = $.parseJSON(res.responseText)
            var firstError; for (firstError in responseText) break;
            var msg = responseText[firstError];
            alert(msg);
          }else if (res.status == 500) {
            alert(res.statusText);
          }else {
            alert('创建标签失败')
          }
        });
        $('[name=tagname]').val('');
      }
    });
  </script>
@endsection