<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Payment</title>
    <link href="payment2.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="payment2.js"></script>
    <script src="../jquery.js"></script>
    <script src="../include.js" type="text/javascript"></script>
    <script src="../account.js"></script>

</head>

<body>
    <div id="includeNav"></div>
<p>Which payment method would you like to use?</p>

<form id="paymentForm" action="receipt.html" method="get">
    <table>
        <tr>
            <td colspan="2" class="payment">
                <input type="radio" name="payment" id="credit" default>
                <label for="credit">Credit Card</label>               
            </td>
            <td colspan="2" class="payment">
                <input type="radio" name="payment" id="ewallets">
                <label for="ewallets">E-Wallet</label>
            </td>
        </tr>
    </table>    
    <div class="form-container">
    <table class="credCard">
        <tr>
            <td class="info">
                <label for="nameBox">*Name<br></label>
                <input type="text" id="nameBox" name="custName" placeholder="First and Last Name">
            </td>
            <td class="info">
                <label for="emailBox">*Email<br></label>
                <input type="email" id="emailBox" name="custName" placeholder="example@gmail.com">
            </td>  
        <tr>
            <td class="card">
                <label for="cardNoBox">*Credit Card No<br></label>
                <input type="text" id="cardNoBox" name="custName" placeholder="XXXX-XXXX-XXXX">
            </td>  
            <td class="card">
                <label for="cvv">*CVV<br></label>
                <input type="text" id="cvv" name="custName" placeholder="XXX">
            </td>            
        </tr>
        <tr>
            <td class="card">
                <label for="cardExpireMo">*Exp Month<br></label>
                <input type="text" id="cardExpireMo" name="custName" placeholder="January">
            </td>  
            <td class="card">
                <label for="cardExpireYe">*Exp Year<br></label>
                <input type="text" id="cardExpireYe" name="custName" placeholder="20XX">
            </td>            
        </tr>
        <tr>
            <td class="location">
                <label for="state">*State<br></label>
                <select name="state" id="state" class="state" >
                    <option value="Perlis">Perlis</option>
                    <option value="Kedah">Kedah</option>
                    <option value="Penang">Penang</option>
                    <option value="Selangor">Selangor</option>
                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Melaka">Melaka</option>
                    <option value="Johor">Johor</option>
                    <option value="Kelantan">Kelantan</option>
                    <option value="Terengganu">Terengganu</option>
                    <option value="Pahang">Pahang</option>
                </select>
            </td>  
            <td class="location">
                <label for="zipCode">*Zip Code<br></label>
                <input type="text" id="zipCode" name="custName" placeholder="XXXXX">
            </td>
        </tr>
        <tr>                        
            <td class="accept" colspan="2">
                <p>We accept:</p>
                <img src="imagesPayment/cardpay.png" width="290px" height="38px">
            </td>
        </tr>
    </table>
    <table class="eWallet">
        <tr>
            <td class="wallets" id="wallets">
                <label for="wallet">E-Wallet<br></label>
                <select name="wallet" id="wallet" class="wallet">
                    <option value="Touch 'N Go">Touch 'N Go</option>
                    <option value="Boost">Boost</option>
                    <option value="WeChat Pay">WeChat Pay</option>
                    <option value="AliPay">AliPay</option>
                </select>
            </td>
            <td class="wallets">
                <label for="phoneNo">*Phone Number<br></label>
                <input type="text" id="phoneNo" name="custName" placeholder="XXX-XXXXXXXX" >
            </td>
        </tr>
        <tr>
            <td class="exInfo">
                <label for="namaBox">*Name<br></label>
                <input type="text" id="namaBox" name="custName" placeholder="First and Last Name">
            </td>
            <td class="exInfo">
                <label for="pinBox">*PIN<br></label>
                <input type="password" id="pinBox" name="custName" placeholder="******">
            </td>  
        <tr>
            <tr>
                <td class="accept" colspan="2">
                    <p>We accept:</p>
                    <img src="imagesPayment/walletpay.png" width="290px" height="130px">
                </td>
            </tr>
    </table>
    </div>
    <div id="submitbox">
    <input type="submit" value="Submit" onclick="passDetails()">
</div>
</form>
<div id="includeFooter"></div>
</body>