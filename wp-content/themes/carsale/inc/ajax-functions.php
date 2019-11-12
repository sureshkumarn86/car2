<?php 

function loginajax(){

$info = array();
$username = $_POST['username'];
$password = trim($_POST['login_pwd']);
$json=[];
	if ( username_exists( $username )){
		
		$user = get_user_by( 'login', $username );
		if ( $user && wp_check_password($password, $user->data->user_pass, $user->ID) ){
			wp_clear_auth_cookie();
			$creds = array();				
			$creds['user_login'] = $username;
			$creds['user_password'] = $password;
			$creds['remember'] = true;
			$user_signon = wp_signon($creds, false);
			
			$json['success']='<div class="alert alert-success">Login successfully</div>';
			 if ( is_wp_error($user_signon) )
			 echo $user_signon->get_error_message();
		}else{
			$json['required']='<div class="alert alert-danger">Invalid details</div>';
		}
	}else{
		$json['required']='<div class="alert alert-danger">Invalid username</div>';
	}
	echo json_encode($json);
die();
}
add_action("wp_ajax_nopriv_loginajax", "loginajax");
add_action("wp_ajax_loginajax", "loginajax");



/*Register*/
function regajax(){
$json=[];
$user=trim($_POST['username']);
$email=trim($_POST['regemail']);
$pass=trim($_POST['regpwd']);
$cpass=trim($_POST['regcpwd']);
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
 
	if(empty($user) || empty($email) || empty($pass) || empty($cpass)){
		$json['error']='<div class="alert alert-danger">missing some fields</div>';		
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$json['error']= "<div class='alert alert-danger'>invalid email address</div>";
	}	
	else if($pass!=$cpass){
		$json['error']= "<div class='alert alert-danger'>invalid confirm password</div>";
	}
	else if(strlen($pass) < 8){
		$json['error']= "<div class='alert alert-danger'>password min 8 characters</div>";
	}
	else{
		if(username_exists($user)) {
					// Username already registered
					$json['error']='<div class="alert alert-danger">Username already taken</div>';
				}
		else{
			if( email_exists($email)) {
			  /* stuff to do when email address exists */
			  $json['error']='<div class="alert alert-danger">Email already taken</div>';
			}
			else if(empty($json)) {
				$new_user_id = wp_insert_user(array(
						'user_login'		=> $user,
						'user_pass'	 		=> $pass,
						'user_email'		=> $email,
						'user_registered'	=> date('Y-m-d H:i:s'),
						'role'				=> 'subscriber'
					)
				);

				if($new_user_id){	
					// send an email to the admin alerting them of the registration					
					$json['success']='<div class="alert alert-success">Successfully registered</div>';
					
					/*after register login*/
					wp_clear_auth_cookie();
					$creds = array();
					$creds['user_login'] = $user;
					$creds['user_password'] = $pass;
					$user_signon = wp_signon($creds, false);
				}
			}
		}
		echo json_encode($json);
		die();
	}
	
	echo json_encode($json);
die();
}
add_action("wp_ajax_nopriv_regajax", "regajax");
add_action("wp_ajax_regajax", "regajax");


