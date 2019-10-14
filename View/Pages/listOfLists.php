<?php
    include_once('../Scripts_PHP/DatabaseManipulation.php');
    session_start();
    $db = new DatabaseManipulation();
    $nomdutype = 'admin';
    $_SESSION['username']=$nomdutype;
$sqlRqst="SELECT * FROM Liste as A NATURAL JOIN Privileges as B NATURAL 
JOIN Utilisateur as C WHERE A.id_liste=B.id_liste AND B.id_user=C.id_user AND C.nom_user='admin'";
$result = mysqli_query($db->connection,$sqlRqst);
$rows=array();
while($row = mysqli_fetch_array($result))
    $rows[]=$row;
?>
<!DOCTYPE html>
<html lang="en">
<link href="listOfLists.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>ListOfLists</title>
</head>
<body>

<h1><?php echo "Listes de ".$nomdutype ?></h1>
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
<button >ajouter liste</button>
</body>
</html>