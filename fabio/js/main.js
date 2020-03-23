var currentPlayerSize = "small-video";
var tempPlayerSize = false; // only truw when video is set to "wide" when
var notesEnabled = false;
var videoPath = videoUrlName;
var videoTime = '';
var subscibedParam = '';
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
if (timeurl != '0') {
    videoTime = timeurl;
}
if (typeof _gaq == 'undefined') {
    var _gaq = [];
}
$(window).load(function() {
    // if the player is in wide mode when opening the scene
    //we scroll the page to the top of the player
    if ($(".player-layout-cont.wide-video")[0]) {
        $('html, body').animate({
            scrollTop: ($('#player-main-cont').first().offset().top)
        }, 500);
    }

})

$(document).ready(function() {
    playerAutoWidwHandler();
    $(window).resize(function() {
        playerAutoWidwHandler();
        playerHeightHandler();
    });
    $("#edit-course-btn").click(function() {

        window.location = "/teach/edit/" + idContent;
    });
    $("#layout-btn").click(function() {

        if ($(".player-layout-cont").hasClass("small-video")) {
            setPlayerWide();
        } else {
            setPlayerSmall();
        }

        playerHeightHandler();
    });

    $("#copy").click(function() {

        getVideoTime();
        copyToClipboard();
    });
    $(".period-num").click(function() {
        var collapseIcon = $('.period-collapse-icon', this);
        if (collapseIcon.hasClass("fa-caret-up")) {
            collapseIcon.removeClass("fa-caret-up");
            collapseIcon.addClass("fa-caret-down");
        } else {
            collapseIcon.removeClass("fa-caret-down");
            collapseIcon.addClass("fa-caret-up");
        }
    });
    $(".content-section-collapse").click(function() {
        var collapseIcon = $('.content-section-collapse-icon', this);
        if (collapseIcon.hasClass("fa-caret-up")) {
            collapseIcon.removeClass("fa-caret-up");
            collapseIcon.addClass("fa-caret-down");
        } else {
            collapseIcon.removeClass("fa-caret-down");
            collapseIcon.addClass("fa-caret-up");
        }
    });
    var paramSubscription = getParameterByName('subscribed');

    if (paramSubscription != '' && paramSubscription != null) {
        removeParam('subscribed');
        successNotification('Content added to your library');

    }

    playerHeightHandler();
    if (isMobile.any() && beta == 1) {
        $('#player-mobile-alert').attr("style", "");
        if (pathIframeMobile != "") {
            $('#iframeVideo').attr("src", pathIframeMobile);
        }

    }

    $('#facebook-share i').sharrre({
        share: {
            facebook: true
        },
        url: contentUrlName,
        enableHover: false,
        enableTracking: true,
        click: function(api, options) {
            api.simulateClick();
            api.openPopup('facebook');
        }
    });

    $('#twitter-share').sharrre({
        share: {
            twitter: true
        },
        url: contentUrlName,
        enableHover: false,
        enableTracking: true,
        buttons: {
            twitter: {
                via: 'Cgcircuit'
            }
        },
        click: function(api, options) {
            api.simulateClick();
            api.openPopup('twitter');
        }
    });
    $('#linkedin-share i').sharrre({
        share: {
            linkedin: true
        },
        url: contentUrlName,
        enableHover: false,
        enableTracking: true,
        buttons: {
            linkedin: {
                via: 'CGCircuit'
            }
        },
        click: function(api, options) {
            api.simulateClick();
            api.openPopup('linkedin');
        }
    });
    setAuthorSmall();
    // add review form
    $('#add-review-form').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            url: $this.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: $this.serialize(),
            success: function(resp) {
                // console.log(userName);
                // console.log(userProfilePic);
                var newReview = [{
                    name: userName,
                    description: $this.find('.current-review-text').val(),
                    rate: $this.find('#user-rating').val(),
                    profileImage: userProfilePic
                }];
                var template = _.template($('#review-temp').html());
                $('#reviews-list').prepend(template({
                    reviews: newReview
                }));
                $this[0].reset();
                $('#star-rating').rateit('reset');
                $('html,body').animate({
                    scrollTop: $('.review-item').first().offset().top
                }, 'slow');
            },
            error: function(err) {
                alert(err.responseJSON.message);
            }
        });
    });

    loadPlaylist();

    $('#loader').fadeOut();
    if (contentType == 'html') {
        setLayoutForTextTutorial();
        $('#disqus-tab').addClass("active");
        startDisqus();

    }
    if (contentType == 'video') {
        setPlayerWide();

    }
    playerHeightHandler();

    var $codes = $('#htmlContent').find('code');
    $.each($codes, function(index, element) {
        Prism.highlightElement(element);
    });

    initVolumeDiscountView();
    if (downloadLink == 1) {
        $("#download-tab-btn").trigger("click");
    }
    if (discussionLink == 1) {
        $("#disqus-tab-btn").trigger("click");
    }
    if (reviewLink == 1) {
        $("#reviews-tab-btn").trigger("click");
    }
    if (authorLink == 1) {
        $("#author-tab-btn").trigger("click");
    }
    if (imagesLink == 1) {
        $("#images-tab-btn").trigger("click");
    }
    if (exampleFileLink == 1) {
        $("#example-files-tab-btn").trigger("click");
    }
    if (overviewLink == 1) {
        $("#overview-tab-btn").trigger("click");
    }
    if (beta == 1) {
        $('#iframeVideo').attr("src", pathIframe);
        $('.main-play-video-icon').hide();

    }
    if (subscribed == 0) {
        if (isMobile.any()) {

            if (pathIframeMobile != "") {
                $('#iframeVideo').attr("src", pathIframeMobile);
                $('#play-video').remove();
            }
            $('.video-title').each(function(i, obj) {
                $(this).removeClass('video-title');
                $(this).addClass('video-disabled');
            });
            $('.playlist-item').each(function(i, obj) {
                $(this).removeClass('playlist-item');

            });

        }
    }

    if (isMobile.any()) {
        if (pathIframeMobile != "") {
            $('#iframeVideo').attr("src", pathIframeMobile);
            $('#play-video').remove();
        }


    }


    if (userId == 0 && sellAmount == 0) {
        pathIframe == ''
        if (pathIframePromo != "") {

        } else {
            $('#play-video').remove();
        }
    }


    if ($('#content-list-main-cont').length) {

    } else {
        setPlayerWide();
        playerHeightHandler();
    }




});

