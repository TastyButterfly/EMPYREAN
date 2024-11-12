<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/css/srequirement.css" rel="stylesheet"/>
        <title>Chrome OS Requirements</title>
        <link rel="icon" href="/media/image.ico" type="image/x-icon">
        <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
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
                <td onclick="location.href='{{url('srandroid')}}'">Android</td>
                <td onclick="location.href='{{url('srbrowser')}}'">Browser</td>
                <td onclick="location.href='{{url('srsmartTV')}}'">SmartTV</td>
            </tr>
        </table>
    <article>
        <p>All versions of ChromeOS since release are supported. Though we do recommend using at least Chrome version 100.01 for the best experience.</p>
        <h2>Keyboards And Mice</h2>
        <p>Most built-in or USB keyboards work fine.</p>
        <p>We recommend a USB gaming mouse for PC and Mac. Logitech and Razer offer many different options. If you are using a mouse and experiencing
         stutters, you can try lowering your mouse polling rate (125Hz) to eliminate stutters.</p>
        <h2>Monitors</h2>
        <p>Most monitors work fine for all membership types. To unlock HDR benefits with the Ultimate membership tier, you must use a monitor that 
            supports the HDR10 format.</p>
        <h2>PC Hardware Requirements</h2>
            <ul>
               <li>Dual core x86-64 CPU with 2.0GHz or faster </li>
               <li>2GB of system memory</li>
               <li>GPU that at least supports DirectX 10</li>
               <li>AMD Radeon HD 3000 series or newer</li>
               <li>Intel HD Graphics 2000 series or newer</li>
            </ul>
    </article>
    @include('footer')
    </body>
</html>