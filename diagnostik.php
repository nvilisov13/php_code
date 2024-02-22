<?php
	if(!($_COOKIE['user'] === '1')) {
		header('Location: http://_:81/teplo/index.php?select=authentification.php');
	}
?>
<html>
<head>
	<link rel="stylesheet" href="style/shema_diag.css">
	<script type="text/javascript" src="js/update_diagnostik.js"></script>
	<script type="text/javascript" src="js/update_time_servers.js"></script>
</head>

<body>
	<div class="main">
		<img src="images/diagnostik.png">
		<span class="stval_serv" style="left: 654px; top: 189px; width: 615px; height: 224px" id="server_6" title="Нет данных!">
		<div class="state_serv" style="height: 46px"><p>Нет данных</div>
		<div class="serv_time" id="server_22" title="Сервер - _">N/A</div>
		</span>

<!------------------------------------------------------------------------------------------------------------------------->
		<span class="line_1" style="left: 818px; top: 415px; width: 6px; height: 84px; background-color: rgba(0, 161, 255, 0.51);"></span>
		<span class="line_1" style="left: 188px; top: 493px; width: 636px; height: 6px; background-color: rgba(0, 161, 255, 0.51);"></span>
		<span class="line_1" style="left: 188px; top: 493px; width: 6px; height: 170px; background-color: rgba(0, 161, 255, 0.51);"></span>

		<span class="line_2" style="left: 888px; top: 415px; width: 6px; height: 166px; background-color: rgba(0, 161, 255, 0.51);"></span>
		<span class="line_2" style="left: 573px; top: 575px; width: 321px; height: 6px; background-color: rgba(0, 161, 255, 0.51);"></span>
		<span class="line_2" style="left: 573px; top: 575px; width: 6px; height: 88px; background-color: rgba(0, 161, 255, 0.51);"></span>

		<span class="line_3" style="left: 958px; top: 415px; width: 6px; height: 248px; background-color: rgba(0, 161, 255, 0.51);"></span>

		<span class="line_4" style="left: 1029px; top: 415px; width: 6px; height: 166px; background-color: rgba(0, 161, 255, 0.51);"></span>
		<span class="line_4" style="left: 1029px; top: 575px; width: 320px; height: 6px; background-color: rgba(0, 161, 255, 0.51);"></span>
		<span class="line_4" style="left: 1343px; top: 575px; width: 6px; height: 88px; background-color: rgba(0, 161, 255, 0.51);"></span>

		<span class="line_5" style="left: 1099px; top: 415px; width: 6px; height: 84px; background-color: rgba(0, 161, 255, 0.51);"></span>
		<span class="line_5" style="left: 1099px; top: 493px; width: 635px; height: 6px; background-color: rgba(0, 161, 255, 0.51);"></span>
		<span class="line_5" style="left: 1728px; top: 493px; width: 6px; height: 170px; background-color: rgba(0, 161, 255, 0.51);"></span>
<!------------------------------------------------------------------------------------------------------------------------->

		<span class="stval_serv" style="left: 20px; top: 663px" id="server_1" title="Нет данных!">
		<div class="state_serv"><p>Нет данных</div>
		<div class="serv_time" id="server_135" title="Сервер - _">N/A</div>
		</span>
		<span class="stval_serv" style="left: 405px; top: 663px" id="server_2" title="Нет данных!">
		<div class="state_serv"><p>Нет данных</div>
		<div class="serv_time" id="server_130" title="Сервер - _">N/A</div>
		</span>
		<span class="stval_serv" style="left: 790px; top: 663px" id="server_4" title="Нет данных!">
		<div class="state_serv"><p>Нет данных</div>
		<div class="serv_time" id="server_34" title="Сервер - _">N/A</div>
		</span>
		<span class="stval_serv" style="left: 1175px; top: 663px" id="server_3" title="Нет данных!">
		<div class="state_serv"><p>Нет данных</div>
		<div class="serv_time" id="server_20" title="Сервер - 10.179.142.20">N/A</div>
		</span>
		<span class="stval_serv" style="left: 1560px; top: 663px" id="server_5" title="Нет данных!">
		<div class="state_serv"><p>Нет данных</div>
		<div class="serv_time" id="server_30" title="Сервер - 192.168.31.30">N/A</div>
		</span>
	</div>

<!------------------------------------------------------------------------------------------------------------------------->
	<style media="all">
		@import url('style/style.css');
	</style>
<script>
	function logout(){
		document.location.href='http://_:81/teplo/index.php?select=authentification.php';
	}
</script>
	<div style="position: absolute; left: 31px; top: 157px">
	<p class="t_tab_val">Время установленное</p>
	<p class="t_tab_val">на серверах</p>
	<table>
		<tr><td>Сервера</td><td>Время сервера</td></tr>
		<tr><td>_</td><td><div class="serv_time" id="server_22">N/A</div></td></tr>
		<tr><td>10.179.142.20</td><td><div class="serv_time" id="server_20">N/A</div></td></tr>
		<tr><td>_</td><td><div class="serv_time" id="server_34">N/A</div></td></tr>
		<tr><td>_</td><td><div class="serv_time" id="server_130">N/A</div></td></tr>
		<tr><td>_</td><td><div class="serv_time" id="server_135">N/A</div></td></tr>
		<tr><td>192.168.31.30</td><td><div class="serv_time" id="server_30">N/A</div></td></tr>
	</table>
	<br>
	<button title="Разлогинится" onclick="logout()"><img src="images/exit.png" alt="---" style="vertical-align: middle"> -Выход- </button>
	</div>
<!------------------------------------------------------------------------------------------------------------------------->

</body>
</html>
