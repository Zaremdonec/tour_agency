<?php
include('Database.php');

class Excursion
{
	private $db;
	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function printCategory()
	{
		$command = "SELECT `name` FROM `categories`";
		$queryResult = $this->db->query($command);
		while ($row = mysqli_fetch_array($queryResult)) {
			echo "<li><a href='?id=".$row['name']."'>" . $row['name'] . "</a></li>";
		}
	}

	public function getCategory()
		{
		$command = "SELECT * FROM `categories`";
		$queryResult = $this->db->query($command);
		while ($row = mysqli_fetch_array($queryResult)) {
			echo "<option value=".$row['id'].">". $row['name'] ."</option>";
		}
	}


}
