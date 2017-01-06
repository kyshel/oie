<?php
// load session
require_once("load.php");
?>


<?php
//var_dump($_GET);

$operate=$_GET["op"];
$v3=($_GET["v3"] == 'undefined' ? '' : $_GET["v3"]);
$v4=($_GET["v4"] == 'undefined' ? '' : $_GET["v4"]);
$v5=($_GET["v5"] == 'undefined' ? '' : $_GET["v5"]);
$v6=($_GET["v6"] == 'undefined' ? '' : $_GET["v6"]);
$v7=($_GET["v7"] == 'undefined' ? '' : $_GET["v7"]);
$v8=($_GET["v8"] == 'undefined' ? '' : $_GET["v8"]);
$v9=($_GET["v9"] == 'undefined' ? '' : $_GET["v9"]);
//echo "<pre>$v3,$v4,$v5,$v6,$v7,$v8,$v9</pre>";
$argv=$v3.' '.$v4.' '.$v5.' '.$v6.' '.$v7.' '.$v8.' '.$v9;

$file_path=$_SESSION["file_path"];

$path_parts = pathinfo($_SESSION["file_path"]);
$save_path0=$path_parts['filename']; 
$save_path1='.'.$path_parts['extension'];
$save_path='processed/'.$save_path0.'_'.$operate.$save_path1;

//$command = 'python python/'.$operate.'.py '.$file_path.' '.$save_path.' '.$argv;
$command = escapeshellcmd('python python/'.$operate.'.py '.$file_path.' '.$save_path.' '.$argv);
//$command = escapeshellcmd('whoami');
echo '<pre>'.$command.'</pre>';
$output = shell_exec($command);
if ( $output == NULL) {
	echo '<pre>shell_exec() returns NULL, ensure: 
	 1.apache has x permission to execute script file
	 2.script file has no error, see error_log for details 
	 3.script file has output
	 4.script file exists
	 </pre>';

}else{
	//echo 'Operate result: <br>';
	echo '<pre style="display:none;">'.$output.'</pre>';
	// add time() to prevent cache
	echo '<img src="'.$save_path.'?'.time().'" style="max-width:300px;">';
	
}

?>