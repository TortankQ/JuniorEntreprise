var champTotalHT = document.getElementById("totalht");


function calculTotalHT(){
    var total = 0;
    var cptPrixHT = 1;
    var champPrixTache;
    var champQuantite;
    while(((champPrixTache = document.getElementById("prixht"+cptPrixHT))!=undefined) && ((champQuantite = document.getElementById("quantite"+cptPrixHT))!=undefined)){
        if(!(isNaN(parseFloat(champPrixTache.value)) && isNaN(parseInt(champQuantite.value)))){
            total = total+(parseFloat(champPrixTache.value)*parseInt(champQuantite.value));
        }
        champTotalHT.value = total.toFixed(2);
        cptPrixHT++;
    }
    
    if(document.getElementById("tva").value != 0){
        calculTotalTTC();
    }
   
}