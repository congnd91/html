var markers = new Array();
var marker_clusterer ='';
var defaulColor =''; // default color
var enableHTMLmarkers = true;
var HTMLmarker_offset_x = -5;
var sw_map_style = [{featureType:"all",elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#000000"},{lightness:40}]},{featureType:"all",elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#000000"},{lightness:16}]},{featureType:"all",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:17},{weight:1.2}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#000000"},{lightness:21}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#000000"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#000000"},{lightness:16}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#000000"},{lightness:19}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#000000"},{lightness:17}]}];
var sw_map_style_open_street = 'https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}{r}.png';
        
jQuery(document).ready(function($){


    /* images gellary fro reviews images */
    $('.reviews-files-list .template-download').bind("click", function()
    {
        var myLinks = new Array();
        var current = $(this).attr('href');
        var curIndex = 0;

        $(this).closest('.reviews-files-list').find('.template-download').each(function (i) {
            var img_href = $(this).attr('href');
            myLinks[i] = img_href;
            if(current == img_href)
                curIndex = i;
        });

        var options = {index: curIndex}

        blueimp.Gallery(myLinks, options);

        return false;
    });
    /* end images gellary fro reviews images */
    
    // [START] submit smile //  
    $(".rev_smiles .rev_smile .icon").on('click',function(e){
        e.preventDefault();
        var self = $(this);
        var self_parent = self.parent()
        var review_data_type = self_parent.attr('data-revtype')
        var review_data_id = self_parent.attr('data-review')
        var ajax_url = self_parent.attr('data-ajax')
        var loginpopup = self_parent.attr('data-loginpopup')
        
        var $load_indicator = $(this).closest('.rev_smiles').find('.reviev_ajax_loader')
        $load_indicator.removeClass('hidden');

        var data = { 
            review_id: review_data_id, 
            review_type: review_data_type, 
        };

        $.extend( data, {
            "page": 'frontendajax_submitsmile',
            "action": 'ci_action'
        });

        $.post(ajax_url, data, 
            function(data){

            ShowStatus.show(data.message);
            if(data.success)
            {
                var $count = $.trim(self_parent.find('.rev_smile-count').text());
                if($count) {
                    $count = parseInt($count)+1;
                } else {
                    $count = 1;
                }
                self_parent.find('.rev_smile-count').html($count);
            } else {
                if(loginpopup == 'true' && $(window).width()>768) {
                    $('#login-modal').modal('show')  
                }
            }
        }).success(function(){
            $load_indicator.addClass('hidden');
        });

        return false;
    });
    // [END] submit smile // 
    
    //devon_add_to_favorite ();
    //devon_remove_from_favorites ();
    open_location();
    
    $('.login_popup_enabled').on('click', function(e){
        if($(window).width()>768) {
            e.preventDefault();
            $('#login-modal').modal('show')  
        }
    })
    
        
    $('#filter-models').find('input,textarea,select').change(function(){
        $('.sw-search-start').first().trigger('click');
        return false;
    })
        
    if ($('.sw_scale_range').length){
        $('.sw_scale_range').each(function(){
            var th_scale = $(this);
            var th_scale_id = $(this).attr('id');
            var conf_min = '0';
            var conf_max = '100000';
            var conf_sufix= '';
            var conf_prefix= '';
            var conf_infinity = '';
            var conf_predifinedMin = '';
            var conf_predifinedMax =  '';

            if(th_scale.find('.config-range').length ) {
                var $config = th_scale.find('.config-range');
                conf_min = $config.attr('data-min') || 0;
                conf_max = $config.attr('data-max') || '';
                conf_sufix= $config.attr('data-sufix') || '';
                conf_prefix= $config.attr('data-prefix') || '';
                conf_infinity = $config.attr('data-infinity') || "false";
                conf_predifinedMin = $config.attr('data-predifinedMin') || '';
                conf_predifinedMax = $config.attr('data-predifinedMax') || '';
            }
            devon_scale_range('#'+th_scale_id,conf_min,conf_max,conf_prefix,conf_sufix,conf_infinity,conf_predifinedMin,conf_predifinedMax);
       
        })
    }
    
	let searchParams = new URLSearchParams(window.location.search); 
	
	// On cilck for each filter
	jQuery(document).on('click', '.filter-entry a', function(e) {
	    e.preventDefault();
	    let item = jQuery(e.target);
	    let key = item.data('key');

        if (item.parent().hasClass('selected')) {
            item.parent().removeClass('selected');
        } else {
            if (key != 'services') { //allow for multiselect for services
                jQuery('.filter-entry a[data-key="' + key + '"]').parent().removeClass('selected');
            }

            item.parent().addClass('selected');
        }
        let flag = false;
        jQuery('.filter-entry a[data-key="' + key + '"]').each(function(i, el) {
            if (jQuery(el).parent().hasClass('selected')) {
                flag = true;
            }
        });

        if (flag) {
            jQuery('#filter-models .filter-label[data-key="' + key + '"]').addClass('selected');
        } else {
            jQuery('#filter-models .filter-label[data-key="' + key + '"]').removeClass('selected');
        }

        let params = getFilterParams();

        let pageNum = 1;
        // Get query param "u" if set then pick up else set it 1
        if(searchParams.has('u')) {
            pageNum = searchParams.get('u');
        }

        let url = 'u=' + pageNum;
        for (i in params) {
            url += '&' + i + '=' + params[i];
        }
        loadSearchResults(pageNum, url);
        //update url
        window.history.replaceState('', '', '/ads/?' + url);
    });

	// Get Parms from each filters and combine for services
	function getFilterParams() {
        let params = [];
        jQuery('#filter-models .filter-label').each(function (i, el) {
            if (jQuery(el).data('key') == 'services') {
                let tmp = [];
                jQuery('.filter-entry a[data-key="' + jQuery(el).data('key') + '"]').each(function(j, item) {
                    if (jQuery(item).parent().hasClass('selected')) {
                        tmp.push(jQuery(item).data('value'));
                    }
                });

                params[jQuery(el).data('key')] = tmp.join(',');

            } else {
                jQuery('.filter-entry a[data-key="' + jQuery(el).data('key') + '"]').each(function(j, item) {
                    if (jQuery(item).parent().hasClass('selected')) {
                        params[jQuery(item).data('key')] = jQuery(item).data('value');
                    }
                });
            }
        });		
        return params;
    }
	
	// Call AJAX to load results
	// URL = query string, pageNum 
	function loadSearchResults(pageNum, url) {
		jQuery('.loader').show(); 
		jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                'action': 'load-filter',
                'pageNum': pageNum,
                'form_data': url,
            },
            success: function(response) {
                jQuery(".ads-container").html(response.data.ads_container_html);
                jQuery(".num-post").html(response.data.total_posts);
                jQuery(".top-ads-container").html(response.data.top_ads_html);

                jQuery(".ads-container, .search-filters").css('opacity','1');
				jQuery('.loader').hide(); 
                return false;
            },
			done: function(response) {
				jQuery('.loader').hide(); 
			}
        });
    }
	
	// Load the results first time only when the ads page is there
	// or say, #filter-models is present for implementation on other pages
    if(jQuery('#filter-models .filter-label').length) {		
		pageNum = 1; 
		if(!searchParams.has('u')) {
			pageNum = searchParams.get('u');
		}
        loadSearchResults(pageNum, searchParams.toString());
    }
	
	// Toggle the search filters on clicking each filter label
    jQuery('.filter-label').on('click', function () {
        if (jQuery('.filter-container').is(':visible')) {
            jQuery('.filter-container').slideToggle();
            jQuery('.filter-close').hide();
        } else {
            jQuery('.filter-container').slideToggle();
        }
    });

	// Show mobile view of the filters
    $('.mobile-filter-header a').on('click', function(e) {
        e.preventDefault();
        if (jQuery('.filter-container').is(':visible')) {
            jQuery('.top-ads-container').show();
            jQuery('.ads-container').show();
        } else {
            jQuery('.top-ads-container').hide();
            jQuery('.ads-container').hide();
        }
        $('.filter-container').slideToggle();

    });
	
	// Submit button for mobile filters
    $('.filter-submit').on('click', function(e) {
        e.preventDefault();
        jQuery('.top-ads-container').show();
        jQuery('.ads-container').show();
        $('.filter-container').slideToggle();
    });

	// close filters basically refreshes the page
	// but is currently hidden as no more required
    $('.filter-close').on('click', function(e) {
        e.preventDefault();
        $('.filter-container').slideToggle();
    });

}); 
function devon_add_to_favorite () {
    // [START] Add to favorites //  
    var $ = jQuery; 
    $(".add-favorites-action").on('click',function(e){
        e.preventDefault();
        var self = $(this);
        var self_parent = self.parent()
        var estate_data_id = $(this).attr('data-id')
        var fav_ajax_url = $(this).attr('data-ajax')
        var loginpopup = $(this).attr('data-loginpopup');
        self_parent.addClass('loading');
        
        var data = { listing_id: estate_data_id };
        
        $.extend( data, {
            "page": 'frontendajax_addfavorite',
            "action": 'ci_action'
        });
        
        $.post(fav_ajax_url, data, 
            function(data){

            ShowStatus.show(data.message);
            if(data.success)
            {
                self_parent.find("a.add-favorites-action").addClass('hidden');
                self_parent.find("a.remove-favorites-action").removeClass('hidden');
            } else {
                
                if(loginpopup == 'true' && $(window).width()>768) {
                    $('#login-modal').modal('show')  
                }
                
            }
        }).success(function(){
            self_parent.removeClass('loading');
        });

        return false;
    });
    // [END] Add to favorites //  
}     
        
 function devon_remove_from_favorites () {
    // [START] Add to favorites //  
    var $ = jQuery; 
    $(".remove-favorites-action").on('click',function(e){
        e.preventDefault();
        var self = $(this);
        var self_parent = self.parent()
        var estate_data_id = $(this).attr('data-id')
        var fav_ajax_url = $(this).attr('data-ajax')
        
        var data = { listing_id: estate_data_id };
        
        $.extend( data, {
            "page": 'frontendajax_remfavorite',
            "action": 'ci_action'
        });
        
        self_parent.addClass('loading');
        $.post(fav_ajax_url, data, 
            function(data){

            ShowStatus.show(data.message);
            
            if(data.success)
            {
                self.parent().find("a.add-favorites-action").removeClass('hidden');
                self.parent().find("a.remove-favorites-action").addClass('hidden');
            } else {
                
            }
        }).success(function(){
            self_parent.removeClass('loading');
        });

        return false;
    });
}
// [END] Add to favorites //  



 /*
 * Scale range
 * @param {type} object selector for scale-range box
 * @param {type} min min value
 * @param {type} max max value
 * @param {type} prefix
 * @param {type} sufix
 * @param {type} infinity, is infinity
 * @param {type} predifinedMin value
 * @param {type} predifinedMax value
 * @returns {Boolean}
 * 
 * 
 * Example html :
    <div class="scale-range" id="nonlinear-price">
        <label>Price</label>
        <div class="nonlinear"></div>
        <div class="scale-range-value">
            <span class="nonlinear-min"></span>
            <span class="nonlinear-max"></span>
        </div>
        <input id="from" type="text" class="value-min hidden" placeholder="" value="" />
        <input id="to" type="text" class="value-max hidden" placeholder="" value="" />
    </div>
* Example js :                                                                                                                                                                                                                           
     nexos_scale_range('#nonlinear-price',0, 500000, '$', 'k', true, '','');
*/

