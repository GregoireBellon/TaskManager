<?php
include_once('../View.php');
include_once ('../../controller/IndexController.php');


include('app/view/Basics/header.php');
echo "<h2>Liste des choses à faire</h2>";
echo "<ul>";
$controller = new IndexController();
$controller->display();
echo "</ul>";

include('app/view/Basics/footer.php');