<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="/css/crudView.css">
    <title>Create User</title>
</head>

<body>
@include('nav')
<div class="container">
    <div class="box" style="padding-bottom: 12%;">
        <h1 id="formTitle">Create User</h1>
        <p>Create a new user here!</p>
        @if($errors->any())
            <div class="error-messages">
                <ul style="list-style-type: none;">
                    @foreach($errors->all() as $error)
                        <li style="color:#f93b38;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="crudForm" method="POST" action="{{route('users.store')}}">
            @csrf
            <div class="input-group" id="nameField">

            <div class="input-field">
            <p>&#9729;</p>
            <input type="text" name="name" placeholder="Username" id="name" value="{{old('name')}}" required>
            </div>

            <div class="input-field">
            <p>&#9993;</p>
            <input type="email" placeholder="Email" name="email" id="email" value="{{old('email')}}" required>
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" name="password" placeholder="Password" id="password" required>
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" name="password_confirmation" placeholder="Confirm your Password" id="cpassword" required>          
            </div>
            <div class="input-field">
                <label for="status">Status:</label>
                <select id="status" name="status" >
                    <option value="Active" selected>Active</option>
                    <option value="Deactivated">Deactivated</option>
                    <option value="Suspended">Suspended</option>
                  </select>       
            </div>
            <div class="button-field">
                <button id="editUserBtn" type="submit">Confirm</button>
                <button id="editUserBtn" type="reset">Reset</button>
                <button id="editUserBtn" type="button" onclick="window.location='{{ route('users.cancel') }}'">Cancel</button>
            </div>
            </div>
        </form>
        
    </div>
</div>

@include('footer')
</body>
</html>  
       
