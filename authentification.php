<?php
	setcookie('user', '1', time()-3600);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Авторизация</title>
</head>

<body>
<script>
	function authen(){
		login_val = $('input[name="login"]').val();
		password_val = $('input[name="password"]').val();
		$.ajax({
			url: 'autoriz.php',
			method: 'POST',
			cache: false,
			scriptCharset: 'utf-8',
			data: ({login: login_val, password: password_val}),
			dataType: 'html',
			success: function(data){
				if(data === '1') {
					document.location.href='http://_:81/teplo/index.php?select=diagnostik.php'
				}
				else {
					alert('Логин или пароль не верный!!!');
					document.location.href='http://_:81/teplo/index.php?select=authentification.php'
				}
			},
			error: function(){
				console.log('Ошибка JQuery или Ajax!');
			}
		});
	}
</script>
	<br>
	<form onsubmit="authen()">
		<p><strong>Логин:</strong> 
			<input maxlength="25" size="40" name="login"></p>
		<br>
		<p><strong>Пароль:</strong> 
			<input type="password" maxlength="25" size="40" name="password"></p>
		<br>
		<p><input type="submit" value=" Авторизация " onclick="authen()">
	</form>
</body>

</html>