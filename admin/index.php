<?php
	include("../classes/AdminLogin.php");
	$adminData = new AdminLogin();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="../styles/admin-style.css" type="text/css">
		<meta charset="utf-8">
		<title>Admin</title>
	</head>		
	<body>
		<div class="main_wraper">
			<div class="enter">
				<p><b>Вхід для адміна</b></p>
				<form  method = "POST" >
					<input type = "text" placeholder="Логін" name ="login">
					<input type = "password" placeholder="Пароль" name ="password">
					<input class="button" type = "submit" name ="entr" value = "Війти">
				</form>
				<?php
					
					if(isset($_POST['entr']))
						if(!empty($_POST['login']) && !empty($_POST['password']))
						{
							$adminData->adminLogin($_POST['login'],$_POST['password']);
						}
						else
							echo "Не усі поля заповнені<br>";
				?>
				<a href = "../index.php">Вихід</a><br>
			</div>
		</div>
	</body>
</html>