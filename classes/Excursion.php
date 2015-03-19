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
	    $categories = $this->selectCategories();
		while ($row = mysqli_fetch_array($categories)) {
            $id = $row['id'];
            $name = $row['name'];
			echo "<li><a href='?city=$id'>$name</a></li>";
		}
	}

	public function printCategoryAsOptions()
    {
		$categories = $this->selectCategories();
		while ($row = mysqli_fetch_array($categories)) {
            $id = $row['id'];
            $name = $row['name'];
			echo "<option value=$id>$name</option>";
		}
	}


	public function addTour($category_id, $title, $descr, $date, $image_path){
		$target_dir = "../images/";
        $target_file = $target_dir . $image_path;
        copy($_FILES["fileToUpload"]["tmp_name"], $target_file);
		$command = "INSERT INTO tours(category_id, title, descr, `date`, picture_path) VALUES ('".$category_id."','".$title."','".$descr."','".$date."','".'../images/'.$image_path."')";
		$queryResult = $this->db->query($command);
	}
	
    private function selectCategories()
    {
        $command = "SELECT * FROM `categories`";
        return $this->db->query($command);
    }

	public function print_all_excursion($city)
	{
        $points = "...";
		if(empty($city))
			$command = "SELECT * FROM `tours`";
		else
			$command = "SELECT * FROM `tours` WHERE category_id = '".$city."'";
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
			$category_name = mysqli_fetch_array($this->db->query("SELECT name FROM `categories` WHERE id = '".$item['category_id']."'"));
			 echo "<p>".$category_name['name']."</p>";
			echo "</div>";
			echo "<div class='title'>";
			if ($count_title <= 39)  echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'><h2>".$item['title']."</h2></a>";
				 else
				 {
				 	for($i=0; $i<39;$i++)
				 		$print_title =  $print_title.$title_string{$i};
				 	$print_title = $print_title.$points;
				 	echo "<a href='templates/tour_item.php?id=".$item['id']."&title=".$item['title']."'><h2>".$print_title."</h2></a>";
				 };
				echo "</div>";
				echo "<div class='text'>";
					 if ($count_desc <= 290) echo "<p>".$item['descr']."</p>"; 
					 else
					 {
					 	for($i=0; $i<290;$i++)
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
