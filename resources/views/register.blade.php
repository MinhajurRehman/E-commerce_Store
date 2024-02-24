@extends('layouts.main')

@section('main-container')

<div class="login-form">
<div class="login-container">
        <h1>Sign Up</h1>
        <form action="/registeruser" method="post">

            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

            @csrf

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <span>@error('username') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
                <span>@error('email') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span>@error('password') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
               <center><button type="submit">Signup</button></center>
            </div>
            <p>Do you have an account? <a href="{{url('/login')}}">Login</a></p>
        </form>
</div>
</div>

@endsection
