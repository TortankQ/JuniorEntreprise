<?php
    define("HOTE",     "localhost");
    define("BASE",     "junior");
    define("LOGIN",    "root");
    define("PASSWORD", "");



    require_once('../model/DaoCompte.php');
    require_once('../model/DtoCompte.php');
    session_start();

    $_SESSION['hote']=HOTE;
    $_SESSION['base']=BASE;
    $_SESSION['login']=LOGIN;
    $_SESSION['password']=PASSWORD;
    
    $page = "connexion";
    $erreur = "";
    
    
    #supprime le compte de la session
    if(isset($_POST['btnDeconnexion'])){
        $_SESSION['DtoCompte'] = "";
        session_unset();
    }
    
    #si connecter renvoie vers le menu principal
    if(isset($_SESSION['DtoCompte'])){
        header('Location: ./MenuprincipalController.php');
    }
    
    
    #verifie le formulaire de connexion et connecte le compte à la session
    if(isset($_POST['btnConnexion'])){
        if(isset($_POST['username'])&& $_POST['username']!=""){
            if(isset($_POST['password'])&& $_POST['password']!=""){
                $daoCompte = new DaoCompte(HOTE,BASE,LOGIN,PASSWORD);
                
                $dtoCompte = $daoCompte->verifieCompte($_POST['username'],$_POST['password']);
                
                
                if(isset($dtoCompte)){
                    $daoCompte->connectUser($dtoCompte);
                    header('Location: ./MenuprincipalController.php');
                }else{
                    $erreur = "Erreur d'authentification";
                }
            }else{
                $erreur = "Merci de renseigner un mot de passe";
            }
        }else{
            $erreur = "Merci de renseigner un identifiant";
        }
    }
    

    include('../View/layout.php');