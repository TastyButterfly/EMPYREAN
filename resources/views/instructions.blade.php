<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/css/instructions.css" rel="stylesheet"/>
        <title>Instructions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/media/image.ico" type="image/x-icon">
        <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
    </head>

    <body >
    @include('nav')
    <article id="article">
        <h1 style="text-align: center; padding-left: 30px;"><b>Instructions</b></h1>
        <p>Let's Get Started</p>
        <table class="instructions" cellspacing="25" cellpadding="5" style="width: 100%">
            <tr class="icon">
                <td><a href="signup"><img src="/media/user.jpg.svg" alt="user" width="150" height="150"></a></td>
                <td><a href="gamelibrary"><img src="/media/download.jpg.svg" alt="download" width="150" height="150"></a></td>
                <td><a href="subscribe"><img src="/media/payment.jpg.svg" alt="payment" width="150" height="150"></a></td>
                <td><a href="sign_in"><img src="/media/gamelibrary.jpg.svg" alt="game" width="150" height="150"></a></td>
            </tr>

            <tr class="step">
                <td style="text-align: center;"><b>1</b></td>
                <td style="text-align: center;"><b>2</b></td>
                <td style="text-align: center;"><b>3</b></td>
                <td style="text-align: center;"><b>4</b></td>
            </tr>
            <tr class="step1">
                <td style="text-align: center;"><b>Create an account</b></td>
                <td style="text-align: center;"><b>Select game in game library</b></td>
                <td style="text-align: center;"><b>Make payment</b></td>
                <td style="text-align: center;"><b>Get started</b></td>
            </tr>
        </table>
    </article>
    @include('footer')
    </body>
</html>