<?php
	// ОПИСАНИЕ ТЕГА И ЕДИНИЦЫ ИЗМЕРЕНИЯ
	$serverName = strip_tags(trim($_POST['serv_adr']));
	$serverLogin = strip_tags(trim($_POST['login']));
	$serverPwd = strip_tags(trim($_POST['pwd']));
	$tagsType = strip_tags(trim($_POST['tags']));
	echo '<br>'.$serverName.'<br>'.$serverLogin.'<br>'.$serverPwd.'<br>'.$tagsType.'<br>';
	$SQLTag = "SELECT CONVERT(char(10), [DateTime], 120)+' '+CONVERT(char(8), [DateTime], 108) AS [DateTime],
							[TagName], ROUND([Value], 2) AS [Value] FROM ".$tagsType;
	$connectionInfo = array("UID"=>$serverLogin, "PWD"=>$serverPwd, "Database"=>"Runtime");
	$conn = sqlsrv_connect($serverName, $connectionInfo);
	if($conn) {
		// достанем описание тэга
		$stmt = sqlsrv_query($conn, $SQLTag, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
		if($stmt === false) {
			die(print_r(sqlsrv_errors(), true));
		}
		echo '<table>';
		echo '<tr><td>Дата и время</td><td>Имя тега</td><td>Значение</td></tr>';
		while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			$tagName = mb_convert_encoding($row['TagName'], 'utf-8', 'cp1251');
			echo "<tr><td>$row[DateTime]</td><td>$tagName</td><td>$row[Value]</td></tr>";
		}
		echo '</table>';
	}
	else {
		echo "Connection could not be established.\n";
		die(print_r(sqlsrv_errors(), true));
	}
	/* Close the connection. */
	sqlsrv_close($conn);
?>