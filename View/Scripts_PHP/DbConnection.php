<?php
session_start();
include_once('TestConnexionDb.php');

    $db = new PDO("$server:host=$host;dbname=$base", $user, $password);
    $user = $_SESSION["username"];
    $pass = $_SESSION["password"];
    $sql = "SELECT * FROM Utilisateur WHERE nom_user = '$user' AND mdp_user = '$pass';";
    $result = $db->query($sql);
    $data = $result->fetch();
    if ($result) {
        header('Location: ../Pages/taskList.php');
    } else {
        echo "Login ou mot de passe incorrect :-(";
    }
    $sql = "";


?>