<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DTO Compte*/

class DtoCompte{
    
    #attributs
    private $idCompte;
    private $UserName;
    private $Password;
    private $Admin;
    
    #constructeur
    public function __construct($UserName, $Password, $Admin){
            $this->UserName = $UserName;
            $hash = password_hash($Password, PASSWORD_DEFAULT);
            $this->Password = $hash;
            $this->Admin = $Admin;
    }
    
    #getters
    public function getIdCompte(){return $this->idCompte;}
    public function getUserName(){return $this->UserName;}
    public function getPassword(){return $this->Password;}
    public function getAdmin(){return $this->Admin;}
    
    #setters
    public function setIdCompte($idCompte){$this->idCompte = $idCompte;}
    public function setUserName($UserName){$this->UserName = $UserName;}
    public function setPassword($Password){$this->Password = $Password;}
    public function setAdmin($Admin){$this->Admin = $Admin;}    
}