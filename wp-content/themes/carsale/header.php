<!doctype html>
<html  <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php 
		$settings = get_option( "ilc_theme_settings" );
		if($settings['st_favicon']){
			echo '<link rel="shortcut icon" type="image/x-icon" href="'.$settings['st_favicon'].'" />';
		}
		?>
		<!--[if lt IE 9]>
			<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	</head>
<body  <?php body_class('m-index'); ?>>

<div class="wrapper">

	<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->


		<nav class="b-nav">
			<div class="container">
			
				<div class="b-nav__list wow slideInRight" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: slideInRight;">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="http://saravanank.com/car/wp-content/uploads/2018/06/logo.png" alt=""/></a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse navbar-main-slide" id="nav">
						<ul class="navbar-nav-menu">
							<li><a href="<?php echo site_url(); ?>"><img src="http://saravanank.com/car/wp-content/uploads/2018/06/logo.png" alt=""></a></li>
							<li class="dropdown Bar__lang">
								<a class="m-langLink dropdown-toggle" data-toggle="dropdown" href="#"><span class="b-topBar__lang-flag m-en"></span>EN<span class="fa fa-caret-down"></span></a>
								<ul class="dropdown-menu h-lang pull-right">
									<li><a class="m-langLink dropdown-toggle" data-toggle="dropdown"
									href="http://saravanank.com/car/en/" ><span class="b-topBar__lang-flag m-en"><img src="http://saravanank.com/car/wp-content/plugins/qtranslate-x/flags/gb.png"/></span>EN</a></li>
									<li><a class="m-langLink dropdown-toggle" data-toggle="dropdown" href="http://saravanank.com/car/ar/"><span class="b-topBar__lang-flag m-ae"><img src="http://saravanank.com/car/wp-content/plugins/qtranslate-x/flags/arle.png"/></span>AE</a></li>
								</ul>
							</li>
							<li class="menu-search"><a href="#"><i class="fa fa-search"></i></a></li>
							<li class="menu-sell"><a href="#">Sell your car</a></li>
							
							
							<?php 
							if(is_user_logged_in()){
								echo '<li class="menu-logout"><a href="'.site_url().'/dashboard">My Account</a></li>';
							}
							else{
								echo '<li class="menu-login"><a href="#">Sign in / Register</a></li>';
							}
							?>							
							<li><a href="#">Car News</a></li>
							<li><a href="#">Used Cars</a></li>
							<li><a href="#">New Cars</a></li>
						</ul>
							<?php 
								$headernav=array (
									'theme_location' => 'primary_nav',
									'menu_class' => 'navbar-nav-menu',
									'container_class' => 'collapse navbar-collapse'
								);
								/* wp_nav_menu($headernav); */
							?>
					</div>
				</div>
					
			</div>
		</nav><!--b-nav-->
		
		

		<!--Main-->   
		<!--[:en]English[:de]Deutsch[:]-->