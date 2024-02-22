var err_val = false;

function message_err(message_str)
{
	$("li#message_js").css("display", "inline");
	$("li#message_js").html(message_str);
	$("span.stval_serv").css("background", "rgba(255, 0, 0, 0.37)");
	$("span.stval_serv").prop("title", "Нет данных");
	$("span.stval_serv > div").html("<p>N/A");
	$("span.stval_serv > div.state_serv").html("<p>Нет данных");
	$("span.line_1, span.line_2, span.line_3, span.line_4, span.line_5").css("backgroundColor", "rgba(176, 190, 197, 0.51)");
	if (err_val == false)
	{
		err_val = true;
		console.clear();
	}
}

function show_status(file_php)
{
	$.ajax({
		url: file_php,
		cache: false,
		success: function(data)
		{
			$("li#message_js").css("display", "none");
			data = JSON.parse(data);
			if (data.length == 0) message_err("Таблица MEMORY - пуста!");
			for (var id in data)
			{
				var str = id, str_id = id;
				str = str.substring(str.indexOf('_')+1);
				str_id = str_id.substring(str_id.indexOf('r_', 4)+2);
				if (data[id] == 0)
				{
					$("span.stval_serv#" + str).css("background", "rgba(0, 255, 0, 0.37)");
					$("span.stval_serv#" + str).prop("title", "Сбор данных происходит нормально");
					$("span.stval_serv#" + str + " > div.state_serv").html("<p>Сбор данных происходит нормально");
					$("span.line_" + str_id).css("backgroundColor", "rgba(0, 161, 255, 0.51)");
				}
				if (data[id] == 1)
				{
					$("span.stval_serv#" + str).css("background", "rgba(0, 0, 255, 0.37)");
					$("span.stval_serv#" + str).prop("title", "Ошибка получения данных");
					$("span.stval_serv#" + str + " > div.state_serv").html("<p>Ошибка получения данных");
					$("span.line_" + str_id).css("backgroundColor", "rgba(176, 190, 197, 0.51)");
				}
			}
			if (err_val == true)
			{
				err_val = false;
				console.clear();
			}
		},
		error: function()
		{
			message_err("Ошибка передачи данных - JavaScript!");
		}
	});
}

$(document).ready(function(){
	message_err('load...');
	err_val = false;
	show_status('read_state_servers.php');
	setInterval("show_status('read_state_servers.php')", 5000);
});
