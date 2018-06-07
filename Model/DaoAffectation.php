<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DAO Affectation*/

class DaoAffectation
{
    
    #attributs
    private $bdd;
    private $hote;
    private $UserName;
    private $Password;
    
    #constructeur
    public function __construct($hote,$base,$UserName, $Password){
        try{
            $this->hote=$hote;
            $this->UserName=$UserName;
            $this->Password=$Password;
            $this->bdd = new PDO('mysql:host='.$hote.';dbname='.$base.';charset=utf8', $UserName, $Password);
        }catch (Exception $e){
            die('Erreur :' . $e->getMessage());
        }
    }
    
    #Fonction qui insere une nouvelle ligne Affectation dans la BDD:
    public function insertAffectation($DtoAffectation){
        
        $requete = 'INSERT INTO affectation(IdEtudiant, NumConvention)
                    values(:t_IdEtudiant, :t_NumConvention);';
        
        $req = $this->bdd->prepare($requete);
        $req->execute( array(
            't_IdEtudiant' => $DtoAffectation->getIdEtudiant(),
            't_NumConvention' => $DtoAffectation->getNumConvention()
            ));
        
        #requete qui récupère le NumAffectation depuis la BDD
        $requete2 = 'SELECT * FROM affectation WHERE IdEtudiant=? and NumConvention=?;';
        
        $req2 = $this->bdd->prepare($requete2);
        
        $req2->execute(array($DtoAffectation->getIdEtudiant(), $DtoAffectation->getNumConvention()));
         
        $data=$req2->fetch();              
        $DtoAffectation->setNumAffectation($data['NumAffectation']);
        
        $req2->closecursor();
    }
    
    #getter
    public function getByNumAffectation($NumAffectation){
        $requete = 'SELECT * FROM affectation where NumAffectation=?;';
        $req = $this->bdd->prepare($requete);
        $req->execute(array($numAffectation));
        
        $data = $req->fetch();
            
        $this->DtoAffectation = new DtoAffectation ($data['NumAffectation'],$data['IdEtudiant'],$data['NumConvention']);
        
        $req->closeCursor();
        
        return $DtoAffectation;
    }  
    
    
    #Fonction qui renvoie un ArrayList de DtoConvention à partir d'un IdEtudiant:
    function getNumConventionByIdEtudiant($IdEtudiant){
        $daoConvention = new DaoConvention("localhost","junior","root","");
        
        $arrayDtoConvention = array();
        
        $requete = 'SELECT NumConvention FROM affectation WHERE IdEtudiant='.$IdEtudiant.';';
        $reponse = $this->bdd->query($requete);

        while($data = $reponse->fetch()){
            $DtoConvention = $daoConvention->getByNumConvention($data['NumConvention']);
            array_push($arrayDtoConvention, $data['NumConvention']);
        }
        
        $reponse->closeCursor();
                
        return $arrayDtoConvention;
    }
}