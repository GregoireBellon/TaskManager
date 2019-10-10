<?php
    include_once ('.\Scripts PHP\DatabaseManipulation.php');
    session_start();

    $db = new DatabaseManipulation();
    $db->testInclude();
    /*
    $sqlRqst = "SELECT * FROM Utilisateur";
    $result = $db->executeQuery($sqlRqst);
    $db->showQuery($result);
*/
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