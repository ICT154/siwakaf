<form name="formpdf" id="formpdf" method="get" action=""  target="_blank" >
	<input type="hidden" name="filt_kec" value="<?php echo $filt_kec;?>">
	<input type="hidden" name="filt_desa" value="<?php echo $filt_desa;?>">
	
	<input type="hidden" name="filt" value="Go">
</form>

<script>	
	
	function submFilt() { 
		$("#divload_user").show();	
		$("#filt_btn").click();	
	}	
		
	function loadDesa() {
		$("#loader_desa").show();
		$("#filt_desa").html("<option value='' >- Pilih -</option>");				  
		idf = $("#filt_kec").val();
		$("#filt_desa").load("ajx/desakel_select_v2.php?idf="+idf, function(responseTxt, statusTxt, xhr){
       		//if(statusTxt == "success") { alert("External content loaded successfully!"); }
    	    if(statusTxt == "error") { alert("Error: " + xhr.status + ": " + xhr.statusText); }
			$("#loader_desa").hide();
		});
	}
			
	function loadKec() {
		$("#loader_kec").show();
		$("#filt_desa").html("<option value='' >- Pilih -</option>");
		$("#filt_kec").html("<option value='' >- Pilih -</option>");
		idf = $("#filt_kota").val();
		$("#filt_kec").load("ajx/kec_select_v2.php?idf="+idf, function(responseTxt, statusTxt, xhr){
       		//if(statusTxt == "success") { alert("External content loaded successfully!"); }
    	    if(statusTxt == "error") { alert("Error: " + xhr.status + ": " + xhr.statusText); }
			$("#loader_kec").hide();
		});
	}
		
	function updata() { 
		if(confirm("Data akan di update !")){
			$( "#loading").show();
			$( "#up_data").load( "ajx/update_data.php", function( response, status, xhr ) {
				if ( status == "success" ) { $( "#loading").hide(); }
				if ( status == "error" ) { 
					var msg = "Sorry but there was an error: ";
					$( "#up_data" ).html( msg + xhr.status + " " + xhr.statusText );
					}
			}); 
		}
	}
	
	function upstatus() { 
		if(confirm("Data akan di update !")){
			$( "#loading2").show();
			$( "#up_status").load( "ajx/update_status.php", function( response, status, xhr ) {
				if ( status == "success" ) { $( "#loading2").hide(); }
				if ( status == "error" ) { 
					var msg = "Sorry but there was an error: ";
					$( "#up_status" ).html( msg + xhr.status + " " + xhr.statusText );
					}
			}); 
		}
	}
	
	function goprint(idf, ttl,idf0) {
		z2='<?php echo $jumno; ?>'; 
			if (z2=='0'){alert('Tidak ada data untuk di export! '); return (false);} 	
			else {if (confirm('Apakah anda yakin print "'+ttl+'"  !') ) {
				window.open('lap/<?php echo $act; ?>_print.php?idf='+idf ,'win2','status=no, toolbar=no, scrollbars=yes, titlebar=no, menubar=no, resizable=yes, width=800, height=800, directories=no, location=no' );
			}}
	}
	
	function goprint_new(idf, ttl,idf0) {
		z2='<?php echo $jumno; ?>'; 
			if (z2=='0'){alert('Tidak ada data untuk di export! '); return (false);} 	
			else {if (confirm('Apakah anda yakin print "'+ttl+'"  !') ) {
				window.open('lap/<?php echo $act; ?>_print-new.php?idf='+idf ,'win2','status=no, toolbar=no, scrollbars=yes, titlebar=no, menubar=no, resizable=yes, width=800, height=800, directories=no, location=no' );
			}}
	}
			
	function gopdf(idf, ttl) {
	z2='<?php echo $jumno; ?>'; 
		if (z2=='0'){alert('Tidak ada data untuk di export! '); return (false);} 	
		else {if (confirm('Apakah anda yakin Export "'+ttl+'"  !') ) {
			window.open('lap/<?php echo $act; ?>_pdf.php?idf='+idf ,'win2','status=no, toolbar=no, scrollbars=yes, titlebar=no, menubar=no, resizable=yes, width=800, height=800, directories=no, location=no' );
		}}
	}
	
	function vol01(btn) {
		z2='<?php echo $jumno; ?>'; 
		if (z2==0){alert('Tidak ada data untuk di export! '); return (false);} 
		else { 
		 	if (btn=='pdf') {	 
				if (confirm('Apakah anda yakin export ke pdf !') ) {
					document.getElementById('formpdf').action='lap/<?php echo $act;?>_pdf.php';	$("#formpdf").submit();
				}
			} else if (btn=='xcl') {	 
				if (confirm('Apakah anda yakin export ke xcl !') ) {
					document.getElementById('formpdf').action='lap/lap-pel-lltt_xcl.php';	$("#formpdf").submit();
				}
			} 
		}
	}	 	
</script>