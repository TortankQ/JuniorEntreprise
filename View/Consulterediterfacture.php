<div>
    <form id="rechercheFacture" method="POST" action="../Controller/ConsulterediterfactureController.php">
        <input name="numeroFacture" type="number" placeholder="N°Facture">
        <input name="nomClient" type="text" placeholder="Nom Client">
        <button type="submit" name="btnRechercher">Rechercher</button>
    </form>
</div>
<?php if($affichage == 0): ?>
    <?=$daofacture->afficherTabFacture();?>
<?php elseif($affichage == 1) :?>
    <?=$daoConvention->afficherParNumFacture($numFacture);?>
<?php endif; ?> 
<div>
   <form id="retour" method="POST" action="../Controller/MenugestionfactureController.php">
        <button type="submit" name="btnRetour">Retour</button>
    </form>
</div>