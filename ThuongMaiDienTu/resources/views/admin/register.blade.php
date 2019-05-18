@extends('admin.layout.login')
@section('title','Dang Ky')
@section('content')
<div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              {{ Form::open(array('class' => 'form-horizontal')) }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : null }}">
            <label for="email" class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8">
              {{ Form::email('email', null, array('class' => 'form-control')) }}
              <p class="help-block">{{ $errors->first('email') }}</p>
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : null }}">
            <label for="password" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-8">
              {{ Form::password('password', array('class' => 'form-control')) }}
              <p class="help-block">{{ $errors->first('password') }}</p>
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : null }}">
            <label for="password_confirm" class="col-sm-4 control-label">Confirm Password</label>
            <div class="col-sm-8">
              {{ Form::password('password_confirm', array('class' => 'form-control')) }}
              <p class="help-block">{{ $errors->first('password_confirm') }}</p>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-8 col-sm-push-4">
              {{ Form::submit('Register', array('class' => 'btn btn-primary')) }}
              {{ Form::reset('Reset', array('class' => 'btn btn-default')) }}
            </div>
          </div>

          {{ Form::close() }}
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
@stop