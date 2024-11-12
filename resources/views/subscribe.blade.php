<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Choose Your Plan</title>
    <link href="/css/subscribe.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/js/subscribe.js"></script>
</head>
@include('nav')
<body style="margin:0px 0px 0px 0px;">
  <div class="top">
        <h1>Subscribe!</h1>
    <p>Choose from our series of attractive plans with flexible pricing!</b></p>
</div>

    <form action="{{route('subscriptions.submit')}}" method="POST">
    @csrf 
    <table class="first radio">
        <tr>
            <td>
                <div class="subPlan">
                    <h1 style="margin-left: 60px;">BASIC</h1>                    
                </div>  
                                
            </td>
            <td>
                <div class="subPlan">
                    <h1 style="margin-left: 60px;">ULTIMATE</h1>
                </div>
            </td>
            <td>
                <div class="subPlan">
                    <h1 style="margin-left: 60px;">PC GAME</h1>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="sub">  
                    <img src="/media/imagesPayment/monthly.png" height="57%" width="45%">
                    <input type="radio" id="basicMonth" name="planDuration" value="Basic Month">
                    <label for="basicMonth">RM20/month</label> 
                                              
                </div>
            </td>
            
            <td>
                <div class="stan">
                    <div class="sub">
                        <img src="/media/imagesPayment/monthly.png" height="57%" width="45%">
                        <input type="radio" id="ultimateMonth" name="planDuration" value="Ultimate Month"> 
                        <label for="ultimateMonth">RM60/month</label>                   
                    </div>
                </div>
            </td>
            
            <td>
                <div class="sub">
                    <img src="/media/imagesPayment/monthly.png" height="57%" width="45%">
                    <input type="radio" id="standardMonth" name="planDuration" value="Standard Month"> 
                    <label for="standardMonth">RM35/month</label>                   
                </div>
            </td>
            
        </tr>
        <tr>
            <td>
                <div class="sub">
                    <img src="/media/imagesPayment/yearly.png" height="57%" width="45%">
                    <input type="radio" id="basicYear" name="planDuration" value="Basic Year">   
                    <label for="basicYear">RM16.67/month</label>                 
                </div>
            </td>
            <td>
                <div class="stan">
                    <div class="sub">
                        <img src="/media/imagesPayment/yearly_star.png" height="57%" width="45%">
                        <input type="radio" id="ultimateYear" name="planDuration" value="Ultimate Year">  
                        <label for="ultimateYear">RM50/month</label>                  
                    </div>
                </div>
            </td>
            <td>
                <div class="sub">
                    <img src="/media/imagesPayment/yearly.png" height="57%" width="45%">
                    <input type="radio" id="standardYear" name="planDuration" value="Standard Year"> 
                    <label for="standardYear">RM29.17/month</label>                   
                </div>
            </td>
        </tr>
        <p>*All prices are inclusive of 6% SST</p>
        <tr class="result">
            <td  class="result">
                <input type="submit" id="nextPage">
            </td>
        </tr>
    </table>
    </input>
</form>
@include('footer')
</body>
</html>