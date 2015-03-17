<?php
include('Database.php');
/**
* 
*/
class Excursion
{
	private $db;
	public function __construct()
	{
		$this->db = new Database();
	}

	public function printExcursion()
	{
		$queryResult = $this->db->query("SELECT `name` FROM `categories`");

		while ($row = mysqli_fetch_array($queryResult)) {
			echo "<li><a href='#'>" . $row['name'] . "</a></li>";
		}
	}



}
