function show_time()
{
	$.ajax({
		url: "time.php",
		cache: false,
		success: function(data)
		{
			$("#time_serv").html(data);
		},
		error: function()
		{
			$("#time_serv").html("Error");
		}
	});
}
$(document).ready(function(){
	show_time();
	setInterval('show_time()', 1000);
});

function screen_page(){
	/*размеры, если надо
	width: 2500,
	height: 500,*/
	html2canvas(document.querySelector('*')).then(canvas => {
		document.body.appendChild(canvas)
		//после того, как сформировался канвас, копируем ссылку изображения и сохраняем файл
		screenShot();
	});
};
function screenShot()
{
	var canvas = $('canvas:last')[0];
	var data = canvas.toDataURL('image/png').replace(/data:image\/png;base64,/, '');
	$('canvas:last').remove();
	$.post('screen_file.php',{data:data}, function(rep){
		console.log('Изображение '+rep+' сохранено' );
		$('#screen_link').attr('href', rep);
		$('#screen_link')[0].click();
	});
}

function export_in_csv(url_file, name_file)
{
	$.ajax({
		url: url_file,
		method: 'POST',
		cache: false,
		scriptCharset: 'utf-8',
		dataType: 'text',
		success: function(data)
		{
			if (data.length === 0) console.log('Ошибка формирования структуры данных!');
			download(new Blob([data]), name_file+'.csv', 'text/plain');
		},
		error: function()
		{
			console.log('Ошибка формирования структуры данных!');
		}
	});
}