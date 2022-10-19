<?php


/* Register Your User Access Level Checklogin Functions Herw */

function check_login()
{
	/* Use User Id As Session */
	if ((strlen($_SESSION['login_id']) == 0)) {
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "index";
		$_SESSION["login_id"] = "";
		header("Location: http://$host$uri/$extra");
	}
}


/* Invoke It */
check_login();
