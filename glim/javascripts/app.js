// Configures the trends that are currently selected
var selectedTrends = ['Products', 'Companies', 'Everything'];

function addChart($elemt, value) {
    var content = "";
    var datasets = [];
    var key = "chart-" + Math.random().toString(36).substring(7);

    content += '<div class="result-data col-lg-12 col-md-12 col-sm-12 col-xs-12 full-width-480 module positionRelative">';
    if (typeof value.tag != "undefined" && value.tag == "early") {
        content += '<div class="earlybadge"><img src="./images/early-badge.png" width="110" height="auto"></div>';
    }
    content += '<div class="card chartcontainer no-select">';
    content += '<h3 class="text-left"><a target="_blank" href="https://www.google.com/search?q=' + value.name + '">' + value.name + '</a></h3>';
    content += '<h4>' + numeral(value.search_volume).format('0,0') + ' searches / mo</h4>';
    content += '<canvas id="' + key + '" width="100%" height="100%"></canvas>';
    content += '<p class="p-tooltip text-center" id="' + key + '-data"></p>';
    content += '</div>';
    content += '</div>';

    $elemt.parent().replaceWith(content);
    var data = Object.assign({}, value);
    setChart({data_set: data.data, id: key});


    $(".module").each(function (i, el) {
        var el = $(el);
        if (el.hasClass("module")) {
            $(".module").splice(i, 1);
            el.addClass("come-in").removeClass('module');
        }
    });
}

function setChart(params) {
  console.log('setChart');
    var labels = ((params.data_set).length > 0) ? (params.data_set).map(function (e, i) {
        return (moment('2018-08-31').add(i, 'week').subtract(5, 'years'))
    }) : [];

    var customTooltips = function (tooltip) {
        if (typeof tooltip.dataPoints != "undefined" && tooltip.dataPoints.length > 0) {
            tooltip.dataPoints.map(function (dataPoint) {
                var content = (labels[dataPoint.index]).format('MMMM, YYYY');
                $("#" + params.id + "-data").html(content);
            });
        } else {
            $("#" + params.id + "-data").html("");
        }
    };
    var options = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                data: params.data_set,
                borderColor: "#35a0e8",
                backgroundColor: "#ffff",
                borderWidth: 1,
                pointBorderColor: '#35a0e8',
                pointBackgroundColor: '#35a0e8',
                pointHoverRadius: 3,
                pointHitRadius: 3
            }]
        },
        options: {
            maintainAspectRatio: false,
            elements: {
                point: {
                    radius: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'day',
                        displayFormats: {
                            month: 'dd'
                        },
                        max: moment(labels[0]).format('dd'),
                        min: moment(labels[labels.length - 1]).format('dd')
                    },
                    ticks: {
                        display: false,
                        tickMarkLength: 0,
                        mirror: true

                    },
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        drawTicks: false
                    },
                }],
                yAxes: [{
                    ticks: {
                        display: false,
                        tickMarkLength: 0,
                        mirror: true
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        drawTicks: false
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
                enabled: false,
                mode: 'index',
                intersect: false,
                custom: customTooltips
            },
            hover: {
                intersect: false
            },
            layout: {
                padding: {
                    top: 5,
                    left: 0,
                    right: 0,
                    bottom: -20
                }
            },
            animation: false,
            defaultFontFamily: Chart.defaults.global.defaultFontFamily = "HelveticaNeueThin",
        }
    };

    var ctx = document.getElementById(params.id).getContext('2d');
    ctx.height = 100;
    var dataLineChart = new Chart(ctx, options);
}

$(document).ready(function () {
  $('code').each(function(index) {
    try {
      var jsonText = $(this).text();
      var jsonData = JSON.parse(jsonText);
      addChart($(this), jsonData);
    } catch(err) {
      console.log(err);
    }
  });
  $(".js-menu-open").on("click",function(){$(".mobile-menu").addClass("show")}),$(".js-menu-close, .mobile-menu a").on("click",function(){$(".mobile-menu").removeClass("show")})
});

