<?php
$slot = getcwd();
if(!empty($_POST['data'])){
$data = $_POST['data'];
$fname = "link" . ".php";//generates random name
$dir = getcwd()."/";

$file = fopen($dir .$fname, 'c+');//creates new file
ftruncate($file, 0);
fwrite($file, htmlentities($data));
fclose($file);
chmod($dir."/".$fname, 0755);
}




?>