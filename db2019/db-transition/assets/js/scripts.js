(function ($) {
    $(document).ready(function () {

        var carousel_items = $('.carousel-item');

        function nextBlock() {
            var first = carousel_items.filter(function () {
                    return $(this).hasClass('next');
                }),
                next = first.next().length > 0 ? first.next() : carousel_items.first(),
                last = first.prev().length > 0 ? first.prev() : carousel_items.last();

            carousel_items.removeClass('first next last');
            first.addClass('first');
            next.addClass('next');
            last.addClass('last');

            runCurrentBlock();
            // alert("s");


        }

        function runScriptBlock1() {
            // register var
            var wrap = $('.block-1'),
                selectBorder = wrap.find('.selected-border'),
                textElement = wrap.find('.demo-element'),
                backgroundBefore = wrap.find('.before-edit'),
                backgroundNoText = wrap.find('.no-text'),
                backgroundAfter = wrap.find('.after-edit'),
                mainContext = wrap.find('.text-context'),
                colorPicker = wrap.find('.color-picker-context');

            // eraser and type fn
            function eraserThenTypeBack(newText, callback) {
                var captionLength = 0;
                var caption = '';

                // simulate like human typing
                function humanize() {
                    return Math.floor((Math.random() * 10) + 80);
                }

                // start typing
                function testTypingEffect() {
                    caption = newText;
                    type();
                }

                // typing fn
                function type() {
                    textElement.html(caption.substr(0, captionLength++));
                    if (captionLength < caption.length + 1) {
                        setTimeout(type, humanize());
                    } else {
                        callback();
                        captionLength = 0;
                        caption = '';
                    }
                }

                // start eraser
                function testErasingEffect() {
                    caption = textElement.html();
                    captionLength = caption.length;
                    if (captionLength > 0) {
                        erase();
                    } else {
                        setTimeout(testErasingEffect, 1000);
                    }
                }

                // eraser fn
                function erase() {
                    textElement.html(caption.substr(0, captionLength--));
                    if (captionLength >= 0) {
                        setTimeout(erase, humanize());
                    } else {
                        captionLength = 0;
                        caption = '';
                        setTimeout(testTypingEffect, 500);
                    }
                }

                //testErasingEffect();
                testTypingEffect();
            }

            // reset block
            function resetBlock() {
                textElement.css('color', '#5c884c').html('summer<span class="blink-cursor hidden"></span>').removeClass('hidden');
                backgroundBefore.removeClass('hidden');
                backgroundAfter.addClass('hidden');
                mainContext.find('.btn-select-color span').css('background', '#5c884c');
                colorPicker.find('.color-spectrum-wrapper .marker').css('transform', 'translate(-10px, 39px)');
                colorPicker.find('.color-lightness').css('background-color', 'rgb(172, 255, 143)');
                colorPicker.find('.color-lightness .marker').css('transform', 'translateX(84px)');
                colorPicker.find('.color-code').val('5c884c');
                colorPicker.find('.colorPalette[title="#3f51b5"]').find('em').remove();
                colorPicker.find('.colorPalette[title="#5c884c"]').append('<em><i class="fa fa-check"></i></em>');
                window.setTimeout(selectText, 400);
            }

            // select text interior
            function selectText() {
                backgroundBefore.addClass('hidden');
                backgroundNoText.removeClass('hidden');
                selectBorder.removeClass('hidden');
                mainContext.removeClass('transition-fade-out-4').addClass('transition-fade-in-4');
                textElement.find('.blink-cursor').removeClass('hidden');
                window.setTimeout(changeText, 2600);
            }

            // type text
            function changeText() {
                textElement.find('.blink-cursor').addClass('hidden');
                eraserThenTypeBack('country', function () {
                    window.setTimeout(openColorPicker, 1000);
                });
            }

            // open color picker
            function openColorPicker() {
                colorPicker.removeClass('transition-fade-out-4').addClass('transition-fade-in-4');
                window.setTimeout(changeTextColorDemo1, 1500);
            }

            // change text color demo 1 - to white
            function changeTextColorDemo1() {
                textElement.css('color', '#ffffff');
                colorPicker.find('.color-spectrum-wrapper .marker').css('transform', 'translate(0px, 0px)');
                colorPicker.find('.color-lightness').css('background-color', 'rgb(255, 255, 255)');
                colorPicker.find('.color-lightness .marker').css('transform', 'translateX(0px)');
                colorPicker.find('.color-code').val('ffffff');
                mainContext.find('.btn-select-color span').css('background', '#ffffff');
                colorPicker.find('.colorPalette[title="#5c884c"]').find('em').remove();
                colorPicker.find('.colorPalette[title="#ffffff"]').append('<em><i class="fa fa-check"></i></em>');
                window.setTimeout(changeTextColorDemo2, 1500);
            }

            // change text color demo 2 - to navy's blue
            function changeTextColorDemo2() {
                textElement.css('color', '#3f51b5');
                colorPicker.find('.color-spectrum-wrapper .marker').css('transform', 'translate(-37px, -45px)');
                colorPicker.find('.color-lightness').css('background-color', 'rgb(89, 114, 255)');
                colorPicker.find('.color-lightness .marker').css('transform', 'translateX(52.2353px)');
                colorPicker.find('.color-code').val('3f51b5');
                mainContext.find('.btn-select-color span').css('background', '#3f51b5');
                colorPicker.find('.colorPalette[title="#ffffff"]').find('em').remove();
                colorPicker.find('.colorPalette[title="#3f51b5"]').append('<em><i class="fa fa-check"></i></em>');
                window.setTimeout(removeSelect, 1500);
            }

            // close all context
            function removeSelect() {
                backgroundNoText.addClass('hidden');
                backgroundAfter.removeClass('hidden');
                mainContext.addClass('transition-fade-out-4').removeClass('transition-fade-in-4');
                window.setTimeout(function () {
                    colorPicker.addClass('transition-fade-out-4').removeClass('transition-fade-in-4');
                }, 200);
                selectBorder.addClass('hidden');
                textElement.addClass('hidden');
                window.setTimeout(nextBlock, 2000);
                //window.setTimeout(resetBlock, 2000);
            }

            // start
            //window.setTimeout(nextBlock, 800);
            window.setTimeout(resetBlock, 800);
        }

        function runScriptBlock2() {
            // register var
            var wrap = $('.block-2'),
                selectBorder = wrap.find('.selected-border'),
                imageElement = wrap.find('.demo-element'),
                simulateClick = wrap.find('.simulate-pointer'),
                mainContext = wrap.find('.image-context'),
                filterContext = wrap.find('.filter-context'),
                backgroundBefore = wrap.find('.before-edit'),
                backgroundAfterFrame = wrap.find('.after-append-frame'),
                backgroundAfterFilter = wrap.find('.after-filter'),
                backgroundDone = wrap.find('.after-edit');

            // reset block
            function resetBlock() {
                imageElement.removeClass('move').removeClass('done-move').removeClass('hidden').addClass('start').addClass('disable-transition');
                window.setTimeout(function () {
                    imageElement.removeClass('disable-transition').removeClass('start');
                    selectBorder.removeClass('hidden');
                }, 80);
                simulateClick.removeClass('move').removeClass('done-move').removeClass('click');
                backgroundBefore.removeClass('hidden');
                backgroundAfterFrame.addClass('transition-fade-out-6').removeClass('transition-fade-in-6').removeClass('hidden');
                backgroundAfterFilter.addClass('hidden');
                backgroundDone.addClass('hidden');
                mainContext.addClass('transition-fade-out-8').removeClass('transition-fade-in-8');
                filterContext.addClass('transition-fade-out-8').removeClass('transition-fade-in-8');
                filterContext.find('[data-filter="Festive"]').removeClass('selected');
                filterContext.find('#brightness-slider').find('.slider-input').val(0);
                filterContext.find('#brightness-slider').find('.display-value').html(0);
                filterContext.find('#contrast-slider').find('.slider-input').val(0);
                filterContext.find('#contrast-slider').find('.display-value').html(0);
                filterContext.find('#saturation-slider').find('.slider-input').val(0);
                filterContext.find('#saturation-slider').find('.display-value').html(0);
                window.setTimeout(mouseDownOnElement, 1600);
            }

            // mouse down on element
            function mouseDownOnElement() {
                simulateClick.addClass('click');
                window.setTimeout(moveElement, 600);
            }

            // move element to frame
            function moveElement() {
                simulateClick.addClass('move');
                window.setTimeout(function () {
                    imageElement.addClass('move');
                    window.setTimeout(mouseUpOnElement, 400);
                }, 200);
            }

            // mouse up on element
            function mouseUpOnElement() {
                simulateClick.removeClass('move').addClass('done-move');
                window.setTimeout(function () {
                    simulateClick.removeClass('click');
                    imageElement.removeClass('move').addClass('done-move').addClass('hover');
                }, 200);
                window.setTimeout(appendToFrame, 400);
            }

            // append image to frame
            function appendToFrame() {
                imageElement.removeClass('hover');
                window.setTimeout(function () {
                    backgroundAfterFrame.addClass('transition-fade-in-6').removeClass('transition-fade-out-6');
                }, 200);
                window.setTimeout(function () {
                    backgroundBefore.addClass('hidden');
                }, 1000);
                window.setTimeout(function () {
                    simulateClick.removeClass('done-move');
                    imageElement.addClass('hidden');
                }, 600);
                window.setTimeout(selectElement, 1600);
            }

            // show context
            function selectElement() {
                mainContext.removeClass('transition-fade-out-8').addClass('transition-fade-in-8');
                window.setTimeout(openFilterContext, 200);
            }

            // open filter context
            function openFilterContext() {
                filterContext.removeClass('transition-fade-out-8').addClass('transition-fade-in-8');
                window.setTimeout(filterRosie, 1500);
            }

            // filter image with rosie effect // 'brightness': 0, 'contrast': 55, 'saturation': -28
            function filterRosie() {
                simulateClick.addClass('click-filter click-rosie');
                window.setTimeout(function () {
                    simulateClick.removeClass('click-filter click-rosie');
                }, 800);
                window.setTimeout(function () {
                    backgroundAfterFrame.addClass('hidden');
                    backgroundAfterFilter.removeClass('hidden');
                }, 400);
                filterContext.find('[data-filter="Rosie"]').addClass('selected');
                filterContext.find('#brightness-slider').find('.slider-input').val(0);
                filterContext.find('#brightness-slider').find('.display-value').html(0);
                filterContext.find('#contrast-slider').find('.slider-input').val(55);
                filterContext.find('#contrast-slider').find('.display-value').html(55);
                filterContext.find('#saturation-slider').find('.slider-input').val(-28);
                filterContext.find('#saturation-slider').find('.display-value').html(-28);
                window.setTimeout(filterFestive, 1800);
            }

            // filter image with festive effect // 'brightness': 10, 'contrast': 21, 'saturation': 24
            function filterFestive() {
                simulateClick.addClass('click-filter click-festive');
                window.setTimeout(function () {
                    simulateClick.removeClass('click-filter click-festive');
                }, 800);
                window.setTimeout(function () {
                    backgroundAfterFilter.addClass('hidden');
                    backgroundDone.removeClass('hidden');
                }, 400);
                filterContext.find('[data-filter="Rosie"]').removeClass('selected');
                filterContext.find('[data-filter="Festive"]').addClass('selected');
                filterContext.find('#brightness-slider').find('.slider-input').val(10);
                filterContext.find('#brightness-slider').find('.display-value').html(10);
                filterContext.find('#contrast-slider').find('.slider-input').val(21);
                filterContext.find('#contrast-slider').find('.display-value').html(21);
                filterContext.find('#saturation-slider').find('.slider-input').val(24);
                filterContext.find('#saturation-slider').find('.display-value').html(24);
                window.setTimeout(removeSelect, 1400);
            }

            // close all context
            function removeSelect() {
                mainContext.addClass('transition-fade-out-8').removeClass('transition-fade-in-8');
                window.setTimeout(function () {
                    filterContext.addClass('transition-fade-out-8').removeClass('transition-fade-in-8');
                }, 200);
                selectBorder.addClass('hidden');
                window.setTimeout(nextBlock, 1600);
            }

            // start
            //window.setTimeout(nextBlock, 800);
            resetBlock();
        }

        function runScriptBlock3() {
            // register var
            var wrap = $('.block-3'),
                backgroundImage = wrap.find('.background-image'),
                zoom = wrap.find('.zoom'),
                zoomImg = zoom.find('img');

            // get block size
            function getBlockSize() {
                var imgWidth = backgroundImage.width(),
                    imgHeight = backgroundImage.height();

                zoomImg.css({
                    'width': imgWidth,
                    'height': imgHeight,
                    'top': 920,
                    'left': -330
                });
            }

            // reset block
            function resetBlock() {
                getBlockSize();

                window.setTimeout(function () {
                    zoom.addClass('transition-fade-in-4').removeClass('transition-fade-out-4').css({
                        'opacity': 1,
                        'top': -80,
                        'left': -40
                    });
                    zoomImg.css({
                        'top': 690, //640
                        'left': 220
                    });
                }, 80);
                window.setTimeout(zoomMoveToPos1, 2200);
            }

            // move to pos 1
            function zoomMoveToPos1() {
                zoom.css({
                    'opacity': 1,
                    'top': 255,
                    'left': 175
                });
                zoomImg.css({
                    'top': -270, // -250
                    'left': -200
                });
                window.setTimeout(zoomMoveToPos2, 2200);
            }

            // move to pos 2
            function zoomMoveToPos2() {
                zoom.css({
                    'opacity': 1,
                    'top': 90,
                    'left': 375
                });
                zoomImg.css({
                    'top': 310,
                    'left': -750 // -700
                });
                window.setTimeout(function () {
                    zoom.addClass('transition-fade-out-4').removeClass('transition-fade-in-4');
                    window.setTimeout(nextBlock, 100);
                }, 1100);
            }

            // start
            //window.setTimeout(nextBlock, 800);
            window.setTimeout(resetBlock, 800);
            //resetBlock();
        }

        function runCurrentBlock() {
            var currentBlock = carousel_items.filter(function () {
                return $(this).hasClass('first');
            });

            if (currentBlock.data('block') === 1) {
                // run block 1
                runScriptBlock1();
                //$('#text-intro').html("Graphic Design<span class='text-light'> Simplified</span>").fadeIn();

                $('#text-intro').fadeOut("slow", function () {
                    $(this).replaceWith("<h2 class='animated' id='text-intro'> <span class='db-text'>  Graphic Design</span> <strong class='text-light'> <span class='db-text'>Simplified</span> </strong> </h2>");
                    $('#text-intro').fadeIn("slow");
                });



                $('.des-intro').fadeOut("slow", function () {
                    $(this).replaceWith("<p class='des-intro'><span class='db-text'> Create a</span><strong><span class='db-text'> stunning</span></strong> <span class='db-text'> design within </span><strong><span class='db-text'> 5 minutes</span></strong></p>");
                    $('.des-intro').fadeIn("slow");
                });


            }

            if (currentBlock.data('block') === 2) {
                // run block 2
                runScriptBlock2();
                // $('#text-intro').html("<span class='text-light'> Simple</span> Drag & Drop").fadeIn();

                $('#text-intro').fadeOut("slow", function () {
                    $(this).replaceWith("<h2 class='animated' id='text-intro'><strong class='text-light'> <span class='db-text'> Simple</span> </strong> <span class='db-text'> Drag & Drop</span> </h2>");
                    $('#text-intro').fadeIn("slow");
                });



                $('.des-intro').fadeOut("slow", function () {
                    $(this).replaceWith("<p class='des-intro'><span class='db-text'> Save more time for</span> <strong><span class='db-text'> imagination</span></strong></p>");
                    $('.des-intro').fadeIn("slow");
                });
            }

            if (currentBlock.data('block') === 3) {
                // run block 3
                runScriptBlock3();
                //$('#text-intro').html("High Quality<span class='text-light'> For Print</span>").fadeIn();

                $('#text-intro').fadeOut("slow", function () {
                    $(this).replaceWith("<h2 class='animated' id='text-intro'><span class='db-text'>High Quality</span><strong class='text-light'> <span class='db-text'>For Print</span></strong></h2>");
                    $('#text-intro').fadeIn("slow");
                });





                $('.des-intro').fadeOut("slow", function () {
                    $(this).replaceWith("<p class='des-intro'> <strong><span class='db-text'> Share</span></strong>  <span class='db-text'> and</span><strong>  <span class='db-text'> download</span></strong> <span class='db-text'> your designs in high definition</span></p>");
                    $('.des-intro').fadeIn("slow");
                });
            }
        }

        function startScript() {
            runCurrentBlock();
            //window.setInterval(nextBlock, 2000);
        }

        $(window).load(startScript);
    });
})(jQuery);
