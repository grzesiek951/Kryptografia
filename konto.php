<?php
	session_start()
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bank XYZ.SA</title>

<style>
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
input[type=text], input[type=password]{
	background-color: white;
	border-radius: 50px;
	width: 200px;
	height: 20px;
	font-size: 24px;
}
#info{
	font-size: 32px;
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
	<div id = "info">
		Witamy :
		<?php
			echo($_SESSION['login']);
		?></br>
		Twój stan konta to :
		<?php
			echo($_SESSION['stan']);
		?>
		</br>
			<a href="przelewy.php"><input type="submit" class = "button" value="Przelew"></a>

			<a href ="historia.php"><input type="submit" class = "button" value="Historia"></a>

		<?php
			if($_SESSION['login'] == 'admin'){
				echo("<a href ='historia.php'><input type='submit' class = 'button' value='akceptujPrzelew'></a>");
			}
		?>
	</div>
</div>
</body>
</html>