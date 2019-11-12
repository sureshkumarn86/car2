<?php

/* Template Name: User ads */

get_header();
?>
<div class="dash_main">
	<?php get_sidebar('user'); ?>
	<div class="dash_inner_wrapper" id="page-wrapper">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<div class="row">
					<div class="col-lg-12">						<?php						$u_id=get_current_user_id();						$query_args		    = array(						'post_type'     => 'cars',						'post_status'   => 'publish',						'author'		=> $u_id						);												$query = new WP_Query( $query_args );						?>
						<h3 class="page-header">
						<?php _e('My Ads', 'carsale'); ?>( <?php echo $query->post_count;?> )</h3>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row dash_content">
			<div class="col-md-12 col-sm-12 col-xs-12 ">				<?php
									if ( $query->have_posts() ) : 					while ( $query->have_posts() ) : $query->the_post();  										get_template_part( 'template-parts/content', 'listing' );					endwhile; 					 wp_reset_postdata();					 endif;								?>
			</div>
		</div>
	</div>
</div>				
<?php 
get_footer();
?>