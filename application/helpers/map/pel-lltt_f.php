<?php $_SESSION["submit"]=true;	$jform = "input" ;
//====================

$isFromVerMob="";
$verMob_idfmob="";

/*------*/
if (isset($_POST["actio"])) {
	if ($_POST['actio']=='edit') { 
		$jform = "edit" ; $idedit=$_POST["pickone"];
		$q = "SELECT * FROM t_pelanggan WHERE idf_pelanggan ='".$idedit."' ";
		$query=mysqli_query($con, $q);
		$data=mysqli_fetch_assoc($query);				
	}
}
else if (isset($_POST["ver_mob"])) { 	
	
	$verMob_idfmob=$_POST["idf_mob_daft"];	
	$isFromVerMob="DaftarBaru";
		
	$q_mob="SELECT * FROM t_mobile_daftar WHERE idf_mob_daft='".$_POST["idf_mob_daft"]."' LIMIT 1 " ;
	$d_mob=mysqli_fetch_assoc(mysqli_query($con, $q_mob));	 	
}
//print_r($_POST);

/*LEFT JOIN t_prov ON t_prov.idf_prov=t_pelanggan.idf_prov
									LEFT JOIN t_kotakab ON t_kotakab.idf_kotakab=t_pelanggan.idf_kotakab
									LEFT JOIN t_kec ON t_kec.idf_kec=t_pelanggan.idf_kec
									LEFT JOIN t_desakel ON t_desakel.idf_desakel=t_pelanggan.idf_desakel, t_prov.nm_prov, t_kotakab.nm_kota, t_kec.nm_kec , t_desakel.nm_desakel */


/*-----------------------------------*/?>

