<?php

include_once('./Scripts PHP/DatabaseManipulation.php');

class tache
{

    private $nom;
    private $description;
    private $dateDeb;
    private $dateFin;
    private $statut;

    private $idListe;

    //DatabaseManipulation qui permettra d'ajouter la tâche à la bdd dès sa création
    private $db;


    public function __construct($nom, $idListe, $description, $dateDeb, $dateFin, $statut)
    {
        $db = new DatabaseManipulation();

        $this->nom = $nom;
        $this->idListe = $idListe;
        $this->description = $description;
        $this->dateDeb = $dateDeb;
        $this->dateFin = $dateFin;
        $this->statut= $statut;

        $db->addTask($this->nom, $this->idListe, $this->description, $this->dateDeb, $this->dateFin, $this->statut);
        $db->addTask($this);
    }

    public function setTask()
    {


    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getIdListe()
    {
        return $this->idListe;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

}