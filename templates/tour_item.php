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
        require_once("../classes/Excursion.php");
        require_once("../classes/Comment.php");
        $tour = new Excursion();
        if(isset($_GET['id'])) {
            $tour_id = $_GET['id'];
            $tour = Excursion::getById($tour_id);
            if(isset($_POST['post-btn'])) {
                $comment = new Comment($_POST['author'], $_POST['text']);
                $comment->attach($tour_id);
            }
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
                <?php for($i=0; $i<5; $i++) { ?>
                    <div class="comment">
                        <strong>Автор</strong>
                        <span>2015-05-20</span>
                        <div style="clear: both"></div>
                        <p>f fsldjg sdlfkjv s;ldfkrusldfkj  fsj;ldfkj fasld;fkj asdfljpaosiefuj afsldjf asdfkljasodifu a;sldfka dk ;a sdlfjas;dofuas;ldfj as;ldfa;dslfuads fs dfkjads; fliauwe;fja s;dlkjasd fu;a sdflj gsl;dkfj </p>
                    </div>
                <?php } ?>
                <hr>
                <div class="leave-comment">
                    <form method="post" action="<?php if(isset($_GET['id'])) echo $_SERVER['PHP_SELF']."?id={$_GET['id']}"?>">
                        <label for="input1">Ім'я:</label>
                        <input id='input1' name="author" class="input">
                        <label for="text1">Коментар:</label>
                        <textarea id="text1" name="text" class="input"></textarea>
                        <input class="btn" type="submit" name="post-btn" value="Опублікувати">
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