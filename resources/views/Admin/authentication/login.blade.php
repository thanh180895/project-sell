@extends('layouts.login')

@section('content')
    <div class="card-header">
        <h3>Sign In Admin</h3>
        <div class="d-flex justify-content-end social_icon">
            <span><i class="fab fa-facebook-square"></i></span>
            <span><i class="fab fa-google-plus-square"></i></span>
            <span><i class="fab fa-twitter-square"></i></span>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('postLogin') }}" method="post">
            @csrf
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Email" name="email">
            
    </div>
    <div style="color:white">
        {{ $errors->default->first('email') }}
   </div>
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" class="form-control" placeholder="password" name="password">      
    </div>
    <div style="color:white">
        {{ $errors->default->first('password') }}
   </div>
    <div class="row align-items-center remember">
        <input type="checkbox">Remember Me
    </div>
    <div class="form-group">
        <input type="submit" value="Login" class="btn float-right login_btn">
    </div>
    </form>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-center links">
            Don't have an account?<a href="#">Sign Up</a>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#">Forgot your password?</a>
        </div>
    </div>

@endsection