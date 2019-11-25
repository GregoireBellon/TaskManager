<?php

?>

<!DOCTYPE html>
<link href="style.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une liste</title>
</head>
<html>
    <form method="get" action = "../Scripts/ajout_liste.php">
        <input type="text" name="nom_liste" placeholder="Nom de la liste">
        <h1>Ajouter la première tâche de votre nouvelle liste !</h1>
        <input type="text" name="nom" placeholder="Nom"> <br>
        <input type="text" name="description" placeholder="Description"> <br>
        <input type="date" name="date_deb" placeholder="Date de Début"><br>
        <input type="date" name="date_fin" placeholder="Date de Fin"><br>
        <input type="text" name="statut" placeholder="Statut"><br>
        <input type="submit" value="Créer la liste">
    </form>
</html>

