<?php

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
    public function __construct($id = FALSE, $nom = FALSE, $dateCreation = FALSE, $taches = FALSE)
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

        $this->id = $id;
        $list_recup = $this->db->getListe($id);
        $this->nom = $list_recup->nom;
        $this->dateCreation = $list_recup->dateCreation;
        $this->recupTaches();


    }

    public function creerListe($id,$nom, $dateCreation, $taches){

        $this->nom = $nom;
        $this->taches = $taches;


        if($dateCreation==FALSE){

            $this->dateCreation = date("Y-m-d H:i");

        }
    }

    public function sauvListe(){

        $this->db->sauvegarderListe($this->id, $this->nom, $this->dateCreation);
        #foreach ($this->taches as $tache){
         #   $t = new Tache($tache);
        #}

    }

    public function recupTaches(){

        $taches = $this->db->getTaches($this->id);
        while ($row = $taches->fetch_row()){
<<<<<<< HEAD
=======
           $t = new Tache($row[0], $row[1], $row[3], $row[4], $row[5], $row[6], $this->id);
            $this->taches[]=$t;
        }


>>>>>>> 52c5bde38901d507fa0d80a465d67205de58f968

        }
    }

    public function afficherListe(){

        echo "<form action=\"../View/pageTaches.php\" method='get'>";
        echo "<input type=\"hidden\" name=\"id\" value=\"$this->id\">";
<<<<<<< HEAD
        echo "<input type=\"hidden\" name=\"nom\" value=\"$this->nom\">";
        echo "<input type=\"hidden\" name=\"date\" value=\"$this->dateCreation\">";
        echo "<input type=\"hidden\" name=\"taches\" value=\"$this->taches\">";
=======
>>>>>>> 52c5bde38901d507fa0d80a465d67205de58f968
        echo "<input type='submit' value='$this->nom'>";
        echo "</form>";
    }

<<<<<<< HEAD
=======
    public function ajouterTache($tache){
        $this->taches[]=$tache;
    }


>>>>>>> 52c5bde38901d507fa0d80a465d67205de58f968
}