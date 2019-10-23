<?php


class Tache
{

    private $id, $nom, $description, $dateFin;

    public function  __construct($id, $nom, $description, $dateFin)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->dateFin = $dateFin;


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

    public function dater($dateFin)
    {
        $this->dateFin = $dateFin;
        //echo "Nouvelle date : ".$this->date
    }


}