<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/showView.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Payment Details</title>
    </head>
    <body>
        @include('nav')
        <div class="container">
            <div class="show-box">
                <h1>Payment Details</h1>
                <table class="profileTable">
                    <tr>
                        <td><p>Payment ID:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-cash-register"></i></p>
                                <p>{{$payment->id}}</p>
                            </div>
                        </td>
                        <td><p>User Email:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-envelope"></i></p>
                                <p>{{$payment->user->email}}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Payment Amount:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-money-bill-wave"></i></p>
                                <p>RM {{$payment->amount}}</p>
                            </div>
                        </td>
                        <td><p>Payment Method:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-credit-card"></i></p>
                                <p>{{$payment->payment_method}}</p>
                            </div>
                        </td>
                    </tr>  
                    <tr>
                        <td><p>Payment Date:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-calendar-days"></i></p>
                                <p>{{$payment->payment_date}}</p>
                            </div>
                        </td>
                        <td><p>Status:</p>
                            <div class=input-field>
                                @if($payment->status == 'Completed')
                                <p><i class="fa-solid fa-check"></i></p>
                                @elseif($payment->status == 'Pending')
                                <p><i class="fa-regular fa-hourglass-half"></i></p>
                                @else
                                <p><i class="fa-solid fa-circle-xmark"></i></p>
                                @endif
                                <p>{{$payment->status}}</p>
                            </div>
                        </td>
                    </tr>
                    @if($subscription)
                    <tr>
                        <td><p>Item Bought:</p>
                            <a href="{{route('subscriptions.show',$subscription->id)}}">
                            <div class=input-field>
                                <p><i class="fa-solid fa-cart-shopping"></i></p>
                                <p>{{$subscription->plan}}</p>
                            </div></a>
                        </td>
                        <td><p>Duration:</p>
                            <a href="{{route('subscriptions.show',$subscription->id)}}">
                            <div class=input-field>
                                <p><i class="fa-regular fa-clock"></i></p>
                                <p>{{$subscription->duration}}</p>
                            </div></a>
                        </td>
                    </tr> 
                    @endif
                </table>
                <div class="button-field">
                    <a href="{{route('payments.edit',$payment)}}"><button id="editUserBtn">Edit</button></a>
                    <a href="{{route('payments.index')}}"><button id="editUserBtn">Return</button></a>
                </div>
            </div>
        </div>
    </body>
    @include('footer')
</html>