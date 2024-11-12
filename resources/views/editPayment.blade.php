<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/crudView.css">
    <title>Edit Payment</title>
    <link rel="icon" href="/media/image.ico" type="image/x-icon">
    <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom: 15%;">
        <h1 id="formTitle">Edit Payment</h1>
        <p>Edit a payment here!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="crudForm" method="POST" action="{{route('payments.update',$payment)}}">
            @csrf
            @method('PUT') <!-- Use PUT method for updating the payment -->
            <div class="input-group" id="nameField">

            <div class="input-field">
            <p>&#9993;</p>
            <input type="text" name="email" placeholder="User Email" id="email" value="{{old('email',$payment->user->email)}}" required>
            </div>

            <div class="input-field">
            <p>&#65284;</p>
            <input type="number" step="0.01" min="0" placeholder="Payment Amount" name="amount" id="amount" value="{{old('amount',$payment->amount)}}" required>
            </div>

            <div class="input-field">
                <label for="payment_method" >&#128179;</label>
                <select id="payment_method" name="payment_method">
                    <option value="Credit/Debit Card" {{ $payment->payment_method == 'Credit/Debit Card' ? 'selected' : '' }}>Credit/Debit Card</option>
                    <option value="TnG eWallet" {{ $payment->payment_method == 'TnG eWallet' ? 'selected' : '' }}>TnG eWallet</option>
                  </select>       
            </div>

            <p class="label">Date of Payment:</p>
            <div class="input-field">
                <label for="payment_date">&#128197;</label>
                <input type="datetime-local" name="payment_date" id="payment_date" value="{{ old('payment_date', \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d\TH:i:s')) }}" required>
            </div>
            <div class="input-field">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Completed" {{ $payment->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Pending" {{ $payment->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Declined" {{ $payment->status == 'Declined' ? 'selected' : '' }}>Declined</option>
                  </select>       
            </div>
            <div class="button-field">
                <button id="editUserBtn" type="submit">Confirm</button>
                <button id="editUserBtn" type="reset">Reset</button>
                <button id="editUserBtn" type="button" onclick="window.location='{{ route('payments.cancel') }}'">Cancel</button>
            </div>
            </div>
        </form>
        
    </div>
</div>
@include('footer')
</body>
</html>  
       
