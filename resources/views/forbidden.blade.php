<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/forbidden.css">
    <title>Oh Snap!</title>
    </head>
  
<body>
    @include('nav')
<div class="container">
    <div class="box">
        @if($type == 'admin')
            <h1>Oh No!</h1>
            <p>Apologies, but it turns out you stumbled upon a page not meant for you. Let's bring you back to the home page!</p>
            <div class="button-field">
            <button onclick="window.location.href='{{url('/')}}';">Return to Home
            </button></div>
        @elseif($type == 'user')
            <h1>Oops!</h1>
            <p>This page is meant for regular, logged in users. You need to sign in first to proceed to this page. Sign in?</p>
            <div class="button-field"><button onclick="window.location.href='{{url('/sign_in')}}';">Sign In
            </button></div>
            <div class="button-field">
            <button onclick="window.location.href='{{url('/')}}';">Return to Home
            </button></div>
        @elseif($type=='adminLogin')
            <h1>Duplicated Session</h1>
            <p>It seems you are already signed in as an admin. Please sign out first to proceed to sign in as a user.</p>
            <form action="{{route('admins.logout')}}" method="post">
                @csrf
                <div class="button-field"><button type="submit">Sign Out</button></div>
            </form>
        @elseif($type=='userLogin')
            <h1>Duplicated Session</h1>
            <p>It seems you are already signed in as a user. Please sign out first to proceed to sign in as an admin.</p>
            <form action="{{route('users.logout')}}" method="post">
                @csrf
                <div class="button-field"><button type="submit">Sign Out</button></div>
            </form>
        @elseif($type=='receipt')
            <h1>Oh Snap!</h1>
            <p>It seems you have reloaded or pressed the back button on the receipt page. If you wish to view the receipt again, please check your profile for your payment history. Let's bring you back to the home page!</p>
            <div class="button-field">
                <button onclick="window.location.href='{{url('/')}}';">Return to Home
            </button></div>
        @endif
    </div>
</div>
@include('footer')
</body>
</html>  