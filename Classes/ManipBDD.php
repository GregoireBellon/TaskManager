<?php
// Classe qui permet d'intéragir avec la base de données
class ManipBDD
{
    public $connection;

    public function __construct()
    {
        // Le constructeur connecte automatiquement l'objet créé à la BDD
        $dbhost = "localhost";
        $dbuser = "simpleb0t";
        $dbpass = "S1Mpl€bOOt";
        $db = "TD_GROUPE_PHP";
        $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $db);
        if ($this->connection->errno) {
            error_log($this->connection->error);
        }
    }

    // Fonctions de Manipulation des données

    public function verifLogin($username, $motDePasse){
        // Vérifie que la paire Nom d'Utilisateur / mdp existe dans la base de données
        $requete = "SELECT * FROM Utilisateur WHERE nom_user = '$username' AND mdp_user = '$motDePasse';";
        $result = $this->connection->query($requete)->fetch_row();
        if($result) return true;
        else return false;
    }

    // Fonctions de récupérations d'attribut

    public function getIdUser($username){
        // Permet de récupérer l'id (attribut id_user) de l'utilisateur passé en paramètre
        $requete = "SELECT id_user FROM Utilisateur WHERE nom_user ='$username';";
        $resultat = $this->connection->query($requete);
        $id = $resultat->fetch_row();
        return $id[0];
    }


    public function getListes($username)
    {
        //Permet de récupérer les listes d'un utilisateur
        $requete = "SELECT * FROM Liste as A NATURAL JOIN Privileges as B NATURAL 
JOIN Utilisateur as C WHERE A.id_liste=B.id_liste AND B.id_user=C.id_user AND C.nom_user=".$username;
        $resultat = $this->connection->query($requete);
        return $resultat;
    }
}