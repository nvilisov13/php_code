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
	<link rel="stylesheet" href="style/style.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<title>Тепло</title>
<script defer>
	var server_num, tags_type, ip_adr, user_id, user_pwd, tag_type;
	function show_table(data){
		$('div#table_tags').html(data);
	};
	function view_val(){
		$('div#table_tags').html('');
		server_num = $('select#server_id').val();
		tags_type = $('select#tags_id').val();
		console.clear();
		switch(server_num){
			case 'server_1':
				ip_adr = '_';
				user_id = 'wwUser';
				user_pwd = '123';
			break;
			case 'server_2':
				ip_adr = '_';
				user_id = 'wwUser';
				user_pwd = '123';
			break;
			case 'server_3':
				ip_adr = '_';
				user_id = 'aaUser';
				user_pwd = 'pwUser';
			break;
			case 'server_4':
				ip_adr = '10.179.142.20';
				user_id = 'aaUser';
				user_pwd = 'pwUser';
			break;
		};
		switch(tags_type){
			case 'all':
				tag_type = 'dbo.DiscreteLive, dbo.AnalogLive';
			break;
			case 'analog':
				tag_type = 'dbo.AnalogLive';
			break;
			case 'digital':
				tag_type = 'dbo.DiscreteLive';
			break;
		};
		console.log('Server_num = '+server_num+'; '+'Tags_type = '+tags_type+'.');
		$.ajax({
			url: 'table_tags.php',
			method: 'POST',
			cache: false,
			scriptCharset: 'utf-8',
			data: ({serv_adr: ip_adr, login: user_id, pwd: user_pwd, tags: tag_type}),
			dataType: 'html',
			success: show_table,
			error: function()
			{
				console.log('Ошибка JQuery или Ajax!');
			}
		});
	};
</script>
</head>

<body>
	<div class="param_val">Сервер:&nbsp;
		<select id="server_id">
			<option selected value="server_1">_</option>
			<option value="server_2">_</option>
			<option value="server_3">_</option>
			<option value="server_4">10.179.142.20</option>
		</select>
	</div>
	<div style="margin-left: 27px" class="param_val">Тип значений:&nbsp;
		<select id="tags_id">
			<option value="all">Все</option>
			<option selected value="analog">Аналоговые</option>
			<option value="digital">Цифровые</option>
		</select>
	</div>
	<br>

<script>
	$('select#server_id').on('change', view_val);
	$('select#tags_id').on('change', view_val);
</script>
	<br>
	<div id="table_tags">
	</div>

</body>

</html>