function initVolumeDiscountView() {
    initCubeAnimation();
    var licenseCount = $('#license-count');

    $('#license-count-minus').click(function() {
        var count = Number.parseInt(licenseCount.text());
        if (count !== num_min_licenses) {
            licenseCount.text(count - 1);
            getTotalVolumeDiscountPrice();
        }

    });

    $('#license-count-plus').click(function() {
        var count = Number.parseInt(licenseCount.text());
        licenseCount.text(count + 1);
        getTotalVolumeDiscountPrice()
    });

    $('#btn-buy-multi-license').click(function() {
        var quantity = Number.parseInt(licenseCount.text());
        if (quantity < num_min_licenses) {
            errorNotification('The number of licenses must be bigger than 4');
            return;
        }
        $('#confirm-buy-multi-license').modal('show');
    });

    $('#add-to-cart-multi-licenses').click(function() {
        var quantity = Number.parseInt(licenseCount.text());
        addToCartMultiLicenses(idContent, xiduser, quantity);
    });

    getTotalVolumeDiscountPrice();
    var smallPricing = $('#small-pricing-cont').clone();
    $('#small-pricing-cont-flip').html(smallPricing);

    $('#buy_more_licenses').click(function() {
        $('#volume-discount-cont').removeClass('hidden');
        $('#flip-down i').removeClass('fa-arrow-left');
        $('#flip-down i').addClass('fa-close');

    });
}

function initCubeAnimation() {

    $('#flip-up').click(function() {
        $('#small-pricing-cont').addClass('hidden');
        $('.cube').removeClass('hidden');
        setTimeout(function() {
            $('.cube').addClass('flip');
            setTimeout(function() {
                $('.cube').addClass('hidden');
                $('#volume-discount-cont').removeClass('hidden');
            }, 330)
        }, 100);

    });
    $('#flip-down').click(function() {
        $('#volume-discount-cont').addClass('hidden');
        $('.cube').removeClass('hidden');

        setTimeout(function() {
            $('.cube').removeClass('flip');
            setTimeout(function() {
                $('.cube').addClass('hidden');
                $('#small-pricing-cont').removeClass('hidden');
            }, 330)
        }, 100);
    });
}

function getTotalVolumeDiscountPrice() {
    var quantity = parseInt($('#license-count').text());
    var userlicenses = user_licenses;
    $.ajax({
        type: 'POST',
        url: "/modules/content-details/php/calculateDiscountVolumePrice.php",
        data: {
            'courseId': idContent, // idContent global var
            'quantity': quantity,
            'user_licenses': userlicenses
        },
        success: function(data) {
            if (data.error) {
                console.log(error);
            } else {
                var total = data.total;
                var pricePerLicense = data.pricePerLicense;
                var discountPerLicense = data.discountPerLicense;
                $('#volume-discount-price').text('$' + total);
                $('#price-per-license').text('$' + pricePerLicense);
                $('#discount-per-license').text(discountPerLicense + '%');
                var volumeDiscount = $('#volume-discount-cont').clone()
                    .removeClass('hidden');
                $('#volume-discount-cont-flip').html(volumeDiscount);
            }
        },
        error: function(error) {
            console.log(error);
        },
        dataType: 'json'
    });
}

function addToCartMultiLicenses(idCourse, idUser, quantity) {
    if (xvalue == 0) {
        var data = {
            'IdUser': idUser,
            'IdLesson': idCourse,
            'quantity': quantity,
            'type': 0
        };
        $.ajax({
            type: 'POST',
            url: '/modules/cart/php/addtocart.php?val=add-multi-licenses',
            data: data,
            success: function(data) {
                if (data.success === 'OK') {

                    document.getElementById('cartnumber').innerHTML = '(' +
                        (xTotCart + 1) + ')';
                    xTotCart = xTotCart + 1;
                    successNotification('The course was added to the cart.');
                } else {
                    errorNotification(data.msg);
                }

                $('#confirm-buy-multi-license').modal('hide');
            },
            error: function(error) {
                console.log(error);
            },
            dataType: 'json'

        });
    } else {
        returnlogin(idCourse, 'ADDTOCART', contentUrlNameRedirect);
    }

}

function playerAutoWidwHandler() {
    if (currentPlayerSize == "small-video") {
        if ($("body").width() < 1500) {
            if (tempPlayerSize == false && currentPlayerSize == "small-video") {
                tempPlayerSize = true;

                setPlayerWide();
                currentPlayerSize = "small-video";

            }

        } else {
            if (tempPlayerSize == true) {
                setPlayerSmall();
                tempPlayerSize = false;
            }

        }
    }
}

