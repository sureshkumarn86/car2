<?php
/*
	*Car Sale Theme functions*
*/


function mytheme_localisation(){

    function mytheme_localised( $locale ) {
        if ( isset( $_GET['l'] ) ) {
            return sanitize_key( $_GET['l'] );
        }
        return $locale;
    }
    add_filter( 'locale', 'mytheme_localised' );
    load_theme_textdomain( 'carsale', get_template_directory() . '/languages' );
	
	function whead(){
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
		   $trm.="".$term->name.",";
		    $child_terms = get_terms( 'brand', array( 'parent' => $term->term_id, 'hide_empty' => false ) );
			foreach ( $child_terms as $c_term ) {
				$c_trm.="'".$c_term->name."',";   
			}
		}
	}
	$term_val=substr($trm, 0, -1);
	$c_term_val=substr($c_trm, 0, -1);

	?>
	<script>
		var adminajax="<?php echo admin_url('admin-ajax.php'); ?>";
		 var parent_term="<?php echo $term_val;?>";
	</script>
	<?php
	}
	add_action('wp_head','whead');
	
}
add_action( 'after_setup_theme', 'mytheme_localisation' );



function sarav_starter_setup() {


add_image_size( 'car-medium-thumb', 300, 220 );
add_image_size( 'car-small-thumb', 120, 70 ); 

/*Hide wp admin bar*/
show_admin_bar(false);



/* Theme options */
require_once('inc/theme.php');

/*Custom functions*/
require_once('inc/custom_functions.php');

/*ajax functions*/
require_once('inc/ajax-functions.php');


	
/* Add default posts and comments RSS feed links to head.*/
add_theme_support( 'automatic-feed-links' );

/* Let WordPress manage the document title.*/
add_theme_support( 'title-tag' );


/*Enable support for Post Thumbnails on posts and pages.*/
add_theme_support( 'post-thumbnails' );


}
add_action( 'after_setup_theme', 'sarav_starter_setup' );



function sarav_theme_register_menus() {
  register_nav_menus(
    array(  
		'top_nav' => __( 'Topbar Navigation' ),
    	'primary_nav' => __( 'Header Navigation' ), 		
    	'footer_nav' => __( 'Footer Navigation' )
    )
  ); 
} 
add_action( 'init', 'sarav_theme_register_menus' );


function sarav_theme_site_widgets() {
	register_sidebar( 
		array(		
		'name'          => esc_html__( 'Sidebar', 'carsale' ),		
		'id'            => 'sidebar-default',	
		'description'   => esc_html__( 'Add widgets here.', 'carsale' ),	
		'before_widget' => '<div id="%1$s" class="%2$s footer_wrapper">',		
		'after_widget'  => '</div>',	 	
		'before_title'  => '<h4 class="widget-title">',		
		'after_title'   => '</h4>',	
		)	 		
	);
	register_sidebar( 
		array(		
		'name'          => esc_html__( 'Footer Widget 1', 'carsale' ),	
		'id'            => 'footer1',	
		'description'   => esc_html__( 'Add widgets here.', 'carsale' ),	
		'before_widget' => '<div id="%1$s" class="%2$s footer_wrapper">',		
		'after_widget'  => '</div>',	 	
		'before_title'  => '<h4>',		
		'after_title'   => '</h4>',	
		)	 		
	);
	register_sidebar( 
	array(		
		'name'          => esc_html__( 'Footer Widget 2', 'carsale' ),
		'id'            => 'footer2',	
		'description'   => esc_html__( 'Add widgets here.', 'carsale' ),		
		'before_widget' => '<div id="%1$s" class="%2$s footer_wrapper">',		
		'after_widget'  => '</div>',	 	
		'before_title'  => '<h4>',		
		'after_title'   => '</h4>',	
		)
	);
	register_sidebar( 
	array(		
		'name'          => esc_html__( 'Footer Widget 3', 'carsale' ),
		'id'            => 'footer3',	
		'description'   => esc_html__( 'Add widgets here.', 'carsale' ),
		'before_widget' => '<div id="%1$s" class="%2$s footer_wrapper">',		
		'after_widget'  => '</div>',	 	
		'before_title'  => '<h4>',		
		'after_title'   => '</h4>',	
		)
	);
	register_sidebar( 
	array(		
		'name'          => esc_html__( 'Footer Widget 4', 'carsale' ),
		'id'            => 'footer4',	
		'description'   => esc_html__( 'Add widgets here.', 'carsale' ),	
		'before_widget' => '<div id="%1$s" class="%2$s footer_wrapper">',		
		'after_widget'  => '</div>',	 	
		'before_title'  => '<h4>',		
		'after_title'   => '</h4>',	
		)
	);
}
add_action( 'widgets_init', 'sarav_theme_site_widgets' );


