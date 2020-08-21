<script type="text/javascript">
    function Visitasa() {
        alert(7); 
        var birdsCanvas = document.getElementById("birdsChart");

        var birdsData = {
            labels: ["Spring", "Summer", "Fall", "Winter"],
            datasets: [{
                    data: [12,13,15,15],
                    backgroundColor: ["rgba(255, 0, 0, 0.5)","rgba(100, 255, 0, 0.5)","rgba(200, 50, 255, 0.5)","rgba(0, 100, 255, 0.5)"']
                }]
        };
        var polarAreaChart = new Chart(birdsCanvas, {
            type: 'polarArea',
            data: birdsData
        });
    }
    Visitasa(); 

</script>