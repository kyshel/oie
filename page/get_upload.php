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
	setcookie('test_file_type', $_FILES["file"]["type"], time() + (86400 * 30), "/");


	//if ($_FILES["file"]["type"] == "image/bmp" || $_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/jpg" || $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png" && $_FILES["file"]["size"] < 10000000 && in_array($extension, $allowedExts)) 
	if (1) 
	{

		if ($_FILES["file"]["error"] > 0) {

			echo "Error: " . $_FILES["file"]["error"] . "<br />";

		}
		else {

			$file_uid_name = uniqid().'.'.$extension;
			// !check unique here , fix_unique()
			$file_origin_path= "../upload/".$file_uid_name;

			if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_origin_path) == true){
				// echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				// echo "Type: " . $_FILES["file"]["type"] . "<br />";
				// echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				// echo "Stored in: " . $file_origin_path."<br>";

				// !Clear all session
				if (isset($_GET["action"])) {
					if ($_GET["action"] == 'empty_session') {
						$_SESSION = array();
						//session_destroy(); //! destroy very force, all page time!
					}
				}

				
				if (isset($_SESSION["file_origin_path"]) && !isset($_SESSION["file_origin_path_2"])) {
					$_SESSION["file_origin_path_2"] = $file_origin_path;
				}else if(!isset($_SESSION["file_origin_path"]) && !isset($_SESSION["file_origin_path_2"]) ){

					$path_parts = pathinfo($_FILES["file"]["name"]);
					$_SESSION["file_origin_path"] = $file_origin_path;
					$_SESSION["file_origin_name_a"] = $path_parts['filename'];
					$_SESSION["file_origin_name_b"] = $path_parts['extension'];
					$_SESSION["file_origin_size"] = $_FILES["file"]["size"]; // b
					$_SESSION["file_origin_type"] = $_FILES["file"]["type"];

					$_SESSION["file_origin_width"] = get_shell_output('python ../python/get_shape.py '.$file_origin_path.' 1');
					$_SESSION["file_origin_height"] = get_shell_output('python ../python/get_shape.py '.$file_origin_path.' 0');
					$file_origin_width=preg_replace( "/\r|\n/", "", $_SESSION["file_origin_width"] );
					$file_origin_height=preg_replace( "/\r|\n/", "", $_SESSION["file_origin_height"] );
					setcookie('file_origin_width', $file_origin_width, time() + (86400 * 30), "/");
					setcookie('file_origin_height', $file_origin_height, time() + (86400 * 30), "/");
				}
				// $_SESSION["file_processing_path"] = $file_origin_path;


				//echo '<img src="'.$_SESSION["file_origin_path"].'" style="width:300px;">';

			}else{
				echo '<div class="alert alert-danger" role="alert">move_uploaded_file() failed! Please Check permission of target dir!</div>';
			}



		}

	}
	else {

		echo '<div class="alert alert-danger" role="alert">Invalid file type, please try to upload again!</div>';

	}

}






