<?php
	require('../connection.php');
	$target_dir = "/image/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(isset($_POST["id"])) {
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["image"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "webp" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			$id = $_POST['id'];
			$name = $_FILES["image"]["name"];
			$query = "UPDATE product SET image = '$name' WHERE productId = '$id'";

			$result = mysqli_query($conn, $query);
			if($result){
				echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			}

		} else {
			echo "123";
		}
	}

?>