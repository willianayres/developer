<?php
	
	session_start();

	include('facebook-php-sdk/autoload.php');
	use Facebook\Facebook;
	use Facebook\Exceptions\FacebookResponseException;
	use Facebook\Exceptions\FacebookSDKException;

	$appId = '241996879647156';
	$appSecret = 'ecc59d79ffd4cc8e6f876456b85c08b4';
	$redirectUrl = 'http://localhost/login-facebook/';
	$fbPermission = array('email');

	$fb = new Facebook(array(
		'app_id'=> $appId,
		'app_secret'=> $appSecret,
		'default_graph_version' => 'v2.2'
	));

	$helper = $fb->getRedirectLoginHelper();
	try{
		if(isset($_SESSION['facebook_access_token']))
			$accessToken = $_SESSION['facebook_access_token'];
		else
			$accessToken = $helper->getAccessToken();
		
	}catch(FacebookResponseException $e){}

?>