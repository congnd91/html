<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package mazpage
*/
$mazpage_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>

    <section class="grid-news">
        <div class="grid-news-inner">
            <div class="gn-col">
                <article class="gn-item">
                    <div class="post-meta">
                        <span class="post-category">
                                    <a href="category.html">Tech</a>
                                </span>
                    </div>
                    <a href="single-fullwidth-three-column.html">
                                <img alt="" src="images/g1.jpg" />
                                <div class="gn-caption">
                                    <p>The iPhone X is the Beginning of the End </p>
                                </div>
                            </a>
                </article>
            </div>
            <div class="gn-col gn-col2">
                <div class="gn-row">
                    <article class="gn-item">
                        <div class="post-meta">
                            <span class="post-category">
                                        <a href="category-special.html">Mobile</a>
                                    </span>
                        </div>
                        <a href="single.html">
                                    <img alt="" src="images/2.jpg" />
                                    <div class="gn-caption">
                                        <p>What's new in macOS High Sierra</p>
                                    </div>
                                </a>
                    </article>
                </div>
                <div class="gn-row gn-row2">
                    <article class="gn-item">
                        <div class="post-meta">
                            <span class="post-category">
                                        <a href="category-grid-fullwidth.html">Desktop</a>
                                    </span>
                        </div>
                        <a href="single-fullwidth-three-column.html">
                                    <img alt="" src="images/3.jpg" />
                                    <div class="gn-caption">
                                        <p>Elon Musk is aiming to land 2 cargo ships on Mars in 2022</p>
                                    </div>
                                </a>
                    </article>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!--cols-->
    <div class="cols">
        <!--colleft-->
        <div class="colleft">
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="category.html">COMPUTING</a></h2>
                </div>
                <div class="row row-fix">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
                        <article class="news-item-big">
                            <div class="post-thumb">
                                <a href="single.html">
                                            <img alt="" src="images/2.jpg">
                                        </a>
                            </div>
                            <h3 class="post-title">
                                <a href="single.html">What's new in macOS High Sierra </a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-date">
                                            <i class="ion-ios-clock">
                                            </i>
                                            02/10/2017
                                        </span>
                                <span class="post-author">
                                            <i class="ion-person"></i>
                                            <a href="#">
                                                Admin
                                            </a>
                                        </span>
                            </div>
                            <div class="post-des">
                                <p>Proactively e-enable interoperable architectures and best-of-breed partnerships. Compellingly network backend methods of empowerment whereas bleeding-edge models.</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
                        <ul class="list-news list-news-right">
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/11.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Watch out: That USB stick in your mailbox might be infected</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/8.jpg">
                                            </a>
                                </div>
                                <h3>
                                    <a href="single.html">Netflix Speeds Jumped 51% This Year</a>
                                </h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/9.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/10.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-caption">
                    <h2><a href="category-special.html">TECH</a></h2>
                </div>
                <div class="owl-category-wrap">
                    <div class="owl-carousel  owl-category">
                        <div>
                            <article>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <span class="post-format"> <i class="fa fa-camera"></i></span>
                                                <img alt="" src="images/3.jpg">
                                            </a>
                                </div>
                                <div class="owl-category-caption">
                                    <h3 class="post-title">
                                        <a href="single.html">Elon Musk is aiming to land 2 cargo ships on Mars in 2022</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="post-date">
                                                    <i class="ion-ios-clock">
                                                    </i>
                                                    02/10/2017
                                                </span>
                                        <span class="post-author">
                                                    <i class="ion-person"></i>
                                                    <a href="#">
                                                        Admin
                                                    </a>
                                                </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/2.jpg">
                                            </a>
                                </div>
                                <div class="owl-category-caption">
                                    <h3 class="post-title">
                                        <a href="single.html">What's new in macOS High Sierra</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="post-date">
                                                    <i class="ion-ios-clock">
                                                    </i>
                                                    02/10/2017
                                                </span>
                                        <span class="post-author">
                                                    <i class="ion-person"></i>
                                                    <a href="#">
                                                        Admin
                                                    </a>
                                                </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <span class="post-format"> <i class="fa fa-camera"></i></span>
                                                <img alt="" src="images/4.jpg">
                                            </a>
                                </div>
                                <div class="owl-category-caption">
                                    <h3 class="post-title">
                                        <a href="single.html">7 essential lessons from agency marketing to startup growth</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="post-date">
                                                    <i class="ion-ios-clock">
                                                    </i>
                                                    02/10/2017
                                                </span>
                                        <span class="post-author">
                                                    <i class="ion-person"></i>
                                                    <a href="#">
                                                        Super User
                                                    </a>
                                                </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <!--box-->
            <div class="row row-fix">
                <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
                    <div class="box">
                        <div class="box-caption">
                            <h2><a href="category.html">MOBILE</a></h2>
                        </div>
                        <article class="news-item-big">
                            <div class="post-thumb">
                                <a href="single.html">
                                            <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                            <img alt="" src="images/1.jpg">
                                        </a>
                            </div>
                            <h3 class="post-title">
                                <a href="single.html">The iPhone X is the Beginning of the End for Phones</a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-date">
                                            <i class="ion-ios-clock">
                                            </i>
                                            02/10/2017
                                        </span>
                                <span class="post-author">
                                            <i class="ion-person"></i>
                                            <a href="#">
                                                Super User
                                            </a>
                                        </span>
                            </div>
                            <div class="post-des">
                                <p>Proactively e-enable interoperable architectures and best-of-breed partnerships. Compellingly network backend methods of empowerment whereas bleeding-edge models.</p>
                            </div>
                        </article>
                        <ul class="list-news">
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/8.jpg">
                                            </a>
                                </div>
                                <h3>
                                    <a href="single.html">Netflix Speeds Jumped 51% This Year</a>
                                </h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/9.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/10.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/11.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Watch out: That USB stick in your mailbox might be infected</a></h3>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
                    <div class="box">
                        <div class="box-caption">
                            <h2><a href="category-grid.html">COMPUTING</a></h2>
                        </div>
                        <article class="news-item-big">
                            <div class="post-thumb">
                                <a href="single.html">
                                            <img alt="" src="images/2.jpg">
                                        </a>
                            </div>
                            <h3 class="post-title">
                                <a href="single.html">Do you have what it takes to age like a true expert?</a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-date">
                                            <i class="ion-ios-clock">
                                            </i>
                                            02/10/2017
                                        </span>
                                <span class="post-author">
                                            <i class="ion-person"></i>
                                            <a href="#">
                                                Super User
                                            </a>
                                        </span>
                            </div>
                            <div class="post-des">
                                <p>Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque...</p>
                            </div>
                        </article>
                        <ul class="list-news">
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/11.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Watch out: That USB stick in your mailbox might be infected</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/8.jpg">
                                            </a>
                                </div>
                                <h3>
                                    <a href="single.html">Netflix Speeds Jumped 51% This Year</a>
                                </h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/9.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/10.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="category.html">Business</a></h2>
                </div>
                <div class="row row-fix">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
                        <article class="news-item-big">
                            <div class="post-thumb">
                                <a href="single.html">
                                            <img alt="" src="images/4.jpg">
                                        </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
                        <div>
                            <h3 class="post-title">
                                <a href="single.html">7 essential lessons from agency marketing to startup growth</a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-date">
                                            <i class="ion-ios-clock">
                                            </i>
                                            02/10/2017
                                        </span>
                                <span class="post-author">
                                            <i class="ion-person"></i>
                                            <a href="#">
                                                Admin
                                            </a>
                                        </span>
                            </div>
                            <div class="post-des">
                                <p>Proactively e-enable interoperable architectures and best-of-breed partnerships. Compellingly network backend methods of empowerment whereas bleeding-edge models.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-news list-news-two">
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/11.jpg">
                                    </a>
                        </div>
                        <h3><a href="single.html">Watch out: That USB stick in your mailbox might be infected</a></h3>
                    </li>
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/8.jpg">
                                    </a>
                        </div>
                        <h3>
                            <a href="single.html">Netflix Speeds Jumped 51% This Year</a>
                        </h3>
                    </li>
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/9.jpg">
                                    </a>
                        </div>
                        <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                    </li>
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/10.jpg">
                                    </a>
                        </div>
                        <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                    </li>
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/9.jpg">
                                    </a>
                        </div>
                        <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                    </li>
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/10.jpg">
                                    </a>
                        </div>
                        <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="category.html">WORLD</a></h2>
                </div>
                <div class="grid-outer">
                    <div class="grid">
                        <div class="grid-item">
                            <article class="news-item-big">
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/1.jpg">
                                            </a>
                                </div>
                                <h3 class="post-title">
                                    <a href="single.html">The iPhone X is the Beginning of the End for Phones</a>
                                </h3>
                                <div class="post-meta">
                                    <span class="post-date">
                                                <i class="ion-ios-clock">
                                                </i>
                                                02/10/2017
                                            </span>
                                    <span class="post-author">
                                                <i class="ion-person"></i>
                                                <a href="#">
                                                    Super User
                                                </a>
                                            </span>
                                </div>
                                <div class="post-des">
                                    <p>Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque...</p>
                                </div>
                            </article>
                        </div>
                        <div class="grid-item">
                            <article class="news-item-big">
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                                <img alt="" src="images/4.jpg">
                                            </a>
                                </div>
                                <h3 class="post-title">
                                    <a href="single.html">7 essential lessons from agency marketing to startup growth</a>
                                </h3>
                                <div class="post-meta">
                                    <span class="post-date">
                                                <i class="ion-ios-clock">
                                                </i>
                                                02/10/2017
                                            </span>
                                    <span class="post-author">
                                                <i class="ion-person"></i>
                                                <a href="#">
                                                    Admin
                                                </a>
                                            </span>
                                </div>
                                <div class="post-des">
                                    <p>Proactively e-enable interoperable architectures and best-of-breed partnerships. Compellingly network backend methods of empowerment whereas bleeding-edge models.</p>
                                </div>
                            </article>
                        </div>
                        <div class="grid-item">
                            <article class="news-item-big">
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/3.jpg">
                                            </a>
                                </div>
                                <h3 class="post-title">
                                    <a href="single.html">Elon Musk is aiming to land 2 cargo ships on Mars in 2022</a>
                                </h3>
                                <div class="post-meta">
                                    <span class="post-date">
                                                <i class="ion-ios-clock">
                                                </i>
                                                02/10/2017
                                            </span>
                                    <span class="post-author">
                                                <i class="ion-person"></i>
                                                <a href="#">
                                                    Admin
                                                </a>
                                            </span>
                                </div>
                                <div class="post-des">
                                    <p>Proactively e-enable interoperable architectures and best-of-breed partnerships. Compellingly network backend methods of empowerment whereas bleeding-edge models.</p>
                                </div>
                            </article>
                        </div>
                        <div class="grid-item">
                            <article class="news-item-big">
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/5.jpg">
                                            </a>
                                </div>
                                <h3 class="post-title">
                                    <a href="single.html">400 million machines are now running Windows 10</a>
                                </h3>
                                <div class="post-meta">
                                    <span class="post-date">
                                                <i class="ion-ios-clock">
                                                </i>
                                                02/10/2017
                                            </span>
                                    <span class="post-author">
                                                <i class="ion-person"></i>
                                                <a href="#">
                                                    Super User
                                                </a>
                                            </span>
                                </div>
                                <div class="post-des">
                                    <p>Proactively e-enable interoperable architectures and best-of-breed partnerships. Compellingly network backend methods of empowerment whereas bleeding-edge models.</p>
                                </div>
                            </article>
                        </div>
                        <div class="grid-item">
                            <article class="news-item-big">
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/7.jpg">
                                            </a>
                                </div>
                                <h3 class="post-title">
                                    <a href="single.html">Plunging desktop demand could mean computer bargains</a>
                                </h3>
                                <div class="post-meta">
                                    <span class="post-date">
                                                <i class="ion-ios-clock">
                                                </i>
                                                02/10/2017
                                            </span>
                                    <span class="post-author">
                                                <i class="ion-person"></i>
                                                <a href="#">
                                                    Super User
                                                </a>
                                            </span>
                                </div>
                                <div class="post-des">
                                    <p>Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque...</p>
                                </div>
                            </article>
                        </div>
                        <div class="grid-item">
                            <article class="news-item-big">
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <span class="post-format"> <i class="fa fa-music"></i></span>
                                                <img alt="" src="images/6.jpg">
                                            </a>
                                </div>
                                <h3 class="post-title">
                                    <a href="single.html">The Echo Spot is Amazon’s way of getting you comfortable in bedroom</a>
                                </h3>
                                <div class="post-meta">
                                    <span class="post-date">
                                                <i class="ion-ios-clock">
                                                </i>
                                                02/10/2017
                                            </span>
                                    <span class="post-author">
                                                <i class="ion-person"></i>
                                                <a href="#">
                                                    Admin
                                                </a>
                                            </span>
                                </div>
                                <div class="post-des">
                                    <p>Proactively e-enable interoperable architectures and best-of-breed partnerships. Compellingly network backend methods of empowerment whereas bleeding-edge models.</p>
                                </div>
                            </article>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--colright-->
        <div class="colright">
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="#">Social Media</a></h2>
                </div>
                <div class="box-social">
                    <div class="social-network">
                        <div class="sn-row">
                            <div class="sn-col">
                                <div class="sn-item">
                                    <div class="sn-icon">
                                        <i class="fa fa-facebook-f"></i>
                                    </div>
                                    <p>28.3K</p>
                                    <span>FANS</span>
                                </div>
                            </div>
                            <div class="sn-col">
                                <div class="sn-item twitter">
                                    <div class="sn-icon">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                    <p>18.5K</p>
                                    <span>FOLLOWERS</span>
                                </div>
                            </div>
                            <div class="sn-col">
                                <div class="sn-item pinterest">
                                    <div class="sn-icon">
                                        <i class="fa fa-pinterest"></i>
                                    </div>
                                    <p>18.5K</p>
                                    <span>PIN IT</span>
                                </div>
                            </div>
                            <div class="sn-col">
                                <div class="sn-item youtube">
                                    <div class="sn-icon">
                                        <i class="fa fa-youtube"></i>
                                    </div>
                                    <p>651K</p>
                                    <span>SUBSCRIBE</span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="#">SPECIAL NEWS</a></h2>
                </div>
                <div class="box-special">
                    <div class="owl-special-wrap">
                        <div class="owl-carousel owl-special">
                            <div>
                                <article class="news-item-big">
                                    <div class="post-thumb">
                                        <a href="single.html">
                                                    <img alt="" src="images/2.jpg">
                                                </a>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="single.html">What's new in macOS High Sierra</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="post-date">
                                                    <i class="ion-ios-clock">
                                                    </i>
                                                    02/10/2017
                                                </span>
                                        <span class="post-author">
                                                    <i class="ion-person"></i>
                                                    <a href="#">
                                                        Admin
                                                    </a>
                                                </span>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article class="news-item-big">
                                    <div class="post-thumb">
                                        <a href="single.html">
                                                    <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                                    <img alt="" src="images/1.jpg">
                                                </a>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="single.html">The iPhone X is the Beginning of the End for Phones</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="post-date">
                                                    <i class="ion-ios-clock">
                                                    </i>
                                                    02/10/2017
                                                </span>
                                        <span class="post-author">
                                                    <i class="ion-person"></i>
                                                    <a href="#">
                                                        Admin
                                                    </a>
                                                </span>
                                    </div>
                                </article>
                            </div>
                            <div>
                                <article class="news-item-big">
                                    <div class="post-thumb">
                                        <a href="single.html">
                                                    <img alt="" src="images/4.jpg">
                                                </a>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="single.html">7 essential lessons from agency marketing to startup growth</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="post-date">
                                                    <i class="ion-ios-clock">
                                                    </i>
                                                    02/10/2017
                                                </span>
                                        <span class="post-author">
                                                    <i class="ion-person"></i>
                                                    <a href="#">
                                                        Admin
                                                    </a>
                                                </span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="#">POPURLAR NEWS</a></h2>
                </div>
                <ul class="list-news list-news-right list-news-meta">
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/11.jpg">
                                    </a>
                        </div>
                        <h3><a href="single.html">Watch out: That USB stick in your mailbox might be infected </a></h3>
                        <div class="post-meta">
                            <span class="post-date">
                                        <i class="ion-ios-clock">
                                        </i>
                                        02/10/2017
                                    </span>
                            <span class="post-category">
                                        <i class="ion-folder"></i>
                                        <a href="#">
                                            Computing
                                        </a>
                                    </span>
                        </div>
                    </li>
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/8.jpg">
                                    </a>
                        </div>
                        <h3>
                            <a href="single.html">Netflix Speeds Jumped 51% This Year</a>
                        </h3>
                        <div class="post-meta">
                            <span class="post-date">
                                        <i class="ion-ios-clock">
                                        </i>
                                        02/10/2017
                                    </span>
                            <span class="post-category">
                                        <i class="ion-folder"></i>
                                        <a href="#">
                                            Mobile
                                        </a>
                                    </span>
                        </div>
                    </li>
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/9.jpg">
                                    </a>
                        </div>
                        <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                        <div class="post-meta">
                            <span class="post-date">
                                        <i class="ion-ios-clock">
                                        </i>
                                        02/10/2017
                                    </span>
                            <span class="post-category">
                                        <i class="ion-folder"></i>
                                        <a href="#">
                                            Business
                                        </a>
                                    </span>
                        </div>
                    </li>
                    <li>
                        <div class="post-thumb">
                            <a href="single.html">
                                        <img alt="" src="images/10.jpg">
                                    </a>
                        </div>
                        <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                        <div class="post-meta">
                            <span class="post-date">
                                        <i class="ion-ios-clock">
                                        </i>
                                        02/10/2017
                                    </span>
                            <span class="post-category">
                                        <i class="ion-folder"></i>
                                        <a href="#">
                                            Mobile
                                        </a>
                                    </span>
                        </div>
                    </li>
                </ul>
            </div>
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="#">FOLLOW ME</a></h2>
                </div>
                <div class="box-twitter">
                    <a class="twitter-timeline" href="https://twitter.com/ahmadworks" data-width="300" data-height="400" data-chrome="noscrollbar nofooter noborders noheader">Tweets by ahmadworks</a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="#">TAG CLOUD</a></h2>
                </div>
                <div class="box-tag">
                    <div class="tagcloud">
                        <a href="#">iPhone 8</a>
                        <a href="#">Camera</a>
                        <a href="#">Full HD</a>
                        <a href="#">Mobile</a>
                        <a href="#">Mac OS</a>
                        <a href="#">Greeky</a>
                        <a href="#">CizThemes</a>
                        <a href="#">Template</a>
                        <a href="#">WONDERFUL </a>
                        <a href="#">WORLD</a>
                        <a href="#">iPhone 8</a>
                        <a href="#">Camera</a>
                        <a href="#">Full HD</a>
                        <a href="#">Mobile</a>
                        <a href="#">Mac OS</a>
                        <a href="#">Greeky</a>
                        <a href="#">CizThemes</a>
                    </div>
                </div>
            </div>
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="#">TOP REVIEW</a></h2>
                </div>
                <div class="box-top-review">
                    <div class="owl-top-review-wrap">
                        <div class="owl-carousel  owl-top-review">
                            <div>
                                <div class="top-review-item">
                                    <span> 1 Star</span>
                                    <div class="process-item">
                                        <div style="width:30%"></div>
                                    </div>
                                    <span> 2 Star</span>
                                    <div class="process-item">
                                        <div style="width:40%"></div>
                                    </div>
                                    <span> 3 Star</span>
                                    <div class="process-item">
                                        <div style="width:45%"></div>
                                    </div>
                                    <span> 4 Star</span>
                                    <div class="process-item">
                                        <div style="width:85%"></div>
                                    </div>
                                    <span> 5 Star</span>
                                    <div class="process-item">
                                        <div style="width:60%"></div>
                                    </div>
                                    <article>
                                        <div class="post-thumb">
                                            <a href="single.html">
                                                        <span class="post-format"> <i class="fa fa-camera"></i></span>
                                                        <img alt="" src="images/1.jpg">
                                                    </a>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="single.html">The iPhone X is the Beginning of the End for Phones</a>
                                        </h3>
                                    </article>
                                </div>
                            </div>
                            <div>
                                <div class="top-review-item">
                                    <span> 1 Star</span>
                                    <div class="process-item">
                                        <div style="width:30%"></div>
                                    </div>
                                    <span> 2 Star</span>
                                    <div class="process-item">
                                        <div style="width:40%"></div>
                                    </div>
                                    <span> 3 Star</span>
                                    <div class="process-item">
                                        <div style="width:45%"></div>
                                    </div>
                                    <span> 4 Star</span>
                                    <div class="process-item">
                                        <div style="width:85%"></div>
                                    </div>
                                    <span> 5 Star</span>
                                    <div class="process-item">
                                        <div style="width:60%"></div>
                                    </div>
                                    <article>
                                        <div class="post-thumb">
                                            <a href="single.html">
                                                        <span class="post-format"> <i class="fa fa-camera"></i></span>
                                                        <img alt="" src="images/2.jpg">
                                                    </a>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a>
                                        </h3>
                                    </article>
                                </div>
                            </div>
                            <div>
                                <div class="top-review-item">
                                    <span> 1 Star</span>
                                    <div class="process-item">
                                        <div style="width:30%"></div>
                                    </div>
                                    <span> 2 Star</span>
                                    <div class="process-item">
                                        <div style="width:40%"></div>
                                    </div>
                                    <span> 3 Star</span>
                                    <div class="process-item">
                                        <div style="width:45%"></div>
                                    </div>
                                    <span> 4 Star</span>
                                    <div class="process-item">
                                        <div style="width:85%"></div>
                                    </div>
                                    <span> 5 Star</span>
                                    <div class="process-item">
                                        <div style="width:60%"></div>
                                    </div>
                                    <article>
                                        <div class="post-thumb">
                                            <a href="single.html">
                                                        <span class="post-format"> <i class="fa fa-camera"></i></span>
                                                        <img alt="" src="images/1.jpg">
                                                    </a>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="single.html">The iPhone X is the Beginning of the End for Phones</a>
                                        </h3>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--box-->
            <div class="box">
                <div class="box-caption">
                    <h2><a href="#">CATEGORY</a></h2>
                </div>
                <div class="box-category">
                    <ul>
                        <li>
                            <a href="#">
                                        BUSINESS
                                        <span>10</span>
                                    </a>
                        </li>
                        <li>
                            <a href="#">
                                        COMPUTING
                                        <span>20</span>
                                    </a>
                        </li>
                        <li>
                            <a href="#">
                                        MOBILE
                                        <span>22</span>
                                    </a>
                        </li>
                        <li>
                            <a href="#">
                                        Desktop
                                        <span>15</span>
                                    </a>
                        </li>
                        <li>
                            <a href="#">
                                        Review
                                        <span>37</span>
                                    </a>
                        </li>
                        <li>
                            <a href="#">
                                        tech
                                        <span>17</span>
                                    </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--box-->
            <div class="box hidden-xs">
                <div class="box-caption">
                    <h2><a href="#">advertising</a></h2>
                </div>
                <div class="box-advertising">
                    <a href="#">
                                <img alt="" src="images/ads.jpg" />
                            </a>
                </div>
            </div>
            <!--box-->
            <div class="box hidden-xs">
                <div class="tab-caption">
                    <ul role="tablist">
                        <li class="active">
                            <a href="#tab1" role="tab" data-toggle="tab">
                                        LATEST
                                    </a>
                        </li>
                        <li>
                            <a href="#tab2" role="tab" data-toggle="tab">
                                        POPULAR
                                    </a>
                        </li>
                        <li>
                            <a href="#tab3" role="tab" data-toggle="tab">
                                        RANDOM
                                    </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        <ul class="list-news list-news-right">
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/11.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Watch out: That USB stick in your mailbox might be infected</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/8.jpg">
                                            </a>
                                </div>
                                <h3>
                                    <a href="single.html">Netflix Speeds Jumped 51% This Year</a>
                                </h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/9.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/10.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane " id="tab2">
                        <ul class="list-news list-news-right">
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/9.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/10.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/11.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Watch out: That USB stick in your mailbox might be infected</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/8.jpg">
                                            </a>
                                </div>
                                <h3>
                                    <a href="single.html">Netflix Speeds Jumped 51% This Year</a>
                                </h3>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane " id="tab3">
                        <ul class="list-news list-news-right">
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/8.jpg">
                                            </a>
                                </div>
                                <h3>
                                    <a href="single.html">Netflix Speeds Jumped 51% This Year</a>
                                </h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/9.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Uber wants to build planes to beat city traffic</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/11.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Watch out: That USB stick in your mailbox might be infected</a></h3>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="single.html">
                                                <img alt="" src="images/10.jpg">
                                            </a>
                                </div>
                                <h3><a href="single.html">Apple reportedly prototyping their Amazon Echo competitor</a></h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php
get_footer();
