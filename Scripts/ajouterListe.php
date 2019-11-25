<?php
    session_start();
    include("../Classes/Liste.php");
    if ($_POST['nom_liste'] != "Ajouter Liste" and $_POST['nom_liste'] != null) {
        $liste = new Liste(FALSE, $_POST['nom_liste'], date("y-m-d"), FALSE);
        $liste->sauvListe();
        header("../View/pageAccueil.php");
    }
?>

<!DOCTYPE html>
<link href="style.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une liste</title>
</head>
<html>
    <form method="post" action = "ajouterListe.php">
        <input type="text" name="nom_liste" placeholder="Nom de la liste">
        <input type="submit" value="Créer la liste">
    </form>
</html>