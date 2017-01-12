<?php
	session_start();
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
input[type=text], input[type=password]{
	background-color: white;
	border-radius: 50px;
	width: 200px;
	height: 20px;
	font-size: 24px;
}

}
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<script type="text/javascript" src = "./temp/fb.js"></script>
<div id = 'main'>
	<h1>BANK XYZ.SA</h1>
	<?php echo($_SESSION['newPassword'])?>
	<form action='logowanie.php' method="post">
		<div class = 'doWpisania'>
			Podaj login</br>
			<input type="text" name="login">
		</div>
		<div class = 'doWpisania'>
			Podaj hasło</br>
			<input type="password" name="password">
		</div></br>
		<div class="g-recaptcha" data-sitekey="6Ld3uRAUAAAAAC9PuGPl_V5nC1zWhWk9LPOsCzn1"></div>
		<div class = 'doWpisania'>
			<input type="submit" value="Zaloguj">
			<a href="odzyskajHaslo.php" style = 'color: black'>odzyskaj haslo</a>
		</div><br>

		<div id = "sidebar">
			<div class = 'fb-login-button' data-scope= "public_profile,email" onlogin="checkLoginState();"></div>
		</div>
	</form>
</div>
</body>
</html>