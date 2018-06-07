<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DTO Facture*/

class DtoFacture{
    
    #attributs
    private $NumFacture;
    private $DateFacture;
    private $MontantHT;
    private $MontantTTC;
    private $Payee;
    
    #constructeur
    public function __construct($NumFacture, $DateFacture, $MontantHT, $MontantTTC, $Payee){
        $this->NumFacture = $NumFacture;
        $this->DateFacture = $DateFacture;
        $this->MontantHT = $MontantHT;
        $this->MontantTTC = $MontantTTC;
        $this->Payee = $Payee;
    }
    
    #getters
    public function getNumFacture(){return $this->NumFacture;}
    public function getDateFacture(){return $this->DateFacture;}
    public function getMontantHT(){return $this->MontantHT;}
    public function getMontantTTC(){return $this->MontantTTC;}
    public function getPayee(){return $this->Payee;}
    
    #setters
    public function setIdEtudiant($IdEtudiant){$this->IdEtudiant = $IdEtudiant;}
    public function setNumFacture($NumFacture){$this->NumFacture = $NumFacture;}
    public function setDateFacture($DateFacture){$this->DateFacture = $DateFacture;}
    public function setMontantHT($MontantHT){$this->MontantHT = $MontantHT;}
    public function setMontantTTC($MontantTTC){$this->MontantTTC = $MontantTTC;}
    public function setPayee($Payee){$this->Payee = $Payee;}   
}