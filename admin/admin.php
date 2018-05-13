<?php
	include("../DB/configs/config_db.php");
	include("../DB/classes/databese.php");
	include("../DB/classes/Pengguna.php");
	include("../DB/classes/Session.php");
	
	$session = new Session;
	$session->cekHakAkses("admin");
	$db				= new Database;
	$peranpengguna	= $db->tampildatasiswa();
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../logout.php">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ADMIN</font></h1>
			<img class="user" src="gambar/User-icon.png"></img>
		</div>
		<div class="isi">
			<div class="kiri" >
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
			</div>
			<table class="table1">
			<tr>
				<th>Data Periode</th>
			</tr>
			<tr>
				<td>
					<p><font size="2" color="black" align="left">Cari : </font><input type="text" name="nama">
					<input type="submit" class="btncari" name="cari" value="Cari"/></p>
				</td>
			</tr>
			<tr>
				<td>
					<?php
					echo "<table class='table2'>
							<tr>
								<th>No</th>
								<th>gambar</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Paket Siswa</th>
								<th>Nama Orang Tua</th>
								<th>Alamat</th>
								<th>Periode</th>
								<th>No Hp</th>
								<th>Aksi</th>
								
							 </tr>";
					?>
					<?php
                            $No = 1;
                            foreach($peranpengguna as $peran){ ?>
                                    <tr>
                                        <td><?php echo $No++; ?></td>
										<td ><img src="gambar/<?php echo $peran['gambar']; ?>" width="50" height="50″ border="0"/></td>	
                                        <td><?php echo $peran["NIS"]?></td>
                                        <td><?php echo $peran["nama"]?></td>
                                        <td><?php echo $peran["paket"]?></td>
                                        <td><?php echo $peran["periode"]?></td>
                                        <td><?php echo $peran["nmortu"]?></td>
                                        <td><?php echo $peran["almat"]?></td>
                                        <td><?php echo $peran["nohp"]?></td>
                                        <td>
											<a href="riwayatadmin.php?NIS=<?php echo $peran['NIS'];?>">Riwayat</a>
                                            <a href="../DB/classes/proses.php?NIS=<?php echo $peran['NIS'];?>&foto=<?php echo $peran['gambar'];?>&aksi=hapus">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                            }
							echo "</table>"
                        ?>					
				</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="kembali" value="Kembali"/>
				<input type="submit" name="selanjutnya" value="selanjutnya"/></td>
			</tr>
			</table>		
		</div>
	</body>
</html>