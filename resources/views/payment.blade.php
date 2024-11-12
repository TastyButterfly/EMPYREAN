<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Payment</title>
    <link href="/css/payment.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom: 0%;">
        <h1 id="formTitle">Subscription Details</h1>
<form id="paymentForm" action="{{route('payments.pay')}}" method="POST">
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
                <p>Starts {{$subscription_data['start_date']}}, ends {{$subscription_data['end_date']}}</p>
            </td>
            <td>{{$subscription_data['duration']}}</td>
            <td>RM {{$subscription_data['price']}}.00</td>
            @else
            <td>Plan not selected</td>
            <td><a><button>Unknown error</button></a></td>
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
    @if(isset($subscription_data))
        <h2>Grand Total: RM {{number_format($subscription_data['total'],2)}}</h2>
        <input type="hidden" name="plan" value="{{$subscription_data['plan']}}">
        <input type="hidden" name="duration" value="{{$subscription_data['duration']}}">
        <button type="submit">Checkout</button>
        <button type="button" onclick="window.location='{{route('payments.cancelPayment')}}';">Cancel</button>
    @else
        <h2>Grand Total: RM 0.00</h2>
        <button type="button" onclick="window.location='{{url('/subscribe')}}';">Return</button></a>
    @endif
    </form>
    </div>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        var form = document.getElementById('paymentForm');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            }).then(function (result) {
                if (result.error) {
                    // Display error.message in your UI
                    console.error(result.error.message);
                } else {
                    // Send the payment method ID to your server
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripePaymentMethodId');
                    hiddenInput.setAttribute('value', result.paymentMethod.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                }
            });
        });
    });
</script>
@include('footer')
</html>