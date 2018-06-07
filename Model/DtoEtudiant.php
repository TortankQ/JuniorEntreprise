<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DTO Etudiant*/

class DtoEtudiant{
    
    #attributs
    private $IdEtudiant;
    private $Nom;
    private $Prenom;
    private $Adresse;
    private $NumSecu;
    private $DateNaiss;
    
    #constructeur
    public function __construct($Nom, $Prenom, $Adresse, $NumSecu, $DateNaiss){
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Adresse = $Adresse;
        $this->NumSecu = $NumSecu;
        $this->DateNaiss = $DateNaiss;
    }
    
    #getters
    public function getIdEtudiant(){return $this->IdEtudiant;}
    public function getNom(){return $this->Nom;}
    public function getPrenom(){return $this->Prenom;}
    public function getAdress(){return $this->Adresse;}
    public function getNumSecu(){return $this->NumSecu;}
    public function getDateNaiss(){return $this->DateNaiss;}
    
    #setters
    public function setIdEtudiant($IdEtudiant){$this->IdEtudiant = $IdEtudiant;}
    public function setNom($Nom){$this->Nom = $Nom;}
    public function setPrenom($Prenom){$this->Prenom = $Prenom;}
    public function setAdress($Adresse){$this->Adresse = $Adresse;}
    public function setNumSecu($NumSecu){$this->NumSecu = $NumSecu;}
    public function setDateNaiss($DateNaiss){$this->DateNaiss = $DateNaiss;}       
}