<?php
	class siswa{
		private $id;
		private $db;
		
		public function __construct($id = null){
			$this->id=$id;
			
			$database = new Database;
			$this->db = $database->db;
		}
		
		public function tambahdatasiswa($nis,$nama,$paket,$periode,$namaortusiswa,$alamat,$nohp,$namaimg){
			return $this->db->query("INSERT INTO siswa(NIS,nama,paket,periode,nmortu,almat,nohp,gambar) VALUES('${nis}','${nama}','${paket}','${periode}','${namaortusiswa}','${alamat}','${nohp}','${namaimg}')");
		}
		public function updatedatasiswa($nis,$nama,$paket,$periode,$namaortusiswa,$alamat,$nohp,$namaimg){
            $update = $this->db->query("UPDATE `siswa` SET `NIS`='${nis}',`nama`='${nama}',`paket`='${paket}',`periode`='${periode}',`almat`='${alamat}',`nohp`='${nohp}',`gambar`='${namaimg}' WHERE NIS = '${nis}'");
        }
		public function EditDatasiswa($nis) {
            $edit = $this->db->query("SELECT * FROM `siswa` WHERE NIS='$nis'");
            return $edit;
        }
}		