<?php
	function check_msql($server_num, $SQLquery){
		require 'connection_msql.php';
		if($conn) {
			$stmt = sqlsrv_query($conn, $SQLquery, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
			if($stmt === false) {
				$check['msql_'.$server_num] = 1;
				return($check);
			}
			else {
				$check = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
				$check['msql_'.$server_num] = $check['check'];
				unset($check['check']);
				sqlsrv_free_stmt($stmt);
				return($check);
				sqlsrv_close($conn);
			}
		}
		else {
			$check['msql_'.$server_num] = 1;
			return($check);
		}
		unset($stmt);
	}
	function check_mysqli($server_num, $SQLquery){
		require 'connection_mysql.php';
		@$connection = mysqli_connect($ip_adr, $user_id, $user_pwd);
		@$db = mysqli_select_db($connection, $db_);
		@mysqli_set_charset($connection, "utf8");
		if(!$connection || !$db)
		{
			$check['mysql_'.$server_num] = 1;
			return($check);
		}
		else {
			$result = mysqli_query($connection, $SQLquery);
			$row = mysqli_fetch_array($result);
			$check['mysql_'.$server_num] = $row['check'];
			unset($row);
			return($check);
			mysqli_free_result($result);
			mysqli_close($connection);
		}
	}
	function pingAddress($host, $name_serv) {
		exec("ping -n 1 -w 200 $host", $output, $status);
		// mb_convert_encoding($output, 'utf-8', 'cp866')
		return array('ping_'.$name_serv => $status);
	}
	$SQLqueryCheck = "SELECT 0 AS 'check'";
	$check_state = pingAddress('_', 'server_1') + pingAddress('_', 'server_2') +
									pingAddress('_', 'server_3') + pingAddress('10.179.142.20', 'server_4') +
									pingAddress('192.168.31.30', 'server_5') + pingAddress('_', 'server_6');
	if($check_state['ping_server_1'] == 0)
		$check_state += check_msql('server_1', $SQLqueryCheck) + check_mysqli('myserver_2', $SQLqueryCheck);
	if($check_state['ping_server_2'] == 0)
		$check_state += check_msql('server_2', $SQLqueryCheck);
	if($check_state['ping_server_3'] == 0)
		$check_state += check_msql('server_3', $SQLqueryCheck);
	if($check_state['ping_server_4'] == 0)
		$check_state += check_msql('server_4', $SQLqueryCheck);
	if($check_state['ping_server_5'] == 0)
		$check_state += check_msql('server_5', $SQLqueryCheck);

	$check_state['log_server_1'] = ($check_state['ping_server_1'] == 1 or $check_state['msql_server_1'] == 1 or $check_state['mysql_myserver_2'] == 1) ? 1 : 0;
	$check_state['log_server_2'] = ($check_state['ping_server_2'] == 1 or $check_state['msql_server_2'] == 1) ? 1 : 0;
	$check_state['log_server_3'] = ($check_state['ping_server_3'] == 1 or $check_state['msql_server_3'] == 1) ? 1 : 0;
	$check_state['log_server_4'] = ($check_state['ping_server_4'] == 1 or $check_state['msql_server_4'] == 1) ? 1 : 0;
	$check_state['log_server_5'] = ($check_state['ping_server_5'] == 1 or $check_state['msql_server_5'] == 1) ? 1 : 0;
	$check_state['log_server_6'] = ($check_state['ping_server_6'] == 1 or $check_state['mysql_myserver_2'] == 1) ? 1 : 0;

	unset($SQLqueryCheck, $check_state['ping_server_1'], $check_state['ping_server_2'], $check_state['ping_server_3'], $check_state['ping_server_4'],
				$check_state['ping_server_5'], $check_state['ping_server_6'], $check_state['msql_server_1'], $check_state['msql_server_2'],
				$check_state['msql_server_3'], $check_state['msql_server_4'], $check_state['msql_server_5'], $check_state['mysql_myserver_2']);

	echo json_encode($check_state);
	unset($check_state);
?>
