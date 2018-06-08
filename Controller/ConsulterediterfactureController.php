<?php
    require_once('../model/DaoCompte.php');
    require_once('../model/DtoCompte.php');
    require_once('../model/DaoFacture.php');
    require_once('../model/DtoFacture.php');
    session_start();
    

    $page = "consulterediterfacture";
    $erreur = "";
    $affichage = 0;
    $numFacture ="";

    #empeche l'utilisateur de charger cette page sans compte
    if(!isset($_SESSION['DtoCompte'])){
        header('Location: ./FrontController.php');
    }
    $daofacture = new DaoFacture($_SESSION['hote'],$_SESSION['base'],$_SESSION['login'],$_SESSION['password']);

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
        //var_dump($_POST);
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
