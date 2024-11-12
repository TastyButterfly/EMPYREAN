<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/showView.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>User Details</title>
    </head>
    <body>
        @include('nav')
        <div class="container">
            <div class="show-box">
                <h1>User Details</h1>
                <table class="profileTable">
                    <tr>
                        <td><p>User ID:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-user"></i></p>
                                <p>{{$user->id}}</p>
                            </div>
                        </td>
                        <td><p>User Email:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-envelope"></i></p>
                                <p>{{$user->email}}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><p>User Name:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-signature"></i></p>
                                <p>{{$user->name}}</p>
                            </div>
                        </td>
                        <td><p>Joined Since:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-clock"></i></p>
                                <p>{{$user->created_at->format('Y/m/d')}}</p>
                            </div>
                        </td>
                    </tr>  
                    <tr>
                        <td><p>Amount Spent:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-dollar-sign"></i></p>
                                @if($totalPaid)
                                <p>RM {{number_format($totalPaid,2)}}</p>
                                @else
                                <p>RM 0.00</p>
                                @endif
                            </div>
                        </td>
                        <td><p>Status:</p>
                            <div class=input-field>
                                @if($user->status == 'Active')
                                <p><i class="fa-solid fa-check"></i></p>
                                @elseif($user->status == 'Suspended')
                                <p><i class="fa-solid fa-hourglass-end"></i></p>
                                @else
                                <p><i class="fa-solid fa-circle-xmark"></i></p>
                                @endif
                                <p>{{$user->status}}</p>
                            </div>
                        </td>
                    </tr>  
                </table>
                <div class="button-field">
                    <a href="{{route('users.edit',$user)}}"><button id="editUserBtn">Edit</button></a>
                    <a href="{{route('users.index')}}"><button id="editUserBtn">Return</button></a>
                </div>
            </div>
        </div>
    </body>
    @include('footer')
</html>