<?php
    /* Authors :    Tayfun Ozturk
                    Julien Frillici
                    Bilge Ekinci
                    05-2018 / AppliSynth - Junior Entreprise
    Classe DTO Client*/


class DaoClient{
    
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
    
    //Ajoute/modifie un client à la bdd
    public function insertClient($DtoClient){
        
        $requete = 'INSERT INTO client(NomClient, NumRue, NomRue, CP, Mail, Tel, Siret) values(:t_NomClient, :t_NumRue, :t_NomRue, :t_CP, :t_Mail, :t_Tel, :t_Siret);';
        
        
        $req = $this->bdd->prepare($requete);
        $donnes = $req->execute( array(
            't_NomClient' => $DtoClient->getNomClient(),
            't_NumRue' => intval($DtoClient->getNumRue()),
            't_NomRue' => $DtoClient->getNomRue(),
            't_CP' => $DtoClient->getCP(),
            't_Mail' => $DtoClient->getMail(),
            't_Tel' => $DtoClient->getTel(),
            't_Siret' => $DtoClient->getSiret(),
        ));
        

        $requete2 = 'SELECT * FROM client WHERE NomClient=? and NumRue=? and NomRue=? and CP=? and Mail=? and Tel=? and Siret=?;';
        
        $req2 = $this->bdd->prepare($requete2);
        
        $req2->execute(array($DtoClient->getNomClient(), $DtoClient->getNumRue(), $DtoClient->getNomRue(), $DtoClient->getCP(), $DtoClient->getMail(), $DtoClient->getTel(), $DtoClient->getSiret()));
         
        $data=$req2->fetch();
                       
        $DtoClient->setIdClient($data['IdClient']);

        
        $req2->closecursor();
    } 
    
    //Affiche client par son Id
    function afficherTabClientId($IdClient) {
        echo'<table>';
            echo'<tr>';
                echo'<th>Id Client</th>';
                echo'<th>Nom</th>';
                echo'<th>Siret</th>';
                echo'<th>Adresse : numéro Rue</th>';
                echo'<th>Adresse : nom Rue</th>';
                echo'<th>Code postal</th>';
                echo'<th>Mail</th>';
                echo'<th>Téléphone</th>';
            echo'</tr>';
        
        $requete = 'SELECT * FROM client WHERE IdClient='.$IdClient.';';
        $reponse = $this->bdd->query($requete);

        while($data = $reponse->fetch()){
                echo '<td>'.$data['IdClient'].'</td>';
                echo '<td>'.$data['NomClient'].'</td>';
                echo '<td>'.$data['Siret'].'</td>';
                echo '<td>'.$data['NumRue'].'</td>';
                echo '<td>'.$data['NomRue'].'</td>';
                echo '<td>'.$data['MontantTTC'].'</td>';
                echo '<td>'.$data['Acompte'].'</td>';
                echo '<td>'.$data['TVA'].'</td>';
                echo '<td>'.$data['Signature'].'</td>';
                echo '<td>'.$data['Commentaire'].'</td>';
        
            echo'<tr>';    
                echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Consulter&numConvention='.$data['NumConvention'].'>Consulter</a></td>';
                echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Modifer&numConvention='.$data['NumConvention'].'>Modifier</a></td>';
                echo'<td><a href="ConsultermodifierediterconventionController.php?btn=Editer&numConvention='.$data['NumConvention'].'>Editer</a></td>';
            echo'</tr>';
        }
        $reponse->closeCursor();
        echo'</table>';
    }
    
    
    //Getter
    public function getByIdClient($IdClient){
        $requete = 'SELECT * FROM client where IdClient=?;';
        $req = $this->bdd->prepare($requete);
        $req->execute(array($IdClient));
        
        $data = $req->fetch();
            
        $DtoClient = new DtoClient($data['IdClient'],$data['NomClient'],$data['NumRue'],$data['CP'],$date['Mail'], $data=['Tel'], $data=['Siret']);
        
        $req->closeCursor();
        
        return $DtoClient;
    }  
}
