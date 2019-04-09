<?
include("config.php");

foreach($_GET AS $key => $value) {

    ${$key} = $value;

}


if(!$c){
$c="plainloanoffer.com";
}

if(!$g){
  if(!$source){
    $g=$OVRAW;
   } 
  else
   {
    $g=$source;
   }
}

if(!$k){
  if(!$ad){
    $k=$OVKEY;
   } 
  else
   {
    $k=$ad;
   }
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>www.plainloanoffer.com</title>

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
                            <li><a href="applynow.html?source=<?php echo $source;?>">Apply Now</a></li>
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
        <script>
            document.querySelector('.header_wrapper').className += ' header_wrapper--main'
        </script>
        <div class="main">
            <div class="section bg-img">
                <div class="container">
                    <div class="custom_cols custom_cols--two">
                        <div class="col">
                            <h1 class="main_header">
                                Cash Offer
                            </h1>
                            <h2 class="main_header-sub">
                                Apply Online Now.
                            </h2>
                            <div class="main_header-text-big">
                                Safe & Secured, Fast  & Easy, <br />Friendly  Cash Loans
                            </div>
                            <div class="main_header-text-small">
                                Simply fill out a short form and our lender will help you get a loan for your needs.
                            </div>
                        </div>
                        <div class="col">
                            <div class="apply_form fixed_form">
                                <form class="apply-now" id="ApplyNow" action="apply.html" target="_blank" method="GET">
                                    <div class="apply_form__fields">
                                        <div class="apply_form__input">
                                            <label for="<?php echo $source;?>">First Name</label>
                                            <input name="firstname" maxlength="50" id="FirstName" placeholder="First Name" value="" type="">
                                        </div>
                                        <div class="apply_form__input">
                                            <label for="LastName">Last Name</label>
                                            <input name="lastname" maxlength="50" id="LastName" placeholder="Last Name" value="" type="text">
                                        </div>
                                        <div class="apply_form__input">
                                            <label for="Email">Email</label>
                                            <input name="email" maxlength="50" id="Email" placeholder="Email" value="" type="">
                                        </div>
                                        <div class="apply_form__input">
                                            <input type="hidden" id="source" name="source" value="<?php echo $source;?>" type="text">
                                        </div>
                                        <div class="apply_form__input apply_form__input--btn">
                                            <input type="submit" class="btn btn--apply btn-cash_0 applynow" value="Get Started >" />
                                        </div>
                                        <!--<div class="apply_form__descr">
                                        I consent and agree to the <a target="_blank" href="privacy-policy.php">Privacy Policy</a>, <a target="_blank" href="terms-of-use.php">Terms Of Use</a>
                                    </div>-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="section_title">
                    Few Things You may want to know
                </div>
                <div class="container">
                    <div class="custom_cols custom_cols--three">
                        <div class="col">
                            <div class="question_wrapper">
                                <div class="question_item">
                                    <div class="question_item-header">
                                        How is My Private Information Protected?
                                    </div>
                                    <div class="question_item-answer">
                                        We use an advanced 256-bit SSL encryption while handling your data. All your private information is kept securely in an encrypted format. More details can be found by reading our privacy policy.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="question_wrapper">
                                <div class="question_item">
                                    <div class="question_item-header">
                                        Is My Information Safe?
                                    </div>
                                    <div class="question_item-answer">
                                        Yes, your personal information is safe. Our site is protected by industry-recognized security standards, and all information provided is encrypted during submission.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="question_wrapper">
                                <div class="question_item">
                                    <div class="question_item-answer">
                                        Lender-approval and loan terms will vary based on credit determination and applicable state law - they may offer short-term loans with fixed rates from 11.80% to 32% APR. The lender's approval process may take longer due to additional documents being
                                        requested.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom_cols custom_cols--three">
                        <div class="col">
                            <div class="question_wrapper">
                                <div class="question_item">
                                    <div class="question_item-header">
                                        APR
                                    </div>
                                    <div class="question_item-answer">
                                        This is the cost of credit which is expressed in a yearly rate. This is not the same as contract interest rate.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="question_wrapper">
                                <div class="question_item">
                                    <div class="question_item-header">
                                        Repayment Duration
                                    </div>
                                    <div class="question_item-answer">
                                        Loans include a minimum repayment plan of 12 months and a maximum repayment plan of 30 months.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="question_wrapper">
                                <div class="question_item">
                                    <div class="question_item-header">
                                        Representative Example
                                    </div>
                                    <div class="question_item-answer">
                                        Loan Amount: $7,000.00, Annual Percentage Rate: 11.90%, Number of Payments: 30, Monthly Payment: $261.00, Total Amount Payable: $7,833.00
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col button_wrap">
                        <a href="apply.html?source=<?php echo $source;?>" target="_blank" class="btn btn--lg applynow">Apply Online Now &nbsp ></a>
                    </div>
                </div>
            </div>
            <div class="section bg-color1">
                <div class="container">
                    <div class="title_icon">
                        <i class="icon-gears"></i>
                    </div>
                    <div class="section_title">
                        How It Works
                    </div>
                    <div class="custom_cols custom_cols--three">
                        <div class="col">
                            <div class="advantage advantage--centered">
                                <div class="advantage__img img1">
                                    <i class="icon-list"></i>
                                </div>
                                <div class="advantage__title text-center">
                                    <p>
                                        Need Cash Fast?
                                    </p>
                                </div>
                                <div class="advantage__description text-center">
                                    <p>
                                        You need money, and you need it quickly. If you need to cover unexpected expenses like emergency auto repairs, unexpected bills, and other unplanned expenses. There is no need to live with financial stress - a personal loan may be a helpful solution for
                                        short-term cash flow problems. A personal loan will provide you with cash now, so you can set your worries aside.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="advantage advantage--centered">
                                <div class="advantage__img img2"></div>
                                <div class="advantage__title text-center">
                                    <p>
                                        Qualifying for A Short Term Loan is Simple
                                    </p>
                                </div>
                                <div class="advantage__description text-center">
                                    <p>
                                        In most cases the lenders in our network require you to have a job, possess a bank account, be a U.S. citizen or resident at least 18 years of age, and earn a certain amount of money each month. Our lenders understand that everyone makes mistakes and
                                        encounters rough times.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="advantage advantage--centered">
                                <div class="advantage__img img3"></div>
                                <div class="advantage__title text-center">
                                    <p>
                                        What Are You Waiting For?
                                    </p>
                                </div>
                                <div class="advantage__description text-center">
                                    <p>
                                        We provide a free service that aims to quickly connect customer with lender that offer loan that may work for them. Simply fill out a short form and then be connected with our lender. After you submit your information, you may be redirected to the
                                        lender's website to review the terms of the loan, and if accepted, the funds will be deposited into your bank account!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom_cols custom_cols--three">
                        <div class="col">
                            <div class="advantage advantage--centered">
                                <div class="advantage__img img4"></div>
                                <div class="advantage__title text-center">
                                    <p>
                                        What is Our Service?
                                    </p>
                                </div>
                                <div class="advantage__description text-center">
                                    <p>
                                        Our service is to connect you with a lender. Our service is completely FREE to you! We are here to connect you with our lender. Each lender that we work with has their own terms, and we highly recommend carefully reading your loan contract before making
                                        a commitment.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="advantage advantage--centered">
                                <div class="advantage__img img5"></div>
                                <div class="advantage__title text-center">
                                    <p>
                                        A Short Term Loan Will Give You the Cash You Need
                                    </p>
                                </div>
                                <div class="advantage__description text-center">
                                    <p>
                                        Short Term lenders specialize in servicing loans. Each of the lenders in our network is an independent company that sets their own lending guidelines, but generally the amount they will borrow you depends on factors such as your income and employment
                                        history.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="advantage advantage--centered">
                                <div class="advantage__img img6"></div>
                                <div class="advantage__title text-center">
                                    <p>
                                        Do I Need to Fax Documents as part of the Process?
                                    </p>
                                </div>
                                <div class="advantage__description text-center">
                                    <p>
                                        In most cases "NO". However, if information you provided is inconclusive or seems false, lenders may ask you to fax additional documentation.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="section_title section_title--orange">
                    Find Real Help With Any Financial Problem
                    <div class="section_title-sub">
                        Get your loan offer right now.
                    </div>
                </div>
                <div class="button_wrap">
                    <a href="apply.html?source=<?php echo $source;?>" class="btn btn--lg">Get Started Now ></a>
                </div>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="apply.html?source=<?php echo $source;?>">Apply Now</a></li>
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
                    <!--<div class="text-center">
                <a title="kudoCash.com" class="logo logo_js logo--f" href="/">kudoCash.com</a>
            </div>-->
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
                    </div>
                </div>
            </div>
            <p class="copyrights" style="text-align:center;">
                Copyright &copy; 2018 All Rights Reserved.
            </p>
        </div>
        <div class="scroll_to_top">
            <i class="icon-arrow-top"></i>
        </div>

    </div>

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="js/general.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="/js/general.js"></script>
    <script type="text/javascript" src="/js/jquery.general.js"></script>

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