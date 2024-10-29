<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Game Pass</title>
        <link href="game_pass.css" rel="stylesheet">
        <script type="text/javascript" src="../jquery.js"></script>
        <script src="../include.js" type="text/javascript"></script>
        <script src="../account.js"></script>
    </head>
    <body>
        <div id="includeNav"></div>
        <div class="title">
            <h1>Catch up with our NEWEST game!</h1>
        </div>
        <div>
            <img src="partyAnimal.jpg" style="width: 100%"/>
        </div>
        <div>
            <h1>PARTY LIKE AN ANIMAL</h1>
        </div>
        <div>
            <p id="info">Fight with or against your friends in Party Animals! <br>Choose your character from a diverse cast of adorable animals as you 
                battle it out across multiple game modes to be the last one left standing in the ultimate competitive brawler. Paw up, 
                grab a plunger and get ready to party like an animal.</p>
                <br>
        </div>
        <div>
            <h1 id="party-game">Gameplay</h1>
        </div>
        <div class="image-container" style="box-sizing: border-box">
            <div class="gameplay">
                <img src="partyAnimal-gameplay1.jpg" style="width: 100%; height: 100%"><br><br>
            </div>
            <div class="gameplay">
                <img src="partyAnimal-gameplay2.jpg" style="width: 100%; height: 100%"><br><br>
            </div>
            <div class="gameplay">
                <img src="partyAnimal-gameplay3.jpg" style="width: 100%; height: 100%"><br><br>
            </div>
            <div class="gameplay">
                <img src="partyAnimal-gameplay4.jpg" style="width: 100%; height: 100%"><br><br>
            </div>
            <div class="gameplay">
                <img src="partyAnimal-gameplay5.jpg" style="width: 100%; height: 100%"><br><br>
            </div>
        </div>

            <!--dots underneath-->
        <div style="text-align: center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>

        <script>
            var myIndex = 0;
            carousel();
            
            function carousel() {
              var i;
              var x = document.getElementsByClassName("gameplay");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              myIndex++;
              if (myIndex > x.length) {myIndex = 1}    
              x[myIndex-1].style.display = "block";  
              setTimeout(carousel, 3000);
            }
        </script>

        <div>
            <h1>About the game</h1><br>
        </div>
        <div class="aboutGame">
            <img src="partyAnimalDeluxe2.1fa3172f-9d13-4764-a1a4-71c7984b8a22.jpg" style="width: 300px; float: left; padding-left: 200px">
            <h2 style="float: left; padding-left: 60px">Party Animals Deluxe Edition</h2>
            <p style="float: left; text-align: left; padding-left: 60px">
                Purchase the Deluxe Edition to receive the following exclusive content:
                <ul style="list-style-type: disc; float:left; text-align: left; padding-left: 100px; line-height: 30px">
                    <li>Nemo Bucks*1300</li>
                    <li>Bathrobe Harry Outfit</li>
                    <li>Bathrobe Coco Outfit</li>
                    <li>Bathrobe Garfat Outfit</li>
                    <li>Golden Nemo Variant & Avatar</li>
                    <li>Golden Macchiato Variant & Avatar</li>
                    <li>Golden Coco Variant & Avatar</li>
                </ul>
            </p>
        </div>
        <div>
            <h1 id="passes" style="padding-left: 17%;">Join Empyrean Game Pass: Discover Your Next Favourite Game</h1>
        </div>
        <table class="threePasses" style="padding-left: 10%;">
            <tr>
                <td class="rectangle" >
                    <h3>PC Game pass</h3>
                    <p>PC Game Pass unlocks a large catalog of PC games</p>
                    <a href="" target="_blank"> <!--link to payment page-->
                        <a href="../payment/Payment1.html"><input type="button" class="click" value="Get"></a>
                    </a>
                    <td class="rectangle">
                        <h3>Ultimate pass</h3>
                        <p>The top-tier service includes online multiplayer on consoles, both the console and PC game catalogs, 
                            plus the newest updated game (*may change every week)<br><br><b>Party Animals Deluxe Edition</b></p>
                        <a href="" target="_blank"> <!--link to payment page-->
                            <a href="../payment/Payment1.html"><input type="button" class="click" value="Get"></a>
                        </a>
                    </td>
                    <td class="rectangle">
                        <h3>Basic</h3>
                        <p>Enabling online play on consoles and access to a small library of specific games with our cloud system</p>
                        <a href="" target="_blank"> <!--link to payment page-->
                           <a href="../payment/Payment1.html"><input type="button" class="click" value="Get"></a>
                        </a>
                    </td>
                </td>
            </tr>
        </table>
        <div id="includeFooter"></div>
    </body>
</html>