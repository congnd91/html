<?
include("config.php");
?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="index, follow">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#0c457b">
    <link rel="shortcut icon" href="images/favicon/favicon.ico">
    <meta name="msapplication-config" content="images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link href='css/font/css7880.css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <!-- change font in web -->

    <link href="css/secure-logos.css" rel="stylesheet" type="text/css" />
    <!-- change header image and logo -->
</head>

<body>
    <div class="body_wrapper">

        <div class="header_wrapper">
            <div class="header">
                <div class="container">
                    <div class="header__menu-caller">
                        <div class="burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="header__menu">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="applynow.html">Apply Now</a></li>
                            <li><a href="questions.html">FAQs</a></li>
                            <li><a href="how-it-works.html">How It Works</a></li>
                            <li><a href="lending-policy.html">Lending Policy</a></li>
                            <li><a href="rates.html">Rates &amp; Fees</a></li>
                            <li><a href="why-choose-us.html">Why Choose Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="section">
                <div class="container">
                    <div class="text_content">
                        <h1>Contact Us</h1>
                        <div class="custom_cols custom_cols--two">
                            <div class="col">
                                <h3>Contact form</h3>
                                <p>
                                    This contact form is not for loan requests, if you wanted to apply for a loan, please submit the application.&nbsp;&nbsp;<a href="/apply.php?k="> Get Started &gt;&gt;</a>
                                </p>

                                <form id="ajax_contact_inner" action="/lite_process.php" method="post">
                                    <input name="Full_Name" placeholder="Name" class="required" type="text">
                                    <br><br>
                                    <input name="Email_Address" placeholder="Email" class="last-item required" type="email">
                                    <br><br>
                                    <input name="Topic" placeholder="Subject" class="last-item required" type="text">
                                    <br><br>
                                    <textarea name="Your_Message" placeholder="Message"></textarea>
                                    <br><br>
                                    <input class="btn" value="Submit" type="submit">
                                    <input name="Query" id="Query" value="rightcashloans.com" size="5" type="hidden">
                                    <span></span>
                                </form>

                                <div class="thakyoumsg" style="display: none">
                                    <p>Thank you for contacting us.</p>
                                    <p>Our support team will review your request.</p>
                                </div>
                                <div class="svcerrormsg" style="display: none">
                                    <p>Some error has occurred while submitting the request. Please try again.</p>
                                </div>
                            </div>
                            <div class="col">
                                <h3>Our Contacts</h3>
                                <? echo $address; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="apply.html">Apply Now</a></li>
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="definitions.html">Definitions</a></li>
                    <li><a href="disclaimer.html">Disclaimer</a></li>
                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                    <li><a href="terms.html">Terms Of Use</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li>
                </ul>
            </div>

        </div>

        <div class="footer_wrapper">
            <div class="footer">
                <div class="container">
                    <div class="footer__content-wrapper">
                        <p>
                            <b>Consumer Notice</b>: Personal loans are not a long term financial solution. Borrowers facing debt and credit difficulties should seek professional financial advice. Borrowers are encouraged to review local laws and regulations
                            governing personal loans.
                        </p>
                        <p>
                            <b>Availability</b>: This service is not available in all states. Please review local laws and regulations for availability in your particular state. The states this website services may change from time to time without notice.
                            All actions taken on this site, or legal concerns addressing this site, are deemed to have taken place in Nevada, regardless of the location from where you access this site.
                        </p>
                        <p>
                            <b>Disclaimer</b>: This website does not constitute an offer or solicitation to lend. The operator of this website is not a lender and does not make credit decisions. Rather, we provide a marketplace service where we connect
                            you with lenders in our network. We cannot and do not control the actions or omissions of lenders in our network. We are not an agent, representative or loan broker to any lender and we do not endorse any particular lender.
                            Our marketplace service is always free to you. If you are ever asked to pay a deposit or advanced payment in order to get a loan, you should not proceed.
                        </p>
                        <p>
                            You are under no obligation to use our marketplace service to initial contact with or apply for a loan with any lender.
                        </p>
                        <p>
                            Subject to our Privacy Policy (which you should carefully read and understand), we will transfer your information to lenders in our program and to other service providers and marketing companies we do business with. We do not guarantee that you will be
                            connected with a lender or obtain favorable rates or be approved for a loan by completing a form on our site.
                        </p>
                        <p>
                            Participating lenders may verify your social security number, driver's license number or other federal or state identification, as well as review your credit worthiness through national databases that may include Equifax, Transunion, Experian and other
                            credit bureaus. By submitting your information to us, you agree that lenders may obtain such credit reports and verify your information.
                        </p>
                        <p>
                            Not all lenders can provide you with a loan. If you are approved, you will receive funds according to the lender's funding practices which vary from lender to lender. Repayment terms also vary from lender to lender and may be affected by state law. If
                            you have questions about the loan terms offered to you, or about a loan that has funded, please contact the lender directly. We are not a lender and cannot give you loan-specific information.
                        </p>
                        <p>
                            You will not be charged a fee for using our service. Loan-related fees are controlled by the lender and will be disclosed to you before you accept the loan. If you do not want to incur loan-related fees or you are unable to repay your loan, do not accept
                            the loan.
                        </p>

                        <!--<p>-->
                        <!--<strong>Our lenders offer [type, ex: “unsecured installment”] loans with an Annual Percentage Rate (APR) of 36% and below.</strong>-->
                        <!--For qualified consumers, the maximum APR (including the interest rates plus fees and other costs) is 36%.-->
                        <!--All loans are subject to the lender's approval based on its own unique underwriting criteria.-->
                        <!--</p>-->
                        <!--<p>Example: Loan Amount: $4,300.00, Annual Percentage Rate: 36.00%. Number of Monthly Payments: 30. Monthly Payment Amount: $219.38. Total Amount Payable: $6,581.40</p>-->
                        <!--<p>Loans include a minimum repayment plan of 12 months and a maximum repayment plan of 30 months.</p>-->
                        <!--<p><strong>Lender's Disclosure of Terms.</strong></p>-->
                        <!--<p>-->
                        <!--The lender you are connected to will provide documents that contain all fees and rate information pertaining to the loan being offered, including any potential fees for late-payments and the rules under which you may be allowed (if permitted by applicable law) to refinance, renew or rollover your loan.-->
                        <!--Loan fees and interest rates are determined solely by the lender based on the lender's internal policies, underwriting criteria and applicable law.-->
                        <!--You are urged to read and understand the terms of any loan offered by any lender, and to reject any particular loan offer that you cannot afford to repay or that includes terms that are not acceptable to you.-->
                        <!--</p>-->
                        <!--<p><strong>Late Payments Hurt Your Credit Score</strong></p>-->
                        <!--<p>-->
                        <!--Please be aware that missing a payment or making a late payment can negatively impact your credit score.-->
                        <!--To protect yourself and your credit history, make sure you only accept loan terms that you can afford to repay.-->
                        <!--If you cannot make a payment on time, you should contact your lender immediately and discuss how to handle late payments.-->
                        <!--Lenders are required to follow the Fair Debt Collections Practices Act and related state law when collecting money from you.-->
                        <!--</p>-->

                    </div>
                </div>
            </div>
            <p class="copyrights" style="text-align:center;">
                Copyright &copy; 2017 All Rights Reserved.
            </p>
        </div>
        <div class="scroll_to_top">
            <i class="icon-arrow-top"></i>
        </div>

    </div>

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="js/general.js"></script>

    <script>
        $(function() {
            var mobileMenu = (function() {
                return {
                    init: (function() {
                        var $menuCaller = $('.header__menu-caller').find('.burger'),
                            $menu = $('.header__menu'),
                            $header = $('.header'),
                            $body = $('body, html');

                        $menuCaller.on('click', function() {
                            $(this).toggleClass('active');
                            $menu.toggleClass('active');
                            $header.toggleClass('active');
                            $body.toggleClass('menu_opened')
                        })
                    }())
                }
            }());
            var scr_hidden;
            if ($(window).scrollTop() > 200) {
                scr_hidden = false;
                $('.scroll_to_top').css('display', 'block');
            } else {
                scr_hidden = true;
                $('.scroll_to_top').css('display', 'none');
            }
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 200 && scr_hidden) {
                    scr_hidden = false;
                    $('.scroll_to_top').fadeIn(200)
                } else if ($(this).scrollTop() < 200 && !scr_hidden) {
                    scr_hidden = true;
                    $('.scroll_to_top').fadeOut(200)
                }
            });
            $('.scroll_to_top').on('click', function() {
                $('body, html').animate({
                    scrollTop: 0
                }, 1000)
            });
        });
    </script>

    <!--[if IE 9]>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('input[type=text], input[type=password], textarea').placeholder();
    });
</script>
<![endif]-->
<? echo $stat; ?>
</body>


</html>