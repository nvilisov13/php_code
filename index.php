<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
	<!--Заголовок и начальная инициализация web-интерфейса-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta name="viewport" content="width=device-width, user-scalable=yes">
	<meta name="author" content="Вилисов Николай Викторович">
	<meta name="keywords" content="УСПД сбор и передача данных, диагностика, показания приборов">
	<meta name="description" content="УСПД сбор и передача данных, диагностика, показания приборов, параметры электроэнергии">
	<link href="images/power.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="style/navbar.css">
	<link rel="stylesheet" href="style/general_param_for_mnemonic_diag.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/html2canvas.js"></script>
	<script type="text/javascript" src="js/download.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/time_show.js"></script>
	<title>К-3 ЧРЭП</title>
</head>

<body>
	<form method="get" action="index.php">
		<ul id="navbar">
			<li id="main_steam_pipe"><a href="index.php?select=main_steam_pipe.php">
				Главный паропровод</a></li>
			<li id="diagnostik"><a href="index.php?select=diagnostik.php">
				Схема-диагностики</a></li>
			<li id="table_all"><a href="index.php?select=table_all.php">
				Все теги</a></li>
			<li><img src="images/camera.png" title="Сделать снимок экрана" class="buttons" onclick="screen_page()"></li>
			<!--li><img src="images/export_in-csv.png" title="Экспорт значений в CSV-файл" class="buttons" onclick="export_in_csv('csv_ory_and_gry.php', 'ory_and_gry')"></li-->
			<!-- проверяем включен ли JavaScript если нет то выводим строку -->
			<noscript><li class="notification">У вас отключен JavaScript!!!</li></noscript>
			<li id="message_js" class="notification"></li>
			<li id="time_serv" onclick="alert('!!!')">N/A</li>
		</ul>
	</form>
	<a id="screen_link" style="display: none" href="#" target="_blank" download></a>

	<center>
<?php
	if(isset($_GET['select']))
	{
		$select = strip_tags(trim($_GET['select']));
		echo '<div id="sel_link" style="display: none">'.$select.'</div>';
		try
		{
			require_once($select);
		}
		catch(Exception $e)
		{
			echo 'Выброшено исключение: ', $e->getMessage(), '\n';
		}
	}
	else
		header('Location: index.php?select=main_steam_pipe.php');
?>
	</center>

</body>

</html>
