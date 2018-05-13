<?php
	include("../DB/configs/config_db.php");
	include("../DB/classes/databese.php");
	include("../DB/classes/Pengguna.php");
	include("../DB/classes/Session.php");

	
	$session = new Session;
	$session->cekHakAkses("admin");
	$db				= new Database;
	
	@$nis = $_GET["NIS"];
	$data       	= $db->tampildatatransaksi($nis);

?>	
<html>
	<head>
		<title>Aplikasi Pembayaran</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<div class="atas">
			<h1><font size="6" color="white">&nbsp;SMA PGRI Tegaldelimo</font><font size="2" color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ADMIN</font></h1>
			<img class="user" src="gambar/User-icon.png"></img>
		</div>
		<div class="isi">
			<div class="kiri" >
				<a href="admin.php">
				<div class="menu">
					<p><font size="6" color="white">&nbsp;Data Siswa</font><p>
				</div>
				<a href="siswabaru.php">
				<div class="menu">
					<p><font size="5" color="white">&nbsp;Tambah Data Siswa</font><p>
				</div>
				</a>
				<a href="editpaket.php">
				<div class="menu">
					<p><font size="6" color="white">&nbsp;PAKET</font><p>
				</div>
				</a>
				<div class="menu">
					<p><font size="6" color="white">&nbsp;Riwayat</font><p>
				</div>
			</div>
			<?php
					foreach($data as $peran)
					{
			?>	
					<table class='table3'>
				
						<?php echo "<tr>
								<td>Nama</td>
								<td>".$peran["nama"]."</td>			
						</tr>
							<tr>
								<td>Alamat</td>
								<td>".$peran["almat"]."</td>	
							</tr>
							<tr>
								<td>No Hp</td>
							<td>".$peran["nohp"]."</td>
							</tr>
							<tr>
								<td>Paket Pendidikan</td>
								<td>".$peran["paket"]."</td>
							</tr>";
							?>
					</table>
					<?php } ?>
			<table class="table4">
					<tr>
						<th>Keterangan</th>
						<th>Tagihan</th>
						<th>Tanggal Tagihan</th>
					</tr>
					<?php		
					foreach($data as $peran)
					{
					echo"<tr>
						<td>SPP Maret</td>
						<td>Rp. 100.000</td>
						<td>".$peran["tgl_transaksi"]."</td>
					</tr>
					<tr>
						<td>Sewa Buku</td>
						<td>Rp. 80.000</td>
						<td>".$peran["tgl_transaksi"]."</td>
					</tr>";
					}
			?>		
					<tr>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th>Total</th>
						<th>Rp. 180.000</th>
						<th>-</th>
					</tr>
					<tr>
						<td>Pembayaran</td>
						<td>Rp. 100.000</td>
						<td>28-03-2018</td>
					</tr>
					<tr>
						<td>Dana Bos</td>
						<td>Rp. 60.000</td>
						<td></td>
					</tr>
					<tr>
						<td>Dana Bantuan</td>
						<td>Rp. 20.000</td>
						<td></td>
					</tr>
					<tr>
						<th>Total Yang Harus Dibayarkan</th>
						<th>Rp. 0</th>
						<th>-</th>
					</tr>
			</table>
			<input type="submit" class="Input-btn1" name="cetak" value="CETAK"/>
			<a href="editsiswa.php?NIS=<?php echo $peran['NIS'];?>"><input type="submit" class="btn" name="editpkt" value="Edit Data Siswa"/></a>
		</div>
	</body>
</html>