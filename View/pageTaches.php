<?php
    //Page dédié à l'affichage de tâches d'un utilisateur
    session_start();
    if(!empty($_POST['taches']))$taches = $_POST['taches'];

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Tâches <?php echo $taches->nom_tache?></title>
</head>
<html>
<body>
<form action="../Scripts/retourHome.php" method="post" id="boutonRetour">
    <p><input type="submit" value="Retour" class="bouton"/></p>
</form>
<h1>Voici vos Taskys, <?php echo $_SESSION["username"]?> !</h1>
<?php var_dump($_GET); ?>
</body>
</html>
