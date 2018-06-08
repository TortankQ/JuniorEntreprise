<h2>Menu Gestion Utilisateur</h2>
<div>
    <form id="ajouterUtilisateur" method="POST" action="../Controller/AjouterutilisateurController.php">
        <button type="submit" name="btnAjouterUtilisateur">Ajouter utilisateur</button>
    </form>
</div>
<br/><br/>
<div>
    <form id="modifierUtilisateur" method="POST" action="../Controller/ModifierutilisateurController.php">
        <button type="submit" name="btnModifierUtilisateur">Modifier utilisateur</button>
    </form>
</div>
<br/><br/>
<div>
    <form id="supprimerUtilisateur" method="POST" action="../Controller/SupprimerutilisateurController.php">
        <button type="submit" name="btnSupprimerutilisateur">Supprimer utilisateur</button>
    </form>
</div>
<br/><br/>
<div>
   <form id="retour" method="POST" action="../Controller/MenuprincipalController.php">
        <button type="submit" name="btnRetour">Retour</button>
    </form>
</div>
<br/>
<div>
    <form id="deconnexion" method="POST" action="../Controller/FrontController.php">
        <button type="submit" name="btnDeconnexion">Déconnexion</button>
    </form>
</div>
