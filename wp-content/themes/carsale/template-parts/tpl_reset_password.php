<?php

/* Template Name: Reset Password */

get_header();
?>

</br>
</br></br>
<div class="container">
<?php
if(isset($_POST['reset_pwd']))
{
$errors = new WP_Error();
$user = check_password_reset_key($_GET['key'], $_GET['login']);

if ( is_wp_error( $user ) ) {
    if ( $user->get_error_code() === 'expired_key' )
        echo "Key is expired";
    else
        echo "Key is not valid";
}
else
{
	
	$u_name=get_user_by('login', $_GET['login']);
	$new_rst_pwd=$_POST['new_rst_pwd'];
	$confrm_pwd=$_POST['confrm_pwd'];
	//print_r($u_name);
	if($new_rst_pwd == $confrm_pwd)
	{
		global $wpdb;
		wp_update_user( array ('ID' => $u_id, 'user_pass' => $new_rst_pwd) ) ;
		$wpdb->update($wpdb->users, array('user_activation_key' => ""), array('user_login' => $_GET['login']));
		echo "Password updated";
	}
	else
	{
		echo "Password didnt Match";
	}
}
}


//print_r($_SESSION);
?>
<form method="POST" action="" name="reset_pwd">
<h3>
<?php echo __('Reset Password','carsale'); ?></h3>
<label><?php echo __('New Password: ','carsale'); ?></label>
<input type="password" id="new_rst_pwd" name="new_rst_pwd" value=""/><br/>
<label><?php echo __('Confirm Password: ','carsale'); ?></label>
<input type="password" id="confrm_pwd" name="confrm_pwd" value=""/><br/>
<input type="submit" id="reset_pwd" name="reset_pwd" value="<?php echo __('Reset','carsale'); ?>"/>
</form>
</div>
</br></br></br></br></br></br>

<br/><br/><br/>
<?php 
get_footer();
?>