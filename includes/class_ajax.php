<?php 
class cs_ajax{
	
	function __construct(){
		add_action( "wp_ajax_add_friend", array($this, 'add_friend'), 10 );
		add_action( "wp_ajax_nopriv_add_friend", array($this, 'add_friend'), 10 );

		add_action( "wp_ajax_remove_friend", array($this, 'remove_friend'), 10 );
		add_action( "wp_ajax_nopriv_remove_friend", array($this, 'remove_friend'), 10 );
	}

	public function add_friend(){
        $soachat = new Soachat();
        $currentuserid = get_current_user_id();
        add_user_meta($currentuserid, 'soa_chat_firends' , $_POST['id'], false);
        $data = $soachat::addFriends($currentuserid, $_POST['id']);
        $response['status'] =  true;
        $response['message'] =  'Add as a friend!';//'Added as a friend!';
        $response['response'] =  $data;//'Added as a friend!';
        print(json_encode($response));
        exit();
	}

    public function remove_friend(){
        $soachat = new Soachat();
        $currentuserid = get_current_user_id();
        add_user_meta($currentuserid, 'soa_chat_firends' , $_POST['id'], false);
        $data = $soachat::removeFriends($currentuserid, $_POST['id']);
        delete_user_meta($currentuserid, 'soa_chat_firends', $_POST['id']);

        $response['status'] =  true;
        $response['message'] =  'This friend is removed from the system';
        $response['response'] =  $data;
        print(json_encode($response));
        exit();
    }




}
new cs_ajax();