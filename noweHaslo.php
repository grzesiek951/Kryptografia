<?php
	include('mail.php');
	session_start();
	require_once "connect.php";
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

	if($polaczenie -> connect_errno!=0)
	{

	}else{
		$login = $_POST['login'];
			$query = "SELECT * FROM uzytkownicy WHERE login='$login'";

			if($result = @$polaczenie -> query($query)){
				$count = $result ->num_rows;
				if($count == 1){
					$wiersz = $result->fetch_assoc();
					$mail = $wiersz['email'];
					 $noweHaslo = rand(100000,1000000);
					 if(mail($mail,"Nowe Haslo","Twoje nowe haslo to : ". $noweHaslo)){
					 	$_SESSION['newPassword'] = $noweHaslo;
					 	$hashHaslo = password_hash($noweHaslo,PASSWORD_DEFAULT);
					 	$sql = "UPDATE Uzytkownicy SET haslo = '$hashHaslo' WHERE login = '$login'";
					 	if ($polaczenie->query($sql) === TRUE) {
	    					header('Location: index.php');
						}
					 }
				}else{
					echo("Nie znaleziono loginu");
				}
		}
		$polaczenie -> close();
	}
?>