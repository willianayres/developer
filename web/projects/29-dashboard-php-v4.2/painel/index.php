<?php
	ob_start();
	include('../config.php');
	(!Painel::logged()) ? include('login.php') : include('main.php');
	ob_end_flush();
?>