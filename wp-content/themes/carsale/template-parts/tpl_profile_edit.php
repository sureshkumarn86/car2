<?php

/* Template Name: Profile Edit*/

get_header();
?>
<div class="dash_main">
	<?php get_sidebar('user'); ?>
	<div class="dash_inner_wrapper" id="page-wrapper">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><?php _e('Edit My Account', 'carsale'); ?></h3>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row dash_content">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
			<?php						
			$user_id=get_current_user_id();
			$nick_nm=get_user_meta($user_id,'nickname',true);
			$mob_no=get_user_meta($user_id,'mobile_no',true);
			$descr=get_user_meta($user_id,'description',true);
			?>
				<div id="resp_prof"></div>
				<div class="form_dash">
				<form action="" method="POST" class="user_prof_edit" enctype="multipart/form-data">
					<div class="form-group">
					<label><?php _e('Name', 'carsale'); ?>: </label>
					<input type="text"  class="form-control" name="nickname" id="nicknme" placeholder="<?php _e('Name', 'carsale'); ?>" value="<?php echo $nick_nm;?>"/>
					</div>
					
					<div class="form-group input-group">
						<span class="input-group-addon">+971</span>
						<input type="text" class="form-control" id="mobno" placeholder="<?php _e('Phone number', 'carsale'); ?>" value="<?php echo $mob_no;?>">
					</div>
					<input type="hidden" name="u_id" id="u_id" value="<?php echo $user_id;?>"/>
					<div class="form-group">
						<label><?php _e('Email Id', 'carsale'); ?>:</label>
						<p class="usedmail"><?php $current_user=get_currentuserinfo();
						echo $current_user->user_email; ?></p>
					</div>
					<div class="form-group">
						<a href="#"><label><?php _e('Change Password', 'carsale'); ?></label></a>
						<div class="chgpassword">
							<label><?php _e('Password', 'carsale'); ?></label>
							<input type="password" id="old_pwd" class="form-control" placeholder="<?php _e('Old Password', 'carsale'); ?>">
							<input type="password" id="new_pwd" class="form-control" placeholder="<?php _e('New Password', 'carsale'); ?>">
							<input type="password" id="confrm_pwd" class="form-control" placeholder="<?php _e('Confirm Password', 'carsale'); ?>">
						</div>
					</div>
					<div class="form-group text-center">
						<button type="button" class="btn btn-primary profile_edit"><?php _e('Update', 'carsale'); ?></button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>				
<?php 
get_footer();
?>