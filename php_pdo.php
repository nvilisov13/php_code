<?php
	function result_mysqli($DSN, $login, $password, $sql_selected){
		try
		{
			$connection = new PDO($DSN, $login, $password);
		}
		catch (PDOException $e)
		{
			print 'Ошибка подключения к БД!: '.$e->getMessage().'<br/>';
			die();
		}

		$res = $connection->prepare("SELECT DATE_SUB(NOW(), INTERVAL 180 SECOND) AS `tout`");
		$res->execute();
		$row_t = $res->fetchAll(PDO::FETCH_ASSOC);
		$TimeOut = $row_t[0]['tout'];
		$res = null;
		unset($row_t);

		$res = $connection->prepare($sql_selected);
		$res->execute();
		$row = $res->fetchAll(PDO::FETCH_ASSOC);

		for($i = 0; $i < count($row); $i++)
		{
			if ($row[$i]['datetime'] > $TimeOut)
				$row_r['TgTag_'.$row[$i]['num']] = strval($row[$i]['data_2']);
			else
				$row_r['TgTag_'.$row[$i]['num']] = 'Err';
		}

		$res = null;
		unset($row);
		return $row_r;
		unset($row_r);
		$connection = null;
	}
//----------------------------------------------------------------------------------------------------------------
	function result_msql($serverName, $login, $password, $DBase, $SQLquery){
		$connectionInfo = array('UID'=>$login, 'PWD'=>$password, 'Database'=>$DBase);
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		$row_r = array();
		if($conn) {
			$stmt = sqlsrv_query($conn, $SQLquery, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
			if($stmt === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
				{
					if ($row['DateTime'] > $GLOBALS['TimeOut'])
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
		unset($row);
		return array($row_r);
		unset($row_r);
	}
//----------------------------------------------------------------------------------------------------------------
	$mysql_query = "SELECT ROUND(`data`, 2) AS `data_2`, `datetime`, `num` FROM `temp` WHERE `num` IN ('5112', '2', '5111', '9998')";
	$MSQLquery = "SELECT CONVERT(char(20), GETDATE(), 120) AS [DateTime], [TagName], ROUND([Value]/1000, 2) AS [Value]
									FROM dbo.AnalogLive WHERE [TagName] = 'SI_G_P';";
//----------------------------------------------------------------------------------------------------------------
	$dsn = 'mysql:dbname=_; host=_; charset=utf8';
	$user = '_';
	$pass = '_';
	$TimeOut = '';
	$temp_array = array();
	$row = [
		'total_power' => 0
	];
	$temp_array = result_mysqli($dsn, $user, $pass, $mysql_query) +
								result_msql('_', 'user', '_', 'Runtime', $MSQLquery)[0];
	foreach($temp_array as $key => $value)
		$row_json[$key] = $value;
	$row_json['temp_out_air'] = round($row_json['TgTag_9998'], 1);
	unset($row_json['TgTag_9998']);
	@$row['total_power'] = strval(round($row_json['TgTag_2'] + $row_json['TgTag_5111'] + $row_json['TgTag_5112'] + $row_json['SI_G_P'], 1));
	unset($temp_array);
	echo json_encode($row_json + $row);
	unset($row_json);
	unset($row);
	unset($dsn);
	unset($user);
	unset($pass);
	unset($mysql_query);
	unset($MSQLquery);
	unset($TimeOut);
?>
