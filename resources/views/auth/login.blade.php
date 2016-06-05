@extends('layouts.app')

@section('content')
<script type="text/javascript">
    alert("rev 6/6/2016")
</script>
 <main id="content">
            <!-- Breadcrumb -->
            <div class="container-fluid">
                   <form class="card lrForm" method="POST" action="{{ url('/login') }}">
					{{ csrf_field() }}
                    <div class="card-block">
                        <div class="text-center">
                            <i class="icon-login"></i>
                            <p>
                                Sign In to your account
                            </p>
                        </div>
                        <div class="input-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
							
							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
                        </div>
                        <br>
						
						
                        <div class="input-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
                        </div>
                        <br>
                        <button class="btn btn-block btn-success">Sign In</button>
                        
                      
                    </div>
                    <div class="card-footer">
					
                        <div class="row">
                            <div class="col-xs-6 text-center"><a href="{{ url('/register') }}" class="btn btn-link">Register</a></div>
                            <div class="col-xs-6 text-center"><a href="{{ url('/password/reset') }}"class="btn btn-link">Forgot Password?</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.conainer-fluid -->
        </main>
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
