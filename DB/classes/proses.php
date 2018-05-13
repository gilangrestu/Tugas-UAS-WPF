<?php
	include("../configs/config_db.php");
	include("databese.php");
	 
	$guru = new Database;
    
    $aksi = $_GET['aksi'];
	$foto = $_GET['foto']; 
	
    if($aksi == "hapus"){ 	
		
		if(is_file("../../admin/gambar/".$foto))
            unlink("../../admin/gambar/".$foto);
		
        $guru->HapusDataguru($_GET["NIS"]);
	    header("location:../../admin/admin.php");
	}
 ?>