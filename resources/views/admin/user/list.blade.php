@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>Quản lý thành viên</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li><a href="#">Quản lý thành viên</a></li>
    <li class="active">Danh sách thành viên</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-xs-10">Danh sách thành viên</h3>
          <div class="col-xs-2">
            <a href="{{ route('admin.user.getAdd') }}" class="btn btn-block btn-primary btn-sm">Thêm thành viên</a>
          </div>
        </div>
        @if (Session::has('flash_message'))
          <div class="alert {{ Session::get('flash_level') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i> {{ Session::get('flash_message') }}
          </div>
        @endif
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Phân quyền</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @if (!empty($users))
                <?php $stt = 1 ?>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $stt }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ ($user['level']==0) ? 'Admin' : 'Member'  }}</td>
                    <td>
                      <a href="{{ route('admin.user.delete', $user['id']) }}" class="btn"><i class="fa fa-edit"></i></a>
                      <a href="{{ route('admin.user.getEdit', $user['id']) }}" class="btn"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                <?php $stt++ ?>
                @endforeach  
              @endif
              
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
