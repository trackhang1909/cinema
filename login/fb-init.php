<?php
	session_start();

	require 'vendor/autoload.php';

	$fb = new Facebook\Facebook([
		'app_id' => '521472078405454',
		'app_secret' => 'dbd2c44ff89a58aba2064ffcd374f742',
		'default_graph_version' => 'v2.7'
	]); 

	$helper = $fb->getRedirectLoginHelper();
	$loginUrl = $helper->getLoginUrl("http://localhost:8888/project/");	

	try{
		$accessToken = $helper->getAccessToken();
		if (isset($accessToken)){
			$_SESSION['accessToken'] = (string)$accessToken;

			header("Location: index.php");
		}
	} catch (Exception $exc) {
		echo $exc->getTraceAsString();
	}


	if (isset($_SESSION['accessToken'])){
		try{

			$fb->setDefaultAccessToken($_SESSION['accessToken']);
			$res = $fb->get('/me?locale=en_US&fields=name,email');
			$user = $res->getGraphUser();
			$id = $user->getField('id');
			$username = $user->getField('name');

		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
		}
	}
?>

