<?php
	/*
        * Template Name: Auth Page
        * Page template for
        *
    */   

if (is_user_logged_in()) {
	wp_redirect(pll_get_page_url('user'));
}

require_once(dirname(__FILE__).'/lib/actions/auth.php');

$success = '';
$error = '';
$error_reg = '';
$error_forget = '';
$error_recover = '';
$terms_accept = 0;

// Not defined yet
$rp_key = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['widget_id'] == 'login') {

		$user = auth_login();
		if ($user instanceof WP_User) {
            $_SESSION['logged_in'] = true;
            if($user->roles[0] == 'administrator') {
                wp_redirect(site_url('/wp-admin/admin.php?page=listing'));
            }
            else {
                $_POST['redirect_to'] = isset($_POST['redirect_to']) ? add_query_arg(array('success'=>'login'), $_POST['redirect_to']) : pll_get_page_url('user') . '?success=login';
                wp_redirect($_POST['redirect_to']);
            }
		} else {
			$error = esc_html__('Please provide correct username and password', 'ladystar');
		}

	} elseif ($_POST['widget_id'] == 'register') {
		
        $error_reg = auth_register();
		if (!$error_reg) {
            wp_redirect(pll_get_page_url('auth') . '?success=email#sw_login');
        }
		
		
	} elseif ($_POST['widget_id'] == 'forget') {

        $error_forget = auth_forget();
        if (!$error_forget) {
            $success_forget = esc_html__('An email with instructions how to restore your account was sent to your email', 'ladystar');
        }

	} elseif ($_POST['widget_id'] == 'recover') {

        $error_recover = auth_recover();
        if (!$error_recover) {
            wp_redirect(pll_get_page_url('auth') . '?success=recover#sw_login');
        }

    }

}

if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case 'email':
            $success = __('Please login now', 'ladystar');
            break;
        case 'recover':
            $success = __('Please login with your new password', 'ladystar');
            break;
    }
	
}

?>

<?php get_header(); ?>

<?php
$custom_js ='';
$custom_js .= "
        jQuery(document).ready(function($){
            if(window.location.hash && window.location.hash.substr(1)=='sw_register') {
                $('.sign-up-form').addClass('active');
                $('.sign-up').addClass('active');
            } else if (window.location.hash && window.location.hash.substr(1)=='sw_forget') {
            	$('.forget-password-form').addClass('active');
            } else if (window.location.hash && window.location.hash.substr(1)=='sw_recover') {
                $('.recover-password-form').addClass('active');
            } else {
                $('.log-in-form').addClass('active');
            }


            $(document).on('click', 'a.forgot-password', function(e) {
            	$('.sign-form-inner div').removeClass('active');
            	$('.forget-password-form').addClass('active');
        	});
        });
        ";
wp_add_inline_script( 'custom-js', $custom_js );
?>

