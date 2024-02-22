<?php
	$current_time = time();
	$name = 'tmp_screenshot/'.$current_time.'.png';
	file_put_contents($name, base64_decode($_POST['data']));
	echo($name);

	$arr_dir = scandir('tmp_screenshot', SCANDIR_SORT_DESCENDING);
	$del_time = ($current_time - 5 * 60);
	for($i=0; $i<count($arr_dir)-2; $i++)
	{
		$int_filename = intval(substr($arr_dir[$i], 0, stripos($arr_dir[$i], '.png')));
		if($int_filename < $del_time) unlink('tmp_screenshot/'.$int_filename.'.png');
	}
?>