function playerHeightHandler() {
    var playerWidth = $(".video-container").width();
    var playerHeightRatio = 0.56;
    var playerHeight = playerWidth * playerHeightRatio;

    $(".video-container").height(playerHeight);
    $(".black-bg").height(playerHeight);
    $(".loaderiframe").height(playerHeight);
}

function setPlayerWide() {
    $(".player-layout-cont").removeClass("small-video");
    $(".player-layout-cont").removeClass("wide-video");
    $(".player-layout-cont").addClass("wide-video");

    $("#player-main-cont").removeClass("container");
    $("#player-main-cont").removeClass("container-fluid");
    $("#player-main-cont").addClass("container-fluid");

    $("#content-to-move").appendTo("#main-cont");
    currentPlayerSize = "wide-video";
}

function setLayoutForTextTutorial() {
    setPlayerWide();
    $("#sidebar").insertBefore("#main-content-section");
    $("#sidebar").css("padding", "0px");

    $("#sidebar").attr("class", "col-md-12");
    $("#main-content-section").attr("class", "col-md-12");
    $("#tabs-section").attr("class", "col-md-12");

    $("#author-img-cont").attr("class", "col-md-2");
    $("#small-author-cont").css("border-radius", "0px");
    $("#small-author-cont").css("box-shadow", "none");

}

function setPlayerSmall() {
    $(".player-layout-cont").removeClass("small-video");
    $(".player-layout-cont").removeClass("wide-video");
    $(".player-layout-cont").addClass("small-video");

    $("#player-main-cont").removeClass("container");
    $("#player-main-cont").removeClass("container-fluid");
    $("#player-main-cont").addClass("container");

    $("#content-to-move").appendTo("#player-main-cont .main-row");
    currentPlayerSize = "small-video";
}

function dateFormat(date, format) {
    // Calculate date parts and replace instances in format string accordingly
    format = format.replace("DD", (date.getDate() < 10 ? '0' : '') +
        date.getDate()); // Pad with '0' if needed
    format = format.replace("MM", (date.getMonth() < 9 ? '0' : '') +
        (date.getMonth() + 1)); // Months are zero-based
    format = format.replace("YYYY", date.getFullYear());
    return format;
}
$(document).on('click', 'i.note-delete', function() {
    var $this = $(this),
        dataId = $this.attr('data-id');
    $('.delete-notes .delete-yes').attr('data-notes', dataId);
});

function loadPlaylist() {
    $.ajax({
        url: '/modules/content-details/php/loadPlaylist.php?idcontent=' +
            idContent + '&typeview=' + typeview + '&subscribed=' +
            subscribed + '&sellAmount=' + sellAmount + '&beta=' + beta,
        type: 'POST',
        async: true,
        dataType: 'json',

        success: function(resp) {
            setTimeout(function() {
                $('#videos-tab .loader').fadeOut('1000');
            }, 1000);
            $('.videos-list-cont').html(resp['chapterhtml']);
            $('#select-video').html(resp['video_list']);
            setPlaylistFunctions();
        },
        error: function(err) {
            alert(err);
        }
    });
}

function setNotesFunctions() {
    $(document).on(
        'click',
        '.note-item',
        function() {

            $('.note-item').removeClass('note-clicked');
            $(this).addClass('note-clicked');
            var $mediaid = $(this).attr('data-media-id');
            if ($('#iframeVideo').attr("src") == "") {
                $('#iframeVideo').attr(
                    "src",
                    pathIframe + '&idvideo=' + $mediaid + '&t=' +
                    $(this).attr('data-media-time'));
            } else {
                var $iframeElement = $('#iframeVideo').contents().find(
                    "[data-media-id='" + $mediaid + "']").closest(
                    '.video-item-cont');
                if ($iframeElement.hasClass('active')) {

                    $('#iframeVideo').get(0).contentWindow.seekNote($(this)
                        .closest('li').attr('data-media-time'));
                } else {

                    $iframeElement.trigger('click');
                    $('#iframeVideo').get(0).contentWindow.seekNote($(this)
                        .attr('data-media-time'));

                }
            }

            if (window.history.replaceState) {
                // prevents browser from storing
                // history with each change:
                window.history.replaceState({}, contentUrlName,
                    contentUrlName + '/video/' +
                    $(this).attr('data-media-urlname') +
                    '?time=' +
                    $(this).attr('data-media-time'));
            }
        });

    // delete notes from list
    $(document).on(
        'click',
        '.delete-notes .delete-yes',
        function() {
            $('.delete-notes').modal('hide');
            var note = $(this).attr('data-notes');
            $.ajax({
                url: '/modules/content-details/php/deleteNote.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    noteId: note
                },
                success: function(resp) {
                    var deletedNote = $('.note-item[data-note-id="' + note +
                        '"]');
                    deletedNote.hide();
                    $('#iframeVideo').contents().find(
                        '.timeline-tick[id="' + note + '"]').remove();
                },
                error: function(err) {
                    alert(err.responseJSON.message);
                }
            });
        });

}

