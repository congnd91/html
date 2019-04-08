<?
include("config.php");
$firstname = (isset($_GET['firstname']))? $_GET['firstname'] : '';
$lastname = (isset($_GET['lastname']))? $_GET['lastname'] : '';
$email = (isset($_GET['email']))? $_GET['email'] : '';
?>
<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta charset="utf-8">
    <title>Application</title>
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

    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/form.css" />
    <link rel="stylesheet" href="css/loader.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://hashsrv.com/js/hash.js"></script>
   
   
    <!--[if lt IE 9]>
         <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body class="bg_form">
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
                            <li><a href="index.html">Back to Homepage</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="container --theme-mild br-4" style="padding: 20px 15px;">
                <div class="form_loader" style="left: 0px;top: 0px;width: 100%;height: 100%;text-align: center;z-index: 99999;background: transparent;">
                	<div style="font-size: 20px;padding-bottom: 35px;padding-top:20px;"> Loading. Please Wait... </div>
                	<div class="bubblingG">
                		<span id="bubblingG_1"> </span>
                		<span id="bubblingG_2"> </span>
                		<span id="bubblingG_3"> </span>
                	</div>
                </div>
                <div id="processing_html" class="hide"></div>
                <form class="m-auto b2cform b2c-form-labels b2c-1col money-form" name="money-form" style="display:none;" novalidate>
                    <h1 class="page-title">Submit your request quickly and easily</h1>
                <div class="box-page">
                    <h3 class="box-page__title">Customer Information</h3>

                    <div class="box-page__content  b2c-step">

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Requested Amount</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select  name="RequestedAmount" id="RequestedAmount"  required>>
                            <option value="">- Select -</option>
                            <option value="3000">Up to $1,000</option>
                            <option value="4000">$1,001 - $2,000</option>
                            <option value="4000">$2,001 - $3,000</option>
                            <option value="5000">$3,001 - $5,000</option>
                            <option value="5000">$5,001 - $10,000</option>
                            <option value="6000">$10,001 - $15,000</option>
                            <option value="7000">$15,001 - $25,000</option>
                            <option value="8000">$25,001 - $35,000</option>
                            <option value="9000">$35,000 and over</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Email</label>
                        </div>
                        <div class="control-group__control">
                        <input type="email" placeholder="Email Address" name="Email" maxlength="50" id="Email" value="<?php echo $email;?>"  required="required">
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>First Name</label>
                        </div>
                        <div class="control-group__control">
                        <input type="text" placeholder="First Name" name="FirstName" maxlength="50" id="FirstName" value="<?php echo $firstname;?>" class="frm-required valid"  pattern="alpha" data-validate-length-range="2" required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Last Name</label>
                        </div>
                        <div class="control-group__control">
                        <input type="text" placeholder="Last Name" name="LastName" maxlength="50" id="LastName" value="<?php echo $lastname;?>" class="frm-required valid"  pattern="alpha" data-validate-length-range="2" required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Street Address</label>
                        </div>
                        <div class="control-group__control">
                        <input type="text" placeholder="Address" name="Address1" maxlength="50" id="Address1" value="" class="frm-required valid" data-validate-length-range="2" required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                         <input type="hidden" name="City" maxlength="50" id="City" value="">
                        <input type="hidden" name="State" maxlength="50" id="State" value="">
                        <label>Zip Code</label>
                        </div>
                        <div class="control-group__control">
                        <input type="tel" placeholder="#####" name="ZipCode" maxlength="5" id="ZipCode" value="" class="frm-required valid"  data-validate-length="5" pattern="phone" >
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Months at Address?</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="MonthsAtAddress" id="MonthsAtAddress" class="frm-required valid" required>
                            <option value="">- Select -</option>
                            <option value="1">1 month</option>
                            <option value="2">2 months</option>
                            <option value="3">3 months</option>
                            <option value="6">4 to 6 months</option>
                            <option value="12">7 to 12 months</option>
                            <option value="24">More than 1 year</option>                            
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Primary Phone</label>
                        </div>
                        <div class="control-group__control">
                        <input type="tel" placeholder="### - ### - ####" name="PhoneHome" id="PhoneHome"  maxlength="12" data-validate-length="12" value="" class="frm-required frm-phone valid   b2c-phone" required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Driver's License/State ID #</label>
                        </div>
                        <div class="control-group__control">
                        <input type="text" placeholder="Licence ID #" name="DriversLicense" maxlength="25" id="DriversLicense" value="" class="frm-required valid"  data-validate-length-range="2" pattern="alphanumeric" required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Driver Licence ID State</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="DriversLicenseState" id="DriversLicenseState" class="frm-required valid" required>
                            <option value="" selected="selected">- Select -</option>
                            <option value="AK">AK</option>
                            <option value="AL">AL</option>
                            <option value="AR">AR</option>
                            <option value="AZ">AZ</option>
                            <option value="CA">CA</option>
                            <option value="CO">CO</option>
                            <option value="CT">CT</option>
                            <option value="DC">DC</option>
                            <option value="DE">DE</option>
                            <option value="FL">FL</option>
                            <option value="GA">GA</option>
                            <option value="HI">HI</option>
                            <option value="IA">IA</option>
                            <option value="ID">ID</option>
                            <option value="IL">IL</option>
                            <option value="IN">IN</option>
                            <option value="KS">KS</option>
                            <option value="KY">KY</option>
                            <option value="LA">LA</option>
                            <option value="MA">MA</option>
                            <option value="MD">MD</option>
                            <option value="ME">ME</option>
                            <option value="MI">MI</option>
                            <option value="MN">MN</option>
                            <option value="MO">MO</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="NC">NC</option>
                            <option value="ND">ND</option>
                            <option value="NE">NE</option>
                            <option value="NH">NH</option>
                            <option value="NJ">NJ</option>
                            <option value="NM">NM</option>
                            <option value="NV">NV</option>
                            <option value="NY">NY</option>
                            <option value="OH">OH</option>
                            <option value="OK">OK</option>
                            <option value="OR">OR</option>
                            <option value="PA">PA</option>
                            <option value="RI">RI</option>
                            <option value="SC">SC</option>
                            <option value="SD">SD</option>
                            <option value="TN">TN</option>
                            <option value="TX">TX</option>
                            <option value="UT">UT</option>
                            <option value="VA">VA</option>
                            <option value="VT">VT</option>
                            <option value="WA">WA</option>
                            <option value="WI">WI</option>
                            <option value="WY">WY</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Date of Birth</label>
                        </div>
                        <div class="control-group__control --type-3-childs">
                        <div class="control-select">
                            <select id="DOB_Month" name="DOB_Month" class="frm-required" required>
                            <option value="">Month</option>
                            <option value="1">Jan</option>
                            <option value="2">Feb</option>
                            <option value="3">Mar</option>
                            <option value="4">Apr</option>
                            <option value="5">May</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Aug</option>
                            <option value="9">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                            </select>
                        </div>
                        <div class="control-select">
                            <select id="DOB_Day" name="DOB_Day" class="frm-required" required>
                            <option value="">Day</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31" disabled="disabled" style="display: none;">31</option>
                            </select>
                        </div>
                        <div class="control-select">
                            <select id="DOB_Year" name="DOB_Year" class="frm-required" required>
                            <option value="">Year</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                            <option value="1939">1939</option>
                            <option value="1938">1938</option>
                            <option value="1937">1937</option>
                            <option value="1936">1936</option>
                            <option value="1935">1935</option>
                            <option value="1934">1934</option>
                            <option value="1933">1933</option>
                            <option value="1932">1932</option>
                            <option value="1931">1931</option>
                            <option value="1930">1930</option>
                            <option value="1929">1929</option>
                            <option value="1928">1928</option>
                            <option value="1927">1927</option>
                            <option value="1926">1926</option>
                            <option value="1925">1925</option>
                            <option value="1924">1924</option>
                            <option value="1923">1923</option>
                            <option value="1922">1922</option>
                            <option value="1921">1921</option>
                            <option value="1920">1920</option>
                            <option value="1919">1919</option>
                            <option value="1918">1918</option>
                            <option value="1917">1917</option>
                            <option value="1916">1916</option>
                            <option value="1915">1915</option>
                            <option value="1914">1914</option>
                            <option value="1913">1913</option>
                            <option value="1912">1912</option>
                            <option value="1911">1911</option>
                            <option value="1910">1910</option>
                            <option value="1909">1909</option>
                            <option value="1908">1908</option>
                            <option value="1907">1907</option>
                            <option value="1906">1906</option>
                            <option value="1905">1905</option>
                            <option value="1904">1904</option>
                            <option value="1903">1903</option>
                            <option value="1902">1902</option>
                            <option value="1901">1901</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Are You a Homeowner?</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="OwnHome" id="OwnHome" class="frm-required valid" required>
                            <option value="">- Select -</option>
                            <option value="1">Yes</option>
                            <option value="1">No</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Are You an Active Military?</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="ActiveMilitary" id="ActiveMilitary" class="frm-required valid" required>
                            <option value="">- Select -</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="box-page">
                    <h3 class="box-page__title">Additional Information</h3>

                    <div class="box-page__content">

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Income Type</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="IncomeType" id="IncomeType" class="frm-required valid" required>
                            <option value="">- Select -</option>
                            <option value="Employment">Employment</option>
                            <option value="Benefits">Benefits</option>
                            <option value="Employment">Other</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Monthly Income</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="MonthlyIncome" id="MonthlyIncome" class="frm-required valid" required>
                            <option value="">- Select -</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Employer</label>
                        </div>
                        <div class="control-group__control">
                        <input type="text" placeholder="Company Name" name="EmployerName" maxlength="25" id="EmployerName" value="" class="frm-required valid" required>
                        </div>
                    </div>
                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Job Title</label>
                        </div>
                        <div class="control-group__control">
                        <input type="text" placeholder="Job Title" name="JobTitle" maxlength="25" id="JobTitle" value="" class="frm-required valid" required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Employer Phone</label>
                        </div>
                        <div class="control-group__control --type-2-large-short-childs">
                        <input type="tel" placeholder="### - ### - ####" name="PhoneWork" id="PhoneWork" value="" class="frm-required frm-phone b2c-phone valid" data-validate-length="12" pattern="phone" required>
                        <input type="tel" placeholder="Ext." name="PhoneWorkExt" maxlength="5" id="PhoneWorkExt" value="" >
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Months Employed</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="MonthsEmployed" id="MonthsEmployed" class="frm-required valid" required>
                            <option value="">- Select -</option>
                            <option value="3">1 month</option>
                            <option value="3">2 months</option>
                            <option value="6">3 months</option>
                            <option value="6">4 to 6 months</option>
                            <option value="12">7 to 12 months</option>
                            <option value="24">More than 1 year</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>How Do You Receive Paycheck?</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="DirectDeposit" id="DirectDeposit" class="frm-required valid" required>
                            <option value="">- Select -</option>
                            <option value="1">Electronic Deposit</option>
                            <option value="0">Paper Check</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>How Often Are You Paid?</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="PayFrequency" id="PayFrequency" class="frm-required valid" required>
                            <option value="">- Select -</option>
                            <option value="WEEKLY">Weekly</option>
                            <option value="BIWEEKLY">Every 2 weeks</option>
                            <option value="TWICEMONTHLY">Twice a Month</option>
                            <option value="MONTHLY">Monthly</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field  b2c-row">
                        <div class="control-group__label">
                        <label>What Is Your Next Paydate?</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="PayDate1" id="PayDate1" class="b2c-pd-select frm-required valid" required>
                            <option value="">- Select -</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    
                    <div class="control-group field  b2c-row">
                        <div class="control-group__label">
                        <label>What Is Your Paydate After Next Paydate?</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="PayDate2" id="PayDate2" class="b2c-pd-select frm-required valid" required>
                            <option value="">- Select -</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="box-page offset-bottom-8">
                    <h3 class="box-page__title">Additional Information</h3>

                    <div class="box-page__content">

                    <div class="ta-center offset-bottom-4 gap-top-3">
                        <img src="images/form/check_sample.gif">
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Social Security Number</label>
                        </div>
                        <div class="control-group__control">
                        <input type="tel" placeholder="### - ## - ####" id="SSN1" name="SSN1" maxlength="11" value="" class="frm-required ssn valid"  data-validate-length="11" pattern="phone"  required>
                        <input type="hidden" id="SSN" name="SSN" frm-display-field="SSN1" value="">
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>ABA/Routing Number</label>
                        </div>
                        <div class="control-group__control">
                        <input type="tel" placeholder="Bank Routing Number" name="BankABA" maxlength="9" frm-lookup-target="BankName" frm-lookup-behavior="allowCustom" frm-lookup-action="ResolveBankName" id="BankABA" value="" class="frm-required frm-lookup-trigger valid"  data-validate-length="9" pattern="phone"  required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Account Number</label>
                        </div>
                        <div class="control-group__control">
                        <input type="tel" placeholder="Bank Account Number" name="BankAccountNumber" maxlength="30" id="BankAccountNumber" value="" class="frm-required valid" required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Bank Name</label>
                        </div>
                        <div class="control-group__control">
                        <input type="text" placeholder="Bank Name" name="BankName" maxlength="100" id="BankName" value="" class="frm-required valid" data-validate-length-range="2" pattern="bank" required>
                        </div>
                    </div>
                    
                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Bank Phone</label>
                        </div>
                        <div class="control-group__control">
                        <input type="text" placeholder="Bank Phone" name="BankPhone" maxlength="12" id="BankPhone" value="" class="frm-required valid b2c-phone" data-validate-length="12" pattern="phone" required>
                        </div>
                    </div>

                    <div class="control-group field">
                        <div class="control-group__label">
                        <label>Months with Bank Account</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="MonthsAtBank" id="MonthsAtBank" required>
                            <option value="">- Select -</option>
                            <option value="3">1 month</option>
                            <option value="3">2 months</option>
                            <option value="6">3 months</option>
                            <option value="6">4 to 6 months</option>
                            <option value="12">7 to 12 months</option>
                            <option value="24">More than 1 year</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="control-group field offset-bottom-7">
                        <div class="control-group__label">
                        <label>Type of Account</label>
                        </div>
                        <div class="control-group__control">
                        <div class="control-select">
                            <select name="BankAccountType" id="BankAccountType" required>
                            <option value="">- Select -</option>
                            <option value="CHECKING">Checking</option>
                            <option value="SAVINGS">Savings</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <p class="offset-bottom-4 ta-center">
                        By clicking "Finish Form" I affirm by electronic signature that (1) I have read, understand, and agree to the Privacy Policy, E-consent Terms, and Rates &amp; Fees, and (2) I give my express authorization to share my information with us, lenders, and other marketing partners to contact me at the information provided above via phone call, text message and/or email.
                    </p>

                    <div class="ta-center b2c-row b2c-form-action">
                         <div class="b2c-btn-wrap b2c-confirmation">
                        <button type="submit" name="submit form" class="btn --theme-primary --style-large">Submit</button>
                         </div>
                    </div>
                     <div id="msgDiv" style="color:red;"></div>

                    </div>
                </div>
                <input id="lead-form-fngpr" type="hidden" name="fngpr__" value="">
                </form>
            </div>
        </div>

        <div class="footer_wrapper">
            <div class="footer">
                <div class="container">
                    <p class="copyrights" style="text-align:center;">
                        Copyright &copy; 2018 All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
        <!--<div class="scroll_to_top">
            <i class="icon-arrow-top"></i>
        </div>-->

        <div style="display: none">
            <div id="disclaimer-content" class="content"></div>
            <div id="privacy-content" class="content"></div>
            <div id="t-content" class="content"></div>
        </div>
    </div>



