
<div>
    <form id="supprimerUtilisateur" method="POST" action="../Controller/SupprimerutilisateurController.php">
        <label for="identifiant">Identifiant</label>
        <input type="user" name="username" placeholder="Identifiant">
        <button type="submit" name="btnSupprimer">Supprimer utilisateur</button>
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