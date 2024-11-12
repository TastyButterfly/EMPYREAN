<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/css/srequirement.css" rel="stylesheet"/>
        <title>Windows Requirements</title>
    </head>
    <body>
        @include('nav')
            <div class="bigtitle">
            <h1 stytle="text-align:center;">System Requirements</h1>
        </div>
        <table style="width: 100%">
            <tr>
                <td onclick="location.href='{{url('srequirement')}}'">mac OS</td>
                <td onclick="location.href='{{url('srandroid')}}'">Android</td>
                <td onclick="location.href='{{url('srchromeOS')}}'">Chrome OS</td>
                <td onclick="location.href='{{url('srbrowser')}}'">Browser</td>
                <td onclick="location.href='{{url('srsmartTV')}}'">SmartTV</td>
            </tr>
        </table>
    <article>
        <p>A 64-bit version of Windows 7, or newer, is required. We recommend using the latest version of Windows 10 Anniversary update.
          We do not support 32-bit versions of Windows.</p>
        <br>
        <h2>Keyboards And Mice</h2>
        <p>Most built-in or USB keyboards work fine.</p>
        <br>
        <p>We recommend a USB gaming mouse for PC and Mac. Logitech and Razer offer many different options. If you are using a mouse and experiencing
         stutters, you can try lowering your mouse polling rate (125Hz) to eliminate stutters.</p>
        <br>
        <h2>Monitors</h2>
        <p>Most monitors work fine for all membership types. To unlock HDR benefits with the Ultimate membership tier, you must use a monitor that 
            supports the HDR10 format.</p>
        <br>
        <h2>PC Hardware Requirements</h2>
            <ul>
               <li>Dual core x86-64 CPU with 2.0GHz or faster </li>
               <li>4GB of system memory</li>
               <li>GPU that at least supports DirectX 11</li>
               <li>AMD Radeon HD 3000 series or newer</li>
               <li>Intel HD Graphics 2000 series or newer</li>
            </ul>
        <br>
        <h2>Audio Support</h2>
        <p>We support 2-channel stereo for Free Memberships. Priority memberships support stereo and 5.1 surround. Empyrean memberships can support 2-channel 
            stereo, 5.1 surround, and 7.1 surround.</p>
            
    </article>
    @include('footer')
    </body>
</html>