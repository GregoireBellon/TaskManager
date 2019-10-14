<?php
/*NOTES : LE LOG EST ACCESSIBLE VIA /var/log/apache2 c'est le fichier error log*/
include_once('tache.php');
include_once('TaskList.php');

class DatabaseManipulation
{
    public $connection;

    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "simpleb0t";
        $dbpass = "S1Mpl€bOOt";
        $db = "TD_GROUPE_PHP";
        $this->connection=new mysqli($dbhost, $dbuser,$dbpass,$db);
        if($this->connection->errno){
            error_log($this->connection->error);
    }
    }

    public function addUser($Username, $Password){

        $query = 'INSERT INTO `Utilisateur` (`nom_user`, `mdp_user`) VALUES (\'%s\', \'%s\');';
        $result=$this->connection->query(sprintf($query, $Username, $Password));
        error_log("Error :".$this->connection->error);
        return $result;
    }

    public function addTask($nom, $idListe, $description, $dateDeb, $dateFin, $statut){
        $querry = "INSERT INTO `Tache` (`id_tache`, `nom_tache`, `id_liste`, `des_tache`, `date_debut`, `date_fin`, `statut`) VALUES ('', '%s', '', '%s', '%s', '%s', '%s')";
        $querry = sprintf($querry, $this->nom, $this->description, $this->dateDeb, $this->dateFin, $this->statut);
        $this->connection->query($querry);
        if($this->connection->errno){
            error_log($this->connection->error);
        }
    }

    public function connect($Username, $Password){
        $query =  'SELECT * FROM `Utilisateur` WHERE `nom_user` = \'%s\' AND mdp_user = \'%s\';';
        $query= sprintf($query, $Username, $Password);
        $result=$this->connection->query($query);

        if($result->num_rows ==1){
            error_log($Username." connected");
            return true;
        }
        return false;

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

    public function afficherListe(){
        $query = 'SELECT * FROM Utilisateur;';
        $db=$this->connection->query($query);
        return $db;
    }

    public function addList($list)
    {
        $query = 'INSERT INTO `Lists` (`nom_liste`, `date_creation` VALUES (\'%s\', \'%s\');';
        error_log(sprintf($query, $list->getNomListe(), $list->getDateCreation()));
        $this->connection->query(sprintf($query, $list->getNomListe(), $list->getDateCreation()));
    }

    public function executeQuery($query){
        error_log($query);                              /*Note : éviter d'afficher les requètes dans le log à l'avenir --> plutôt afficher le rapport d'erreur d'un query*/
        $this->connection->query($query);
        return $this->connection->query($query);
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