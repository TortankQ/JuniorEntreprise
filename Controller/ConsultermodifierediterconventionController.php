<?php
    require_once('../model/DaoCompte.php');
    require_once('../model/DtoCompte.php');
    require_once('../model/DaoConvention.php');
    require_once('../model/DtoConvention.php');
    session_start();
    

    $page = "consultermodifierediterconvention";
    $erreur = "";
    $affichage = 0;
    $numConvention ="";
    $nomConvention ="";

    #empeche l'utilisateur de charger cette page sans compte
    if(!isset($_SESSION['DtoCompte'])){
        header('Location: ./FrontController.php');
    }
    $daoConvention = new DaoConvention($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);

    if(isset($_GET['btn'])){
        if($_GET['btn']=="Consulter"){
            if(isset($_GET['numConvention'])){
                //$dtoConvention = $daoCompte->recupconvbynum();
                //renvoi sur le formulaire remplie
            }
        }
    }
    
    if(isset($_GET['btn'])){
        if($_GET['btn']=="Modifier"){
            if(isset($_GET['numConvention'])){
                //$dtoConvention = $daoCompte->recupconvbynum();
                //renvoi sur le formulaire remplie + bouton modifier
            }
        }
    }

        
    if(isset($_GET['btn'])){
        if($_GET['btn']=="Editer"){
            if(isset($_GET['numConvention'])){
                //$dtoConvention = $daoCompte->recupconvbynum();
                //renvoi sur le formulaire remplie + bouton Editer
            }
        }
    }

    if(isset($_POST['btnRechercher'])){
        var_dump($_POST);
        if(isset($_POST['numeroConvention']) && $_POST['numeroConvention']!=""){
            $affichage = 1;
            $numConvention = $_POST['numeroConvention'];
        }
        if(isset($_POST['nomConvention']) && $_POST['nomConvention']!=""){
            $affichage=2;
            $nomConvention = $_POST['nomConvention'];
        }
    }

    
    









    include("../View/layout.php");