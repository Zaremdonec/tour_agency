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
				<h1>Редагування статі</h1>
				<p>Картинка</p>
				<!--<img src="../images/backdround.jpg" width="300" height="300">
				<form method="post" enctype="multipart/form-data">
	        		<input type="file" name="fileToUpload" id="fileToUpload"/>
	        		<br><br>
					<input type="text" name="title" placeholder="Заголовок статї">
					<br><br>
					<select name="category" plaseholder="Місто">
					<?php
						$excursion->printCategoryAsOptions();
					?>
					  </select>
					  <br><br>
					 <input type="date" name="dateTour"/> 
					 <br><br>
	        		<textarea name="editor" id="editor1"></textarea>
	        		<script type="text/javascript">
					CKEDITOR.replace( 'editor1');
					</script>
					<br><br>
					<input type="submit" name="createPost" value="Оновити статю"/><br>
					<a href = "edit.php">Назад</a>
    			</form>-->

			   		<?php 
			   			$excursion->printEditorForm($_GET['id']);
    					if(isset($_POST['createPost']))
    					$excursion->updateTour($_POST['category'],$_POST['title'],$_POST['editor'],$_POST['dateTour'],$_FILES["fileToUpload"]["name"],$_GET['id']);
    				?>

			</div>
	</div>
</body>
</html>