<?php
require_once("header.php");
?>

<?php


echo '<br>request:';
var_dump($_REQUEST);

echo '<br>POST:';
var_dump($_POST);

echo '<br>GET:';
var_dump($_GET);

echo '<br>FILES:';
var_dump($_FILES);

// echo "<pre>";
// print_r($GLOBALS);
// echo "</pre>";

if (isset($_POST["submit"])){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$extension = end(explode(".", $_FILES["file"]["name"]));

	if ($_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/jpg" || $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png" && $_FILES["file"]["size"] < 2500000 && in_array($extension, $allowedExts)) {

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
				echo "Stored in: " . $store_path;

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






