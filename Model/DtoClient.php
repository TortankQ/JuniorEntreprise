<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DTO Client*/

class DtoClient{
    
    #attributs
    private $IdClient;
    private $NomClient;
    private $NumRue;
    private $NomRue;
    private $CP;
    private $Mail;
    private $Tel;
    private $Siret;
    
    #constructeur
    public function __construct($NomClient, $NumRue, $NomRue, $CP, $Mail, $Tel, $Siret){
        $this->NomClient = $NomClient;
        $this->NumRue = $NumRue;
        $this->NomRue = $NomRue;
        $this->CP = $CP;
        $this->Mail = $Mail;
        $this->Tel = $Tel;
        $this->Siret = $Siret;        
    }
    
    #getters
    public function getIdClient(){return $this->IdClient;}
    public function getNomClient(){return $this->NomClient;}
    public function getNumRue(){return $this->NumRue;}
    public function getNomRue(){return $this->NomRue;}
    public function getCP(){return $this->CP;}
    public function getMail(){return $this->Mail;}
    public function getTel(){return $this->Tel;}
    public function getSiret(){return $this->Siret;}
    
    #setters
    public function setIdClient($IdClient){$this->IdClient = $IdClient;}
    public function setNomClient($NomClient){$this->NomClient = $NomClient;}
    public function setNumRue($NumRue){$this->NumRue = $NumRue;}
    public function setNomRue($NomRue){$this->NomRue = $NomRue;}
    public function setCP($CP){$this->CP = $CP;}
    public function setMail($Mail){$this->Mail = $Mail;}
    public function setTel($Tel){$this->Tel = $Tel;}
    public function setSiret($Siret){$this->Siret = $Siret;}
}