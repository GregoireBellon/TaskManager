<?php

include_once("SaisieClient.class.php");

$form = new SaisieClient($_POST);
$form->getClient();