<?php include("p_ace-msgses1.php"); include("func/f_idf.php");  include ('../include/formatrp.php');
//-- for upload img -----
$table_name="t_pelanggan"; $folder_name="img-pelanggan";	//$isfold=1;
include("p_imgup_v2.php");
//========================================
if ((isset($_POST['Simpan']) || isset($_POST['Edit'])) && $formses==1) {
	$a=$_POST["terakhir_sedot"]; $a=substr($a,6,4)."-".substr($a,3,2)."-".substr($a,0,2); $terakhir_sedot=$a;
}
//---
		
$layan="no";
if (isset($_POST['Simpan']) && $formses==1) {
	$prefix="PEL".$th_00.$bl_00.$hr_00.$jm_00.$mn_00;	$newid_cst=newIDF("t_pelanggan", "idf_pelanggan", $prefix, 5);
	$prefix="LLTT-";	$id_pelanggan=newIDF("t_pelanggan", "id_pelanggan", $prefix, 6);	
	
	/*/--- buat id pel ---		
	$des0 = "00"; $kec0 = "00";
	$q=mysqli_query($con, "SELECT * FROM t_desakel LEFT JOIN t_kec ON t_kec.idf_kec=t_desakel.idf_kec WHERE t_desakel.idf_desakel='".$_POST["idf_desakel"]."' LIMIT 1");
	while ($dd = mysqli_fetch_assoc($q))  { $des0=$dd["des_kode_sidoarjo"]; $kec0=$dd["kec_kode_sidoarjo"]; } 
	$prefix= $kec0.".".$des0.".";	$id_pelanggan=newIDF("t_pelanggan", "id_pelanggan", $prefix, 5) ; 
	*/
		
	//---	
	$q = " INSERT INTO t_pelanggan 
	(idf_pelanggan, id_pelanggan, tanggung_jawab, nik, jabatan, alamat, rt, rw, desa, kec, kode_pos, telp, email, jenis, penghuni, kepemilikan, kepemilikan_lain, air_bersih, no_pdam, listrik, tangki_septik, jum_kompartemen, posisi_septik, bahan_septik, pabrikasi, lubang_sedot, terakhir_sedot, priode_sedot, akses, septik_p, septik_l, septik_t, bundar_d, bundar_t, lat, lon, stat_pelanggan, idf_desakel, veridata, kode_qr_pel, septik_kapasitas) 
	VALUES 
	('".$newid_cst."', '".$id_pelanggan."', '".$_POST["tanggung_jawab"]."', '".$_POST["nik"]."', '".$_POST["jabatan"]."', '".$_POST["alamat"]."', '', '', '', '', '".$_POST["kode_pos"]."', '".$_POST["telp"]."', '".$_POST["email"]."', '".$_POST["jenis"]."', '".$_POST["penghuni"]."', '".$_POST["kepemilikan"]."', '".$_POST["kepemilikan_lain"]."', '".$_POST["air_bersih"]."', '".$_POST["no_pdam"]."', '".$_POST["listrik"]."', '".$_POST["tangki_septik"]."', '".$_POST["jum_kompartemen"]."', '".$_POST["posisi_septik"]."', '".$_POST["bahan_septik"]."', '".$_POST["pabrikasi"]."', '".$_POST["lubang_sedot"]."', '".$terakhir_sedot."', '".$_POST["priode_sedot"]."', '".$_POST["akses"]."', '".$_POST["septik_p"]."', '".$_POST["septik_l"]."', '".$_POST["septik_t"]."', '".$_POST["bundar_d"]."', '".$_POST["bundar_t"]."', '".$_POST["lat"]."', '".$_POST["lon"]."', 'L2T2', '".$_POST["idf_desakel"]."', '1', MD5('".$newid_cst."'), '".$_POST["septik_kapasitas"]."' )";
	
	$result=mysqli_query($con, $q); //echo "<br>".$q;
	if($result)	{ 	$msg_pros="Data Telah Di Simpan"; $msg_p="ok";  
				 
				 
		if($_POST["isFromVerMob"]!="") {
			mysqli_query($con, "UPDATE t_mobile_daftar SET idf_pelanggan='".$newid_cst."' WHERE idf_mob_daft='".$_POST["verMob_idfmob"]."' LIMIT 1 ");
		}
				 
		/*if($jad == "Bersedia"){
			$qjum=mysqli_query($con, "SELECT * FROM t_tarif WHERE kode='".$_POST["tarif"]."'  LIMIT 1");
			$djum = mysqli_fetch_assoc($qjum);
			//===================================buat  billing
			$prefix="BLG".$th_00.$bl_00.$hr_00.$jm_00.$mn_00;	$newidfbil=newIDF("t_billing", "idf_billing", $prefix, 5);
			$prefix="LLTT".$th_00.$bl_00.$hr_00;	$newnobil=newIDF("t_billing", "no_billing", $prefix, 3);

			$query="INSERT INTO t_billing (idf_billing, no_billing, tgl_bil, idf_spk, harga, gol_bil, idf_pelanggan) 
				VALUES( '".$newidfbil."','".$newnobil."', '".$th_00."-".$bl_00."-".$hr_00."', '', '".$djum["tarif"]."' , 'LLTT' , '".$newid_cst."') ";
			mysqli_query($con, $query);
			
		}else{
			$query="DELETE FROM t_billing WHERE idf_pelanggan='".$newid_cst."' "; 
			$result=mysqli_query($con, $query);
		}
	
		
		$layan="ok";*/
	
		//$PROS_NEXT=1; //Detail
		$loghis_act="Insert (L2T2 :".$newid_cst.")";  include("p_log.php");	}
	else		{	$msg_pros="Data Gagal Di Simpan (<i>".mysqli_error($con)."</i>)"; $msg_p="no"; }
}

