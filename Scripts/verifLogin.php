<?php
    // Ce script permet de vérifier que les informations de connexion sont bonnes
    // et redirige l'utilisateur en conséquence.

include("../Classes/ManipBDD.php");
    session_start();
    $db = new ManipBDD();
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];

    if ($db->verifLogin($username,$password)){
        $_SESSION["username"] = $username;
        $_SESSION["id_user"] = $db->getIdUser($username);
        $_SESSION["password"] = "";
        $_SESSION["error_login"] = "";
        header('Location: ../View/pageAccueil.php');
    } else{
        $_SESSION["error_login"] = "Mauvais nom d'utilisateur ou mot de passe";
        header('Location: ../View/pageLogin.php');
    }
?>