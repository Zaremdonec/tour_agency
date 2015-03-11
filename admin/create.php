<!DOCTYPE html>
<html>
<head>
	<title>Туристичне агенство "Павлуша"</title>
	<link rel="stylesheet" href="../styles/admin-style.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="main_wraper">
		<div class="content">
				<h1 >Створення статьї</h1>
				<p>Завантаження картинки</p><br>
				<form method="post" enctype="multipart/form-data">
				
	        		<input type="file" name="fileToUpload" id="fileToUpload"/>
	        		<input type="submit" name="loadImage" value="Upload Image"/>
	        		<br><br>
					<input type="text" name="title" placeholder="Заголовок статьї">
					<br><br>
	        		<textarea name="editor" id="editor1"></textarea>
	        		<script type="text/javascript">
					CKEDITOR.replace( 'editor1');
					</script>
					<br><br>
					<input type="submit" name="createPost" value="Опублікувати статью"/><br>
					<a href = "admin.php">Назад</a>
    			</form>
			    <?php
			    	if(isset($_POST['loadImage'])){
			    	echo $db->showImage($_FILES["fileToUpload"]["name"]);
			    	$_SESSION['image'] = $_FILES["fileToUpload"]["name"];
			    	} 
			    	if(isset($_POST['createPost'])){
			    		if(!empty($_POST['title']) && !empty($_POST['editor']) && !empty($_SESSION['image']))
			    			$db->addPost($_POST['title'],$_POST['editor'],$_SESSION['image']);
			    		else echo "Заповніть всі поля";
			    		}
			    	 
			    ?>
			</div>
	</div>
</body>
</html>