function devon_scale_range(object, min, max, prefix, sufix, infinity, predifinedMin, predifinedMax) {
    if (typeof object == 'undefined')
        return false;
    if (typeof min == 'undefined' || min=='')
        var min = 0;
    if (typeof max == 'undefined' || max=='')
        return false;
    if (typeof prefix == 'undefined' || prefix=='')
        var prefix = '';
    if (typeof sufix == 'undefined' || sufix=='')
        var sufix = '';
    if (typeof infinity === 'infinity' || infinity=='')
        var infinity = true;
    if(infinity == "false") infinity = false;
    
    var $ = jQuery;
    if (typeof predifinedMin == 'undefined' || predifinedMin ==''){
        var predifinedMin = min || 0;
        predifinedMin-=10;
    }
    if (typeof predifinedMax == 'undefined' || predifinedMax==''){
        var predifinedMax = max || 100000;
        predifinedMax+=10;
    }
    
    /* errors */
    
    if(!$(object + ' .value-min').length || !$(object + ' .value-max').length) {
        console.log('Scale range: missing input min or max');
        return false;
    }
    
    var r = 0;
    if(infinity) {
        r = 10;
    }
    
    if ($(object + ' .nonlinear').length) {
        var nonLinearSlider = document.querySelector(object + ' .nonlinear');
        noUiSlider.create(nonLinearSlider, {
            connect: true,
            behaviour: 'tap',
            start: [predifinedMin, predifinedMax],
            range: {
                'min': [parseInt(min)-r],
                'max': [parseInt(max)+r]
            }
        });

        var nodes = [
            document.querySelector(object + ' .nonlinear-min'), // 0
            document.querySelector(object + ' .nonlinear-max')  // 1
        ];
        
        var inputs = [
            document.querySelector(object + ' .value-min'), // 0
            document.querySelector(object + ' .value-max')  // 1
        ];

        // Display the slider value and how far the handle moved
        nonLinearSlider.noUiSlider.on('update', function (values, handle, unencoded, isTap, positions) {

            if(parseInt(values[handle]) > max && infinity){
                nodes[handle].innerHTML = prefix + nexos_number_format(parseInt(max)) + sufix+'+';
            }
            else if(parseInt(values[handle]) < min && infinity){
                nodes[handle].innerHTML = prefix +nexos_number_format(parseInt(min)) + sufix+'-';
            }
            else
                nodes[handle].innerHTML = prefix + nexos_number_format(parseInt(values[handle])) + sufix;
            
            if(parseInt(values[handle]) > max && infinity){
                inputs[handle].value = '';
            }
            else if(parseInt(values[handle]) < min && infinity){
                inputs[handle].value = '';
            }
            else
                inputs[handle].value = parseInt(values[handle]).toFixed();
            
         //   $(object + ' .value-min, '+object + ' .value-max').trigger('change')
        });
    }
}

