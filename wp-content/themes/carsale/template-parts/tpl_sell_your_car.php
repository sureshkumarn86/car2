<?php

/* Template Name: Sell Your Car  */

get_header();
?>

<section class="b-pageHeader">
	<div class="container">
		<h1 class="wow zoomInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInLeft;">Submit Your Vehicle</h1>
		<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInRight;">
			<h3>Add Your Vehicle In Our Listings</h3>
		</div>
	</div>
</section>


<div class="b-breadCumbs s-shadow">
	<div class="container wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
		<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="submit1.html" class="b-breadCumbs__page m-active">Submit a Vehicle</a>
	</div>
</div>


<div class="b-infoBar">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
				<div class="b-infoBar__progress wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
					<div class="b-infoBar__progress-line clearfix">
						<div class="b-infoBar__progress-line-step">
							<div class="b-infoBar__progress-line-step-circle">
								<div class="b-infoBar__progress-line-step-circle-inner m-active"></div>
							</div>
						</div>
						<div class="b-infoBar__progress-line-step">
							<div class="b-infoBar__progress-line-step-circle">
								<div class="b-infoBar__progress-line-step-circle-inner"></div>
							</div>
						</div>
						<div class="b-infoBar__progress-line-step">
							<div class="b-infoBar__progress-line-step-circle">
								<div class="b-infoBar__progress-line-step-circle-inner"></div>
							</div>
						</div>
						<div class="b-infoBar__progress-line-step">
							<div class="b-infoBar__progress-line-step-circle">
								<div class="b-infoBar__progress-line-step-circle-inner"></div>
							</div>
							<div class="b-infoBar__progress-line-step-circle m-last">
								<div class="b-infoBar__progress-line-step-circle-inner"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="b-submit">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
				<?php  include('tpl_sidebar_sellyour_car.php'); ?>
			</div>
			
			<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
				<?php  include('tpl_sell_car_form.php'); ?>
			</div>
		</div>
	</div>
</div>				

<?php get_footer(); ?>