<?php

require ('ManipBDD.php');

class Tache
{

    private $id, $nom, $idListe, $description, $dateDeb, $dateFin, $statut;
    private $db;

    public function  __construct($id = False, $nom, $description, $dateDeb, $dateFin, $statut, $idListe)
    {

        $this->db = new ManipBDD();
        $this->idListe = $idListe;
        $this->nom = $nom;
        $this->description = $description;
        $this->dateDeb = $dateDeb;
        $this->dateFin = $dateFin;
        $this->statut = $statut;

        if($id == False){
            $this->ajouterTache();
        }else{
            $this->id = $id;
        }

        //echo "Nom tache : ".$this->nom." | Description : ".$this->description." | Date : ".$this->date;
    }

    private function ajouterTache(){
        $this->id = $this->db->sauvegarderTache(False,$this->nom, $this->description, $this->dateDeb , $this->dateFin, $this->statut, $this->idListe);
    }

    public function sauvegarderTache(){
      $this->db->sauvegarderTache($this->id,$this->nom, $this->description, $this->dateDeb , $this->dateFin, $this->statut, $this->idListe);
    }

    public function afficherTache(){
        echo "<div class='tache'>
   <div class='nom_tache'>".$this->nom."</div> 
   <div class='description_tache'>DESCRIPTION : ".$this->description."</div>
   <div class='status_tache'>STATUS :".$this->statut."</div>
   <div class='dates_tache'>
   <div class='date_debut_tache'>DATE DEBUT :".$this->dateDeb."</div>
   <div class='date_fin_tache'>DATE FIN :".$this->dateFin."</div></div>
        </div>";
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