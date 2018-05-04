<?php
session_start();

$_SESSION['fullname'] = $_SERVER["SHIB_cn"];
$_SESSION['displayName'] = $_SERVER["SHIB_displayName"];
$_SESSION['eppn'] = $_SERVER["SHIB_eppn"];
$_SESSION['mobile'] = $_SERVER["SHIB_mobile"];
?>


<?php
// To define the database connection settins
require_once "--**--";


// Connection to SQL
function connectSQL ($palvelin, $tietokanta = null) {
  $db = new PDO("pssql:host=$palvelin;dbname=$tietokanta", DB_USER, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  return $db;
}


// Check if the user exist using the unique session variable
function checkUser() {
  $connectDb = connectSQL();
  $uniqueID = $_SERVER["SESSION_VARIABLE"];
  
      try {
          $sql = "SELECT * FROM Users 
       WHERE REMS_UNIQUE_ID = $uniqueID";
       
          if (!$stmt = $connectDb->prepare($sql)) {
              throw new Exception("checkUser search failed 1.", 2);
          }
          if (!$stmt->execute()) {
              throw new Exception("checkUser search failed 2.", 3);
          }

          $haku = $stmt->fetchObject(); // return one line  
  
      } catch (Exception $error) {
          ob_end_clean();
          return $error;
      }
      return $query;
  }

// if rows are found, user exists and it will direct the user to the main page. Else continue to the registration.
if( $query->rowCount() > 0 ) { 
  Header("Location: ../main.php");
}
else {

}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="assets/css/stylesheet.css">
<link rel="stylesheet" href="assets/fa/css/font-awesome.min.css">
</head>

<body>


<div class="register-form w3-display-middle">
<form name="registration_form" <form method="POST" action="<?php echo htmlspecialchars('assets/php/action_page.php');?>">
<div class="w3-container w3-card-4 w3-text-isaacus-turquoise w3-margin">
<h2 class="w3-center">Rekisteröidy uutena käyttäjänä</h2>

<div class="w3-row w3-section">

</div>

 <div class="w3-row-padding">
  <div class="w3-half">
    <label>Etunimi</label>
    <input class="w3-input w3-border" name="firstname" type="text" value="fixed" required readonly="readonly">
  </div>
  <div class="w3-half">
    <label>Sukunimi</label>
    <input class="w3-input w3-border" name="lastname" required type="text">
  </div>
</div> 

<div class="w3-row-padding w3-section">
    <div class="w3-rest">
    <label>Sähköposti</label>
      <input class="w3-input w3-border" name="email" type="email" required value="">
    </div>
</div>

<div class="w3-row-padding w3-section">
    <div class="w3-rest">
    <label>Puhelinumero</label>
      <input class="w3-input w3-border" name="mobile" type="tel" required value="">
    </div>
</div>

<div class="w3-row-padding w3-section">
    <div class="w3-rest">
    <label>Organisaatio</label>
      <input class="w3-input w3-border" name="organisation" type="text" required value="">
    </div>
</div>


<div class="w3-row-padding w3-section">
  <div class="w3-rest w3-padding-16 w3-padding-large">
  <input id="terms" type="checkbox" required name="terms"><label for="terms"> Hyväksyn palvelun <a target="_blank" href="https://csc.fi">käyttöehdot</a></label>
  </div>
</div>


<p class="w3-center">

<button class="w3-button w3-section w3-isaacus_turquoise w3-ripple"> Lähetä </button>

</div>
</p>
</form>
</div>

</body>
</html> 