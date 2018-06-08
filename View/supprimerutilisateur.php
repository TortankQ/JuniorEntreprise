<h2>Supprimer un utilisateur</h2>
<div>
    <form id="supprimerUtilisateur" method="POST" action="../Controller/SupprimerutilisateurController.php">
        <label for="identifiant">Identifiant : </label>
        <input type="user" name="username" placeholder="entrez un nom">
        <button type="submit" name="btnSupprimer">Supprimer utilisateur</button>
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