<?php include('../../db/db-connection7.php');
 $user=$_POST['user']; // login z formularza
 $pass=$_POST['pass']; // hasło z formularza
 mysqli_query($polaczenie, "SET NAMES 'utf8'"); // ustawienie polskich znaków
 $result = mysqli_query($polaczenie, "SELECT * FROM users WHERE login='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
 $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
 if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
 {
 mysqli_close($polaczenie); // zamknięcie połączenia z BD
 echo "Niepoprawny login lub haslo !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
 }
 else
 { // Jeśli $rekord istnieje
	$userId = $rekord['id'];
	$haslo = $rekord['haslo'];
	$iloscNieudanych = $rekord['ilosc_nieudanych_logowan'];
	$ostatniaData = $rekord['data_zmiany'];
	
	
	$datetime1 = new DateTime($ostatniaData);
	$datetime2 = new DateTime();
	$interval = $datetime1->diff($datetime2);
	//echo $interval->format('%Y-%m-%d %H:%i:%s');
	$minut = $interval->format('%i');
	if($iloscNieudanych>2 && $minut<1) {
		echo "Konto zostało zablokowane. Spróbuj ponownie za chwilę.";
		exit();
	}
	
	if($haslo==$pass) // czy hasło zgadza się z BD
	{
		setcookie("LastErrorLogin", '', 1, '/');
		$poprawne = 1;
		if($rekord['ilosc_nieudanych_logowan'] > 0){
			$stmt = $polaczenie->prepare("update users set ilosc_nieudanych_logowan = 0, data_zmiany = now() where id = ?;");
			$stmt->bind_param(
			"s",
			$userId,
			);
			$stmt->execute();
		
		setcookie("LastErrorLogin", $datetime1->format('Y-m-d H:i:s') , time()+10*60, '/');
		}
		$stmt = $polaczenie->prepare("insert into logs (user_id, poprawne_logowanie) values (?, ?);");
			$stmt->bind_param(
			"ss",
			$userId,
			$poprawne,
			);
			$stmt->execute();
		
		mysqli_close($polaczenie);
		 //error_reporting(E_ALL);
		 //header("location: http://example.com",  true,  301 );  exit;
		 //echo 'This is an error';
		setcookie("ChmuraLogUsr", '', 1, '/');
		setcookie("CurrentDirPath", '', 1, '/');
		setcookie("ChmuraLogUsr", $user , time()+10*60, '/');
		header('Location: panel.php');
		exit();
	 }
	 else
	 {
		 $poprawne = 0;
		 

		$stmt = $polaczenie->prepare("update users set ilosc_nieudanych_logowan = ilosc_nieudanych_logowan + 1, data_zmiany = now() where id = ?;");
		$stmt->bind_param(
			"s",
			$userId,
			);
		$stmt->execute();

		
		
		 $stmt = $polaczenie->prepare("insert into logs (user_id, poprawne_logowanie) values (?, ?);");
			$stmt->bind_param(
			"ss",
			$userId,
			$poprawne,
			);
			$stmt->execute();
		 
	 mysqli_close($polaczenie);
	 echo "Niepoprawny login lub haslo !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
	 }
}
?>