<?php
session_start();
include ('tache.php');
$creation_task= new tache($_POST['task_name'], 'idk' ,$_POST['task_description'], $_POST['task_begin'], $_POST['task_end'] );
