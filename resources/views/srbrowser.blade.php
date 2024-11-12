<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/css/srequirement.css" rel="stylesheet"/>
        <title>Browser Requirements</title>
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
                <td onclick="location.href='{{url('srandroid')}}'">Android</td>
                <td onclick="location.href='{{url('srsmartTV')}}'">SmartTV</td>
            </tr>
        </table>
    <article>
        <p>Chrome browser 77.x or later for MacOS, Windows, Android, or Chrome OS. Edge Browser 91.xx or later for Windows.</p>
        <br>

        <h2>Keyboard And Mice</h2>
        <p>Most built-in or USB keyboards work fine.</p> 
        <br>

        <p>We recommend a USB gaming mouse for PC and Mac. Logitech and Razer offer many different options.  If you are using a
             mouse and experiencing stutters, you can try lowering your mouse polling rate (125Hz) to eliminate stutters.</p>
        <br>

        <h2>Internet Requirements</h2>
        <p>Empyrean requires at least 15Mbps for 720p at 60 FPS, 25Mbps for 1080p at 60 FPS and 35Mbps for streaming up to  
            2560x1440/2560x1600/3840x1800 at 120 FPS . We also require less than 80ms latency from an NVIDIA data center.
             However, for the best experience, we recommend less than 40ms.You can use this link to test you Internet speed 
             <a href="https://www.speedtest.net/performance/malaysia">https://www.speedtest.net/performance/malaysia</a></p>
        <br>

        <p>Please note 1440p and 120 FPS streaming, available with a GeForce NOW Ultimate membership, needs to be manually
             selected from the GeForce NOW Settings menu. These resolutions and framerates are currently available on Windows, 
             Chrome OS browsers and are not supported when streaming from a browser on macOS, Android, iOS Safari. 4K resolutions 
             are only available on native PC or macOS apps.</p>
        <br>

    </article>
    @include('footer')
    </body>
</html>