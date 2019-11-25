<!-- PAGE AFFICHANT LES LISTES / APRES S'ETRE CONNECTÉ -->
<?php
include('../Classes/ManipBDD.php');
session_start();
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
            $result=$db->getListes($_SESSION["username"]);
            ?>
        </ol>
        <form action="../Scripts/accesTaches.php" method="post" id="boutonDeconnnexion">
            <p><input type="submit" value="AccesTaches" class="bouton"/></p>
        </form>
    </body>
</html>
