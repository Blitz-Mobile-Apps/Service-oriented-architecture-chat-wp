<?php
add_action( 'admin_footer', function (){
    wp_enqueue_script('soachatscript', 'https://dev28.onlinetestingserver.com/soachatcentralizedWeb/js/ocs.js', array('jquery'), 1.1, true);
    wp_add_inline_script('soachatscript', 'var $ = jQuery.noConflict();');
    wp_enqueue_script('soachatscript1', Easy_URL . 'assets/js/admin-custom.js', array('jquery'), 1.1, true);
    wp_localize_script('soachatscript', 'soa_chat_object',
        array(
            'chat_appid' => get_option('chat_appid'),
            'chat_appkey' => get_option('chat_appkey'),
            'chat_domain' => get_option('chat_domain'),
//            'current_user_id' => get_current_user_id(),
            'current_user_id' => get_option('admin_selection'),
            'global' => 1,
            'onlyAudio' => 0,
        )
    );
});
?>
<div id="mychatwindow"></div>

