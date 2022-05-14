<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Pie charts are very popular for showing a compact overview of a
        composition or comparison. While they can be harder to read than
        column charts, they remain a popular choice for small datasets.
    </p>
</figure>

<script>
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Reporte de Estadísticas de Ventas'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Mes',
            colorByPoint: true,
            data: [{
                    name: 'Enero',
                    y: <?= $enero ?>
                }, {
                    name: 'Febrero',
                    y: <?= $febrero ?>
                }, {
                    name: 'Marzo',
                    y: <?= $marzo ?>
                }, {
                    name: 'Abril',
                    y: <?= $abril ?>
                }, {
                    name: 'Mayo',
                    y: <?= $mayo ?>
                }, {
                    name: 'Junio',
                    y: <?= $junio ?>
                }, {
                    name: 'Julio',
                    y: <?= $julio ?>
                }, {
                    name: 'Agosto',
                    y: <?= $agosto ?>
                },
                {
                    name: 'Septiembre',
                    y: <?= $septiembre ?>
                }, {
                    name: 'Octubre',
                    y: <?= $octubre ?>
                }, {
                    name: 'Noviembre',
                    y: <?= $noviembre ?>
                }, {
                    name: 'Diciembre',
                    y: <?= $diciembre ?>
                }
            ]
        }]
    });
</script>