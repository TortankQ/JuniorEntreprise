<!-- Layout --> 
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/convention.css">
        <link rel="stylesheet" href="css/footer.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                
        <title>Junior Entreprise - <?=$page?></title>
    </head>
    <header>
        <?php include('nav.php'); ?>
    </header> 
    <body>
        <?=$erreur?>     
        <br/><br/>
        <?php include($page.'.php'); ?> 
    </body>
</html>
