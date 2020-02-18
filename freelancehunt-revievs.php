<?php
/**
 * Plugin Name: Reviews for freelancehunt
 * Description: Plugin to display reviews about freelancer
 * Plugin URI:  https://www.vchuy-develop.com/otzyvy-o-frilansere-s-freelancehunt-com/
 * Author URI:  https://www.vchuy-develop.com/
 * Author:      v.chuy
 * Version:      2.40
 *
 * Text Domain: huntrewievs
 * Domain Path: /languages
 *             
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */


 add_action( 'plugins_loaded', 'load_plugin_huntrewievs' );
 
function load_plugin_huntrewievs() {
	load_plugin_textdomain( 'huntrewievs', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

include_once( plugin_dir_path( __FILE__ ) . 'backend/settings.php' );


function all_reviews_function_huntrewievs()
{
    $enable_shema = get_option( 'enable_shema_huntrewievs' );

    include_once( plugin_dir_path( __FILE__ ) . 'backend/api.php' );

    $json = json_decode($body, true);

    if (is_array($json) || is_object($json)) {

            if ($json['data']) {


                if ($enable_shema == 'disable' )  {
                include_once(plugin_dir_path(__FILE__) . 'frontend/without-shema-organization.php');
            } else{
                    include_once(plugin_dir_path(__FILE__) . 'frontend/with-shema-organization.php');
                }

        }

        elseif ($json['error']) {

            if ($json['error']['status'] == 500) {
                echo esc_html__('Error while fetching profile data', 'huntrewievs');
            } elseif ($json['error']['status'] == 401) {
                echo esc_html__('Not authorized', 'huntrewievs');
            } else {
                echo esc_html__('Other error', 'huntrewievs');
            }
        }

    }
}


add_shortcode('freelance', 'all_reviews_function_huntrewievs');

add_action( 'wp_enqueue_scripts', 'scripts_huntrewievs', 999 );

function scripts_huntrewievs() {

wp_enqueue_style( 'vendor-all', plugin_dir_url(__FILE__ ) . 'css/ver-1/vendor-all.css', array(), '1.0.0'); 

wp_enqueue_style( 'freelancehunt-all', plugin_dir_url(__FILE__ ) . 'css/ver-1/all.css', array(), '1.0.0'); 
}


/**
 * Enqueue scripts and styles for admin panel.
 */
add_action( 'admin_enqueue_scripts', 'freelancehunt_options_page_style', 99 );
function freelancehunt_options_page_style( ){
    wp_enqueue_style( 'freelancehunt-options', plugin_dir_url(__FILE__ ) . 'backend/css/huntrewievs-options.css' );
}


