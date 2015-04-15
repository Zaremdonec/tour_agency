<!DOCTYPE html>
<html>
<head>
	<title>Туристичне агенство "Павлуша"</title>
	<link rel="stylesheet" href="../styles/main-style.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../js/jquery-2.1.3.min.js"></script>
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
            //    $comment = new Comment($_POST['author'], $_POST['text']);
            //   $comment->attach($tour_id);
            }
        }
        ?>
        <div class="wrap">
            <div class="tour_item" id="tour-item" data-id="<?= $_GET['id'] ?>">
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
                <div id="comments-list">
                    <?php
                    if(isset($_GET['id'])) {
                        Comment::printAllComments($_GET['id']);
                    }
                    ?>
                </div>
                <hr>
                <div class="leave-comment">
                    <form method="post" action="<?php if(isset($_GET['id'])) echo $_SERVER['PHP_SELF']."?id={$_GET['id']}"?>">
                        <label for="input1">Ім'я:</label>
                        <input id='input1' name="author" class="input">
                        <label for="text1">Коментар:</label>
                        <textarea id="text1" name="text" class="input"></textarea>
                    </form>
                    <input id="send-comment" class="btn" type="submit" name="post-btn" value="Опублікувати">

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
    <script>
        $(function() {
            $("#send-comment").on("click", function() {
                var id = $("#tour-item").data("id"),
                    author = $("#input1").val(),
                    text = $("#text1").val();
                if(author != "" && text != "") {
                    console.log("2");
                    $.ajax({
                        url: "../php/add_show_comments.php?id=" + id + "&name="+author+"&text="+text,
                        success: function(result) {
                            $("#comments-list").html(result);
                            $("#input1").val("");
                            $("#text1").val("");
                        }
                    })
                } else {
                    window.alert("Шось ти не дописав!")
                }
            });
        });
    </script>
</body>
</html>