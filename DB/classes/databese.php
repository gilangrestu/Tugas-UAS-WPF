<?php
	class Database{
		private $host = DB_HOSTNAME;
		private $user = DB_USERNAME;
		private $pass = DB_PASSWORD;
		private $name = DB_NAME;
		
		public $db;
		
		public function __construct(){
			//membuat koneksi database
			$this->db = new mysqli($this->host,$this->user,$this->pass,$this->name);
		}
		
		
		public function tampildatasiswa(){
			$daftar = $this->db->query("SELECT * FROM transaksi JOIN siswa");
			return $daftar;
		}
		public function tampildatatransaksi($nis){
			$daftar = $this->db->query("SELECT * FROM transaksi JOIN siswa ON siswa.`NIS` = transaksi.`NIS` WHERE transaksi.`NIS`= '${nis}'");
			return $daftar;
		}
		public function HapusDataguru($nis){
            $hapus = $this->db->query("DELETE FROM siswa WHERE NIS ='${nis}'");
        }
		
	
	}
?>