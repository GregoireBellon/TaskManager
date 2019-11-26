<?php
    include("../Classes/ManipBDD.php");
    include("../Classes/Liste.php");
    session_start();
    $nom_liste = $_GET['nom_liste'];
    $liste = new Liste(FALSE, $nom_liste, False, FALSE);

    header('Location: ../View/pageAccueil.php');
