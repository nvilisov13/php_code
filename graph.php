<?php
	mb_internal_encoding('utf8');
	if(!isset($_GET['server_number']))
	{
		echo 'Ошибка! Параметр указан неверно!';
		exit;
	}
	else
		$server_num = strip_tags(trim($_GET['server_number']));
	if(isset($_GET['day']) and is_numeric($_GET['day']))
		$day=intval(strip_tags(trim($_GET['day'])));
	else
		$day=-3;
	if(!isset($_GET['tag_name']))
	{
		echo 'Ошибка! Параметр указан неверно!';
		$tag='-';
		exit;
	}
	else
		$tag=strip_tags(trim($_GET['tag_name']));
	if(isset($_GET['id_unit']) and is_numeric($_GET['id_unit']))
		$GLOBALS['id_unit'] = intval(strip_tags(trim($_GET['id_unit'])));
	else {
		echo 'Ошибка! Параметр указан неверно!';
		exit;
	}
	$type_p='---';
	$unit='-';
	include 'connection_msql.php';
	$SQLqueryDescript = "SELECT [TagName], [Description], [Unit] FROM dbo.Tag, dbo.EngineeringUnit
												WHERE dbo.Tag.TagName='$tag' AND dbo.EngineeringUnit.EUKey='$id_unit'";
	$SQLqueryDescript = mb_convert_encoding($SQLqueryDescript, 'cp1251', 'utf-8');
	if($conn)
	{
		$stmt = sqlsrv_query($conn, $SQLqueryDescript, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
		if($stmt === false) {
			die(print_r(sqlsrv_errors(), true));
		}
		else {
			$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
			$row['Description'] = mb_convert_encoding($row['Description'], 'utf-8', 'cp1251');
			$GLOBALS['type_p'] = $row['Description'].' (Название тега - '.$tag.')';
			$GLOBALS['unit'] = mb_convert_encoding($row['Unit'], 'utf-8', 'cp1251');
			sqlsrv_free_stmt($stmt);
		}
	}
	else {
		echo 'Connection could not be established.';
		die(print_r(sqlsrv_errors(), true));
	}
	unset($SQLqueryDescript);
	unset($stmt);
	unset($row);
	sqlsrv_close($conn);
//--------------------------------------------------------------------------------------------------
	$date_arr = Array();
	$time_arr = Array();
	if(isset($_GET['since_date']) && isset($_GET['since_time']) && isset($_GET['until_date']) && isset($_GET['until_time']))
	{
		$since_date = strip_tags(trim($_GET['since_date']));
		$since_time = strip_tags(trim($_GET['since_time']));
		$until_date = strip_tags(trim($_GET['until_date']));
		$until_time = strip_tags(trim($_GET['until_time']));
		$date_arr = explode('.', $since_date.'.'.$until_date);
		$time_arr = explode(':', $since_time.':'.$until_time);
		$since = mktime($time_arr[0], $time_arr[1], 0, $date_arr[1], $date_arr[0], $date_arr[2]);
		$until = mktime($time_arr[2], $time_arr[3], 0, $date_arr[4], $date_arr[3], $date_arr[5]);
		unset($date_arr);
		unset($time_arr);
		$day = round(($until - $since) / (60 * 60 * 24));
		$time_str = $day;
		$unit_time = 'дней';
	}
	else if(isset($day))
	{
		$current_timestamp = time();
		if ($day >= 1)
		{
			$unit_time = 'дней';
			$since = $current_timestamp - 60 * 60 * 24 * $day;
			$time_str = $day."&emsp;&ensp;дней";
		}
		else
		{
			$unit_time = 'часов';
			$day = abs($day);
			$since = $current_timestamp - 60 * 60 * $day;
			$time_str = $day."&emsp;&ensp;часа";
		}
		$until = $current_timestamp;
		$since_date = date('d.m.Y', $since);
		$since_time = date('H:i', $since);
		$until_date = date('d.m.Y', $until);
		$until_time = date('H:i', $until);
	}
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta name="viewport" content="width=device-width, user-scalable=yes">
	<link href="images/power.ico" rel="shortcut icon" type="image/x-icon" />
	<title>График № <?=$tag?></title>
	<link rel="stylesheet" type="text/css" href="style/jquery.timepicker.css" />
	<link rel="stylesheet" type="text/css" href="style/bootstrap-datepicker.standalone.css" />
	<link rel="stylesheet" type="text/css" href="style/pikaday.css" />
	<link rel="stylesheet" type="text/css" href="style/jquery.ptTimeSelect.css" />
	<link rel="stylesheet" type="text/css" href="style/jquery-ui.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style/site.css" />
	<link rel="stylesheet" type="text/css" href="style/dygraph.css" />
	<link rel="stylesheet" type="text/css" href="style/graph.css" />
	<link rel="stylesheet" type="text/css" href="style/navbar.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.timepicker.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/pikaday.js"></script>
	<script src="js/jquery.ptTimeSelect.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/site.js"></script>
	<script src="js/datepair.min.js"></script>
	<script src="js/jquery.datepair.min.js"></script>
	<script src="js/dygraph.js"></script>
	<script src="js/time_show.js"></script>
	<script src="js/html2canvas.js"></script>
	<script type="text/javascript">
	function cls_units()
	{
		$("div.calendar > div#unit_t").text('_____');
	};
	function day_sel(value)
	{
		document.location.href="graph.php?server_number=<?=$server_num?>&tag_name=<?=$tag?>&day="+value+"&id_unit=<?=$id_unit?>";
	}
	</script>
</head>

<body>
	<center><h3><?=$type_p?></h3></center>
	<span style="left: 26px; top: 47px"><?=$unit?></span>

	<div id="period">
	<div class="calendar">График за:&ensp;
		<select onchange="day_sel(value)" onclick="cls_units()">
			<option selected><?=$time_str?></option>
			<option value="-1">1&emsp;&ensp;час</option>
			<option value="-3">3&emsp;&ensp;часа</option>
			<option value="-6">6&emsp;&ensp;часов</option>
			<option value="-8">8&emsp;&ensp;часов</option>
			<option value="-11">11&emsp;&ensp;часов</option>
			<option value="-16">16&emsp;&ensp;часов</option>
			<option value="-21">21&emsp;&ensp;час</option>
			<option value="1">1&emsp;&ensp;день</option>
			<option value="2">2&emsp;&ensp;дня</option>
			<option value="3">3&emsp;&ensp;дня</option>
			<option value="4">4&emsp;&ensp;дня</option>
			<option value="5">5&emsp;&ensp;дней</option>
			<option value="6">6&emsp;&ensp;дней</option>
			<option value="7">7&emsp;&ensp;дней</option>
			<option value="8">8&emsp;&ensp;дней</option>
			<option value="9">9&emsp;&ensp;дней</option>
		</select>&emsp;<div id="unit_t"><?=$unit_time?></div></div>
		<div style="margin-left: 17px" class="calendar">
			<label>Период с:&emsp;</label>
			<input type="text" class="date date1" value="<?=$since_date?>" />
			<input type="text" class="time time1" value="<?=$since_time?>" />
		</div>
		<div class="calendar">
			<label>по&emsp;</label>
			<input type="text" class="date date2" value="<?=$until_date?>" />
			<input type="text" class="time time2" value="<?=$until_time?>" />
		</div>
		<button id="build_graph" title="Строит график за выбранный интервал времени"><img src="images/play.png" alt="---" style="vertical-align: middle">Построить график</button>
		<img src="images/camera.png" title="Сделать снимок экрана" class="buttons" style="float: left; position: absolute; left: 1091px" onclick="screen_page()">
		<div id="time_serv" style="position: absolute; width: 251px; left: 1135px">N/A</div>
	</div>
	<a id="screen_link" style="display: none" href="#" target="_blank" download></a>

<script language="javascript" type="text/javascript">

	function movechar(string, a, b)
	{
		if(a==b) return string;
		if(a>b) {c=a; a=b; b=c;}
		return (string.slice(0, a)+string.charAt(b)+string.slice(a+1, b)+string.charAt(a)+string.slice(b+1));
	}

	// initialize input widgets first
	$('#period .date1').datepicker({
		'format': 'dd.mm.yyyy',
		'firstDay' : 0,
		'autoclose' : true,
		'weekStart' : 1,
		'todayHighlight' : true,
		'autoclose': true
	});

	$('#period .time1').timepicker({
		'showDuration': true,
		'timeFormat': 'H:i',
		'lang': { am: 'am', pm: 'pm', AM: 'AM', PM: 'PM', decimal: '.', mins: 'мин.', hr: 'час.', hrs: 'час.' },
		'step' : 1,
		'autoclose' : true
	});

	$('#period .date2').datepicker({
		'format': 'dd.mm.yyyy',
		'firstDay' : 0,
		'autoclose' : true,
		'weekStart' : 1,
		'todayHighlight' : true,
		'autoclose': true
	});

	$('#period .time2').timepicker({
		'showDuration': true,
		'timeFormat': 'H:i',
		'lang': { am: 'am', pm: 'pm', AM: 'AM', PM: 'PM', decimal: '.', mins: 'мин.', hr: 'час.', hrs: 'час.' },
		'step' : 1,
		'autoclose' : true
	});

	var since_date, since_time, until_date, until_time;
	// initialize datepair
	$('#period').datepair();
	$('#period #build_graph').on('click', function()
	{
		since_date = $('#period .date1').val();
		since_time = $('#period .time1').val();
		until_date = $('#period .date2').val();
		until_time = $('#period .time2').val();
		document.location.href="graph.php?server_number=<?=$server_num?>&tag_name=<?=$tag?>&since_date="+since_date+'&since_time='+since_time+'&until_date='+until_date+'&until_time='+until_time+"&id_unit=<?=$id_unit?>";
	});

</script>

	<div id="graph"><img src="images/loading.gif"></div>

<script language="javascript" type="text/javascript">
	var server_val='<?=$server_num?>', tag_val='<?=$tag?>', since_val=<?=$since?>, until_val=<?=$until?>;
	var str_legend='-';
	function dygraph(data){
		new Dygraph(
		$('#graph').attr('id'),
		data,
		{
			legend: 'always',
			animatedZooms: true,
			errorBars: true,
			axisLineColor: '#c2ce89',
			color: '#16d62f',
			gridLineColor: '#f5b807',
			axes: { x: { valueFormatter: function (d) { var date = new Date(d).toLocaleDateString('ru-RU'); var time = new Date(d).toLocaleTimeString('ru-RU'); return date+' '+time+'&nbsp;';} } },
			legendFormatter(data)
			{
				$('td#time.current_val').html(function(){
					if(data.x != null){
						str_legend = data.xHTML + data.series.map(v => v.labelHTML);
						str_legend = str_legend.slice(0, str_legend.indexOf('&nbsp;'));
						return str_legend;
					};
				});
				$('td#sum_p.current_val').html(function(){
					if(data.x != null){
						str_legend = data.xHTML + data.series.map(v => v.labelHTML + ':' + v.yHTML);
						str_legend = str_legend.slice(str_legend.indexOf('е:')+2, str_legend.length);
						return str_legend;
					};
				});
				if (data.x == null) return '';
				return data.xHTML + '<br>' + data.series.map(v => v.labelHTML + ': ' + v.yHTML).join('');
			}
		})
	};
	function show_dygraph(){
		$.ajax({
			url: 'data_graph.php',
			method: 'POST',
			cache: false,
			scriptCharset: 'utf-8',
			data: ({server_number: server_val, tag_name: tag_val, since: since_val, until: until_val}),
			dataType: 'html',
			success: dygraph,
			error: function()
			{
				console.log('Ошибка JQuery или Ajax!');
			}
		});
	};
	function static_table(data){
		data = JSON.parse(data);
		for (var id in data)
			$("#" + id).html(data[id].toFixed(2));
	};
	function show_static(){
		$.ajax({
			url: 'static.php',
			method: 'POST',
			cache: false,
			scriptCharset: 'utf-8',
			data: ({server_number: server_val, tag_name: tag_val, since: since_val, until: until_val}),
			dataType: 'html',
			success: static_table,
			error: function()
			{
				console.log('Ошибка JQuery или Ajax!');
			}
		});
	};

	$('body').on('load', show_dygraph(), show_static());
</script>

	<br>
	<table class="current_val" style="margin-left: 23px">
		<tr>
			<td class="current_val" style="width: 145px"><b>Максимальное</b></td><td id="max" class="current_val">-&nbsp;</td><td class="current_val" style="width: 63px"><b><i><?=$unit?></i></b></td>
			<td style="width: 327px"></td>
			<td class="current_val" style="width: 81px">Время</td><td id="time" class="current_val" style="width: 193px">&nbsp;</td>
			<td class="current_val" style="width: 97px">Значение</td><td id="sum_p" class="current_val" style="width: 83px">&nbsp;</td>
		</tr>
		<tr>
			<td class="current_val"><b>Среднее</b></td><td id="avg" class="current_val">-&nbsp;</td><td class="current_val" style="width: 63px"><b><i><?=$unit?></i></b></td>
		</tr>
		<tr>
			<td class="current_val"><b>Минимальное</b></td><td id="min" class="current_val">-&nbsp;</td><td class="current_val" style="width: 63px"><b><i><?=$unit?></i></b></td>
		</tr>
	</table>
</body>
</html>
