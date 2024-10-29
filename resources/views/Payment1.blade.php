<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Payment</title>
    <link href="payment.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="payment1.js"></script>
    <script type="text/javascript" src="../jquery.js"></script>
    <script src="../include.js" type="text/javascript"></script>
    <script src="../account.js"></script>

</head>
<div id="includeNav"></div>
<body style="margin:0px 0px 0px 0px;">
  <div class="top">
        <h1>Payment</h1>
    <p>All transactions are <b>secure</b> and <b>encrypted.</b></p>
    <p id="secondline"><br>Please select your subscription plan.</p>
</div>

    <form action="Payment2.html" method="get"> 
    <table class="first">
        <tr>
            <td>
                <div class="subPlan">
                    <h1 style="margin-left: 60px;">PC GAME</h1>                    
                </div>  
                                
            </td>
            <td>
                <div class="subPlan">
                    <h1 style="margin-left: 60px;">ULTIMATE</h1>
                </div>
            </td>
            <td>
                <div class="subPlan">
                    <h1 style="margin-left: 60px;">BASIC</h1>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="sub">  
                    <img src="imagesPayment/monthly.png" height="57%" width="45%">
                    <input type="checkbox" id="basicMonth" name="basicMonth" value="Basic Month">
                    <label for="basicMonth" id="basicMonth">RM20/month</label> 
                                              
                </div>
            </td>
            
            <td>
                <div class="stan">
                    <div class="sub">
                        <img src="imagesPayment/monthly.png" height="57%" width="45%">
                        <input type="checkbox" id="standardMonth" name="standardMonth" value="Standard Month"> 
                        <label for="standardMonth">RM35/month</label>                   
                    </div>
                </div>
            </td>
            
            <td>
                <div class="sub">
                    <img src="imagesPayment/monthly.png" height="57%" width="45%">
                    <input type="checkbox" id="ultimateMonth" name="ultimateMonth" value="Basic Month"> 
                    <label for="ultimateMonth">RM60/month</label>                   
                </div>
            </td>
            
        </tr>
        <tr>
            <td>
                <div class="sub">
                    <img src="imagesPayment/yearly.png" height="57%" width="45%">
                    <input type="checkbox" id="basicYear" name="basicYear" value="Basic Year">   
                    <label for="basicYear" id="basicYear">RM16.67/month</label>                 
                </div>
            </td>
            <td>
                <div class="stan">
                    <div class="sub">
                        <img src="imagesPayment/yearly_star.png" height="57%" width="45%">
                        <input type="checkbox" id="standardYear" name="standardYear" value="Basic Year">  
                        <label for="standardYear">RM29.17/month</label>                  
                    </div>
                </div>
            </td>
            <td>
                <div class="sub">
                    <img src="imagesPayment/yearly.png" height="57%" width="45%">
                    <input type="checkbox" id="ultimateYear" name="ultimateYear" value="Basic Year"> 
                    <label for="ultimateYear">RM50/month</label>                   
                </div>
            </td>
        </tr>
        <tr class="result">
            <td  class="result">
                <input type="submit" id="nextPage">
            </td>
        </tr>
    </table>
    </input>
</form>
<div id="includeFooter"></div>
</body>
</html>