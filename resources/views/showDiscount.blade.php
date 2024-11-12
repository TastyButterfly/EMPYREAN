<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/showView.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Discount Details</title>
    </head>
    <body>
        @include('nav')
        <div class="container">
            <div class="show-box">
                <h1>Discount Details</h1>
                <table class="profileTable">
                    <tr>
                        <td><p>Discount ID:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-percent"></i></p>
                                <p>{{$discount->id}}</p>
                            </div>
                        </td>
                        <td><p>User Email:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-envelope"></i></p>
                                <p>{{$discount->subscription->user->email}}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Discount Amount:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-money-bill-wave"></i></p>
                                <p>RM {{$discount->discount_price}}</p>
                            </div>
                        </td>
                        <td><p>Old Plan:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-tag"></i></p>
                                <p>{{$discount->plan}}</p>
                            </div>
                        </td>
                    </tr>  
                    <tr>
                        <td><p>Days Left in Old Plan:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-clock"></i></p>
                                <p>{{$discount->daysLeft}}</p>
                            </div>
                        </td>
                        <td><p>Subscription ID:</p>
                            <a href="{{route('subscriptions.show',$discount->subscription->id)}}">
                                <div class=input-field>
                                <p><i class="fa-regular fa-calendar"></i></p>
                                <p>{{$discount->subscription->id}}</p>
                            </div></a>
                        </td>
                    </tr> 
                </table>
                <div class="button-field">
                    <a href="{{route('discounts.edit',$discount)}}"><button id="editUserBtn">Edit</button></a>
                    <a href="{{route('discounts.index')}}"><button id="editUserBtn">Return</button></a>
                </div>
            </div>
        </div>
    </body>
    @include('footer')
</html>