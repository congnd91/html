/**
 * @author Sauzer
 */

var headerCategories;
var searchData;
// 0 - no test mode, 1 - test mode
$testmode = 0;
// 0 - no admin mode, 1 - admin mode
var $admin;
if (typeof $isadmin !== 'undefined') {
    $admin = $isadmin;
} else {
    $admin = 0;
}

// json file for header fields
$dataHeader = "";

consolelog("===ADMIN MODE===");

/*
 * 
 * 
 * Log session
 * 
 * 
 */
// json log message;
var $logMessage = "";

/*
 * $logenabled - if 0, log is disabled, if 1, log is enabled
 */
var $logenabled;
if (typeof $userlog_active !== 'undefined') {
    $logenabled = $userlog_active;
} else {
    $logenabled = 0;
}

/*
 * $logcount - order to log
 */
$logcount = 0;
/*
 * $logidentifier - random number that identify the post session
 */
$logidentifier = createRandomLogIdentifier();
/*
 * $logdetails - 0, no log details are passed, 1 log details are passed
 */
var $logdetails;
if (typeof $userlog_details !== 'undefined') {
    $logdetails = $userlog_details;
} else {
    $logdetails = 0;
}

/*
 * $clientIP - Get client ip by json post
 */
var $clientIP;
if (typeof xclient_ip !== 'undefined') {
    $clientIP = xclient_ip;
} else {
    $clientIP = '127.0.0.1';
}

/*
 * $logfile -0 - write to file, 1 write to db
 */
var $logfile;
if (typeof xclient_ip !== 'undefined') {
    $logfile = $userlog_dbfile;
} else {
    $logfile = 0;
}
/*
 * $file - File where log come $message - Message to log $page - Page of message
 * $details - Analytics data to log if parameter $logdetails is set to 1 $area -
 * part of function relative to analytics data
 */


/*
 * if ($logenabled==1){ $.getJSON("http://jsonip.com?callback=?", function
 * (data) { //alert("Your ip: " + data.ip); $clientIP=data.ip; }); }
 */
function writelog($file, $message, $page, $details, $area) {
    $continue = false;
    if ($logenabled == 1) {

        $detailToPass = "";
        try {
            if ($area == undefined) {
                $area = "";
            }
            if (typeof $details == 'object') {
                /*	alert($area);
	alert($details);*/
                $detailToPass = JSON.stringify($details);
            } else {
                $detailToPass = JSON.stringify($details);
            }


            if ($userlog_all == 0) {
                $continue = true;
            } else {
                $searchuser = '' + xiduser + '';
                if ($.inArray("ALL", $userslog_pages) > -1) {
                    $continue = true;
                } else if ($.inArray($page, $userslog_pages) > -1) {
                    $continue = true;
                } else if ($.inArray($searchuser, $userslog_selected) > -1) {
                    $continue = true;
                }
            }

            if ($continue == true) {
                $logMessage = $message;
                $logcount = $logcount + 1;
                $.post("/writelog.php?clientip=" + $clientIP + "&logfile=" + $logfile + "&identifier=" + $logidentifier + "&file=" + $file + "&page=" + $page + "&userid=" + xiduser + "&logcount=" + $logcount + "&area=" + $area, {
                        'json': JSON.stringify($logMessage),
                        'json2': $detailToPass
                    },
                    function (data) {

                        // $result=(jQuery.parseJSON(data).returnjson);//
                        // $.parseJSON(data.returnjson);

                    }, "text"
                );
            }
        } catch (err) {
            consolelog(err);
        }
    }
}


function createRandomLogIdentifier() {
    var milliseconds = (new Date).getTime();
    var randomnumber = milliseconds + Math.floor(Math.random() * 10);

    return randomnumber;
}





/*
 * Log session end
 */

function showResponsetest(data, statusText) {

    if (statusText == 'success') {
        if (data) {

            $testmode = data.testmode;
            // $admin=data.admin;
        }
    }

}

