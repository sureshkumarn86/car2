<?php

/* Template Name: User Favorite*/

get_header();
?>
<div class="dash_main">
	<?php get_sidebar('user'); ?>
	<div class="dash_inner_wrapper" id="page-wrapper">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><?php _e('My Favourite', 'carsale'); ?></h3>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row dash_content">
			<div class="col-md-12 col-sm-12 col-xs-12 ">
			<?php
			if(is_user_logged_in()){
			$u_id=get_current_user_id();				
			$user_fav=get_user_meta($u_id,'user_favourite',true);
			$exp_user_fav=explode(",",$user_fav);	
				
				$args = array(
				   'post_type' => 'cars',
				   'post__in'      => $exp_user_fav
				);
				
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post();  
				
				get_template_part( 'template-parts/content', 'listing' );
				endwhile; 
				 wp_reset_postdata();
				?>
				<?php endif;
			}				
			?>
				
			</div>
		</div>
	</div>
</div>				
<?php 
get_footer();
?>