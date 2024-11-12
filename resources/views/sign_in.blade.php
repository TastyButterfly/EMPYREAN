<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/signin.css">
    <title>Sign In</title>
    <link rel="icon" href="/media/image.ico" type="image/x-icon">
    <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
    </head>
  
<body>
    @include('nav')
<div id="signinpage">
<div class="signin_container">
    <div class="signin-box">
        <h1 id=""formTitle>Sign In</h1>
        <p>Welcome back to Empyrean</p>
        @if(session('success'))
            <p style="color:#30ab30">{{session('success')}}</p>
        @endif
        @if(session('error'))
            <p style="color:#f93b38;">{{session('error')}}</p>
        @endif
        <form id="signinForm" method="POST" action="{{ route('users.validateUser') }}">
            @csrf
            <div class="input-field">
            <p>&#9993;</p>
            <input type="email" name="email" placeholder="Email" id="siemail" required>
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" name="password" placeholder="Password" id="sipassword" required>
            </div>

            <p id="message">Don't have an account?&nbsp;<a href="sign_up">Sign Up</a></p>

            <form action = "profile">
            <div class="button-field">
                <button type="submit" id="signinBtn"><a id="signIn">Sign In</a></button>
            </div>  
            </form>
            </div>
        </form>
        
    </div>
</div>
</div>
@include('footer')
</body>
</html>  
       
