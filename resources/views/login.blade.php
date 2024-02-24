@extends('layouts.main')

@section('main-container')
<div class="login-form">
<div class="login-container">
        <h1>Login</h1>
        <form action="/loginuser" method="post">

        @if(Session::has('success'))
            <p class="para">{{Session::get('success')}}</p>
            @endif

            @if(Session::has('fail'))
            <p class="para">{{Session::get('fail')}}</p>
            @endif

            @csrf

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
               <center><button type="submit">Login</button></center>
            </div>
            <p>Don't have an account? <a href="{{url('/register')}}">Sign up</a></p>
        </form>
</div>
</div>

@endsection
