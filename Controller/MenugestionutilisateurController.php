<?php
    require_once('../model/DaoCompte.php');
    require_once('../model/DtoCompte.php');
    session_start();
 

    $page = "menugestionutilisateur";
    $erreur = "";

    #empeche l'utilisateur de charger cette page sans compte
    if(!isset($_SESSION['DtoCompte'])){
        header('Location: ./FrontController.php');
    }
    
    #empeche un utilisateur non admin de ce rendre sur le menu des utilisateurs
    if(!$_SESSION['DtoCompte']->getAdmin()){
        header('Location: ./MenuprincipalController.php');
    }


    include("../View/layout.php");
