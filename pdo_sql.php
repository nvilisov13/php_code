<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta name="viewport" content="width=device-width, user-scalable=yes">
	<link href="images/power.ico" rel="shortcut icon" type="image/x-icon">
	<script src="js/jquery.min.js"></script>
	<title>Тепло</title>
<style>
	table tr, td {
		border: 3px ridge #735b5b;
	}
	td {
		text-align: center;
		color: black;
	}
	.param_val {
		float: left;
	}
</style>
<script defer>
	var server_ip, tags_type;
	function view_val(){
		server_ip = $('select#server_id').val();
		tags_type = $('select#tags_id').val();
		console.clear();
		console.log('Server_ip = '+server_ip+'; '+'Tags_type = '+tags_type+'.');
	};
</script>
</head>

<body>
	<div class="param_val">Сервер:&nbsp;
		<select id="server_id">
			<option selected value="_">_</option>
			<option value="_">_</option>
			<option value="_">_</option>
			<option value="_">_</option>
		</select>
	</div>
	<div style="margin-left: 27px" class="param_val">Тип значений:&nbsp;
		<select id="tags_id">
			<option value="All">Все</option>
			<option selected value="Analog">Аналоговые</option>
			<option value="Digital">Цифровые</option>
		</select>
	</div>
	<br>

<script>
	$('select#server_id').on('change', view_val);
	$('select#tags_id').on('change', view_val);
</script>

<?php
	// ОПИСАНИЕ ТЕГА И ЕДИНИЦЫ ИЗМЕРЕНИЯ
	$SQLTag = "SELECT CONVERT(char(10), [DateTime], 120)+' '+CONVERT(char(8), [DateTime], 108) AS [DateTime],
							[TagName], ROUND([Value], 2) AS [Value] FROM dbo.AnalogLive";
	try
	{
		$dbh = new PDO('msql:host=_;dbname=Runtime', 'User', '_');
	}
	catch (PDOException $e)
	{
		print 'Ошибка подключения к БД!: '.$e->getMessage().'<br/>';
		die();
	}
	// достанем описание тэга
	$stmt = $dbh->prepare($SQLTag);
	$stmt->execute();
	/*echo '<br><table>';
	echo '<tr><td>Дата и время</td><td>Имя тега</td><td>Значение</td></tr>';
	while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
		echo "<tr><td>$row[DateTime]</td><td>$row[TagName]</td><td>$row[Value]</td></tr>";
	}
	echo '</table>';*/
	print_r($row);
	/* Close the connection. */
	unset($dbh); unset($stmt);
?>

</body>

</html>