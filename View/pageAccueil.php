<?php
    // Page principale du site (page sur laquelle l'utilisateur arrive près s'être connecté)
    session_start();
    //require_once('../Classes/ManipBDD.php');
    require_once('../Classes/Liste.php');
    require_once ('../Classes/Tache.php');

?>
<!DOCTYPE html>
<link href="style.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Page d'Accueil</title>
</head>
<html>
    <body>
        <form action="../Scripts/deconnexion.php" method="post" id="boutonDeconnnexion">
            <p><input type="submit" value="Déconnexion" class="bouton"/></p>
        </form>
        <h1>Bienvenue, <?php echo $_SESSION["username"]?> !</h1>
        <ul>
            <?php

            $db= new ManipBDD();
            $result=$db->listesUtilisateur($_SESSION["username"]);



            while ($row = $result->fetch_row())
            {

                $l = new Liste($row[0]);

                $listes[$l->getId()] = $l;
                $l->afficherListe();
            }
            $_SESSION['listes'] = $listes;
            ?>
        </ul>

<<<<<<< HEAD
        <form action="../Scripts/accesTaches.php" method="post" id="boutonDeconnnexion">
            <p><input type="submit" value="AccesTaches" class="bouton"/></p>
        </form>

    <form action="../Scripts/ajouterListe.php" method="post">
=======
    <form action="Scripts/addList.php">
>>>>>>> 52c5bde38901d507fa0d80a465d67205de58f968

        <input type="submit" value="Ajouter Liste" name = "nom_liste" class="bouton"/> <br>

    </form>

    </body>
</html>
