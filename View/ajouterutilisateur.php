<h2>Ajouter un utilisateur</h2>
<div>
    <form id="ajouterUtilisateur" method="POST" action="../Controller/AjouterutilisateurController.php">
        <label for="identifiant">Identifiant</label>
        <input type="user" name="username" placeholder="Identifiant">
        <label for="password">Mot de Passe</label>
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
        <input type="checkbox" class="form-control" name="administrateur" value="true">Administrateur
        <br/><br/>
        <button type="submit" name="btnAjouter">Ajouter utilisateur</button>
    </form>
</div>
<br/><br/>
<div>
   <form id="retour" method="POST" action="../Controller/MenugestionutilisateurController.php">
        <button type="submit" name="btnRetour">Retour</button>
    </form>
</div>
<br/>
<div>
    <form id="deconnexion" method="POST" action="../Controller/FrontController.php">
        <button type="submit" name="btnDeconnexion">Déconnexion</button>
    </form>
</div>