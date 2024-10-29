<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="profile.css">
        <title>Empyrean Profile</title>
        <script src="../jquery.js"></script>
        <script src="../include.js" type="text/javascript"></script>
        <script src="../account.js"></script>
    </head>
    <body>
    
    <div class="container" onload="profile()">
        <div id="includeNav"></div>
    <div class="profile-box">
        <h1>User Profile:</h1>

        <div id="profilepic">
        <img id="profilepic" src="profilepic.jpg">
        </div>

     <div id="custInfo">
        
        <div style="margin-top: 50px;">
        <p>Name:</p><br><p id="proName"></p>
        </div>

        <div>
        <p>Email:</p><br><p id="proEmail"></p>
        </div>

        <div>
        <p>Account status:</p> <br> <p id="status">Active</p>
        </div>

     </div>

    </div>

    <div class="subscription-box">
        <h1>Your Subscription:</h1>

        <div>

        <p>Ultimate Pass</p>
        
        <p>PC Game Pass</p>

        <p>Game Pass</p>
        
        </div>
    </div>

    <div class="bill-box">
        <h1>Bills:</h1>
        <div>
        
        <p>Ultimate Pass (monthly)
        <a href="../payment/receipt.html"><button  type="button" id="viewSecond">View</button></a>
        </p>
        
        <p>PC Game Pass (yearly)
        <a href="../payment/receipt.html"><button style="margin-left:20px;" type="button" id="viewSecond">View</button></a>
        </p>
        
        <p>Game Pass (monthly)
        <a href="../payment/receipt.html"><button style="margin-left:30px;" type="button" id="viewSecond">View</button></a>
        </p>
        </div>
        
    </div>

    </div>
 

    <div id="includeFooter"></div>
    </body>
</html>