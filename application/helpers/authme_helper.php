<?php


function logged_in(){
	$CI =& get_instance();
	$CI->load->library('authme');
	
	return $CI->authme->logged_in();
}

function user($key = ''){
	$CI =& get_instance();
	$CI->load->library('session');
	
	$user = $CI->session->userdata('user');
	if(empty($user)) return '';

	if(isset($key) && !empty($key)) {
		if(isset($user->$key) && !empty($user->$key)) return $user->$key;
	}
	return $user;
}

function rand_passwd( $length = 8, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' ) {
    return substr( str_shuffle( $chars ), 0, $length );
}

