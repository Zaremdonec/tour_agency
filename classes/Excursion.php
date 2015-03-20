<?php
include('Database.php');

class Excursion
{
	private $db;
    private $_title;
    private $_description;
    private $_picturePath;
    private $_city;
    private $_date;

	public function __construct()
	{
		$this->db = Database::getInstance();
	}

    static public function getById($id)
    {
        $instance = new self();
        $result = Database::getInstance()->query("SELECT * FROM `categories` WHERE id=$id");
        $row = mysqli_fetch_row($result);
        $instance->_title = $row['title'];
        $instance->_date = $row['date'];
        $instance->_description = $row['descr'];
        $instance->_picturePath = $row['picture_path'];
        $instance->_city = $row['category'];
        return $instance;
    }

    public function printTitle()
    {
        echo $this->_title;
    }

    public function printDate()
    {
        echo $this->_date;
    }

    public function printDescription()
    {
        echo $this->_description;
    }

    public function printPicture()
    {
        $picturePath = $this->_picturePath;
        echo "<img src='$picturePath'>";
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
		while ($item = mysqli_fetch_array($queryResult)) 
		{
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
					 if ($count_desc <= 180) echo "<p>".$item['descr']."</p>"; 
					 else
					 {
					 	for($i=0; $i<177;$i++)
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

		public function printToursForEdit()
		{
			$command = "SELECT * FROM `tours`";
			$queryResult = $this->db->query($command);
			while ($item = mysqli_fetch_array($queryResult)) {
				echo "<div class='edit'>";
	        	echo "<span>".$item['title']."</span>";
	        	echo "<a href='editor.php?id=".$item['id']."'>Редагувати </a>";
	        	echo "<a href='delete.php?id=".$item['id']."'> Видалити</a>";
	        	echo "</div>";
			}
		}

		public function updateTour($category_id, $title, $descr, $date, $image_path,$id_tour)
		{
			if(empty($image_path))
			{
				$command = "SELECT * FROM `tours` WHERE `id` = '$id_tour'";
				$queryResult = $this->db->query($command);
				while ($item = mysqli_fetch_array($queryResult))
				{
					$target_file = $item['picture_path'];
				}
			}
			else
			{
				$target_dir = "../images/";
	        	$target_file = $target_dir . $image_path;
	        	copy($_FILES["fileToUpload"]["tmp_name"], $target_file);
			}
			
			$command = "UPDATE `tours` SET `category_id` = '$category_id', `title` = '$title', `descr`= '$descr', `date` = '$date', `picture_path` = '$target_file' WHERE `id` = '$id_tour'";
			$queryResult = $this->db->query($command);
		}


		public function printEditorForm($id_tour) 
		{
			$command = "SELECT * FROM `tours` WHERE `id` = '$id_tour'";
			$queryResult = $this->db->query($command);
			while ($item = mysqli_fetch_array($queryResult)) 
			{
				echo "<img src='".$item['picture_path']."' width='300' height='300'>";
				echo "<form method='post' enctype='multipart/form-data'>";
		        echo "<input type='file' name='fileToUpload' id='fileToUpload'/>";
		        echo "<br><br>";
				echo "<input type='text' name='title' value='".$item['title']."'>";
				echo "<br><br>";
				echo "<select name='category' value='".$item['category_id']."'>";
				$this->printCategoryAsOptions();
				echo "</select>";
				echo "<br><br>";
				echo "<input type='date' name='dateTour' value = '".$item['date']."'/>";
				echo "<br><br>";
		        echo "<textarea name='editor' id='editor1'>".$item['descr']."</textarea>";
		        echo "<script type='text/javascript'>";
				echo "CKEDITOR.replace( 'editor1');";
				echo "</script>";
				echo "<br><br>";
				echo "<input type='submit' name='createPost' value='Оновити статю'/><br>";
				echo "<a href = 'edit.php'>Назад</a>";
	    		echo "</form>";
    		}
		}

		public function deleteTour($id_tour)
		{
			$command = "DELETE  FROM `tours` WHERE `id` = '$id_tour'";
			$queryResult = $this->db->query($command);
		}

}
