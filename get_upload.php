<?php
require_once("header.php");
?>

<?php

// echo "<pre>";
// print_r($GLOBALS);
// echo "</pre>";

if (isset($_POST["submit"])){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$extension = end(explode(".", $_FILES["file"]["name"]));

	if (1) {

		if ($_FILES["file"]["error"] > 0) {

			echo "Error: " . $_FILES["file"]["error"] . "<br />";

		}
		else {

			$fname = time().'_'.$_FILES["file"]["name"];
			$store_path= "upload/".$fname;
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $store_path) == true){
				echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				echo "Type: " . $_FILES["file"]["type"] . "<br />";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				echo "Stored in: " . $store_path."<br>";

				$_SESSION["file_path"] = $store_path;

				echo '<img src="'.$_SESSION["file_path"].'" style="width:300px;">';

			}else{
				echo '<h1>move_uploaded_file() failed! Please Check permission of target dir!</h1>';
			}



		}

	}
	else {

		echo "Invalid file type";

	}

}






