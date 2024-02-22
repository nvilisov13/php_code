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
	$SQLquery_1 = "SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], [TagName], [Value] FROM dbo.DiscreteLive
									WHERE [TagName] IN ('K2_G1', 'K2_G2', 'K2_G3')
									UNION
									SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], [TagName], [Value] FROM dbo.DiscreteLive
									WHERE [TagName] IN ('K3_G1', 'K3_G2', 'K3_G3', 'K4_G1', 'K4_G2', 'K4_G3');";
	$row_json = result_msql('10.179.142.20', 'aaUser', 'pwUser', 'Runtime', $SQLquery_1)[0];
//----------------------------- Output data JSON -------------------------------------------------------
	echo json_encode($row_json);
	unset($SQLquery_1);
	unset($row_json);
?>