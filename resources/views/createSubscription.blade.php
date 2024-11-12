<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/crudView.css">
    <title>Add Subscription</title>
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom: 15%;">
        <h1 id="formTitle">Add Subscription</h1>
        <p>Add a new subscription into the record here!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="crudForm" method="POST" action="{{route('subscriptions.store')}}">
            @csrf
            <div class="input-group" id="nameField">

            <div class="input-field">
            <p>&#9993;</p>
            <input type="email" placeholder="Email" name="email" id="email" value="{{old('email')}}" required>
            </div>

            <div class="input-field">
                <p>&#65284;</p>
                <input type="number" name="payment_id" placeholder="Payment ID" id="payment_id" value="{{old('payment_id')}}">
            </div>

            <div class="input-field">
                <label for="plan">Plan:</label>
                <select id="plan" name="plan">
                    <option value="null" selected disabled>Select Plan</option>
                    <option value="PC Game Pass">PC Game Pass</option>
                    <option value="Ultimate Pass">Ultimate Pass</option>
                    <option value="Basic Pass">Basic Pass</option>
                  </select>       
            </div>

            <p class="label">Starting Date:</p>
            <div class="input-field">
                <p>&#128197;</p>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
            </div>
            <table class="radio">
            <tr>
                <td>Duration:</td>
                <td><input type="radio" id="OneYear" name="duration" value="One Year" required>
                <label for="OneYear">One Year</label></td>
                <td><input type="radio" id="OneMonth" name="duration" value="One Month" required>
                <label for="OneMonth">One Month</label></td>
            </tr>
            <tr>
                <td>Cancelled?</td>
                <td><input type="radio" id="Yes" name="cancel" value="Yes" required>
                <label for="Yes">Yes</label></td>
                <td><input type="radio" id="No" name="cancel" value="No" required>
                <label for="No">No</label></td>
            </tr>
            </table>
            <div class="button-field">
                <button id="editUserBtn" type="submit">Confirm</button>
                <button id="editUserBtn" type="reset">Reset</button>
                <button id="editUserBtn" type="button" onclick="window.location='{{ route('subscriptions.return') }}'">Cancel</button>
            </div>
            </div>
        </form>
        
    </div>
</div>

@include('footer')
</body>
</html>  
       
