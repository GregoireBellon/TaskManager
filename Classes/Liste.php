<?php

require ('Tache.php');
require ('ManipBDD.php');

class Liste
{
    private $id, $nom, $dateCreation;
    private $db;

    public function __construct($id, $nom, $dateCreation)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->dateCreation = $dateCreation;

        $this->db = new ManipBDD();
        $this->db->ajouterListe($this->id, $this->nom, $this->dateCreation);

        //echo "Nom liste : ".$this->nom." | Date de création : ".$this->date;
    }
}