<div class="b-items__cars-one wow zoomInUp" id="<?php echo get_the_ID();?>" data-wow-delay="0.5s" >
<?php		
	$imgg=get_post_meta(get_the_ID(),'car_image',true);	
	$exp_image=explode(",",$imgg);		
	$thumb_url=wp_get_attachment_url( $exp_image[0] );
	//echo $thumb_url[0];
	?>
	<div class="b-items__cars-one-img">		
		<img src="<?php echo $thumb_url;?>" alt="dodge">
		<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>
		<span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
		<form action="/" method="post">
			<input type="checkbox" name="check1" id="check1">
			<label for="check1" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
		</form>
	</div>
	<div class="b-items__cars-one-info">
		<header class="b-items__cars-one-info-header s-lineDownLeft">
			<h2><?php the_title();?></h2>
			<span>$<?php echo get_post_meta(get_the_ID(),'car_price',true);?></span>
		</header>
		<p>
			<?php the_content();?>
		</p>
		<div class="b-items__cars-one-info-km list_car_detail">
			<ul>
				<li><span class="icon icon-calendar"></span> <?php echo get_post_meta(get_the_ID(),'car_year',true);?></li>
				<li><span class="icon icon-meter"></span> <?php echo get_post_meta(get_the_ID(),'car_mileage',true);?>KM</li>
				<li><span class="icon icon-fuel"></span> <?php echo get_post_meta(get_the_ID(),'car_fuel',true);?></li>
				<li><span class="icon icon-engine"></span> <?php echo get_post_meta(get_the_ID(),'car_enginecc',true);?> CC</li>
			</ul>
		</div>
		<div class="b-items__cars-one-info-details">
			<div class="b-featured__item-links">
				<a href="#">Registered 2015</a>
				<a href="#"><?php echo get_post_meta(get_the_ID(),'car_condition',true);?></a>
				<a href="#">8-Speed Automatic</a>
				<a href="#">Petrol</a>
				<a href="#">Petrol</a>
				<a href="#">Petrol</a>
				<a href="#">Petrol</a>
			</div>			
			<?php			
			$u_id=get_current_user_id();
			$user_fav=get_user_meta($u_id,'user_favourite',true);
			$exp_user_fav=explode(",",$user_fav);
			$listing_id=get_the_ID();
			if(in_array($listing_id, $exp_user_fav))
			{
			?>
			<!--<input type="button" name="favourite" id="favourite" value="saved">-->
			<?php				
			}							
			else							
			{							
			?>							
			<!--<input type="button" name="favourite" id="favourite" value="save">	-->
			<?php							
			}				
			?>
			<a href="#" class="btn m-btn"><?php echo __('VIEW DETAILS','carsale'); ?><span class="fa fa-angle-right"></span></a>
		</div>
	</div>
</div>