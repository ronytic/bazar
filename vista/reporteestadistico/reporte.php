<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>

</figure>

<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Reporte de Estadísticas de Ventas'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad de Ventas'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Total: <b>{point.y:.1f}</b>'
        },
        series: [{
            name: 'Population',
            data: [
                ['Enero', <?= $enero ?>],
                ['Febero', <?= $febrero ?>],
                ['Marzo', <?= $marzo ?>],
                ['Abril', <?= $abril ?>],
                ['Mayo', <?= $mayo ?>],
                ['Junio', <?= $junio ?>],
                ['Julio', <?= $julio ?>],
                ['Agosto', <?= $agosto ?>],
                ['Septiembre', <?= $septiembre ?>],
                ['Octubre', <?= $octubre ?>],
                ['Noviembre', <?= $noviembre ?>],
                ['Diciembre', <?= $diciembre ?>]
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
</script>