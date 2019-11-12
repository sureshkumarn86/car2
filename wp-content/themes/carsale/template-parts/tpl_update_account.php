<?php

/* Template Name: User update account */

get_header();
?>
<div class="dash_main">
	<?php get_sidebar('user'); ?>
	<div class="dash_inner_wrapper" id="page-wrapper">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><?php _e('Update My Account', 'carsale'); ?></h3>
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
				<div class="form_dash">
				<div id="resp"></div>
				<form action="" method="POST" class="user_prof_update" enctype="multipart/form-data">
					<div class="form-group">
					<label><?php _e('Name:', 'carsale'); ?> </label>					
					<input type="text"  class="form-control" name="nickname" id="nickname" placeholder="<?php _e('Name:', 'carsale'); ?>" value="<?php echo $nick_nm;?>" />
					</div>
					<input type="hidden" name="u_id" id="u_id" value="<?php echo $user_id;?>"/>
					<div class="form-group input-group">
						<span class="input-group-addon">+971</span>
						<input type="text" id="userphone" name="userphone" class="form-control" placeholder="<?php _e('Phone number:', 'carsale'); ?>" value="<?php echo $mob_no;?>"/>
					</div>
					
					<div class="form-group">
						<label><?php _e('Email Id:', 'carsale'); ?></label>
						<p class="usedmail">
						<?php $current_user=get_currentuserinfo();
						echo $current_user->user_email; ?>
						</p>
					</div>
					<div class="form-group">
						<label><?php _e('Description (Max 100 Characters):', 'carsale'); ?></label>
						<textarea id="userdesc" rows="5" class="form-control" name="userdesc" placeholder="<?php _e('Description:', 'carsale'); ?>"><?php echo $descr; ?></textarea>
					</div>
					<div class="form-group">						
						<label><?php _e('Upload Image (Recommended size in Pixel) [100 x 100]:', 'carsale'); ?></label>
						<div class="prf_img">
							<label><?php _e('Choose Profile Image', 'carsale'); ?></label>
							<input type="file" class="form-control" name="userimage" id="userimage" />
						</div>
					</div>

					<div class="form-group text-center">
						<button type="button" class="btn btn-primary update_profile"><?php _e('Update', 'carsale'); ?></button>
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