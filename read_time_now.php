<?php
	function msql_time($serverName, $login, $password){
		$connectionInfo = array('UID'=>$login, 'PWD'=>$password, 'Database'=>'Runtime');
		$SQLqueryTimeNow = "SELECT CONVERT(char(20), GETDATE(), 113) AS [TimeNow]";
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		if($conn) {
			$stmt = sqlsrv_query($conn, $SQLqueryTimeNow, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
			if($stmt === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
				return ($result['TimeNow']);
				sqlsrv_free_stmt($stmt);
				unset($result);
			}
		}
		else {
			return 'Connection could not be established.';
			die(print_r(sqlsrv_errors(), true));
		}
		sqlsrv_close($conn);
		unset($SQLqueryTimeNow);
		unset($stmt);
	}
	$result = Array();
	$result['server_22'] = date('d M Y H:i:s');
	$result['server_20'] = msql_time('10.179.142.20', 'aaUser', 'pwUser');
	$result['server_34'] = msql_time('_', 'aaUser', 'pwUser');
	$result['server_130'] = msql_time('_', 'wwUser', '123');
	$result['server_135'] = msql_time('_', 'wwUser', '123');
	$result['server_30'] = msql_time('192.168.31.30', 'aaUser', 'pwUser');
	echo json_encode($result);
	unset($result);
?>
