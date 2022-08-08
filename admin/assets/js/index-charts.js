'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

window.chartColors = {
    orange: '#ffc107',
    gray: '#a9b5c9',
    text: '#252930',
    border: '#e7e9ed'
};


//Chart.js Line Chart Example 

var lineChartConfig = {
    type: 'line',

    data: {
        labels: reservationLabels,

        datasets: [{
            label: 'Semaine en cours',
            fill: false,
            backgroundColor: window.chartColors.orange,
            borderColor: window.chartColors.orange,
            data: reservationData,
        }]
    },
    options: {
        responsive: true,
        aspectRatio: 1.5,

        legend: {
            display: true,
            position: 'bottom',
            align: 'end',
        },

        title: {
            display: true,
            text: 'charte rerésente l\'évoulution du nombre des réservations',

        },
        tooltips: {
            mode: 'index',
            intersect: false,
            titleMarginBottom: 10,
            bodySpacing: 10,
            xPadding: 16,
            yPadding: 16,
            borderColor: window.chartColors.border,
            borderWidth: 1,
            backgroundColor: '#fff',
            bodyFontColor: window.chartColors.text,
            titleFontColor: window.chartColors.text,

            callbacks: {
                //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
                label: function(tooltipItem, data) {
                    return tooltipItem.value + ' réservation';
                }
            },

        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    drawBorder: false,
                    color: window.chartColors.border,
                },
                scaleLabel: {
                    display: false,

                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    drawBorder: false,
                    color: window.chartColors.border,
                },
                scaleLabel: {
                    display: false,
                },
                ticks: {
                    beginAtZero: true,
                    stepSize: 1
                },
            }]
        }
    }
};



// Chart.js Bar Chart Example 

var barChartConfig = {
    type: 'bar',

    data: {
        labels: clientLabels,
        datasets: [{
            label: 'Clients',
            backgroundColor: window.chartColors.orange,
            borderColor: window.chartColors.orange,
            borderWidth: 1,
            maxBarThickness: 16,

            data: clientData
        }]
    },
    options: {
        responsive: true,
        aspectRatio: 1.5,
        legend: {
            position: 'bottom',
            align: 'end',
        },
        title: {
            display: true,
            text: 'Nombre de client par jour'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
            titleMarginBottom: 10,
            bodySpacing: 10,
            xPadding: 16,
            yPadding: 16,
            borderColor: window.chartColors.border,
            borderWidth: 1,
            backgroundColor: '#fff',
            bodyFontColor: window.chartColors.text,
            titleFontColor: window.chartColors.text,

        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    drawBorder: false,
                    color: window.chartColors.border,
                },

            }],
            yAxes: [{
                display: true,
                gridLines: {
                    drawBorder: false,
                    color: window.chartColors.borders,
                },
                ticks: {
                    beginAtZero: true,
                    stepSize: 1
                },


            }]
        }

    }
}







// Generate charts on load
window.addEventListener('load', function() {

    var lineChart = document.getElementById('canvas-linechart').getContext('2d');
    window.myLine = new Chart(lineChart, lineChartConfig);

    var barChart = document.getElementById('canvas-barchart').getContext('2d');
    window.myBar = new Chart(barChart, barChartConfig);


});