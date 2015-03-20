<?php
	include("../classes/Excursion.php");
	$excursion = new Excursion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Туристичне агенство "Павлуша"</title>
	<link rel="stylesheet" href="../styles/admin-style.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="main_wraper">
		<div class="content">
				<h1 >Видалення статі</h1>
				<?php 
				$excursion->printToursForEdit();
				?>
					<!--<div class="edit">
	        		<span>Заголовок</span>
	        		<a href="editor.php">Редагувати</a>
	        		<a href="">Видалити</a> 
	        		</div>
	        		<div class="edit">
	        		<span>Заголовок</span>
	        		<a href="editor.php">Редагувати</a>
	        		<a href="">Видалити</a> 
	        		</div>
	        		<div class="edit">
	        		<span>Заголовок</span>
	        		<a href="editor.php">Редагувати</a>
	        		<a href="">Видалити</a> 
	        		</div>
	        		<div class="edit">
	        		<span>Заголовок</span>
	        		<a href="editor.php">Редагувати</a>
	        		<a href="">Видалити</a> 
	        		</div> -->

					<a href = "control_panel.php">Назад</a>
			</div>
	</div>
</body>
</html>