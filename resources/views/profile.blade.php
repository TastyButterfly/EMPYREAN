<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="/css/profile.css">
        <title>Empyrean Profile</title>
        <script src="/js/buyingPass.js"></script>
    </head>
    <body>
    
    <div class="container">
    @include('nav')
    <div class="profile-box">
        <h1>User Profile:</h1>
        <form method='GET' action="{{route('users.deactivateAccount')}}">
            @csrf
            <button type="submit" class="deactivate">Deactivate Account</button>
        </form>
        <div id="profilepic">
        <img id="profilepic" src="/media/profilepic.jpg">
        </div>

     <div id="custInfo">

        <p>Name:</p><p id="proName">{{$user->name}}</p>
        <p>Email:</p><p id="proEmail">{{$user->email}}</p>
        <p>Account status:</p><p id="status">{{$user->status}}</p>

        <button role="button" onclick="window.location.href='{{route('users.editUsername')}}'">Change Username</button>
        <button role="button" onclick="window.location.href='{{route('users.editPassword')}}'" style="float:right;">Change Password</button>
     </div>
    </div>

    <div class="subscription-box">
        <h1>Your Subscription:</h1>
        @if($subscription)
            <p class="plan">{{$subscription->plan}}</p>
            <p class="subPlan">Expires after {{\Carbon\Carbon::parse($subscription->end_date)->format('j M Y')}}</p>
            @if($subscription->plan=='Ultimate Pass')
                <button role="button" onclick="selectPlan('ultimateYear')">Renew</button>
            @elseif($subscription->plan=='PC Game Pass')
                <button role="button" onclick="selectPlan('standardYear')">Renew</button>
            @elseif($subscription->plan=='Basic Pass')
                <button role="button" onclick="selectPlan('basicMonth')">Renew</button>
            @endif
        @else
            <p class="plan">No Active Subscription.</p>
            <button role="button" onclick="selectPlan('ultimateYear')">Subscribe</button>
        @endif
    </div>

    <div class="bill-box">
        <h1>Your Bills:</h1>
        <div>
            @if($subs->isEmpty())
                <p>No record found.</p>
            @else
                <table>
                @foreach($subs as $sub)
                    <tr>
                        <td><p class="plan">{{$sub->plan}}</p><p class="subPlan">{{$sub->duration}}</p></td>
                        <td><p class="plan">{{ \Carbon\Carbon::parse($sub->created_at)->addHours(8)->format('j M Y') }}</p>
                        <p class="subPlan">{{ \Carbon\Carbon::parse($sub->created_at)->addHours(8)->format('H:i:s') }}</p></td>
                        <td><button role="button" onclick="window.location.href='{{route('viewReceipt',$sub->id)}}'">View</button></td>
                    </tr>
                @endforeach
                </table>
            @endif
        </div>
    </div>

    </div>
    @include('footer')
    </body>
</html>