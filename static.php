<?php
	mb_internal_encoding('utf8');
	if(!isset($_POST['server_number']))
	{
		echo "<script>
						console.error('Ошибка! Не указан сервер БД!');
					</script>";
		exit;
	}
	else
		$server_num = strip_tags(trim($_POST['server_number']));

	if(!isset($_POST['tag_name']) or strip_tags(trim($_POST['tag_name'])) == '0')
	{
		echo "<script>
						console.error('Ошибка! Параметр указан неверно!');
					</script>";
		$tag='0';
		exit;
	}
	else
		$tag=strip_tags(trim($_POST['tag_name']));

	if(isset($_POST['since']) && isset($_POST['until']) &&
					is_numeric($_POST['since']) && is_numeric($_POST['until']))
	{
		$since=strip_tags(trim($_POST['since']));
		$until=strip_tags(trim($_POST['until']));
		$day = round(($until - $since)/(60 * 60 * 24));
		$since_str=date('Y-m-d H:i:s', $since);
		$until_str=date('Y-m-d H:i:s', $until);
		$SQLChart = "SELECT MAX([Value]) AS [max], AVG([Value]) AS [avg], MIN([Value]) AS [min]
									FROM history WHERE [Tagname] = '$tag' AND [DateTime] BETWEEN '$since_str' AND '$until_str'";
		$SQLChart = mb_convert_encoding($SQLChart, 'cp1251', 'utf-8');

		include 'connection_msql.php';
		if($conn)
		{
			$stmt = sqlsrv_query($conn, $SQLChart, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
			if($stmt === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
				echo json_encode($row);
				sqlsrv_free_stmt($stmt);
			}
		}
		else {
			echo "<script>
							console.error('Connection could not be established!');
						</script>";
			die(print_r(sqlsrv_errors(), true));
		}
		unset($SQLChart);
		unset($stmt);
		unset($tag);
		unset($datetime);
		unset($value);
		unset($row);
		sqlsrv_close($conn);
	}
?>