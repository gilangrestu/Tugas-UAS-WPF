<?php
	class login{
		protected $user ;
		protected $pass ;
		
		public function __construct($user,$pass){
			$this->user = $user;
			$this->pass = $pass;
		}
		
		public function pengguna(){
			if($this->user == "admin" && $this->pass  == 12345)
			{
				header("location:admin.php");
			}
			else if($this->user == "tatausaha" && $this->pass  == 12345)
			{
				header("location:tatausaha.php");
			}
			else{
				header("location:index.php");
			}
		}
	}	
?>