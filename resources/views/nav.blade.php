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
  <script src="https://kit.fontawesome.com/023ef1cfd5.js" crossorigin="anonymous"></script>
        <!--ABOVE IS TO IMPORT USER ICON SYMBOLS-->
  <script>
  if(performance.navigation.type == 2){
    location.reload(true);
  }
  </script>
  <script src="/js/nav.js" defer></script>
</head>
<body style="margin:0px 0px 0px 0px;"><div class="navbar">
    <a href="{{ url('/') }}"><img src="/media/image.png" width="52px" height="50px"></a>
    <a href="{{ url('/') }}">EMPYREAN</a>
    @if(Route::currentRouteName()=='home'||Route::currentRouteName()=='users.index'||Route::currentRouteName()=='payments.index'||Route::currentRouteName()=='subscriptions.index'||Route::currentRouteName()=='subscribe'||Route::currentRouteName()=='profile'||Route::currentRouteName()=='discounts.index')
      @if(session('success'))
          <div id="status" style="color: #FFF;">{{session('success')}}</div>
          <script>document.addEventListener('DOMContentLoaded', function() {
            statusAnimation();
          });</script>

      @elseif(session('message'))
          <div id="status" style="color: #FFF">{{session('message')}}</div>
          <script>document.addEventListener('DOMContentLoaded', function() {
            statusAnimation();
          });</script>

      @elseif(session('error'))
          <div id="status" style="color: #FF8886;">{{session('error')}}</div>
          <script> document.addEventListener('DOMContentLoaded', function() {
            statusAnimation();
          });</script>
      @endif
    @endif
    <div class="dropdown">
      @if(Auth::guard('admin')->check())
        <button class="dropbtn" id="profilePic"><img src="/media/admin.png" width="54px" height="54px"/></button>
        <div class="dropdown-content" id="imgdropdown">
          <a href="{{ route('admins.profile') }}" id="profileLink" style="font-size: 14px;"><p id="time"></p><p id="username">{{ Auth::guard('admin')->user()->name }}</p></a>
          <form action="{{route('admins.logout')}}" method="POST" class="logoutForm">
            @csrf
            <button id="logout" type="submit"><a>Logout</a></button>
          </form>
        </div>
      @elseif(Auth::guard('user')->check())
        <button class="dropbtn" id="profilePic"><img src="/media/profilepic.jpg" width="54px" height="54px"/></button>
        <div class="dropdown-content" id="imgdropdown">
          <a href="{{ url('/profile') }}" id="profileLink" style="font-size: 14px;"><p id="time"></p><p id="username">{{ Auth::guard('user')->user()->name }}</p></a>
          <form action="{{route('users.logout')}}" method="POST" class="logoutForm">
            @csrf
            <button id="logout" type="submit"><a>Logout</a></button></form>
        </div>
      @else
        <button class="dropbtn" id="profilePic"><i class="fa-regular fa-user nav"></i></button>
        <div class="dropdown-content" id="imgdropdown">
          <a href="{{ url('/sign_in') }}" style="font-size:16px;">Login</a>
          <a href="{{ url('/sign_up') }}" style="font-size:16px;">Register</a>
        </div>
      @endif
    </div>
    <div class="dropdown">
      <button class="dropbtn">Company</button>
      <div class="dropdown-content" id="compadj">
        <a href="{{url('/aboutUs')}}">About Us</a>
        <a href="{{url('/acknowledgements')}}">Acknowledgements</a>
        @if(Auth::guard('admin')->check())
          <a href="{{url('/admin')}}">Admin Dashboard</a>
        @endif
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Support</button>
      <div class="dropdown-content">
        <a href="{{url('/srwindowpc')}}">Requirements</a>
        <a href="{{url('/support')}}">FAQ</a>
        <a href="{{url('/instructions')}}">Instructions</a>
        <a href="{{url('/legal')}}">Legal</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Products</button>
      <div class="dropdown-content">
        <a href="{{url('/gamelibrary')}}#searchBar">Library</a>
        <a href="{{url('/buyingPass')}}#passes">Subscriptions</a>
        <a href="{{url('/buyingPass')}}">News</a>
        <a href="{{url('/gamelibrary')}}">Promotion</a>
      </div>
    </div>
    <a href="{{ url('/') }}" class="home">Home</a>
  </div>
  </body>
</html>