<div class="row">
	<div class="col-xs-12">							
		<h3 class="header smaller lighter blue"><i class="ace-icon fa fa-users smaller-100"></i> DATA PELANGGAN L2T2 &nbsp; <small class="blue">[ Form <?php echo $jform;?> ]</small></h3>
								
			<form id="frmSav" class="form-horizontal" role="form" method="post" action="index.php" onSubmit="return subm_form()">
				
				<input type="hidden" id="isFromVerMob" name="isFromVerMob" value="<?php echo $isFromVerMob;?>">
				<input type="hidden" name="verMob_idfmob" value="<?php echo $verMob_idfmob; ?>" />
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> ID Pelanggan  </label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="id_pelanggan" id="id_pelanggan" value="<?php if($jform=="edit") echo $data["id_pelanggan"]; ?>" readonly />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Nama Kepala Keluarga / Penanggung jawab (untuk perusahaan)  </label>
					<div class="col-sm-4">						
						<input class="form-control" type="text" name="tanggung_jawab" id="tanggung_jawab" value="<?php if($jform=="edit") echo $data["tanggung_jawab"]; ?>"  required   />
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> NIK  </label>
					<div class="col-sm-4">
						<input class="form-control"  type="text" name="nik" value="<?php if($jform=="edit") echo $data["nik"]; ?>" required  />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Pekerjaan / Jabatan  </label>
					<div class="col-sm-4">
						<input class="form-control"  type="text" name="jabatan" value="<?php if($jform=="edit") echo $data["jabatan"]; ?>" required  />
					</div>
				</div>
				
                <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Alamat  </label>
					<div class="col-sm-4">
						<input class="form-control" maxlength="100" type="text" name="alamat" id="alamat" value="<?php if($jform=="edit") echo $data["alamat"]; ?>" required  />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Kode Pos  </label>
					<div class="col-sm-2">
						<input class="form-control"  type="text" name="kode_pos" id="kode_pos" value="<?php if($jform=="edit") echo $data["kode_pos"]; ?>" maxlength="7"   />
					</div>
				</div>
				
                
				<?php //if($jform=="edit"){ if($data["kabu"] != ""){ $ds1="display:none;"; }} ?>
                <div class="form-group" style="<?php //print $ds1; ?>">
					<label class="col-sm-3 control-label no-padding-right">   </label>
					<div class="col-sm-4">
						<input name="tujuan" id="tujuan" type="text" class="form-control"  style=" float:left; width:200px;" onkeyup="doPosKwi(this.id, this.value, 't1');" autocomplete="off" />
						<img src="img/cari.gif" style="float:left;"><input type="hidden" id="tujuann" value="" />		
					</div>
				</div>
				
				<?php if($jform=="edit"){ 
				$q = "SELECT * FROM t_desakel 
				LEFT JOIN t_kec ON t_kec.idf_kec=t_desakel.idf_kec 
				LEFT JOIN t_kotakab ON t_kotakab.idf_kotakab=t_desakel.idf_kotakab 
				LEFT JOIN t_prov ON t_prov.idf_prov=t_desakel.idf_prov 
				WHERE t_desakel.idf_desakel ='".$data["idf_desakel"]."' LIMIT 1 ";
				$qq=mysqli_query($con, $q);
				$dalm=mysqli_fetch_assoc($qq);
				} ?>
                <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">   </label>
					<div class="col-sm-8">
						<span style="float:left; margin-top:5px; width:80px;">DESA/KEL &nbsp; </span>
			  <input class="form-control" style="width:250px; float:left; background-color:#E0E0E0;" type="text" name="kelu" id="kelu" value="<?php if($jform=="edit") echo $dalm["nm_desakel"]; ?>" required readonly >
			   <span style="float:left; margin-top:5px; width:70px;">&nbsp; KEC &nbsp;</span>
	    <input class="form-control" style="width:200px; float:left; background-color:#E0E0E0;" type="text" name="keca" id="keca" value="<?php if($jform=="edit") echo $dalm["nm_kec"]; ?>" required readonly >
					</div>
				</div>
                <div class="form-group" style="clear: both">
					<label class="col-sm-3 control-label no-padding-right">  </label>
					<div class="col-sm-8">
						<span style="float:left; margin-top:5px; width:80px;">KOTA/KAB &nbsp; </span>
			  <input class="form-control" style="width:250px; float:left; background-color:#E0E0E0;" type="text" name="kabu" id="kabu" value="<?php if($jform=="edit") echo $dalm["nm_kota"]; ?>" required readonly >
			   <span style="float:left; margin-top:5px; width:70px;">&nbsp; PROV &nbsp;</span>
	    <input class="form-control" style="width:200px; float:left; background-color:#E0E0E0;" type="text" name="prov" id="prov" value="JAWA BARAT" required readonly >
					</div>
				</div>
				<input type="hidden" id="idf_desakel" name="idf_desakel" value="<?php if($jform=="edit") echo $dalm["idf_desakel"]; ?>">
                
                <div class="form-group" style="clear: both">
					<label class="col-sm-3 control-label no-padding-right"> Nomor Telepon /Fax  </label>
					<div class="col-sm-4">
						<input class="form-control"  type="text" name="telp" value="<?php if($jform=="edit") echo $data["telp"]; ?>" required>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Email  </label>
					<div class="col-sm-4">
						<input class="form-control"  type="text" name="email" value="<?php if($jform=="edit") echo $data["email"]; ?>" >
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Jenis Bangunan  </label>
					<div class="col-sm-4">
						<select name="jenis" id="jenis" class="form-control" style="width:50%;" required <?php  if($jform=="edit"){if($data["jenis"]!=""){ print "readonly";}}  ?> >
						  <option value=""> <i>- pilih -</i> </option>
						<?php $query=mysqli_query($con, "select * from t_tarif ORDER BY jenis ");
						$i=0; while ($djns=mysqli_fetch_assoc($query)){
							$selc="";
							if($jform=="edit"){ if($djns["kode"]== $data["jenis"]) $selc=" selected"; }
							else { if($i==0){ $selc=" selected"; } }
							echo "<option value='".$djns["kode"]."' ".$selc.">".$djns["jenis"]."</option>";
							$i++;
						} 
						?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Jumlah Penghuni  </label>
					<div class="col-sm-2">
						<input class="form-control"  type="text" name="penghuni" value="<?php if($jform=="edit") echo $data["penghuni"]; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" > Kepemilikan Rumah </label>
					<div class="col-sm-2">
					  <select id="kepemilikan" name="kepemilikan" class="form-control jaba" required onChange="isiLainnya(this.id, 'pemilik_lain', 'Lainnya')" >
                        <option value="" >- Pilih -</option>
                        <?php 
						$arrper=array("Milik Pribadi", "Sewa/Kontrak", "Dinas", "Lainnya"); //$arrper2=array("L", "P");
						$i=0; while	($i < 4){ 			$selc="";
						if($jform=="edit"){ if ($data["kepemilikan"]==$arrper[$i]) $selc=" selected "; }
						else { if($i==0) $selc=" selected "; }
						echo "<option value='".$arrper[$i]."' ".$selc.">".$arrper[$i]."</option>";
						$i++;}		?>
                      </select>
					</div>
					
					<div class="col-sm-1 pemilik_lain">, sebutkan</div>
					<div class="col-sm-5 pemilik_lain">												
						<input class="form-control"  type="text" name="kepemilikan_lain" value="<?php if($jform=="edit") echo $data["kepemilikan_lain"]; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" > Akses Air Bersih </label>
					<div class="col-sm-2">
					  <select id="air_bersih" name="air_bersih" class="form-control jaba" required onChange="isiLainnya(this.id, 'pdam_lain', 'PDAM')">
                        <option value="" >- Pilih -</option>
                        <?php 
						$arrper=array("Sumur", "PDAM", "Sumur dan PDAM", "Air Tangki"); //$arrper2=array("L", "P");
						$i=0; while	($i < 4){ 			$selc="";
						if($jform=="edit"){ if ($data["air_bersih"]==$arrper[$i]) $selc=" selected "; }
						else { if($i==0) $selc=" selected "; }
						echo "<option value='".$arrper[$i]."' ".$selc.">".$arrper[$i]."</option>";
						$i++;}		?>
                      </select>
					</div>
					<div class="col-sm-2 pdam_lain">, No Pelanggan PDAM</div>
					<div class="col-sm-3">
						<input class="form-control pdam_lain"  type="text" name="no_pdam" value="<?php if($jform=="edit") echo $data["no_pdam"]; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" > Daya Listrik </label>
					<div class="col-sm-2">
					  <select id="listrik" name="listrik" class="form-control jaba" required >
                        <option value="" >- Pilih -</option>
                        <?php $arrper=array("450 watt", "900 watt", "1300 watt", ">1300 watt"); //$arrper2=array("L", "P");
						$i=0; while	($i < 4){ 			$selc="";
						if($jform=="edit"){ if ($data["listrik"]==$arrper[$i]) $selc=" selected "; }
						else { if($i==0) $selc=" selected "; }
						echo "<option value='".$arrper[$i]."' ".$selc.">".$arrper[$i]."</option>";
						$i++;}		?>
                      </select>
					</div>
					
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" > Jumlah Tangki Septik </label>
					<div class="col-sm-1">
					  <select id="tangki_septik" name="tangki_septik" class="form-control jaba" required >
                        <option value="" >- Pilih -</option>
                        <?php $arrper=array("1", "2", "3", "4", "5"); 
						$i=0; while	($i < 5){ 			$selc="";
						if($jform=="edit"){ if ($data["tangki_septik"]==$arrper[$i]) $selc=" selected "; }
						else { if($i==0) $selc=" selected "; }
						echo "<option value='".$arrper[$i]."' ".$selc.">".$arrper[$i]."</option>";
						$i++;}		?>
                      </select>
					</div>
					<div class="col-sm-2 ">, Jumlah Kompartemen</div>
					<div class="col-sm-1">
						<input class="form-control "  type="text" name="jum_kompartemen" value="<?php if($jform=="edit") echo $data["jum_kompartemen"]; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" > Posisi Tangki Septik </label>
					<div class="col-sm-3">
					  <select id="posisi_septik" name="posisi_septik" class="form-control jaba" required >
                        <option value="" >- Pilih -</option>
                        <?php $arrper=array("Luar Bangunan Rumah", "Dalam Bangunan Rumah"); 
						$i=0; while	($i < 2){ 			$selc="";
						if($jform=="edit"){ if ($data["posisi_septik"]==$arrper[$i]) $selc=" selected "; }
						else { if($i==0) $selc=" selected "; }
						echo "<option value='".$arrper[$i]."' ".$selc.">".$arrper[$i]."</option>";
						$i++;}		?>
                      </select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" > Bahan Material Tangki Septik </label>
					<div class="col-sm-3">
					  <select id="bahan_septik" name="bahan_septik" class="form-control jaba" required  onChange="isiLainnya(this.id, 'bahan_lain', 'Pabrikasi')">
                        <option value="" >- Pilih -</option>
                        <?php $arrper=array("Cor Beton, Kedap", "Cor Beton, Rembes", "Pasangan Bata, Kedap", "Pasangan Bata, Rembes", "Buis Beton, Kedap", "Buis Beton, Rembes", "Pabrikasi"); 
						$i=0; while	($i < 7){ 			$selc="";
						if($jform=="edit"){ if ($data["bahan_septik"]==$arrper[$i]) $selc=" selected "; }
						else { if($i==0) $selc=" selected "; }
						echo "<option value='".$arrper[$i]."' ".$selc.">".$arrper[$i]."</option>";
						$i++;}		?>
                      </select>
					</div>
					<div class="col-sm-1 bahan_lain">, sebutkan</div>
					<div class="col-sm-3">
						<input class="form-control bahan_lain"  type="text" name="pabrikasi" value="<?php if($jform=="edit") echo $data["pabrikasi"]; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" > Lubang Akses Sedot </label>
					<div class="col-sm-2">
					  <select id="lubang_sedot" name="lubang_sedot" class="form-control jaba" required >
                        <option value="" >- Pilih -</option>
                        <?php $arrper=array("Ada", "Tidak Ada"); $arrper2=array("L", "P");
						$i=0; while	($i < 2){ 			$selc="";
						if($jform=="edit"){ if ($data["lubang_sedot"]==$arrper[$i]) $selc=" selected "; }
						else { if($i==0) $selc=" selected "; }
						echo "<option value='".$arrper[$i]."' ".$selc.">".$arrper[$i]."</option>";
						$i++;}		?>
                      </select>
					</div>
				</div>
				
                <div class="form-group" >
					<label class="col-sm-3 control-label no-padding-right"> Terakhir Penyedotan  </label>
					<div class="col-sm-2">
							<div class="input-group">
									<input class="form-control date-picker" name="terakhir_sedot" id="terakhir_sedot" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" value="<?php if($jform=="edit") { print formatTgl($data["terakhir_sedot"]);} ?>" autocomplete="off"/>
									<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Periode Penyedotan yang diinginkan </label>
					<div class="col-sm-1">
						<input class="form-control"  type="text" name="priode_sedot" value="<?php if($jform=="edit") echo $data["priode_sedot"]; ?>" >
					</div> Kali / 3 Tahun					
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Jarak ke Jalan Akses  </label>
					<div class="col-sm-1">
						<input class="form-control"  type="text" name="akses" id="akses" value="<?php if($jform=="edit") echo $data["akses"]; ?>" onKeyUp="isFloat0(this.id)" maxlength="5" />
					</div> meter
				</div>
								
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Kapasitas Tangki Septik  </label>
					<div class="col-sm-1">
						<input class="form-control" type="text" name="septik_kapasitas" id="septik_kapasitas" value="<?php if($jform=="edit") echo $data["septik_kapasitas"]; ?>" onKeyUp="isFloat0(this.id)" maxlength="5"   />
					</div> m<sup>3</sup> (kubik)
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Dimensi Tangki Septik (meter) </label>
					<div class="col-sm-2"> &nbsp;&nbsp;&nbsp;Persegi Panjang</div>
					<label class="col-sm-1 control-label no-padding-right"> P:  </label>
					<div class="col-sm-1">
						<input class="form-control"  type="text" name="septik_p" id="septik_p" value="<?php if($jform=="edit") echo $data["septik_p"]; ?>"   />
					</div>
					<label class="col-sm-1 control-label no-padding-right"> L:  </label>
					<div class="col-sm-1">
						<input class="form-control"  type="text" name="septik_l" id="septik_l" value="<?php if($jform=="edit") echo $data["septik_l"]; ?>"   />
					</div>
					<label class="col-sm-1 control-label no-padding-right"> T:  </label>
					<div class="col-sm-1">
						<input class="form-control"  type="text" name="septik_t" id="septik_t" value="<?php if($jform=="edit") echo $data["septik_t"]; ?>"   />
					</div>
					<div style="clear: both; height: 5px"></div>
					<label class="col-sm-3 control-label no-padding-right">  </label>
					<div class="col-sm-2"> &nbsp;&nbsp;&nbsp;Bundar</div>
					<label class="col-sm-1 control-label no-padding-right"> Diameter:  </label>
					<div class="col-sm-1">
						<input class="form-control"  type="text" name="bundar_d" id="bundar_d" value="<?php if($jform=="edit") echo $data["bundar_d"]; ?>"   />
					</div>					
					<label class="col-sm-1 control-label no-padding-right"> T:  </label>
					<div class="col-sm-1">
						<input class="form-control"  type="text" name="bundar_t" id="bundar_t" value="<?php if($jform=="edit") echo $data["bundar_t"]; ?>"   />
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Koordinat </label>
					<label class="col-sm-1 control-label no-padding-right"> Lat. </label>
					<div class="col-sm-2">
						<input type="text" name="lat" id="lat" class="form-control" value="<?php if($jform=="edit") echo $data["lat"]; ?>" maxlength="20" placeholder="misal: -6.27925" onkeyup="noac00(this.id);" required/>
					</div>
					<label class="col-sm-1 control-label no-padding-right"> Lon. </label>
					<div class="col-sm-2">
						<input type="text" name="lon" id="lon" class="form-control" value="<?php if($jform=="edit") echo $data["lon"]; ?>" maxlength="20" placeholder="misal: 106.974754" onkeyup="noac00(this.id);" required />
					</div>
					<div class="col-sm-1 action-buttons">
						<a href="#!" onclick="getMapCoor()" class="green bigger-140 tooltip001 " title="Get Coordinat">
							<img src="img/gmaps.gif" width="30px">
						</a>
					</div>
				</div>
						
				
				<?php /*?><div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Kapasitas Septic Tank  </label>
					<div class="col-sm-4">
						<input type="text" name="kapasitas_tank" id="kapasitas_tank" value="<?php if($jform=="edit") echo $data["kapasitas_tank"]; ?>" class="form-control"  style="width:150px; float:left;" onkeyup="isnum(this.id,this.value);"  maxlength="9" />
		  <span style="float:left; margin-top:5px;">&nbsp; Kubik &nbsp;</span>
					</div>
				</div><?php */?>
                 
				<?php if($jform=="edit"){ if($data["lon"] != ""){ $ds="display:none;"; }} ?>
				<?php /*?><center>
				<div style="width:90%; <?php print $ds; ?>" >
				<span id="mapmap"></span>	<div style="clear:both; height:10px;"></div>
				</div>
				</center>
				
                <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Koordinat  </label>
					<div class="col-sm-8">
						<span style="float:left; margin-top:5px;">LON &nbsp; </span>
			  <input class="form-control" style="width:250px; float:left;" type="text" name="lon" id="gps_lon" value="<?php if($jform=="edit") echo $data["lon_pel"]; ?>"  onkeyup="noac00(this.id,this.value);" required <?php  if($jform=="edit"){ if($data["lon_pel"] != ""){echo "readonly";}}  ?>>
			   <span style="float:left; margin-top:5px;">&nbsp; LAT &nbsp;</span>
			   <input class="form-control" style="width:250px; float:left;" type="text" name="lat" id="gps_lat" value="<?php if($jform=="edit") echo $data["lat_pel"]; ?>" onkeyup="noac00(this.id,this.value);" required <?php  if($jform=="edit"){ if($data["lat_pel"] != ""){echo "readonly";}}  ?>>	
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Keterangan  </label>
					<div class="col-sm-8">
						<input class="form-control"  type="text" name="ket_alamat" value="<?php if($jform=="edit") echo $data["ket_alamat"]; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Sedotable  </label>
					<div class="col-sm-8">
						<label>
							<input name="sedotable" class="ace ace-switch ace-switch-5" type="checkbox" value="Sudah" <?php if($jform=="edit"){ if($data["sedotable"] == "Sudah"){ print "checked"; }}  ?>>
								<span class="lbl"></span>
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right"> Menjadi Pelanggan LLTT  </label>
					<div class="col-sm-8">
						<label>
							<input name="jadilltt" class="ace ace-switch ace-switch-5" type="checkbox" value="Bersedia" <?php if($jform=="edit"){ if($data["jadilltt"] == "Bersedia"){ print "checked"; }}  ?>>
								<span class="lbl"></span>
						</label>
					</div>
				</div><?php */?>
				
                
				
				
				<div style="clear:both"></div>
				
								
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<?php $Tact=substr($act,0,-2);
						if($jform=="input") { $sav="Simpan"; echo "<input type='hidden' name='Simpan' value='1' />"; } 
						else { $sav="Simpan Perubahan"; echo "<input type='hidden' name='Edit' value='1' />"; } ?>
						<button class="btn btn-info" type="submit">
							<i class="ace-icon fa fa-check bigger-110"></i><?php echo $sav;?></button>
						&nbsp; &nbsp; &nbsp;
						<button class="btn" type="button" onClick="document.location='index.php?act=<?php echo $Tact;?>';">
							<i class="ace-icon fa fa-undo bigger-110"></i>Batal</button>
					</div>
				</div>				

				<input type="hidden" name="id" value="<?php echo $idedit;?>"  >
				<input type="hidden" name="act" value="<?php echo $Tact;?>" />									
				<input type="hidden" name="kd_temp" id="kd_temp" value="<?php echo $kd_temp; ?>" />													
													
			</form>
																				
  </div><!-- /.span -->
</div><!-- /.row -->



<?php 
$in_page_script=$act."_js.php";
$datepicker=1;?>