else if (isset($_POST['Edit'])) {
	if(isset($_POST["jadilltt"])){$jad=$_POST["jadilltt"];}else{$jad="";}
	if(isset($_POST["sedotable"])){$sdo=$_POST["sedotable"];}else{$sdo="";}		
	if(isset($_POST["tarif"])){$trf=$_POST["tarif"];}else{$trf="";}	
		
	$query="UPDATE t_pelanggan SET 
	tanggung_jawab='".$_POST["tanggung_jawab"]."', nik='".$_POST["nik"]."', jabatan='".$_POST["jabatan"]."', alamat='".$_POST["alamat"]."', rt='', rw='', desa='', kec='', kode_pos='".$_POST["kode_pos"]."', telp='".$_POST["telp"]."', email='".$_POST["email"]."', jenis='".$_POST["jenis"]."', penghuni='".$_POST["penghuni"]."', kepemilikan='".$_POST["kepemilikan"]."', kepemilikan_lain='".$_POST["kepemilikan_lain"]."', air_bersih='".$_POST["air_bersih"]."', no_pdam='".$_POST["no_pdam"]."', listrik='".$_POST["listrik"]."', tangki_septik='".$_POST["tangki_septik"]."', jum_kompartemen='".$_POST["jum_kompartemen"]."', posisi_septik='".$_POST["posisi_septik"]."', bahan_septik='".$_POST["bahan_septik"]."', pabrikasi='".$_POST["pabrikasi"]."', lubang_sedot='".$_POST["lubang_sedot"]."', terakhir_sedot='".$terakhir_sedot."', priode_sedot='".$_POST["priode_sedot"]."', akses='".$_POST["akses"]."', septik_p='".$_POST["septik_p"]."', septik_l='".$_POST["septik_l"]."', septik_t='".$_POST["septik_t"]."', bundar_d='".$_POST["bundar_d"]."', bundar_t='".$_POST["bundar_t"]."', lat='".$_POST["lat"]."', lon='".$_POST["lon"]."',  idf_desakel='".$_POST["idf_desakel"]."', septik_kapasitas='".$_POST["septik_kapasitas"]."'
	WHERE idf_pelanggan='".$_POST['id']."' LIMIT 1  ";
	$result=mysqli_query($con, $query);
	if($result)	{ 	
		$msg_pros="Data Telah Di Update"; $msg_p="ok"; 
				 $newid_cst=$_POST['id'];
		
				 /*$layan="ok";
				 
				 if($jad == "Bersedia"){
					$qjum=mysqli_query($con, "SELECT * FROM t_tarif WHERE kode='".$_POST["tarif"]."'  LIMIT 1");
					$djum = mysqli_fetch_assoc($qjum);
					//===================================buat  billing
					$prefix="BLG".$th_00.$bl_00.$hr_00.$jm_00.$mn_00;	$newidfbil=newIDF("t_billing", "idf_billing", $prefix, 5);
					$prefix="LLTT".$th_00.$bl_00.$hr_00;	$newnobil=newIDF("t_billing", "no_billing", $prefix, 3);

					$query="INSERT INTO t_billing (idf_billing, no_billing, tgl_bil, idf_spk, harga, gol_bil, idf_pelanggan) 
						VALUES( '".$newidfbil."','".$newnobil."', '".$th_00."-".$bl_00."-".$hr_00."', '', '".$djum["tarif"]."' , 'L2T2' , '".$newid_cst."') ";
					mysqli_query($con, $query);

				}else{
					$query="DELETE FROM t_billing WHERE idf_pelanggan='".$newid_cst."' "; 
					$result=mysqli_query($con, $query);
				}
				*/
				 
		//---
		$loghis_act="Edit (L2T2 - Kode:".$_POST['id'].")";  include("p_log.php");	}
	else		{	$msg_pros="Data Gagal Di Update (<i>".mysqli_error($con)."</i>)"; $msg_p="no"; }
}