function setPlaylistFunctions() {

    // video chapter-list
    $(document)
        .on(
            'click',
            '.playlist-item',
            function(e) {
                // if (subscribed == 1) {
                if (userId == 0 && sellAmount == 0 && $(this).attr("id") != "tutorial-video-container") {
                    alertbox(xPhpHeaderMsg.AlertboxTitle, 'Please login to view this video.',
                        2, "javascript:returnlogin(0,'','" +
                        contentUrlNameRedirect + "/video/" + $(this).find('.video-title').attr('data-media-urlname') + "');");
                    $('#btn-dialog-save').html("Login now");
                } else {
                    if (beta == 0) {
                        var bookmarkClicked = $(e.target).hasClass(
                            'section-list-bookmark');
                        if (bookmarkClicked) {
                            idmedia = $(this).find('.video-title').attr(
                                'data-media-id');
                            if ($('#iframeVideo').length &&
                                $('#iframeVideo').attr("src") != "") {
                                // $(e.target).toggleClass('bookmark-added');
                                // $(e.target).toggleClass('fa-bookmark-o');
                                var $this = $(this).find('.video-title');
                                var $iframeElement = $('#iframeVideo')
                                    .contents().find(
                                        '[data-media-id=' + idmedia +
                                        ']').closest(
                                        '.video-item-cont');
                                if ($iframeElement.hasClass('active')) {
                                    $('#iframeVideo').contents().find(
                                        '#bookmark-icon').trigger('click');
                                } else {
                                    url = ("/cgc-player/php/video_favorites.php?courseId=" +
                                        idContent +
                                        "&videoId=" +
                                        $(this).find('.video-title')
                                        .attr('data-media-id') +
                                        "&userId=" + userId);
                                    $.ajax({
                                        dataType: "json",
                                        async: false,
                                        cache: false,
                                        url: url,
                                        success: function(data) {
                                            if (data == "OK") {
                                                $(e.target).toggleClass(
                                                    'bookmark-added');
                                                $(e.target).toggleClass(
                                                    'fa-bookmark-o');

                                            }
                                        },
                                        error: function(XMLHttpRequest,
                                            textStatus, errorThrown) {

                                        }
                                    });
                                }

                            } else {
                                url = ("/cgc-player/php/video_favorites.php?courseId=" +
                                    idContent +
                                    "&videoId=" +
                                    $(this).find('.video-title').attr(
                                        'data-media-id') + "&userId=" + userId);
                                $.ajax({
                                    dataType: "json",
                                    async: false,
                                    cache: false,
                                    url: url,
                                    success: function(data) {
                                        if (data == "OK") {
                                            $(e.target).toggleClass(
                                                'bookmark-added');
                                            $(e.target).toggleClass(
                                                'fa-bookmark-o');

                                        }
                                    },
                                    error: function(XMLHttpRequest,
                                        textStatus, errorThrown) {

                                    }
                                });
                            }
                        } else {
                            // check if player is loaded
                            if ($('#iframeVideo').attr("src") == "") {
                                $('#iframeVideo').attr(
                                    "src",
                                    pathIframe +
                                    '&idvideo=' +
                                    $(this).find('.video-title')
                                    .attr('data-media-id'));
                            }

                            var $this = $(this).find('.video-title');
                            $('.playlist-item').removeClass('video-clicked');
                            $('.videos-list-cont .video-clicked').removeClass(
                                'video-clicked');
                            $(this).addClass('video-clicked video-watched');
                            $('.main-play-video-icon').hide();
                            // click in corresponding video iframe
                            if ($(this).text().trim() == "Promo Video") {
                                $('#iframeVideo').attr("src", pathIframePromo);
                            } else {
                                idmedia = $(this).find('.video-title').attr(
                                    'data-media-id');
                                setUrl($(this).find('.video-title').attr('data-media-urlname'));
                                if ($('#iframeVideo').contents().find(
                                        '[data-media-id=' + idmedia + ']').length == 0) {
                                    $('#iframeVideo')
                                        .attr(
                                            "src",
                                            pathIframe +
                                            '&idvideo=' +
                                            $(this)
                                            .find(
                                                '.video-title')
                                            .attr(
                                                'data-media-id'));
                                }
                                var $iframeElement = $('#iframeVideo')
                                    .contents().find(
                                        '[data-media-id=' + idmedia +
                                        ']').closest(
                                        '.video-item-cont');

                                if (!$iframeElement.hasClass('active')) {
                                    $iframeElement.trigger('click');
                                }
                            }
                        }
                    }
                }
                // $('#play-video').hide();
                // } else {
                //
                // $('#iframeVideo').attr(
                // "src",
                // "/modules/jw-videopage/php/cgc-player.php?src="
                // + $(this).find('.video-title').attr(
                // 'data-src')
                // + "&tech=html5&autoplay=false");
                // $('#play-video').hide();
                // var $this = $(this).find('.video-title');
                // $('.videos-list-cont .video-clicked').removeClass(
                // 'video-clicked');
                // $(this).addClass('video-clicked video-watched');
                //
                // }
                // end click in corresponding video iframe
            });

    // video playlist-select
    $(document).on(
        'change',
        '#select-video',
        function() {
            var opt = $(this).val();
            $('.videos-list-cont .chapter-list[data-chp-id="' + opt + '"]')
                .show().siblings().hide();
        });
}

$('#play-video').on('click', function() {
    $(this).hide();
    if (userId == 0 && sellAmount == 0) {
        if (pathIframePromo != "") {
            path = pathIframePromo;



            $('#iframeVideo').attr("src", path);


            if ($('.playlist-item').first().is(':visible')) {
                $('.playlist-item').first().trigger('click');
            } else {
                $('.content-section-list .playlist-item').first().trigger('click');
            }
        } else {
            alertbox(xPhpHeaderMsg.AlertboxTitle, 'You have to login in order to view this content.',
                2, "javascript:returnlogin(0,'','" +
                contentUrlNameRedirect + "');");
        }
    } else {
        path = pathIframe;
        if (pathIframePromo != "") {
            path = pathIframePromo;
        }
        if ($('#iframeVideo').attr("src") == "") {
            $('#iframeVideo').attr("src", path);
        }

        if ($('.playlist-item').first().is(':visible')) {
            $('.playlist-item').first().trigger('click');
        } else {
            $('.content-section-list .playlist-item').first().trigger('click');
        }
    }

});
$('#images-tab-btn')
    .on(
        'click',
        function() {
            setTab('images');
        });
