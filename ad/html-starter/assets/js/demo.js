// Auto update layout
(function () {
    window.layoutHelpers.setAutoUpdate(true);
})();

// Collapse menu
(function () {
    if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
        return;
    }

    try {
        window.layoutHelpers.setCollapsed(
            localStorage.getItem('layoutCollapsed') === 'true',
            false
        );
    } catch (e) {}
})();

$(function () {
    // Initialize sidenav
    $('#layout-sidenav').each(function () {
        new SideNav(this, {
            orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
        });
    });

    // Initialize sidenav togglers
    $('body').on('click', '.layout-sidenav-toggle', function (e) {
        e.preventDefault();
        window.layoutHelpers.toggleCollapsed();
        if (!window.layoutHelpers.isSmallScreen()) {
            try {
                localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
            } catch (e) {}
        }
    });

    if ($('html').attr('dir') === 'rtl') {
        $('#layout-navbar .dropdown-menu').toggleClass('dropdown-menu-right');
    }

    $('.db-show-child').click(function () {

        var child = $(this).parents(".db-parent").next();
        if ($(child).is(":visible")) {
            $(child).hide();
        } else {
            $(child).show();

        }
    });
    $('.db-chat-close').click(function () {
        $('.db-chat').toggleClass("db-hide-chat");
    });


    setTimeout(function () {

        if ($('#chart-bars').length)

        {
            var barsChart = new Chart(document.getElementById('chart-bars').getContext("2d"), {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Now', 'Dec'],
                    datasets: [{
                        label: '2018',
                        data: [53, 99, 14, 10, 43, 27, 17, 27, 57, 50, 27, 27],
                        borderWidth: 1,
                        backgroundColor: 'rgba(205, 220, 57, 0.3)',
                        borderColor: '#CDDC39'
      }, {
                        label: '2019',
                        data: [55, 74, 20, 90, 67, 97, 17, 27, 57, ],
                        borderWidth: 1,
                        backgroundColor: 'rgba(103, 58, 183, 0.3)',
                        borderColor: '#673AB7'
      }]
                },

                // Demo
                options: {
                    responsive: false,
                    maintainAspectRatio: false
                }
            });
        }
    }, 1000);




});
