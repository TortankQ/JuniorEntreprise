<?php
    require_once('../model/DaoCompte.php');
    require_once('../model/DtoCompte.php');
    require_once('../model/DaoConvention.php');
    require_once('../model/DtoConvention.php');
    session_start();
 
    
    $page = "menugestionconvention";
    $erreur = "";

    #empeche l'utilisateur de charger cette page sans compte
    if(!isset($_SESSION['DtoCompte'])){
        header('Location: ./FrontController.php');
    }
    
    if(isset($_POST['btnModifierEditerConvention'])){
        $page = "consultermodifierediterconvention";
    }
    

    
    
/*
    if(isset($_POST['btnModifierEditerConvention'])){
        $page = "consultermodifierediterconvention";
    }
    
   */ 

   

    include("../View/layout.php");