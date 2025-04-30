<?php
	include_once('database.php');
	include_once('metatags.php');
	
	// Star a new session to login.
	session_start();

	// Set the timezone.
	date_default_timezone_set('America/Sao_Paulo');

	// Root Paths.
	$internal_paste = "mvc";
	if($internal_paste != '' && substr($internal_paste,-1) != '/')
		define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$internal_paste}/");
	else if(($internal_paste != '' && substr($internal_paste,-1) == '/'))
		define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$internal_paste}");
	else
		define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}{$internal_paste}");

	define('DIRCSS',DIRPAGE."/public/css/");
	define('DIRFONTS',DIRPAGE."/public/fonts/");
	define('DIRIMG',DIRPAGE."/public/img/");
	define('DIRJS',DIRPAGE."/public/js/");

	if(substr($_SERVER['DOCUMENT_ROOT'],-1) == '/')
		define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$internal_paste}/");
	else
		define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}/{$internal_paste}/");
?>