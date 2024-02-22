var err_val = false;

function message_err(message_str)
{
	$("li#message_js").css("display", "inline");
	$("li#message_js").html(message_str);
	$("td.value > a").html("N/A");
	$("td.value > a").css("color", "#1437405e");
	$("td.table_val > a").html("N/A");
	$("td.table_val > a").css("color", "1437405e");
	$("span.valblock.torch").css("background", "");
	$("span.valblock.boiler").css("background", "rgba(0, 0, 216, 0.23)");
	$("span.valblock.boiler#blFAKEL_K1").prop("title", "Котел №1 - нет данных");
	$("span.valblock.boiler#blFAKEL_K2").prop("title", "Котел №2 - нет данных");
	$("span.valblock.boiler#blFAKEL_K3").prop("title", "Котел №3 - нет данных");
	$("span.valblock.boiler#blFAKEL_K4").prop("title", "Котел №4 - нет данных");
	$("span.valblock.boiler#blFAKEL_K5").prop("title", "Котел №5 - нет данных");
	$("span.valblock.boiler#blFAKEL_K6").prop("title", "Котел №6 - нет данных");
	$("span.valblock.boiler_bottom").css("borderBottom", "10px solid rgba(0, 0, 216, 0.23)");
	$("span.valblock.turbanimate").css("background", "");
	$("span.valblock.turbanimate").prop("title", "Ошибка! Передачи данных - невозможно получить текущий статус");
	$("span.valblock.turbine").css("background", "rgba(0, 0, 216, 0.23)");
	$("span.valblock.turbine#blturb_1").prop("title", "Турбина № 1 - текущий статус неизвестен!");
	$("span.valblock.turbine#blturb_2").prop("title", "Турбина № 2 - текущий статус неизвестен!");
	$("span.valblock.turbine#blturb_3").prop("title", "Турбина № 3 - текущий статус неизвестен!");
	$("span.valblock.turbine#blturb_4").prop("title", "Турбина № 4 - текущий статус неизвестен!");
	$("span.valblock.wateranimate > div.circle > div.liquid").css("background", "black");
	if (err_val == false)
	{
		err_val = true;
		console.clear();
	}
}

