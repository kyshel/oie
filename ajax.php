<?php
// load session
require_once("load.php");
?>


<?php
//var_dump($_GET);

$operate=$_GET["op"];
$argv3=$_GET["v3"];
$argv4=$_GET["v4"];
$argv5=$_GET["v5"];
$argv6=$_GET["v6"];
$argv7=$_GET["v7"];
$argv8=$_GET["v8"];
$argv9=$_GET["v9"];


$path_parts = pathinfo($_SESSION["file_path"]);
$save_path0=$path_parts['filename']; 
$save_path1='.'.$path_parts['extension'];

$file_path=$_SESSION["file_path"];
$save_path='processed/'.$save_path0.'_'.$operate.$save_path1;


$command = escapeshellcmd('python python/'.$operate.'.py '.$file_path.' '.$save_path.' '.$argv3);
//$command = escapeshellcmd('whoami');
echo '<br>'.$command;
$output = shell_exec($command);
if ( $output == NULL) {
	echo '<pre>shell_exec() returns NULL, ensure: 
	 1.apache has x permission to execute script file
	 2.script file has no error, see error_log for details 
	 3.script file has output
	 </pre>';

}else{
	echo '<br>Operate result: <pre>'.$output.'</pre>';
	// add time() to prevent cache
	echo '<img src="'.$save_path.'?'.time().'" style="width:300px;">';
	
}

?>