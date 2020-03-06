<?php 
function easy_boooking_menu(){
	require Easy_PATH.'/template/booking_inquiries.php';
}
function easy_boooking_chat_window(){
    require Easy_PATH.'/template/admin_chat_window.php';
}

add_action('admin_menu', function(){
	add_menu_page( 'Soa Chat', 'Soa Chat', 'manage_options', 'easy_boooking_menu', 'easy_boooking_menu');
	add_submenu_page('easy_boooking_menu','Chat Window', 'Chat Window', 'manage_options', 'easy_boooking_chat_window', 'easy_boooking_chat_window');
});

