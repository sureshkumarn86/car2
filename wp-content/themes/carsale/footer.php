<div class="clearfix"></div>
		<div class="b-features">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
						<ul class="b-features__items">
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car Dealership</li>
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--b-features-->

		<div class="b-info">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
							<article class="b-info__aside-article">
								<h3>Follow us</h3>
								<div class="b-footer__content-social">
								<a href="#"><span class="fa fa-facebook-square"></span></a>
								<a href="#"><span class="fa fa-twitter-square"></span></a>
								<a href="#"><span class="fa fa-google-plus-square"></span></a>
								<a href="#"><span class="fa fa-linkedin-square"></span></a>
								<a href="#"><span class="fa fa-youtube-square"></span></a>
								</div>
							</article>
							<article class="b-info__aside-article">
								<h3>About us</h3>
								<p>Vestibulum varius od lio eget conseq
									uat blandit, lorem auglue comm lodo 
									nisl non ultricies lectus nibh mas lsa 
									Duis scelerisque aliquet. Ante donec
									libero pede porttitor dacu msan esct
									venenatis quis.</p>
							</article>
							<a href="about.html" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
						</aside>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="b-info__latest">
							<h3>LATEST BLOG POSTS</h3>
							<div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
								<div class="b-info__latest-article-photo m-audi">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.svg" alt=""/>
								</div>
								<div class="b-info__latest-article-info">
									<h6><a href="#">MERCEDES-AMG GT S</a></h6>
									<p><span class="fa fa-tachometer"></span> 35,000 KM</p>
								</div>
							</div>
							<div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
								<div class="b-info__latest-article-photo m-audiSpyder">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.svg" alt=""/>
								</div>
								<div class="b-info__latest-article-info">
									<h6><a href="#">AUDI R8 SPYDER V-8</a></h6>
									<p><span class="fa fa-tachometer"></span> 35,000 KM</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="b-info__twitter sitemap">
							<h3>Sitemap</h3>
							<ul>
								<li><a href="#">Browse New Car Guide</a></li>
								<li><a href="#">Used Cars </a></li>
								<li><a href="#">Compare Cars </a></li>
								<li><a href="#">Car Reviews </a></li>
								<li><a href="#">Car News </a></li>
								<li><a href="#">Auto Companies</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">
							<p>contact us</p>
							<div class="b-info__contacts-item">
								<span class="fa fa-map-marker"></span>
								<em>786 Lorem Ipsum is simply dummy text of the printing ,
									Dubai 00126 UAE</em>
							</div>
							<div class="b-info__contacts-item">
								<span class="fa fa-phone"></span>
								<em>Phone:  1-800- 624-5462</em>
							</div>
							<div class="b-info__contacts-item">
								<span class="fa fa-fax"></span>
								<em>FAX:  1-800- 624-5462</em>
							</div>
							<div class="b-info__contacts-item">
								<span class="fa fa-envelope"></span>
								<em>Email:  info@domain.com</em>
							</div>
						</address>
					</div>
				</div>
			</div>
		</div><!--b-info-->
	
		<footer class="b-footer">
			<a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
			<div class="container">
				<div class="row">
					<div class="col-xs-4">
						<div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
							<p>&copy; <?php echo date('Y') ?> All Rights Reserved by <?php echo bloginfo('name'); ?>.</p>
						</div>
					</div>
					<div class="col-xs-8">
						<div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
							<nav class="b-footer__content-nav">
								<?php 
									wp_nav_menu( array(
										'theme_location' => 'footer_nav'
									));
								?>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer><!--b-footer-->
		
</div><!--wrapper-->




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
		   <?php echo do_action( 'wordpress_social_login' ); ?> 
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
		   <?php  echo do_action( 'wordpress_social_login' ); ?> 
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



<?php wp_footer(); ?>
</body>
</html>