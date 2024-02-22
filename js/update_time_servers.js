function err_time()
{
	$("div.serv_time").html("N/A");
}

function show_time_serv()
{
	$.ajax({
		url: "read_time_now.php",
		cache: false,
		success: function(data)
		{
			data = JSON.parse(data);
			if (data.length === 0) err_time();
			for (var id in data)
			{
				if (data[id] == "Err") err_time()
					else
				$("div#" + id +".serv_time").html(data[id]);
			}
		},
		error: function()
		{
			err_time();
		}
	});
}

$(document).ready(function(){
	show_time_serv();
	setInterval('show_time_serv()', 1000);
});
