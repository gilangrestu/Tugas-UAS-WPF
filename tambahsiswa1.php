<?php

	@$nis = $_POST['nissiswa'];
	@$nama = $_POST['namasiswa'];
	@$paket = $_POST['paket'];
	@$periode = $_POST['periodesiswa'];
	@$namaortusiswa = $_POST['namaortusiswa'];
	@$alamat = $_POST['alamatsiswa'];
	@$nohp = $_POST['nosiswa'];
	
	$dtsiswa = array	("NIS"=>"$nis",
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
				<th>$a</th>
				<td>$b</td>
			</tr>";
	}
	echo "</table>";
?>