
@extends('layouts.main')

@section('isi')
<br>
<br>
<br>
<div class="container">
    <div class="row">
    <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Lemonade</b> Band</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
  
     
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">

            
                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group tcenter">
                        <div class="col-md-6 col-md-offset-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>

                      
                        </div>
                    
</form>
     
  
@endsection
