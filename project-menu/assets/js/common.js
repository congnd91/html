var crossed = false;
$(window).scroll(function () {
    var pageHeight = $(this).height() + $(this)[0].pageYOffset
    var buttomBarDiaper = ($(this).width() > 767) ? '-100px' : '-95px'

    if (($(document).height() - $('footer').height()) < pageHeight) {
        if (!crossed) {
            crossed = true;

            $('#buttom-bar').animate({
                bottom: buttomBarDiaper
            }, 200)
        }
        if ($('#buttom-bar').hasClass('show_buttonbar')) {
            $('#buttom-bar').removeClass('show_buttonbar')
        }
    } else {
        crossed = false;
        if (!$('#buttom-bar').hasClass('show_buttonbar')) {
            $('#buttom-bar').addClass('show_buttonbar')
        }
    }
})


// Watch click for tab section
$(window).click(function (event) {
    if ($('.question-items').length) {

        var tabs = $('.question-items')
        var tabChildrens = tabs[0].children
        var contentViewChildrens = $('.content-view')[0].children
        // vars for dropdown
        var dropdown = $('.dropdown')[0]
        var dropdownButton = dropdown.children[0]
        var dropdownMenu = dropdown.children[1]
        var dropdownValue = $('#dropdown-value')[0]

        if (tabs[0].contains(event.target)) {
            if (event.target.classList.contains('question-items')) return

            for (var i = 0; tabChildrens.length > i; i++) {
                if (tabChildrens[i].classList.contains('active')) {
                    tabChildrens[i].classList.remove('active')
                    contentViewChildrens[i].classList.remove('active-content')
                }

                if (tabChildrens[i].contains(event.target)) {
                    tabChildrens[i].classList.add('active')
                    contentViewChildrens[i].classList.add('active-content')

                    // for dropdown
                    dropdownButton.title = dropdownMenu.children[i].innerText
                    dropdownValue.innerText = dropdownMenu.children[i].innerText
                }
            }
        }
    }
})

// Watch click for bootstrap dropdown
$(window).click(function (event) {
    if ($('.dropdown').length) {
        var dropdown = $('.dropdown')[0]
        var dropdownButton = dropdown.children[0]
        var dropdownMenu = dropdown.children[1]
        var dropdownValue = $('#dropdown-value')[0]
        var contentViewChildrens = $('.content-view')[0].children
        //vars for tabs
        var tabs = $('.question-items')
        var tabChildrens = tabs[0].children

        if (dropdown.contains(event.target)) {
            if (dropdownMenu.style.display == 'block') {
                dropdownMenu.style.display = 'none'
            } else {
                dropdownMenu.style.display = 'block'
            }
        }

        if (dropdownMenu.contains(event.target)) {
            if (event.target.getAttribute('role') != 'combobox') {
                dropdownButton.title = event.target.innerText
                dropdownValue.innerText = event.target.innerText

                for (var i = 0; dropdownMenu.children.length > i; i++) {
                    if (contentViewChildrens[i].classList.contains('active-content')) {
                        contentViewChildrens[i].classList.remove('active-content')

                        // for tabs
                        tabChildrens[i].classList.remove('active')
                    }

                    if (dropdownMenu.children[i].contains(event.target)) {
                        contentViewChildrens[i].classList.add('active-content')

                        // for tabs
                        tabChildrens[i].classList.add('active')
                    }
                }
            }
        }
    }
})
