<?php
//create a user in chat by hoook
add_filter( 'user_register', 'chat_user_create');
function chat_user_create($userid){
    $user = get_userdata($userid);
    if (in_array('subscriber', $user->roles)){
        $soachat = new Soachat();

        if (get_option('chat_type') == 1){
            $video = 0;
        }else{
            $video = 1;
        }

        $soachat::addUser($userid, $user->data->display_name, null, $video);
        add_user_meta($userid, 'is_soa_chat', 1);
    }
}

//update user
add_action( 'profile_update', 'my_profile_update', 10, 2 );
function my_profile_update( $user_id, $old_user_data ) {
    $check = get_user_meta( $user_id, 'is_soa_chat', true );
    if (!empty($check)){
        $fname = get_user_meta( $user_id, 'first_name', true );
        $lname = get_user_meta( $user_id, 'last_name', true );

        if (get_option('chat_type') == 1){
            $video = 0;
        }else{
            $video = 1;
        }

        $soachat = new Soachat();
        $soachat::updateUser($user_id, $fname.' '.$lname, null, $video);
    }
}
//Delete User
add_action( 'delete_user', 'delete_user_function', 10, 2 );
function delete_user_function( $user_id) {
    $check = get_user_meta( $user_id, 'is_soa_chat', true );
    $soachat = new Soachat();
    if (!empty($check)){
        $soachat->removeUser($user_id);
    }else{
        $soachat->removeUser($user_id);
    }
}

// Restrict page for users
add_action('template_redirect','my_non_logged_redirect');
function my_non_logged_redirect(){
    if ((is_page('global-chat')) && !is_user_logged_in() ){
        wp_redirect( wp_login_url() );
        die();
    }
}

/**
 * Returns the parsed shortcode.
 *
 * @param array   {
 *     Attributes of the shortcode.
 *
 * @type string $id ID of...
 * }
 * @param string  Shortcode content.
 *
 * @return string HTML content to display the shortcode.
 */
function cs_global_chat_shortcode($atts = array(), $content = '')
{
    $atts = shortcode_atts(array(
        'global' => 0,
        'isaudio' => 0,
        'private_chat' => '',
        'colorscheme' => '',
    ), $atts, 'shortcode1');
    if (is_user_logged_in()) {
        wp_enqueue_script('soachatscript', 'https://dev28.onlinetestingserver.com/soachatcentralizedWeb/js/ocs.js', array('jquery'), 1.1, true);
        wp_add_inline_script('soachatscript', 'var $ = jQuery.noConflict();');
        wp_enqueue_script('soachatscript1', Easy_URL . 'assets/js/custom.js', array('jquery'), 1.1, true);
        wp_localize_script('soachatscript', 'soa_chat_object',
            array(
                'chat_appid' => get_option('chat_appid'),
                'chat_appkey' => get_option('chat_appkey'),
                'chat_domain' => get_option('chat_domain'),
                'current_user_id' => get_current_user_id(),
                'global' => $atts['global'],
                'onlyAudio' => $atts['isaudio'],
                'colors_cheme' => $atts['colorscheme'],
                'admin_selection' => get_option('admin_selection'),
            )
        );
        $content = '<div id="mychatwindow"></div>';
    } else {
        $content = '<h1>You are not logged In</h1>';
    }
    return $content;
}
add_shortcode('Soa-chat-main', 'cs_global_chat_shortcode');
/**
 * Returns the parsed shortcode.
 *
 * @param array   {
 *     Attributes of the shortcode.
 *
 * @type string $id ID of...
 * }
 * @param string  Shortcode content.
 *
 * @return string HTML content to display the shortcode.
 */
function add_firend_in_soa_chat($atts = array(), $content = '')
{
    $atts = shortcode_atts(array(
        'id' => 'value',
    ), $atts, 'shortcode2');
    wp_enqueue_style('userscss', Easy_URL . 'assets/css/userscss.css');
    wp_enqueue_script('sweartalert', Easy_URL . 'assets/vendor/sweetalert.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('soachatajax', Easy_URL . 'assets/js/customajax.js', array('jquery'), 1.1, true);
    wp_localize_script('soachatajax', 'soa_chat_object',
        array(
            'chat_appid' => get_option('chat_appid'),
            'chat_appkey' => get_option('chat_appkey'),
            'chat_domain' => get_option('chat_domain'),
            'current_user_id' => get_current_user_id(),
            'ajaxurl' => admin_url('admin-ajax.php')
        )
    );
    if (is_user_logged_in()){
        $content = '
    <h2>Avatar List</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <ul class="w3-ul w3-card-4">';
        $args = array(
            'role' => 'Subscriber',
            'orderby' => 'last_name',
            'order' => 'ASC'
        );
        $users = get_users($args);
        foreach ($users as $user) {
            if ($user->ID == get_current_user_id()) {
                continue;
            }
            $isfirend = get_user_meta(get_current_user_id(), 'soa_chat_firends');
            //check register user
            $check = get_user_meta($user->ID, 'is_soa_chat', true);
            if (!empty($check)) {

                $action = '';
                if (in_array($user->ID, $isfirend)) {
//                $action .=  '<span class="w3-bar-item w3-button w3-sand w3-xlarge w3-right">Added</span>';
                    $action .= '<span class="w3-bar-item w3-button w3-sand w3-xlarge w3-right remove-friend" data-id="' . $user->ID . '">Remove Friend</span>';
                } else {
                    $action = '<span class="w3-bar-item w3-button w3-sand w3-xlarge w3-right add-friend" data-id="' . $user->ID . '">Add Friend</span>';
                }
                $content .= '<li class="w3-bar">
            ' . $action . '
            <img src="https://www.w3schools.com/w3css/img_avatar2.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
            <div class="w3-bar-item">
            <span class="w3-large">' . $user->data->display_name . '</span><br>
            <span>' . $user->roles[0] . '</span>
            </div>
            </li>';
            }

        }
        $content .= '</ul>
    </div>';
    }else{
        $content = '<h1>You are not logged In</h1>';
    }
    return $content;
}

add_shortcode('add-friend', 'add_firend_in_soa_chat');
