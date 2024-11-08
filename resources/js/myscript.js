

const allTotalValues = document.getElementsByClassName('total_value')

let totalTatalValues = 0;
for(let i = 0; i < allTotalValues.length;i++){
    totalTatalValues += parseFloat(allTotalValues[i].innerHTML.substring(1))
}

const totalTatalValuesElement = document.getElementById("totalTatalValues")
if(totalTatalValuesElement){
    totalTatalValuesElement.innerHTML = "$"+totalTatalValues;
}
