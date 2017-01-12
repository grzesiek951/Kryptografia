<?php
session_start();
	require_once "connect.php";
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

	if($polaczenie -> connect_errno!=0)
	{

	}else{
		$id = $_POST['id_przelewu'];
		echo($id);
		$sql = "UPDATE Przelewy SET akceptacja_admin = '1' WHERE id = '$id'";
			if ($polaczenie->query($sql) === TRUE) {
	    		header('Location: historia.php');
			}else{
				echo("BLAC");
			}
	$polaczenie -> close();
	}





?>