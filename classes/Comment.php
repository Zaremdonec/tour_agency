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

    public function __construct($author, $text, $time = null)
    {
        $this->author = $author;
        $this->text = $text;
        $this->time = ($time === null) ? time() : $time;
    }

    public function attach($tour_id)
    {
        $command = "INSERT INTO comments (author, text, datetime, tour_id)
            VALUES ({$this->author}, {$this->text}, {$this->time}, $$tour_id)";
        Database::getInstance()->query($command);
    }
}