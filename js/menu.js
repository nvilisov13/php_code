function sel_item(event)
{
	var str_link = $("#sel_link").html();
	if (str_link == "main_steam_pipe.php" || str_link == "diagnostik.php" || str_link == "table_all.php")
	{
		str_link = str_link.substr(0, str_link.indexOf("."));
		str_link = str_link.replace(",", "_");
		$("#" + str_link).css("background-color", "#00c853");
	}
	else if (str_link != "")
		$("#diagnostics__tests").css("background-color", "#0000ff");
}

$(document).ready(function()
{
	$("body").bind("onload", sel_item());
});
