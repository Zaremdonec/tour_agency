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
				<h2>Картинка</h2>
			   		<?php 
			   			$excursion->printEditorForm($_GET['id']);
    					if(isset($_POST['createPost']))
    					$excursion->updateTour($_POST['category'],$_POST['title'],$_POST['editor'],$_POST['dateTour'],$_FILES["fileToUpload"]["name"],$_GET['id']);
    				?>

			</div>
	</div>
</body>
</html>