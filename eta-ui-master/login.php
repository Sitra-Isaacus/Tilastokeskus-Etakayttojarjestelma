<?php
// Starting session
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login page</title>
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="assets/css/stylesheet.css">
</head>

<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="isaacus">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> 
  <div class="w3-center w3-isaacus-turquoise">
  <h1 class="w3-xxxlarge w3-text-white">isaacus</h1>
  <h4 class="w3-text-white">Kuvausteksti palvelusta</h4>
  </div>
</header>


<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
  <div class="w3-card w3-container w3-animate-bottom" style="min-height:460px">
  <i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:100px; text-decoration:none"></i></a>
<img src="assets/img/suomifi.png" height="150px" alt="Suomi.fi" class="w3-image">
<i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:100px; text-decoration:none"></i></a>
  <p>Suomi.fi-tunnistaminen on julkishallinnon asiointipalveluiden yhteinen tunnistuspalvelu. 
      Valitset itse, mitä tunnistustapaa haluat hyödyntää (esim. verkkopankkitunnuksia). </p>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container w3-animate-bottom" style="min-height:460px">
  <h3>HAKA-kirjautuminen</h3><br>
    <?php
        require_once "./assets/js/haka_login_testi.js";
        echo "      <script type='text/javascript' src='https://haka.funet.fi/shibboleth/wayf.php/embedded-wayf.js'></script>";
    ?>
  <p>Haka on Suomen korkeakoulujen yhteinen
käyttäjätunnistusjärjestelmä. Haka on avoin kaikille Suomen
korkeakouluille ja niiden toimintoa tukeville organisaatioille.</p>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container w3-animate-bottom" style="min-height:460px">
  <h3>VIRTU-kirjautuminen</h3><br>
  <?php
        require_once "./assets/js/virtu_login_testi.js";
        echo "      <script type='text/javascript' src='https://virtu-ds.csc.fi/DS/wayf.php/embedded-wayf.js'></script>";
    ?>
  <p>Virtu-käyttäjätunnistusjärjestelmä on Valtion tieto- ja viestintätekniikkakeskus Valtorin palvelu, 
      joka vähentää tarvittavien käyttäjätunnusten määrää valtion yhteisissä tietojärjestelmissä.</p>
  </div>
</div>
</div>

</body>
</html>
