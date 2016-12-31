<?php
require_once("header.php");
?>

<?php
echo '<img src="'.$_SESSION["file_path"].'" style="width:300px;">';

$operate='blur';
$path_parts = pathinfo($_SESSION["file_path"]);
$save_path0=$path_parts['filename']; 
$save_path1='.'.$path_parts['extension'];

$file_path=$_SESSION["file_path"];
$save_path='processed/'.$save_path0.'_'.$operate.$save_path1;
$blur_size=10;

$command = escapeshellcmd('python '.$operate.'.py '.$file_path.' '.$save_path.' '.$blur_size);
//$command = escapeshellcmd('python a.py');
//echo '<br>'.$command;
$output = shell_exec($command);
if ( $output == NULL) {
	echo '<pre>shell_exec() returns NULL, ensure: 
	 1.apache has x permission to execute script file
	 2.script file has no error, see error_log for details 
	 3.script file has output
	 </pre>';

}else{
	echo '<br>Operate result: <pre>'.$output.'</pre>';
	echo '<img src="'.$save_path.'" style="width:300px;">';
}