// author-data
$('#author-tab-btn')
    .on(
        'click',
        function() {
            setTab('author');
            if (!$(this).hasClass('clicked')) {
                $(this).addClass('clicked');
                $('#author-append').empty();
                $('#author-tab .loader').show();
                $
                    .getJSON(
                        websiteUrl +
                        "modules/content-details/php/loadInstructor.php?contentId=" +
                        idContent,
                        function(data) {

                            var template = _.template($(
                                '#author-tab-temp').html());
                            if (subscribed == 1 && beta == 1) {
                                template = _.template($(
                                    '#author-tab-temp2').html());
                            }
                            $('#author-append').html(template({
                                instructor: data.instructor
                            }));
                            if (data.instructor.teacherLessons.length == 0) {
                                $('.author-content').addClass(
                                    'hidden');
                                $('#author-separator').remove();
                            }
                            setTimeout(function() {
                                $('#author-tab .loader')
                                    .fadeOut('1000');
                            }, 1000);
                        })
                    .fail(
                        function() {
                            setTimeout(
                                function() {
                                    $('#author-tab .loader')
                                        .fadeOut('1000');
                                    $('#author-append')
                                        .html(
                                            '<p class="err-message">Internal Server Error. Author Information could not be loaded right now. Please try again after sometime.</p>');
                                }, 1000);
                        });
            }
        });

// example-files-data
$('#example-files-tab-btn')
    .on(
        'click',
        function() {
            setTab('example');
            if (!$(this).hasClass('clicked')) {
                $(this).addClass('clicked');
                $('#example-files-tab .loader').show();
                $('#example-files-list').empty();
                $
                    .getJSON(
                        websiteUrl +
                        "modules/content-details/php/loadExampleFiles.php?testmode=0&idcontent=" +
                        idContent + '&typeview=' +
                        typeview,
                        function(data) {
                            var template = _.template($(
                                    '#example-files-temp')
                                .html());
                            $('#example-files-list')
                                .html(
                                    template({
                                        exampleFiles: data.exampleFile
                                    }));
                            if (data.exampleFile.length == 0) {
                                $('#example-text')
                                    .text(
                                        'The author did not provide any example files for this content.');
                            }
                            setTimeout(function() {
                                $('#example-files-tab .loader')
                                    .fadeOut('1000');
                            }, 1000);
                        })
                    .fail(
                        function() {
                            setTimeout(
                                function() {
                                    $(
                                            '#example-files-tab .loader')
                                        .fadeOut('1000');
                                    $('#example-files-list')
                                        .html(
                                            '<p class="err-message">Internal Server Error. Example files could not be loaded right now. Please try again after sometime.</p>');
                                }, 1000);
                        });
            }
        });
// downloaddata
$('#download-tab-btn')
    .on(
        'click',
        function() {
            if (!$(this).hasClass('clicked')) {
                $(this).addClass('clicked');
                $('#download-tab .loader').show();
                $('#download-list').empty();
                $
                    .getJSON(
                        websiteUrl +
                        "modules/content-details/php/loadDonwloadLink.php?testmode=0&idcontent=" +
                        idContent + '&typeview=' +
                        typeview,
                        function(data) {
                            var template = _.template($(
                                '#download-temp').html());
                            if (data.downloadLink.length == 0) {

                            } else {
                                $('#download-list')
                                    .html(
                                        template({
                                            downloadLink: data.downloadLink
                                        }));



                                $('.download-link').on(
                                    'click',
                                    function() {

                                        downloadVideoFile($(
                                            this).data(
                                            "link"));

                                    });
                            }
                            setTimeout(function() {
                                $('#download-tab .loader')
                                    .fadeOut('1000');
                            }, 1000);
                        })
                    .fail(
                        function() {
                            setTimeout(
                                function() {
                                    $(
                                            '#download-tab .loader')
                                        .fadeOut('1000');
                                    $('#download-list')
                                        .html(
                                            '<p class="err-message">Internal Server Error. Example files could not be loaded right now. Please try again after sometime.</p>');
                                }, 1000);
                        });
            }
        });
// author-data
$('#disqus-tab-btn').on('click', function() {
    setTab('disqus');
    if (!$(this).hasClass('clicked')) {
        $(this).addClass('clicked');
        startDisqus();
    }
});
$('#overview-tab-btn').on('click', function() {
    setTab('overview');
    if (!$(this).hasClass('clicked')) {
        $(this).addClass('clicked');

    }
});