function sarav_theme_theme_styles() {

wp_enqueue_style( 'style', get_stylesheet_uri() );
wp_enqueue_style( 'bootstrap_style', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
wp_enqueue_style( 'jquery_theme', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );

wp_enqueue_script('jquery');
wp_enqueue_script( 'ui-script', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), '1.0.0', true );
wp_enqueue_script( 'bootstrap_script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
wp_enqueue_script( 'modernizr_script', get_template_directory_uri() . '/assets/js/modernizr.custom.js', array(), '1.0.0', true );	

wp_enqueue_script( 'waypoints_script', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), '1.0.0', true );
wp_enqueue_script( 'pie_chart', get_template_directory_uri() . '/assets/js/jquery.easypiechart.min.js', array(), '1.0.0', true );	

wp_enqueue_script( 'classie_script', get_template_directory_uri() . '/assets/js/classie.js', array(), '1.0.0', true );
wp_enqueue_script( 'owl_carsoual', get_template_directory_uri() . '/assets/plugins/owl-carousel/owl.carousel.min.js', array(), '1.0.0', true );

wp_enqueue_script( 'bx_slider', get_template_directory_uri() . '/assets/plugins/bxslider/jquery.bxslider.js', array(), '1.0.0', true );
wp_enqueue_script( 'ui_slider', get_template_directory_uri() . '/assets/plugins/slider/jquery.ui-slider.js', array(), '1.0.0', true );
wp_enqueue_script( 'smooth_scroll', get_template_directory_uri() . '/assets/js/jquery.smooth-scroll.js', array(), '1.0.0', true );

wp_enqueue_script( 'placeholder_script', get_template_directory_uri() . '/assets/js/jquery.placeholder.min.js', array(), '1.0.0', true );

wp_enqueue_script( 'theme_script', get_template_directory_uri() . '/assets/js/theme.js', array(), '1.0.0', true );

wp_enqueue_script( 'jquery_ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), '1.0.0', true );
wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );



}
add_action( 'wp_enqueue_scripts', 'sarav_theme_theme_styles' );



function social_media(){
$sm='';
print_r($settings);

}
add_shortcode('social_media','social_media');

function test_func()
{
	echo "teset";
}
add_action( 'submit_form', 'test_func' );


function my_handle_attachment($file_handler,$post_id,$set_thu=false) {
  // check to make sure its a successful upload
  if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
  require_once(ABSPATH . "wp-admin" . '/includes/media.php');

  $attach_id = media_handle_upload( $file_handler, $post_id );
  if ( is_numeric( $attach_id ) ) {
    update_post_meta( $post_id, '_my_file_upload', $attach_id );
  }
  return $attach_id;
}

