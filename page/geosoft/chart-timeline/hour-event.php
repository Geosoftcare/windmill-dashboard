<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geosoft - Schedule timeline</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .chartMenu {
            width: 100vw;
            height: 40px;
            color: rgba(54, 162, 235, 1);
        }

        .chartMenu p {
            padding: 10px;
            font-size: 20px;
        }

        .chartCard {
            width: 100vw;
            height: calc(100vh - 40px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 90%;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(54, 162, 235, 1);
            background: white;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <br><br>
    <div class="chartCard">
        <div class="chartBox">
            <canvas id="myChart"></canvas>
            <input type="month" onchange="chartFilter(this)" />
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

    <script>
        const colours = ['rgba(255, 26, 104, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'];


        // setup 
        const data = {
            // labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Shift Schedule',
                data: [{
                        x: new Date('2024-02-23T00:00:00'),
                        y: 3
                    },
                    {
                        x: new Date('2024-02-23T00:00:00'),
                        y: 6
                    },
                    {
                        x: new Date('2024-02-23T00:00:00'),
                        y: 3
                    },
                    {
                        x: new Date('2024-02-28T00:00:00'),
                        y: 6
                    },
                    {
                        x: new Date('2024-02-23T00:00:00'),
                        y: 9
                    },
                ],

                backgroundColor: (ctx) => {
                    return colours[ctx.raw.status]
                },

                //borderColor: (ctx) => {
                // console.log(ctx.raw.status);
                // return colours[ctx.raw.status]
                //},
                borderWidth: 1,
                borderSkipped: false,
                borderRadius: 10,
                barPercentage: 0.5
            }]
        };

        // todayLine plugin block

        const todayLine = {
            id: 'todayLine',
            afterDatasetsDraw(chart, args, pluginOptions) {
                const {
                    ctx,
                    data,
                    chartArea: {
                        top,
                        bottom,
                        left,
                        right
                    },
                    scales: {
                        x,
                        y
                    }
                } = chart;

                ctx.save();

                ctx.beginPath();
                ctx.lineWidth = 3;
                ctx.strokeStyle = 'rgba(102, 102, 102,.4)';
                ctx.setLineDash([6, 6]);
                // Here you can change yours to time instead of date

                ctx.moveTo(x.getPixelForValue(new Date()), top);
                ctx.lineTo(x.getPixelForValue(new Date()), bottom);
                ctx.stroke();
                ctx.restore();

                ctx.setLineDash([]);


                ctx.beginPath();
                ctx.lineWidth = 1;
                ctx.strokeStyle = 'rgba(102, 102, 102, 1)';
                ctx.fillStyle = 'rgba(102, 102, 102, 1)';
                ctx.moveTo(x.getPixelForValue(new Date()), top + 3);
                ctx.lineTo(x.getPixelForValue(new Date) - 6, top - 6);
                ctx.lineTo(x.getPixelForValue(new Date) + 6, -6);
                ctx.closePath();
                ctx.stroke();
                ctx.fill();
                ctx.restore();

                ctx.font = 'bold 12px sans-serif';
                ctx.fillStyle = 'rgba(102, 102, 102, 1)';
                ctx.textAlign = 'center';
                ctx.fillText('Today', x.getPixelForValue(new Date()), bottom + 15);
                ctx.restore();

            }
        }

        // Status plugin block

        const status = {
            id: 'status',
            afterDatasetsDraw(chart, args, pluginOptions) {
                const {
                    ctx,
                    data,
                    options,
                    chartArea: {
                        top,
                        bottom,
                        left,
                        right
                    },
                    scales: {
                        x,
                        y
                    }
                } = chart;

                const icons = ['\uf00d', '\uf110', '\uf00c'];
                const angle = Math.PI / 180;

                ctx.save();
                ctx.font = 'bolder 12px FontAwesome';
                ctx.textBaseLine = 'middle';
                ctx.textAlign = 'center';
                data.datasets[0].data.forEach((datapoint, index) => {
                    ctx.beginPath();
                    ctx.fillStyle = colours[datapoint.status];
                    ctx.arc(right + 50, y.getPixelForValue(index), 12, 0, angle * 360, false);
                    ctx.closePath();
                    ctx.fill();


                    ctx.fillStyle = 'white';
                    ctx.fillText(icons[datapoint.status], right + 50, y.getPixelForValue(index));
                });

                ctx.font = 'bolder 12px sans-serif';
                ctx.fillStyle = 'black';
                ctx.fillText('Status', right + 50, top - 15);

                ctx.restore();
            }
        }


        // assignedTasks plugin block

        const assignedTasks = {
            id: 'assignedTasks',
            afterDatasetsDraw(chart, args, pluginOptions) {
                const {
                    ctx,
                    data,
                    chartArea: {
                        top,
                        bottom,
                        left,
                        right
                    },
                    scales: {
                        x,
                        y
                    }
                } = chart;
                ctx.save();
                ctx.font = 'bolder 12px sans-serif';
                ctx.fillStyle = 'black';
                ctx.textBaseLine = 'middle';
                ctx.textAlign = 'left';
                data.datasets[0].data.forEach((datapoint, index) => {
                    ctx.fillText(datapoint.name, 10, y.getPixelForValue(index));
                })
                ctx.fillText('Names', 10, top - 15);
                ctx.restore();
            }
        }

        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                layout: {
                    padding: {
                        left: 100,
                        right: 100,
                        bottom: 20
                    }
                },
                indexAxis: 'y',
                scales: {
                    x: {
                        position: 'top',
                        type: 'time',
                        time: {
                            unit: 'day'
                        },
                        min: '2024-02-01',
                        max: '2024-02-31'
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },


                    tooltip: {
                        callbacks: {
                            title: (ctx) => {

                                const startDate = new Date(ctx[0].raw.x[0])
                                const endDate = new Date(ctx[0].raw.x[1])
                                const formattedStartDate = startDate.toLocaleString([], {
                                    year: 'numeric',
                                    month: 'short',
                                    day: 'numeric',
                                });
                                const formattedEndDate = endDate.toLocaleString([], {
                                    year: 'numeric',
                                    month: 'short',
                                    day: 'numeric',
                                });
                                return [ctx[0].raw.name, `Task Deadline: ${formattedStartDate} - ${formattedEndDate}`];
                            }
                        }
                    }

                }
            },
            plugins: [todayLine, assignedTasks, status]
        };

        // render init block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        // Instantly assign Chart.js version
        const chartVersion = document.getElementById('chartVersion');
        chartVersion.innerText = Chart.version;



        function chartFilter(date) {
            console.log(date.value)

        }
    </script>

</body>

</html>