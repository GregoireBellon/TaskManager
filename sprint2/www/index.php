

<?php
//error_reporting(0);
require_once ('../app/config/params.inc.php');
require_once ('../app/kernel/Router.php');
require_once ('../app/controller/IndexController.php');
require_once ('../app/controller/ItemController.php');

/*function displayItem($params)
{

    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $slug = filter_var ($params['slug'], FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM items WHERE slug = :param";
    $stmt = $db->prepare ($sql);
    $stmt->bindValue ("param", $slug);
    $stmt->execute ();

    echo "(<a href = \".\">retour à la liste</a>)";
    echo "<h2>Todo</h2>";
    echo "<blockquote>";
    if ($item = $stmt->fetch ()) {
        echo "<p><b>" . $item["description"] . "</b> <a href='index.php?action=edit&slug=" . $item["slug"] . "'>(edit)</a></p>";
        echo "<p><em>A faire avant le " . $item["expiration"] . "</em></p>";
    } else {
        echo "<p>Fiche introuvable</p>";
    }
    echo "</blockquote>";

}

function editItem($params)
{

    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $slug = filter_var ($params['slug'], FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM items WHERE slug = :param";
    $stmt = $db->prepare ($sql);
    $stmt->bindValue ("param", $slug);
    $stmt->execute ();

    if ($item = $stmt->fetch ()) {
        echo "
            <form id='editItem' action='index.php'>
                Description : <input type='text' name='description' id='description'  value='".$item['description']."'><br />
                Date d'échéance : <input type='text' name='expiration' id='expiration'  value='".$item['expiration']."'><br />
                <input type='hidden' name='slug' value='$slug'>
                <input type='hidden' name='action' value='do_edit'>
                <input type='submit' value='Modifier'>
            </form>
        ";


    }

}

function do_editItem($params){


    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );

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

}


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
        echo "<li><a href='index.php?action=display&slug=" . $item["slug"] . "'>" . $item["description"] . "</a></li>";
    }
    echo "</ul>";

}


function displayError($params)
{
    echo "<p>Erreur !</p>";
}

*/?>
<?php
$route = Router::analyze($_GET);
$c = new IndexController($route);
var_dump($route);
var_dump($c);
$c->display();
?>
/*switch($route['controller'])
{
    case "Item" :
        switch($route['action']){
            case "display" :
                displayItem($route['params']);
                break;
            case "edit" :
                editItem($route['params']);
                break;
            case "do_edit" :
                do_editItem($route['params']);
                break;
            default :
                displayError($route['params']);
        }
        break;
    case "Index" :
        displayIndex($route['params']);
        break;
    default :
        displayError($route['params']);
}*/?>



