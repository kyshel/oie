<?php

function getArrayFromJsonFile($json_file){
	$json_str=file_get_contents($json_file);
	$array_json=json_decode($json_str,1);

	return $array_json;
}

function get_shell_output($command){
	$command_escaped = escapeshellcmd($command);
	//$command = escapeshellcmd('whoami');
	//echo '<pre>'.$command.'</pre>';

	$output = shell_exec($command_escaped);
	if ( $output == NULL) {
		echo '
		<pre>shell_exec() in get_shell_output() returns NULL, ensure: 
			1.apache has x permission to execute script file
			2.script file has no error, see error_log for details 
			3.script file has output
			4.script file exists
		</pre>
		';
		return 'get shape error!';
	}else{
		return $output;
	}
}

function echo_upload_form($action = ''){
	$query_string = '';
	if (!empty($action)) {
		$query_string = '?action='.$action;
	}
	echo '
	<form action="upload.php'.$query_string.'" id="foo" method="post" enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file" class="btn btn-default" /> 
		<output id="result"></output>
		<br />
		<input type="submit" name="submit" value="Submit" class="btn btn-default" />
	</form>
	';
	echo '<script type="text/javascript">';
	require_once('dist/js/drop_preview.js');
	echo '</script>';
}

function echo_download_link($append =''){
	echo '<a href="'.$_SESSION["file_dst_path"].'" download="'.$_SESSION["file_origin_name_a"].$append.'.'.$_SESSION["file_origin_name_b"].'"><button class="btn btn-default ">Download</button></a>';
}

?>