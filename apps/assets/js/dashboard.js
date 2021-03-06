$(document).ready(function () {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                    label: 'Income(\'000)',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    var ctx = document.getElementById('myChart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Wash', 'Dry Clean', 'Press'],
            datasets: [{
                    label: 'order (%)',
                    data: [12, 4, 6],
                    backgroundColor: [
                        '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
                    ],

                    hoverOffset: 4
                }]
        },

        options: {
            maintainAspectRatio: 1,
            tooltips: {

                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {

                            let datasets = ctx.chart.data.datasets;

                            if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                                let sum = 0;
                                datasets.map(dataset => {
                                    sum += dataset.data[ctx.dataIndex];
                                });
                                let percentage = Math.round((value / sum) * 100) + '%';
                                return percentage;
                            } else {
                                return percentage;
                            }
                        },
                        color: '#fff',
                    }
                }
            },
            legend: {
                display: true
            },
            cutoutPercentage: 30,

        }


    });

});


