<?php
include_once ("TaskList.php");
include_once ("DatabaseManipulation.php");
$db = new DatabaseManipulation();
$newList = new TaskList($_POST["nomListe"]);
    $db->addList($newList);
    header('Location: ../Pages/listOfLists.php');

?>