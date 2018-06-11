<?php
	
	if($_SESSION['user']['level'] == 0){
		include 'views/dashboard_driver.php';
	}else{
		include 'views/dashboard_customer.php';
	}