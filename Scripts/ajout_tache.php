<?php
session_start();
include_once("../Classes/Tache.php");
$nom = $_GET['nom'];
$description = $_GET['description'];
$date_deb = $_GET['date_deb'];
$date_fin = $_GET['date_fin'];
$id_liste = $_SESSION['id_liste_actuelle'];
$statut = $_GET['statut'];

$t = new Tache(False, $nom, $description, $date_deb, $date_fin, $statut, $id_liste);
header('Location: ../View/pageTaches.php');