function consolelog($message) {
    if ($admin == 1) {
        console.log($message);
    }
}
/*
 * $.getJSON("https://s3.amazonaws.com/cgcdata/Service/testmode/testmode.json",
 * function(data) { $testmode=data.testmode; $admin=data.admin; });
 */

$(document).ready(function () {
    urlPath = "";
    if ((window.location.pathname.indexOf(".html") > -1)) {
        urlPath = "/modules/browsepage/js/browsepage-modal.json";
    } else {
        urlPath = "/modules/header/php/searchContent.php";
    }

    var storageData = JSON.parse(sessionStorage.getItem('searchData'));

    if (storageData !== null && Math.floor(Date.now() / 1000) < storageData.expireAt) {
        searchData = storageData.data;
    } else {
        $.ajax({
            dataType: "json",
            url: urlPath,
            async: true,
            success: function (data) {
                // filtersData = data[0].filters;
                searchData = data.browsepage;
                var temp = {
                    expireAt: Math.floor(Date.now() / 1000) + 10 * 60, // 10 minutes
                    data: searchData
                };
                sessionStorage.setItem('searchData', JSON.stringify(temp));
            },
            error: function (data) {
                //    alert(data);
            }

        });
    }



    $('html').click(function () {
        $("#search-result-container").hide();
        $(".display_box_hover").removeClass("display_box_hover");
        window.displayBoxIndex = -1;
    });

    $('#search-result-container').click(function (event) {
        event.stopPropagation();
    });

    $("#headerLogoff").click(function () {
        sessionStorage.removeItem('browsepageData');
    })

});

$(window).load(function (e) {
    $.ajax({
        dataType: "json",
        url: "/config/config.json",
        success: showResponsetest,
        async: false
    });
    if ($testmode == 0) {
        var storageData = JSON.parse(sessionStorage.getItem('browseMenuData'));
        if (storageData !== null && Math.floor(Date.now() / 1000) < storageData.expireAt) {
            showResponseHeader(storageData.data, 'success');
        } else {

            $.ajax({
                type: 'POST',
                url: '/modules/header/php/get-header-info.php',
                success: showResponseHeader,
                dataType: 'json',
                async: false
            });
        }
    }
    headerBrowseStripMainContainer = $("#h-courses-container");
    headerBrowseStripContainer = $("#h-courses-container .container").clone();
    headerBrowseStripTitle = $("#h-collapse-area-title").clone();
    headerBrowseStriplistOfCourses = $("#h-courses-list").clone(); // the <ul>
    headerBrowseStripcourseItem = $(".h-thumbnail-lesson-container").first().clone();

    $("#cgc-general-search-button").click(function () {
        searchFilterBrowsePage();
    });

    $('#search-button').click(function () {

        var searchBoxContainer = $('#search-box-container');
        var display = searchBoxContainer.css('display');
        if (display === 'none') {
            searchBoxContainer.slideDown(500);
        } else {
            searchBoxContainer.slideUp(500);
        }
    });

    $("#search-box-container #search-box").keyup(function (e) {
        var selectedItem = $(".display_box_hover");
        // console.log(selectedItem);
        searchInput = $(this);
        str = searchInput.val().toLowerCase();
        if (str.length > 2) {
            $("#search-result-container").css('width', ($(this).outerWidth()) + 'px');
            $("#search-result-container").show();
            var contentList = "";
            var authorList = [];
            $.each(searchData, function (index, item) {
                if (
                    isEmpty(item.title).toLowerCase().search(str) != -1 ||
                    isEmpty(item.author).toLowerCase().search(str) != -1 ||
                    isEmpty(item.description).toLowerCase().search(str) != -1 ||
                    isEmpty(item.searchTags).toLowerCase().search(str) != -1 ||
                    (Array.isArray(item.software) && item.software.join(',').toLowerCase().search(str) != -1)
                ) {
                    contentList += "<li><a class='display_box' href='" + item.url + "'>" + item.title + "</a></li>";
                    var authorStr = "<li><a class='display_box' href='" + item.authorProfileUrl + "'>" + item.author + "</li>";
                    if ($.inArray(authorStr, authorList) == -1) {
                        authorList.push(authorStr);
                    }

                }
            });
            if (contentList == "") {
                $("#search-content-section").hide();
            } else {
                $("#search-content-section").show();
            }
            if (authorList.length > 0) {
                $("#search-authors-section").show();
            } else {
                $("#search-authors-section").hide();

            }

            $("#content-search-result").empty();
            $("#content-search-result").append(contentList);
            $("#authors-search-result").empty();
            var authListStr = "";
            $.each(authorList, function (index, auth) {
                authListStr += auth;

            });
            $("#authors-search-result").append(authListStr);
        } else {
            $("#search-result-container").hide();
        }

        if (e.keyCode == 40) {
            Navigate(1);
        }
        if (e.keyCode == 38) {
            Navigate(-1);
        }
        if (e.keyCode == 13) {
            _dcq.push(["track", "Searched", {
                searchString: $("#search-box-container #search-box").val()
            }]);
            var lnk;
            // console.log(selectedItem.length);
            if (selectedItem.length > 0) {
                lnk = selectedItem.first().attr("href");
                window.location.href = lnk;
            } else {
                searchFilterBrowsePage();
            }
        }

    });

    /*
     * $.get( "/testmode/testmode.json", function( data ) {
     * $testmode=data.testmode; $admin=data.admin; }, "json" );
     */

});

