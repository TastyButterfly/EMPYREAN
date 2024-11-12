<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/css/srequirement.css" rel="stylesheet"/>
        <title>Android Requirements</title>
    </head>
    <body>
        @include('nav')
            <div class="bigtitle">
            <h1 stytle="text-align:center;">System Requirements</h1>
        </div>
        <table style="width: 100%">
            <tr>
                <td onclick="location.href='{{url('srequirement')}}'">mac OS</td>
                <td onclick="location.href='{{url('srwindowpc')}}'">Windows PC</td>
                <td onclick="location.href='{{url('srchromeOS')}}'">Chrome OS</td>
                <td onclick="location.href='{{url('srbrowser')}}'">Browser</td>
                <td onclick="location.href='{{url('srsmartTV')}}'">SmartTV</td>
            </tr>
        </table>
    <article>
        <p>An Android phone, or tablet, with 1GB of available memory, Android 5.0 (L) or later, and OpenGL ES2.0 support or higher. </p>
        <br>
        <h2>Internet Requirements</h2>
        <p>Empyrean requires at least 15Mbps for 720p at 60 FPS, and 25Mbps for 1080p at 60 FPS. We also require less than 80ms latency from 
            an NVIDIA data center. However, for the best experience, we recommend less than 40ms. You can use this link to test your Internet 
            speed <a href="https://www.speedtest.net/performance/malaysia">https://www.speedtest.net/performance/malaysia</a></p>
        <br>
        <p>The app does have an onscreen virtual gamepad, but we do not recommend it for long-term gameplay.</p>
    </article>
    @include('footer')
    </body>
   
</html>