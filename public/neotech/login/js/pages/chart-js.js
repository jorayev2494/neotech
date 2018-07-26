$(document).ready(function()
{
    var $chartExampleLine = document.getElementById("chart-example-line");
    var $chartExampleBar = document.getElementById("chart-example-bar");
    var $chartExamplePolar = document.getElementById("chart-example-polar");
    var $chartExampleRadar = document.getElementById("chart-example-radar");
    var $chartExamplePie = document.getElementById("chart-example-pie");
    var $chartExampleDoughnut = document.getElementById("chart-example-doughnut");
    Chart.defaults.global.legend.display = true;

    var dataLine = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
        {
            label: "My First dataset",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(60,181,220,0.4)",
            borderColor: "rgba(60,181,220,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(60,181,220,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(60,181,220,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [65, 59, 80, 81, 56, 55, 40],
        }
        ]
    };
    var dataBar = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [
        {
            label: "My First dataset",
            backgroundColor: "rgba(60,181,220,0.2)",
            borderColor: "rgba(60,181,220,1)",
            borderWidth: 1,
            hoverBackgroundColor: "rgba(60,181,220,0.4)",
            hoverBorderColor: "rgba(60,181,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40],
        }
        ]
    };
    var dataRadar = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
        {
            label: "My First dataset",
            backgroundColor: "rgba(179,181,198,0.2)",
            borderColor: "rgba(179,181,198,1)",
            pointBackgroundColor: "rgba(179,181,198,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(179,181,198,1)",
            data: [65, 59, 90, 81, 56, 55, 40],
            scaleShowLabels : false
        },
        {
            label: "My Second dataset",
            backgroundColor: "rgba(60,181,220,0.2)",
            borderColor: "rgba(60,181,220,1)",
            pointBackgroundColor: "rgba(60,181,220,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(60,181,220,1)",
            data: [28, 48, 40, 19, 96, 27, 100],
            scaleShowLabels : false
        }
        ]
    };
    var dataPolar = {
        datasets: [{
            data: [
            11,
            16,
            7,
            3,
            14
            ],
            backgroundColor: [
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB"
            ],
            borderColor: [
            "rgba(0,0,0,0.2)",
            "rgba(0,0,0,0.2)",
            "rgba(0,0,0,0.2)",
            "rgba(0,0,0,0.2)",
            "rgba(0,0,0,0.2)"
            ],
            label: 'My dataset' // for legend
        }],
        labels: [
        "Red",
        "Green",
        "Yellow",
        "Grey",
        "Blue"
        ]
    };
    var dataPieNut = {
        labels: [
        "Red",
        "Blue",
        "Yellow"
        ],
        datasets: [
        {
            data: [10, 500, 357],
            backgroundColor: [
            "#FF6384",
            "#36A2EB",
            "#FFCE56"
            ],
            hoverBackgroundColor: [
            "#FF6384",
            "#36A2EB",
            "#FFCE56"
            ]
        }]
    };

    var myLineChart = new Chart($chartExampleLine, {
        type: 'line',
        data: dataLine
    });
    var myBarChart = new Chart($chartExampleBar, {
        type: 'bar',
        data: dataBar
    });
    var myRadarChart = new Chart($chartExampleRadar, {
        type: 'radar',
        data: dataRadar,
        options: {
            scale: {
                ticks: {
                    display: false
                }
            }
        }
    });
    var myPolarChart = new Chart($chartExamplePolar, {
        type: 'polarArea',
        data: dataPolar,
        options: {
            scale: {
                ticks: {
                    display: false
                }
            }
        }
    });
    var myPieChart = new Chart($chartExamplePie, {
        type: 'pie',
        data: dataPieNut
    });
    var myDoughnutChart = new Chart($chartExampleDoughnut, {
        type: 'doughnut',
        data: dataPieNut
    });
});