function show(file_php)
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
				$("span.valblock > a#" + id).html(data[id]);
				if (data[id] == "Err" || data[id] == "-11111" || data[id] == "-1999.9")
				{
					$("span.valblock > a#" + id).html("N/A");
					$("span.valblock > a#" + id).css("color", "#1437405e");
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

function show_table(file_php)
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
				$("td.table_val > a#" + id).html(data[id]);
				$("td.table_val > a#" + id).css("color", "#143740");
				if (data[id] == "Err") message_err("Истек таймаут ожидания!");
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

function show_level(file_php)
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
				$("td.value > a#" + id).html(data[id]);
				$("td.value > a#" + id).css("color", "#143740");
				var procent=Math.round(((150+Number(data[id]))/300)*100);
				if (procent > 100) procent=100;
				if (procent < 0) procent=0;
				//console.log(id+' = '+procent+'%');
				$("span#"+id+"_wl.valblock.wateranimate > div.circle > div.liquid").css("background", "");
				$("span#"+id+"_wl.valblock.wateranimate > div.circle > div.water").css("transform", 'translate(0%, '+(100-procent)+'%)');
				if (data[id] == "Err")
				{
					message_err("Истек таймаут ожидания!");
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

function show_fakel_k5(file_php)
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
				(data[id] == '1') ? $("span.valblock.torch#" + id).css("backgroundImage", "url(images/torch-13x6.gif)") :
				$("span.valblock.torch#" + id).css("background", "");
				if (data[id] == "Err") message_err("Истек таймаут ожидания!");
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

function show_fakel_big(file_php)
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
				if (data[id] == '1')
				{
					$("span.valblock.torch#" + id).css("backgroundImage", "url(images/torch-15x12.gif)");
				}
				else if (data[id] == '0')
				{
					$("span.valblock.torch#" + id).css("background", "");
				}
				else if (data[id] == "Err" || data[id] == "") $("span.valblock.torch#" + id).css("background", "");
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

function show_boiler(file_php)
{
	$.ajax({
		url: file_php,
		cache: false,
		success: function(data)
		{
			$("li#message_js").css("display", "none");
// ==========================================================================
function show_boiler_state(id_s, sum_fakel, consumption, pit_v)
{
	var sum_fakel = Number(sum_fakel), consumption = Number(consumption), pit_v=Number(pit_v);
	var str_id = '', num_id = '';
	str_id = id_s;
	str_id = str_id.substring(str_id.indexOf('_', 4)+1);
	num_id = str_id.substring(1);
	if (sum_fakel <= 0 || consumption <= 20 || pit_v <= 20)
	{
		$("span.valblock.boiler#bl" + id_s).css("background", "rgba(0, 255, 0, 0.23)");
		$("span.valblock.boiler#bl" + id_s).prop("title", "Котел №" + num_id + " - в резерве");
		$("span.valblock.boiler_bottom#blbtn_" + str_id).css("borderBottom", "10px solid rgba(0, 255, 0, 0.23)");
	}
	else if (sum_fakel > 0 && consumption > 20 && pit_v > 20)
	{
		$("span.valblock.boiler#bl" + id_s).css("background", "rgba(216, 0, 0, 0.23)");
		$("span.valblock.boiler#bl" + id_s).prop("title", "Котел №" + num_id + " - в работе");
		$("span.valblock.boiler_bottom#blbtn_" + str_id).css("borderBottom", "10px solid rgba(216, 0, 0, 0.23)");
	}
	else
	{
		$("span.valblock.boiler#bl" + id_s).css("background", "rgba(0, 0, 216, 0.23)");
		$("span.valblock.boiler#bl" + id_s).prop("title", "Котел №" + num_id + " - нет данных");
		$("span.valblock.boiler_bottom#blbtn_" + str_id).css("borderBottom", "10px solid rgba(0, 0, 216, 0.23)");
	}
}
// ==========================================================================
			data = JSON.parse(data);
			if (data.length == 0) message_err("Таблица MEMORY - пуста!");
			else
			{
				for (var id in data)
				{
					if (data[id] >= 20) $("td.value > a#" + id).html(data[id]);
					else $("td.value > a#" + id).html('0');
					$("td.value > a#" + id).css("color", "#143740");
					if (data[id] == "Err" || data[id] == "")
					{
						$("td.value > a#" + id).html("N/A");
						$("td.value > a#" + id).css("color", "#1437405e");
					}
				}
				show_boiler_state('FAKEL_K1', data['FAKEL_K1'], data['K1Z_F302'], '35');//ложный расход питательной воды для К-1
				show_boiler_state('FAKEL_K2', data['FAKEL_K2'], data['K2_2NFC201_10'], data['K2_2NFC201_11']);
				show_boiler_state('FAKEL_K3', data['FAKEL_K3'], data['K3_3NFC201_10'], '35');//ложный расход питательной воды для К-3
				show_boiler_state('FAKEL_K4', data['FAKEL_K4'], '35', '35'); //расход ложный для К-4
				show_boiler_state('FAKEL_K5', data['FAKEL_K5'], Number(data['K5_FQ2'])+Number(data['K5_FQ3']), '35');//ложный расход питательной воды для К-5
				// show_boiler_state('FAKEL_K6', data['FAKEL_K6'], data['']);
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

function show_turb(file_php)
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
				$("td.value > a#" + id).html(data[id]);
				$("td.value > a#" + id).css("color", "#143740");
				$("td.table_val > a#total_power").html(data['total_power']);
				$("td.table_val > a#total_power").css("color", "#143740");
				$("td.table_val > a#temp_out_air").html(data['temp_out_air']);
				$("td.table_val > a#temp_out_air").css("color", "#143740");
				if (data[id] == "Err") message_err("Истек таймаут ожидания!");
				
				switch(id){
					case 'TgTag_5112':
					{
						if (data[id] > 1.5)
						{
							$("span.valblock.turbanimate#turbanim_1").css("background-image", "url(images/generator.gif)");
							$("span.valblock.turbine#blturb_1").css("background", "rgba(216, 0, 0, 0.23)");
							$("span.valblock.turbine#blturb_1").prop("title", "Турбина № 1 - работает!");
							$("span.valblock.turbanimate#turbanim_1").prop("title", "Турбина № 1 - работает!");
						}
						else if (data[id] < 1.5)
						{
							$("span.valblock.turbanimate#turbanim_1").css("background", "");
							$("span.valblock.turbine#blturb_1").css("background", "rgba(0, 255, 0, 0.23)");
							$("span.valblock.turbine#blturb_1").prop("title", "Турбина № 1 - отключена!");
							$("span.valblock.turbanimate#turbanim_1").prop("title", "Турбина № 1 - отключена!");
						}
						else
						{//console.log(data[id]);
							$("span.valblock.turbanimate#turbanim_1").css("background", "");
							$("span.valblock.turbine#blturb_1").css("background", "rgba(0, 0, 216, 0.23)");
							$("span.valblock.turbine#blturb_1").prop("title", "Турбина № 1 - текущий статус неизвестен!");
							$("span.valblock.turbanimate#turbanim_1").prop("title", "Турбина № 1 - текущий статус неизвестен!");
						}
					}
					break;
					case 'TgTag_2':
					{
						if (data[id] > 1.5)
						{
							$("span.valblock.turbanimate#turbanim_2").css("background-image", "url(images/generator.gif)");
							$("span.valblock.turbine#blturb_2").css("background", "rgba(216, 0, 0, 0.23)");
							$("span.valblock.turbine#blturb_2").prop("title", "Турбина № 2 - работает!");
							$("span.valblock.turbanimate#turbanim_2").prop("title", "Турбина № 2 - работает!");
						}
						else if (data[id] < 1.5)
						{
							$("span.valblock.turbanimate#turbanim_2").css("background", "");
							$("span.valblock.turbine#blturb_2").css("background", "rgba(0, 255, 0, 0.23)");
							$("span.valblock.turbine#blturb_2").prop("title", "Турбина № 2 - отключена!");
							$("span.valblock.turbanimate#turbanim_2").prop("title", "Турбина № 2 - отключена!");
						}
						else
						{
							$("span.valblock.turbanimate#turbanim_2").css("background", "");
							$("span.valblock.turbine#blturb_2").css("background", "rgba(0, 0, 216, 0.23)");
							$("span.valblock.turbine#blturb_2").prop("title", "Турбина № 2 - текущий статус неизвестен!");
							$("span.valblock.turbanimate#turbanim_2").prop("title", "Турбина № 2 - текущий статус неизвестен!");
						}
					}
					break;
					case 'TgTag_5111':
					{
						if (data[id] > 1.5)
						{
							$("span.valblock.turbanimate#turbanim_3").css("background-image", "url(images/generator.gif)");
							$("span.valblock.turbine#blturb_3").css("background", "rgba(216, 0, 0, 0.23)");
							$("span.valblock.turbine#blturb_3").prop("title", "Турбина № 3 - работает!");
							$("span.valblock.turbanimate#turbanim_3").prop("title", "Турбина № 3 - работает!");
						}
						else if (data[id] < 1.5)
						{
							$("span.valblock.turbanimate#turbanim_3").css("background", "");
							$("span.valblock.turbine#blturb_3").css("background", "rgba(0, 255, 0, 0.23)");
							$("span.valblock.turbine#blturb_3").prop("title", "Турбина № 3 - отключена!");
							$("span.valblock.turbanimate#turbanim_3").prop("title", "Турбина № 3 - отключена!");
						}
						else
						{
							$("span.valblock.turbanimate#turbanim_3").css("background", "");
							$("span.valblock.turbine#blturb_3").css("background", "rgba(0, 0, 216, 0.23)");
							$("span.valblock.turbine#blturb_3").prop("title", "Турбина № 3 - текущий статус неизвестен!");
							$("span.valblock.turbanimate#turbanim_3").prop("title", "Турбина № 3 - текущий статус неизвестен!");
						}
					}
					break;
					case 'SI_G_P':
					{
						if (data[id] > 0.1)
						{
							$("span.valblock.turbanimate#turbanim_4").css("background-image", "url(images/generator.gif)");
							$("span.valblock.turbine#blturb_4").css("background", "rgba(216, 0, 0, 0.23)");
							$("span.valblock.turbine#blturb_4").prop("title", "Турбина № 4 - работает!");
							$("span.valblock.turbanimate#turbanim_4").prop("title", "Турбина № 4 - работает!");
						}
						else if (data[id] < 0.1)
						{
							$("span.valblock.turbanimate#turbanim_4").css("background", "");
							$("span.valblock.turbine#blturb_4").css("background", "rgba(0, 255, 0, 0.23)");
							$("span.valblock.turbine#blturb_4").prop("title", "Турбина № 4 - отключена!");
							$("span.valblock.turbanimate#turbanim_4").prop("title", "Турбина № 4 - отключена!");
						}
						else
						{
							$("span.valblock.turbanimate#turbanim_4").css("background", "");
							$("span.valblock.turbine#blturb_4").css("background", "rgba(0, 0, 216, 0.23)");
							$("span.valblock.turbine#blturb_4").prop("title", "Турбина № 4 - текущий статус неизвестен!");
							$("span.valblock.turbanimate#turbanim_4").prop("title", "Турбина № 4 - текущий статус неизвестен!");
						}
					}
					break;
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
	show('read_main_steam_pipe.php');
	setInterval("show('read_main_steam_pipe.php')", 3000);
	/*show_table('read_table_current_ind.php');
	setInterval("show_table('read_table_current_ind.php')", 3000);
	show_level('read_level.php');
	setInterval("show_level('read_level.php')", 3000);
	show_turb('php_pdo.php');
	setInterval("show_turb('php_pdo.php')", 3000);
	show_fakel_k5('read_fakel_state.php');
	setInterval("show_fakel_k5('read_fakel_state.php')", 3000);
	show_fakel_big('read_fakel_big.php');
	setInterval("show_fakel_big('read_fakel_big.php')", 3000);
	show_boiler('read_fakel_sum.php');
	setInterval("show_boiler('read_fakel_sum.php')", 3000);*/
});
