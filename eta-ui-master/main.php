<?php
// Starting session
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Main page</title>
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="assets/css/stylesheet.css">
<link rel="stylesheet" href="assets/fa/css/font-awesome.min.css">

</head>

<body>
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> 
  <div class="w3-center w3-isaacus-turquoise">
  <h1 class="w3-xxxlarge w3-text-white">isaacus</h1>
  <h4 class="w3-text-white">Kuvausteksti palvelusta</h4>
  </div>
</header>


<?php

// Connect to sql server

function connectSQL ($palvelin, $tietokanta = null) {
  $db = new PDO("pssql:host=$palvelin;dbname=$tietokanta", DB_USER, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  return $db;
}

function fetchProjects() {
  $connctDb = connectSQL();
  
      try {
          $sql = "SELECT * FROM applications where rems_unique_ID = $uniqueID";
          if (!$stmt = $connectDb->prepare($sql)) {
              throw new Exception("fetchProjects haku ei onnistunut 1.", 2);
          }
          if (!$stmt->execute()) {
              throw new Exception("fetchProjects haku ei onnistunut 2.", 3);
          }
          $result = $stmt->fetchAll(); //return all the rows
  
  
      } catch (Exception $error) {
          ob_end_clean();
          return $error;
      }
      return $result;

      foreach ($result as $row) {
        print $row["name"] . "-" . $row["sex"] ."<br/>";
    }
  }

echo " <div class=\"w3-row-padding w3-center\">
<div class=\"w3-quarter\">
  <div class=\"w3-card w3-container w3-animate-bottom w3-margin-bottom\" style=\"min-height:300px\">
  <h3>".$row['application_header']."</h3><br>
  <a href=".$row['application_url']." Title=\"Yhdistä\"<i class=\"fa fa-desktop w3-margin-bottom w3-text-theme\" style=\"font-size:100px; text-decoration:none\"></i></a>
  <p>".$row['application_description']." </p>
  </div>
</div>"

?>
<div class="w3-row-padding w3-center w3-margin-top w3-margin-bottom">
<div class="w3-container">
  <div class="w3-card w3-container w3-animate-bottom" style="min-height:300px">
  <h3>Hallintapaneeli</h3><br>
  <a href="https://eta.csc.fi/rems" Title="Yhdistä"<i class="fa fa-map w3-margin-bottom w3-text-theme" style="font-size:100px; text-decoration:none"></i></a>
  <p>Hallintapaneelissa voit luoda uusia hakemuksia ja <br/> Kuvaus hallintapaneelista ja ominaisuuksista.  </p>
  </div>
</div>

</body>
</html>
