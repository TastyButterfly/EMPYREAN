<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
    <script type="text/javascript" src="../jquery.js"></script>
    <script src="../include.js" type="text/javascript"></script>
    <script src="../account.js"></script>
    </head>

<body>
<div id="includeNav"></div>
<div class="container">
    <div class="signup-box">
        <h1 id="formTitle">Sign Up</h1>
        <p>Get your Empyrean account now</p>
        <form>
            <div class="input-group" id="nameField">

            <div class="input-field">
            <p>&#9729;</p>
            <input type="text" placeholder="Name" id="name">
            </div>

            <div class="input-field">
            <p>&#9993;</p>
            <input type="email" placeholder="Email" id="email">
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" placeholder="Password" id="password">
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" placeholder="Confirm your Password" id="cpassword">          
            </div>

            <p id="message">Already have an account?&nbsp;<a href="../signin/sign_in.html">Sign In</a></p>

            <div class="button-field">
                <button id="signupBtn" type="submit" onclick="register()">Sign Up</button>
            </div>  
            </div>
        </form>
        
    </div>
</div>

<div id="includeFooter"></div>
</body>


</html>  
       
