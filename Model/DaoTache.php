<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DAO Tache*/


class DaoTache{
    
    #attributs
    private $bdd;
    private $hote;
    private $UserName;
    private $Password;
    
    #constructeur
    public function __construct($hote, $base, $UserName, $Password){
        try{
            $this->hote=$hote;
            $this->UserName=$UserName;
            $this->Password=$Password;
            $this->bdd = new PDO('mysql:host='.$hote.';dbname='.$base.';charset=utf8', $UserName, $Password);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (Exception $e){
            die('Erreur :' . $e->getMessage());
        }
    }
    
    #Fonction qui insert une tache dans la BDD:
    public function insertTache($DaoTache){
        //Requête d'insertion
        $requete1 = 'INSERT INTO tache (NumConvention,Intitule, Quantite, PrixHT) values(:t_NumConvention,:t_Intitule,:t_Quantite,:t_PrixHT);';

        
        $req1 = $this->bdd->prepare($requete1);
        $req1->execute( array(
            't_NumConvention' => $DaoTache->getNumConvention(),
            't_Intitule' => $DaoTache->getIntitule(),
            't_Quantite' => $DaoTache->getQuantite(),
            't_PrixHT' => $DaoTache->getPrixHT(),
            ));
          
        
        //Requête pour récupérer le numéro de la Tache
        $requete2 = 'SELECT * FROM tache WHERE Intitule=? and Quantite=? and PrixHT=?;';
        
        $req2 = $this->bdd->prepare($requete2);
        $req2->execute(array($DaoTache->getIntitule(), $DaoTache->getQuantite(), $DaoTache->getPrixHT()));
         
        $data=$req2->fetch();
                       
        $DaoTache->setNumTache($data['NumTache']);
        $req2->closecursor();
    }
    
   
    #getter
    public function getByNumTache($numTache){
        $requete = 'SELECT * FROM tache where NumTache=?;';
        $req = $this->bdd->prepare($requete);
        $req->execute(array($numTache));
        
        $data = $req->fetch();
            
        $DaoTache = new DaoTache($data['Intitule'],$data['Quantite'],$data['PrixHT']);
        
        $req->closeCursor();
        
        return $DtoTache;
    }  
}