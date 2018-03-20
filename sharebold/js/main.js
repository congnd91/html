(function ($) {

    $(document).on('ready', function () {
        if ($("#date-range").length) {
            $('#date-range').daterangepicker({
                "autoApply": true,
                "dateLimit": {
                    "days": 7
                },
                "ranges": {
                    "Today": [
            "2018-03-15T04:32:20.004Z",
            "2018-03-15T04:32:20.004Z"
        ],
                    "Yesterday": [
            "2018-03-14T04:32:20.004Z",
            "2018-03-14T04:32:20.004Z"
        ],
                    "Last 7 Days": [
            "2018-03-09T04:32:20.004Z",
            "2018-03-15T04:32:20.004Z"
        ],
                    "Last 30 Days": [
            "2018-02-14T04:32:20.004Z",
            "2018-03-15T04:32:20.004Z"
        ],
                    "This Month": [
            "2018-02-28T17:00:00.000Z",
            "2018-03-31T16:59:59.999Z"
        ],
                    "Last Month": [
            "2018-01-31T17:00:00.000Z",
            "2018-02-28T16:59:59.999Z"
        ]
                },
                "startDate": "03/09/2018",
                "endDate": "03/15/2018",
                "opens": "left"
            }, function (start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            });
        }

        var grid = $('.grid').isotope({
            itemSelector: '.grid-item',
        });




        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });


    });
})(jQuery);
