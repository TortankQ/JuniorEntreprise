<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DTO Convention*/

class DtoConvention{
    
    #attributs
    private $NumConvention;
    private $NomProjet;
    private $IdClient;
    private $DateDebut;
    private $DateFin;
    private $MontantHT;
    private $MontantTTC;
    private $Acompte;
    private $TVA;
    private $Signature;
    private $Commentaire;    
    
    #constructeur
   /* public function __construct($NumConvention, $NomProjet, $DateDebut,
                                $DateFin, $MontantHT, $MontantTTC, 
                                $Acompte, $TVA, $Signature, $Commentaire){
        $this->NumConvention = $NumConvention;
        $this->NomProjet = $NomProjet;
        $this->DateDebut = $DateDebut;
        $this->DateFin = $DateFin;
        $this->MontantHT = $MontantHT;
        $this->MontantTTC = $MontantTTC;
        $this->Acompte = $Acompte;
        $this->TVA = $TVA;
        $this->Signature = $Signature;
        $this->Commentaire = $Commentaire;
    }
    */
    public function __construct($NomProjet, $IdClient, $DateDebut,
                                $DateFin, $MontantHT, $MontantTTC, 
                                $Acompte, $TVA, $Signature, $Commentaire){
        $this->NomProjet = $NomProjet;
        $this->IdClient = $IdClient;
        $this->DateDebut = $DateDebut;
        $this->DateFin = $DateFin;
        $this->MontantHT = $MontantHT;
        $this->MontantTTC = $MontantTTC;
        $this->Acompte = $Acompte;
        $this->TVA = $TVA;
        $this->Signature = $Signature;
        $this->Commentaire = $Commentaire;
    }
    
    #getters
    public function getNumConvention(){return $this->NumConvention;}
    public function getNomProjet(){return $this->NomProjet;}
    public function getIdClient(){return $this->IdClient;}
    public function getDateDebut(){return $this->DateDebut;}
    public function getDateFin(){return $this->DateFin;}
    public function getMontantHT(){return $this->MontantHT;}
    public function getMontantTTC(){return $this->MontantTTC;}
    public function getAcompte(){return $this->Acompte;}
    public function getTVA(){return $this->TVA;}
    public function getSignature(){return $this->Signature;}
    public function getCommentaire(){return $this->Commentaire;}    
    
    #setters
    public function setNumConvention($NumConvention){$this->NumConvention = $NumConvention;}
    public function setNomProjet($NomProjet){$this->NomProjet;}
    public function setIdClient($IdClient){$this->IdClient;}
    public function setDateDebut($DateDebut){$this->DateDebut;}
    public function setDateFin($DateFin){$this->DateFin;}
    public function setMontantHT($MontantHT){$this->MontantHT;}
    public function setMontantTTC($MontantTTC){$this->MontantTTC;}
    public function setAcompte($Acompte){$this->Acompte;}
    public function setTVA($TVA){$this->TVA;}
    public function setSignature($Signature){$this->Signature;}
    public function setCommentaire($Commentaire){$this->Commentaire;}    
}