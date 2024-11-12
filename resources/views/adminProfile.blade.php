<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/showView.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Admin Profile</title>
        <link rel="icon" href="/media/image.ico" type="image/x-icon">
        <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
    </head>
    <body>
        @include('nav')
        <div class="container admin">
            <div class="show-box">
                <h1>Admin Details</h1>
                <div class="admin-box">
                <div class="profile-picture">
                    <img src="/media/admin.png" alt="Profile Picture">
                </div>
                <table class="profileTable">
                    <tr>
                        <td><p>Name:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-signature"></i></p>
                                <p>{{$admin->name}}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Email:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-envelope"></i></p>
                                <p>{{$admin->email}}</p>
                            </div>
                        </td>
                    </tr>  
                    <tr>
                        <td><p>Joined Since:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-clock"></i></p>
                                <p>{{\Carbon\Carbon::parse($admin->created_at)->format('jS F Y') }}</p>
                            </div>
                        </td>
                    </tr>  
                </table>
                </div>
                <div class="button-field">
                    <a href="{{route('admin')}}"><button id="editUserBtn">Go To Dashboard</button></a>
                    <a href="{{route('home')}}"><button id="editUserBtn">Return</button></a>
                </div>
            </div>
        </div>
    </body>
    @include('footer')
</html>