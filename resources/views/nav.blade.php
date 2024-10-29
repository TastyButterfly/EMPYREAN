<!DOCTYPE html>
<html>
<head>

  <style>.async-hide { opacity: 0 !important} </style>
  <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
  h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
  (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
  })(window,document.documentElement,'async-hide','dataLayer',100,
  {'CONTAINER_ID':true});</script>
<!---GOOGLE'S ANTI FLICKER SOLUTION, CAUSES FLICKERING BUT GIVES TIME FOR PC TO LOAD CSS AND JS-->
  <link href="/css/nav.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="/js/nav.js"></script>
  <script src="https://kit.fontawesome.com/023ef1cfd5.js" crossorigin="anonymous"></script>
        <!--ABOVE IS TO IMPORT USER ICON SYMBOLS-->
  <script>
  if(performance.navigation.type == 2){
    location.reload(true);
  }
  </script>
</head>
<body style="margin:0px 0px 0px 0px;"><div class="navbar">
    <a href="{{ url('/') }}"><img src="/media/image.png" width="52px" height="50px"></a>
    <a href="{{ url('/') }}">EMPYREAN</a>
    <div class="dropdown">
      <button class="dropbtn" id="imgdropbtn"><div id="image"></div></button>
      <div class="dropdown-content" id="imgdropdown">
        <a style="line-height: 5px;" id="profileLink"><div id="profile"></div><p id="username"></p></a>
        <a id="profile2">Login</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Company</button>
      <div class="dropdown-content" id="compadj">
        <a href="{{url('/AboutUs')}}">About Us</a>
        <a href="../acknowledgement/acknowledgements.html">Acknowledgements</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Support</button>
      <div class="dropdown-content">
        <a href="../requirements/s.rwindowpc.html">Requirements</a>
        <a href="../support/support.html">FAQ</a>
        <a href="../instructions/instructions.html">Instructions</a>
        <a href="../legal/legal.html">Legal</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Products</button>
      <div class="dropdown-content">
        <a href="../gamelibrary/gamelibrary.html#searchBar">Library</a>
        <a href="../game-pass/buyingPass.html#passes">Subscriptions</a>
        <a href="../game-pass/buyingPass.html">News</a>
        <a href="../gamelibrary/gamelibrary.html">Promotion</a>
      </div>
    </div>
    <a href="{{ url('/') }}">Home</a>
  </div>
  </body>
</html>