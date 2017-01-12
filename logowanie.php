<?php
	session_start();
	require_once "connect.php";
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

	if($polaczenie -> connect_errno!=0)
	{

	}else{
		$s1 = strpos($_POST['login'],'script');
		$s2 = strpos($_POST['password'],'script');
		if($s1 === false && $s2 === false){
			$login = addslashes($_POST['login']);
			$haslo = addslashes($_POST['password']);
			$captcha = '6Ld3uRAUAAAAAFJvV8M2l_e8L6oU_YgSFtPp8YAX';
			$sprawdz  = file_get_contents("https://google.com/recaptcha/api/siteverify?secret=".$captcha."&response=".$_POST['g-recaptcha-response']);
			$odpowiedz = json_decode($sprawdz);
			if($odpowiedz->success){
				$query = "SELECT * FROM uzytkownicy WHERE login='$login'";

				if($result = @$polaczenie -> query($query)){
					$count = $result ->num_rows;
					if($count == 1){
						$wiersz = $result->fetch_assoc();
						if(password_verify($haslo,$wiersz['haslo'])){
							$stan = $wiersz['stan'];
							$_SESSION['id'] = $wiersz['id'];
							$_SESSION['stan'] = $wiersz['stan'];
							$_SESSION['login'] = $wiersz['login'];
							header('Location: konto.php');
						}else{
							echo("Nie znaleziono wyniku");
						}
					}else{
						echo("Nie znaleziono wyniku");
					}
				}
			}else{
				echo("Jesteś botem??");
			}
			$polaczenie -> close();
		}else{
			echo("WPISAŁEŚ NIEDOZWOLONE SŁOWO");
		}
	}
?>