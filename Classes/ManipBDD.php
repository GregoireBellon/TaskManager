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

    public function ajouterUtilisateur($username, $motDePasse){
        $requete = "INSERT INTO Utilisateur (nom_user,mdp_user) VALUES('$username','$motDePasse');";
        $this->connection->query($requete);
    }

    public function verifUniciteUser ($username){
        $requete = "SELECT * FROM Utilisateur WHERE nom_user = '$username'";
        $resultat = $this->connection->query($requete)->fetch_row();
        if ($resultat) return false;
        else return true;
    }


    // Fonctions de récupérations d'attribut
    public function getIdUser($username){
        // Permet de récupérer l'id (attribut id_user) de l'utilisateur passé en paramètre
        $requete = "SELECT id_user FROM Utilisateur WHERE nom_user ='$username';";
        $resultat = $this->connection->query($requete);
        $id = $resultat->fetch_row();
        return $id[0];
    }


    // Fonction d'ajout de liste dans la table 'Liste'
    public function ajouterListe($idListe, $nomListe, $dateCreationListe)
    {
        $requete = "INSERT INTO Liste (id_liste,nom_liste, date_creation) VALUES('$idListe','$nomListe','$dateCreationListe');";
        $this->connection->query($requete);
    }


    public function getListes($username)
    {
        //Permet de récupérer les listes d'un utilisateur
        $requete = "SELECT * FROM Liste as A NATURAL JOIN Privileges as B NATURAL JOIN Utilisateur as C WHERE C.nom_user=".$username."AND A.id_liste=B.id_liste AND B.id_user=C.id_user";
        $resultat = $this->connection->query($requete);
        return $resultat;
    }

    // Fonction d'ajout de liste dans la table 'Liste'
    public function ajouterTache($idTache, $nom, $idListe, $description, $dateDeb, $dateFin, $statut)
    {
        $requete = "INSERT INTO Tache (id_tache, nom_tache, id_liste, des_tache, date_debut, date_fin, statut) VALUES('$idTache','$nom','$idListe','$description','$dateDeb','$dateFin','$statut');";
        $this->connection->query($requete);
    }


    public function getTaches($username)
    {
        //Permet de récupérer les listes d'un utilisateur
        $requete = "SELECT * FROM Tache as A NATURAL JOIN Privileges as B NATURAL JOIN Utilisateur as C WHERE C.nom_user=".$username."AND A.id_liste=B.id_liste AND B.id_user=C.id_user";
        $resultat = $this->connection->query($requete);
        return $resultat;
    }




}