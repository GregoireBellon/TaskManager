<?php
// Cette classe permet de rediriger l'utilisateur vers la page correspondant au bouton de la page
// de connexion sur lequel il a appuyé.

session_start();
include('../Classes/ManipBDD.php');

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

if (isset($_POST['connecButton'])) {
    error_log("IN CONNECT IF");
    header('Location: verifLogin.php ');
}

elseif (isset($_POST['signButton'])) {
    header('Location: ../View/pageSignin.php');
}
?>
