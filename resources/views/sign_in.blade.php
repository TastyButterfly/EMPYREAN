<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="signin.css">
    <script src="../jquery.js"></script>
    <script src="../include.js" type="text/javascript"></script>
    <script src="../account.js"></script>
    <title>Sign In</title>
    </head>
  
<body>
    <div id="includeNav"></div>
<div id="signinpage">
<div class="signin_container">
    <div class="signin-box">
        <h1 id=""formTitle>Sign In</h1>
        <p>Welcome back to Empyrean</p>
        <form>
            <div class="input-group" id="nameField" required>

            <div class="input-field">
            <p>&#9993;</p>
            <input type="email" placeholder="Email" id="siemail" required>
            </div>

            <div class="input-field">
            <p>&#128272;</p>
            <input type="password" placeholder="Password" id="sipassword" required>
            </div>

            <p id="message">Don't have an account?&nbsp;<a href="../signup/sign_up.html">Sign Up</a></p>

            <form action = "../profile/profile.html">
            <div class="button-field">
                <button type="submit" id="signinBtn" onclick="login()">Sign In</button>
            </div>  
            </form>
            </div>
        </form>
        
    </div>
</div>

</div>
<div id="includeFooter"></div>

</body>
</html>  
       
