<?php
	include("../DB/configs/config_db.php");
	include("../DB/classes/databese.php");
	include("../DB/classes/siswa.php");
	
	$db				= new Database;
	$siswa			= new siswa;
	$editdatasiswa = $siswa->EditDatasiswa($_GET['NIS']);    
	
	if(isset($_POST['simpan'])){
		@$nis = $_POST['nissiswa'];
		@$nama = $_POST['namasiswa'];
		@$paket = $_POST['paket'];
		@$periode = $_POST['periodesiswa'];
		@$namaortusiswa = $_POST['namaortusiswa'];
		@$alamat = $_POST['alamatsiswa'];
		@$nohp = $_POST['nosiswa'];
	
	@$file = $_FILES["berkas"];
	
	$namaimg		= $file["name"];
	$pos_sementara	= $file["tmp_name"];
	
	$pos_akhir = "gambar/".$namaimg;
	
	if(copy($pos_sementara,$pos_akhir))
		echo "${pos_akhir}";
	else
		echo "gagal";
	
	move_uploaded_file($_FILES['berkas']['tmp_name'], "gambar/".$_FILES['berkas']['name']);
	if($siswa->updatedatasiswa($nis,$nama,$paket,$periode,$namaortusiswa,$alamat,$nohp,$namaimg)) 
		echo "<p>Data baru berhasil ditambahkan";
		else								   
		echo "<p>Data baru gagal ditambahkan";
	}
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
				</a>
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
			</div>
			<table class="table1">
			<tr>
				<th>Form Edit Data Siswa</th>
			</tr>
			<tr>
				<td>
					<form method="POST" enctype="multipart/form-data">
					<?php
                            foreach($editdatasiswa as $edit){
                        ?>
					<table class="table5">
					<tr>
						<td>NIS</td>
						<td><input type="number" name="nissiswa" value="<?php echo $edit['NIS']?>"/></td>
					</tr>
					<tr>
						<td>NAMA</td>
						<td><input type="text" name="namasiswa" value="<?php echo $edit['nama']?>"/></td>
					</tr>
					<tr>
						<td>PAKET</td>
						<td>
							<select name="paket">
								<option name="-">--</option>
								<option name="danabos">Dana Bos</option>
								<option name="reguler1">REGULER 1</option>
								<option name="reguler2">REGULER 2</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>PERIODE</td>
						<td><input type="text" name="periodesiswa" value="<?php echo $edit['periode']?>"/></td>
					</tr>
					<tr>
						<td>NAMA ORANG TUA/WALI</td>
						<td><input type="text" name="namaortusiswa" value="<?php echo $edit['nmortu']?>"/></td>
					</tr>
					<tr>
						<td>ALAMAT</td>
						<td><input type="text" name="alamatsiswa" value="<?php echo $edit['almat']?>"/></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td><input type="text" name="nosiswa" value="<?php echo $edit['nohp']?>"/></td>
					</tr>
					<tr>
						<td>Pilih gambar</td>
						<td><input type="file" name="berkas" accept="image/*"/></td>
					</tr>
				</table>
				<input type="submit" class="btnsimpan" name="simpan" value="SIMPAN"/>
				<?php } ?>
				</form>
				</td>
			</tr>
			</table>	
		</div>
	</body>
</html>