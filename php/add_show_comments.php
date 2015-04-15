<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 16.04.15
 * Time: 0:39
 */
require_once "../classes/Comment.php";
$id = $_GET["id"];
$name = $_GET["name"];
$text = $_GET['text'];
if (isset($id) && isset($name) && isset($text)) {
    $comment = new Comment($name, $text);
    $comment->attach($id);
    $comment->printAllComments($id);
}
