<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/css/srequirement.css" rel="stylesheet"/>
        <title>System Requirements</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/media/image.ico" type="image/x-icon">
        <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
    </head>
    <body>
    @include('nav')
    <div class="bigtitle">
        <h1 stytle="text-align:center; padding-top:100px;">System Requirements</h1>
    </div>
    <table style="width: 100%">
        <tr>
            <td onclick="location.href='{{url('sandroid')}}'">Android</td>
            <td onclick="location.href='{{url('srwindowpc')}}'">Windows PC</td>
            <td onclick="location.href='{{url('srchromeOS')}}'">Chrome OS</td>
            <td onclick="location.href='{{url('srbrowser')}}'">Browser</td>
            <td onclick="location.href='{{url('srsmartTV')}}'">SmartTV</td>
        </tr>
    </table>

    <article>
        <p>Your MacOS must be 10.11 or higher. </p>
        <br>

        <h2>Internet Requirements</h2>
        <p>Empyrean requires at least 15Mbps for 720p at 60 FPS and 25Mbps for 1080p at 60 FPS. We also require less than 80ms latency from an NVIDIA data centre. 
            However, for the best experience, we recommend less than 40ms. You can use this link to test you Internet speed 
            <a href="https://www.speedtest.net/performance/malaysia">https://www.speedtest.net/performance/malaysia</a>
            </p>
        <br>

        <h2>Keyboards And Mice</h2>
        <p>Most built-in or USB keyboards work fine.</p>
        <p>We recommend a USB gaming mouse for PC and Mac. Mac users should look for a dedicated gaming mouse as the Apple Magic Mouse doesn’t have dedicated 
           left/right buttons and a scroll wheel,which are usually needed for games.  Logitech and Razer offer many different options. If you are using a 
           mouse and experiencing stutters, you can try adjusting your  mouse to a lower polling rate (125Hz) to eliminate stutters.</p>
        <br>

        <h2>Monitors</h2>
        <p>Most monitors work fine for all membership types. To unlock HDR benefits with the Ultimate membership tier, you must use a monitor that supports
          the HDR10 format.</p>
        <br>
        <h2>Mac Hardware Requirements</h2>
        <p>Any Mac system introduced in 2009 or later.</p>
        <br>
        <h2>Audio Support</h2>
        <p>We support 2-channel stereo for Free Memberships. Priority memberships support stereo and 5.1 surround. Empyrean memberships can support 2-channel
            stereo, 5.1 surround, and 7.1 surround.</p>
    </article>
    @include('footer')
    </body>    
   
</html>