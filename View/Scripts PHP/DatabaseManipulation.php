<?php

include_once('tache.php');
include_once('listeTaches.php');

class DatabaseManipulation
{

    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "simpleb0t";
        $dbpass = "S1Mpl€bOOt";
        $db = "TD_PHP";
        $this->connection=new mysqli($dbhost, $dbuser,$dbpass,$db);
        error_log($this->connection->error);
    }

    public function addUser($Username, $Password){

        $query = 'INSERT INTO `User` (`username`, `password`) VALUES (\'%s\', \'%s\');';
        error_log(sprintf($query, $Username, $Password));
        $this->connection->query(sprintf($query, $Username, $Password));
    }

    public function addTask($tache)
    {
        if(is_object($tache))
        {
            $query = 'INSERT INTO `Tasks` (`nom_tache`, `id_liste`, `des_tache`, `date_debut`, `date_debut`, `statut`) VALUES (\'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\');';
            error_log(sprintf($query, $tache->getNom(), $tache->getIdListe(), $tache->getDescription(), $tache->getDateDeb(), $tache->getDateFin(), $tache->getStatut()));
            $this->connection->query(sprintf($query, $tache->getNom(), $tache->getIdListe(), $tache->getDescription(), $tache->getDateDeb(), $tache->getDateFin(), $tache->getStatut()));
        }
        else
        {

        }
    }

    public function addList($list)
    {
        $query = 'INSERT INTO `Lists` (`nom_liste`, `date_creation` VALUES (\'%s\', \'%s\');';
        error_log(sprintf($query, $list->getNomListe(), $list->getDateCreation()));
        $this->connection->query(sprintf($query, $list->getNomListe(), $list->getDateCreation()));
    }

    public function executeQuery($query){
        error_log($query);
        $this->connection->query($query);
    }

    public function testInclude()
    {
        echo "DatabaseManipulation bien incluse";
    }

    public function showQuery($query)
    {

        while($row = $query->fetch_array())
        {
            echo $row['FirstName'] . " " . $row['LastName'];
            echo "<br />";
        }
        /*
        while ( $rows = $resource->fetch_assoc() ) {
            print_r($rows);//echo "{$row['field']}";
        }*/
/*       foreach($this->connection->query($query) as $ligne)
        {
            echo $ligne['id_user'];
            echo $ligne['nom_user'];
            echo $ligne['mdp_user'];
        }*/
        if(is_object($this->connection->query($query)))
        {
            echo "un truc bato";
        }


    }
}