<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>Deactivate Account</title>
    <link rel="icon" href="/media/image.ico" type="image/x-icon">
    <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom:135px;">
        <h1 id="formTitle">Deactivate</h1>
        <p>We're so sad to see you go!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('users.deactivate', ['user' => $user, 'token' => $deactivation_token])}}">
            @csrf
            <div class="input-group" id="nameField">
            <div class="header">
                <i class="fa-solid fa-circle-xmark"></i>
                <h2>Are you sure you want to deactivate?</h2>
            </div>
            <h3>By deactivating, these will happen:</h3>
            <ol>
                <li>You will lose access to your account while it is deactivated.</li>
                <li>You will not receive refunds for your active subscriptions.</li>
                <li>Your subscriptions will remain active until it is expired.</li>
                <li>You will need to contact support to reactivate your account.</li>
            </ol>
            <div class="button-field">
                <button id="signupBtn" type="submit" class="deactivate">Deactivate</button>
            </div>  
            </div>
        </form>
        
    </div>
</div>

@include('footer')
</body>
</html>  
       