function sell_your_car(){
	$brand=$_POST['brand'];
	$post_type='cars';
	$post_content=$_POST['desc_val'];
	$model=$_POST['model'];
	$post_year=$_POST['year'];
	$post_fuel_val=$_POST['fuel_val'];
	$post_doors_val=$_POST['doors_val'];
	$post_trans_val=$_POST['trans_val	'];
	$post_car_type=$_POST['car_type'];
	$post_engine_val=$_POST['engine_val'];
	$power_val=$_POST['power_val'];
	$condition_val=$_POST['condition_val'];
	$mileage_val=$_POST['mileage_val'];
	$specs_val=$_POST['specs_val'];
	$car_color_val=$_POST['car_color_val'];
	$price_val=$_POST['price_val'];
	$location_val=$_POST['location_val'];
	$exterior_val=$_POST['exterior_val'];
	$equipment_val=$_POST['equipment_val'];
	$interior_val=$_POST['interior_val'];
	//$car_image=$_POST['car_image'];
	$user_id=$_POST['user_id'];
	$mobile_no=$_POST['mobile_no'];
	
	$exp_exterior=explode(",",$exterior_val);
	$exp_interior=explode(",",$interior_val);
	$exp_equipment=explode(",",$equipment_val);
	
	$p_id = wp_insert_post(
		array(
		'post_author'  => $user_id,
		'post_title'   => $brand." ".$model,
		'post_status'  => 'publish',
		'post_type'    => $post_type,
		'post_content' => $post_content
		));

		add_post_meta($p_id,'car_condition',$condition_val);
		add_post_meta($p_id,'car_year',$post_year);
		add_post_meta($p_id,'car_fuel',$post_fuel_val);
		add_post_meta($p_id,'car_doors',$post_doors_val);
		add_post_meta($p_id,'car_transmission',$post_trans_val);
		add_post_meta($p_id,'car_body_type',$post_car_type);
		add_post_meta($p_id,'car_enginecc',$post_engine_val);
		add_post_meta($p_id,'car_power',$power_val);
		add_post_meta($p_id,'car_mileage',$mileage_val);
		add_post_meta($p_id,'car_specs',$specs_val);
		add_post_meta($p_id,'car_color',$car_color_val);
		add_post_meta($p_id,'car_price',$price_val);
		add_post_meta($p_id,'car_location',$location_val);
		add_post_meta($p_id,'car_exterior',$exp_exterior);
		add_post_meta($p_id,'car_interior',$exp_interior);
		add_post_meta($p_id,'car_equipment',$exp_equipment);
		add_user_meta($user_id,'mobile_no',$mobile_no);
	//$parent_post_id = isset( $_POST['post_id'] ) ? $_POST['post_id'] : 0;  // The parent ID of our attachments
	$parent_post_id =$p_id;
    $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg"); // Supported file types
    //$max_file_size = 1024 * 500; // in kb
    $max_image_upload = 10; // Define how many images can be uploaded to the current post
    $wp_upload_dir = wp_upload_dir();
    $path = $wp_upload_dir['path'] . '/';
    $count = 0;

    $attachments = get_posts( array(
        'post_type'         => 'attachment',
        'posts_per_page'    => -1,
        'post_parent'       => $parent_post_id,
        'exclude'           => get_post_thumbnail_id() // Exclude post thumbnail to the attachment count
    ) );

    // Image upload handler
    if( $_SERVER['REQUEST_METHOD'] == "POST" ){
        // Check if user is trying to upload more than the allowed number of images for the current post

        /*if( ( count( $attachments ) + count( $_FILES['files']['name'] ) ) > $max_image_upload ) {
            $upload_message[] = "Sorry you can only upload " . $max_image_upload . " images for each Ad";
        } else {*/
		$att_id="";
            foreach ( $_FILES['files']['name'] as $f => $name ) {
                $extension = pathinfo( $name, PATHINFO_EXTENSION );
                // Generate a randon code for each file name
                $new_filename = cvf_td_generate_random_code( 20 )  . '.' . $extension;
                if ( $_FILES['files']['error'][$f] == 4 ) {
                    continue; 
                }
                if ( $_FILES['files']['error'][$f] == 0 ) {
                    // Check if image size is larger than the allowed file size
                    /*if ( $_FILES['files']['size'][$f] > $max_file_size ) {
                        $upload_message[] = "$name is too large!.";
                        continue;
                    // Check if the file being uploaded is in the allowed file types
                    } else*/
					if( ! in_array( strtolower( $extension ), $valid_formats ) ){
                        $upload_message[] = "$name is not a valid format";
                        continue; 
                    } else{ 
                        // If no errors, upload the file...
                        if( move_uploaded_file( $_FILES["files"]["tmp_name"][$f], $path.$new_filename ) ) {
                            $count++; 
                            $filename = $path.$new_filename;
                            $filetype = wp_check_filetype( basename( $filename ), null );
                            $wp_upload_dir = wp_upload_dir();
                            $attachment = array(
                                'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                                'post_mime_type' => $filetype['type'],
                                'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                                'post_content'   => '',
                                'post_status'    => 'inherit'
                            );
                            // Insert attachment to the database
                            $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
							$att_id.=$attach_id.",";
                            require_once( ABSPATH . 'wp-admin/includes/image.php' );                 
                            // Generate meta data
                            $attach_data = wp_generate_attachment_metadata( $attach_id, $filename ); 
                            wp_update_attachment_metadata( $attach_id, $attach_data );                   
                        }
                    }
                }
            }
			$att_val=substr($att_id,0,-1);
				add_post_meta($p_id,'car_image',$att_val);
       /* }*/
    }
    if ( isset( $upload_message ) ) :
        foreach ( $upload_message as $msg ){        
            printf( __('<p class="bg-danger">%s</p>', 'wp-trade'), $msg );
        }
    endif;
    if( $count != 0 ){
        printf( __('<p class = "bg-success">%d files added successfully!</p>', 'wp-trade'), $count );   
    }
			
die();		
}
add_action( "wp_ajax_sell_your_car","sell_your_car");
add_action( "wp_ajax_nopriv_sell_your_car","sell_your_car");

	
	
