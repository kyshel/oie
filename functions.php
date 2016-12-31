<?php

function getArrayFromJsonFile($json_file){
	$json_str=file_get_contents($json_file);
	$array_json=json_decode($json_str,1);

	return $array_json;
}

?>