function searchFilterBrowsePage() {
    var srcString = $("#search-box-container #search-box").val();
    if ((window.location.pathname.indexOf(".html") > -1)) {
        window.location.href = "/modules/browsepage/html/browse-content-2.html?search=" + srcString;
    } else {
        window.location.href = "/browsepage.php?search=" + srcString;
    }
}

window.displayBoxIndex = -1;

var Navigate = function (diff) {
    displayBoxIndex += diff;
    var oBoxCollection = $(".display_box");
    if (displayBoxIndex >= oBoxCollection.length)
        displayBoxIndex = 0;
    if (displayBoxIndex < 0)
        displayBoxIndex = oBoxCollection.length - 1;
    var cssClass = "display_box_hover";
    oBoxCollection.removeClass(cssClass).eq(displayBoxIndex).addClass(cssClass);
};

function showResponseHeader(data, statusText) {

    if (statusText == 'success') {

        if (data.success == 'OK') { // alert('Class saved!');
            $dataHeader = data;
            // consolelog("HEADER MENU");
            // consolelog($dataHeader);

            populateLearnMenu();
            // populateAccountMenu();
            var temp = {
                expireAt: Math.floor(Date.now() / 1000) + 10 * 60, // 10 minutes
                data: data
            };
            sessionStorage.setItem('browseMenuData', JSON.stringify(temp));

        } else {

        }

    }

}



function showResponseinstructor(data, statusText) {

    if (statusText == 'success') {

        if (data.success == 'OK') { // alert('Class saved!');
            populateLearnMenu();
            // populateAccountMenu();
            headerBrowseStripMainContainer = $("#h-courses-container");
            headerBrowseStripContainer = $("#h-courses-container .container").clone();
            headerBrowseStripTitle = $("#h-collapse-area-title").clone();
            headerBrowseStriplistOfCourses = $("#h-courses-list").clone(); // the
            // <ul>
            headerBrowseStripcourseItem = $(".h-thumbnail-lesson-container").first().clone();

        } else {

        }

    }

}

