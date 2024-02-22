<?php
	switch($server_num){
		case 'server_1':
			$ip_adr = '_';
			$user_id = 'User';
			$user_pwd = '_';
		break;
		case 'server_2':
			$ip_adr = '_';
			$user_id = 'User';
			$user_pwd = '_';
		break;
		case 'server_3':
			$ip_adr = '_';
			$user_id = 'User';
			$user_pwd = '_';
		break;
		case 'server_4':
			$ip_adr = '_';
			$user_id = 'User';
			$user_pwd = '_';
		break;
		case 'server_5':
			$ip_adr = '_';
			$user_id = 'User';
			$user_pwd = '_';
		break;
	};
	$connectionInfo = array('UID'=>$user_id, 'PWD'=>$user_pwd, 'Database'=>'Runtime');
	$conn = sqlsrv_connect($ip_adr, $connectionInfo);
?>
