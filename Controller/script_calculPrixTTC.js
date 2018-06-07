var champTotalTTC = document.getElementById("totalttc");



function calculTotalTTC(){
    var tva = document.getElementById("tva").value;
    var totalHT = document.getElementById("totalht").value;
    
    totalTTC = parseFloat(totalHT) + (totalHT*parseFloat("0."+tva));
    
    champTotalTTC.value = totalTTC.toFixed(2);
    
}