<div>
    <form id="rechercheConvention" method="POST" action="../Controller/ConsultermodifierediterconventionController.php">
        <input name="numeroConvention" type="number" placeholder="N°">
        <input name="nomConvention" type="text" placeholder="Nom">
        <button type="submit" name="btnRechercher">Rechercher</button>
    </form>
</div>
<?php if($affichage == 0): ?>
    <?=$daoConvention->afficherTabConvention();?>
<?php elseif($affichage == 1) :?>
    <?=$daoConvention->afficherTabConventionNum($numConvention);?>
<?php elseif($affichage == 2) :?>
    <?=$daoConvention->afficherTabConventionNom($nomConvention);?>
<?php endif; ?> 
<div>
   <form id="retour" method="POST" action="../Controller/MenugestionconventionController.php">
        <button type="submit" name="btnRetour">Retour</button>
    </form>
</div>