function populateLearnMenu() {
    var categories;


    if ($testmode == 0) {
        try {
            categories = $dataHeader.categories;
        } catch (err) {

        }

    } else {
        $.getJSON("/modules/header/js/learn-menu.json", function (data) {
            categories = data.categories;
        });
    }

    var categoriesContainer = $('#menu-categories');
    var categoryFiltersContainer = $('#category-filters');
    var categoryItems = [],
        categoryFilters = [];
    $.each(categories, function (index, category) {
        var categoryItem = "<div class='col-sm-12 category-item' id='category-" + index + "'>" +
            "<a href='" + category.url + "'>" +
            "<img class='category-icon browse-all cdn-content' src='" + category.image + "'>" +
            "<span>" + category.title + "</span>" +
            "</a>" +
            "</div>";
        categoryItems.push(categoryItem);

        var subcategories = ["<li class='filter-name'>Subcategories</li>"];
        var counterSubcategories = 0;
        $.each(category.subcategories, function (index, subcategory) {
            if (counterSubcategories < 10) {
                var subcategoryItem = "<li>" +
                    "<a href='" + subcategory.url + "'>" + subcategory.title + "</a>" +
                    "</li>";
            }

            counterSubcategories++;

            subcategories.push(subcategoryItem);
        });
        subcategories.push(
            "<li>" +
            "<a class='see-all' href='" + category.url + "'>" +
            "See all " +
            "<i class='fa fa-angle-right' aria-hidden='true'></i>" +
            "</a>" +
            "</li>"
        );

        var authors = ["<li class='filter-name'>Authors</li>"];
        var counterAuthors = 0;
        $.each(category.authors, function (index, author) {
            if (counterAuthors < 10) {
                var authorItem = "<li>" +
                    "<a href='" + author.url + "'>" + author.firstName + " " + author.lastName + "</a>" +
                    "</li>";
            }
            counterAuthors++;

            authors.push(authorItem);
        });
        authors.push(
            "<li>" +
            "<a class='see-all' href='" + category.url + "'>" +
            "See all " +
            "<i class='fa fa-angle-right' aria-hidden='true'></i>" +
            "</a>" +
            "</li>"
        );

        var tools = ["<li class='filter-name'>Tools</li>"];
        var counterTools = 0;
        $.each(category.tools, function (index, tool) {
            if (counterTools < 10) {
                var toolItem = "<li>" +
                    "<a href='" + tool.url + "'>" + tool.software + "</a>" +
                    "</li>";
            }

            counterTools++;

            tools.push(toolItem);
        });
        tools.push(
            "<li>" +
            "<a class='see-all' href='" + category.url + "'>" +
            "See all " +
            "<i class='fa fa-angle-right' aria-hidden='true'></i>" +
            "</a>" +
            "</li>"
        );

        var template =
            "<div class='row hidden' data-category-filters='" + index + "'>" +
            "<div class='col-sm-12'>" +
            "<div class='row'>" +
            "<div class='col-sm-4'>" +
            "<ul>" +
            subcategories.join('') +
            "</ul>" +
            "</div>" +
            "<div class='col-sm-4'>" +
            "<ul>" +
            authors.join('') +
            "</ul>" +
            "</div>" +
            "<div class='col-sm-4'>" +
            "<ul>" +
            tools.join('') +
            "</ul>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";
        categoryFilters.push(template);
    });
    categoriesContainer.html(categoryItems);
    categoryFiltersContainer.html(categoryFilters);
    handleCategoryFilters();
}

