<?php
	$login=strip_tags(trim($_POST['login']));
	$password=strip_tags(trim($_POST['password']));
	if(($login == 'nstai' && $password == 'kip') ||
		($_COOKIE['login'] == 'nstai' && $_COOKIE['password'] == 'kip')) {
		echo '1';
		setcookie('user', '1', time()+600);
	}
	else {
		echo '0';
	}
?>