
<div>
    <form id="gestionConvention" method="POST" action="../Controller/MenugestionconventionController.php">
        <button type="submit" name="btnGestionConvention">Gestion des conventions</button>
    </form>
</div>
<!--
<div>
    <form id="gestionFacture" method="POST" action="../Controller/MenugestionfactureController.php">
        <button type="submit" name="btnGestionFacture">Gestion des factures</button>
    </form>
</div>
-->
<?php if($admin): ?>
<div>
    <form id="gestionUtilisateur" method="POST" action="../Controller/MenugestionutilisateurController.php">
        <button type="submit" name="btnGestionUtilisateur">Gestion des utilisateurs</button>
    </form>
</div>
<?php endif; ?>
<div>
    <form id="deconnexion" method="POST" action="../Controller/FrontController.php">
        <button type="submit" name="btnDeconnexion">Déconnexion</button>
    </form>
</div>
