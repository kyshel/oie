<?php
require_once("header.php");
?>

<?php
if (isset($_GET["action"])) {
	if ($_GET["action"] == 'delete') {
		$_SESSION = array();
		session_destroy();
	}
}
if (isset($_SESSION["file_path"])) {
	echo '<p>You have uploaded one image:</p>';
	echo '<img src="'.$_SESSION["file_path"].'" style="width:300px;">';
	echo '<p>If you want to delete this one, click <a href="upload.php?action=delete">delete</a></p>';
	echo '<p>If you want to upload new one, click below:</p>';
}
?>


<form action="get_upload.php" id="foo" method="post" enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file" /> 
	<br />
	<input type="submit" name="submit" value="Submit" class="btn" />
</form>