<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="/css/glibrary.css">
        <title>Empyrean Game Library</title>
    </head>

    <body>
        @include('nav')
        <section>
        <div id="home">
            <section>
            <div class="slideshow-container">
            
              <div class="mySlides">
                <img src="/media/halloween1.jpg" style="width:100%">
              </div>
            
              <div class="mySlides">
                <img src="/media/black friday.png" style="width:100%">
              </div>
            
              <div class="mySlides">
                <img src="/media/wintersales1.jpg" style="width:100%">
              </div>
            </div>

            <div id="overlay">
                <a href="#gamelibrary">
                    <button id="viewgame">Game Library</button>
                    </a>
            </div>
        </div>
        <script>
            let slideIndex = 0;
            showSlides();
          
            function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides"); 
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 3000); // Change image every 3 seconds
          }
        </script>
        </section>

        <section>
            <div id="head">
                <p>
                    <h1 id="gamelibrary">Game Library</h1>
                </p>
                <p class="info">
                    Those newest 6 games will be refreshed <em>every Friday</em> - our dedicated day <br> for highlighting the newest games, features and news.
                </p>
                <p class="info" style="font-size:15px">*You may search for other games available in our library*</p>
            </div>

            <div class="searchbar">
                <form id="searchBar">
                    <label for="input"></label>
                    <input type="text" id="input" class="searchBar" placeholder="Game Search" style="width: 500px; height: 40px; 
                    background-color: rgba(0, 0, 0, 0.2); margin-left: 390px; margin-top: 20px;"/>
                </form>
            </div>
        </section>

        <section class="gameTable">
            <ul class="gameTable1">
                        <li class="gamelist">
                        <h3>A</h3>
                        <img src="/media/assassin-creed.jpg" style="width: 200px; height: 240px"/>
                        <div class="tooltip" >
                            <a href="assassinCreed_info">Assassin's Creed</a>
                            <span class="tooltiptext">
                                <h4>Assassin's Creed</h4>
                                <img src="/media/assassin-creed.jpg" style="width: 100px; height: 150px"/>
                                <p>The Assassin's Creed games are centered around one or more fictional members of the Order of the Assassins. 
                                    Their memories are experienced by an in-game character in the modern-day period through a device called the 
                                    Animus and its derivations. The Animus allows the user to explore these memories passed down via genetics. 
                                    Within the context of the game, this provides a diegetic interface to the real-world player of the game, 
                                    showing them elements like health bars, a mini-map, and target objectives as if presented by the Animus.</p>
                            </span>
                        </div>
                        </li>
                
                    <li class="gamelist">
                        <h3>C</h3>
                        <img src="/media/Crysis_Cover.jpg" style="width: 200px; height: 240px"/>
                        <div class="tooltip">
                            <a href="crysis_info">Crysis</a>
                            <span class="tooltiptext">
                                <h4>Crysis</h4>
                                <img src="/media/Crysis_Cover.jpg" style="width: 100px; height: 150px"/>
                                <p>Crysis is a first-person shooter video game series created by Crytek. The series revolves around a group of 
                                    military protagonists with "nanosuits", technologically advanced suits of armor that give them enhanced 
                                    physical strength, speed, defense, and cloaking abilities. </p>
                            </span>
                        </div>
                    </li>
                    
                    <li class="gamelist">
                        <h3>F</h3>
                        <img src="/media/fortnite.jpg" style="width: 200px; height: 240px"/>
                        <div class="tooltip">
                            <a href="fortnite_info">Fortnite</a> <!--create link-->
                            <span class="tooltiptext">
                                <h4>Fortnite</h4>
                                <img src="/media/fortnite.jpg" style="width: 110px; height: 160px"/>
                                <p>Fortnite is a third-person shooter game where up to 100 players compete to be the last person or team standing. 
                                    You can compete alone or join a team of up to four. You progress through the game by exploring the island, 
                                    collecting weapons, building fortifications and engaging in combat with others.</p>
                            </span>
                        </div>
                    </li>
            </ul>
            <ul class="gameTable2" style="margin-bottom: 300px;">
                    <li class="gamelist">
                        <h3>G</h3>
                        <img src="/media/genshinimpactlist.jpg" style="width: 200px; height: 240px"/>
                        <div class="tooltip">
                            <a href="genshinImpact_info">Genshin Impact</a>
                            <span class="tooltiptext">
                                <h4>Genshin Impact</h4>
                                <img src="/media/genshinImpact_fix.jfif"/>
                                <p>Genshin Impact is a free-to-play RPG with AAA production quality, which is very rare. 
                                    The game itself is focused on single-player aspects, where it's mainly an Open World Action RPG, 
                                    with huge map and tons of things to explore. You can play co-op with max.</p>
                            </span>
                        </div>
                    </li>

                   <li class="gamelist" style="margin-bottom: 300px;">
                        <h3>M</h3> 
                        <img src="/media/minecraft.jpeg" style="width: 200px; height: 240px"/>
                        <div class="tooltip">
                            <a href="minecraft_info">Minecraft</a> <!--minecraft info page-->
                            <span class="tooltiptext">
                                <h4>MInecraft</h4>
                                <img src="/media/minecraft.jpeg" style="width: 95px; height: 120px"/>
                                <p>Minecraft is a 3-D computer game where players can build anything. The game which has been described as like an 
                                    'online Lego' involves building blocks and creating structures across different environments and terrains.</p>
                            </span>
                        </div>
                    </li>
                   
                    <li class="gamelist" style="margin-bottom: 300px;">
                        <h3>V</h3>
                        <img src="/media/valorant_pic.jfif" style="width: 200px; height: 240px"/>
                        <div class="tooltip">
                            <a href="valorant_info">Valorant</a>
                            <span class="tooltiptext">
                                <h4>Valorant</h4>
                                <img src="/media/valorant_pic.jfif" style="width: 110px; height: 150px"/>
                                <p>
                                    Blend your style and experience on a global, competitive stage. You have 13 rounds to attack and defend 
                                    your side using sharp gunplay and tactical abilities. And, with one life per-round, you'll need to think 
                                    faster than your opponent if you want to survive. Take on foes across Competitive and Unranked modes as 
                                    well as Deathmatch and Spike Rush.
                                </p>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        @include('footer')
    </body>
</html>
