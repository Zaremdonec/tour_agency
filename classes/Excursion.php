<?php
include('Database.php');

class Excursion
{
	private $db;
	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function createCategory($name)
    {
		$command = "INSERT INTO `categories`(name) VALUES ('$name')";
		$this->db->query($command);
	}

	public function printCategory()
	{
		$command = "SELECT `name` FROM `categories`";
		$queryResult = $this->db->query($command);
		while ($row = mysqli_fetch_array($queryResult)) {
            $name = $row['name'];
			echo "<li><a href='?id=$name'>$name</a></li>";
		}
	}

	public function printCategoryAsOptions()
    {
		$command = "SELECT * FROM `categories`";
		$queryResult = $this->db->query($command);
		while ($row = mysqli_fetch_array($queryResult)) {
            $id = $row['id'];
            $name = $row['name'];
			echo "<option value=$id>$name</option>";
		}
	}

	public function addTour($image, $title, $category, $desc, $date)
    {

	}

	public function print_all_excursion()
	{
        $points = "...";
		$command = "SELECT * FROM `tours`";
		$queryResult = $this->db->query($command);
		while ($item = mysqli_fetch_array($queryResult)) {
			$print_title = "";
			$print_dect = "";
			$title_string = $item['title'];
			$desc_string = $item['descr'];
			$count_title = strlen($title_string);
			$count_desc = strlen($desc_string);
			echo "<div class='tour'>";
			echo "<div class='image'>";
			echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'><img src='".$item['picture_path']."'></a>";
			echo "</div>";
			echo "<div class='title'>";
			if ($count_title <= 8)  echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'><h2>".$item['title']."</h2></a>";
				 else
				 {
				 	for($i=0; $i<7;$i++)
				 		$print_title =  $print_title.$title_string{$i};
				 	$print_title = $print_title.$points;
				 	echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'><h2>".$print_title."</h2></a>";
				 };
				echo "</div>";
				echo "<div class='text'>";
					 if ($count_desc <= 220) echo "<p>".$item['descr']."</p>"; 
					 else
					 {
					 	for($i=0; $i<217;$i++)
				 		$print_dect =  $print_dect.$desc_string{$i};
				 		$print_dect = $print_dect.$points;
				 		 echo "<p>".$print_dect."</p>";
					 }
				echo "</div>";
				 echo "<div class='information'>";
					echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'>Детальніше</a>";
				 echo "</div>";
			 echo "</div>";
			}
		}


}
