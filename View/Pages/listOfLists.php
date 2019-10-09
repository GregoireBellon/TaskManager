<?php
    session_start();

    require_once 'DatabaseManipulation.php';

    $sqlRqst = "SELECT id_user FROM Utilisateur where nom_user = 'test'";

    echo $sqlRqst;

     $listOfList = "";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <ul>

    </ul>
</body>
</html>