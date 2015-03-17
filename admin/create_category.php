<!DOCTYPE html>
<html>
<head>
	<title>Туристичне агенство "Павлуша"</title>
	<link rel="stylesheet" href="../styles/admin-style.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div class="main_wraper">
		<div class="content">	
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="name_category" placeholder="Місто">
	        		<input type="submit" name="create_category" value="Create category"/>
	        	</form>
	        	<?php
	        	include("../classes/Excursion.php");
	        	$excursion = new Excursion();
			    	if(isset($_POST['create_category'])){
			    		$excursion->createCategory($_POST['name_category']);
			    	}
			    ?>
			    <a href = "control_panel.php">Назад</a>
		</div>
	</div>
</body>
</html>