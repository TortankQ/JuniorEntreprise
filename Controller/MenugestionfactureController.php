<?php

    session_start();
 

    $page = "menugestionfacture";
    $erreur = "";

    #empeche l'utilisateur de charger cette page sans compte
    if(!isset($_SESSION['DtoCompte'])){
        header('Location: ./FrontController.php');
    }

    include("../View/layout.php");