/*function datafrn(){

print_r($_FILES);
	
die();
}
add_action( "wp_ajax_datafrn","datafrn");
add_action( "wp_ajax_nopriv_datafrn","datafrn");*/


function save_favourite(){
$listing_id=$_POST['listing_id'];
$user_id=get_current_user_id();
$user_fav=get_user_meta($user_id,'user_favourite',true);
$exp_user_fav=explode(",",$user_fav);
if(in_array($listing_id, $exp_user_fav))
{
$lis_val="";
foreach ($exp_user_fav as $key => $value){
    if ($value == $listing_id) {
        unset($exp_user_fav[$key]);
    }
	else
	{
	$lis_val.=$value.',';
	}
}
$list_user=substr($lis_val,0,-1);
update_user_meta($user_id,'user_favourite',$list_user);
echo "Save";
}
else
{
if($user_fav == "")
{
	add_user_meta($user_id,'user_favourite',$listing_id);
}
else
{
	$user_upd_fav=$user_fav.','.$listing_id;
	update_user_meta($user_id,'user_favourite',$user_upd_fav);
}
echo "Saved";
}
	
die();
}
add_action( "wp_ajax_save_favourite","save_favourite");
add_action( "wp_ajax_nopriv_save_favourite","save_favourite");


/* update profile */
function edit_user_det()
{
	$nickname=$_POST['nickname'];
	$mob_no=$_POST['mob_no'];
	$userdesc=$_POST['userdesc'];
	$userid=$_POST['userid'];
	if (!function_exists('wp_handle_upload')) {
           require_once(ABSPATH . 'wp-admin/includes/file.php');
       }
	  // print_r($_FILES);
      // echo $_FILES["upload"]["name"];
      $uploadedfile = $_FILES['userimage'];
      $upload_overrides = array('test_form' => false);
      $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
	  update_user_meta($userid,'nickname',$nickname);
	  update_user_meta($userid,'mobile_no',$mob_no);
	  update_user_meta($userid,'description',$userdesc);
	  if (!file_exists($_FILES['userimage']['tmp_name']) || !is_uploaded_file($_FILES['userimage']['tmp_name'])) 
		{
			echo 'Not uploaded';
		}
		else
		{
			update_user_meta($userid,'profile_image',$movefile['url']);
			echo 'File Uploaded';
		}
	  
	 // echo $movefile['url'];
	  die();
}
add_action( "wp_ajax_edit_user_det","edit_user_det");
add_action( "wp_ajax_nopriv_edit_user_det","edit_user_det");
 
