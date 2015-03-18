<?php
include('Database.php');

class Excursion
{
	private $db;
	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function createCategory($name){
		$command = "INSERT INTO `categories`(name) VALUES ('".$name."')";
		$this->db->query($command);
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

	public function addTour($category_id,$title,$descr,$date,$image_path){
		$target_dir = "../images/";
        $target_file = $target_dir . $image_path;
        copy($_FILES["fileToUpload"]["tmp_name"], $target_file);
		$command = "INSERT INTO tours(category_id, title, descr, `date`, picture_path) VALUES ('".$category_id."','".$title."','".$descr."','".$date."','".'../images/'.$image_path."')";
		$queryResult = $this->db->query($command);
	}

	public function print_all_excursion()
	{	
		$command = "SELECT * FROM `tours`";
		$queryResult = $this->db->query($command);
		while ($item = mysqli_fetch_array($queryResult)) {
			 echo "<div class='tour'>";
			 echo "<div class='image'>";
			 echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'><img src='".$item['picture_path']."'></a>";
				echo "</div>";
				echo "<div class='title'>";
				echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'><h2>".$item['title']."</h2></a>";
				echo "</div>";
				echo "<div class='text'>";
					echo "<p>".$item['descr']."</p>";
				echo "</div>";
				 echo "<div class='information'>";
					echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'>Детальніше</a>";
				 echo "</div>";
			 echo "</div>";
			}
		}


}
