<?php
	include("DB/configs/config_db.php");
	include("DB/classes/databese.php");
	include("DB/classes/Pengguna.php");
	
	if(isset($_POST["username"]) OR isset($_POST["password"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$user = new pengguna($username,$password);

		if($user->login() === FALSE){
			$pesan_error = "username dan password salah";
		}
		else{

			session_start();

			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;

			switch (strtolower($user->login())) {
				case "admin": header("location: admin/admin.php");
					break;
				
				case "tatausaha":  header("location: TU/tatausaha.php");
					break;
			}
		}
	}
?>
<html>
	<head>
		<title>Aplikasi Pembayaran</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<form method="POST">
		<div class="login">
			<h1 align="center">Aplikasi Pembayaran SPP</h1>
			<input type="text" id="input" class="Input-text" name="username" placeholder="Masukkan Username">
			<br>
			<input type="password" id="input" class="Input-text" name="password" placeholder="Masukkan Password">
			<br>
			<input type="submit" class="Input-btn" value="Login"/>
		</div>
		</form>
	</body>
</html>