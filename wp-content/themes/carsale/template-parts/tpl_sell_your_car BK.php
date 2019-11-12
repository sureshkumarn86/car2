<?php

/* Template Name: Sell Your Car1  */

get_header();
?>
<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>


<div class="container">

  <?php
	/* Brand */
	$terms = get_terms( array( 
    'taxonomy' => 'brand',
	'hide_empty' => 0,
	'parent'   => 0
	) );
	$trm="";
	$c_trm="";
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		foreach ( $terms as $term ) {
		   $trm.='"'.$term->name.'",';
		    $child_terms = get_terms( 'brand', array( 'parent' => $term->term_id, 'hide_empty' => false ) );
			foreach ( $child_terms as $c_term ) {
				$c_trm.='"'.$c_term->name.'",';   
			}
		}
	}
	$term_val=substr($trm, 0, -1);
	$c_term_val=substr($c_trm, 0, -1);
	
  ?>
 

 
<div class="ui-widget">
<h3>Please Enter your Product Information</h3>
<form id="car_form" name="car_form" method="post" action="" enctype="multipart/form-data">
  <label for="brand"><?php _e('Brand', 'carsale'); ?> </label><div id="brand_error"></div><br/>
  <input id="brand" name="brand"><br/><br/>
  <label for="model"><?php _e('Model', 'carsale'); ?> </label><div id="model_error"></div><br/>
  <input id="model" name="model"><br/><br/>
  <label for="year"><?php _e('Year', 'carsale'); ?> </label><div id="year_error"></div><br/>
  <select name="year" id="year">
    <option value=""><?php _e('Enter Your Year', 'carsale'); ?></option>
	<option value="2013">2018</option>
	<option value="2013">2017</option>
	<option value="2013">2016</option>
	<option value="2013">2015</option>
	<option value="2013">2014</option>
    <option value="2013">2013</option>
    <option value="2012">2012</option>
    <option value="2011">2011</option>
    <option value="2010">2010</option>
    <option value="2009">2009</option>
    <option value="2008">2008</option>
    <option value="2007">2007</option>
    <option value="2006">2006</option>
    <option value="2005">2005</option>
    <option value="2004">2004</option>
    <option value="2003">2003</option>
    <option value="2002">2002</option>
    <option value="2001">2001</option>
    <option value="2000">2000</option>
    <option value="1999">1999</option>
    <option value="1998">1998</option>
    <option value="1997">1997</option>
    <option value="1996">1996</option>
    <option value="1995">1995</option>
    <option value="1994">1994</option>
    <option value="1993">1993</option>
    <option value="1992">1992</option>
    <option value="1991">1991</option>
    <option value="1990">1990</option>
    <option value="1989">1989</option>
    <option value="1988">1988</option>
    <option value="1987">1987</option>
    <option value="1986">1986</option>
    <option value="1985">1985</option>
    <option value="1984">1984</option>
    <option value="1983">1983</option>
    <option value="1982">1982</option>
    <option value="1981">1981</option>
    <option value="1980">1980</option>
    <option value="1979">1979</option>
    <option value="1978">1978</option>
    <option value="1977">1977</option>
    <option value="1976">1976</option>
    <option value="1975">1975</option>
    <option value="1974">1974</option>
    <option value="1973">1973</option>
    <option value="1972">1972</option>
    <option value="1971">1971</option>
    <option value="1970">1970</option>
	</select><br/><br/>
	<label for="fuel"><?php _e('Fuel', 'carsale'); ?> </label><div id="fuel_error"></div><br/>
	<input type="radio" name="fuel" value="Petrol" > <?php _e('Petrol', 'carsale'); ?><br>
	<input type="radio" name="fuel" value="Diesel"> <?php _e('Diesel', 'carsale'); ?><br>
	<input type="radio" name="fuel" value="Electro"> <?php _e('Electro', 'carsale'); ?><br>
	<input type="radio" name="fuel" value="Hybrid"> <?php _e('Hybrid', 'carsale'); ?><br/><br/>
	<label for="doors"><?php _e('Doors', 'carsale'); ?> </label><br/>
	<input type="radio" name="doors" value="2/3" >2/3<br>
	<input type="radio" name="doors" value="4/5">4/5<br/><br/>
	<label for="transmission"><?php _e('Transmission', 'carsale'); ?> </label><div id="trans_error"></div><br/>
	<input type="radio" name="transmission" value="Manual" ><?php _e('Manual', 'carsale'); ?><br>
	<input type="radio" name="transmission" value="Automatic"><?php _e('Automatic', 'carsale'); ?><br/><br/>
	<label for="car_type"><?php _e('Select Your Car Body Type', 'carsale'); ?> </label><br/>
	<input type="radio" name="car_type" value="Convertible" ><?php _e('Convertible', 'carsale'); ?><br>
	<input type="radio" name="car_type" value="Coupe"><?php _e('Coupe', 'carsale'); ?><br/>
	<input type="radio" name="car_type" value="Crossover" ><?php _e('Crossover', 'carsale'); ?><br>
	<input type="radio" name="car_type" value="Fastback" ><?php _e('Fastback', 'carsale'); ?><br>
	<input type="radio" name="car_type" value="Hatchback" ><?php _e('Hatchback', 'carsale'); ?><br>
	<input type="radio" name="car_type" value="Pick-up" ><?php _e('Pick-up', 'carsale'); ?><br>
	<input type="radio" name="car_type" value="Sedan" ><?php _e('Sedan', 'carsale'); ?><br>
	<input type="radio" name="car_type" value="Sportsback" ><?php _e('Sportsback', 'carsale'); ?><br>
	<input type="radio" name="car_type" value="SUV" ><?php _e('SUV', 'carsale'); ?><br>
	<input type="radio" name="car_type" value="Wagon" ><?php _e('Wagon', 'carsale'); ?><br><br/>
	<label for="engine"><?php _e('Engine', 'carsale'); ?> </label><br/>
	<input type="number" name="engine" id="engine" placeholder="<?php _e('Ex:2000', 'carsale'); ?>" value=""><div>CC</div><br/>
	<label for="power"><?php _e('Power', 'carsale'); ?> </label><br/>
	<input type="number" name="power" id="power" placeholder="<?php _e('Ex:143', 'carsale'); ?>" value=""><div>HP</div><br/>
	<label for="condition"><?php _e('Condition', 'carsale'); ?> </label><div id="condition_error"></div><br/>
	<input type="radio" name="condition" value="New" ><?php _e('New car', 'carsale'); ?><br>
	<input type="radio" name="condition" value="Used"><?php _e('Used car', 'carsale'); ?><br/>
	<label for="mileage"><?php _e('Mileage', 'carsale'); ?> </label><div id="mileage_error"></div><br/>
	<input type="number" name="mileage" id="mileage" placeholder="<?php _e('Ex:143', 'carsale'); ?>" value=""><div>Kms</div><br/>
	<label for="specs"><?php _e('Specs(?)', 'carsale'); ?> </label><div id="specs_error"></div><br/>
	<input type="radio" name="specs" value="GCC" ><?php _e('GCC', 'carsale'); ?><br>
	<input type="radio" name="specs" value="American"><?php _e('American', 'carsale'); ?><br/>
	<input type="radio" name="specs" value="Japanese" ><?php _e('Japanese', 'carsale'); ?><br>
	<input type="radio" name="specs" value="European" ><?php _e('European', 'carsale'); ?><br>
	<input type="radio" name="specs" value="Other" ><?php _e('Other', 'carsale'); ?><br><br/>
	<label for="car_color"><?php _e('Choose Your Car Color', 'carsale'); ?> </label><div id="car_color_error"></div><br/>
	<input type="radio" name="car_color" value="#C0C0C0" ><?php _e('Silver', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#000000"><?php _e('Black', 'carsale'); ?><br/>
	<input type="radio" name="car_color" value="Beige" ><?php _e('Beige', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#0000FF" ><?php _e('Blue', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#964B00" ><?php _e('Brown', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#FFD700" ><?php _e('Gold', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#436A0D" ><?php _e('Green', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#FF681F" ><?php _e('Orange', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#660099" ><?php _e('Purple', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#FF0000" ><?php _e('Red', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#FFFFFF" ><?php _e('White', 'carsale'); ?><br>
	<input type="radio" name="car_color" value="#FFFF00" ><?php _e('Yellow', 'carsale'); ?><br><br/>
	<label for="price"><?php _e('Price', 'carsale'); ?> </label><div id="price_error"></div><br/>
	<input type="number" name="price" value="" id="price"><div>AED</div><br/>
	<label for="location"><?php _e('Location', 'carsale'); ?> </label><div id="location_error"></div><br/>
	<select name="location" id="location">
    <option value=""><?php _e('Enter Your Location', 'carsale'); ?></option>
	<option value="Abu Dhabi">Abu Dhabi</option>
	<option value="Ajman">Ajman</option>
	<option value="Al Ain">Al Ain</option>
	<option value="Dubai">Dubai</option>
	</select><br/>
	<label for="exterior"><?php _e('Exterior', 'carsale'); ?> </label><br/>
	<input type="checkbox" class="exterior" value="Alloy Wheels"> <?php _e('Alloy Wheels', 'carsale'); ?><br>
    <input type="checkbox" class="exterior" value="Tow coupling"> <?php _e('Tow Coupling', 'carsale'); ?><br>
	<input type="checkbox" class="exterior" value="Roof rack"> <?php _e('Roof rack', 'carsale'); ?><br>
    <input type="checkbox" class="exterior" value="Xenon lights"> <?php _e('Xenon lights', 'carsale'); ?><br>
	<input type="checkbox" class="exterior" value="Winch"> <?php _e('Winch', 'carsale'); ?><br>
    <input type="checkbox" class="exterior" value="Spot lights"> <?php _e('Spot lights', 'carsale'); ?><br>
	<input type="checkbox" class="exterior" value="Led lights"> <?php _e('Led lights', 'carsale'); ?><br><br/>
	<label for="interior"><?php _e('Interior', 'carsale'); ?> </label><br/>
	<input type="checkbox" class="interior" value="2 Airbags"> <?php _e('2 Airbags', 'carsale'); ?><br>
    <input type="checkbox" class="interior" value="4 Airbags"> <?php _e('4 Airbags', 'carsale'); ?><br>
	<input type="checkbox" class="interior" value="6 Airbags"> <?php _e('6 Airbags', 'carsale'); ?><br>
    <input type="checkbox" class="interior" value="8 Airbags"> <?php _e('8 Airbags', 'carsale'); ?><br>
	<input type="checkbox" class="interior" value="Air Condition"> <?php _e('Air Condition', 'carsale'); ?><br>
    <input type="checkbox" class="interior" value="Heated Seats"> <?php _e('Heated Seats', 'carsale'); ?><br>
	<input type="checkbox" class="interior" value="Navigation system"> <?php _e('Navigation system', 'carsale'); ?><br>
	<input type="checkbox" class="interior" value="Cup holders"> <?php _e('Cup holders', 'carsale'); ?><br>
    <input type="checkbox" class="interior" value="CD audio system"> <?php _e('CD audio system', 'carsale'); ?><br>
	<input type="checkbox" class="interior" value="USB plug"> <?php _e('USB plug', 'carsale'); ?><br>
    <input type="checkbox" class="interior" value="AUX plug"> <?php _e('AUX plug', 'carsale'); ?><br>
	<input type="checkbox" class="interior" value="Bluetooth"> <?php _e('Bluetooth', 'carsale'); ?><br><br/>
	<label for="equipment"><?php _e('Equipment', 'carsale'); ?> </label><br/>
	<input type="checkbox" class="equipment" value="Alarm system"> <?php _e('Alarm system', 'carsale'); ?><br>
    <input type="checkbox" class="equipment" value="Traction control"> <?php _e('Traction control', 'carsale'); ?><br>
	<input type="checkbox" class="equipment" value="Power steering"> <?php _e('Power steering', 'carsale'); ?><br>
    <input type="checkbox" class="equipment" value="Anti-lock bracking"> <?php _e('Anti-lock bracking', 'carsale'); ?><br>
	<input type="checkbox" class="equipment" value="Key less entry"> <?php _e('Keyless entry', 'carsale'); ?><br>
    <input type="checkbox" class="equipment" value="Cruise control"> <?php _e('Cruise control', 'carsale'); ?><br>
	<input type="checkbox" class="equipment" value="Engine immobilizer"> <?php _e('Engine immobilizer', 'carsale'); ?><br>
	<input type="checkbox" class="equipment" value="Power door locks"> <?php _e('Power door locks', 'carsale'); ?><br>
    <input type="checkbox" class="equipment" value="Sunroof"> <?php _e('Sunroof', 'carsale'); ?><br>
	<input type="checkbox" class="equipment" value="Electric mirrors"> <?php _e('Electrin mirrors', 'carsale'); ?><br><br/>
	<label for="description"><?php _e('Description', 'carsale'); ?> </label><div id="desc_error"></div><br/>
	<textarea rows="4" cols="50" id="desc"></textarea><br><br/>
	<label for="car_images"><?php _e('Car Images', 'carsale'); ?> </label><div id="car_image_error"></div><br/>
    <div class= "upload-response"></div>
    <div class = "form-group">
        <label><?php __('Select Files:', 'cvf-upload'); ?></label>
        <input type = "file" id="files" name = "files[]" accept = "image/*" class = "files-data form-control" multiple />
    </div>
    <!--<div class = "form-group">
        <input type = "submit" value = "Upload" class = "btn btn-primary btn-upload" />
    </div>-->
	
	 <?php
	 if(is_user_logged_in())
	 {
	 $current_user=get_currentuserinfo();
	 ?><input type="hidden" name="user_id" id="user_id" value="<?php echo get_current_user_id();?>">
	 <label for="u_name"><?php _e('Name', 'carsale'); ?> </label><br/>
	 <div><?php echo $current_user->user_login;?></div><br/>
	 <label for="u_email"><?php _e('Email', 'carsale'); ?> </label><br/>
	 <div><?php echo $current_user->user_email;?></div><br/>
	 <label for="u_mobile"><?php _e('Mobile', 'carsale'); ?> </label><div id="mobile_error"></div><br/>
	 <input type="text" name="mobile" id="mobile"><br/>
	 <?php
	 }
	 ?>
	 
	 <input type="button" name="sell_submit" id="sell_submit" value="<?php _e('Submit', 'carsale'); ?>">
	 </form>
	 <br/><br/><br/>
</div>

 </div>

<?php get_footer(); ?>