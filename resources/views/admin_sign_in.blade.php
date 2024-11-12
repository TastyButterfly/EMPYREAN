<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/signin.css">
    <title>Admin Sign In</title>
    </head>
    <style>
        .signin_container{
            background-image: url(/media/admin_wp.jpg);
        }
    </style>
    <link rel="icon" href="/media/image.ico" type="image/x-icon">
    <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
<body>
    @include('nav')
    <div id="signinpage">
        <div class="signin_container">
            <div class="signin-box" style="max-height:450px;">
                <h1 id="formTitle">Admin Sign In</h1>
                <p>Welcome back to Empyrean</p>
                @if (session('error'))
                    <div style="color:#FFA700;">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admins.validateAdmin') }}">
                    @csrf
                    <div class="input-group" id="nameField" required>
                        <div class="input-field">
                            <p>&#9993;</p>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-field">
                            <p>&#128272;</p>
                            <input type="password" name="password" placeholder="Password"  required>
                        </div>
                        <p id="message">If you do not have your credentials stored, please contact the owner; or another administrator.</p>
                        <div class="button-field">
                            <button type="submit" id="signinBtn">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
       