function handleCategoryFilters() {
    var categories = $('.category-item');
    var categoryFilters = $('div[data-category-filters]');

    $.each(categories, function (index, category) {
        $(category).mouseenter(function (e) {
            $('#category-filters').show();
            $('.browse-menu-container').css('background-color', '#222');

            $(this).children('a').addClass('active');

            var data = $(this).attr('id').split('-');
            var id = data[1];
            $.each(categoryFilters, function (index, categoryFiltersBlock) {

                $(categoryFiltersBlock).mouseenter(function () {
                    var blockId = $(categoryFiltersBlock).attr('data-category-filters');
                    $('#category-' + blockId).children('a').addClass('active');
                });
                $(categoryFiltersBlock).mouseleave(function () {
                    var blockId = $(categoryFiltersBlock).attr('data-category-filters');
                    $('#category-' + blockId).children('a').removeClass('active');
                });
                $(categoryFiltersBlock).css('min-height', '650px');

                var blockId = $(categoryFiltersBlock).attr('data-category-filters');
                if (blockId === id) {
                    $(categoryFiltersBlock).removeClass('hidden');
                } else {
                    $(categoryFiltersBlock).addClass('hidden');
                }
            })
        });

        $(category).mouseleave(function () {
            $(this).children('a').removeClass('active');
        });
    });

    $('#browse-all-categories').mouseenter(function () {
        $('#category-filters').hide();
        $('.browse-menu-container').css('background-color', 'transparent');
        $(this).children('a').addClass('active');
    });
    $('#browse-all-categories').mouseleave(function () {
        $(this).children('a').removeClass('active');
    });

    $('#browse-only-bundles').mouseenter(function () {
        $('#category-filters').hide();
        $('.browse-menu-container').css('background-color', 'transparent');
        $(this).children('a').addClass('active');
    });

    $('#browse-only-bundles').mouseleave(function () {
        $(this).children('a').removeClass('active');
    });
    $('#browse-only-exclusive-content').mouseenter(function () {
        $('#category-filters').hide();
        $('.browse-menu-container').css('background-color', 'transparent');
        $(this).children('a').addClass('active');
    });

    $('#browse-only-exclusive-content').mouseleave(function () {
        $(this).children('a').removeClass('active');
    });



}

// populates the collapsable area that contains a list of courses. This space is
// used for learning, teaching as well as favorite videos and courses.
// the argument typeOfCourses can e the following:

// learning
// teaching
// favoriteVideos
// favoriteCourses


function populateMyCoursesSection(typeOfCourses) {
    var myCoursesData;
    if ($testmode == 0) {
        myCoursesData = $dataHeader;
    } else {
        $.getJSON("/modules/header/js/myCourses.json", function (cData) {
            myCoursesData = cData;
        });
    }
    // consolelog("MYCOURSES");
    // consolelog(myCoursesData);

    var coursesListData;
    // get data from the page
    sectionMainContainer = headerBrowseStripMainContainer;
    sectionContainer = headerBrowseStripContainer;
    sectionTitle = headerBrowseStripTitle;
    listOfCourses = headerBrowseStriplistOfCourses; // the <ul>
    courseItem = headerBrowseStripcourseItem;
    areaButtonsContainer = $("#h-buttons-container").clone();


    sectionMainContainer.empty();
    sectionContainer.empty();
    listOfCourses.empty();

    var emptyContainerMessage;
    if (typeOfCourses == "learning") {
        emptyContainerMessage = "There is no courses you are learning from.";
        coursesListData = myCoursesData.myCourses.learning;
        sectionTitle.html("What you are learning");

    } else if (typeOfCourses == 'teaching') {
        emptyContainerMessage = "You are currently not teaching any courses.";
        coursesListData = myCoursesData.myCourses.teaching;
        sectionTitle.html("Courses you are teaching");
    } else if (typeOfCourses == 'favoriteVideos') {
        emptyContainerMessage = "You don't have any favorite videos";
        coursesListData = myCoursesData.myCourses.favoriteVideos;
        sectionTitle.html("My favorite videos");

    } else if (typeOfCourses == 'favoriteCourses') {
        emptyContainerMessage = "You don't have any favorite courses";
        coursesListData = myCoursesData.myCourses.favoriteCourses;
        sectionTitle.html("My favorite Courses");

    }

    if (coursesListData.length == 0) {
        sectionTitle.html(emptyContainerMessage);

    }


    // put the static data

    sectionContainer.append(sectionTitle);

    // populate the list of thumbnails
    $.each(coursesListData, function (index, course) {
        courseItem.find("a").first().attr("href", course.url);
        courseItem.find(".h-lesson-thumb").first().attr("src", course.thumbnailPath);
        courseItem.find(".h-collapse-area-course-title").first().html(course.title);
        courseItem.find(".cgc-corner-ribbon").first().removeClass("tr-draft-ribbon");
        courseItem.find(".cgc-corner-ribbon").first().removeClass("tr-pending-ribbon");
        courseItem.find(".cgc-corner-ribbon").first().removeClass("tr-edited-ribbon");
        if (typeOfCourses == "teaching") // add the ribbon corner
        {
            if (course.status == "draft") {
                courseItem.find(".cgc-corner-ribbon").first().addClass("tr-draft-ribbon");
            }
            if (course.status == "pending") {
                courseItem.find(".cgc-corner-ribbon").first().addClass("tr-pending-ribbon");
            }
            if (course.status == "edited") {
                courseItem.find(".cgc-corner-ribbon").first().addClass("tr-edited-ribbon");
            }
        }

        listOfCourses.append(courseItem);

        listOfCourses.html(listOfCourses.html());
    });

    sectionContainer.append(listOfCourses);
    sectionContainer.append(areaButtonsContainer);
    sectionMainContainer.append(sectionContainer);

    sectionMainContainer.html(sectionMainContainer.html());


    if (typeOfCourses == "learning") {
        $('#view-all').attr("onclick", "javascript:window.location='/browsepage.php?type=L&iduser=" + xiduser + "'");
    } else if (typeOfCourses == 'teaching') {
        $('#view-all').attr("onclick", "javascript:window.location='/browsepage.php?type=T&author=" + xiduser + "'");
    } else if (typeOfCourses == 'favoriteVideos') {
        $('#view-all').attr("onclick", "javascript:window.location='/manage-favorites.php'");
    } else if (typeOfCourses == 'favoriteCourses') {
        $('#view-all').attr("onclick", "javascript:window.location='/manage-favorites.php'");
    }





    collapseMyCoursesContainer("show");
}

