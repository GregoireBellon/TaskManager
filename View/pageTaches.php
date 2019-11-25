<?php
    //Page dédié à l'affichage de tâches d'un utilisateur

include_once("../Classes/Liste.php");
include_once("../Classes/Tache.php");

    session_start();

    //$taches = $_GET[$_GET['']]
$listes = $_SESSION['listes'];

if($_GET['id']!=null) {

    $_SESSION['id_liste_actuelle'] = $_GET['id'];

}
    $liste = $listes[$_SESSION['id_liste_actuelle']];


$taches = $liste->getTaches();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Tâches <?php echo $liste->getNom()?></title>
</head>
<html>
<body>
<form action="../Scripts/retourHome.php" method="post" id="boutonRetour">
    <p><input type="submit" value="Retour" class="bouton"/></p>
</form>
<h1>Voici vos Taskys, <?php echo $_SESSION["username"]?> !</h1>


    <?php

foreach ($taches as $t) {

    echo $t->afficherTache();
}

 ?>
<form action="./pageAjoutTache.php" method="get">
    <input type="submit" value="Ajouter une tâche">
</form>
</body>
</html>
