<!-- PAGE AFFICHANT LES LISTES / APRES S'ETRE CONNECTÉ -->
<?php
include('../Classes/ManipBDD.php');
session_start();
?>

<!DOCTYPE html>
<link href="style.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Page d'Accueil</title>
</head>
<html>
    <body>
        <form action="../Scripts/deconnexion.php" method="post" id="boutonDeconnnexion">
            <p><input type="submit" value="Déconnexion" class="bouton"/></p>
        </form>
        <h1>Bienvenue, <?php echo $_SESSION["username"]?> !</h1>
        <ol>
            <?php
            $db= new ManipBDD();
            $result=$db->getListes($_SESSION["username"]);
            while($row = mysqli_fetch_array($result))
            {
                echo "<li>";
                echo ($row["nom_liste"].'('.$row["droit"]);
                echo "</li>";
            }
            ?>
        </ol>
        <form action="../Scripts/accesTaches.php" method="post" id="boutonDeconnnexion">
            <p><input type="submit" value="AccesTaches" class="bouton"/></p>
        </form>


        <?php
        // Page principale du site (page sur laquelle l'utilisateur arrive près s'être connecté)
        function afficherListes($params)
        {
            $db = new ManipBDD();
            $sql = $db->getListes($_SESSION['username']);

            echo "<h2>Liste des choses à faire</h2>";

            echo "<ul>";
            while ($liste = $sql->fetch ()) {
                echo "<li><a href='index.php?action=display&slug=" . $liste["nom_liste"] . "'>" . $liste["description"] . "</a></li>";
            }
            echo "</ul>";

        }

        //////////////////////Page d'affichage des taches -> edition réalisable, validation et réalisation grâce à do_editItem
        function editItem($params)
        {
            $db = new ManipBDD();

            /*
            $slug = filter_var ($params['slug'], FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM items WHERE slug = :param";
            $stmt = $db->prepare ($sql);
            $stmt->bindValue ("param", $slug);
            $stmt->execute ();
            */
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

            $db = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );

            $sql = "SELECT * FROM items";
            $stmt = $db->prepare ($sql);
            $stmt->execute ();

            echo "<h2>Liste des choses à faire</h2>";
            echo "<ul>";
            while ($item = $stmt->fetch ()) {
                echo "<li><a href='index.php?action=display & slug=" . $item["slug"] . "'>" . $item["description"] . "</a></li>";
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
