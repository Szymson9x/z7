<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php include('../../db/db-connection7.php');
 $userRejestracja=$_POST['userRejestracja']; // login z formularza
 $passRejestracja=$_POST['passRejestracja']; // hasło z formularza
 //mysqli_query($polaczenie, "SET NAMES 'utf8'"); // ustawienie polskich znaków
 $result = mysqli_query($polaczenie, "SELECT * FROM users WHERE login='$userRejestracja'"); // pobranie z BD wiersza, w którym login=login z formularza
 $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
 if($rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
 {
	 echo "Istnieje już użytkownik o podanym loginie.";
	 
	mysqli_close($polaczenie); // zamknięcie połączenia z BD
 }
 else
 {
	 
	$stmt = $polaczenie->prepare("INSERT INTO users (login,haslo) values(?,?);");
	$stmt->bind_param(
		"ss",
		$userRejestracja,
		$passRejestracja
	);
	$stmt->execute();
	mysqli_close($polaczenie);
	
	mkdir($_SERVER['DOCUMENT_ROOT'].'/labs/chmura/'.$userRejestracja, 0777, true);
	echo "Utworzono konto.";
 }

?>
</BODY>
</HTML>