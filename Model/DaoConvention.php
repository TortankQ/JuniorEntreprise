<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DAO Convention*/


class DaoConvention
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
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (Exception $e){
            die('Erreur :' . $e->getMessage());
        }
    }
    
    //Fonction qui insere une nouvelle convention dans la BDD:
    public function insertTabConvention($DtoConvention){
        
        $requete = 'INSERT INTO convention(NomProjet, IdClient, DateDebut, DateFin, MontantHT,
                             MontantTTC, Acompte, TVA, Signature, Commentaire) values(:t_NomProjet,:t_IdClient, :t_DateDebut,:t_DateFin, :t_MontantHT, :t_MontantTTC, :t_Acompte, :t_TVA, :t_Signature, :t_Commentaire);';
        
        $req = $this->bdd->prepare($requete);
        $req->execute( array(
            't_NomProjet' => $DtoConvention->getNomProjet(),
            't_IdClient' => $DtoConvention->getIdClient(),
            't_DateDebut' => $DtoConvention->getDateDebut(),
            't_DateFin' => $DtoConvention->getDateFin(),
            't_MontantHT' => $DtoConvention->getMontantHT(),
            't_MontantTTC' => $DtoConvention->getMontantTTC(),
            't_Acompte' => $DtoConvention->getAcompte(),
            't_TVA' => $DtoConvention->getTVA(),
            't_Signature' => $DtoConvention->getSignature(),
            't_Commentaire' => $DtoConvention->getCommentaire()
        ));
        
        
        $requete2 = 'SELECT * FROM convention WHERE NomProjet=? and IdClient=? and DateDebut=? and DateFin=? and MontantHT=? and MontantTTC=? and Acompte=? and TVA=? and Signature=? and Commentaire=?;';
        
        $req2 = $this->bdd->prepare($requete2);
        
        $req2->execute(array($DtoConvention->getNomProjet(), $DtoConvention->getIdClient(), $DtoConvention->getDateDebut(), $DtoConvention->getDateFin(), $DtoConvention->getMontantHT(), $DtoConvention->getMontantTTC(), $DtoConvention->getAcompte(), $DtoConvention->getTVA(), $DtoConvention->getSignature(), $DtoConvention->getCommentaire()));
         
        $data=$req2->fetch();
                       
        $DtoConvention->setNumConvention($data['NumConvention']);
        
        $req2->closecursor();
    }
    
    #Fonction qui affiche la liste des conventions dans laa BDD:
    public function afficherTabConvention(){
        
        echo'<table>';
            echo'<tr>';
                echo'<th>Numéro de convention</th>';
                echo'<th>Nom du projet</th>';
                echo'<th>Id Client</th>';
                echo'<th>Date début</th>';
                echo'<th>Date fin</th>';
                echo'<th>Montant HT</th>';
                echo'<th>Montant TTC</th>';
                echo'<th>Acompte</th>';
                echo'<th>TVA</th>';
                echo'<th>Signature</th>';
                echo'<th>Commentaire</th>';
            echo'</tr>';
   
        $requete = 'SELECT * FROM convention;';
        $reponse = $this->bdd->query($requete);
        while($data = $reponse->fetch()){

            echo'</tr>';
                echo '<td>'.$data['NumConvention'].'</td>';
                echo '<td>'.$data['NomProjet'].'</td>';
                echo '<td>'.$data['IdClient'].'</td>';
                echo '<td>'.$data['DateDebut'].'</td>';
                echo '<td>'.$data['DateFin'].'</td>';
                echo '<td>'.$data['MontantHT'].'</td>';
                echo '<td>'.$data['MontantTTC'].'</td>';
                echo '<td>'.$data['Acompte'].'</td>';
                echo '<td>'.$data['TVA'].'</td>';
                echo '<td>'.$data['Signature'].'</td>';
                echo '<td>'.$data['Commentaire'].'</td>';

               // echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Consulter&numConvention='.$data['NumConvention'].'">Consulter</a></td>';
               // echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Modifer&numConvention='.$data['NumConvention'].'">Modifier</a></td>';
               // echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Editer&numConvention='.$data['NumConvention'].'">Editer</a></td>';
            
            echo'</tr>';
            /*
            echo '<form action="ConsultermodifierediterconventionController.php" method="GET">';
            echo '<input type="submit" value='.$data['NumConvention'].'name="btnConsulter">Consulter</input></td>';
            echo '<form action="ConsultermodifierediterconventionController.php" method="GET">';
            echo '<input type="submit" value='.$data['NumConvention'].'name="btnModifier">Modifier</input></td>';
            echo '<form action="ConsultermodifierediterconventionController.php" method="GET">';
            echo '<input type="submit" value='.$data['NumConvention'].'name="btnEditer">Editer</input></td>';
            */
        }
        $reponse->closeCursor();
        echo'</table>';
        
    }


    public function updateTabConvention($UpdatedDtoConvention){
        
        echo'<table>';
            echo'<tr>';
                echo'<th>Numéro de convention</th>';
                echo'<th>Nom du projet</th>';
                echo'<th>Id Client</th>';
                echo'<th>Date début</th>';
                echo'<th>Date fin</th>';
                echo'<th>Montant HT</th>';
                echo'<th>Montant TTC</th>';
                echo'<th>Acompte</th>';
                echo'<th>TVA</th>';
                echo'<th>Signature</th>';
                echo'<th>Commentaire</th>';
            echo'</tr>';

   
        $requete = 'UPDATE convention SET NomProjet=:t_NomProjet, IdClient =:t_IdClient, DateDebut=:t_DateDebut, DateFin=:t_DateFin, MontantHT=:t_MontantHT, Acompte=:t_Acompte, TVA=:t_TVA, Signature=:t_Signature, Commentaire=:t_Commentaire WHERE NumConvention=$DtoConvention->NumConvention;';

        $reponse = $this->bdd->query($requete);
        $reponse->execute( array(
            't_NomProjet' => $DtoConvention->getNomProjet(),
            't_IdClient' => $DtoConvention->getIdClient(),
            't_DateDebut' => $DtoConvention->getDateDebut(),
            't_DateFin' => $DtoConvention->getDateFin(),
            't_MontantHT' => $DtoConvention->getMontantHT(),
            't_MontantTTC' => $DtoConvention->getMontantTTC(),
            't_Acompte' => $DtoConvention->getAcompte(),
            't_TVA' => $DtoConvention->getTVA(),
            't_Signature' => $DtoConvention->getSignature(),
            't_Commentaire' => $DtoConvention->getCommentaire(),
        ));
       
        $reponse->closeCursor();
        echo'</table>';
    }

    #getter
    
    #recupère une convention à partir de son numéro:
    public function getByNumConvention($numConvention){
        $requete = 'SELECT * FROM convention where NumConvention=?;';
        
        $req = $this->bdd->prepare($requete);
        
        $req->execute(array($numConvention));
        
        $data = $req->fetch();
            
        $DtoConvention = new DtoConvention ($data['NomProjet'],$data['IdClient'],$data['DateDebut'],$data['DatFin'],$date['MontantHT'], $data=['MontantTTC'], $data=['Acompte'], $data=['TVA'], $data=['Signature'], $data=['Commentaire']);
        
        $req->closeCursor();
        
        $DtoConvention->setIdClient($data['IdClient']);
        
        return $DtoConvention;
    }  
    
    #recupère une convention à partir d'un nom:
    public function afficherTabConventionNom($nomProjet){
        
        echo'<table>';
            echo'<tr>';
                echo'<th>Numéro de convention</th>';
                echo'<th>Nom du projet</th>';
                echo'<th>Id Client</th>';
                echo'<th>Date début</th>';
                echo'<th>Date fin</th>';
                echo'<th>Montant HT</th>';
                echo'<th>Montant TTC</th>';
                echo'<th>Acompte</th>';
                echo'<th>TVA</th>';
                echo'<th>Signature</th>';
                echo'<th>Commentaire</th>';
            echo'</tr>';
        
        $requete = 'SELECT * FROM convention WHERE NomProjet="'.$nomProjet.'";';
        $reponse = $this->bdd->query($requete);


       while($data = $reponse->fetch()){

            echo'</tr>';
                echo '<td>'.$data['NumConvention'].'</td>';
                echo '<td>'.$data['NomProjet'].'</td>';
                echo '<td>'.$data['IdClient'].'</td>';
                echo '<td>'.$data['DateDebut'].'</td>';
                echo '<td>'.$data['DateFin'].'</td>';
                echo '<td>'.$data['MontantHT'].'</td>';
                echo '<td>'.$data['MontantTTC'].'</td>';
                echo '<td>'.$data['Acompte'].'</td>';
                echo '<td>'.$data['TVA'].'</td>';
                echo '<td>'.$data['Signature'].'</td>';
                echo '<td>'.$data['Commentaire'].'</td>';

                //echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Consulter&numConvention='.$data['NumConvention'].'">Consulter</a></td>';
                //echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Modifer&numConvention='.$data['NumConvention'].'">Modifier</a></td>';
                //echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Editer&numConvention='.$data['NumConvention'].'">Editer</a></td>';
            
            echo'</tr>';
        }
        $reponse->closeCursor();
        echo'</table>';
    }
    
    //Affiche la convention par son numéro
    function afficherTabConventionNum ($numConvention) {
        echo'<table>';
                echo'<th>Numéro de convention</th>';
                echo'<th>Nom du projet</th>';
                echo'<th>Id Client</th>';
                echo'<th>Date début</th>';
                echo'<th>Date fin</th>';
                echo'<th>Montant HT</th>';
                echo'<th>Montant TTC</th>';
                echo'<th>Acompte</th>';
                echo'<th>TVA</th>';
                echo'<th>Signature</th>';
                echo'<th>Commentaire</th>';
        
        $requete = 'SELECT * FROM convention WHERE NumConvention='.$numConvention.';';
        $reponse = $this->bdd->query($requete);

        while($data = $reponse->fetch()){

            echo'<tr>';
                echo '<td>'.$data['NumConvention'].'</td>';
                echo '<td>'.$data['NomProjet'].'</td>';
                echo '<td>'.$data['IdClient'].'</td>';
                echo '<td>'.$data['DateDebut'].'</td>';
                echo '<td>'.$data['DateFin'].'</td>';
                echo '<td>'.$data['MontantHT'].'</td>';
                echo '<td>'.$data['MontantTTC'].'</td>';
                echo '<td>'.$data['Acompte'].'</td>';
                echo '<td>'.$data['TVA'].'</td>';
                echo '<td>'.$data['Signature'].'</td>';
                echo '<td>'.$data['Commentaire'].'</td>';

                //echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Consulter&numConvention='.$data['NumConvention'].'">Consulter</a></td>';
                //echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Modifer&numConvention='.$data['NumConvention'].'">Modifier</a></td>';
                //echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Editer&numConvention='.$data['NumConvention'].'">Editer</a></td>';

            echo'</tr>';
        }
        $reponse->closeCursor();
        echo'</table>';
    }
    
}
