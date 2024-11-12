<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Receipt</title>
    <link href="/css/receipt.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/media/image.ico" type="image/x-icon">
    <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
</head>

<body>
    @include('nav')
    <div class="button-container">
        <button type="button" class="receipt" onclick="window.print()">Print Receipt</button>
        <button type="button" class="receipt back" onclick="window.location.href='/profile'">Back to Profile</button>
    </div>
    <table class="first">
        <tr>
            <td colspan="2">
                <div class="container" >
                    <img src="/media/imagesPayment/empyrean-inverted.png" width="140px" height="140px">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="only">Thank you for your purchase!</p>
            </td>
        </tr>
        <tr>
            <td class="line" colspan="2">
                <p>------------------------------------------------------</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="customerInfo">
                <p>Username: {{$subscription->user->name}}</p>
                <p>Email: {{$subscription->user->email}}</p>
                @if(isset($payment))
                    <p>Payment Method: {{$payment->payment_method}}</p>
                    <p>Status: {{$payment->status}}</p>
                    <p>Date of Purchase: {{$payment->payment_date}}</p>
                @else
                    <p>Status: Completed</p>
                    <p>Date of Purchase: {{\Carbon\Carbon::parse($subscription->created_at)->addHours(8)->format('Y-m-d H:i:s')}}</p>
                @endif
            </td>
        </tr>
        <tr>
            <td class="line" colspan="2">
                <p>------------------------------------------------------</p>
            </td>
        </tr>
        <tr>
            <td class="info">
                <p class="product">Product</p>
            </td>
            <td class="info">
                <p class="price">Price</p>
            </td>
        </tr>
        <tr>
            <td class="line" colspan="2">
                <p>------------------------------------------------------</p>
            </td>
        </tr>
        <tr class="prodRow">
            <td class="prod">
                <p class="product2">{{$subscription->plan}}</p><br>
                <p class="duration">{{$subscription->duration}} Plan</p>
            </td>
            <td class="prod">
                <p class="price2">RM {{number_format($price,2)}}</p>
            </td>
        </tr>
        @if(isset($discount))
            <tr class="prodRow">
                <td class="prod">
                    <p class="product2">{{$discount['oldPlan']}}</p>
                    <p class="duration">{{$discount['daysLeft']}} days left</p>
                </td>
                <td class="prod">
                    <p class="price2">-RM {{number_format(abs($discount['discountPrice']),2)}}</p>
                </td>
            </tr>
        @endif
        <tr>
            <td class="line" colspan="2">
                <p>------------------------------------------------------</p>
            </td>
        </tr>
        @if(isset($payment))
            <tr>
                <td class="prod">
                    <p class="product2">Total:</p>
                </td>
                <td class="prod">
                    <p class="price2">RM {{number_format($payment->amount / 1.06, 2)}}</p>
                </td>
            </tr>
            <tr>
                <td class="prod">
                    <p class="product2">SST:</p>
                </td>
                <td class="prod">
                    <p class="price2">RM {{number_format($payment->amount - ($payment->amount / 1.06), 2)}}</p>
                </td>
            </tr>
            <tr>
                <td class="prod">
                    <p class="product2">Grand Total:</p>
                </td>
                <td class="prod total">
                    <p class="price2">RM {{number_format($payment->amount, 2)}}</p>
                </td>
            </tr>
        @else
            <tr>
                <td class="prod">
                    <p class="product2">Total:</p>
                </td>
                <td class="prod total">
                    <p class="price2">RM 0.00</p>
                </td>
            </tr>
            <tr>
                <td class="prod">
                    <p class="product2">Credit Lost:</p>
                </td>
                <td class="prod total">
                    <p class="price2">RM {{number_format(abs($total),2)}}</p>
                </td>
            </tr>
        @endif
        <tr>
            <td class="line" colspan="2">
                <p>------------------------------------------------------</p>
            </td>
        </tr>
        <tr>
            <td class="thanks" colspan="2">
                <p>Think gaming, Think Empyrean</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="container">
                    <img src="/media/imagesPayment/barcode.png" height="120px">
                </div>
            </td>
        </tr>
</table>
</body>
@include('footer')
</html>