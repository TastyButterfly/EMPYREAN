<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Payment</title>
    <link href="receipt.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="receipt.js"></script>
    <script src="../jquery.js"></script>
    <script src="../include.js" type="text/javascript"></script>
    <script src="../account.js"></script>
</head>
<body>
    <div id="includeNav"></div>
    <table class="first">
        <tr>
            <td colspan="2">
                <div class="container" >
                    <img src="imagesPayment/empyrean-inverted.png" width="140px" height="140px">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="only">Thank you for your purchase!</p>
            </td>
        </tr>
        <tr>
            <td class="line" colspan="2">
                <p>------------------------------------------------------</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="customerInfo">
                <p class="cus" id="custName"></p>
                <p class="cus" id="secondInfo"></p>
                <p class="cus2" id="thirdInfo"></p>
                <p class="cus2">Date: 21/9/2023</p>
            </td>
        </tr>
        <tr>
            <td class="line" colspan="2">
                <p>------------------------------------------------------</p>
            </td>
        </tr>
        <tr>
            <td class="info">
                <p class="product">Product</p>
            </td>
            <td class="info">
                <p class="price">Price</p>
            </td>
        </tr>
        <tr>
            <td class="line" colspan="2">
                <p>------------------------------------------------------</p>
            </td>
        </tr>
        <tr>
            <td class="prod">
                <p class="product2" id="product"></p>
            </td>
            <td class="prod">
                <p class="price2" id="price"></p>
            </td>
        </tr>
        <tr>
            <td class="thanks" colspan="2">
                <p>Think gaming, Think Empyrean</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="container">
                    <img src="imagesPayment/barcode.png" height="120px">
                </div>
            </td>
        </tr>
</table>
<div id="includeFooter"></div>
</body>