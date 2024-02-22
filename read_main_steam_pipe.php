<?php
	function result_msql($serverName, $login, $password, $DBase, $SQLquery){
		$connectionInfo = array('UID'=>$login, 'PWD'=>$password, 'Database'=>$DBase);
		$SQLqueryT_Out = "SELECT CONVERT(char(20), DATEADD(second, -99, GETDATE()), 120) AS [TimeOut]";
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		if($conn) {
			$stmt = sqlsrv_query($conn, $SQLqueryT_Out, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
			if($stmt === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				$TimeOut = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
				sqlsrv_free_stmt($stmt);
			}
		}
		else {
			echo 'Connection could not be established.';
			die(print_r(sqlsrv_errors(), true));
		}
		sqlsrv_close($conn);
		unset($SQLqueryT_Out);
		unset($stmt);
//----------------------------------------------------------------------------------------------------------------
		$row_r = array();
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		if($conn) {
			$stmt = sqlsrv_query($conn, $SQLquery, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
			if($stmt === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
				{
					if ($row['DateTime'] > $TimeOut['TimeOut'])
						$row_r[$row['TagName']] = strval($row['Value']);
					else
						$row_r[$row['TagName']] = 'Err';
				}
				sqlsrv_free_stmt($stmt);
			}
		}
		else {
			echo 'Connection could not be established.';
			die(print_r(sqlsrv_errors(), true));
		}
		sqlsrv_close($conn);
		unset($SQLquery);
		unset($stmt);
		unset($TimeOut);
		unset($row);
		return array($row_r);
		unset($row_r);
	}

//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$SQLquery_2 = "SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], [TagName], ROUND([Value], 0) AS [Value]
									FROM dbo.AnalogLive WHERE [TagName] IN ('K2_CHIR_In_N_DV2A', 'K2_CHIR_In_f_DV2A', 'K2_CHIR_In_I_DV2A', 'K2_CHIR_In_N_DC2A', 'K2_CHIR_In_f_DC2A', 'K2_CHIR_In_I_DC2A',
									'K2_CHIR_In_N_DC2B', 'K2_CHIR_In_f_DC2B', 'K2_CHIR_In_I_DC2B', 'K2_CHIR_In_N_DV2B', 'K2_CHIR_In_f_DV2B', 'K2_CHIR_In_I_DV2B', 'K2_CHIR_In_RT1_Room_Cnv',
									'K2_CHIR_In_RT1_Room_Cnv', 'K2_CHR_In_W_locker', 'K2_CHR_In_T_locker', 'K2_CHR_In_T_locker_ACL', 'K2_CHR_In_W_locker_ACL');";
//----------------------------------------------------------------------------------------------------------------
	$temp_array = result_msql('10.179.142.20', 'aaUser', 'pwUser', 'Runtime', $SQLquery_2)[0];
	foreach($temp_array as $key => $value)
		$row_json[$key] = $value;
	unset($temp_array);
//----------------------------- Output data JSON -------------------------------------------------------
	echo json_encode($row_json);
	//unset($SQLquery_1);
	unset($SQLquery_2);
	unset($row_json);
?>
