<?php
    require_once('../model/DaoCompte.php');
    require_once('../model/DtoCompte.php');
    session_start();


    $page = "modifierutilisateur";
    $erreur = "";

    #empeche l'utilisateur de charger cette page sans compte
    if(!isset($_SESSION['DtoCompte'])){
        header('Location: ./FrontController.php');
    }
    
    #empeche un utilisateur non admin de ce rendre sur le menu des utilisateurs
    if(!$_SESSION['DtoCompte']->getAdmin()){
        header('Location: ./MenuprincipalController.php');
    }
    
   #verifie le formulaire de connexion et connecte le compte à la session
    if(isset($_POST['btnModifier'])){
        if(isset($_POST['username'])&& $_POST['username']!=""){
            if(isset($_POST['password'])&& $_POST['password']!=""){
                $daoCompte = new DaoCompte($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);
                
                
                $testCompte = $daoCompte->modifierCompte($_POST['username'],$_POST['password']);
                //var_dump($testCompte);
                if(isset($testCompte)){
                    echo "compte modifié";
                }else{
                    echo "L'identifiant n'existe pas";
                }
                
            }else{
                $erreur = "Merci de renseigner un mot de passe";
            }
        }else{
            $erreur = "Merci de renseigner un identifiant";
        }
    }
    


    include("../View/layout.php");
