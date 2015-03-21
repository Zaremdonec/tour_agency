<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 21.03.15
 * Time: 1:36
 */
require_once 'Database.php';
class Comment {
    private $author;
    private $text;
    private $time;

    public function __construct($author, $text)
    {
        $this->author = $author;
        $this->text = $text;
        $dt = new DateTime();
        $this->time = $dt->format("Y-m-d H:i:s");
    }

    public function attach($tour_id)
    {
        $author = $this->author;
        $text = $this->text;
        $time = $this->time;
        $command = "INSERT INTO comments (author, text, datetime, tour_id)
            VALUES ('$author', '$text', '$time', $tour_id)";
        Database::getInstance()->query($command);
    }
}