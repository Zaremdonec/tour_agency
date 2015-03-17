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
			<div class="tour">
				<div class="image">
					<a href="templates/tour_item.php"><img src="../images/backdround.jpg"></a>
				</div>
				<div class="title">
					<a href="templates/tour_item.php"><h2>Заголовок</h2></a>
				</div>
				<div class="text">
					<p>Опис туру ,asjfbmabsjdhbasdf ksfdkj asdf sakdjfg sadfasdf ghasdfas kdfasdfsadf h alskdf</p>
				</div>
				<div class="information">
					<a href="templates/tour_item.php">Детальніше</a>
				</div>
			</div>
			<div class="tour">
				<div class="image">
					<a href="templates/tour_item.php"><img src="../images/backdround.jpg"></a>
				</div>
				<div class="title">
					<a href="templates/tour_item.php"><h2>Заголовок</h2></a>
				</div>
				<div class="text">
					<p>Опис туру</p>
				</div>
				<div class="information">
					<a href="templates/tour_item.php">Детальніше</a>
				</div>
			</div>
			<div class="tour">
				<div class="image">
					<a href="templates/tour_item.php"><img src="../images/backdround.jpg"></a>
				</div>
				<div class="title">
					<a href="templates/tour_item.php"><h2>Заголовок</h2></a>
				</div>
				<div class="text">
					<p>Опис туру</p>
				</div>
				<div class="information">
					<a href="templates/tour_item.php">Детальніше</a>
				</div>
			</div>
			<div class="tour">
				<div class="image">
					<a href="templates/tour_item.php"><img src="../images/backdround.jpg"></a>
				</div>
				<div class="title">
					<a href="templates/tour_item.php"><h2>Заголовок</h2></a>
				</div>
				<div class="text">
					<p>Опис туру</p>
				</div>
				<div class="information">
					<a href="templates/tour_item.php">Детальніше</a>
				</div>
			</div>
			<div class="tour">
				<div class="image">
					<a href="templates/tour_item.php"><img src="../images/backdround.jpg"></a>
				</div>
				<div class="title">
					<a href="templates/tour_item.php"><h2>Заголовок</h2></a>
				</div>
				<div class="text">
					<p>Опис туру</p>
				</div>
				<div class="information">
					<a href="templates/tour_item.php">Детальніше</a>
				</div>
			</div>
			<div class="tour">
				<div class="image">
					<a href="templates/tour_item.php"><img src="../images/backdround.jpg"></a>
				</div>
				<div class="title">
					<a href="templates/tour_item.php"><h2>Заголовок</h2></a>
				</div>
				<div class="text">
					<p>Опис туру</p>
				</div>
				<div class="information">
					<a href="templates/tour_item.php">Детальніше</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>