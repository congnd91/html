(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.page-preload').delay(400).fadeOut(200, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-side");
            });
            $('.close-menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-side");
            });
        }
        db.menuDashboard = function () {
            $('.ds-menu .has-child .arrow').on('click', function (e) {
                var menu = $(this).parent().find("ul");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(menu).slideDown();
                    $(this).parent().addClass("active");
                }
            });
        }

        db.chart = function () {
            setTimeout(function () {
                if ($('#statistics-chart').length) {
                    var chart1 = new Chart(document.getElementById('statistics-chart').getContext("2d"), {
                        type: 'bar',
                        data: {
                            labels: ['20 Sep', '21 Sep', '22 Sep', '23 Sep', '24 Sep', '25 Sep'],
                            datasets: [{
                                label: 'Views',
                                data: [60, 100, 70, 69, 80, 100, 90],
                                borderWidth: 0,
                                backgroundColor: '#35E184',
                                borderColor: '#35E184'
      }, {
                                label: 'Clicks',
                                data: [40, 70, 43, 50, 70, 80, 70],
                                borderWidth: 0,
                                backgroundColor: '#374BA8',
                                borderColor: '#374BA8'
      }],
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    barPercentage: 0.7,
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        fontColor: '#aaa'
                                    }
        }],
                                yAxes: [{
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        fontColor: '#aaa',
                                        stepSize: 20
                                    }
        }]
                            },
                            responsive: false,
                            maintainAspectRatio: false
                        }
                    });
                }
            }, 500);
        }
        db.sortable = function () {
            if ($('#sortable').length) {
                new Sortable(document.getElementById('sortable'), {
                    handle: '.handle',
                    onEnd: function (evt) {

                        alert("New Index:" + evt.newIndex + "      Old Index: " + evt.oldIndex)
                    },
                });
            }
        }

        db.switchTheme = function () {
            $('.theme-item').on('click', function (e) {

                $('.theme-item').removeClass("active");
                $(this).addClass("active");
            });

        }

        db.preLoad();
        db.menuDashboard();
        db.menuResponsive();
        db.chart();
        db.sortable();
        db.switchTheme();
        $(".icon-lib").niceScroll({
            cursorcolor: "#666",
            cursorwidth: "7px"
        });
        $('.btn-save').click(function () {
            alert("Call Ajax here.")
            return false;
        });
        $('.db-toggle input').click(function () {
            alert("Call Ajax here.")
        });



    });
})(jQuery);
