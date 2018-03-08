<?php
	class data{
		
	public $nis; 
	public $nama;
	public $paket;
	public $periode;
	public $namaortusiswa;
	public $alamat; 
	public $nohp; 
		
	public function __construct($user,$pass){
			$this->username = $user;
			$this->pass = $pass;
		}
	
	public function simpan(){
		$dtsiswa = array	("NIS"=>"$this->username",
							"Nama"=>"$nama",
							"Paket"=>"$paket",
							"Periode"=>"$periode",
							"Namaortusiswa"=>"$namaortusiswa",
							"Alamat"=> "$alamat",
							"Nohp"=>"$nohp",);
						
		echo "<table class='table2'>";
		foreach($dtsiswa as $a=> $b )
		{
		 echo 	"<tr>
					<td>$a</td>
					<td>$b</td>
				</tr>";
		}
		echo "</table>";
	}
}
?>