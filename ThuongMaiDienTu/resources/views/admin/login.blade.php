@extends('admin.layout.login')
@section('title','Dang nhap')
@section('content')
<div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Đăng Nhập</h1>
                  </div>
                  <div class="panel-body">
    {{ Form::open(['url' => route('login.post'), 'role' => 'form', 'autocomplete' => 'off']) }}
      <fieldset>
        <div class="form-group">
          {{ Form::text('login', null, [
            'class' => 'form-control',
            'placeholder'=>'E-mail',
            'autofocus'=>'true']) }}
          @if($errors->has('login'))<p class="text-danger">{{ $errors->first('login') }}</p>@endif
        </div>
        <div class="form-group">
          {{ Form::password('password', [
          'class' => 'form-control',
          'placeholder'=>'Password']) }}
            @if($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }} </p>
            @elseif($errors->any())
            <p class="text-danger"> {{ $errors->first(0, ':message')  }}</p>
            @endif
        </div>
        <div class="checkbox">
          <label>
            {{ Form::checkbox('remember', 1 , null, []) }}Remember Me
          </label>
        </div>
        <!-- Change this to a button or input when using this as a form -->
        <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
      </fieldset>
      {{ Form::close() }}
  </div>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
@stop
