<?php
    include("../Classes/Liste.php");
    include("../Classes/Tache.php");

    $nom = $_GET['nom'];
    $description = $_GET['description'];
    $date_deb = $_GET['date_deb'];
    $date_fin = $_GET['date_fin'];
    $statut = $_GET['statut'];
    $nom_liste = $_GET['nom_liste'];

    $liste = new Liste(FALSE, $nom_liste, date("y-m-d"), FALSE);
    $liste->ajouterTache(new Tache(False, $nom, $description, $date_deb, $date_fin, $statut, $liste->getId()));

    $liste->sauvListe();
    header("../View/pageAccueil.php");
?>