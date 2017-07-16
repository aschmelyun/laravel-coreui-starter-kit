@extends('common.auth')
@section('content')
    <div class="card-group mb-0">
        <div class="card p-4">
            <div class="card-block">
                <h1>Sign In</h1>
                <p class="text-muted">Enter your email address and password</p>
                <form action="{{ route('auth.signin.post') }}" method="post" class="">
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                        </div>
                        @if($errors->first('email'))
                            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        @if($errors->first('password'))
                            <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary px-4" value="Sign In">
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-link px-0">Forgot password?</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center col-xs-12 col-sm-12">
            Don't have a free account yet? <a href="{{ route('auth.register.index') }}">Register Yours</a>
        </p>
    </div>
@endsection