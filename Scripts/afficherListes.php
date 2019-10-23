<?php
//Ce fichier sert à afficher les listes d'un utilisateur
require('../Classes/ManipBDD.php');
session_start();

$db= new ManipBDD();
$result=$db->getListes();
$rows=array();
while($row = mysqli_fetch_array($result))
{
    $rows[]=$row;
}
?>
<!DOCTYPE html>

<html lang="en">
<link href="listOfLists.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>ListOfLists</title>
</head>
<body>

<h1><?php echo "Listes de ".$_SESSION['username'] ?></h1>
?>
<ol>
    <?php
    foreach($rows as $row)
    {
        echo "<li><a href=''>";
        echo ($row['nom_liste'].' ('.($row['droit']).') ');
        echo "</a></li>";
    }
    ?>
</ol>
<form action="pageAjoutListe.php">
    <button type="submit" href="../Scripts_PHP/ajoutListe.php">Ajouter une liste</button>
</form>
</body>
</html>
