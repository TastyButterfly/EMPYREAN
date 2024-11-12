<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/signup.css">
    <title>Change Username</title>
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom: 45px;">
        <h1 id="formTitle">Change Username</h1>
        <p>Tired of the old name? Change a new one!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('users.updateUsername', ['user' => $user->id, 'token' => $editUNToken])}}">
            @csrf
            @method('PUT')
            <div class="input-group" id="nameField">

            <div class="input-field">
            <p>&#9729;</p>
            <input type="text" name="name" placeholder="Username" id="name" value="{{old('name')}}" required>
            </div>

            <div class="input-field">
            <p>&#10003;</p>
            <input type="text" name="name_confirmation" placeholder="Confirm Username" id="name_confirmation" value="{{old('username')}}" required>
            </div>

            <div class="input-field">
            <p>&#9993;</p>
            <input type="email" placeholder="Email" name="email" id="email" value="{{old('email', $user->email)}}" disabled>
            </div>

            <p id="message">Please follow community guidelines while naming.<br>Never use your real name for this platform.</p>

            <div class="button-field">
                <button id="signupBtn" type="submit">Confirm</button>
            </div>  
            </div>
        </form>
        
    </div>
</div>

@include('footer')
</body>
</html>  
       
