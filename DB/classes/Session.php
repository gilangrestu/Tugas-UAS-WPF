<?php
	class Session{
		public function cekHakAkses($peran){
			session_start();
			
			if(isset($_SESSION["username"]) AND isset($_SESSION["password"])){
				
				$user = new Pengguna($_SESSION["username"],$_SESSION["password"]);
				
				if($user->login() !== $peran){
					header("Location: login.php");
				}
			}
			else{
				header("Location: login.php");
			}
		}
	}
?>