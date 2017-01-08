<?php
require_once("header.php");
require_once("get_upload.php");
?>

<?php
if (isset($_GET["action"])) {
	if ($_GET["action"] == 'delete') {
		$_SESSION = array();
		session_destroy();
	}else if($_GET["action"] == 'upload_new') {
		echo '
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Upload an image:</h3>
			</div>
			<div class="panel-body">';
				//require("form.php");
				echo_upload_form('empty_session');
				echo '
			</div>
		</div>
		';

		die();

	}
}

if (isset($_SESSION["file_origin_path"])) {

	if ( isset($_SESSION["file_origin_path_2"]) ) {
		echo '<div class="alert alert-success" role="alert">You have uploaded two image:</div>';
		echo '<div class="row">';
		echo '
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">First Image</h3>
				</div>
				<div class="panel-body">
					<img src="'.$_SESSION["file_origin_path"].'" style="max-width:300px;"><br><br>
					<a href="filter.php"><button class="btn btn-default">Click here to process</button></a>
				</div>
			</div>
		</div>
		';

		echo '
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Second Image</h3>
				</div>
				<div class="panel-body">
					<img src="'.$_SESSION["file_origin_path_2"].'" style="max-width:300px;"><br><br>
					<a href="filter.php?image=second"><button class="btn btn-default">Click here to process</button></a>

					<a href="filter.php?action=add_weight"><button class="btn btn-default">Click here to add first and second</button></a>
				</div>
			</div>
		</div>
		';

		echo '</div>'; // row end



		echo '<div class="alert alert-danger" role="alert">If you want to delete them, click <a href="upload.php?action=delete">delete</a></div>';
	}else{

		echo '<div class="alert alert-success" role="alert">You have uploaded one image:</div>';

		echo '<div class="row">';
		echo '
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">First Image</h3>
				</div>
				<div class="panel-body">
					<img src="'.$_SESSION["file_origin_path"].'" style="max-width:300px;"><br><br>
					<a href="filter.php"><button class="btn btn-default">Click here to process</button></a>
				</div>
			</div>
		</div>
		';

		echo '
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Upload another image here:</h3>
				</div>
				<div class="panel-body">';
					echo_upload_form();	
					echo '
				</div>
			</div>
		</div>
		';

		echo '</div>'; // row end


		echo '<div class="alert alert-danger" role="alert">If you want to delete the first image, click <a href="upload.php?action=delete">delete</a></div>';
	}
}




if (!isset($_SESSION["file_origin_path"]) && !isset($_SESSION["file_origin_path_2"])) {
	echo '
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Upload an image:</h3>
		</div>
		<div class="panel-body">';
			echo_upload_form();
			echo '
		</div>
	</div>
	';
}



?>

<script type="text/javascript">

	window.onload = function(){

    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
    	var filesInput = document.getElementById("file");


    	filesInput.addEventListener("change", function(event){

            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
            	var file = files[i];

                //Only pics
                if(!file.type.match('image'))
                	continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){

                	var picFile = event.target;

                	var div = document.createElement("div");

                	div.innerHTML = '<img class="image_preview" src="' + picFile.result + '" ' +
                	'title="' + picFile.name + '"/>';

                	output.insertBefore(div,null);            

                });
                
                 //Read the image
                 picReader.readAsDataURL(file);
             }                               

         });
    }
    else
    {
    	console.log("Your browser does not support File API");
    }
}

</script>