function forgotpwd(){
$json=[];

/* https://gist.github.com/ivandoric/e4e46294c4d35eac0ec8 */
/* https://code.tutsplus.com/tutorials/build-a-custom-wordpress-user-flow-part-3-password-reset--cms-23811 */

$email=trim($_POST['regac']);
	
global $wpdb;
$error = '';
$success = '';
	if( empty( $email ) ) {
		//$error = 'Enter a username or e-mail address..';
		echo "Enter a username or e-mail address..";
	}
	else if(!is_email($email)) {
		if(username_exists($email)) {
			//rest	
			$json['error']='e-mail address.';
			$user = get_user_by( 'login', $email );
			
			$u_email=$user->user_email;
			$username = $user->user_login;
			global $gw_activate_template;

extract( $gw_activate_template->result );

$url = is_multisite() ? get_blogaddress_by_id( (int) $blog_id ) : home_url('', 'http');
$user = new WP_User( (int) $user_id );
global $wpdb;
$adt_rp_key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $username));
				if(empty($adt_rp_key)) {
					//generate reset key
					$adt_rp_key = wp_generate_password(20, false);
					require_once ABSPATH . WPINC . '/class-phpass.php';
					$wp_hasher = new PasswordHash( 8, true );
					$hashed = time() . ':' . $wp_hasher->HashPassword( $adt_rp_key );
					$wpdb->update($wpdb->users, array('user_activation_key' => $hashed), array('user_login' => $username));
				}
//$adt_rp_key = get_password_reset_key( $user );
$user_login = $user->user_login;
//$rp_link = '<a href="' . network_site_url("wp-login.php?action=rp&key=$adt_rp_key&login=" . rawurlencode($user_login), 'login') . '">' . network_site_url("wp-login.php?action=rp&key=$adt_rp_key&login=" . rawurlencode($user_login), 'login') . '</a>';

$rp_link = '<a href="' . home_url().'/reset-password/?action=rp&key='.$adt_rp_key.'&login=' . rawurlencode($username). '">' . home_url().'/reset-password/?action=rp&key='.$adt_rp_key.'&login=' . rawurlencode($username) . '</a>';

$headers = array('Content-Type: text/html; charset=UTF-8,From: Anitha &lt;anithakce.anil@gmail.com');
		
			wp_mail( $u_email, 'reset', $rp_link, $headers );
			//echo json_encode($json);
			echo "Please check your mail to reset your password";
			die();	
			
		}else{
			$json['error']='Invalid username';
			echo json_encode($json);
			die();			
		}		
	}else if(is_email($email))
	{
		if(!email_exists( $email)) {
		$error = 'There is no user registered with that email address.';
		die();
		}
		else
		{
			
			$json['error']='e-mail address.';
			$user = get_user_by( 'email', $email );
			
			
			$username = $user->user_login;
			global $gw_activate_template;

			extract( $gw_activate_template->result );

			$url = is_multisite() ? get_blogaddress_by_id( (int) $blog_id ) : home_url('', 'http');
			$user = new WP_User( (int) $user_id );
			global $wpdb;
			$adt_rp_key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $username));
				if(empty($adt_rp_key)) {
					//generate reset key
					$adt_rp_key = wp_generate_password(20, false);
					require_once ABSPATH . WPINC . '/class-phpass.php';
					$wp_hasher = new PasswordHash( 8, true );
					$hashed = time() . ':' . $wp_hasher->HashPassword( $adt_rp_key );
					$wpdb->update($wpdb->users, array('user_activation_key' => $hashed), array('user_login' => $username));
				}
			//$adt_rp_key = get_password_reset_key( $user );
			$user_login = $user->user_login;
			//$rp_link = '<a href="' . network_site_url("wp-login.php?action=rp&key=$adt_rp_key&login=" . rawurlencode($user_login), 'login') . '">' . network_site_url("wp-login.php?action=rp&key=$adt_rp_key&login=" . rawurlencode($user_login), 'login') . '</a>';

			$rp_link = '<a href="' . home_url().'/reset-password/?action=rp&key='.$adt_rp_key.'&login=' . rawurlencode($username). '">' . home_url().'/reset-password/?action=rp&key='.$adt_rp_key.'&login=' . rawurlencode($username) . '</a>';

			$headers = array('Content-Type: text/html; charset=UTF-8,From: Anitha &lt;anithakce.anil@gmail.com');
		
			wp_mail( $email, 'reset', $rp_link, $headers );
			//echo json_encode($json);
			echo "Please check your mail to reset your password";
			die();	
			
		}
	} else {
		//rest
		$error = 'address.';
		 
		 
		 $random_password = wp_generate_password( 12, false );

			// Get user data by field and data, other field are ID, slug, slug and login
			$user = get_user_by( 'email', $email );

			print_r($user); 
	

	}
	
	$json['error']=$error;
echo json_encode($json);
die();
}
add_action("wp_ajax_nopriv_forgotpwd", "forgotpwd");
add_action("wp_ajax_forgotpwd", "forgotpwd");


//add_action('wp_ajax_cvf_upload_files', 'cvf_upload_files');
//add_action('wp_ajax_nopriv_cvf_upload_files', 'cvf_upload_files'); // Allow front-end submission 

function cvf_upload_files(){
    
    $parent_post_id = isset( $_POST['post_id'] ) ? $_POST['post_id'] : 0;  // The parent ID of our attachments
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
       /* if( ( count( $attachments ) + count( $_FILES['files']['name'] ) ) > $max_image_upload ) {
            $upload_message[] = "Sorry you can only upload " . $max_image_upload . " images for each Ad";
        } else {*/
            
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
                    } else*/										if( ! in_array( strtolower( $extension ), $valid_formats ) ){
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

                            require_once( ABSPATH . 'wp-admin/includes/image.php' );
                            
                            // Generate meta data
                            $attach_data = wp_generate_attachment_metadata( $attach_id, $filename ); 
                            wp_update_attachment_metadata( $attach_id, $attach_data );
                            
                        }
                    }
                }
            }
        //}
    }
    // Loop through each error then output it to the screen
    if ( isset( $upload_message ) ) :
        foreach ( $upload_message as $msg ){        
            printf( __('<p class="bg-danger">%s</p>', 'wp-trade'), $msg );
        }
    endif;
    
    // If no error, show success message
    if( $count != 0 ){
        printf( __('<p class = "bg-success">%d files added successfully!</p>', 'wp-trade'), $count );   
    }
    
    exit();
}

// Random code generator used for file names.
function cvf_td_generate_random_code($length=10) {
 
   $string = '';
   $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
 
   for ($p = 0; $p < $length; $p++) {
       $string .= $characters[mt_rand(0, strlen($characters)-1)];
   }
 
   return $string;
 
}



function codecanal_reset_password_message( $message, $key ) {

    if ( strpos($_POST['user_login'], '@') ) {
        $user_data = get_user_by('email', trim($_POST['user_login']));
    } else {
        $login = trim($_POST['user_login']);
        $user_data = get_user_by('login', $login);
    }

    $user_login = $user_data->user_login;

    $msg = __('The password for the following account has been requested to be reset:'). "\r\n\r\n";
    $msg .= network_site_url() . "\r\n\r\n";
    $msg .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
    $msg .= __('If this message was sent in error, please ignore this email.') . "\r\n\r\n";
    $msg .= __('To reset your password, visit the following address:');
    $msg .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

    return $msg;

}
//add_filter('retrieve_password_message', codecanal_reset_password_message, null, 2);



