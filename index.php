<?php
	include("classes/Excursion.php");
	$excursion = new Excursion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Туристичне агенство "Павлуша"</title>
	<link rel="stylesheet" href="styles/main-style.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div class="main_wraper">
		<?php include("templates/header.php"); ?>
		<div class="sity_filter">
		Екскурсії
		<ul>
			<?php
				$excursion->printCategory();
			?>
		</ul>
	</div>
		<div class="content">
		<?php
			if(empty($_GET['city']))
				$_GET['city'] = null;
			$excursion->print_all_excursion($_GET['city']);
		?>
		</div>
	</div>
</body>
</html>