<?php
require_once("header.php");
?>



<form action="get_upload.php" id="foo" method="post" enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file" /> 
	<br />
	<input type="submit" name="submit" value="Submit" class="btn" />
</form>