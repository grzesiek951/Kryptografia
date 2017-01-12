<?php
	session_start()
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bank XYZ.SA</title>

<style>
.doWpisania{
	color: green;
	font-size: 20px;
	margin-top: 20px;
	margin-left: 30px;
}
#main{
	position: fixed;
	height: 100%;
	width: 100%;
	background-image: url('http://3.bp.blogspot.com/-Rs9xeaQoRfc/T6HsuRrUX0I/AAAAAAAACEQ/8_HiGFpyz9U/s1600/8.jpg');
	margin: 0px;
}
h1{
	color:green;
	text-align: center;
}
input[type=text]{
	background-color: white;
	border-radius: 50px;
	width: 200px;
	height: 20px;
	font-size: 24px;
	margin-left: 10px;
}
.button{
	margin-left: 30px;
	background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 50px;
}
}
</style>
</head>
<body>
<div id = 'main'>
	<h1>BANK XYZ.SA</h1>
		<form action='potwierdzenie.php' method="post">
			Nazwa odbiorcy
			<input type="text" name="nazwaOdbiorcy"></br>
			Numer rachunku
			<input type="text" name="numerRachunku"></br>
			Adres odbiorcy
			<input type="text" name="adresOdbiorcy"></br>
			Tytuł przelewu
			<input type="text" name="tytulPrzelewu"></br>
			Kwota przelewu
			<input type="text" name="kwotaPrzelewu"></br>
			<input type="submit" class = "button" value="Zrob przelew">
		</form>
</div>
</body>
</html>