function nexos_number_format(number, format) {
    if(typeof format == 'undefined') var  format = true;
    
    if(format)
        return new Intl.NumberFormat('de-DE').format(number.toFixed());
    else
        return number.toFixed();
        
}

function open_location() {
    var $ = jQuery;
    
    /* listing open popup */
    
    $('[data-listingid]').hover(function(e){
        if(typeof markers =='undefined') return;
        var listing_id = $(this).attr('data-listingid');
        
        if(!listing_id) return;
        if(typeof markers[listing_id] =='undefined') return;
        
        if(typeof google !== 'undefined'){ 
            var m = markers[listing_id].clickMarker();;
            e.preventDefault();
            return false;
            
        } else if(typeof L !== 'undefined'){
            if(typeof clusters =='undefined') return;
            var m = markers[listing_id].openPopup();;
            clusters.zoomToShowLayer(m, function() {
                m.openPopup();
            });
            e.preventDefault();
            return false;
        }
        
    })
    
    /* end listing open popup */
}


var media_uploader = null;

function open_media_uploader_multiple_images()
{
	
	
    media_uploader = wp.media({
        frame:    "post", 
        state:    "insert", 
        multiple: true		
    });

    media_uploader.on("insert", function(){

        var length = media_uploader.state().get("selection").length;
        var images = media_uploader.state().get("selection").models

        for(var iii = 0; iii < length; iii++)
        {
            var image_id = images[iii].changed.id;
            var attributes_id = images[iii].attributes.id;
            var image_url = images[iii].changed.url;
            var image_caption = images[iii].changed.caption;
            var image_title = images[iii].changed.title;
			console.log(images);
			if(image_id==null){
			image_id=attributes_id;
			}
			//alert(image_id);
			var post_id = $('.devon-img-options').attr("data-post_id");
			$.ajax({
					type: "POST",
					url: ajaxurl,
					data: {
						'action': 'assign-attachments',
						'image_id': image_id,
						'post_id': jQuery('.listing-main').attr('data-post_id'), 
					},
					success: function(response) {
						//alert(response);
						$(response).appendTo('.form-group.devon-image-section');
					}
					
			});
        }
    });

    media_uploader.open();
}
//filter reset
jQuery(".filter-reset").on('click',function () {
	$("#filter-models").find('input:text, input:password, input:file, select, textarea').val('');
    $("#filter-models").find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
	$('.filter-item').removeClass('selected');
	$('.f-category').html('category');
	$('.f-city').html('city');
	$('.f-price').html('price');
	$('.f-age').html('age');
	$('.f-weight').html('weight');
	$('.f-hair').html('hair');
	$('.f-venue').html('venue');
	$('.f-service').html('service');
	$('.cus-drop').first().trigger('change');
});