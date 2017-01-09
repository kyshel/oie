<?php
require_once("header.php");
?>

<?php
if (isset($_GET["image"])) {
	if ($_GET["image"] == 'second') {
		$tmp=$_SESSION["file_origin_path"];
		$_SESSION["file_origin_path"]=$_SESSION["file_origin_path_2"];
		$_SESSION["file_origin_path_2"]=$tmp;
	}
}


echo '<div class="row">';
echo '
<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">First Image</h3>
		</div>
		<div class="panel-body">
			<br>
			<img src="'.$_SESSION["file_origin_path"].'" style="max-width:300px;"><br>
		</div>
	</div>
</div>
';

echo '<div class="col-md-2">';
$array=getArrayFromJsonFile('data.json');
//echo "<pre>";var_dump($array);echo "</pre>";
foreach ($array['filter'] as $item => $item_content) {	
	echo '<button id="'.$item.'" onclick="select_argv(this.value)" value="'.$item.'" class="btn btn-default process_button">'.ucwords($item).'</button> ';
}
echo '</div>'; // row middle



echo '
<div class="col-md-5">
	<div class="panel panel-default" id="processed_panel">
		<div class="panel-heading">
			<h3 class="panel-title">After Process</h3>
		</div>
		<div class="panel-body">
			<div id="argv_control"></div>
			<div id="ajax_response">Please select process!</div>
		</div>
	</div>
</div>
';


echo '</div>'; // row end 
?>

<?php require_once("js.php");?>

<?php
if (isset($_GET["action"])) {
	if ($_GET["action"] == 'add_weight') {
		echo '
		<script type="text/javascript">
			$("#add_weight").click();
		</script>
		';
	}
}
?>



