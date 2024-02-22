function show_boiler(file_php)
{
// ===========================================================================
function show_boiler_state(boiler_name, sum_fakel, consumption)
{
	console.log('Котел = '+boiler_name+'; Горелок = '+sum_fakel+'; Расход = '+consumption+';\n');
	if (Number(sum_fakel) <= 0 || Number(consumption) <= 0)
	{
		console.log(boiler_name+' Котел не работает. Количество горелок = '+sum_fakel+' Расход = '+consumption);
	}
	else if (Number(sum_fakel) > 0 && Number(consumption) > 0)
	{
		console.log(boiler_name+' Котел работает. Количество горелок = '+sum_fakel+' Расход = '+consumption);
	}
	else
	{
		console.log(boiler_name+' Ошибка получения данных! Количество горелок = '+sum_fakel+' Расход = '+consumption);
	}
}
// ===========================================================================
	$.ajax({
		url: file_php,
		cache: false,
		success: function(data)
		{
			data = JSON.parse(data);
			if (data.length == 0) alert("Таблица MEMORY - пуста!");
			// for (var id in data)
			// {
			// 	console.log('id = '+id+'; data = '+data[id]);
			// }
			console.log('================================\n');
			show_boiler_state('K_1 = ', data['FAKEL_K1'], data['K1Z_F302']);
			show_boiler_state('K_2 = ', data['FAKEL_K2'], data['K2_F1_para_za_k']);
			show_boiler_state('K_3 = ', data['FAKEL_K3'], data['PK-3_AI19_5']);
			show_boiler_state('K_4 = ', data['FAKEL_K4'], data['K4_4NFC201_10']);
			show_boiler_state('K_5 = ', data['FAKEL_K5'], Number(data['K5_FQ2'])+Number(data['K5_FQ3']));
			// show_boiler_state('K_6 = ', data['FAKEL_K6'], data['K1Z_F302']);
		},
		error: function()
		{
			alert("Ошибка передачи данных - JavaScript!");
		}
	});
}

show_boiler('http://localhost/teplo/read_fakel_sum.php');
