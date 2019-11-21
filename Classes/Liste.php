<?php

require ('Tache.php');
require ('ManipBDD.php');

class Liste
{
    private $id, $nom, $dateCreation;
    private $db;
    private $taches;

    /**
     * Liste constructor.
     * @param $id id de la liste à récup
     * @param $nom nom de la liste à créer
     * @param $taches taches dans la liste à insérer
     */
    public function __construct($id, $nom, $taches)
    {

        switch (func_num_args()){
            case 2:

               $this->id= $this->creerListe($nom,$taches); //récupérer $nom et $taches

                break;
            case 1:
                $this->recupListe($id);
                $this->id = $id;

        }

        $this->db = new ManipBDD();


        //echo "Nom liste : ".$this->nom." | Date de création : ".$this->date;
    }

    private function recupListe($id){

    }

    public function creerListe($nom, $taches){

        $this->nom = $nom;
        $this->dateCreation = date("Y-m-d H:i");
        $this->taches = $taches;

    }

    public function ajouterTache($tache){
        $this->taches[]=$tache;
    }

    public function sauvListe(){
        $this->db->ajouterListe($this->id, $this->nom, $this->dateCreation);
        foreach ($this->taches as $tache){
            $t = new Tache($tache);
        }
    }

    public function afficherListe(){
        echo $this->nom;
    }



}