<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<?php			
			$userid=get_current_user_id();
			$prof=get_user_meta($userid,'profile_image',true);
			$current_user=get_currentuserinfo();			?>
			<div class="user_banner" style="background-image:url(https://www.1clickdrive.com/uploads/passport/1523383730section-hero-background.jpg);">
				<div class="user_banner_inner text-center">
					<div class="user_img" style="background-image:url(<?php echo $prof;?>);">						
					</div>
					<h3><?php echo $current_user->user_login;?></h3>
					<div class="member_since"><p>Member since: 09th, Jun 2018</p></div>
					<div class="edit_ac"><a href="<?php echo site_url().'/dashboard/user-info/' ?>">Edit My Account</a></div>
					<div class="ac_logout"><a href="<?php echo wp_logout_url(site_url()); ?>">Logout</a></div>
				</div>
			</div>
			<ul class="nav in" id="side-menu">
				<li>
					<a href="<?php echo site_url().'/dashboard/' ?>" class="active"><i class="fa fa-dashboard fa-fw"></i> My Dashboard</a>
				</li>
				<li>
					<a href="<?php echo site_url().'/dashboard/my-ads/' ?>"><i class="fa fa-car fa-fw"></i> My Ads</a>
				</li>
				<li>
					<a href="<?php echo site_url().'/dashboard/favorite/' ?>"><i class="fa fa-star fa-fw"></i> My Favourite</a>
				</li>
				<li>
					<a href="<?php echo site_url().'/dashboard/update-account/' ?>"><i class="fa fa-edit fa-fw"></i> Update Account</a>
				</li>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>