<?php

/*
 *  Theme Settings Page *
*/


/* https://wptheming.com/2012/06/loading-google-fonts-from-theme-options/ */


/* add_action( 'init', 'sarav_admin_init' ); */
add_action( 'admin_menu', 'sarav_settings_page_init' );


function pw_loading_scripts_wrong_again() {
	wp_enqueue_style( 'sarav_style', get_template_directory_uri().'/inc/assets/css/style_dashboard.css' );
	//wp_enqueue_script('custom-js', 'wp-content/my-plugin-dir/js/custom.js');
}
add_action('admin_init', 'pw_loading_scripts_wrong_again');



function sara_admin_init() {
	$settings = get_option( "ilc_theme_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'ilc_intro' => 'Some intro text for the home page',
			'ilc_tag_class' => false,
			'ilc_ga' => false,
			'st_facebook' => false
		);
		add_option( "ilc_theme_settings", $settings, '', 'yes' );
	}   
}

function sarav_settings_page_init() {
	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	$settings_page = add_theme_page( $theme_data['Name']. ' Theme Settings', ' Theme Settings', 'edit_theme_options', 'theme-settings', 'ilc_settings_page' );
	add_action( "load-{$settings_page}", 'ilc_load_settings_page' );
}

    function ilc_load_settings_page() {
        if (isset($_POST["ilc-settings-submit"]) == 'Y' ) {
            check_admin_referer( "ilc-settings-page" );
            ilc_save_theme_settings();
            $url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
            wp_redirect(admin_url('themes.php?page=theme-settings&'.$url_parameters));
            exit;
        }
    }

    function ilc_save_theme_settings() {
        global $pagenow;
        $settings = get_option( "ilc_theme_settings" );
		print_r($settings);
        if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
            if ( isset ( $_GET['tab'] ) )
                $tab = $_GET['tab']; 
            else
                $tab = 'general'; 

            switch ( $tab ){
				case 'general' :
					$settings['st_logo']  = $_POST['st_logo'];
					$settings['st_favicon']  = $_POST['st_favicon'];
					$settings['st_email']  = $_POST['st_email'];
					$settings['st_contactno']  = $_POST['st_contactno'];
					$settings['st_skype']  = $_POST['st_skype'];
					$settings['st_whatsapp']  = $_POST['st_whatsapp'];
                break; 
				
                case 'socialmedia' :
					$settings['st_facebook']  = $_POST['st_facebook'];
					$settings['st_twitter']  = $_POST['st_twitter'];
					$settings['st_google']  = $_POST['st_google'];
					$settings['st_linked']  = $_POST['st_linked'];
					$settings['st_youtube']  = $_POST['st_youtube'];
					$settings['st_instagram']  = $_POST['st_instagram'];
					$settings['st_pinterest']  = $_POST['st_pinterest'];
					$settings['st_tumblr']  = $_POST['st_tumblr'];
					$settings['st_flickr']  = $_POST['st_flickr'];
					$settings['st_snapchat']  = $_POST['st_snapchat'];
                break; 
                case 'footer' : 
                    $settings['ilc_ga']  = $_POST['ilc_ga'];
                break;
                case 'homepage' : 
                    $settings['ilc_intro']    = $_POST['ilc_intro'];
                break;
            }
        }

        if( !current_user_can( 'unfiltered_html' ) ){
            if ( $settings['ilc_ga']  )
                $settings['ilc_ga'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['ilc_ga'] ) ) );
            if ( $settings['ilc_intro'] )
                $settings['ilc_intro'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['ilc_intro'] ) ) );
        }

        $updated = update_option( "ilc_theme_settings", $settings );
    }

    function sarav__admin_tabs( $current = 'general' ) { 
        $tabs = array( 'general' => 'General',  'socialmedia' => 'Social Media', 'typography'=>'Typography', 'homepage' => 'Home',  'footer' => 'Footer' ); 
        $links = array();
        echo '<div id="icon-themes" class="icon32"><br></div>';
        echo '<h2 class="nav-tab-wrapper">';
        foreach( $tabs as $tab => $name ){
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab$class' href='?page=theme-settings&tab=$tab'>$name</a>";

        }
        echo '</h2>';
    }

    function ilc_settings_page() {
        global $pagenow;
        $settings = get_option( "ilc_theme_settings" );
        $theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
		 
        ?>

        <div class="wrap">
            <h2><?php echo $theme_data['Name']; ?> <?php _e('Theme Settings','sarav'); ?></h2>

            <?php
                if ( 'true' == esc_attr(isset($_GET['updated'])) ) echo '<div class="updated" ><p>Theme Settings updated.</p></div>';

                if ( isset ( $_GET['tab'] ) ) sarav__admin_tabs($_GET['tab']); else sarav__admin_tabs('general');
            ?>

            <div id="poststuff" class="sarav_themeoption">
                <form method="post" action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>">
                    <?php
					
					
                    wp_nonce_field( "ilc-settings-page" ); 

                    if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 

                        if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
                        else $tab = 'general'; 

                        echo '<table class="form-table">';
                        switch ( $tab ){
                            case 'general' :
							
						/* wp_enqueue_script('jquery'); */
						wp_enqueue_media();

                                ?>
								<tr>
									<th><label for="st_logo"><?php _e('Site Logo','sarav'); ?>:</label></th>
									<td>
				<?php if($settings['st_logo']){  ?>
				<div>
					<img src="<?php echo esc_url( $settings['st_logo'] ); ?>" width="100px">
				</div>
				<?php } ?>
				<input type="text" id="st_logo" name="st_logo" class="input-field" value="<?php echo esc_url( $settings['st_logo'] ); ?>" />
				<input id="upload-btn" type="button" class="button" value="<?php _e( 'Upload', 'sarav' ); ?>" />
				<span class="description"><?php _e('Upload an image for the site logo.', 'sarav' ); ?></span>
				
				
									</td>
								</tr>
								
								<tr>
									<th><label for="st_favicon"><?php _e('Site Favicon','sarav'); ?>:</label></th>
									<td>
				<?php if($settings['st_favicon']){  ?>
				<div>
					<img src="<?php echo esc_url( $settings['st_favicon'] ); ?>" width="100px">
				</div>
				<?php } ?>
				<input type="text" id="st_favicon" name="st_favicon" class="input-field" value="<?php echo esc_url( $settings['st_favicon'] ); ?>" />
				<input id="upload-favicon" type="button" class="button" value="<?php _e( 'Upload', 'sarav' ); ?>" />
				<span class="description"><?php _e('Upload an icon for the site favicon.', 'sarav' ); ?></span>
									</td>
								</tr>
								
								<tr>
									<th><label for="st_email"><?php _e('Contact Email','sarav'); ?>:</label></th>
									<td>
									 <input id="st_email" name="st_email" type="email" class="input-field"  value="<?php echo esc_html( stripslashes($settings['st_email'] )); ?>" /> 
									</td>
								</tr>
								
								<tr>
									<th><label for="st_contactno"><?php _e('Contact Number','sarav'); ?>:</label></th>
									<td>
									 <input id="st_contactno" name="st_contactno" type="text" class="input-field"  value="<?php echo esc_html( stripslashes($settings['st_contactno'] )); ?>" /> 
									</td>
								</tr>
								
								<tr>
									<th><label for="st_skype"><?php _e('Skype Name','sarav'); ?>:</label></th>
									<td>
									 <input id="st_skype" name="st_skype" type="text" class="input-field"  value="<?php echo esc_html( stripslashes($settings['st_skype'] )); ?>" /> 
									</td>
								</tr>
								
								<tr>
									<th><label for="st_whatsapp"><?php _e('WhatsApp Number','sarav'); ?>:</label></th>
									<td>
									 <input id="st_whatsapp" name="st_whatsapp" type="text" class="input-field"  value="<?php echo esc_html( stripslashes($settings['st_whatsapp'] )); ?>" /> 
									</td>
								</tr>
								
								
                                <tr>
                                    <th><label for="ilc_tag_class">Tags with CSS classes:</label></th>
                                    <td>
                                        <input id="ilc_tag_class" name="ilc_tag_class" type="checkbox" <?php if ( $settings["ilc_tag_class"] ) echo 'checked="checked"'; ?> value="true" /> 
                                        <span class="description">Output each post tag with a specific CSS class using its slug.</span>
                                    </td>
                                </tr>
                                <?php
                            break; 
							case 'socialmedia' : 
                                ?>
                                <tr>
                                    <th><label for="st_facebook"><?php _e('Facebook','sarav'); ?>:</label></th>
									<td>
									<input class="input-field" type="url" id="st_facebook" name="st_facebook" value="<?php echo esc_html( stripslashes( $settings["st_facebook"] ) ); ?>" placeholder="http://" />
                                    </td>									
                                </tr>
								
								<tr>
                                    <th><label for="st_twitter"><?php _e('Twitter','sarav'); ?>:</label></th>
									<td>
									<input class="input-field" type="url" id="st_twitter" name="st_twitter" value="<?php echo esc_html( stripslashes( $settings["st_twitter"] ) ); ?>" placeholder="http://"/>
                                    </td>										
                                </tr>
								
								<tr>
                                    <th><label for="sarav_gp"><?php _e('Google+','sarav'); ?>:</label></th>
									<td>
									<input class="input-field" type="url" id="st_google" name="st_google" value="<?php echo esc_html( stripslashes( $settings["st_google"] ) ); ?>" placeholder="http://" />
                                    </td>													
                                </tr>
								
								<tr>
                                    <th><label for="st_linked"><?php _e('LinkedIn','sarav'); ?>:</label></th>
									<td>
									<input class="input-field" type="url" id="st_linked" name="st_linked" value="<?php echo esc_html( stripslashes( $settings["st_linked"] ) ); ?>" placeholder="http://" />
                                    </td>										
                                </tr>
								
								<tr>
                                    <th><label for="st_youtube">YouTube:</label></th>
									<td>
								<input class="input-field" type="url" id="st_youtube" name="st_youtube" value="<?php echo esc_html( stripslashes( $settings["st_youtube"] ) ); ?>" placeholder="http://" />
                                    </td>										
                                </tr>
								
								<tr>
                                    <th><label for="st_instagram">Instagram:</label></th> 
								<td>
								<input class="input-field" type="url" id="st_instagram" name="st_instagram" value="<?php echo esc_html( stripslashes( $settings["st_instagram"] ) ); ?>" placeholder="http://" />
                                    </td>										
                                </tr>
								
								<tr>
                                    <th><label for="st_pinterest">Pinterest:</label></th>
								<td>
								<input class="input-field" type="url" id="st_pinterest" name="st_pinterest" value="<?php echo esc_html( stripslashes( $settings["st_pinterest"] ) ); ?>" placeholder="http://" />
                                    </td>										
                                </tr>
								
								<tr>
                                    <th><label for="st_tumblr">Tumblr:</label></th> 
									<td>
								<input class="input-field" type="url" id="st_tumblr" name="st_tumblr" value="<?php echo esc_html( stripslashes( $settings["st_tumblr"] ) ); ?>" placeholder="http://" />
                                    </td>										
                                </tr>
								
								<tr>
                                    <th><label for="st_flickr">Flickr:</label></th>
									<td>
								<input class="input-field" type="url" id="st_flickr" name="st_flickr" value="<?php echo esc_html( stripslashes( $settings["st_flickr"] ) ); ?>" placeholder="http://" />
                                    </td>									
                                </tr>
								
								<tr>
                                    <th><label for="st_snapchat">Snapchat:</label></th>
								<td>
								<input class="input-field" type="url" id="st_snapchat" name="st_snapchat" value="<?php echo esc_html( stripslashes( $settings["st_snapchat"] ) ); ?>" placeholder="http://" />
                                    </td>										
                                </tr>
								
                                <?php
                            break;
                            case 'footer' : 
                                ?>
                                <tr>
                                    <th><label for="ilc_ga">Insert tracking code:</label></th>
                                    <td>
                                        <textarea id="ilc_ga" name="ilc_ga" cols="60" rows="5"><?php echo esc_html( stripslashes( $settings["ilc_ga"] ) ); ?></textarea><br/>
                                        <span class="description">Enter your Google Analytics tracking code:</span>
                                    </td>
                                </tr>
                                <?php
                            break;
                            case 'homepage' : 
                                ?>
                                <tr>
                                    <th><label for="ilc_intro">Introduction</label></th>
                                    <td>
                                        <textarea id="ilc_intro" name="ilc_intro" cols="60" rows="5" ><?php echo esc_html( stripslashes( $settings["ilc_intro"] ) ); ?></textarea><br/>
                                        <span class="description">Enter the introductory text for the home page:</span>
                                    </td>
                                </tr>
                                <?php
                            break;
                        }
                        echo '</table>';
                    }
                    ?>
                    <p class="submit" style="clear: both;">
                        <input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
                        <input type="hidden" name="ilc-settings-submit" value="Y" />
                    </p>
                </form>

                <p><?php echo $theme_data['Name'] ?> theme developed by <a href="#">Saravanan</a> </p>
            </div>

        </div>
    <?php
    }
	
	/* https://stackoverflow.com/questions/22874469/wordpress-upload-image-in-admin-options-page */

	
function load_wp_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );




function scritp_footer(){
?>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            multiple: false
        }).open()
        .on('select', function(e){
            var uploaded_image = image.state().get('selection').first();
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            $('#st_logo').val(image_url);
        });
    });
	
	$('#upload-favicon').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            multiple: false
        }).open()
        .on('select', function(e){
            var uploaded_image = image.state().get('selection').first();
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            $('#st_favicon').val(image_url);
        });
    });
	
	
});
</script>
<?php
}
add_action( 'admin_footer', 'scritp_footer' );
