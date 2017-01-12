<?php
	session_start();
	require_once "connect.php";
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

	if($polaczenie -> connect_errno!=0)
	{

	}else{
		$kwota = (double) $_SESSION['kwotaPrzelewu'];
		$numerKonta = (integer) $_SESSION['numerRachunku'];
		$id = (integer) $_SESSION['id'];
		$sql = "INSERT INTO Przelewy (numer_odbiorcy, kwota, id_nadawcy,akceptacja_admin)
		VALUES ('$numerKonta' , '$kwota' , '$id',0)";
		if ($polaczenie->query($sql) === TRUE) {
	    	header('Location: konto.php');
		} else {
	    	echo "Error: " . $sql . "<br>" . $polaczenie->error;
		}
			$polaczenie -> close();
	}
?>