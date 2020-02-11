<?php 
function easy_boooking_menu(){
	require Easy_PATH.'/template/booking_inquiries.php';
}
add_action('admin_menu', 'wpse149688');
function wpse149688(){
	add_menu_page( 'Soa Chat', 'Soa Chat', 'read', 'easy_boooking_menu', 'easy_boooking_menu');
}

