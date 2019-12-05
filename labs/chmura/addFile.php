<?php 
$currentPath = '';
$userDir = '';
if(!isset($_COOKIE["ChmuraLogUsr"])){
		header('Location: https://chce-zdac.pl/lab7.php');
		exit();
} else {
	$userDir = '/labs/chmura/'.$_COOKIE["ChmuraLogUsr"];
	if(isset($_COOKIE["CurrentDirPath"])) {
		$currentPath = $_COOKIE["CurrentDirPath"];
	} else {
		$currentPath = $userDir;
	}
}	
if (is_uploaded_file($_FILES['plik']['tmp_name'])) { 
//echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>'; 
move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].''.$currentPath.'/'.$_FILES['plik']['name']);
}
//else {echo 'Błąd przy przesyłaniu danych!';} 
header('Location: https://chce-zdac.pl/labs/chmura/panel.php');
exit();
?>