<?php
include_once('View.php');

include('app/view/Basics/header.php');
$slug = filter_var ($params['slug'], FILTER_SANITIZE_STRING);
$description = filter_var ($params['description'], FILTER_SANITIZE_STRING);
$expiration = filter_var ($params['expiration'], FILTER_SANITIZE_STRING);
echo $_GET['description'];
$sql = "UPDATE items SET description = '$description', expiration = '$expiration' WHERE slug = '$slug' ";

if (! $db->exec($sql)) {
    echo "Problème de mise à jour !";
} else {
    // En cas de succès, on affiche la fiche modifiée
    displayItem ($params);
}

include('app/view/Basics/footer.php');