<div class="sign-form-wr">
    <div class="container">
        <div class="sign-form-inner">
            <header class="sign-header">
                <div class="log-in-form tab" data-form="log-in-form"><?php echo esc_html__('Log in', 'ladystar'); ?></div>
                <div class="sign-up tab" data-form="sign-up-form"><?php echo esc_html__('Sign Up', 'ladystar'); ?></div>
            </header>
            <!-- Log In -->
            <div class="form-wr log-in-form">
                <p class="title"><?php echo esc_html__('Log in', 'ladystar'); ?></p>
                <form method="post" action="#sw_login" >
                    <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo $error ?></div>
                	<?php endif; ?>

                	<?php if ($success): ?>
                    <div class="alert alert-info"><?php echo $success ?></div>
                	<?php endif; ?>

                    <input type="text" name="username" placeholder="<?php echo esc_html__('Your Name', 'ladystar'); ?>" class="login" required="">
                    <input type="hidden" name="redirect_to" value="<?php if(isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER'] ?>">
                    <input type="password" name="password" placeholder="<?php echo esc_html__('Password', 'ladystar'); ?>" class="password" required="">
                    <p class="submit">
                        <input type="submit" value="<?php echo esc_html__('Log In', 'ladystar'); ?>" class="submit-btn">
                        <a href="#" class="forgot-password" data-form="forget-password-form"><?php echo esc_html__('Forgot Password?', 'ladystar'); ?></a>
                    </p>
                    <input class="hidden" id="widget_id_login" name="widget_id" type="text" value="login" />
                </form>

            
            </div>
            <!-- End Log In -->
            <!-- Sign In -->
            <div class="form-wr sign-up-form">
                <p class="title"><?php echo esc_html__('Sign Up', 'ladystar'); ?></p>
                <form method="post" action="#sw_register" >

                	<?php if ($error_reg): ?>
                    <div class="alert alert-danger"><?php echo $error_reg ?></div>
                	<?php endif; ?>

	                <input class="form-control" id="username" name="username" type="text" value="<?=($reg_login ?? '')?>" placeholder="<?php echo esc_attr_e('Username', 'ladystar'); ?>" />
	                <input class="form-control" id="email" name="email" type="text" value="<?=($reg_email ?? '')?>" placeholder="<?php echo esc_attr_e('Email', 'ladystar'); ?>" />
	                <input class="form-control" id="password" name="password" type="password" value="" placeholder="<?php echo esc_attr_e('Password', 'ladystar'); ?>" />
	                <input class="form-control" id="confirm_password" name="confirm_password" type="password" value="" placeholder="<?php echo esc_attr_e('Confirm Password', 'ladystar'); ?>" />
	                <input class="hidden" id="widget_id" name="widget_id" type="text" value="register" />

	                <div class="form-check form-check-inline">
	                	<input class="form-check-input" id="terms" name="terms" type="checkbox" value="yes" <?php if ($terms_accept == 1): ?>checked="checked"<?php endif; ?>/>
	                	<label class="form-check-label" for="terms">

	                		<?php echo __('Click here to indicate that you have read and <strong>agree</strong> to the <strong>terms</strong> presented in the <a href="/terms/" target="_blank"><strong>Terms and Conditions agreement</strong></a>', 'ladystar'); ?>
	                	</label>
	                </div>

	                <div class="form-group" style="height: 140px; padding-top: 10px;">
	                    <div class="g-recaptcha" data-size="normal" data-sitekey="6LeXMZsUAAAAAMeghJZm31rbUGwg5NeHCpecfhxI"></div>
	                </div>
					
                    <p class="submit">
                        <input type="submit" value="<?php echo esc_html__('Create Acoount', 'ladystar'); ?>" class="submit-btn">
                    </p>
                </form>
                
            </div>
            <!-- End Sign In -->
            <!-- Forget Password -->
            <div class="form-wr forget-password-form">
                <p class="title"><?php echo esc_html__('Recover password', 'ladystar'); ?></p>
                <form method="post" action="#sw_forget" >
                	<p>
                		<?php echo esc_html__('Please enter your username or email address. You will receive a link to create a new password via email.', 'ladystar'); ?>
                	</p>

                	<?php if ($error_forget): ?>
                    <div class="alert alert-danger"><?php echo $error_forget ?></div>
                	<?php endif; ?>

	                <input class="form-control" id="email" name="email" type="text" value="" placeholder="<?php echo esc_attr_e('Email', 'ladystar'); ?>" />
	                <input class="hidden" id="widget_id" name="widget_id" type="text" value="forget" />
	                

                    <p class="submit">
                        <input type="submit" value="<?php echo esc_html__('Get New Password', 'ladystar'); ?>" class="submit-btn">
                    </p>
                </form>
                
            </div>
            <!-- End Forget Password -->

            <!-- Recover Password -->
            <div class="form-wr recover-password-form">
                <p class="title"><?php echo esc_html__('Recover password', 'ladystar'); ?></p>
                <form method="post" action="#sw_recover" >
                    <p>
                        <?php echo esc_html__('Hint: The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )..', 'ladystar'); ?>
                    </p>

                    <?php if ($error_recover): ?>
                    <div class="alert alert-danger"><?php echo $error_recover ?></div>
                    <?php endif; ?>

                    <input class="form-control" id="password" name="password" type="password" value="" placeholder="<?php echo esc_attr_e('New Password', 'ladystar'); ?>" />
                    <input class="hidden" id="widget_id" name="widget_id" type="text" value="recover" />
                    <input type="hidden" name="rp_key" value="<?php echo esc_attr( $rp_key ); ?>" />

                    <p class="submit">
                        <input type="submit" value="<?php echo esc_html__('Reset Password', 'ladystar'); ?>" class="submit-btn">
                    </p>
                </form>
                
            </div>
            <!-- End Recover Password -->
        </div>
    </div>
</div>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php if(isset($_GET['success']) && $_GET['success']=='email') { 
	$e = array( 'action' => 'user', 'category'=>'register', 'label'=>'new-user');  
	devon_send_event($e); 
 } ?>

<?php get_footer(); ?>