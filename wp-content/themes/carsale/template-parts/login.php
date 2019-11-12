<?php 


get_header();
?>

<div id="signfrms" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
       
		<div class="form-content-box">
		<!-- Login form -->

		<div class="sarav_login_form">
		<div class="Details">
			<h3><?php echo __('Login','carsale'); ?></h3>
			<!-- form -->
			<form action="" id="sarav_login" method="POST">
				<div class="logmsg" id="logmsg"></div>
				<div class="form-group">
					<input type="text" name="username" class="input-text" id="username" placeholder="<?php echo __('Email Address','carsale'); ?>">
				</div>
				<div class="form-group">
					<input type="password" name="login_pwd" class="input-text" id="login_pwd" placeholder="<?php echo __('Password','carsale'); ?>">
				</div>
				<div class="form-group checkbox">
					<div class="ez-checkbox pull-left">
						<label>
							<input type="checkbox" class="ez-hide">
							<?php echo __('Remember me','carsale'); ?>
						</label>
					</div>
					<a href="javascript:void(0)" class="showreset link-not-important pull-right"><?php echo __('Forgot Password','carsale'); ?></a>
					<div class="clearfix"></div>
				</div>
				<input type="hidden" name="redirecturl" id="redirecturl" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
				<div class="form-group"> 
					<button type="button" id="login_here" class="btn btn-submit btn-block"><?php echo __('login','carsale'); ?></button>
				</div>
				
		   </form>
		   <hr> 
		   <?php do_action( 'wordpress_social_login' ); ?> 
		   <!-- Social list 2
			<ul class="social-list-2">
				<li>
					<a href="#" class="facebook-bg">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
				<li>
					<a href="#" class="twitter-bg">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="#" class="google-bg">
						<i class="fa fa-google"></i>
					</a>
				</li>
				<li>
					<a href="#" class="linkedin-bg">
						<i class="fa fa-linkedin"></i>
					</a>
				</li>
				<li>
					<a href="#" class="pinterest-bg">
						<i class="fa fa-pinterest"></i>
					</a>
				</li>
			</ul> -->
		</div>
		<!-- Footer -->
		<div class="footer">
			<span>
				<?php echo __('New User','carsale'); ?> <a href="javascript:void(0)" class="showreg"><?php echo __('Sign up now','carsale'); ?></a>
			</span>
		</div>
		</div><!--loginform-->


		<div class="sarav_forgot_form" style="display:none;">
		<div class="Details">
			<h3><?php echo __('Forgot Password','carsale'); ?></h3>
			<!-- form -->
			<form id="sarav_forgot"  method="POST">
				<div class="forgotmsg" id="forgotmsg"></div>			
				<div class="form-group">
					<input type="text" name="email_address" class="input-text" id="email_address" placeholder="<?php echo __('Username / Email Address','carsale'); ?>">
				</div>
				<div class="form-group">
					<button type="button" id="forgot_pwd" class="btn btn-submit btn-block"><?php echo __('Reset','carsale'); ?></button>
				</div>
			</form>
		</div>
		<div class="footer">
			<span>
				<?php echo __('New User','carsale'); ?> <a href="javascript:void(0)" class="showreg"><?php echo __('Sign up now','carsale'); ?></a>
			</span>
		</div>
		</div><!--forgot_form-->


		<div class="sarav_register_form"  style="display:none;">
		<div class="Details">
			<h3><?php echo __('Signup','carsale'); ?></h3>
			<!-- form -->
			<form  id="sarav_register"  method="POST">
				<div class="regmsg" id="regmsg"></div>
				<div class="form-group">
					<input type="text" name="reg_name" class="input-text" id="reg_name" placeholder="<?php echo __('Enter your name','carsale'); ?>">
				</div>
				<div class="form-group">
					<input type="email" name="reg_email" class="input-text" id="reg_email" placeholder="<?php echo __('Email Address','carsale'); ?>">
				</div>
				<div class="form-group">
					<input type="password" name="reg_pwd" class="input-text" id="reg_pwd" placeholder="Password">
				</div>
				<div class="form-group">
					<input type="password" name="reg_cpwd" class="input-text" id="reg_cpwd" placeholder="<?php echo __('Confirm Password','carsale'); ?>">
				</div>
				<div class="form-group">
					<button type="button" id="register_here" class="btn btn-submit btn-block"><?php echo __('Signup','carsale'); ?></button>
				</div>
				<input type="hidden" name="regdirecturl" id="regdirecturl" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
		   </form>
		   <hr>
		   <?php do_action( 'wordpress_social_login' ); ?> 
		   <!-- Social list 2 
			<ul class="social-list-2">
				<li>
					<a href="#" class="facebook-bg">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
				<li>
					<a href="#" class="twitter-bg">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="#" class="google-bg">
						<i class="fa fa-google"></i>
					</a>
				</li>
				<li>
					<a href="#" class="linkedin-bg">
						<i class="fa fa-linkedin"></i>
					</a>
				</li>
				<li>
					<a href="#" class="pinterest-bg">
						<i class="fa fa-pinterest"></i>
					</a>
				</li>
			</ul> -->
		</div>
		<!-- Footer -->
		<div class="footer">
			<span>
				<?php echo __('Already have an account?','carsale'); ?> <a href="javascript:void(0)" class="showlogin"><?php echo __('Login','carsale'); ?></a>
			</span>
		</div>
		</div><!--register form-->
		</div>
		
      </div>
      
    </div>

  </div>
</div>


<?php get_footer(); ?>