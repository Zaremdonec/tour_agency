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

    static public function printAllComments($tour_id)
    {
        $command = "SELECT * FROM comments WHERE tour_id=$tour_id;";
        $result = Database::getInstance()->query($command);
        while($row = mysqli_fetch_array($result)) {
            $author = $row['author'];
            $text = $row['text'];
            $time = $row['datetime'];
            echo "<div class='comment'><strong>$author</strong><span>$time</span>
            <div style='clear: both'></div><p>$text</p></div>";
        }
    }

    static public function getAllComments($tour_id)
    {
        $command = "SELECT * FROM comments WHERE tour_id=$tour_id;";
        return Database::getInstance()->query($command);
    }
}