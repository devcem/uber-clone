<?php

	$db = new db("mysql:host=localhost;dbname=uber", "root", "");
	$db->setErrorCallbackFunction("error");

	$site  = 'http://localhost/projects/uber-clone/';

	$level = array(
		'Şoför', 'Müşteri'
	);

	$page = array(
		'login' => 'Account',
		'dashboard' => 'Dashboard'
	);