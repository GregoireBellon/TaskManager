<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Créer une tâche></title>
    <link rel="stylesheet" href="pageCreateTask.css">

</head>
<body>

<form method="post" action="../Scripts_PHP/addTaskHandeler.php">

    Name
    <input type="text" name="task_name", required> <br>
    Decription
    <input type="text" name="task_description", required> <br>
    Begin
    <input type="date" name="task_begin", required> <br>
    End
    <input type="date" name="task_end", required> <br>
    Status
    <input type="text" name="task_status", required> <br>


    <input type="submit" name="add">
</form>

</body>
</html>
