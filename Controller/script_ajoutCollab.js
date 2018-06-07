var inputCollab = document.getElementById("zoneCollab");
var cptCollab = 2;
function addCollab(){
    var inputNom = document.createElement("input");
    inputNom.name = "collaborateurNom"+cptCollab;
    inputNom.placeholder = "Nom Collaborateur";
    var inputPrenom = document.createElement("input");
    inputPrenom.name = "collaborateurPrenom"+cptCollab;
    inputPrenom.placeholder = "Prénom Collaborateur";
    inputCollab.appendChild(document.createElement("br"));
    inputCollab.appendChild(inputNom);
    inputCollab.appendChild(inputPrenom);
    cptCollab++;
}
 