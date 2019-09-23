<?php
include_once('TestConnexionDb.php');

$db = new PDO("$server:host=$host;dbname=$base",$user,$password);
$user= $_POST["user"];
$pass = $_POST["mdp"];
$sql = "SELECT * FROM Utilisateur WHERE nom_user = '$user' AND mdp_user = '$pass';";
$result = $db->query($sql);
$data = $result->fetch();
if ($result) {

} else {
    echo "Login ou mot de passe incorrect :-(";
}
$sql="";
?>