<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DAO Etudiant*/

class DaoEtudiant{
    
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
        }catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    
    //Fonction qui ajoute un nouvel étudiant dans la BDD:
    public function insertEtudiant($DtoEtudiant){
        
        $this->IdEtudiant = $IdEtudiant;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Adresse = $Adresse;
        $this->NumSecu = $NumSecu;
        $this->DateNaiss = $DateNaiss;
        
        $requete = 'INSERT INTO etudiant (Nom, Prenom, Adresse, NumSecu, DateNaiss) values(:t_Nom,:t_Prenom, :t_Adresse, :t_NumSecu, :t_DateNaiss);';
        
        $req = $this->bdd->prepare($requete);
        $req->execute( array(
            't_Nom' => $DtoEtudiant->getNom(),
            't_Prenom' => $DtoEtudiant->getPrenom(),
            't_Adresse' => $DtoEtudiant->getAdresse(),
            't_NumSecu' => $DtoEtudiant->getNumSecu(),
            't_DateNaiss' => $DtoEtudiant->getDateNaiss(),
            ));
        
        
        $requete2 = 'SELECT * FROM etudiant WHERE Nom=? and Prenom=? and Adresse=? and NumSecu=? and DateNaiss=?;';
        
        $req2 = $this->bdd->prepare($requete2);
        
        $req2->execute(array($DtoEtudiant->getNom(), $DtoEtudiant->getPrenom(), $DtoEtudiant->getAdress(), $DtoEtudiant->getDateFin()));
         
        $data=$req2->fetch();
                       
        $DtoEtudiant->setIdEtudiant($data['IdEtudiant']);
        
        $req2->closecursor();
    }


    #recupère un étudiant à partir de son numéro:
    public function getByIdEtudiant($IdEtudiant){
        $requete = 'SELECT * FROM etudiant where IdEtudiant=?;';
        $req = $this->bdd->prepare($requete);
        $req->execute(array($IdEtudiant));
        
        $data = $req->fetch();
            
        $DtoEtudiant = new DtoEtudiant ($data['Nom'],$data['Prenom'],$data['Adresse'],$data['NumSecu'],$date['DateNaiss']);

        $req->closeCursor();
        
        $DtoEtudiant->setIdEtudiant($data['IdEtudiant']);
        
        return $DtoEtudiant;
    }  
    
    #recupère l'Id d'un étudiant à partir de son nom:
    public function getByNomEtudiant($Nom, $Prenom){
        $requete = 'SELECT * FROM etudiant WHERE Nom=? and Prenom=?;';
        $req = $this->bdd->prepare($requete);
        $req->execute(array($Nom, $Prenom));
        
        $data = $req->fetch();
            
        $DtoEtudiant = new DtoEtudiant ($data['Nom'],$data['Prenom'],$data['Adresse'],$data['NumSecu'],$data['DateNaiss']);

        $req->closeCursor();
        
        $DtoEtudiant->setIdEtudiant($data['IdEtudiant']);
        
        return $DtoEtudiant;
    }  
}