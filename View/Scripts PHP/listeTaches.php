<?php


class listeTaches
{
    private $nomListe;
    private $dateCreation;

    private $taches = array();

    //DatabaseManipulation qui permettra d'ajouter la liste à la bdd dès sa création
    private $db;

    public function __construct($nomListe, $dateCreation)
    {
        $db = new DatabaseManipulation();

        $this->nomListe = $nomListe;
        $this->dateCreation = $dateCreation;

        $db->addList($this->nomListe, $this->dateCreation);
    }

    public function addTask($tache)
    {
        array_push($this->taches, $tache);
    }


    /**
     * @return mixed
     */
    public function getNomListe()
    {
        return $this->nomListe;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }



}