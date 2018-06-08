<h2>Créer ma convention</h2>

   <div id="layout_under_header">&nbsp;
    <form id="convention" method="POST"  action="../Controller/CreationconventionController.php" >
        <h3>Les champs marqués d'un astérisque * sont obligatoires</h3>
       <input type="text" id="nomProjet" name="nomProjet" placeholder="Nom Projet*" />
       <br/><br/>
       <br/>
        <div>
            <h4>Le client</h4>
            <input type="text" id="clientname" name="nomClient" placeholder="Nom client*" />
            <input type="text" id="clientMail" name="clientMail" placeholder="Mail" />
            <input type="text" id="clientTel" name="clientTel" placeholder="Tél*" />
            <input type="number" id="siretnumber" name="numSiret" placeholder="N° Siret" />
        </div>
        <br/><br/>
        <div>
            <input type="number" id="numero" name="numeroRue" placeholder="N°" />
            <input type="text" id="rue" name="rue" placeholder="Rue" />
            <input type="number" id="codepostal" name="codePostal" placeholder="Code postal" max="99999" />
        </div>
        <br/><br/>
     
        <div>
            <h4>Les collaborateurs</h4>
            <span id="zoneCollab">
                <input type="text" id="collaborateurNom1" name="collaborateurNom1" placeholder="Nom Collaborateur*" />
                <input type="text" id="collaborateurPrenom1" name="collaborateurPrenom1" placeholder="Prénom Collaborateur*" />
                
            </span>
            <input type="button" id="btnPlusCollab" onclick="addCollab()" name="btnPlusCollab" value="+"/>
        </div>
        <br/><br/>

        <h4>Les tâches</h4>
        <div id="zoneTache">
            <input type="text" id="intituletache1" name="intituletache1" placeholder="Intitule tâche*" />
            <input type="number" id="quantite1" name="quantite1" onchange = "calculTotalHT()" placeholder="Qté" />
            <input type="number" id="prixht1" name="prixht1" onchange = "calculTotalHT()" placeholder="Prix HT" />
            <input type="button" id="btnPlusTache" onclick="addTache()" name="btnPlusTache" value="+"/>
        </div>
            
        <br/><br/>


        <div>
          <input type="number" id="totalht" name="totalHT" placeholder="Total HT" readonly/>
          <input type="number" id="tva" name="TVA" onchange="calculTotalTTC()" placeholder="TVA" />
          <input type="number" id="totalttc" name="totalTTC" placeholder="Total TTC" readonly/>
        </div>
        <br/><br/>

        <div>
          <input type="number" id="accompte" name="accompte" placeholder="Accompte" />
           Date début : <input type="date" id="datedebut" name="dateDebut" min="<?php echo date('Y-m-d');?>" placeholder="Date début*" />
           Date fin : <input type="date" id="dateFin" name="dateFin" min="<?php echo date('Y-m-d');?>" placeholder="Date fin*" />
        </div>
        <br/><br/>
        <div>
          <input type="textarea" id="commentaire" name="commentaire" placeholder="Commentaire" height="200" />

        </div>
        <br/><br/>

        <div class="button_action">
            <div>
                <button type="submit" id="valider" name="valider">Valider</button>
            </div>
        </div>

    </form>
    <br/><br/><br/>
    <div>
        <form id="retour" method="POST" action="../Controller/MenugestionconventionController.php">
            <button type="submit" name="btnRetour">Retour</button>
        </form>
    </div>
    <br/>
    <div>
        <form id="deconnexion" method="POST" action="../Controller/FrontController.php">
            <button type="submit" name="btnDeconnexion">Déconnexion</button>
        </form>
    </div>
    
    <script src="../Controller/script_ajoutCollab.js"></script>
    <script src="../Controller/script_ajoutTache.js"></script> 
    <script src="../Controller/script_calculPrixHT.js"></script> 
    <script src="../Controller/script_calculPrixTTC.js"></script>

</div><!--fin du layout_under_header-->
