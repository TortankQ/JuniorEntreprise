<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DAO Facture*/


class DaoFacture{
    
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
            die('Erreur :' . $e->getMessage());
        }
    }
    
    public function insertTabFacture($DtoFacture){
        //Requête d'insertion
        $requete1 = 'INSERT INTO facture(DateFacture, MontantHT, MontantTTC,
                             Payee) values(:t_NumFacture,:t_DateFacture,:t_MontantHT, :t_MontantTTC, :t_Payee);';
        
        $req1 = $this->bdd->prepare($requete1);
        $req1->execute( array(
            't_DateFacture' => $DtoFacture->getDateFacture(),
            't_MontantHT' => $DtoFacture->getMontantHT(),
            't_MontantTTC' => $DtoFacture->getMontantTTC(),
            't_Payee' => $DtoFacture->getPayee())),
          
        
        //Requête pour récupérer le numéro de la Facture
        $requete2 = 'SELECT * FROM facture WHERE DateFacture=? and MontantHT=? and MontantTTC=? and Payee=?;';
        
        $req2 = $this->bdd->prepare($requete2);
        $req2->execute(array($DtoFacture->getDateFacture(), $DtoFacture->getMontantHT(), $DtoFacture->getMontantTTC(), $DtoFacture->getPayee()));
         
        $data=$req2->fetch();
                       
        $DtoFacture->setNumFacture($data['NumFacture']);
        $req2->closecursor();
    }
    
    public function afficherTabFacture(){
        
        echo'<table>';
            echo'<tr>';
                echo'<th>Numéro de facture</th>';
                echo'<th>Date de facture</th>';
                echo'<th>Montant HT</th>';
                echo'<th>Montant TTC</th>';
                echo'<th>Facture payée</th>';
            echo'</tr>';

   
        $requete = 'SELECT * FROM facture;';
        $reponse = $this->bdd->query($requete);

        while($data = $reponse->fetch()){
            echo '<td>'.$data['NumFacture'].'</td>';
            echo '<td>'.$data['DateFacture'].'</td>';
            echo '<td>'.$data['MontantHT'].'</td>';
            echo '<td>'.$data['MontantTTC'].'</td>';
            echo '<td>'.$data['Payee'].'</td>';
            echo '<td><button name="button">Accéder à ma facture</button></td>';
            echo '<td><button name="button">Impr'
        }
        $reponse->closeCursor();
        echo'</table>';
        
    }
    
    
    #getter
    public function getByNumFacture($NumFacture){
        $requete = 'SELECT * FROM facture where NumFacture=?;';
        $req = $this->bdd->prepare($requete);
        $req->execute(array($NumFacture));
        
        $data = $req->fetch();
            
        $DtoFacture = new DtoFacture($data['NumFacture'],$data['DateFacture'],$data['MontantHT'],$data['MontantTTC'],$date['Payee']);
        
        $req->closeCursor();
        
        return $DtoFacture;
    }  
    
    #recupère une convention à partir d'un nom:
    public function afficherParNumFacture($numFacture){
        
        echo'<table>';
            echo'<tr>';
                echo'<th>Numéro de facture</th>';
                echo'<th>Date de facture</th>';
                echo'<th>Montant HT</th>';
                echo'<th>Montant TTC</th>';
                echo'<th>Facture payée</th>';
            echo'</tr>';

        
        $requete = 'SELECT * FROM facture WHERE NumFacture="'.$numFacture.'";';
        $reponse = $this->bdd->query($requete);


       while($data = $reponse->fetch()){

            echo'</tr>';
                echo '<td>'.$data['NumFacture'].'</td>';
                echo '<td>'.$data['DateFacture'].'</td>';
                echo '<td>'.$data['MontantHT'].'</td>';
                echo '<td>'.$data['MontantTTC'].'</td>';
                echo '<td>'.$data['Payee'].'</td>';
                echo '<td><button name="button">Accéder à ma facture</button></td>';
                echo '<td><button name="button">Impr'
            echo'</tr>';
        }
        $reponse->closeCursor();
        echo'</table>';
    }    
}