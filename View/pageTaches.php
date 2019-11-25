<?php
//Page dédié à l'affichage de tâches d'un utilisateur
session_start();
include("../Classes/ManipBDD.php");
?>

<!DOCTYPE html>
<link href="style.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Youry Taskys</title>
</head>
<html>
<body>
<form action="../Scripts/retourHome.php" method="post" id="boutonRetour">
    <p><input type="submit" value="Retour" class="bouton"/></p>
</form>
<h1>Voici vos Taskys, <?php echo $_SESSION["username"]?> !</h1>
<?php
//////////////////////Page d'affichage des taches -> edition réalisable, validation et réalisation grâce à do_editItem
function editItem($params)
{
    $db = new ManipBDD();
    $slug = filter_var ($params['slug'], FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM items WHERE slug = :param";
    $stmt = $db->prepare ($sql);
    $stmt->bindValue ("param", $slug);
    $stmt->execute ();
    $sql = $db->getListes($_SESSION['username']);
    if ($liste = $sql->fetch ()) {
        echo "
            <form id='editItem' action='index.php'>
                Description : <input type='text' name='description' id='description'  value='".$liste['description']."'><br />
                Date d'échéance : <input type='text' name='expiration' id='expiration'  value='".$liste['expiration']."'><br />
                <input type='hidden' name='slug' value='$liste'> <!-- $ liste = $ slug ici-->
                <input type='hidden' name='action' value='do_edit'>
                <input type='submit' value='Modifier'>
            </form>";
    }
}

//////////////////////effectuer l'édition de tache
function do_editItem($params)
{

    $db = new ManipBDD();

    $slug = filter_var ($params['slug'], FILTER_SANITIZE_STRING);
    $description = filter_var ($params['description'], FILTER_SANITIZE_STRING);
    $expiration = filter_var ($params['expiration'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE items SET description = '$description', expiration = '$expiration' WHERE slug = '$slug' ";

    if (! $db->exec ($sql)) {
        echo "Problème de mise à jour !";
    } else {
// En cas de succès, on affiche la fiche modifiée
        displayItem ($params);
    }

}

//////////////////////afficher les listes
function displayIndex($params)
{
    $db = new ManipBDD();
    $sql = "SELECT * FROM Tache";
    $stmt = $db->connection->query($sql);
    echo "<h2>Liste des choses à faire</h2>";
    echo "<ul>";
    while ($item =$stmt->fetch_row()) {
        echo "<li>$item[1] : $item[3] ($item[6])</li>";
    }
    echo "</ul>";

}

////////////////////// Programme principal faisant appel aux fonctions appropriées selon ce que souhaite faire l'utilisateur
if (isset($_GET["action"]) && isset($_GET["slug"])) {

    switch ($_GET["action"]) {
        case "display" :
            displayItem ($_GET);
            break;

        case "edit" :
            editItem ($_GET);
            break;

        case "do_edit" :
            do_editItem($_GET);
            break;

        default :
            displayError ($_GET);
    }

} else {
    displayIndex ($_GET);
}
?>
</body>
</html>
