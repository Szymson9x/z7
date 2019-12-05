<?php
$file_path;
$userDir;
$currentPath;

if(isset($_COOKIE["ChmuraLogUsr"])){
		//header("Location: https://chce-zdac.pl/lab7.php");
		//die();
		$userDir = '/labs/chmura/'.$_COOKIE["ChmuraLogUsr"];
} else {
	$userDir = '/labs/chmura/'.$_COOKIE["ChmuraLogUsr"];
	if(isset($_COOKIE["CurrentDirPath"])) {
		$currentPath = $_COOKIE["CurrentDirPath"];
	} else {
		$currentPath = $userDir;
	}
}	

$filename;
if(isset($_GET["fileName"])){
	$filename = $_GET["fileName"];
	$file_path = $currentPath.'/'.$_GET["fileName"];
}
//echo $file_path;
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"".$filename."\""); 
readfile($file_path);
exit();
?>