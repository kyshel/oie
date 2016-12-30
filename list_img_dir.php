<?php
require_once("header.php");

$dirname = "img/";
$images = glob($dirname."*.*");
//$images = glob($dirname."*.{jpg,bmp,png}",GLOB_BRACE);

echo '<div style="width:1000px;">';
foreach($images as $image) {
    echo '<img src="'.$image.'" style="width:45%;" />';
    echo '<span> </span>';
}
echo "</div>";

















?>
</body>
</html>