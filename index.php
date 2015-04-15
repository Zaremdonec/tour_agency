<?php
include("classes/Excursion.php");
$excursion = new Excursion();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <title>Туристичне агенство "Павлуша"</title>
    <link rel="stylesheet" href="styles/main-style.css" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="js/jquery-2.1.3.min.js"></script>
</head>
<body>
<div class="main_wraper">
    <?php include("templates/header.php"); ?>
    <div class="sity_filter">
        Екскурсії
        <ul id="cities">
            <?php
            $excursion->printAllCategories();
            ?>
        </ul>
    </div>
    <div class="content" id="excursions">
        <?php
        if (empty($_GET['city']))
            $_GET['city'] = null;
        $excursion->print_all_excursion($_GET['city']);
        ?>
    </div>
</div>

<script>
    $(function () {
        $("#cities li a").on('click', function() {
            console.log($(this).data("id"));
            var id = $(this).data("id");
            $.ajax({
                url: "php/tour_list.php?city=" + id,
                success: function (result) {
                    $("#excursions").html(result);
                    console.log(result);
                }
            });
        });
    });
</script>
</body>
</html>