function collapseMyCoursesContainer(direction) {
    $("#h-courses-container").collapse(direction);
}


function populateAccountMenu() {
    menuList = $("#h-account-list");
    menuItem = menuList.find("li").first().clone();
    menuDivider = menuList.find(".divider").first().clone();
    menuSectionHeader = menuList.find(".nav-header").first().clone();

    menuList.empty();

    var amDataList;
    $.getJSON("/modules/header/js/account-menu.json", function (menuData) {
        amDataList = menuData.accountMenu;

        if ($testmode == 0) {
            amDataList = "Fabio questo e' per te";
        }

        // add sections
        $.each(amDataList, function (index, amData) {
            if (amData.sectionHeader != "") {
                menuSectionHeader.html(amData.sectionHeader);
                menuList.append(menuSectionHeader);
            }
            sectionItems = amData.items;
            // add items in the section
            $.each(sectionItems, function (index, item) {
                menuItem.html(item.itemText + "<a href");
                menuItem.attr("href", item.url);
                if (item.iconClass != "") {
                    menuItem.find("i").removeAttr("class");
                    menuItem.find("i").addClass("class", item.iconClass);
                }
                menuList.append(menuItem);

            });
            $("#h-account-list").html(menuList.html());
        });
    });

}

function removeFavoriteFromJson($val) {
    obj = $dataHeader.myCourses.favoriteVideos;
    for (var x in obj) {
        $tmpVal = obj[x].idfavorite;
        if ($tmpVal == $val) {
            obj.splice(x, 1);
        };
    }
    obj = $dataHeader.myCourses.favoriteCourses;


    for (var x in obj) {
        $tmpVal = obj[x].idfavorite;
        if ($tmpVal == $val) {
            obj.splice(x, 1);
        }; // delete obj[x];
    }
}

function removeLearningFromJson($val) {
    obj = $dataHeader.myCourses.learning;
    for (var x in obj) {
        $tmpVal = obj[x].idcourse;
        if ($tmpVal == $val) {
            obj.splice(x, 1);
        };
    }
    obj = $dataHeader.myCourses.learning;


    for (var x in obj) {
        $tmpVal = obj[x].idcourse;
        if ($tmpVal == $val) {
            obj.splice(x, 1);
        }; // delete obj[x];
    }
}

