<?php
    // Page principale du site (page sur laquelle l'utilisateur arrive près s'être connecté)
    session_start();
    require('../Classes/ManipBDD.php');

?>
<!DOCTYPE html>
<link href="pageLogin.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
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
            $result=$db->getListes($_SESSION["username"]);
            while($row = mysqli_fetch_array($result))
            {
                echo "<li>";
                echo ($row["nom_liste"].'('.$row["droit"]);
                echo "</li>";
            }
            ?>
        </ol>
    </body>
</html>
