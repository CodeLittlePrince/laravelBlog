@extends('admin.layout')

@section('content')
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

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <form>
              <div class="btn btn-success pull-right">&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;</div>
              <div class="col-md-5 col-sm-5 col-xs-5 pull-right">
                <input class="form-control" type="text" name="tag" placeholder="Input tag name you wanna search">
              </div>
            </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <form>
              <div class="btn btn-info pull-right">Create Tag</div>
              <div class="col-md-5 col-sm-5 col-xs-5 pull-right">
                <input class="form-control" type="text" name="tag" placeholder="Input tag name you wanna search">
              </div>
            </form>
        </div>
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