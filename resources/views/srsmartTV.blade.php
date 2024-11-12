<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/css/srequirement.css" rel="stylesheet"/>
        <title>Smart TV Requirements</title>
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
                <td onclick="location.href='{{url('srandroid')}}'">Android</td>
            </tr>
        </table>
    <article>
        <h2>TV Requirements</h2>
            <ul>
                <li>Select 2021/2022/2023 LG TVs with the latest webOS firmware and LG TV browser updates.</li>
             <li>2021/2022/2023 Samsung TVs.  Please read this knowledgebase for more information.</li>
            </ul>
        <br>

        <h2>Gamepads</h2>
        <p>You must use a supported gamepad to play games. You can only use a physical keyboard and mouse to navigate the app.</p>
            <ul>
                <li>NVIDIA SHIELD controller connected using Bluetooth</li>
                <li>All Microsoft Xbox Wireless controllers using Bluetooth or USB</li>
                <li>Microsoft Xbox 360 connected wireless using a USB adapter or USB</li>
                <li>Sony PS5 DualSense connected using Bluetooth or USB</li>
                <li>Sony DualShock 4 connected using Bluetooth or USB</li>
                <li>Logitech Gamepad F310 and F710</li>
            <p><strong>Note: you must set the controller to work in (DirectInput mode) on LG TVs and (XInput mode) on Samsung TVs</strong></p>
            <p><strong>Note: the nano-receiver must be connected to a USB port that delivers enough power, such as a powered USB hub</strong></p>
            </ul>
            
        <br>
        <p>Additional gamepads may work with GeForce NOW. Some require additional drivers and/or software updates to function properly.</p>
        <br>

        <h2>Keyboard And Mice</h2>
        <p>You can only use a physical keyboard and mouse to navigate the app.  You must use a supported gamepad to play games on TVs.</p>
        <br>

        <h2>Internet Requirements</h2>
        <p>GeForce NOW requires at least 15Mbps for 720p at 60 FPS, 25Mbps for 1080p at 60 FPS and 40Mbps for 4K at 60 FPS. We also require less than 80ms
             latency from an NVIDIA data center. However, for the best experience, we recommend less than 40ms. Please read this knowledge base article on 
             how to test your network.</p>
         <br>
        <p>We also recommend a hardwired Ethernet connection, or a 5GHz wireless router.  2.4GHz Wi-Fi is not recommended for using GeForce NOW.</p>
        <br>

        <h2>Audio Support</h2>
        <p>We support 2-channel stereo on TVs.</p>

    </article>
    @include('footer')
    </body>
  
</html>