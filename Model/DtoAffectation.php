<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DTO Affectation*/

class DtoAffectation{
    
    #attributs
    private $NumAffectation;
    private $IdEtudiant;
    private $NumConvention;
    
    public function construct($IdEtudiant, $NumConvention){
        
        $this->IdEtudiant = $IdEtudiant;
        $this->NumConvention = $NumConvention;
    }
    
    #getters
    public function getNumAffectation(){return $this->NumAffectation;}
    public function getIdEtudiant(){return $this->IdEtudiant;}
    public function getNumConvention(){return $this->NumConvention;}
    
    #setters
    public function setNumAffectation($NumAffectation){$this->NumAffectaion = $NumAffectation;}  
}