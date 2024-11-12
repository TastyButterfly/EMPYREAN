<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Convert Plan</title>
    <link href="/css/payment.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
      <link rel="icon" href="/media/image.ico" type="image/x-icon">
      <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom: 0%;">
        <h1 id="formTitle">Change of Plan</h1>
<form id="paymentForm" action="{{ route('subscriptions.zeroPayment') }}" method="POST">
    @csrf
    <table class="paymentItem">
        <tr>
            <th>Subscription Plan</th>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            @if(isset($subscription_data))
            <td>{{$subscription_data['plan']}} @if($subscription_data['extend'] == 1) (Plan Extension) @endif
                <p>Starts {{\Carbon\Carbon::parse($subscription_data['start_date'])->format('d M Y') }}, ends {{ \Carbon\Carbon::parse($subscription_data['end_date'])->format('d M Y') }}</p>
            </td>
            <td>{{$subscription_data['duration']}}</td>
            <td>RM {{$subscription_data['price']}}.00</td>
            @else
            <td>Plan not selected</td>
            <td>Unknown error</td>
            <td>RM0.00</td>
            @endif
        </tr>
        @if(isset($discount))
        <tr>
            <td>Discount: Existing {{$discount['plan']}} Plan</td>
            <td>{{$discount['daysLeft']}} days <p>remaining</p></td>
            <td>-RM {{number_format($discount['discountPrice'],2)}}</td>
        </tr>
        @endif
    </table>
    <h2>Total: -RM {{number_format(abs($subscription_data['total']),2)}} (non-refundable)</h2>
    <h2>Grand Total: RM 0.00</h2>
    @if(isset($subscription_data) && isset($discount))
        @if($subscription_data['total']==0)
            <button type="submit">Submit</button>
            <button onclick="window.location='{{route('payments.cancelPayment')}}';">Cancel</button>
        @elseif($subscription_data['total']<0)
            <p style="color:red">Your actual total is less than zero. Unfortunately our company does not offer refunds. Please refer to the downgrade mechanism in our <a href="{{url('/legal#refund')}}" target="_blank" >refund policy.</a></p>
            <button type="submit" onclick="return confirm('Are you sure to proceed? You will lose RM{{number_format(abs($subscription_data['total']),2)}} in credit!')">Submit</button>
            <button type="button" onclick="window.location='{{route('payments.cancelPayment')}}';">Cancel</button>
        @endif
    @else
        <button type="button" onclick="window.location='{{url('/subscribe')}}';">Return</button></a>
    @endif
    </form>
    </div>
</div>
</body>
@include('footer')
</html>