<?php 
// To define the database connection settins
require_once "--**--";


$host = $_SERVER['HTTP_HOST'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$organisation = $_POST['organisation'];
$userinfo = array(
    "firstname" => $_POST['firstname'],
    "lastname" => $_POST['lastname'],
    "email" => $_POST['email'],
    "mobile" => $_POST['mobile'],
    "organisation" => $_POST['organisation']
);

// Transform userdata to json object.    

$fieldJson = json_encode($userinfo);

 // Connect to sql server

 function connectSQL ($palvelin, $tietokanta = null) {
    $db = new PDO("pssql:host=$palvelin;dbname=$tietokanta", DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $db;
}

// REMS ID is the unique ID of each user provided by the IDP.

    function createUser($SESSION_VARIABLE, $userinfo) {
        $return = "";
        $db = connectSQL();
        try {
        $sql = "INSERT INTO users (REMS_ID, fieldJson) VALUES (:REMS_ID, :bindJson)";
        if (!$stmt = $db->prepare($sql)) {
            throw new Exception("createUser ei onnistunut 1. ", 2);
        }
        $stmt->bindParam(":REMS_ID", $SESSION_VARIABLE);
        $stmt->bindParam(":bindJson", $fieldJson);
    
    if (!$stmt->execute()) {
                throw new Exception("createUser ei onnistunut 1 $SESSION_VARIABLE $fieldJson", 2);
            }
            $return =  $db->lastInsertId();
        } catch (Exception $error) {
            $return = $error->getMessage();
            return $return;
        }
    return $return;
    }


Header("Location: https://$host/isaacus/registration.php");

?>

