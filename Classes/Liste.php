<?php

require_once ('Tache.php');
//require_once ('ManipBDD.php');

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
    public function __construct($id = FALSE, $nom = FALSE, $dateCreation = FALSE, $taches= FALSE)
    {

        $this->db = new ManipBDD();

        if((func_num_args()===1) AND $id == TRUE){

            $this->recupListe($id);
        }
        else{
            $this->creerListe($id,$nom, $dateCreation, $taches);
        }



        //echo "Nom liste : ".$this->nom." | Date de création : ".$this->date;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return mixed
     */
    public function getTaches()
    {
        return $this->taches;
    }

    private function recupListe($id){

        $this->id;
        $list_recup = $this->db->getListe($id);
        $this->nom = $list_recup->nom;
        $this->dateCreation = $list_recup->dateCreation;


    }

    public function creerListe($id,$nom, $dateCreation, $taches){

        $this->nom = $nom;
        $this->taches = $taches;


        if($dateCreation==FALSE){

            $this->dateCreation = date("Y-m-d H:i");

        }
        if($id==FALSE){
            $id = $this->sauvListe();
        }

        $this->id=$id;



    }

    public function ajouterTache($tache){
        $this->taches[]=$tache;
    }

    public function sauvListe(){

        $this->id = $this->db->sauvegarderListe($this->id, $this->nom, $this->dateCreation);
        #foreach ($this->taches as $tache){
        #   $t = new Tache($tache);
        #}

    }



    public function afficherListe(){
        echo $this->nom;
    }



}