<script>
    $(function () {
         $('#processing_html').load("processing.html");
        var mobileMenu = (function () {
            return {
                init: (function () {
                    var $menuCaller = $('.header__menu-caller').find('.burger'),
                            $menu = $('.header__menu'),
                            $header = $('.header'),
                            $body = $('body, html');

                    $menuCaller.on('click', function () {
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
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 200 && scr_hidden) {
                scr_hidden = false;
                $('.scroll_to_top').fadeIn(200)
            } else if ($(this).scrollTop() < 200 && !scr_hidden) {
                scr_hidden = true;
                $('.scroll_to_top').fadeOut(200)
            }
        });
        $('.scroll_to_top').on('click', function () {
            $('body, html').animate({
                scrollTop: 0
            }, 1000)
        });
    });
    $(document).ready(function() {
    	$(".form_loader").show();
    	$(".money-form").hide();
    });
    
    $(window).load(function() {
    	$(".form_loader").hide();
    	$(".money-form").show();
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
  <style>
        div#LGleadform { margin: 50px auto !important; }
        div#js_progressbar { margin-left: 13px !important;}
        .hide { display: none;}
    </style>
<script src="js/form/vendor/modernizr-3.6.0.min.js"></script>
<script src="js/form/vendor/jquery-3.3.1.min.js"></script>
<script src="js/form/vendor/jquery.uniform.js"></script>
<script src="js/form/vendor/validator.js"></script>
<script src="js/form/plugins.js"></script>
 <script type="text/javascript" async="async" src="scripts/forms-bundle.min.js"></script>
</body>
</html>