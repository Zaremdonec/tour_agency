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
				<h1 >Створення статі</h1>
				<p>Завантаження картинки</p>
				<form method="post" enctype="multipart/form-data">
	        		<input type="file" name="fileToUpload" id="fileToUpload"/>
	        		<br><br>
					<input type="text" name="title" placeholder="Заголовок статі">
					<select name="category" plaseholder="Місто">
					<?php
						$excursion->getCategory();
					?>
					  </select>
					<p>Опис статі</p>
	        		<textarea name="editor" id="editor1"></textarea>
	        		<script type="text/javascript">
					CKEDITOR.replace('editor1');
					</script>
					<p>Дата екскурсії</p>
					<input name="date" placeholder="Дата екскурсії" />
					<br><br>
					<input type="submit" name="createPost" value="Опублікувати статю"/><br>
					<a href = "control_panel.php">Назад</a>
					
    			</form>
    			<?php 

    			?>
			    
			</div>
	</div>
</body>
</html>