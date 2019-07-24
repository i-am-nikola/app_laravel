<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box" id="app">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Nhập thông tin để bắt đầu đăng nhập</p>

    {!! Form::open(['route' => 'login.getLogin', 'method' => 'POST']) !!}
      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' =>'Email']) !!}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' =>'Mật khẩu']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              {!! Form::checkbox('remember_me', '', true) !!} Ghi nhớ mật khẩu
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          {!! Form::submit('Đăng nhập', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}
      @if (Session::has('flash_message'))
        <div class="alert {{ Session::get('flash_level') }} alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-warning"></i> {{ Session::get('flash_message') }}
        </div>
      @endif
    <div class="social-auth-links text-center">
      <p>- Hoặc -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập bằng tài khoản facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng tài khoản google</a>
    </div>
    
    <!-- /.social-auth-links -->

    <a href="#">Quên mật khẩu</a><br>
    <a href="register.html" class="text-center">Đăng ký tài khoản</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
