@extends('admin.master')

@section('title')
  Chỉnh sửa thành viên
@endsection

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quản lý thành viên</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Quản lý thành viên</a></li>
      <li class="active">Chỉnh sửa thành viên</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-9">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa thành viên</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          {!! Form::model($user, ['method' => 'PATCH', 'route' => ['admin.user.postEdit', $user->id]])!!}
            <div class="box-body">
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name', 'Họ và tên') !!}
                {!! Form::text('name', isset($user) ? $user['name'] : '', ['class' => 'form-control', 'placeholder' => 'Nhập họ và tên']) !!}
                @if ($errors->has('name'))  
                  <span class="help-block">{{ $errors->first('name') }}</span> 
                @endif
              </div>
              <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', isset($user) ? $user['email'] : '', ['class' => 'form-control', 'placeholder' => 'Nhập email']) !!}
                @if ($errors->has('email'))
                  <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                {!! Form::label('password', 'Mật khẩu') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Nhập mật khẩu']) !!}
                @if ($errors->has('password'))
                  <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
              </div>
              <div class="form-group {{ $errors->has('re_password') ? 'has-error' : '' }}">
                {!! Form::label('re_password', 'Nhập lại mật khẩu') !!}
                {!! Form::password('re_password', ['class' => 'form-control', 'placeholder' => 'Nhập lại mật khẩu']) !!}
                @if ($errors->has('re_password'))
                  <span class="help-block">{{ $errors->first('re_password') }}</span>
                @endif
              </div>
              <div class="form-group {{ $errors->has('level') ? 'has-error' : '' }}">
                {!! Form::label('level', 'Phân quyền') !!}
                @if ($user['level'] == 0)
                 {!! Form::select('level', ['' => 'Phân quyền thành viên', 0 => 'Admin', 1 => 'Member'], [0],['class' => 'form-control', (Auth::user()->id == $id) ? 'disabled' : '']) !!}
                @elseif ($user['level'] == 2)
                  {!! Form::select('level', ['' => 'Phân quyền thành viên', 0 => 'Admin', 1 => 'Member', 2 => 'Manager'], [2],['class' => 'form-control', (Auth::user()->id == $id) ? 'disabled' : '']) !!}
                @else
                 {!! Form::select('level', ['' => 'Phân quyền thành viên', 0 => 'Admin', 1 => 'Member'], [1],['class' => 'form-control', (Auth::user()->id == $id) ? 'disabled' : '']) !!}
                @endif
                @if ($errors->has('level'))
                  <span class="help-block">{{ $errors->first('level') }}</span>
                @endif
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
              <a href="{{ route('admin.user.list') }}" class="ml-2 btn btn-warning">Quay về</a>
            </div>
          {!! Form::close() !!}
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
@endsection