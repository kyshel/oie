<?php
require_once("header.php");
?>

<?php
echo '<img src="'.$_SESSION["file_path"].'" style="width:300px;"><br>';

$array=getArrayFromJsonFile('data.json');
//echo "<pre>";var_dump($array);echo "</pre>";
foreach ($array[filter] as $item => $item_content) {
	echo '<button onclick="select_argv(this.value)" value="'.$item.'">'.$item.'</button> ';
}
?>


<div id="argv_control"></div>

<div id="ajax_response"></div>

<?php require_once("js.php");?>



