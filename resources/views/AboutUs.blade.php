<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>About Us</title>
    <link href="/css/aboutus.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
  <script src="https://kit.fontawesome.com/023ef1cfd5.js" crossorigin="anonymous"></script>
    
</head>
<body style="margin:0px 0px 0px 0px;">
    @include('nav')
    <div id="gameimg">
       <img src="/media/cloudgaming.jpg"/> 
    </div>

<div class="toppest">
    <h1>Welcome to the home of Cloud Gaming</h1>
</div>
    <table class="top">
        <tr>
            <td>
            <div class="History">
                <h1> Our History </h1>
                    <p>
                    Back in 2017, gaming enthusiasts Johnathan Woodgate and Lyney Navia were on the hunt for one of their favourite video games. They looked far and wide, however one problem
                    kept popping up; the games were always too pricey. Sick and tired of constantly spending so much of their money on video games, an idea took form in the minds of Johnathan and Lyney.
                    "Why don't we start our own gaming service?". Driven by this goal, they got to work, cutting deals with massive video game companies. Somewhere along the way,
                    the idea of turning this service into a cloud service came up and they ran with it. The result of their efforts is the very company you see today!
                    </p>
            </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="Service">
                    <img id="logo" src="/media/imagesAboutUs/empyrean-logo.png" height="330px" width="330px">
                    <h1>More On Empyrean</h1>
                    <P>
                    At Empyrean, we strive to deliver a seamless gaming experience and spread the joy of gaming worldwide. Empyrean boasts one of the biggest gaming libraries among 
                    all the cloud gaming services. From massive Triple A titles such as The Last Of Us&trade; to relatively
                    obscure indie games such as Hollow Knight, here you can find the games to scratch your gaming itch! Massive strides have been made to ensure our customers get 
                    the very best experience while using our service. Our expert staff are hard at work 24/7 to keep the servers running at optimal speed so when you use Empyrean, 
                    expect next to no lag at all! In the future, Empyrean plans to update our service to further improve our service and to add even more games to our library,
                    so please be on the lookout. Think different, think Empyrean!
                    </P>
                </div>
            </td>
        </tr>
    </table>
    <table class="bottom">
        <tr>
            <td class="ExInfoCell">
                <div class="ExInfo">
                    <h1>Support Hours</h1>
                    <p><b>Mondays - Fridays</b>: 9 a.m. - 9 p.m. GMT</p>
                    <p><b>Saturdays - Sundays</b>: 9 a.m. - 7 p.m. GMT</p>
                </div>
            </td>
            <td class="ExInfoCell">
                <div class="ExInfo">
                    <h1>Contact Us</h1>
                    <p><b>Email: </b><a href="mailto:empyrean@gmail.com">empyrean@gmail.com</a></p>
                    <p><b>Phone: </b><a href="tel:+60111111111">011-111 1111</a></p>
                </div>
            </td>
        </tr>
        </table>
        <table class="last">
        <tr>
            <td colspan="2" class="bottomer">
                <p>Can't solve your issues? Come visit us!</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.7609491890316!2d100.28229421022696!3d5.453210534652616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac2c0305a5483%3A0xfeb1c7560c785259!2sTAR%20UMT%20Penang%20Branch!5e0!3m2!1sen!2smy!4v1695395895526!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </td>
        </tr>
    </table>
    @include('footer')
   </body>
</html>