<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/crudView.css">
    <title>Create Payment</title>
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom: 15%;">
        <h1 id="formTitle">Create Payment</h1>
        <p>Add a payment here!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="crudForm" method="POST" action="{{route('payments.store')}}">
            @csrf
            <div class="input-group" id="nameField">

            <div class="input-field">
            <p>&#9993;</p>
            <input type="text" name="email" placeholder="User Email" id="email" value="{{old('email')}}" required>
            </div>

            <div class="input-field">
            <p>&#65284;</p>
            <input type="number" step="0.01" min="0" placeholder="Payment Amount" name="amount" id="amount" value="{{old('amount')}}" required>
            </div>

            <div class="input-field">
                <label for="payment_method" >&#128179;</label>
                <select id="payment_method" name="payment_method">
                    <option value="null" selected disabled>Select a Payment Method</option>
                    <option value="Credit/Debit Card">Credit/Debit Card</option>
                    <option value="TnG eWallet">TnG eWallet</option>
                  </select>       
            </div>

            <p class="label">Date of Payment:</p>
            <div class="input-field">
                <label for="payment_date">&#128197;</label>
                <input type="datetime-local" name="payment_date" id="payment_date" value="{{ old('payment_date') }}"  required>
            </div>

            <div class="input-field">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Completed" selected>Completed</option>
                    <option value="Pending">Pending</option>
                    <option value="Declined">Declined</option>
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
       
