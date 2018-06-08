<?php
    require_once('../model/DaoCompte.php');
    require_once('../model/DtoCompte.php');
    require_once('../model/DaoConvention.php');
    require_once('../model/DtoConvention.php');
    require_once('../model/DaoClient.php');
    require_once('../model/DtoClient.php');
    require_once('../model/DaoEtudiant.php');
    require_once('../model/DtoEtudiant.php');
    require_once('../model/DaoTache.php');
    require_once('../model/DtoTache.php');
    require_once('../model/DaoAffectation.php');
    require_once('../model/DtoAffectation.php');
    
    session_start();
    //session_unset();
   

    $page = "formulaire_convention";
    $erreur = "";

    #empeche l'utilisateur de charger cette page sans compte
    if(!isset($_SESSION['DtoCompte'])){
        header('Location: ./FrontController.php');
    }

    #gere la creation du client dans la bdd
    if(isset($_POST['valider'])){
        if(isset($_POST['nomProjet']) && $_POST['nomProjet']!=""){
            if(isset($_POST['nomClient']) && $_POST['nomClient']!=""){
                if(isset($_POST['clientTel']) && $_POST['clientTel']!=""){
                //creation dtoClient + insert bdd
                    $dtoClient = new DtoClient($_POST['nomClient'],$_POST['numeroRue'],$_POST['rue'],$_POST['codePostal'],$_POST['clientMail'],$_POST['clientTel'],$_POST['numSiret']);
                    
                    $daoClient = new DaoClient($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);
                    
                    $daoClient->insertClient($dtoClient);
                    $_SESSION['client']=$dtoClient;
                }                
            }
        }
    }


    #gere les collaborateur de la convention
    if(isset($_POST['collaborateurNom1']) && $_POST['collaborateurNom1']!=""){
        if(isset($_POST['collaborateurPrenom1']) && $_POST['collaborateurPrenom1']!=""){
            
            $arrayCollab = array();
            //cherche l'etudiant dans la bdd et crée la dto associé arraylist

            $daoEtudiant = new DaoEtudiant($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);

            $dtoEtudiant = $daoEtudiant->getByNomEtudiant($_POST['collaborateurNom1'],$_POST['collaborateurPrenom1']);
            
            if($dtoEtudiant!=null){
                array_push($arrayCollab,$dtoEtudiant);
                
            }
            $cptCollab=2;
            
            while(isset($_POST['collaborateurNom'.$cptCollab.'']) && $_POST['collaborateurNom'.$cptCollab.'']!=""){
                //cherche l'etudiant dans la bdd et crée la dto associé
                if(isset($_POST['collaborateurPrenom'.$cptCollab.'']) && $_POST['collaborateurPrenom'.$cptCollab.'']!=""){
                    
                    $dtoEtudiant = $daoEtudiant->getByNomEtudiant($_POST['collaborateurNom'.$cptCollab],$_POST['collaborateurPrenom'.$cptCollab]);
                    
                    if($dtoEtudiant!=null){
                        array_push($arrayCollab,$dtoEtudiant);
                        $_SESSION['array']=$arrayCollab;
                    }
                }
                $cptCollab++;
            }
        }
    }

 
    
        
    if(isset($_POST['dateDebut'])){
        
        $arrayDateDebut = date_parse($_POST['dateDebut']);
        
        if(checkdate($arrayDateDebut['month'],$arrayDateDebut['day'],$arrayDateDebut['year'])){
            
            if(isset($_POST['dateFin'])){
                
                $arrayDateFin = date_parse($_POST['dateFin']);
                
                if(checkdate($arrayDateFin['month'],$arrayDateFin['day'],$arrayDateFin['year'])){
                    
                    if(isset($dtoClient)){
                        
                        if(isset($arrayCollab) && sizeof($arrayCollab)>0){
                            
                                
                             if(isset($_POST['accompte']) && $_POST['accompte']!=""){
                                    //avec accompte
                                $daoConvention = new DaoConvention($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);
                                    
                                    
                                $dtoConvention = new DtoConvention(
                                    $_POST['nomProjet'],
                                    $dtoClient->getIdClient(),
                                    $_POST['dateDebut'],
                                    $_POST['dateFin'],
                                    $_POST['totalHT'],
                                    $_POST['totalTTC'],
                                    $_POST['accompte'],
                                    $_POST['TVA'],
                                    0,
                                    $_POST['commentaire']
                                );
                                    
                                $daoConvention->insertTabConvention($dtoConvention);
                                 
                                gererTache($dtoConvention);
                                 
                                 
                                echo "Convention crée | Numéro Convention: ".$dtoConvention->getNumConvention();
//                                $daoAffectation = new DaoAffectation($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);
//                                 
//                                for($i = 0; $i<$arrayCollab;$i++){
//                                    $dtoAffectation = new DtoAffectation($arrayCollab[$i]->getIdEtudiant(),$dtoConvention->getNumConvention());
//                                    
//                                    $daoAffectation->insertAffectation($dtoAffectation);
//                                }
                                 
                            }else{
                                //sans accompte
                                $daoConvention = new DaoConvention($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);
                                
                                    
                                $dtoConvention = new DtoConvention(
                                    $_POST['nomProjet'],
                                    $dtoClient->getIdClient(),
                                    $_POST['dateDebut'],
                                    $_POST['dateFin'],
                                    $_POST['totalHT'],
                                    $_POST['totalTTC'],
                                    0,
                                    $_POST['TVA'],
                                    0,
                                    $_POST['commentaire']
                                );
                                    
                                $daoConvention->insertTabConvention($dtoConvention);
                                $_SESSION['dtoConvention']=$dtoConvention;
                                gererTache($dtoConvention);
                                 
                                echo "Convention crée | Numéro Convention: ".$dtoConvention->getNumConvention();
                                 
//                                 $daoAffectation = new DaoAffectation($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);
//                                 
//                                for($i = 0; $i<$arrayCollab;$i++){
//                                    $dtoAffectation = new DtoAffectation($arrayCollab[$i]->getIdEtudiant(),$dtoConvention->getNumConvention());
//                                    
//                                    $daoAffectation->insertAffectation($dtoAffectation);
//                                }
                            }
                        }
                    }
                }
            }
        }          
    }


   function gererTache($dtoConvention){
        #gere les taches de la convention
        if(isset($_POST['intituletache1']) && $_POST['intituletache1']!=""){
            if(isset($_POST['quantite1']) && $_POST['quantite1']!=""){
                if(isset($_POST['prixht1']) && $_POST['prixht1']!=""){
                    //crée une DTO tache
                    $arrayTache = array();

                    $daoTache = new DaoTache($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);

                    $dtoTache = new DtoTache($dtoConvention->getNumConvention(),$_POST['intituletache1'],$_POST['quantite1'],$_POST['prixht1']);

                    if($dtoTache!=null){
                        $daoTache->insertTache($dtoTache);
                        array_push($arrayTache,$dtoTache);
                        $_SESSION['test2']=$arrayTache;
                    }


                    $cptTache=2;

                    
                    while(isset($_POST['intituletache'.$cptTache]) && $_POST['intituletache'.$cptTache]!=""){
                        if(isset($_POST['quantite'.$cptTache]) && $_POST['quantite'.$cptTache]!=""){
                            if(isset($_POST['prixht'.$cptTache]) && $_POST['prixht'.$cptTache]!=""){
                                //crée des DTO tache

                                $dtoTache = new DtoTache($dtoConvention->getNumConvention(),$_POST['intituletache'.$cptTache],$_POST['quantite'.$cptTache],$_POST['prixht'.$cptTache]);

                                if($dtoTache!=null){
                                    $daoTache->insertTache($dtoTache);
                                    array_push($arrayTache,$dtoTache);
                                    $_SESSION['test2']=$arrayTache;
                                }
                            }
                        }
                        $cptTache++;
                    }              
                }
            }
        }
    }
    

    

    include("../View/layout.php");

    