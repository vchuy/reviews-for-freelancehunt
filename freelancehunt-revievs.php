<?php
/**
 * Plugin Name: Reviews for freelancehunt
 * Description: Plugin to display reviews about freelancer
 * Plugin URI:  https://www.vchuy-develop.com/otzyvy-o-frilansere-s-freelancehunt-com/
 * Author URI:  https://www.vchuy-develop.com/
 * Author:      v.chuy
 * Version:      2.0
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


add_action('admin_menu', 'add_plugin_page_huntrewievs');
function add_plugin_page_huntrewievs(){
	add_options_page( esc_html__( 'Freelancehunt Feedback Settings', 'huntrewievs' ), 'Freelancehunt reviews', 'manage_options', 'freelancehunt_slug', 'options_page_output_huntrewievs' );
}

function options_page_output_huntrewievs(){
	?>
	<div class="wrap">
		<h2><?php echo get_admin_page_title() ?></h2>

		<form action="options.php" method="POST">
			<?php
				settings_fields( 'option_group' );
				do_settings_sections( 'freelancehunt_page' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

add_action('admin_init', 'plugin_settings_huntrewievs');
function plugin_settings_huntrewievs(){

    register_setting( 'option_group', 'secret_key_huntrewievs' );

	add_settings_section( 'section_id_05',  esc_html__( 'Main settings', 'huntrewievs' ), '', 'freelancehunt_page' ); 


	add_settings_field('Freelancehunt_field2', esc_html__( 'Your secret key', 'huntrewievs' ), 'fill_options_huntrewievs_field_2', 'freelancehunt_page', 'section_id_05' );
}




function fill_options_huntrewievs_field_2() {
	echo '<input 
		name="secret_key_huntrewievs"  
		type="text" 
		value="' . get_option( 'secret_key_huntrewievs' ) . '" 
		class="code2"
	 />';
}



function sanitize_callback_huntrewievs( $options ){ 

	foreach( $options as $name => & $val ){
		if( $name == 'input' )
			$val = strip_tags( $val );

		if( $name == 'checkbox' )
			$val = intval( $val );
	}

	return $options;
}

function all_reviews_function_huntrewievs()
{


    $secret_key_huntrewievs = get_option('secret_key_huntrewievs');


    $api_secret = $secret_key_huntrewievs; // ваш секретный ключ
    $url = "https://api.freelancehunt.com/v2/my/reviews";
    $method = "GET";


    $token = 'Bearer ' . $api_secret;
    $args = array(
        'method' => $method,
        'headers' => array(
            'Authorization' => $token
        ),

    );
    $result1 = wp_remote_request($url, $args);


    if (is_wp_error($result1)) {
        return false; // Bail early
    }

    $body = wp_remote_retrieve_body($result1);

    $json = json_decode($body, true);


    if (is_array($json) || is_object($json)) {


            if ($json['data']) {


            $i = -1;
            foreach ($json['data'] as $address) {
                if (++$i == 123) break;

                ?>

                <div class="clearfix hreview  review review-positive progect-id-<?php echo $address['id'] . "\n"; ?>">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="clearfix item">
                                    <div class="pull-right">
                                        <abbr class="dtreviewed label label-default opacity-75"
                                              title="<?php echo date("d.m.Y H:m:s", strtotime($address['attributes']['published_at'] . "\n")); ?>"
                                              style="border: none;">

                                            <?php echo date("d.m.Y", strtotime($address['attributes']['published_at'] . "\n")); ?></abbr>


                                    </div>
                                    <i class="fa fa-thumbs-up with-tooltip text-green" title=""></i>

                                    <span  class="fn "><?php echo $address['attributes']['project']['name'] . "\n"; ?></span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-push-8 col-sm-6 col-sm-push-6">
                        <div class="row">
                            <div class="col-md-12 text-right" style="padding-top: 10px; padding-left: 0;">
                                <?php if (!empty($address['attributes']['grades']['quality'])) { ?>
                                    <div><span
                                            class="label label-review color-dark-gray"><?php echo esc_attr_e('Quality', 'huntrewievs') ?></span>
                                        <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['quality'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                                <?php } ?>
                                <?php if (!empty($address['attributes']['grades']['professionalism'])) { ?>
                                    <div><span
                                            class="label label-review color-dark-gray"><?php echo esc_attr_e('Professionalism', 'huntrewievs') ?></span>
                                        <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['professionalism'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                                <?php } ?>

                                <?php if (!empty($address['attributes']['grades']['cost'])) { ?>
                                    <div><span
                                            class="label label-review color-dark-gray"><?php echo esc_attr_e('Cost', 'huntrewievs') ?></span>
                                        <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['cost'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                                <?php } ?>

                                <?php if (!empty($address['attributes']['grades']['connectivity'])) { ?>
                                    <div><span
                                            class="label label-review color-dark-gray"><?php echo esc_attr_e('Communication', 'huntrewievs') ?></span>
                                        <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['connectivity'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                                <?php } ?>

                                <?php if (!empty($address['attributes']['grades']['schedule'])) { ?>
                                    <div><span
                                            class="label label-review color-dark-gray"><?php echo esc_attr_e('Timing', 'huntrewievs') ?></span>
                                        <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['schedule'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                                <?php } ?>

                            </div>


                        </div>
                        <br>
                    </div>
                    <div class="col-lg-8 col-lg-pull-4 col-sm-6 col-sm-pull-6">
                        <p class="linkify-marker"><?php echo $address['attributes']['comment'] . "\n"; ?></p>
                        <p class="text-dark-gray profile-<?php echo $address['attributes']['from']['id'] . "\n"; ?>">


                                <img width="25" height="25"
                                     class="vertical avatar img-rounded avatar-<?php echo $address['attributes']['from']['id'] . "\n"; ?>"
                                     alt="<?php echo $address['attributes']['from']['first_name'] . "\n" . $address['attributes']['from']['last_name'] . "\n"; ?>"
                                     src="<?php echo $address['attributes']['from']['avatar']['small']['url'] . "\n"; ?>">

                            <span class="reviewer">

<span  class="profile_id-<?php echo $address['attributes']['from']['id'] . "\n"; ?>"><?php echo $address['attributes']['from']['first_name'] . "\n";
    echo $address['attributes']['from']['last_name'] . "\n"; ?>     </span></span>


                        </p>

                    </div>


                </div>


                <?php

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
