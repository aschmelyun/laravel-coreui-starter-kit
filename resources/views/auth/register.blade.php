@extends('common.auth')
@section('content')
    <div class="card-group mb-0">
        <div class="card p-4">
            <div class="card-block">
                <h1>Register</h1>
                <p class="text-muted">Create an account for your app</p>
                <form action="{{ route('auth.register.post') }}" method="post" class="">
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-envelope-open"></i></span>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                        </div>
                        @if($errors->first('email'))
                            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                        </div>
                        @if($errors->first('name'))
                            <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        @if($errors->first('password'))
                            <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                        </div>
                        @if($errors->first('password_confirmation'))
                            <p class="help-block text-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6">
                            {{ csrf_field() }}
                            <input type="submit" value="Continue" class="btn btn-primary px-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center col-xs-12 col-sm-12">
            Already have an account? <a href="{{ route('auth.signin.index') }}">Sign In</a>
        </p>
    </div>
@endsection