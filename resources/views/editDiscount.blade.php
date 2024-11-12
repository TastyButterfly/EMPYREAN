<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/crudView.css">
    <title>Edit Discount</title>
    <link rel="icon" href="/media/image.ico" type="image/x-icon">
    <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom: 7%;">
        <h1 id="formTitle">Edit Discount</h1>
        <p>Edit a discount here!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="crudForm" method="POST" action="{{route('discounts.update',$discount)}}">
            @csrf
            @method('PUT') <!-- Use PUT method for updating the payment -->
            <div class="input-group" id="nameField">

            <div class="input-field">
            <p>&#128337;</p>
            <input type="number" min="0" placeholder="Days Left" name="daysLeft" value="{{old('daysLeft',$discount->daysLeft)}}" required>
            </div>

            <div class="input-field">
            <p>&#65284;</p>
            <input type="number" step="0.01" min="0" placeholder="Discounted Amount" name="discount_price" value="{{old('discount_price',$discount->discount_price)}}" required>
            </div>

            <div class="input-field">
                <label for="plan">Plan:</label>
                <select id="plan" name="plan">
                    <option value="PC Game Pass" {{$discount->plan=='PC Game Pass'?'selected':''}}>PC Game Pass</option>
                    <option value="Ultimate Pass" {{$discount->plan=='Ultimate Pass'?'selected':''}}>Ultimate Pass</option>
                    <option value="Basic Pass" {{$discount->plan=='Basic Pass'?'selected':''}}>Basic Pass</option>
                  </select>       
            </div>

            <div class="input-field">
                <p>&#128197;</p>
                <input type="number" min="0" placeholder="Subscription ID" name="subscription_id" value="{{old('subscription_id',$discount->subscription_id)}}" required>
                </div>
    
            <div class="button-field">
                <button id="editUserBtn" type="submit">Confirm</button>
                <button id="editUserBtn" type="reset">Reset</button>
                <button id="editUserBtn" type="button" onclick="window.location='{{ route('discounts.cancel') }}'">Cancel</button>
            </div>
            </div>
        </form>
        
    </div>
</div>
@include('footer')
</body>
</html>  
       
