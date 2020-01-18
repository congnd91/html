$(function () {


    var chart1 = new Chart(document.getElementById('statistics-chart-1').getContext("2d"), {
        type: 'line',
        data: {
            labels: ['2016', '2017', '2018', '2019'],
            datasets: [{
                label: 'Company A',
                data: [14, 37, 30, 46],
                borderWidth: 1,
                backgroundColor: 'rgba(38, 180, 255, 0.1)',
                borderColor: '#0099fe',
                fill: false
      }, {
                label: 'Company B',
                data: [56, 45, 70, 56],
                borderWidth: 1,
                backgroundColor: 'rgba(136, 151, 170, 0.1)',
                borderColor: '#fe6a00'
      }],
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontColor: '#aaa',
                        autoSkipPadding: 50
                    }
        }],
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontColor: '#aaa',
                        maxTicksLimit: 5
                    }
        }]
            },

            responsive: false,
            maintainAspectRatio: false
        }
    });
    /*
    var chart_line2 = new Chart(document.getElementById('statistics-chart-line-2').getContext("2d"), {
        type: 'line',
        data: {
            labels: ['2016', '2017', '2018', '2019'],
            datasets: [{
                label: 'Company A',
                data: [20, 17, 30, 80],
                borderWidth: 1,
                backgroundColor: 'rgba(38, 180, 255, 0.1)',
                borderColor: '#0099fe',
                fill: false
      }, {
                label: 'Company B',
                data: [30, 40, 70, 60],
                borderWidth: 1,
                backgroundColor: 'rgba(136, 151, 170, 0.1)',
                borderColor: '#fe6a00'
      }],
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontColor: '#aaa',
                        autoSkipPadding: 50
                    }
        }],
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontColor: '#aaa',
                        maxTicksLimit: 5
                    }
        }]
            },

            responsive: false,
            maintainAspectRatio: false
        }
    });*/





    var chart3 = new Chart(document.getElementById('statistics-chart-3').getContext("2d"), {
        type: 'line',
        data: {
            datasets: [{
                data: [24, 92, 77, 90, 91, 78, 28, 49, 23, 81, 15, 97, 94, 16, 99, 61,
          38, 34, 48, 3, 5, 21, 27, 4, 33, 40, 46, 47, 48, 18
        ],
                borderWidth: 1,
                backgroundColor: 'rgba(0,0,0,0)',
                borderColor: '#009688',
                pointBorderColor: 'rgba(0,0,0,0)',
                pointRadius: 1,
                lineTension: 0
      }],
            labels: ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']
        },

        options: {
            scales: {
                xAxes: [{
                    display: false,
        }],
                yAxes: [{
                    display: false
        }]
            },
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            },
            responsive: false,
            maintainAspectRatio: false
        }
    });

    var chart8 = new Chart(document.getElementById('statistics-chart-8').getContext("2d"), {
        type: 'pie',
        data: {
            labels: ['18 - 24', '25 - 34', '34 - 45', '45+'],
            datasets: [{
                data: [1225, 654, 211, 402],
                backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)', 'rgba(206, 221, 54, 0.5)'],
                borderColor: ['#647c8a', '#2196f3', '#02bc77', 'rgba(206, 221, 54, 1)'],
                borderWidth: 1
      }]
        },

        options: {
            scales: {
                xAxes: [{
                    display: false,
        }],
                yAxes: [{
                    display: false
        }]
            },
            legend: {
                position: 'right',
                labels: {
                    boxWidth: 12
                }
            },
            responsive: false,
            maintainAspectRatio: false
        }
    });
    var chart7 = new Chart(document.getElementById('statistics-chart-7').getContext("2d"), {
        type: 'bar',
        data: {
            datasets: [{
                data: [20, 30, 30, 40, 50, 30, 40, 40, 20, 10, 10, 40, 20, 10, 50, 50,
          30, 30, 40, 30
        ],
                borderWidth: 0,
                backgroundColor: '#0099fe',
      }],
            labels: ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ]
        },

        options: {
            scales: {
                xAxes: [{
                    display: false,
        }],
                yAxes: [{
                    display: false
        }]
            },
            legend: {
                display: false
            },
            responsive: false,
            maintainAspectRatio: false
        }
    });


    chart4 = new Chart(document.getElementById('statistics-chart-4').getContext("2d"), {
        type: 'line',
        data: {
            datasets: [{
                data: [24, 92, 77, 90, 91, 78, 28, 49, 23, 81, 15, 97, 94, 16, 99, 61,
          38, 34, 48, 3, 5, 21, 27, 4, 33, 40, 46, 47, 48, 60
        ],
                borderWidth: 2,

                backgroundColor: 'rgba(136, 151, 170, .2)',
                borderColor: 'rgba(206, 221, 54, 1)',
                pointBorderColor: 'rgba(0,0,0,0)',
                pointRadius: 1,
                lineTension: 0
      }],
            labels: ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']
        },

        options: {
            scales: {
                xAxes: [{
                    display: false,
        }],
                yAxes: [{
                    display: false
        }]
            },
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            },
            responsive: false,
            maintainAspectRatio: false
        }
    });
    /*var
    /*
       var chart5 = new Chart(document.getElementById('statistics-chart-5').getContext("2d"), {
           type: 'line',
           data: {
               datasets: [{
                   data: [24, 92, 77, 90, 91, 78, 28, 49, 23, 81, 15, 97, 94, 16, 99, 61,
             38, 34, 48, 3, 5, 21, 27, 4, 33, 40, 46, 47, 48, 60
           ],
                   borderWidth: 1,
                   backgroundColor: 'rgba(136, 151, 170, .2)',
                   borderColor: 'rgba(136, 151, 170, 1)',
                   pointBorderColor: 'rgba(0,0,0,0)',
                   pointRadius: 1,
                   lineTension: 0
         }],
               labels: ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']
           },

           options: {
               scales: {
                   xAxes: [{
                       display: false,
           }],
                   yAxes: [{
                       display: false
           }]
               },
               legend: {
                   display: false
               },
               tooltips: {
                   enabled: false
               },
               responsive: false,
               maintainAspectRatio: false
           }
       });

       var chart6 = new Chart(document.getElementById('statistics-chart-6').getContext("2d"), {
           type: 'pie',
           data: {
               labels: ['Desktops', 'Smartphones', 'Tablets'],
               datasets: [{
                   data: [1225, 654, 211],
                   backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)'],
                   borderColor: ['#647c8a', '#2196f3', '#02bc77'],
                   borderWidth: 1
         }]
           },

           options: {
               scales: {
                   xAxes: [{
                       display: false,
           }],
                   yAxes: [{
                       display: false
           }]
               },
               legend: {
                   position: 'right',
                   labels: {
                       boxWidth: 12
                   }
               },
               responsive: false,
               maintainAspectRatio: false
           }
       });*/



    if ($('html').attr('dir') === 'rtl') {
        $('#type-gadgets-dropdown-menu, #new-users-dropdown-menu, #age-users-dropdown-menu').removeClass('dropdown-menu-right');
    }

    // Resizing charts

    function resizeCharts() {
        chart1.resize();

        chart3.resize();
        chart8.resize();
        chart7.resize();

        chart4.resize();
        /*  
                  chart5.resize();
                  chart6.resize();*/
    }

    // Initial resize
    resizeCharts();

    // For performance reasons resize charts on delayed resize event
    window.layoutHelpers.on('resize.dashboard-5', resizeCharts);
});
