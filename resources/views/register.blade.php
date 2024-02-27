<style>
    /* Style for the login form container */
    .login-container {
        width: 350px;
        margin: 0 auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
    }

    /* Style for the login form heading */
    .login-container h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    /* Style for form groups (email, password fields) */
    .form-group {
        margin-bottom: 20px;
    }

    /* Style for form labels */
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    /* Style for form input fields */
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    /* Hover effect for input fields */
    .form-group input[type="email"]:hover,
    .form-group input[type="text"]:hover,
    .form-group input[type="password"]:hover,
    .form-group input[type="email"]:focus,
    .form-group input[type="text"]:focus,
    .form-group input[type="password"]:focus {
        border-color: #007bff;
    }

    /* Style for error messages */
    .form-group span {
        color: red;
        font-size: 0.8em;
    }

    /* Style for the login button */
    .form-group button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Hover effect for the login button */
    .form-group button:hover {
        background-color: #0056b3;
    }

    /* Style for the 'Sign up' link */
    .login-container p a {
        color: #007bff;
        text-decoration: none;
    }

    .login-container p a:hover {
        text-decoration: underline;
    }

    </style>

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


