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
	$SQLquery_1 = "SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], 'Gmakeup' AS [TagName], ROUND(SUM([Value]), 1) AS [Value]
									FROM dbo.AnalogLive WHERE [TagName] IN ('rS9_157T4_G', 'rS12_157T1_G')
									UNION
									SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], [TagName], ROUND([Value], 1) AS [Value]
									FROM dbo.AnalogLive WHERE [TagName] IN ('rS7a_159T1_Vc', 'rS9a_159T1_Vc')
									-- UNION
									-- SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], 'Gpairs' AS [TagName], ROUND(SUM([Value]), 1) AS [Value]
									-- FROM dbo.AnalogLive WHERE [TagName] IN ('rS5_157T2_G', 'rS4_157T3_G', 'rS5_157T3_G', 'rS11_157T3_G', 'rS1_157T3_G', 'rS12_157T2_G')
									UNION
									SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], 'Cons_tech_w' AS [TagName], ROUND(SUM([Value]), 1) AS [Value]
									FROM dbo.AnalogLive WHERE [TagName] IN ('rS13_157T1_G', 'rS13_157T2_G');";
	$SQLquery_2 = "SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], [TagName], [Value] FROM [AnalogLive] WHERE [TagName] IN
									('rS13_156T1_T', 'rS13_156T2_T');";
	$SQLquery_3 = "SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], [TagName], [Value] FROM [AnalogLive] WHERE [TagName] IN (
																								'rS1_157T1_G', 'rS1_156T1_T', 'rS1_157T2_G', 'rS1_156T2_T',
																								'rS4_157T1_G', 'rS4_156T1_T', 'rS4_157T2_G', 'rS4_156T2_T',
																								'rS2_157T1_G', 'rS2_156T1_T', 'rS2_157T2_G', 'rS2_156T2_T',
																								'rS3_157T1_G', 'rS3_156T1_T', 'rS3_157T2_G', 'rS3_156T2_T',
																								'rS11_157T1_G', 'rS11_156T1_T', 'rS11_157T2_G', 'rS11_156T2_T');";
//----------------------------------------------------------------------------------------------------------------
	$temp_array = result_msql('_', 'wwUser', '123', 'Runtime', $SQLquery_1)[0];
	$temp_tech_water = result_msql('_', 'wwUser', '123', 'Runtime', $SQLquery_2)[0];
	foreach($temp_array as $key => $value)
		$row_json[$key] = $value;
	unset($temp_array);
//---------------- тех. вода -------------------------------------------------------------------------------------
	$row = array();
	foreach($temp_tech_water as $key => $value)
	{
		if ($value <= 0) $value = 1;
		$row[$key] = $value;
	}
	$row_json['tech_water'] = ($row['rS13_156T1_T'] + $row['rS13_156T2_T'])/2;
	unset($row);
	unset($temp_tech_water);
//---------------------- Суммарный отпуск тепла по тепломагистралям потребителям ---------------------------------
	$temp_array = result_msql('_', 'wwUser', '123', 'Runtime', $SQLquery_3)[0];
	$row = array();
	foreach($temp_array as $key => $value)
		$row[$key] = $value;
	unset($temp_array);
	$row_json['total_heart'] = (($row['rS1_157T1_G']*($row['rS1_156T1_T']-$row_json['tech_water']))
													- (($row['rS1_157T2_G']*($row['rS1_156T2_T']-$row_json['tech_water'])))+(($row['rS4_157T1_G']*(
													$row['rS4_156T1_T']-$row_json['tech_water']))-(($row['rS4_157T2_G']*($row['rS4_156T2_T']-$row_json['tech_water'])))+
													(($row['rS2_157T1_G']*($row['rS2_156T1_T']-$row_json['tech_water']))-(($row['rS2_157T2_G']*(
													$row['rS2_156T2_T']-$row_json['tech_water'])))+(($row['rS3_157T1_G']*($row['rS3_156T1_T']-$row_json['tech_water']))
													-(($row['rS3_157T2_G']*($row['rS3_156T2_T']-$row_json['tech_water'])))+(($row['rS11_157T1_G']*(
													$row['rS11_156T1_T']-$row_json['tech_water']))-(($row['rS11_157T2_G']*($row['rS11_156T2_T']-$row_json['tech_water']))))))))*0.001;
	unset($row);
	unset($temp_array);
//----------------------------------------------------------------------------------------------------------------
	$row_json['total_heart'] = strval(round($row_json['total_heart'], 1));
	$row_json['tech_water'] = strval(round($row_json['tech_water'], 1));
	$row_json = mb_convert_encoding($row_json, 'utf-8', 'cp1251');
//----------------------------- Output data JSON -------------------------------------------------------
	echo json_encode($row_json);
	unset($SQLquery_1);
	unset($SQLquery_2);
	unset($SQLquery_3);
	unset($row_json);
?>
