
function Visitas(datos,label,color){   
    var colores="'"+color+"'"; 
    color=colores.replace(/-/g,"','");    
    var birdsCanvas = document.getElementById("birdsChart");

var birdsData = {
  labels: ["Spring","Summer","Fall","Winter"],
  datasets: [{
    data:  datos,
    backgroundColor: color
  }]
}; 
var polarAreaChart = new Chart(birdsCanvas, {
  type: 'polarArea',
  data: birdsData
}); 
}
