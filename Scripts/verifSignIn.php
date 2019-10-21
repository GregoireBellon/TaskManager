<?php
    // Cette classe permet de vérifier que le formulaire de création de compte a été rempli correctement.
    // Il ajoute également cet utilisateur à la base de données.
    session_start();
    require("../Classes/ManipBDD.php");
    $bdd = new ManipBDD();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    if ($username == null or $username == ""){
        $_SESSION["username_error"] = "Veuillez entrer un nom d'utilisateur";
        header("Location: ../View/pageSignin.php");
    }

    elseif($password != $password_confirm){
        $_SESSION["password_not_same"] = "Les mots de passe ne sont pas identiques";
        header("Location: ../View/pageSignin.php");
    }

    elseif (!$bdd->verifUniciteUser($username)){
        $_SESSION["username_error"] = "Nom d'utilisateur non disponible";
        header("Location: ../View/pageSignin.php");
    }

    else{
        $bdd->ajouterUtilisateur($username, $password);
        $_SESSION["id_user"] = $bdd->getIdUser($username);
        $_SESSION["username"] = $username;
        $_SESSION["password"] = "";
        $_SESSION["username_error"] = "";
        $_SESSION["password_not_same"] = "";
        header("Location: ../View/pageAccueil.php");
    }


?>
