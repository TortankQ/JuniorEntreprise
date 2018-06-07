
<div>
    <form id="modifierUtilisateur" method="POST" action="../Controller/ModifierutilisateurController.php">
        <label for="identifiant">Identifiant</label>
        <input type="user" name="username" placeholder="Identifiant">
        <label for="newpassword">Nouveau Mot de passe</label>
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
        <button type="submit" name="btnModifier">Modifier utilisateur</button>
    </form>
</div>
<div>
   <form id="retour" method="POST" action="../Controller/MenugestionutilisateurController.php">
        <button type="submit" name="btnRetour">Retour</button>
    </form>
</div>
<div>
    <form id="deconnexion" method="POST" action="../Controller/FrontController.php">
        <button type="submit" name="btnDeconnexion">Déconnexion</button>
    </form>
</div>