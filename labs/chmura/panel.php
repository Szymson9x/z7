<?php
if(!isset($_COOKIE["ChmuraLogUsr"])){
header('Location: https://chce-zdac.pl/lab7.php');exit();}
?>
<?php $title = 'Romanowski'; ?>
<?php $currentPage = 'Lab 7'; ?>
<?php include('/template/head.php'); ?>
<?php include('/template/navbar.php'); ?>
<BODY>

	<div class="container">
		<div class="card mt-5">
			<div class="card-header">
				<b>Zalogowany: 
					<?php if(isset($_COOKIE["ChmuraLogUsr"])){ 
					echo $_COOKIE["ChmuraLogUsr"];
					} ?>
				</b>  
				<span id="ostatnieBledneLogowanie" style="float:right;">
					<?php if(isset($_COOKIE["LastErrorLogin"])){ 
						print "<b style='color:red;'>Nieudane logowanie: ".$_COOKIE["LastErrorLogin"]."</b>";
					} ?>
				</span>
			</div>
			<div class="card-body table-responsive" id="lista">
				<?php include('printdir.php'); ?>
			</div>
		</div>
	</div>

	<script>
	function goToDir(item){
	var dir = $(item).text();
	$.post("printdir.php", {'dir': dir}, function(response){
       $('#lista').empty().append(response);
	});
	}
	
	function goBack(){
	$.post("printdir.php", {'back': 'true'}, function(response){
     $('#lista').empty().append(response);
	});
	}
	
	function downloadFile(item){
		//console.log(item);
	//var file = $(item).text();
	//$.get("download.php", {'fileName': item}); //function(response){
		//console.log(response);
		window.location = 'download.php?fileName='+item;
       //$('#lista').empty().append(response);
	//});
	}
	
	function addFolder(){
	var dirName = $("#createFolder").val();
	var pattern = /^[a-z0-9]+$/i;
	if(!dirName.match(pattern)) return;
	console.log(dirName);
	$.post("createFolder.php", {'dirName': dirName}, function(response){
		$("#lista").load("printdir.php");
	});
	}
	</script>
</BODY>
</html>