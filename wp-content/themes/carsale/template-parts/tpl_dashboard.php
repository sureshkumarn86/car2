<?php

/* Template Name: Dashboard  */

get_header();
?>
<?php 
/* $cont=array();
$cont[]=array('id',array('test'=>1)); 
print_r($cont); */
?>
<div class="dash_main">
	<?php get_sidebar('user'); ?>
	<div class="dash_inner_wrapper" id="page-wrapper">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 dash_content">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><?php _e('Dashboard', 'carsale'); ?></h3>
					</div>
				</div>
				
				<div class="row dashboard_all">
					<div class="col-lg-4  col-md-4  col-sm-6  col-xs-12">
						<div class="panel panel-primary">
							<a href="<?php echo site_url().'/sell-your-car/' ?>" title="Sell Your Car">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-car fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">
										<?php
											if(is_user_logged_in())
											{
												$u_id=get_current_user_id();
												echo count_user_posts( $u_id , "cars"  );
											}
										?>
										</div>
										<div class="desc"><?php _e('Sell Your Car', 'carsale'); ?></div>
									</div>
								</div>
							</div>
							
								<div class="panel-footer">
									<span class="pull-left"><?php _e('View Details', 'carsale'); ?></span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4  col-md-4  col-sm-6  col-xs-12">
						<div class="panel panel-green">
							<a href="<?php echo site_url().'/dashboard/favorite/' ?>" title="Favorite">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-heart fa-3x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge">
											<?php
											if(is_user_logged_in()){
												$u_id=get_current_user_id();				
												$user_fav=get_user_meta($u_id,'user_favourite',true);
												$exp_user_fav=explode(",",$user_fav);
												echo sizeof($exp_user_fav);
												}
											?>											
											</div>
											<div  class="desc"><?php _e('Favorite your Liked Cars', 'carsale'); ?></div>
										</div>
									</div>
								</div>
							
								<div class="panel-footer">
									<span class="pull-left"><?php _e('View Details', 'carsale'); ?></span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					
					
					<div class="col-lg-4  col-md-4  col-sm-6  col-xs-12">
						<div class="panel panel-red">
							<a href="<?php echo site_url().'/dashboard/update-account/' ?>">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-edit fa-3x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"><br></div>
											<div  class="desc"><?php _e('Update Profile', 'carsale'); ?></div>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<span class="pull-left"><?php _e('View Details', 'carsale'); ?></span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php 
get_footer();
?>