<?php
require_once("header.php");
?>

<?php
echo '<img src="'.$_SESSION["file_path"].'" style="width:300px;"><br>';
?>

<button onclick="select_argv(this.value)" value="blur">blur</button>
<button onclick="select_argv(this.value)" value="laplacian">laplacian</button>

<div id="argv_control"></div>

<div id="ajax_response"></div>

<?php require_once("js.php");?>



