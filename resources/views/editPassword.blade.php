<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/signup.css">
    <title>Change Password</title>
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom:100px;">
        <h1 id="formTitle">Change Password</h1>
        <p>Secure your account by changing your password!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('users.updatePassword',['user' => $user->id, 'token' => $editPWToken])}}">
            @csrf 
            @method('PUT')
            <div class="input-group" id="nameField">
                
            <div class="input-field">
            <p>&#9729;</p>
            <input type="text" name="name" placeholder="Username" id="name" value="{{old('name',$user->name)}}" disabled>
            </div>

            <div class="input-field">
            <p>&#9993;</p>
            <input type="email" placeholder="Email" name="email" id="email" value="{{old('email',$user->email)}}" disabled>
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" name="password" placeholder="Password" id="password" required>
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" name="password_confirmation" placeholder="Confirm your Password" id="cpassword" required>          
            </div>

            <p id="message">Remember to save your password in a secure location.</p>

            <div class="button-field">
                <button id="signupBtn" type="submit" >Confirm</button>
            </div>  
            </div>
        </form>
        
    </div>
</div>

@include('footer')
</body>
</html>  
       
