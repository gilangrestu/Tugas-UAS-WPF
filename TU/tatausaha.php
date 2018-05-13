<?php
	include("../DB/configs/config_db.php");
	include("../DB/classes/databese.php");
	include("../DB/classes/Pengguna.php");
	include("../DB/classes/Session.php");
	
	$session = new Session;
	$session->cekHakAkses("tatausaha");
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
			Tatausaha</font></h1>
			<img class="user" src="gambar/User-icon.png"></img>
		</div>
		<div class="isi">
			<div class="kiri" >
				<div class="menu">
					<p><font size="6" color="white">&nbsp;Data Siswa</font><p>
				</div>
			</div>
			<table class="table1">
			<tr>
				<th>Data Periode</th>
			</tr>
			<tr>
				<td>
					<p><font size="2" color="black" align="left">Cari : </font>
					<input type="text" name="nama">
					<input type="submit" class="btncari" name="cari" value="Cari"/></p>
				</td>
			</tr>
			<tr>
				<td>
				<?php
					echo "<table class='table2'>
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>NS</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Periode</th>
								<th>Aksi</th>
							   </tr>";
				?>			   
					<?php
                            $No = 1;
                            foreach($peranpengguna as $peran){ ?>
                                    <tr>
                                        <td><?php echo $No++; ?></td>
										<td><img src="../admin/gambar/<?php echo $peran['gambar']; ?>" width="50" height="50″ border="0"/></td>	
                                        <td><?php echo $peran["ID_Transaksi"]?></td>
                                        <td><?php echo $peran["NIS"]?></td>
                                        <td><?php echo $peran["nama"]?></td>
                                        <td><?php echo $peran["periode"]?></td>
                                        <td>
											<a href="riwayat.php?NIS=<?php echo $peran['NIS'];?>">Riwayat</a>
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