<?php



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
    register_setting( 'option_group', 'enable_shema_huntrewievs' );

    register_setting( 'option_group', 'name_company_huntrewievs' );
    register_setting( 'option_group', 'address_company_huntrewievs' );
    register_setting( 'option_group', 'telephone_company_huntrewievs' );

    add_settings_section( 'section_id_05',  esc_html__( 'Main settings', 'huntrewievs' ), '', 'freelancehunt_page' );


    add_settings_field('Freelancehunt_field2', esc_html__( 'Your secret key', 'huntrewievs' ), 'fill_options_huntrewievs_field_2', 'freelancehunt_page', 'section_id_05' );

    add_settings_field('Freelancehunt_field3', esc_html__( 'Enable shema', 'huntrewievs' ), 'fill_options_huntrewievs_field_3', 'freelancehunt_page', 'section_id_05' );

    add_settings_field('Freelancehunt_field4', esc_html__( 'Organization data', 'huntrewievs' ), 'fill_options_huntrewievs_field_4', 'freelancehunt_page', 'section_id_05' );
}



function fill_options_huntrewievs_field_2() {
    echo '<input name="secret_key_huntrewievs"  type="text" value="' . get_option( 'secret_key_huntrewievs' ) . '" class="code2" />';
}

function fill_options_huntrewievs_field_3() {
    ?>
   <div class="huntrewievs-setting-shema-container"  style="width: 100%; max-width: 300px;"><label style="display: block; margin-bottom: 5px;"><span class="toggle-bg">

   <input id="nable_shema" type="radio" size="40" name="enable_shema_huntrewievs" value="disable" <?php  checked( get_option( 'enable_shema_huntrewievs' ), 'disable' );   ?> />
  <input id="nable_shema" type="radio" size="40" name="enable_shema_huntrewievs" value="enable" <?php  checked( get_option( 'enable_shema_huntrewievs' ), 'enable' );   ?> />

    <span class="switch"></span></span> <?php esc_html_e( 'Activate', 'huntrewievs' );   ?></label></div>


    <?php
}



function fill_options_huntrewievs_field_4() {
    ?>
    <div class="huntrewievs-setting-organization"  style="width: 100%; max-width: 300px;">
        <label for="name_company_huntrewievs" style="display: block; margin-bottom: 5px;"><?php esc_html_e( 'Company name', 'huntrewievs' );   ?> </label>
        <input id="name_company_huntrewievs" name="name_company_huntrewievs"  type="text" value=" <?php echo get_option( 'name_company_huntrewievs' )   ?>" class="code3" />

        <label for="address_company_huntrewievs" style="display: block; margin-bottom: 5px;"><?php esc_html_e( 'Adress company', 'huntrewievs' );   ?> </label>
        <input id="address_company_huntrewievs" name="address_company_huntrewievs"  type="text" value=" <?php echo get_option( 'address_company_huntrewievs' )   ?>" class="code4" />

        <label for="telephone_company_huntrewievs" style="display: block; margin-bottom: 5px;"><?php esc_html_e( 'Telephone company', 'huntrewievs' );   ?> </label>
        <input id="telephone_company_huntrewievs" name="telephone_company_huntrewievs"  type="text" value=" <?php echo get_option( 'telephone_company_huntrewievs' )   ?>" class="code5" />
    </div>


    <?php
}




function sanitize_callback_huntrewievs( $options ){

    foreach( $options as $name => & $val ){
        if( $name == 'input' )
            $val = strip_tags( $val );

        if( $name == 'checkbox' )
            $val = intval( $val );

        if( $name == 'radio' )
            $val = intval( $val );
    }

    return $options;
}

