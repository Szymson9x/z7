<?php $title = 'Romanowski'; ?>
<?php $currentPage = 'Lab 7'; ?>
<?php include('/template/head.php'); ?>
<?php include('/template/navbar.php'); ?>
<body>
<script>

</script>

<div class="container">
	<div class="card mt-5">
		<div class="card-header"><b>ZADANIE 7 - Rejestracja</b> <span id="dataCzas" style="float:right;"></span></div>
		<div class="card-body table-responsive" id="tabRejestracja"> 
			<?php 
			include('/labs/chmura/rejestruj.php'); 
			?>			
		</div>
	</div>
</div>

<div class="container">
	<div class="card mt-5">
		<div class="card-header"><b>ZADANIE 7 - Logowanie</b> <span id="dataCzas" style="float:right;"></span></div>
		<div class="card-body table-responsive" id="tabLogowanie">
			<?php 
			include('/labs/chmura/login.php'); 
			?>		
		</div>
	</div>
</div>


</body>

</html>
