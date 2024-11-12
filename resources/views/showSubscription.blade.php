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
                        <td><p>Subscription ID:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-gamepad"></i></p>
                                <p>{{$subscription->id}}</p>
                            </div>
                        </td>
                        <td><p>User Email:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-envelope"></i></p>
                                <p>{{$subscription->user->email}}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Plan:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-calendar"></i></p>
                                <p>{{$subscription->plan . " ". $subscription->duration}}</p>
                            </div>
                        </td>
                        <td><p>Date:</p>
                            <div class=input-field>
                                <p><i class="fa-regular fa-clock"></i></p>
                                <p>{{$subscription->start_date->format('Y/m/d') . " ~ ".$subscription->end_date->format('Y/m/d')}}</p>
                            </div>
                        </td>
                    </tr>  
                    <tr>
                        <td><p>Amount Paid:</p>
                            <div class=input-field>
                                <p><i class="fa-solid fa-dollar-sign"></i></p>
                                @if($subscription->payment)
                                <p>RM {{$subscription->payment->amount}}</p>
                                @else
                                <p>RM 0.00</p>
                                @endif
                            </div>
                        </td>
                        <td><p>Status:</p>
                            <div class=input-field>
                                @if($subscription->status == 'Active')
                                <p><i class="fa-solid fa-check"></i></p>
                                @elseif($subscription->status == 'Expired')
                                <p><i class="fa-solid fa-hourglass-end"></i></p>
                                @else
                                <p><i class="fa-solid fa-circle-xmark"></i></p>
                                @endif
                                <p>{{$subscription->status}}</p>
                            </div>
                        </td>
                    </tr>  
                </table>
                <div class="button-field">
                    <a href="{{route('subscriptions.edit',$subscription)}}"><button id="editUserBtn">Edit</button></a>
                    <a href="{{route('subscriptions.index')}}"><button id="editUserBtn">Return</button></a>
                </div>
            </div>
        </div>
    </body>
    @include('footer')
</html>