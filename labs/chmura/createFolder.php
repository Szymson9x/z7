<?php
if(!isset($_COOKIE["ChmuraLogUsr"])){
		header('Location: https://chce-zdac.pl/lab7.php');
		exit();
}
if(isset($_POST["dirName"])){
	mkdir($_SERVER['DOCUMENT_ROOT'].'/labs/chmura/'.$_COOKIE["ChmuraLogUsr"].'/'.$_POST["dirName"], 0777, true);
}
exit();
?>