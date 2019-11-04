<?php
    //Page dédié à l'affichage de tâches d'un utilisateur
    session_start();
?>

<!DOCTYPE html>
<link href="pageTaches.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Youry Taskys</title>
</head>
<html>
<body>
<form action="../Scripts/retourHome.php" method="post" id="boutonRetour">
    <p><input type="submit" value="Retour" class="bouton"/></p>
</form>
<h1>Voici vos Taskys, <?php echo $_SESSION["username"]?> !</h1>
</body>
</html>
