<?php

require ('Tache.php');
require ('ManipBDD.php');

class Liste
{
    private $nom, $dateCreation;
    private $db;
    private $taches;

    public function __construct($nom, $dateCreation)
    {
        $this->nom = $nom;
        $this->dateCreation = $dateCreation;

        $this->db = new ManipBDD();

        $this->taches=array();

        $this->sauvListe();
        //echo "Nom liste : ".$this->nom." | Date de création : ".$this->date;
    }

    public function creerListe($nom, $dateCreation){

        $this->nom = $nom;
        $this->dateCreation = $dateCreation;

    }

    public function ajouterTache($tache){
        $this->taches[]=$tache;
    }

    public function sauvListe(){
        $this->db->ajouterListe($this->nom, $this->dateCreation);
    }



}