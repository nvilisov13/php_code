<?php
	if(isset($_GET['num']) and is_numeric($_GET['num'])){
		$math=floatval(strip_tags(trim($_GET['num'])));
		echo "<br>Введено число = ".$math;
		$math = round(abs($math), 2);
		echo "<br>Преобразовано в число = ".$math;
	}
	else
		echo "<br>Параметр указан неверно!";
?>