else if (isset($_POST["actio"])) {
	if ($_POST['actio']=='hapus') { /*
		$n=0;	$loop=1;
		while ($loop <= $page_size)	{
			if (isset($_POST["cb"][$loop])) { $n++;
				$query="DELETE FROM t_zona WHERE id_keg='".$_POST["cb"][$loop]."'";
				$result=mysqli_query($con, $query);
			} $loop++;
		}
		if($n <> 0)	{ 	$msg_pros=$ico_ok." <font color='#009900'>Data Telah Di Hapus</font>";		}
		else		{	$msg_pros=$ico_err." <font color='#FF0000'>Error, Data Gagal Di Hapus</font>";		}
		*/
	}
	else 	if ($_POST['actio']=='hapusone') {
		/*$qry = mysqli_query($con, "SELECT idf_pelanggan FROM t_pelanggan WHERE idf_pelanggan='".$_POST["pickone"]."' LIMIT 1");
		$dcst = mysqli_fetch_assoc($qry); 	*/			
		
		//----------
		$query="DELETE FROM t_pelanggan WHERE idf_pelanggan='".$_POST["pickone"]."' LIMIT 1"; 
		$result=mysqli_query($con, $query);//print $query;
		if($result)	{ $msg_pros="Data Telah Di Hapus"; $msg_p="ok";	
									
					 
			//----------
			$qry = mysqli_query($con, "SELECT nama_img, idf_img FROM t_img_data WHERE table_name='".$table_name."' 
				AND table_idf='".$_POST["pickone"]."' ");
			while ($dimg = mysqli_fetch_assoc($qry) ) {
				$path="../data/".$folder_name."/"; $fileimg=$dimg["nama_img"];
				if ( is_file($path.$fileimg) ) { unlink ($path.$fileimg);	}
				if ( is_file($path."thumbs/".$fileimg) ) {	unlink ($path."thumbs/".$fileimg);	}
				mysqli_query($con, "DELETE FROM t_img_data WHERE idf_img = '".$dimg["idf_img"]."' LIMIT 1 ");	
			}
			//----------- */			
					 

			$q = "UPDATE t_pelanggan SET idf_pelanggan_L2T2='' WHERE idf_pelanggan_L2T2='".$_POST["pickone"]."' LIMIT 1 ";
			mysqli_query($con, $q);
					 
			$loghis_act="Del (L2T2 - Kode:".$_POST["pickone"].")";  include("p_log.php");
		} else	{ $msg_pros="Data Gagal Di Hapus"; $msg_p="no"; }
	}
}

else if(isset($_POST["Mutasi_L2T3_ke_L2T2"])){  // asal di lay-lltt.php
	//echo "<br>".$_POST["pel_L2T3"];
		
	//--- cek dulu biar ga double---	
	$q =mysqli_query($con, "SELECT * FROM t_pelanggan WHERE idf_pelanggan ='".$_POST["pel_L2T3"]."' AND idf_pelanggan_L2T2='' LIMIT 1");
	while($dpel =mysqli_fetch_assoc($q)){

		$prefix="PEL".$th_00.$bl_00.$hr_00.$jm_00.$mn_00; $idf_pelanggan=newIDF("t_pelanggan","idf_pelanggan", $prefix, 5);
		$prefix="LLTT-";	$id_pelanggan=newIDF("t_pelanggan", "id_pelanggan", $prefix, 6);	

		/*/--- buat id pel ---		
		$des0 = "00"; $kec0 = "00";
		$q=mysqli_query($con, "SELECT * FROM t_desakel LEFT JOIN t_kec ON t_kec.idf_kec=t_desakel.idf_kec WHERE t_desakel.idf_desakel='".$_POST["idf_desakel"]."' LIMIT 1");
		while ($dd = mysqli_fetch_assoc($q))  { $des0=$dd["des_kode_sidoarjo"]; $kec0=$dd["kec_kode_sidoarjo"]; } 
		$prefix= $kec0.".".$des0.".";	$id_pelanggan=newIDF("t_pelanggan", "id_pelanggan", $prefix, 5) ;
		*/

		$q2 = " INSERT INTO t_pelanggan (idf_pelanggan, id_pelanggan, stat_pelanggan, tanggung_jawab, nik, jabatan, alamat, rt, rw, desa, kec, kode_pos, telp, email, jenis, penghuni, kepemilikan, kepemilikan_lain, air_bersih, no_pdam, listrik, tangki_septik, jum_kompartemen, posisi_septik, bahan_septik, pabrikasi, lubang_sedot, terakhir_sedot, priode_sedot, akses, septik_p, septik_l, septik_t, bundar_d, bundar_t, lat, lon, idf_desakel, veridata, tgl_sedot_jadwal, kode_qr_pel, septik_kapasitas) VALUES ('".$idf_pelanggan."', '".$id_pelanggan."', 'L2T2', '".$dpel["tanggung_jawab"]."', '".$dpel["nik"]."', '".$dpel["jabatan"]."', '".$dpel["alamat"]."', '".$dpel["rt"]."', '".$dpel["rw"]."', '".$dpel["desa"]."', '".$dpel["kec"]."', '".$dpel["kode_pos"]."', '".$dpel["telp"]."', '".$dpel["email"]."', '".$dpel["jenis"]."', '".$dpel["penghuni"]."', '".$dpel["kepemilikan"]."', '".$dpel["kepemilikan_lain"]."', '".$dpel["air_bersih"]."', '".$dpel["no_pdam"]."', '".$dpel["listrik"]."', '".$dpel["tangki_septik"]."', '".$dpel["jum_kompartemen"]."', '".$dpel["posisi_septik"]."', '".$dpel["bahan_septik"]."', '".$dpel["pabrikasi"]."', '".$dpel["lubang_sedot"]."', '".$dpel["terakhir_sedot"]."', '".$dpel["priode_sedot"]."', '".$dpel["akses"]."', '".$dpel["septik_p"]."', '".$dpel["septik_l"]."', '".$dpel["septik_t"]."', '".$dpel["bundar_d"]."', '".$dpel["bundar_t"]."', '".$dpel["lat"]."', '".$dpel["lon"]."', '".$dpel["idf_desakel"]."', '".$dpel["veridata"]."', '".$dpel["tgl_sedot_jadwal"]."', MD5('".$idf_pelanggan."'), '".$_POST["septik_kapasitas"]."' ) ";			

		$result=mysqli_query($con, $q2); //echo q2;		
		if($result)	{ 	$msg_pros = "Data Mutasi Telah Di Simpan"; $msg_p="ok"; 

			$loghis_act="Mutasi_L2T3_to_L2T2: ".$idf_pelanggan.")";  include("p_log.php");	
			
			mysqli_query($con, "UPDATE t_pelanggan SET idf_pelanggan_L2T2='".$idf_pelanggan."' WHERE idf_pelanggan='".$_POST["pel_L2T3"]."' LIMIT 1 ");

		}
		else		{	$msg_pros = "Data Gagal Di Simpan (<i>".mysqli_error($con)."</i>)"; $msg_p="no"; }
	}
	
		
	
}

if($layan=="okxxxxxx"){
	
	if(($terakhir_sedot != "0000-00-00") && ($terakhir_sedot != "--") ){
				
		$prefix="LY2".$th_00.$bl_00.$hr_00.$jm_00.$mn_00;	$newidf=newIDF("t_layanan", "idf_layanan", $prefix, 5);
		$prefix="LLTT".$th_00.$bl_00.$hr_00;	$newno=newIDF("t_layanan", "no_order", $prefix, 3);
		$rr=0;
		$ss=str_replace("-","",substr($terakhir_sedot, 0, 4));
		
		$qjum=mysqli_query($con, "SELECT * FROM t_layanan WHERE no_order LIKE 'LLTT".$ss."%' AND npal = '".$_POST["npa"]."'  ");
		$rr=0;
		while ($djum = mysqli_fetch_assoc($qjum))  {  $rr=1; }
		if($rr==0){
			$query="INSERT INTO t_layanan (idf_layanan, no_order, tgl_jadwal, idf_pelanggan, lat, lon, status_lay, npal, gol_pel, bayar, tgl_order) 
			VALUES( '".$newidf."','".$newno."', '', '".$newid_cst."', '".$_POST["lat"]."', '".$_POST["lon"]."', 'BELUM', '".$_POST["npa"]."', 'L2T2' , '1','".$terakhir_sedot."' ) ";
		mysqli_query($con, $query);
		$loghis_act="Tambah (Layanan L2T2 - Kode:".$newidf.")";  include("p_log.php");
		//===========================================
		/*$prefix="MON".$th_00.$bl_00.$hr_00.$jm_00.$mn_00;	$newidf_mon=newIDF("t_layanan", "idf_layanan", $prefix, 5);
		$query="INSERT INTO t_monitoring (idf_monitoring, idf_layanan, tgl_layanan, npal,mon_status) 
			VALUES( '".$newidf_mon."','".$newidf."', '".$terakhir_sedot."', '".$_POST["npal"]."', 'BELUM' ) ";
		mysqli_query($con, $query);
		$loghis_act="Tambah (Monitoring L2T2 - Kode:".$newidf_mon.")";  include("p_log.php");*/
		//============================================
		$query="UPDATE t_pelanggan SET stat_pelanggan='L2T2' WHERE npa='".$_POST["npa"]."' LIMIT 1  ";
		mysqli_query($con, $query);
		}
		
		
	}
	
}

/*---------------------------------------*/
$filter=" WHERE TPEL.stat_pelanggan = 'L2T2' "; //(t_pelanggan.stat_pelanggan='LLTT')
include("p_ace-filteract.php");


//--- FILTER KOTA ----- //P20160723032 -> prov jabar
// K20160723164 -> Kab. Tasikmalaya
// K20160723184 -> Kota Tasikmalaya
// K20160723165 -> Kab. Ciamis
$filt_kota="K20160723184"; 
$qq=mysqli_query($con,"SELECT idf_kotakab, nm_kota FROM t_kotakab WHERE idf_prov='P20160723032' AND (idf_kotakab='K20160723164' OR idf_kotakab='K20160723184' OR idf_kotakab='K20160723165') ORDER BY nm_kota ASC ");
$i=0; while	($dlist=mysqli_fetch_assoc($qq)){
	//if($i==0){	$filt_kota00=$dlist["idf_kotakab"];	}
	$arr_fil_kotakd[$i] = $dlist["idf_kotakab"];
	$arr_fil_kota[$i] = $dlist["nm_kota"];
	$i++;
} $jumarr_fil_kota=$i;
if(!isset($_GET["filt_kota"]) && !isset($_SESSION[$act]["filt_kota"])) { /*$filt_kota=$filt_kota00;*/ }
else {
	if (isset($_GET["filt_kota"])) { $_SESSION[$act]["filt_kota"]=$_GET["filt_kota"]; }
	if (isset($_SESSION[$act]["filt_kota"])) 	{ 
		/*/ cek data ini dah hapus to ga ---
		$q = "SELECT kode_program FROM t_program WHERE kode_program ='".$_SESSION[$act]["filt_kota"]."' LIMIT 1 ";
		$qq = mysqli_query($con, $q);
		$ada=0; while ($dqq =  mysqli_fetch_assoc($qq) ) { $ada=1; }
		if($ada==0){ $_SESSION[$act]["filt_kota"]=$filt_kota00; }
		//--- */
		$filt_kota=$_SESSION[$act]["filt_kota"]; 
	}
}
if($filt_kota!="All") { $filter .= " AND t_desakel.idf_kotakab = '".$filt_kota."' "; }


//--- FILTER KEC ----- //K20160723240 -> kab sidoarjo
$filt_kec="All"; 
$qq=mysqli_query($con,"SELECT idf_kec, nm_kec FROM t_kec WHERE idf_kotakab='".$filt_kota."' ORDER BY nm_kec ASC ");
$i=0; while	($dlist=mysqli_fetch_assoc($qq)){
	if($i==0){	$filt_kec00=$dlist["idf_kec"];	}
	$arr_fil_keckd[$i] = $dlist["idf_kec"];
	$arr_fil_kec[$i] = $dlist["nm_kec"];	
	$i++;
} $jumarr_fil_kec=$i;
if(!isset($_GET["filt_kec"]) && !isset($_SESSION[$act]["filt_kec"])) { /*$filt_kec=$filt_kec00;*/  }
else {
	if (isset($_GET["filt_kec"])) { $_SESSION[$act]["filt_kec"]=$_GET["filt_kec"]; }
	if (isset($_SESSION[$act]["filt_kec"])) 	{ 
		/*/ cek data ini dah hapus to ga ---
		$q = "SELECT kode_program FROM t_program WHERE kode_program ='".$_SESSION[$act]["filt_kec"]."' LIMIT 1 ";
		$qq = mysqli_query($con, $q);
		$ada=0; while ($dqq =  mysqli_fetch_assoc($qq) ) { $ada=1; }
		if($ada==0){ $_SESSION[$act]["filt_kec"]=$filt_kec00; }
		//--- */
		$filt_kec=$_SESSION[$act]["filt_kec"]; 
	}
}
if($filt_kec!="All") { $filter .= " AND t_desakel.idf_kec = '".$filt_kec."' "; }


//--- FILTER DESA -----
$filt_desa="All";
if (isset($_GET["filt_desa"])) { if($_GET["filt_desa"]=="") $_GET["filt_desa"]=$filt_desa; }

$qq=mysqli_query($con,"SELECT idf_desakel, nm_desakel FROM t_desakel WHERE idf_kec='".$filt_kec."' ORDER BY nm_desakel ASC ");
$i=0; while	($dlist=mysqli_fetch_assoc($qq)){
	if($i==0){	$filt_desa00=$dlist["idf_desakel"];	}
	$arr_fil_desakd[$i] = $dlist["idf_desakel"];
	$arr_fil_desa[$i] = $dlist["nm_desakel"];	
	$i++;
} $jumarr_fil_desa=$i;
if(!isset($_GET["filt_desa"]) && !isset($_SESSION[$act]["filt_desa"])) { /*$filt_desa=$filt_desa00;*/ }
else {
	if (isset($_GET["filt_desa"])) { $_SESSION[$act]["filt_desa"]=$_GET["filt_desa"]; }
	if (isset($_SESSION[$act]["filt_desa"])) 	{ 
		/*/ cek data ini dah hapus to ga ---
		$q = "SELECT kode_program FROM t_program WHERE kode_program ='".$_SESSION[$act]["filt_desa"]."' LIMIT 1 ";
		$qq = mysqli_query($con, $q);
		$ada=0; while ($dqq =  mysqli_fetch_assoc($qq) ) { $ada=1; }
		if($ada==0){ $_SESSION[$act]["filt_desa"]=$filt_desa00; }
		//--- */
		$filt_desa=$_SESSION[$act]["filt_desa"]; 
	}
}
if($filt_desa!="All") { $filter .= " AND TPEL.idf_desakel = '".$filt_desa."' "; }


/*---------------------------------------*/
if (isset($_GET["kcari"])) {
	$kcari=$_GET["kcari"]; $kcari2=$_GET["kcari2"];
	if ($kcari=="TPEL.tgl_sedot"){	if(substr($kcari2,2,1)=="-"){ 
		$kcari2=substr($kcari2,6,4)."-".substr($kcari2,3,2)."-".substr($kcari2,0,2); }}
	if ($kcari2<>"") { 	$filter=$filter." AND (".$kcari." like '%$kcari2%') ";	}
}else {$kcari2=""; $kcari="";}
/*---------------------------------------*/
$qry = " FROM t_pelanggan AS TPEL
	LEFT JOIN t_tarif ON TPEL.jenis=t_tarif.kode ";

if($filt_kec!="All" || $filt_kota!="All"){ $qry .= " LEFT JOIN t_desakel ON t_desakel.idf_desakel=TPEL.idf_desakel "; }  
// jdi lebih cepat klo dipisah gini

	// LEFT JOIN t_desakel ON t_desakel.idf_desakel=TPEL.idf_desakel
	// LEFT JOIN t_kec ON t_kec.idf_kec=t_desakel.idf_kec
	// LEFT JOIN t_kotakab ON t_kotakab.idf_kotakab=t_desakel.idf_kotakab

$qcount="SELECT COUNT(*) ".$qry.$filter ; 
include("p_pages01.php");
//---
$sort_cst = " TPEL.idf_pelanggan";	$sort2_cst = "DESC";	include("p_sort00.php");

$qq = "SELECT *, t_tarif.jenis as jepel ".$qry.$filter.$orderq." LIMIT $awal, $page_size ";
$query2=mysqli_query($con, $qq); //print  $qq;
/*---------------------------------------*/

$href01="index.php?act=".$act; $goto1="<a href='".$href01."&kcari=".$kcari."&kcari2=".$kcari2."&page=";

//========================================


/*
<div id="up_data" ><img src="../img/load.gif" width="70px" style="display: none" id="loading"></div>
<div id="up_status" ><img src="../img/load.gif" width="70px" style="display: none" id="loading2"></div>
*/	?>
<div class="row">
	<div class="col-xs-12">	
		<span style="float:right; padding-right:10px;">
		
			
			<a href="index.php?act=<?php echo $act; ?>_f" role="button" title="TAMBAH" class="btn btn-white btn-info btn-bold tooltip001" style="padding:5px; height:44px"><i class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i><span class="h6" ><br />Tambah</span></a>
			
			<a href="#modal-form" role="button" class="btn btn-white btn-info btn-bold tooltip001" style="padding:5px; height:44px" data-toggle="modal" title="FILTER &amp; SEARCH"><i class="ace-icon fa fa-search bigger-125 orange"></i><span class="h6" ><br />Filter</span>			</a>
			<?php if(isset($_SESSION[$act]["FILTER_ACT"])) { ?>
			<div class="action-buttons" style="float:right">				
					<a href="index.php?act=<?php echo $act;?>&resetfilter=1" title="RESET FILTER" class="tooltip001">
						<i class="ace-icon fa fa-refresh green bigger-130"></i></a>			
				
			</div>
			<?php } ?>	
			
			
			<a href="#!" onClick="vol01('xcl')" role="button" title="EXPORT" class="btn btn-white btn-info btn-bold tooltip001" style="padding:5px; height:44px; margin-left:15px;"><i class="ace-icon fa fa-file-excel-o bigger-125 green"></i><span class="h6" ><br />Export</span></a>
			
		</span>						

		<h3 class="header smaller lighter blue"><i class="ace-icon fa fa-users smaller-100"></i> DATA PELANGGAN L2T2 </h3>
		
		<?php include("p_ace-msgses2.php");	?>
		
		<div style="float:left; border:#999999 dashed 1px; padding:10px; width:100%;" >
			<form name="formfil" id="formfil" method="get" action="index.php" >	
				
					
				<div class="col-sm-1" style="float:left; padding-top:7px">Kota/Kab. </div>
				<div class="col-sm-3">						
					<select id="filt_kota" name="filt_kota" class="form-control" required onChange="loadKec()" >
						<?php //<option value='All' >- Pilih -</option>
						$i=0; while	($i<$jumarr_fil_kota){ $selc="";
							$kd = $arr_fil_kotakd[$i];
				 			if($filt_kota!=""){ if($kd==$filt_kota) $selc=" selected "; }	
							echo "<option value='".$kd."' ".$selc.">".$arr_fil_kota[$i]."</option>";
							$i++;
						}							
						$selc=""; if($filt_kota=="All") $selc=" selected ";
						echo "<option value='All' ".$selc.">- SEMUA -</option>";?>										
					</select>
				</div>
				
				
				<div class="col-sm-1" style="float:left; padding-top:7px">Kecamatan </div>
				<div class="col-sm-3">						
					<select id="filt_kec" name="filt_kec" class="form-control" required onChange="loadDesa()" >
						<?php //<option value='All' >- Pilih -</option>
						$i=0; while	($i<$jumarr_fil_kec){ $selc="";
							$kd = $arr_fil_keckd[$i];
				 			if($filt_kec!=""){ if($kd==$filt_kec) $selc=" selected "; }	
							echo "<option value='".$kd."' ".$selc.">".$arr_fil_kec[$i]."</option>";
							$i++;
						}							
						$selc=""; if($filt_kec=="All") $selc=" selected ";
						echo "<option value='All' ".$selc.">- SEMUA -</option>";?>										
					</select>
					<img id="loader_kec" src="../img/loading.gif" style="position:absolute; top:6px; left:111px; display: none;">
				</div>
				
				<div class="col-sm-1" style="float:left; padding-top:7px">Desa/Kel. </div>
				<div class="col-sm-3">						
					<select id="filt_desa" name="filt_desa" class="form-control" onChange="submFilt()" >	
						<option value='All' >- Pilih -</option>
						<?php
						$i=0; while	($i<$jumarr_fil_desa){ $selc="";
							$kd = $arr_fil_desakd[$i];
				 			if($filt_desa!=""){ if($kd==$filt_desa) $selc=" selected "; }	
							echo "<option value='".$kd."' ".$selc.">".$arr_fil_desa[$i]."</option>";
							$i++;
						}							
						$selc=""; if($filt_desa=="All") $selc=" selected ";
						echo "<option value='All' ".$selc.">- SEMUA -</option>";?>										
					</select>
					<img id="loader_desa" src="../img/loading.gif" style="position:absolute; top:6px; left:111px; display: none;">
				</div>	
						
																													  	
				<input type="submit" id="filt_btn" name="flt_time" value="Go" class="btn btn-info"  STYLE=" margin-left:7px;float:left;width:50px; height:30px; padding:3px; display: none" >
               				
				<input name="act" type="hidden" value="<?php echo $act;?>"  />                 
			</form>            			
			
		</div>		
		<div style="clear: both; height: 10px"></div>
		
		
		
		<form name="frm01" id="frm01" action="index.php" method="post">
		<div class="col-xs-12" style="overflow-x: auto;">
		<table id="simple-table" class="table  table-bordered table-hover" width="100%">
			<thead >
				<tr class="tblhead">
					<th class="tblhead">&nbsp;</th>								
					<th class="tblhead" width="3%" >NO</th>
					<th class="tblhead" >ID&nbsp;PELANGGAN</th>
					<th class="tblhead" >PENANGGUNG JAWAB</th>
					<th class="tblhead" width="39%" >ALAMAT </th>
                    <th class="tblhead" width="9%" >JENIS</th>
					<th class="tblhead" width="10%" >TLP</th>
			        <th class="tblhead" width="10%" >PENYEDOTAN<br>TERAKHIR</th>
				</tr>
			</thead>

			<tbody>
				<?php $bt_edt=1; $bt_del=1;  $bt_data_v2=1;  //  $bt_print=1; $bt_pdf=1;$bt_data=1;
				$i=0;  while($data=mysqli_fetch_assoc($query2))	{ $i++; 
																 
		/*$prefix="CST".$th_00.$bl_00.$hr_00.$jm_00.$mn_00;	$newid_cst=newIDF("t_pelanggan", "idf_pelanggan", $prefix, 5);		$query="UPDATE t_pelanggan SET idf_pelanggan='".$newid_cst."' WHERE id='".$data["id"]."' ";
		mysqli_query($con, $query);			*/							 
				
						
					$alamat = $data["alamat"];	
					if($data["idf_desakel"]!=""){
						$qq = "SELECT t_desakel.nm_desakel, t_kec.nm_kec , t_kotakab.nm_kota FROM t_desakel				
						LEFT JOIN t_kec ON t_kec.idf_kec=t_desakel.idf_kec
						LEFT JOIN t_kotakab ON t_kotakab.idf_kotakab=t_desakel.idf_kotakab
						WHERE t_desakel.idf_desakel='".$data["idf_desakel"]."' LIMIT 1 ";
						$qqq=mysqli_query($con, $qq);
						while($dalm=mysqli_fetch_assoc($qqq)){
							$alamat .= ", ".$dalm["nm_desakel"].", ".$dalm["nm_kec"].", ".$dalm["nm_kota"];
						}
					}																 					
						
										
				?>
				<tr>
					<td width="5%" nowrap class="action-buttons" style="border-right:none; padding-right:0px">
						
	<?php	$cekedt=0 ; $cekdel=0 ;  $cekimg=0; //$cekprint=0 ; 
																	 													 
	$q = "SELECT COUNT(*) FROM t_img_data WHERE table_name='".$table_name."' AND table_idf='".$data['idf_pelanggan']."' ";
	$qjum=mysqli_query($con, $q);	//echo $sql;	
	$djum = mysqli_fetch_array($qjum); $jdata=$djum[0]; //echo $jdata;	
																 
	$qjum=mysqli_query($con, "SELECT * FROM t_penyedotan WHERE idf_pelanggan='".$data["idf_pelanggan"]."'  LIMIT 1");
	while ($djum = mysqli_fetch_assoc($qjum))  { $cekdel= 1 ; $ket2="( Layanan)";} 
						
	$idf=$data["idf_pelanggan"]; $idf0=$data["idf_pelanggan"]; $idf_ttl=$data["tanggung_jawab"];
	include("p_ace-edtdel-v2.php"); ?>	
										                
	<div class="btn-group tooltip001" title="Print" style="margin-top:-5px">	
		<a href="#!" class="bigger-140 tooltip001 dropdown-toggle" data-toggle="dropdown" title="Print"><i class="ace-icon fa fa-print red"></i><span class="sr-only"></span></a>					    
		<ul class="dropdown-menu">		  
		  <li><a href="#!" onClick="<?php echo "goprint('".$idf."','".$idf_ttl."', '')"; ?>"> <i class="ace-icon fa fa-print blue icon-on-left"></i> Print Stiker</a> </li>
		  <li><a href="#!" onClick="<?php echo "goprint_new('".$idf."','".$idf_ttl."', '')"; ?>"> <i class="ace-icon fa fa-print red icon-on-left"></i> Print Stiker v2</a> </li>
		</ul>
	</div>
						
	<a href="#!" onclick="showdet_v2('<?php echo $i;?>', '<?php echo $idf;?>', '<?php echo $act."_det2";?>')" class="green bigger-140 show-details-btn tooltip001" title="Show Details"><i class="ace-icon fa fa-angle-double-down" id="det-cls-<?php echo $i;?>"></i><span class="sr-only"></span></a>
					  
	<?php /*?><a href="index.php?act=track&idpel=<?php echo $data["idf_pelanggan"]; ?>" title="Peta" ><img src="img/gmaps.gif" height="16px" ></a>
    <a href="#" onClick="goprint('<?php echo $data["idf_pelanggan"]; ?>','<?php echo $data["idf_pelanggan"]; ?>');">
		<img src="img/print.gif" height="18px" ></a>
	<a href="index.php?act=kartu&idpel=<?php echo $data["idf_pelanggan"]; ?>" title="Kartu Pelanggan" ><img src="img/card.gif" height="16px" ></a><?php */?>
					  		
				    </td>			

					<td><?php echo ($awal+$i);?></td>
					<td><?php echo $data["id_pelanggan"];?></td>
					<td><?php echo $data["tanggung_jawab"];?></td>
					<td><?php echo $alamat;?></td>
					<td><?php echo $data["jepel"];?></td>
					<td><?php echo $data["telp"];?></td>
					<td><?php $a=$data["terakhir_sedot"]; if($a=="0000-00-00"){ $a="-"; } else { $a=formatTgl($a);} echo $a; ?></td>
				    
				</tr>				
				
				<tr class="detail-row" id="detail_<?php echo $i; ?>">
					<td colspan="8">
						<input type="hidden" id="det_stat_<?php echo $i; ?>" value="0" />
						<input type="hidden" id="det_isi_<?php echo $i; ?>" value="0" />
						<div class="table-detail" id="detailisi_<?php echo $i; ?>"></div>					
					</td>
				</tr>
								
				<?php } $i2=$i; while($i2<5) { $i2++; 	?>
				<tr>
				  <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
				  <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
				  <td>&nbsp;</td><td>&nbsp;</td>
				
				
				</tr> <?php }  	 $jumno=$i; ?>
	
				<tr>
					<td colspan="13" style="background-color: #DBEAE7">
					
					<div class="action-buttons"><?php /*
						<a href="index.php?act=<?php echo $act; ?>_f" title="TAMBAH" class="tooltip001" >
							<i class="ace-icon fa fa-plus-circle purple bigger-130"></i></a>						
						<a href="#modal-form" role="button" class="blue tooltip001" title="FILTER & SEARCH" data-toggle="modal">
							<i class="ace-icon fa fa-search orange bigger-130"></i></a>		*/?>								
						<?php if(isset($_SESSION[$act]["FILTER_ACT"])) { ?>
							<a href="index.php?act=<?php echo $act;?>&resetfilter=1" title="RESET FILTER" class="tooltip001">
								<i class="ace-icon fa fa-refresh green bigger-130"></i></a>			
						<?php } else { ?>
							<a href="#" title="RESET FILTER" class="tooltip001">
								<i class="ace-icon fa fa-refresh btn-light bigger-130"></i></a>			
						<?php } ?>			
					</div>					
										
					<center><?php include ("p_pages02_v2.php"); ?></center><br /> 
<input type="hidden" name="pickone" id="pickone">	<input type="hidden" name="actio" id="actio" >
<input type="hidden" name="cbchk" id="cbchk" >		<input type="hidden" name="act" id="act" value="<?php echo $act;?>">					</td>
				</tr>
			</tbody>
		</table>
        <br /> 
<!--<small><i>* 11-22-33-4444 &nbsp; ( 11=KSM , 22=Kec , 33=Kel , 4444=Nomor )</i></small>-->
		</div>
		</form>
	</div><!-- /.span -->
</div><!-- /.row -->



<?php $in_page_filter=1; 
		$arr_fil_field=array("ID Pelanggan", "Nama", "Alamat", "Telepon"); 
		$arr_fil_field2=array("TPEL.id_pelanggan", "TPEL.tanggung_jawab", "TPEL.alamat", "TPEL.telp");
		$arr_fil_field_jum=4;

$in_page_script=$act."_js.php";
//$datepicker=1;
?>