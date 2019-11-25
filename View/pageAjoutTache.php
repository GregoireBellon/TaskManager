<?php
session_start();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajout de tâche</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="../Scripts/ajout_tache.php" method="get">

    <h1>Ajouter une tâche</h1>
    Nom : <input type="text" name="nom"> <br>
    Description :  <input type="text" name="description"> <br>
    Date début : <input type="date" name="date_deb"><br>
    Date de fin : <input type="date" name="date_fin"><br>
    Statut : <input type="text" name="statut"><br>
    <input type="submit" value="Ajouter">
</form>
<br>
<form action="pageTaches.php">
    <input type="submit" value="Annuler">
</form>

</body>
</html>