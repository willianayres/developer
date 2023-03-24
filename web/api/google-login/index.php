<?php

	session_start();
	require('vendor/autoload.php');

	$gClient = new Google_Client();
	$gClient->setClientId("");
	$gClient->setClientSecret("");
	$gClient->setRedirectUri('http://localhost/aula_login_google/index.php');
	$gClient->addScope('email');

	if(!isset($_GET['code']))
		echo '<a href="'.$gClient->createAuthUrl().'">Logar com sua conta google!</a>';
	else{
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		if(!isset($token['error'])){
			$gClient->setAccessToken($token['access_token']);

			$_SESSION['access_token'] = $token['access_token'];

			$google_service = new Google_Service_Oauth2($gClient);

			$data = $google_service->userinfo->get();
			echo '<pre>';
				print_r($data);
			echo '</pre>';
		}
	}

?>