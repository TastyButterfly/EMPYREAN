<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/signup.css">
    <title>Sign Up</title>
</head>

<body>
@include('nav')
<div class="container">
    <div class="box">
        <h1 id="formTitle">Sign Up</h1>
        <p>Get your Empyrean account now!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="signupForm" method="POST" action="{{route('users.register')}}">
            @csrf
            <div class="input-group" id="nameField">

            <div class="input-field">
            <p>&#9729;</p>
            <input type="text" name="name" placeholder="Username" id="name" value="{{old('name')}}" required>
            </div>

            <div class="input-field">
            <p>&#9993;</p>
            <input type="email" placeholder="Email" name="email" id="email" value="{{old('email')}}" required>
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" name="password" placeholder="Password" id="password" required>
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" name="password_confirmation" placeholder="Confirm your Password" id="cpassword" required>          
            </div>

            <p id="message">Already have an account?&nbsp;<a href="{{url('/sign_in')}}">Sign In</a></p>

            <div class="button-field">
                <button id="signupBtn" type="submit" ><a id="signLink">Sign Up</a></button>
            </div>  
            </div>
        </form>
        
    </div>
</div>

@include('footer')
</body>
</html>  
       
