<html>
    <head>
        <link href="/css/footer.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <!--ABOVE IS TO IMPORT SOCIAL MEDIA SYMBOLS-->
    </head>
    <footer>
        <div style="height:30px;width:100%;background-color:#182841"></div>
        <div id="company">
            <img src="/media/image.png" width="100px" height="100px" class="footer">
            <br><h1 class="footer">EMPYREAN <span class="footer">inc.</span></h1>
            <h2 class="footer">2023 All Rights Reserved.</h2>
            <h3 class="footer">Contact us:</h3>
            <div class="social-links">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.discord.com" target="_blank"><i class="fab fa-discord"></i></a>
            </div>
            <address class="footer">58, Persiaran Kota Permai 3, Taman Kota Permai, 14000 Bukit Mertajam.</address><br>
        </div>
        <div id="directory">
            <table id="footer">
                <tr>
                    <th>Products<hr></th>
                    <th>Company<hr></th>
                    <th>Support<hr></th>
                </tr>
                <tr>
                    <td onclick="location.href='{{url('buyingPass')}}'">Subscription Plans</td>
                    <td onclick="location.href='{{url('/aboutUs')}}'">About Us</td>
                    <td onclick="location.href='{{url('/support')}}'">Common Problems/FAQ</td>
                </tr>
                <tr>
                    <td onclick="location.href='{{url('/gamelibrary')}}'">Game Library</td>
                    <td onclick="location.href='{{url('/acknowledgements')}}'">Acknowledgements</td>
                    <td onclick="location.href='{{url('/instructions')}}'">Instructions</td>
                </tr>
                <tr>
                    <td class="notd"></td>
                    <td onclick="location.href='{{url('/srwindowpc')}}'">Requirements</td>
                    <td onclick="location.href='{{url('/legal')}}'">Legal</a></td>
                </tr>
                <tr>
                    <td class="notd"></td>
                    @if(Auth::guard('admin')->check())
                        <td onclick="location.href='{{url('/admin')}}'">Admin Dashboard</td>
                    @else
                        <td onclick="location.href='{{url('/admin_sign_in')}}'">Admin Portal</td>
                    @endif
            </table>
        </div>
    </footer>
</html>