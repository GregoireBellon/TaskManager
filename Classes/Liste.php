<?php

require ('Tache.php');
require ('ManipBDD.php');

class Liste
{
    private $id, $nom, $dateCreation;
    private $db;
    private $taches;

    public function __construct($id, $nom, $dateCreation)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->dateCreation = $dateCreation;

        $this->db = new ManipBDD();

        $this->taches=array();


        //echo "Nom liste : ".$this->nom." | Date de création : ".$this->date;
    }

    public function creerListe($id, $nom, $dateCreation){

        $this->id = $id;
        $this->nom = $nom;
        $this->dateCreation = $dateCreation;

    }

    public function ajouterTache($tache){
        $this->taches[]=$tache;
    }

    public function sauvListe(){
        $this->db->ajouterListe($this->id, $this->nom, $this->dateCreation);
    }



}