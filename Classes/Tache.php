<?php

require ('ManipBDD.php');

class Tache
{

    private $id, $nom, $idListe, $description, $dateDeb, $dateFin, $statut;
    private $db;

    public function  __construct($id, $nom, $idListe, $description, $dateDeb, $dateFin, $statut)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->idListe = $idListe;
        $this->description = $description;
        $this->dateDeb = $dateDeb;
        $this->dateFin = $dateFin;
        $this->statut = $statut;

        $this->db = new ManipBDD();
        $this->db.ajouterTache($this->id, $this->nom, $this->idListe, $this->description, $this->dateDeb, $this->dateFin, $this->statut);
        //echo "Nom tache : ".$this->nom." | Description : ".$this->description." | Date : ".$this->date;
    }

    public function rename($nom)
    {
        $this->nom = $nom;
        //echo "Nouveau nom: ".$this->nom
    }

    public function decrire($description)
    {
        $this->description = $description;
        //echo "Nouvelle description : ".$this->description
    }

    public function daterDebut($dateDeb)
    {
        $this->dateDeb = $dateDeb;
    }

    public function daterEcheance($dateFin)
    {
        $this->dateFin = $dateFin;
        //echo "Nouvelle date : ".$this->date
    }




}