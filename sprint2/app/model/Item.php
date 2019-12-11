<?php
require_once('Model.php');
require_once ('../kernel/Database.php');

class Item extends Model
{

    //récupérer tout le contenu de la table item
    public static function getList()
    {
        $db = Database::getConnexion();

        $sql ="SELECT * FROM items;";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    //récupérer la ligne de la table item ou le slug correspond
    public static function getFromSlug($slug)
    {
        $db = Database::getConnexion();

        $sql ="SELECT * FROM items WHERE slug=".$slug.";";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    //mettre à jouer la ligne de la table item avec les nouveaux paramètres
    public static function updateFromSlug($params)
    {
       /* $requeteReussie = false;

        $db = Database::getConnexion();

        $sql ="SELECT * FROM items WHERE slug=".$slug.";";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $requeteReussie;*/
    }


}