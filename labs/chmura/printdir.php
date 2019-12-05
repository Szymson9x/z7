<?php
function printDir($dirPath, $withBack) {
	
	
	print "
	<div class='row'>
		<div class='container col-md-6'>
			<div class='card'>
				<div class='card-body'>
					<form action='addFile.php' method='POST' ENCTYPE='multipart/form-data'>
					<p>Wgraj plik:</p>
						<div class='custom-file'>
							<input type='file' name='plik' class='custom-file-input' id='customFile' />
							<label class='custom-file-label' for='customFile'>Choose file</label>
						</div> <br /><br />
						<button type='submit' class='btn btn-primary'>Zapisz</button>
					</form>
				</div>
			</div>
		</div>
		<div class='container col-md-6'>";
		if(!$withBack){
		print "
			<div class='card'>
				<div class='card-body'>

						<p>Dodaj folder</p>
							<div>
								<input type='text' class='form-control' id='createFolder'  placeholder='Nazwa folderu'>
							 </div> <br />
							<button onclick='addFolder();' class='btn btn-primary'>Zapisz</button>
				</div>
			</div>";}
		print "</div>
			</div>";
	
	print "<table class='table'>";
		print "
			<thead>
				<tr>
				  <th scope='col'>FILE</th>
				  <th scope='col'>Download</th>
				</tr>
			</thead>";
    $files = preg_grep('~\.*$~', scandir($dirPath));
	print "<tbody>";
	foreach ($files as &$value) {
		if($value !== '.' && $value !== '..'){
			print "<tr>";
			print "<td>";
				if (strpos($value, '.') !== false) {
					print "<span class='badge badge-primary';'>{$value}</span>";
					print "</td>";
					print "<td><span class='badge badge-success' onclick='downloadFile(\"{$value}\")'><i class='fa fa-cloud-download' aria-hidden='true'>&nbsp;&nbsp;Pobierz</i></span></td>";
				} else {
					print "<span class='badge badge-warning' onclick='goToDir(this);'>{$value}</span>";
					print "</td>";
					print "<td></td>";
				}
			print "</tr>";
		}
	}
	if($withBack){
		print "<tr>";
		print "<td>";
		print "<span class='badge badge-secondary' onclick='goBack();'>Cofnij</span>";
		print "</td>";
		print "<td></td>";
		print "</tr>";
	}
	print "</tbody>";
	print "</table>";
} 
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
if(isset($_POST["dir"])){
	$currentPath = $currentPath.'/'.$_POST["dir"];
}
if(isset($_POST["back"])){
	$currentPath = $userDir;
}
$withBack = false;
if($currentPath != $userDir) {$withBack = true;}
setcookie("CurrentDirPath", $currentPath , time()+10*60);
printDir($currentPath, $withBack);
?> 