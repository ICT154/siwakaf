

<div id="divload" style="position:fixed; left:30%; top:40%; width:40%; background-color:#99FF99; z-index:99999; padding:10px; border:#006600 1px solid; display:none;" align="center"> <img src="../img/loading.gif" /> <i>Loading ...</i>  </div>


<div id="divkwi" style="border: #0033CC 3px solid;background:#FFFFCC;position: absolute;display:none; padding:5px; z-index:600; min-width:100px;" onMouseOver="$('#divkwitogl').val('1')" onMouseOut="$('#divkwitogl').val('0')"  class="boxshadow">&nbsp;</div><input type="hidden" id="divkwitogl" value="0" />
<script>
	window.addEventListener("click", function(event) {
		if($('#divkwitogl').val()=="0"){	$("#divkwi").hide();	}
	});
</script>


<div id="terbil" style="position:absolute; left:50%; top:20%; color:#006600; display:none; background-color:#99FF99; font-style:italic;"></div>

<?php  include("p_mapsearch_js.php"); ?>

<input type="hidden" id="cekfunct" value="0" />

<script>
	function subm_form(){	f=""; 
		if( $("#idf_desakel").val()=="" ){ f="Harap Pilih daerah Administrasi !"; $("#tujuan").focus();  }
		
		if(f==""){ lx="";
			if( CheckLatLon("lat")==false ) { lx="x"; }
			else {
				n = $("#lat").val().indexOf("-");	if(n < 0){ lx="x"; }
			}  
			if(lx!=""){ f="format Latitude tak sesuai!"; $("#lat").focus(); }
		}
						 
		if(f==""){
			if( CheckLatLon("lon")==false ){ f="format Longitude tak sesuai!"; $("#lon").focus(); } 
		}
						 
		if(f!=""){ alert(f); return false; }
						 
	}
	
	function cek_kd(){
		document.getElementById('cekkd').innerHTML ="<img src=\'../img/loading.gif\' /><input type=\'hidden\' id=\'errkd_brg\' value=\'1\' />" ; 
		val = document.getElementById("npa").value;
		tfk_jax(val,'ajx/npal_cekkd.php','cekkd');
	}
		
	function CheckLatLon(id){
		v = $("#"+id).val();
		v2 = v*1; console.log('v='+v+' , v2='+v2);
		if(v == v2 ){ 
			n = v.indexOf(".");
			if(n > 0){ return true; } else { return false; }
		}
		else { return false; }
	}
		

	function klik_tuj(tnum, v00, v01, v02, v03, v04, v05, v06, v07, v08 ) {
		$('#divkwi').hide();
		if(tnum=="t1") {
			document.getElementById('kelu').value = v01;
			document.getElementById('keca').value = v02 ;
			document.getElementById('kabu').value = v03 ;
			//document.getElementById('prov').value = "JAWA TENGAH";
			document.getElementById('tujuan').value = "";
			document.getElementById('idf_desakel').value = v06;

		}
		/* else if(tnum=="t2") {
			document.getElementById('kd_wly').value = v00;
			document.getElementById('kd_jln').value = v01 ;
			document.getElementById('kode').value = v03 ;
			document.getElementById('na_wly').value = v02 ;
			document.getElementById('jalan1').value = v04;
			document.getElementById('jalan2').value = v05 ;
			document.getElementById('jalan3').value = v06 ;
			document.getElementById('jalan4').value = v07 ;
			document.getElementById('kocab').value = v08 ;
			document.getElementById('tujuan2').value = "";

		} */
	}
	
	function doPosKwi(posa, val, tnum) {					
		if(val.length>0) {
			a="#"+posa;	p=$(a).offset();	$('#divkwi').show();
			hg = document.getElementById(posa).offsetHeight;
			document.getElementById('divkwi').style.top = (p.top+hg)+"px";
			document.getElementById('divkwi').style.left = (p.left)+"px";
			imgload("divkwi");
			if(tnum=="t1"){tfk_jax(val, 'ajx/desa_list.php', 'divkwi', posa, tnum);}
			//else if(tnum=="t2"){tfk_jax(val, 'ajx/alamat_list.php', 'divkwi', posa, tnum);}
		}
	}
	
	function imgload(tab) {	document.getElementById(tab).innerHTML ="<img src='../img/loading.gif' />" ; }
	function togglediv() {	if (document.getElementById('divkwitogl').value=="0") { $('#divkwi').hide(); }	}

	function isiLainnya(id, classLain, txt){
		$("."+classLain).hide();
		val = $("#"+id).val();
		if( val.indexOf(txt) != -1 ) { $("."+classLain).show(); }		
	}			
		isiLainnya("kepemilikan", "pemilik_lain", "Lainnya");
		isiLainnya("air_bersih", "pdam_lain", "PDAM");
		isiLainnya("bahan_septik", "bahan_lain", "Pabrikasi");
	
		
	<?php // --- Verivikasi daftar dari mobile -- START ------
	if($isFromVerMob!=""){ ?>
	function cekIsFromVerMob(){
		$("#kelu").val("<?php echo $_POST["desa"];?>");
		$("#keca").val("<?php echo $_POST["kec"];?>");
		$("#kabu").val("<?php echo $_POST["kota"];?>");
		$("#prov").val("<?php echo $_POST["prov"];?>");
		$("#tujuan").val("");
		$("#idf_desakel").val("<?php echo $_POST["idf_desa"];?>");
		$("#jenis").val("<?php echo $_POST["jns"];?>");

		$("#tanggung_jawab").val("<?php echo $d_mob["nama"];?>");
		$("#alamat").val("<?php echo $d_mob["alamat"];?>");
		$("#telp").val("<?php echo $d_mob["tlp"];?>");					
		$("#lat").val("<?php echo $d_mob["lat"];?>");
		$("#lon").val("<?php echo $d_mob["lon"];?>");						
	}
	cekIsFromVerMob();
	<?php } 
	// --- Verivikasi daftar dari mobile -- END ------ ?>
	

</script>
<?php  include("func/f_js_isfloat.php"); ?>
