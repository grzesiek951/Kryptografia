<!DOCTYPE html>
<html>
<head>
	<title>Bank XYZ.SA</title>

<style>
.doWpisania{
	color: black;
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
	<h2> Historia przelwów: </h2>
	<table border="1" width="200">
	<form action='akceptujPrzelew.php' method="post">
		<?php
			session_start();
			require_once "connect.php";
			$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

			if($polaczenie -> connect_errno!=0)
			{

			}else{
				$id = $_SESSION['id'];
				if($id == 1){
					$query = "SELECT * FROM przelewy";
					if($result = @$polaczenie -> query($query)){
						$count = $result ->num_rows;
						echo("<tr><th>ID</th><th>Numer odbiorcy</th><th>kwota</th><th>id_nadawcy</th><th>akceptacja</th>");
						while ($row = $result->fetch_assoc()) {
							echo("<tr>"."<td>".$row['id']."</td><td>".$row['numer_odbiorcy']."</td><td>".$row['kwota']."</td>
								<td>".$row['id_nadawcy']."</td><td>".$row['akceptacja_admin']."</td></tr>");
						}
						echo("<div class = 'doWpisania'>
								Podaj id przelewu do akceptacji</br>
								<input type='text' name='id_przelewu'>
							</div>");
						echo("<div class = 'doWpisania'>
								<input type='submit' value='akceptuj'>
							</div><br>");
						$polaczenie -> close();
					}
				}else{
					echo("nie admin");
					$query = "SELECT * FROM przelewy WHERE id_nadawcy='$id'";
					if($result = @$polaczenie -> query($query)){
						$count = $result ->num_rows;
						echo("<tr><th>ID</th><th>Numer odbiorcy</th><th>kwota</th>");
						while ($row = $result->fetch_assoc()) {
							echo("<tr>"."<td>".$row['id']."</td><td>".$row['numer_odbiorcy']."</td><td>".$row['kwota']."</td></tr>");
						}
						$polaczenie -> close();
					}
				}
			}
		?>
	</form>
	</table>
</div>
</body>
</html>