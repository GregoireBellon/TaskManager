<?php
    // Page principale du site (page sur laquelle l'utilisateur arrive près s'être connecté)
    session_start();
    //require_once('../Classes/ManipBDD.php');
    require_once('../Classes/Liste.php');

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
        <ol>
            <?php
            $db= new ManipBDD();
            $result=$db->listesUtilisateur($_SESSION["username"]);

            var_dump($result);

            while ($row = $result->fetch_row())
            {
                var_dump($row);
                $l = new Liste($row[0]);
                echo "<li>";
                $l->afficherListe();
                echo "</li>";
            }
            ?>
        </ol>

        <form action="../Scripts/accesTaches.php" method="post" id="boutonDeconnnexion">
            <p><input type="submit" value="AccesTaches" class="bouton"/></p>
        </form>

    <form action="Scripts/addList.php">

        <input type="submit" value="AjouterListe" class="bouton"/> <br>

    </form>

    </body>
</html>