function startDisqus() {
    loaddisqus();
    setTimeout(function() {
        $('#disqus-tab .loader').fadeOut('1000');
    }, 1000);
}
// review-tab-data
$('#reviews-tab-btn')
    .on(
        'click',
        function() {
            setTab('review');
            var $this = $(this);
            if (!$this.hasClass('clicked')) {
                $this.addClass('clicked');
                $('#reviews-tab .loader').show();
                $('#reviews-list').empty();
                $
                    .getJSON(
                        websiteUrl +
                        "modules/content-details/php/loadReviews.php?testmode=0&idcontent=" +
                        idContent,
                        function(data) {
                            var template = _.template($(
                                '#review-temp').html());
                            $('#reviews-list').html(
                                template({
                                    reviews: data.reviews
                                        .reverse()
                                }));
                            setTimeout(function() {
                                $('#reviews-tab .loader')
                                    .fadeOut('1000');
                            }, 1000);
                        })
                    .fail(
                        function() {
                            setTimeout(
                                function() {
                                    $(
                                            '#reviews-tab .loader')
                                        .fadeOut('1000');
                                    $('#reviews-list')
                                        .html(
                                            '<p class="err-message">Internal Server Error. Reviews could not be loaded right now. Please try again after sometime.</p>');
                                }, 1000);
                        });
            }
        });

function hideUnrelatedNotes() {
    var $this = $('.videos-list-cont .video-clicked').find('.video-title'),
        chapterId = $this
        .attr('data-chapter-id'),
        mediaId = $this.attr('data-media-id');
    $('.notes-list-cont[data-chapter-id="' + chapterId + '"]').show()
        .siblings().hide();
    $('.note-item').hide();
    $('.note-item[data-media-id="' + mediaId + '"]').show();
}

function loadNotes() {

    $
        .getJSON(
            websiteUrl +
            "modules/content-details/php/loadNotes.php?contentId=" +
            idContent + "&userId=" + userId,
            function(notes_data) {
                var notes_template = _
                    .template($('#notes-temp').html());
                $('#append-notes').html(notes_template({
                    notes_data: notes_data.notes
                }));

                if ($('#iframeVideo').attr("src") == "") {
                    if (!notesEnabled) {
                        $('#bookmark-name')
                            .attr("disabled", "disabled");
                        $('#bookmark-description').attr("disabled",
                            "disabled");
                        $('#send-note').attr("disabled", "disabled");
                        $('.set-note-position').attr("onclick",
                            "javascript:void(0);");
                    }

                }
                $('.note-delete').on('click', function(ev) {
                    if (notesEnabled) {
                        $('#delete-notes-modal').modal('show');
                    } else {
                        ev.stopPropagation();
                    }

                });

                setTimeout(function() {
                    // hideUnrelatedNotes();

                    $('#notes-tab .loader').fadeOut('1000');
                }, 1000);
            })
        .fail(
            function() {
                setTimeout(
                    function() {
                        $('#notes-tab .loader').fadeOut('1000');
                        $('#append-notes')
                            .html(
                                '<p class="err-message">Internal Server Error. Please try again after some time.</p>');
                    }, 1000);
            });
}

function stopIt(e) {
    e.preventDefault();
    e.stopPropagation();
}

function enableNotes() {
    $('#bookmark-name').removeAttr("disabled");
    $('#bookmark-description').removeAttr("disabled");
    $('#send-note').removeAttr("disabled");
    $('.set-note-position').attr("onclick", "");
    notesEnabled = true;
    setNotesFunctions();
}

function addNote(title, description) {

    // $('#iframeVideo').contents().find('#bookmark-video-time .fa').click();
    $('#iframeVideo').get(0).contentWindow.setBookmarkSavePosition();
    $('#iframeVideo').contents().find('#bookmark-description').val(description);
    $('#iframeVideo').contents().find('#bookmark-name').val(title);
    // console.log($('#iframeVideo').contents().find('#bookmark-name').val());
    // console.log($('#iframeVideo').contents().find('#bookmark-description').val());
    $('#iframeVideo').contents().find('#save-bookmark').click();
}
$('#add-note')
    .submit(
        function(e) {
            e.preventDefault();
            var $this = $(this);
            if ($('#iframeVideo').length &&
                $('#iframeVideo').attr("src") != "") {
                if ($this.find('input[name="note-title"]').val() != "" &&
                    $this.find(
                        'textarea[name="note-description"]')
                    .val() != "") {
                    addNote($this.find('input[name="note-title"]')
                        .val(), $this.find(
                            'textarea[name="note-description"]').val());
                    $this.find('input[name="note-title"]').val('');
                    $this.find('textarea[name="note-description"]')
                        .val('');
                } else {
                    alertbox(
                        "Content Detail",
                        "You must enter a title and a description. Please try again.",
                        1);
                }
            } else {
                alertbox(
                    "Content Detail",
                    "No video selected! Play video to insert Notes. ",
                    1);
            }
        });
// notes-tab-data
$('#notes-tab-btn').on('click', function() {
    // hideUnrelatedNotes();
    if (!$(this).hasClass('clicked')) {
        $(this).addClass('clicked');
        loadNotes();

    }
});
jQuery.expr[":"].Contains = jQuery.expr
    .createPseudo(function(arg) {
        return function(elem) {
            return jQuery(elem).text().toUpperCase().indexOf(
                arg.toUpperCase()) >= 0;
        };
    });
// video-list-search
$('#search-content').on(
    'keyup',
    function() {
        var searchedContent = $(this).val();
        if (searchedContent) {
            $('.playlist-item').hide();
            $('.chapter-list').hide();
            $('.video-title:Contains("' + searchedContent + '")').parents(
                '.chapter-list').show();
            $('.video-title:Contains("' + searchedContent + '")').parents(
                '.playlist-item').show();
        } else {
            $('.playlist-item').show();
            $('.chapter-list').show();
        }

    });
