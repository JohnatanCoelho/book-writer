<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/themes/adaptive.js"></script>
    <style>
        .form-cad {
            margin: 0 auto;
            margin-top: 3%;
            width: 30%;
        }

        form input {
            width: 100%;
            padding: 15px;
            margin-top: 3%;
            margin-bottom: 4%;
        }

        form input[type='submit'] {
            background-color: #fff;
            margin-top: 4%;
            width: 25%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 0;
        }

        .select2-container {
            width: 100%;
        }

        .select2-container--default .select2-selection--multiple {
            min-height: 65px;
            padding: 10px;
            padding-bottom: 15px;
            display: flex;
            align-items: center;
            margin-top: -3.5%;
            margin-top: 5%;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid var(--highcharts-neutral-color-10, #e6e6e6);
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: var(--highcharts-neutral-color-60, #666);
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tbody tr:nth-child(even) {
            background: var(--highcharts-neutral-color-3, #f7f7f7);
        }

        .highcharts-description {
            margin: 0.3rem 10px;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Gráfico de tipos') }}
            </h2>
        </x-slot>

        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description"></p>
        </figure>

    </x-app-layout>
</body>

<script>

    (function(H) {
        H.seriesTypes.pie.prototype.animate = function(init) {
            const series = this,
                chart = series.chart,
                points = series.points,
                {
                    animation
                } = series.options,
                {
                    startAngleRad
                } = series;

                if(!points || points.length == 0){
                    return;
                }

            function fanAnimate(point, startAngleRad) {
                const graphic = point.graphic,
                    args = point.shapeArgs;

                if (graphic && args) {

                    graphic
                        .attr({
                            start: startAngleRad,
                            end: startAngleRad,
                            opacity: 1
                        })
                        .animate({
                            start: args.start,
                            end: args.end
                        }, {
                            duration: animation.duration / points.length
                        }, function() {
                            if (points[point.index + 1]) {
                                fanAnimate(points[point.index + 1], args.end);
                            }
                            if (point.index === series.points.length - 1) {
                                series.dataLabelsGroup.animate({
                                        opacity: 1
                                    },
                                    void 0,
                                    function() {
                                        points.forEach(point => {
                                            point.opacity = 1;
                                        });
                                        series.update({
                                            enableMouseTracking: true
                                        }, false);
                                        chart.update({
                                            plotOptions: {
                                                pie: {
                                                    innerSize: '40%',
                                                    borderRadius: 8
                                                }
                                            }
                                        });
                                    });
                            }
                        });
                }
            }

            if (init) {
                // Hide points on init
                points.forEach(point => {
                    point.opacity = 0;
                });
            } else {
                fanAnimate(points[0], startAngleRad);
            }
        };
    }(Highcharts));

    const chart = Highcharts.chart('container', {
        chart: {
            type: 'pie',
            backgroundColor: '#111827'
        },
        title: {
            text: 'Tipos de Livros'
        },
        tooltip: {
            headerFormat: '',
            pointFormat: '<span style="color:{point.color}">\u25cf</span> ' +
                '{point.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                borderWidth: 2,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage:.1f}%',
                    distance: 20
                }
            }
        },
        series: [{
            enableMouseTracking: false,
            animation: {
                duration: 2000
            },
            colorByPoint: true,
            data: []
        }]
    });
    fetch('/dados_tipo')
        .then(response => response.json())
        .then(json => {
            const dadosGrafico = json.map(item=>({
                name: item.tipo,
                y: item.total
            }));
            chart.series[0].setData(dadosGrafico);
            console.log(dadosGrafico);
        })
        .catch(error => console.error(error));
</script>

</html>