function addLearningToJson($val) {
    /*
     * obj=$lessonsList.lessons;//json var of browsebage var newobj=new
     * Object(); for( var x in obj) { $tmpVal=obj[x].id; if( $tmpVal == $val){
     * newobj.idcourse=obj[x].id; newobj.thumbnailPath=obj[x].thumbnailsPath;
     * newobj.title=obj[x].title; newobj.url="course/"+obj[x].urlname;
     * $dataHeader.myCourses.learning.push(newobj);//json var of header }; }
     */
}
// $val lesson ID
// $idfavorite favorite ID
// $type="BROWSEPAGE/COURSEDETAIL/VIDEOPAGE"
// $object object to pass
function addFavoriteCourseToJson($val, $idfavorite, $type, $object) {
    if ($type == "BROWSEPAGE") {
        getUpdateData($val);
        /*
         * obj=learningContentData;//json var of browsebage var newobj=new
         * Object(); for( var x in obj) { $tmpVal=obj[x].id; if( $tmpVal ==
         * $val){ newobj.idcourse=obj[x].id; newobj.idfavorite=$idfavorite;
         * newobj.thumbnailPath=obj[x].fullThumbnail;
         * newobj.title=obj[x].title; newobj.url=obj[x].url;
         * $dataHeader.myCourses.favoriteCourses.push(newobj);//json var of
         * header }; }
         */
    };

    /*
     * if ($type=="COURSEDETAIL"){ obj=$tempLessonJSON.lessons;//json var of
     * course detail var newobj=new Object();
     * 
     * newobj.idcourse=$val; newobj.idfavorite=$idfavorite;
     * newobj.thumbnailPath=$tempLessonJSON.images.iconurlbig;
     * newobj.title=$tempLessonJSON.title.title;
     * newobj.url=$tempLessonJSON.title.urlname;
     * $dataHeader.myCourses.favoriteCourses.push(newobj);//json var of
     * header };
     * 
     * if ($type=="VIDEOPAGE"){ obj=$object; var newobj=new Object();
     * 
     * newobj.idcourse=obj.idvideo; newobj.idfavorite=$idfavorite;
     * newobj.thumbnailPath=obj.thumbnailPath; newobj.title=obj.title;
     * newobj.url=obj.urlname;
     * $dataHeader.myCourses.favoriteVideos.push(newobj);//json var of
     * header };
     */


}


function openwin($url) {
    window.open($url, "Video Title Goes Here", "width=800,height=450,menubar=0,scrollbars=0,toolbar=0;left=100");
}


function getWorkshops($iduser) {
    $.post("/modules/workshops/php/getWorkshopsList.php?iduser=" + $iduser,
        function (data) {
            // alert(data);
            if (data != "") {
                $('#my-workshops-container').removeClass("hidden");
                $('#my-workshops-container').html('');
                $('#my-workshops-container').html(jQuery.parseJSON(data));

            }

        }, "text"
    );
}

function isEmpty($str) {
    if ($str != undefined) {
        return $str;
    } else {
        return "";
    }
}


function drip(parameter, value, value2, value3) {
    param = "";
    if (value2 != undefined) {
        param += "&value2=" + value2;
    }
    if (value3 != undefined) {
        param += "&value3=" + value3;
    }
    /*$.ajax({
    	  type: 'POST',
    	  url: '/modules/drip/drip.php?parameter='+parameter+'&value='+value + param,		  
    	  success: function(data) {
    		  console.log(data);
    		  _dcq.push(data);
    	  },
    	  dataType: 'json',
    	  async:true
    	});*/
}

function paymentExecuted(operator, transaction, type) {
    if (type == "transactionId") {

    }
    if (type == "VIC") {

    }
    // drip('PurchaseContent', $Courses['course']);
    // drip('PurchaseContentIdentify', $Courses['course']);
}


function setFocusToTextBox() {
    setTimeout(function () {
        $("#search-box").focus();
    }, 500);

}
