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
				<form action="control_panel.php" method = "POST" >
					<input type = "text" placeholder="Логін" name ="login">
					<input type = "password" placeholder="Пароль" name ="password">
					<input class="button" type = "submit" name ="entr" value = "Війти">
				</form>
				<?php
					/*//include ('/php/config.php');
					include ('db.php');
					include ('blog.php');
					$db = new DataBase();
					$bg = new Blog();
					if(isset($_POST['entr']))
						if(!empty($_POST['login']) && !empty($_POST['password']))
						{
							$result = $db->enterAdm($_POST['login'],$_POST['password']);
							if(!$result)
								echo "<p style='color:red'>Невірний логін чи пароль<p>";
							else 
							{
								$_SESSION['login'] = $_POST['login'];
								$bg->htmlRedirect($result);
							}
						}
						else
							echo "Не усі поля заповнені<br>";*/
				?>
				<a href = "../index.php">Вихід</a><br>
			</div>
		</div>
	</body>
</html>