var zoneTache = document.getElementById("zoneTache");
var cpt = 2;
function addTache(){
    zoneTache.appendChild(document.createElement("br"));
    var inputTache = document.createElement("input");
    inputTache.name = "intituletache"+cpt;
    inputTache.placeholder = "Intitule tâche";
    zoneTache.appendChild(inputTache);
    var inputQuantite = document.createElement("input");
    inputQuantite.name = "quantite"+cpt;
    inputQuantite.id = "quantite"+cpt;
    inputQuantite.placeholder = "Qté";
    inputQuantite.addEventListener("change",calculTotalHT);
    zoneTache.appendChild(inputQuantite);
    var inputPrixHT = document.createElement("input");
    inputPrixHT.name = "prixht"+cpt;
    inputPrixHT.id = "prixht"+cpt;
    inputPrixHT.placeholder = "Prix HT";
    inputPrixHT.addEventListener("change",calculTotalHT);
    zoneTache.appendChild(inputPrixHT);
    
    cpt++;
}
 