if ($('#blueimpGalleryPics').length > 0) {
    document.getElementById('blueimpGalleryPics').onclick = function(event) {
        event = event || window.event;
        var target = event.target || event.srcElement,
            link = target.src ? target.parentNode :
            target,
            options = {
                index: link,
                event: event
            },
            links = this.getElementsByTagName('a');

        blueimp.Gallery(links, options);
    };
}
var xCourses = new Object();
var StripeObject = {
    key: xStripeKey,
    image: '/images/mobile-app-icon.png',
    name: 'CGCIRCUIT LLC',
    description: '',
    amount: 5000,
    allowRememberMe: true,
    email: '',
    panelLabel: '',
    currency: 'usd',
    opened: function() {

    },
    closed: '',
    token: function(token, args) {

        $messg = processToken(token, xTot, xCourses[0]['type'], 1, xCourses);

    },
    afterUrl: "",
    afterPopup: true,
    initUrl: "",
    initPopup: "",
    postPay: true
}
var handler = initializeStripe(StripeObject);

function buynow($idlesson, $type, $version, $price) {
    xTot = 0;
    xCourses = [];
    xTot = $price;

    xtmpCourses = new Object();
    xtmpCourses['course'] = $idlesson;
    xtmpCourses['type'] = $type;
    xtmpCourses['version'] = $version;
    xtmpCourses['bundle'] = 0;

    xCourses[0] = xtmpCourses;
    if (xTot > 0) {

        xTotStripe = xTot.replace(".", "");
        SingleObject = {

            amount: xTotStripe,
            email: xmail
        }
        handler.open(SingleObject);
    } else {
        // subscribeworkshop($('#IDCourse').val(),$('#version').val(),'<URI>');
    }

}

function stripeAfterPopupResult(data) {
    // console.log("return data");
    // console.log(data);
    $('#myModalLabel').html("Checkout");
    $('#idmessage').html(data.errormessages);
    $('#btn-dialog-save').hide();
    $('#genericModal').modal('show');
    if (xmail != "" && data.operationSuccess) {

    }

    if (data.PaymentExecuted == true) {
        sendAnalytics(0, false, false, 'Content Detail Stripe');
        $('#btn-dialog-close').click(
            function() {
                setTimeout(function() {
                    //window.location = '/landing-checkout.php?VIC=' + data.VIC
                    //		+ '&iduser=' + data.iduser;
                    window.location = '/payment.php?VIC=' + data.VIC +
                        '&iduser=' + data.iduser + '&landing-checkout';
                }, 1000);
            });
    }
}


function subscribecoursedetail(xval) {
    if (xvalue == 0) {

        alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.SubscribeLesson, 2,
            'javascript:subscribeOK(' + xval + ');');
        // Are you sure to subscribe for this lesson?
    } else {
        alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.LoginForSubscribe,
            2, "javascript:returnlogin(" + xval + ",'SUBSCRIBE','" +
            contentUrlNameRedirect + "');");
        // You must login before subscribe!

    }
}

function subscribecoursedetailnewplayer(xval) {
    if (xvalue == 0) {

        subscribeOKcoursedetail(xval);
        // Are you sure to subscribe for this lesson?
    } else {
        alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.LoginForSubscribe,
            2, "javascript:returnlogin(" + xval + ",'SUBSCRIBE','" +
            contentUrlNameRedirect + "');");
        $("#btn-dialog-save").html("Login");
        // You must login before subscribe!

    }
}

function subscribetutorialcoursedetail(xval) {
    if (xvalue == 0) {

        alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.SubscribeTutorial,
            2, 'javascript:subscribeOKcoursedetail(' + xval + ')');

    } else {
        alertbox(xPhpHeaderMsg.AlertboxTitle,
            xPhpHeaderMsg.LoginForSubscribeTutorial, 2,
            "javascript:returnlogin(" + xval + ",'SUBSCRIBE','" +
            contentUrlNameRedirect + "');");

    }
}

function subscribeOKcoursedetail(xval) {
    viewloader();

    var dataString = 'IdLesson=' + xval + '&IdUser=' + xiduser;

    $.ajax({
        type: 'POST',
        url: xPathHeaderSubscribe + '?val=add', // 'modules/header/php/subscribe.php?val=add',
        data: dataString,
        success: showResponsesubscribecoursedetail,
        dataType: 'json'
    });

}

function showResponsesubscribecoursedetail(data, statusText) {
    if (statusText == 'success') {
        if (data.success == 'OK') {

            //addLearningFromCourseToJson(data.idcourse);

            //alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
            subscibedParam = 'subscribed';
            setUrl('');
            location.reload();
            hideloader();
        } else {
            alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
            hideloader();
        }
    }
}

function addLearningFromCourseToJson($val) {
    obj = $tempLessonJSON; // json var of browsebage
    var newobj = new Object();

    newobj.idcourse = obj.id;
    newobj.thumbnailPath = obj.images.iconurl;
    newobj.title = obj.title.title;
    newobj.url = contentUrlName;
    $dataHeader.myCourses.learning.push(newobj); // json var of header

}

function downloadVideoFile(name) {
    var dataString = 'name=' + name + '&idcontent=' + idContent;
    $.ajax({
        type: 'POST',
        url: '/modules/content-details/php/downloadfile.php',
        data: dataString,
        success: showResponsedownloadFile,
        dataType: 'text'
    });
}

function showResponsedownloadFile(data, statusText) {
    if (statusText == 'success') {
        downloadFile(data);
    }
}

