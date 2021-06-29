<!DOCTYPE html>
<html>

<head>
     <meta charset='utf-8'>
     <meta http-equiv='X-UA-Compatible' content='IE=edge'>

     <title>Login/Registreer mijn Flowerpower</title>
     <link rel="shortcut icon" href="ING-LOGO.ico" />

     <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

     <meta name='viewport' content='width=device-width, initial-scale=1'>
     <link rel='stylesheet' href="style-loginpage.css">

</head>

<body>
     <header>
          <div class="logo-container">
               <img src="PeaShooter.png" alt="logo" width="80px" height="60px">
               <a href="landingpage.php" class="terug"><i class="lni lni-arrow-left-circle"></i> Terug naar de winkel </a>
          </div>
     </header>
     <main>

          <div class="login-scherm">
               <!-- <div class="aand">
                    <h2 id="LOGIN">MIJN FLOWERPOWER</h2>
                    <h2 id="REG">Account aanmaken</h2>
               </div> -->
               <div class="form-box">
                    <div class="button-box">
                         <div id="btn"></div>
                         <button type="button" class="toggle-btn" onclick="LOGIN()">Particulier</button>
                         <button type="button" class="toggle-btn" onclick="REG()">Registreren</button>
                    </div>
                    <div class="midden-text">
                         <p></p>
                    </div>

                    <form action="login.php" id="LOGIN" class="input-group">
                         <div class="midden-text">
                              <p>Login in Mijn Flowerpower</p>
                         </div>
                         <h4 class="input-text">Gebruikersnaam</h4>
                         <input typ="text" class="input-field" placeholder="Gebruikersnaam" required></input>

                         <h4 class="input-text">Wachtwoord</h4>
                         <input typ="text" class="input-field" placeholder="Wachtwoord" required></input>

                         <input type="checkbox" class="check-box"><span>Onthoud mijn gebruikersnaam</span></input>
                         <button type="submit" class="submit-btn">Inloggen</button>
                    </form>

                    <form action="Registreren.php" id="REG" class="input-group">
                         <div class="midden-text">
                              <p>Account maken</p>
                         </div>
                         <h4 class="input-text">Gebruikersnaam</h4>
                         <input typ="text" class="input-field" placeholder="Gebruikersnaam" required></input>

                         <h4 class="input-text">Wachtwoord</h4>
                         <input typ="text" class="input-field" placeholder="Wachtwoord" required></input>

                         <h4 class="input-text">Herhaal Wachtwoord</h4>
                         <input typ="text" class="input-field" placeholder="Wachtwoord" required></input>

                         <input type="checkbox" class="check-box" required><span>Akkoord met de MIJN FLOWERPOWER voorwaarden</span></input>
                         <button type="submit" class="submit-btn">Account aanmaken</button>
                    </form>


                    <script>
                         var x = document.getElementById("LOGIN");
                         var y = document.getElementById("REG");
                         var z = document.getElementById("btn");


                         function LOGIN() {
                              x.style.left = "50px";
                              y.style.left = "480px";
                              z.style.left = "0px"; //rode onderliner verplaatsen
                         }

                         function REG() {
                              x.style.left = "-450px";
                              y.style.left = "50px";
                              z.style.left = "125px"; //rode onderliner verplaatsen
                         }
                    </script>
               </div>
          </div>
     </main>
</body>

</html>