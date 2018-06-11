<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	session_start();
	date_default_timezone_set('Europe/Istanbul');

	$auth    = @$_SESSION['auth'];
	$request = @$_GET['request'];
	$action  = @$_GET['action'];
	$request = $request ? $request : 'dashboard';

	//Definations
	include 'library/pdo.php';
	include 'library/configuration.php';
	include 'library/functions.php';

	//Service
	if($request == 'service'){
		$output = array();

		if($action == 'get.project' && $_GET['id']){
			$output = $db->select('projects', 'id = "'.$_GET['id'].'"', '*');
			$output = $output[0];
		}

		header('Content-Type: application/json');
		echo json_encode($output);
		exit;
	}