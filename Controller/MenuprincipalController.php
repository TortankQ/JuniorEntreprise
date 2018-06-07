<?php
    require_once('../model/DaoCompte.php');
    require_once('../model/DtoCompte.php');

    session_start();
    

    $page = "menuprincipal";
    $erreur = "";

    #empeche l'utilisateur de charger cette page sans compte
    if(!isset($_SESSION['DtoCompte'])){
        header('Location: ./FrontController.php');
    }
    
    $dtoCompte = $_SESSION['DtoCompte'];
    $admin = $dtoCompte->getAdmin();
   
    include("../View/layout.php");