<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
?>
	<section class="b-pageHeader">
		<div class="container">
			<h1 class="wow zoomInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInLeft;">Auto Listings</h1>
			<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInRight;">
				<h3>Your search returned 28 results</h3>
			</div>
		</div>
	</section><!--b-pageHeader-->

	<div class="b-breadCumbs s-shadow">
		<div class="container wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
			<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="listings.html" class="b-breadCumbs__page m-active">Search Results</a>
		</div>
	</div><!--b-breadCumbs-->

	<div class="b-infoBar">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-xs-12">
					<div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
						<div class="dropdown">
							<a href="#" class="dropdown-toggle b-infoBar__compare-item" data-toggle="dropdown"><span class="fa fa-clock-o"></span>RECENTLY VIEWED<span class="fa fa-caret-down"></span></a>
							<ul class="dropdown-menu">
								<li><a href="detail.html">Item</a></li>
								<li><a href="detail.html">Item</a></li>
								<li><a href="detail.html">Item</a></li>
								<li><a href="detail.html">Item</a></li>
							</ul>
						</div>
						<a href="compare.html" class="b-infoBar__compare-item"><span class="fa fa-compress"></span>COMPARE VEHICLES: 2</a>
					</div>
				</div>
				<div class="col-lg-8 col-xs-12">
					<div class="b-infoBar__select">
						<form method="post" action="/">
							<div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
								<span class="b-infoBar__select-one-title">SELECT VIEW</span>
								<a href="#" class="m-list m-active"><span class="fa fa-list"></span></a>
								<a href="#" class="m-table"><span class="fa fa-table"></span></a>
							</div>
							<div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
								<span class="b-infoBar__select-one-title">SHOW ON PAGE</span>
								<select name="select1" class="m-select">
									<option value="" selected="">10 items</option>
								</select>
								<span class="fa fa-caret-down"></span>
							</div>
							<div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
								<span class="b-infoBar__select-one-title">SORT BY</span>
								<select name="select2" class="m-select">
									<option value="" selected="">Last Added</option>
								</select>
								<span class="fa fa-caret-down"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!--b-infoBar-->

	<section class="b-items s-shadow">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-sm-8 col-xs-12">
					<div class="b-items__cars">
						<?php  
							while ( have_posts() ) : the_post();
							
								get_template_part( 'template-parts/content', 'listing' );
							
							endwhile;
						?>
					</div>
					
					<div class="b-items__pagination wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
						<div class="b-items__pagination-main">
							<a data-toggle="modal" data-target="#myModal" href="#" class="m-left"><span class="fa fa-angle-left"></span></a>
							<span class="m-active"><a href="#">1</a></span>
							<span><a href="#">2</a></span>
							<span><a href="#">3</a></span>
							<span><a href="#">4</a></span>
							<a href="#" class="m-right"><span class="fa fa-angle-right"></span></a>    
						</div>
					</div>
				</div>
				
				<div class="col-lg-3 col-sm-4 col-xs-12">
					<?php get_sidebar('cars'); ?>
				</div>
			</div>
		</div>
	</section><!--b-items-->
		
<?php 
get_footer();
?>