function edit_profile()
{
	$nickname=$_POST['nickname'];
	$mob_no=$_POST['mob_no'];
	$old_pwd=$_POST['old_pwd'];
	$new_pwd=$_POST['new_pwd'];
	$confrm_pwd=$_POST['confrm_pwd'];
	$userid=$_POST['userid'];
	update_user_meta($userid,'nickname',$nickname);
	update_user_meta($userid,'mobile_no',$mob_no);
	if((isset( $_POST['old_pwd'])) && (isset( $_POST['new_pwd'])) && (isset( $_POST['confrm_pwd'])))
	{
		$user = wp_get_current_user(); //trace($user);
		$x = wp_check_password( $old_pwd, $user->user_pass, $user->data->ID );
		if($x)
		{ 
			if( !empty($new_pwd) && !empty($confrm_pwd))
			{
				if($new_pwd == $confrm_pwd)
				{
					$udata['ID'] = $user->data->ID;
					$udata['user_pass'] = $new_pwd;
					$uid = wp_update_user( $udata );
					if($uid) 
					{
						echo $passupdatemsg = "The password has been updated successfully";
						$passupdatetype = 'successed';
						
					} else {
						echo $passupdatemsg = "Sorry! Failed to update your account details.";
						$passupdatetype = 'errored';
					}
				}
				else
				{
					echo $passupdatemsg = "Confirm password doesn't match with new password";
					$passupdatetype = 'errored';
				}
			}
			else
			{
				echo $passupdatemsg = "Please enter new password and confirm password";
				$passupdatetype = 'errored';
			}
    } 
    else 
    {
        echo $passupdatemsg = "Old Password doesn't match the existing password";
        $passupdatetype = 'errored';
    }
		
	}
	die();
}
add_action( "wp_ajax_edit_profile","edit_profile");
add_action( "wp_ajax_nopriv_edit_profile","edit_profile");

/* Brand */
function ret_brand()
{
	$brand_val=$_POST['val_brand'];
	$terms = get_terms( array( 
    'taxonomy' => 'brand',
	'hide_empty' => 0,
	'parent'   => 0,
	'name__like' => $brand_val
	) );
	$trm="";
	$c_trm="";
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		foreach ( $terms as $term ) {
		   $trm.="".$term->name.",";
		}
	}
	echo $term_val=substr($trm, 0, -1);
		
die();
}
add_action( "wp_ajax_ret_brand","ret_brand");
add_action( "wp_ajax_nopriv_ret_brand","ret_brand");

/* Model */

function ret_model()
{
	$model_val=$_POST['val_model'];
	$brd_val=$_POST['brd_val'];
	$terms = get_terms( array( 
    'taxonomy' => 'brand',
	'hide_empty' => 0,
	'parent'   => 0,
	'name' => $brd_val
	) );
	$trm="";
	$c_trm="";
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		foreach ( $terms as $term ) {
		   $trm.="".$term->name.",";
		    $child_terms = get_terms( 'brand', array( 'parent' => $term->term_id, 'hide_empty' => false,'name__like' => $model_val ) );
			foreach ( $child_terms as $c_term ) {
				$c_trm.="".$c_term->name.",";   
			}
		}
	}
	//echo $term_val=substr($trm, 0, -1);
	echo $c_term_val=substr($c_trm, 0, -1);
	
	
die();
}
add_action( "wp_ajax_ret_model","ret_model");
add_action( "wp_ajax_nopriv_ret_model","ret_model");