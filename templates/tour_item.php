<!DOCTYPE html>
<html>
<head>
	<title>Туристичне агенство "Павлуша"</title>
	<link rel="stylesheet" href="../styles/main-style.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div class="main_wraper">
		<?php 
        include("header.php");
        require("../classes/Excursion.php");
        $tour = new Excursion();
        if(isset($_GET['id'])) {
            $tour = Excursion::getById($_GET['id']);
        }
		?>
        <div class="wrap">
            <div class="tour_item">
                <h1>
                    <?= $tour->getTitle() ?>
                </h1>
                <div class="date">
                    <?= $tour->getDate() ?>
                </div>
                <p>
                    <?= $tour->getDescription() ?>
                </p>
                <img src="<?= $tour->getPicturePath() ?>" width="100%">
            </div>
            <div class="comments">
                <h2>Коментарі</h2>
<!--                Comments goes here-->
                <hr>
                <div class="leave-comment">
                    <form>
                        <label for="input1">Ім'я:</label>
                        <input id='input1' class="input">
                        <label for="text1">Коментар:</label>
                        <textarea id="text1" class="input"></textarea>
                        <input class="btn" type="button" name="post-button" value="Опублікувати">
                    </form>
                </div>
            </div>
        </div>
		<div class="news">
		<h2>Новини</h2>
		<div class="article"></div>
			<h3>Два тури за ціною одного</h3>
			<p>Замовте одну будь-яку екскурсію, та отримайте запрошення на іншу</p>
		</div>
	</div>
</body>
</html>