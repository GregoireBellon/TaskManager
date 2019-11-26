<?php
// Classe qui permet d'intéragir avec la base de données

class ManipBDD
{
    public $connection;

    public function __construct()
    {
        // Le constructeur connecte automatiquement l'objet créé à la BDD
        $dbhost = "localhost";
        $dbuser = "webadmin";
        $dbpass = "WynoVe1940+J";
        $db = "TD_GROUPE_PHP";
        $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $db);
        if ($this->connection->errno) {
            error_log($this->connection->error);
        }
    }

    // Fonctions de Manipulation des données

    public function verifLogin($username, $motDePasse){

        $query =  'SELECT * FROM `Utilisateur` WHERE `nom_user` = \'%s\' AND mdp_user = \'%s\';';
        $query= sprintf($query, $username, $motDePasse);
        $result=$this->connection->query($query);
        if($result->num_rows ==1){
            error_log($username." connected");
            return true;
        }
        return false;
    }

    public function ajouterUtilisateur($username, $motDePasse){

        $query = 'INSERT INTO `Utilisateur` (`nom_user`, `mdp_user`) VALUES (\'%s\', \'%s\');';
        $result=$this->connection->query(sprintf($query, $username, $motDePasse));

        if($this->connection->errno){
            error_log("Error :".$this->connection->error);
        }
        return $result;
    }

    public function verifUniciteUser ($username){
        $requete = "SELECT * FROM Utilisateur WHERE nom_user = '$username'";
        $resultat = $this->connection->query($requete);
        if ($resultat->num_rows>1) return false;
        return true;
    }

    public function listesUtilisateur($nomUtilisateur){
        $requete="SELECT id_liste FROM Liste as A NATURAL JOIN Privileges as B NATURAL JOIN Utilisateur as C WHERE C.nom_user= '$nomUtilisateur';";
        $result =  $this->connection->query($requete);
        return $result;

    }

    public function  getListe($id){

        $requete = "SELECT * FROM Liste WHERE id_liste='$id'";
        $result =  $this->connection->query($requete);
        $result = $result->fetch_row();
        $list =  new Liste($result[0], $result[1], $result[2]);

       return $list;


    }


    // Fonctions de récupérations d'attribut
    public function getIdUser($username){
        // Permet de récupérer l'id (attribut id_user) de l'utilisateur passé en paramètre
        $requete = "SELECT id_user FROM Utilisateur WHERE nom_user ='$username';";
        $resultat = $this->connection->query($requete);
        $id = $resultat->fetch_row();
        return $id[0];
    }


    public function verifExistenceListe($idListe){
        $requete = "SELECT id_liste FROM Liste WHERE id_list= '$idListe'";
        $resultat = $this->connection->query($requete);
        if($resultat->num_rows==1){
            return true;
        }
        return false;
    }


    // Fonction d'ajout et de sauvegarde de liste dans la table 'Liste.
    // Donner la valeur -1 à idListe si on veut créer une nouvelle dans la BDD

    public function sauvegarderListe($idListe, $nomListe, $date)
    {


        error_log("ID Liste : ".$idListe." Nom liste : ".$nomListe." Date : ".$date);

        error_log("Sauvegarde liste");
            if ($idListe != FALSE) {

                error_log("Id Liste != False");
                $id = $idListe;
                $requete = "UPDATE Liste SET nom_liste = '$nomListe', date_creation ='$date' WHERE id_liste = '$idListe'";
                $this->connection->query($requete);
                $this->connection->query($requete);

            } else {
                error_log("Sauvegarde ID liste false");


                $requete = "INSERT INTO Liste (nom_liste, date_creation) VALUES('$nomListe','$date');";
                $resultat = $this->connection->query($requete);

                error_log("Res requete : ".$resultat);
                error_log("Erreur : ".$this->connection->error);

                $id = $this->connection->insert_id;

                $idUser = $_SESSION['id'];

                $requete = "INSERT INTO Privileges VALUES('$id','$idUser','ecriture');";

                $this->connection->query($requete);

                error_log("Res requete : ".$requete);
                error_log("Erreur : ".$this->connection->error);

            }
    }


    public function getListes($username)
    {
        //Permet de récupérer les listes d'un utilisateur
        $requete = "SELECT * FROM Liste as A NATURAL JOIN Privileges as B NATURAL JOIN Utilisateur as C WHERE C.nom_user=".$username."AND A.id_liste=B.id_liste AND B.id_user=C.id_user";
        $resultat = $this->connection->query($requete);
        return $resultat;
    }

    // Fonction d'ajout de liste dans la table 'Liste'
    public function sauvegarderTache($idTache, $nom, $description, $dateDeb, $dateFin, $statut, $idListe)
    {
        if ($idTache == False) {

            $requete = "INSERT INTO Tache (nom_tache, id_liste, des_tache, date_debut, date_fin, statut) VALUES('$nom','$idListe','$description','$dateDeb','$dateFin','$statut');";
            $this->connection->query($requete);
            error_log($this->connection->error);
            return $this->connection->insert_id;

        } else {
            $requete = "UPDATE Tache SET nom_tache = '$nom', des_tache = '$description', date_debut = '$dateDeb', date_fin = '$dateFin', statut date_creation = '$statut' WHERE id_tache = '$idTache';";

            $this->connection->query($requete);
        }
    }

    public function getTaches($id_list)
    {
        //Permet de récupérer les listes d'un utilisateur
        $id = $this->getIdUser($_SESSION["username"]);
        $requete = "SELECT * FROM Tache as Tasks NATURAL JOIN Privileges as Droits NATURAL JOIN Utilisateur as Users WHERE Users.id_user='$id' AND Droits.id_user=Users.id_user";
        $requete = "SELECT * FROM Tache WHERE id_liste = '$id_list'";
        $resultat = $this->connection->query($requete);
        error_log($this->connection->error);
        return $resultat;
    }

}