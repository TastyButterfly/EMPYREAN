<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="../css/home_style.css">
    <script src="/js/account.js"></script>
    <title>EMPYREAN</title>
    </head>
    <link rel="icon" href="/media/image.ico" type="image/x-icon">
    <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
<body>
@include('nav')
<div id="home">
<section>
<div class="slideshow-container">

  <div class="mySlides">
    <img src="/media/valorant.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="/media/league-of-legend.jpeg" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="/media/genshin.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="/media/crysis.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="/media/assasincreed.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="/media/fortnite.jpg" style="width:100%">
  </div>

  <div class="overlay">
    <div class="text">Expand Horizons with <span id="empyrean"><i>EMPYREAN</i></span> <br> in the Cloud</div>

    <div class="joinempyrean">
      <a href="{{url('/sign_up')}}">
      <button id="joinus">Join Us Now</button>
      </a>
    </div>

  </div>

</div>
</section>  
<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides"); 
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}
  </script>

<section class="game-catalogue">
<div class="game-catalogue">
 <h1>Game Catalogue</h1>
 <ul>

<li>
  <a href="/media/valorant_info.html"><img src="/media/valorantgame1.jpg"></a>
<p class="gameName">Valorant<p>
<p class="gameDsc">A free-to-play first-person tactical hero shooter developed and published by Riot Games<p>
</li>

<li>
  <a href="../gamelibrary/gamelibrary.html"><img src="/media/genshingame2.jpg"></a>
  <p class="gameName">Genshin Impact<p>
  <p class="gameDsc">An action role-playing game developed by miHoYo<p>
</li>

<li>
  <a href="../gamelibrary/assassinCreed_info.html"><img src="/media/assasincreedgame3.jpg"></a>
  <p class="gameName">Assasin Creed Rogue<p>
  <p class="gameDsc">An open-world, action-adventure, and stealth game franchise published by Ubisoft<p>
</li>

</ul>

<div class="button-field">
  <a href="../gamelibrary/gamelibrary.html">
  <button id="moregames">More Games</button>
  </a>
</div>

</div>
</section>

<section class="fortnitevideo">
<div id="fortnitevideo">
  <video width="550" height="350" autoplay loop muted>
    <source src="/media/yt5s.io-Fortnite Chapter 4 Season 4 LAST RESORT Gameplay Launch Trailer.mp4"/>
  </video>  
</div>

<div id="fortnitevideodsc" >
<h1 style="text-align: center;">
Play anywhere with <b><i>EMPYREAN</i></b>
</h1>
<p style="text-align: center;">
Empyrean's remote access tech is tested on the most demanding media: games.
Connect to your own computer on the go,
share a link to collaborate or play co-op games with your friends.
</p>

<div class="joinbutton-field">
  <a href="{{url('sign_up')}}">
  <button id="joinus">Join Us Now</button>
  </a>
</div>

</div>
</section>

<section id="onAllDevice">
  <div id="devices">
  <h1>Cloud Gaming on All Your Devices</h1>
  <p style="font-size: 20px;"><b><i>EMPYREAN</i></b> instantly transforms nearly any laptop, desktop, Mac, SHIELD TV, Android device, iPhone, or iPad into the 
    PC gaming rig you've always dreamed of. Play the most demanding PC games and seamlessly play across your devices.</p>
  </div>

<ul id="devicelist">
  <li>
    <img src="/media/laptop-removebg-preview.png">
    <p>Windows Pc</p>
  </li>

  <li>
    <img src="/media/tvicon-removebg-preview.png">
    <p>SHIELD TV</p>
  </li>

  <li>
    <img src="/media/smartphoneicon-removebg-preview.png">
    <p>Android / iOS</p>
    </li>

  <li>
  <img src="/media/chromeicon-removebg-preview.png">
  <p>Chrome</p>
  </li>
  
  <li>
    <img src="/media/edge.png">
    <p>Edge</p>
  </li>


</ul>
</section>

<section class="assasincreedvideo">
  <div id="assasincreedvideo">
    <video width="550" height="350" autoplay loop muted>
      <source src="/media/yt5s.io-Assassin's Creed Mirage_ PC Features Trailer.mp4"/>
    </video>  
  </div>
  
  <div id="assasincreedvideodsc" >
  <h1 style="text-align: center;">
  <b><i>Get Playing</i></b>
  </h1>
  <p style="text-align: center;">
    Join <b><i>EMPYREAN</i></b> and upgrade your membership 
    for faster access to our cloud gaming servers and extended gameplay sessions.
  </p>
  
  <div class="subsbutton-field">
    <a href="{{url('buyingPass')}}#passes">
    <button id="subscription">See Subscription Options</button>
    </a>
  </div>
  
  </div>
  </section>
</div>
@include('footer')
</body>
</html>