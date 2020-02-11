<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
// Current ID
$user_id  = get_current_user_id();
?>


<div id="mychatwindow"></div>



<?php get_footer(); ?>

<script>var $ = jQuery.noConflict(); </script>
<script uid="12" src="https://dev28.onlinetestingserver.com/soachatcentralizedWeb/js/ocs.js"></script>
<script type="text/javascript">
        ocs.init({
            appid : "<?php echo get_option('chat_appid'); ?>",         //you app id key
            appkey: "<?php echo get_option('chat_appkey'); ?>",         //your app key
            domain: "<?php echo get_option('chat_domain'); ?>",            //add domain
            global: '1',                                        //if you want global chat, all users can chat else set flag to zero
            id: '<?php echo $user_id; ?>',                                            //logged in user id
            element: '#mychatwindow',                           //element on which chat window will append
            leftPanelBgColor: '#123456',
            leftPanelUsersColor: '#123456',
            chatWindowBgColor: '#123456',
            senderBubble: '#123456',
            recieverBubble: '#123456',
        });
 </script>