window.downloadFile = function(sUrl) {

    // iOS devices do not support downloading. We have to inform user about
    // this.
    if (/(iP)/g.test(navigator.userAgent)) {
        alert('Your device does not support files downloading. Please try again in desktop browser.');
        return false;
    }

    // If in Chrome or Safari - download via virtual link click
    if (window.downloadFile.isChrome || window.downloadFile.isSafari) {
        // Creating new link node.
        var link = document.createElement('a');
        link.href = sUrl;

        if (link.download !== undefined) {
            // Set HTML5 download attribute. This will prevent file from opening
            // if supported.
            var fileName = sUrl.substring(sUrl.lastIndexOf('/') + 1,
                sUrl.length);
            link.download = fileName;
        }

        // Dispatching click event.
        if (document.createEvent) {
            var e = document.createEvent('MouseEvents');
            e.initEvent('click', true, true);
            link.dispatchEvent(e);
            return true;
        }
    }

    // Force file download (whether supported by server).
    if (sUrl.indexOf('?') === -1) {
        sUrl += '?download';
    }

    window.open(sUrl, '_self');
    return true;
}

window.downloadFile.isChrome = navigator.userAgent.toLowerCase().indexOf(
    'chrome') > -1;
window.downloadFile.isSafari = navigator.userAgent.toLowerCase().indexOf(
    'safari') > -1;



function setUrl(path) {

    if (window.history.replaceState) {
        addQueryText = '';
        if (downloadLink == 1) {
            addQueryText = addQueryText + '?downloadLink';
        }
        if (discussionLink == 1) {
            addQueryText = addQueryText + '?discussionTab';
        }
        if (reviewLink == 1) {
            addQueryText = addQueryText + '?reviewsTab';
        }
        if (authorLink == 1) {
            addQueryText = addQueryText + '?authorTab';
        }
        if (imagesLink == 1) {
            addQueryText = addQueryText + '?imagesTab';
        }
        if (exampleFileLink == 1) {
            addQueryText = addQueryText + '?exampleFilesTab';
        }
        if (overviewLink == 1) {
            addQueryText = addQueryText + '?overviewTab';
        }
        if (videoTime != '') {
            if (addQueryText == '') {
                addQueryText = addQueryText + '?time=' + videoTime;
            } else {
                addQueryText = addQueryText + '&time=' + videoTime;
            }


        }
        if (subscibedParam != '') {
            if (addQueryText == '') {
                addQueryText = addQueryText + '?subscribed=yes';
            } else {
                addQueryText = addQueryText + '&subscribed=yes';
            }


        }
        if (path != '') {
            videoPath = path
        }

        if (videoPath != '') {
            newContentUrlName = contentUrlName + '/video/' + videoPath + addQueryText;
        } else {
            newContentUrlName = contentUrlName + addQueryText;
        }

        // prevents browser from storing
        // history with each change:
        window.history.replaceState({}, contentUrlName, newContentUrlName);

    }
}

function setTab(tabName) {
    discussionLink = 0;
    reviewLink = 0;
    authorLink = 0;
    imagesLink = 0;
    exampleFileLink = 0
    overviewLink = 0;
    if (tabName == 'disqus') {
        discussionLink = 1;
    }
    if (tabName == 'review') {
        reviewLink = 1;
    }
    if (tabName == 'author') {
        authorLink = 1;
    }
    if (tabName == 'images') {
        imagesLink = 1;
    }
    if (tabName == 'example') {
        exampleFileLink = 1;
    }
    if (tabName == 'overview') {
        overviewLink = 1;
    }
    setUrl('');
}

function getVideoTime() {
    if ($('#iframeVideo').attr("src") == "") {} else {
        videoTime = $('#iframeVideo').get(0).contentWindow.getVideoTime();

    }
    setUrl('');
}

function setVideoTime(val) {
    if ($('#iframeVideo').attr("src") == "") {} else {
        videoTime = val;

    }
    setUrl('');
}

function copyToClipboard() {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(window.location.href).select();
    document.execCommand("copy");
    $temp.remove();
    successNotification('Link copied successfully');
}



function insertParam(key, value) {
    key = encodeURIComponent(key);
    value = encodeURIComponent(value);

    var s = document.location.search;
    var kvp = key + "=" + value;

    var r = new RegExp("(&|\\?)" + key + "=[^\&]*");

    s = s.replace(r, "$1" + kvp);

    if (!RegExp.$1) { s += (s.length > 0 ? '&' : '?') + kvp; };

    //again, do what you will here
    document.location.search = s;
}

function removeParam(parameter) {
    var url = document.location.href;
    var urlparts = url.split('?');

    if (urlparts.length >= 2) {
        var urlBase = urlparts.shift();
        var queryString = urlparts.join("?");

        var prefix = encodeURIComponent(parameter) + '=';
        var pars = queryString.split(/[&;]/g);
        for (var i = pars.length; i-- > 0;)
            if (pars[i].lastIndexOf(prefix, 0) !== -1)
                pars.splice(i, 1);
        url = urlBase + '?' + pars.join('&');
        window.history.pushState('', document.title, url); // added this line to push the new url directly to url bar .

    }
    return url;
}


function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function setAuthorSmall() {
    if (subscribed == 1 && beta == 1) {
        $('#author-small-append').empty();
        $.getJSON(
            websiteUrl +
            "modules/content-details/php/loadInstructor.php?contentId=" +
            idContent,
            function(data) {
                var template = _.template($(
                    '#author-small-tab-temp').html());
                $('#author-small-append').html(template({
                    instructor: data.instructor
                }));


            })

    }
}