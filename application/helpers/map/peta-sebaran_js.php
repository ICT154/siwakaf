
<div id="divload" style="position:fixed; left:30%; top:40%; width:40%; background-color:#99FF99; z-index:99999; padding:10px; border:#006600 1px solid; display:none;" align="center"> <img src="../img/loading.gif" /> <i>Loading ...</i>  </div>
<script>
	
	$(document).ready(function() {	
		<?php 
		//if($filt_stat=="Heatmap"){ $gogo = "peta_isi2.php"; } 
		//else if($filt_stat=="Point"){ $gogo = "peta_isi2-point.php"; } 				
		?>
		$( "#petaisi" ).load( "peta-sebaran-map.php", function( response, status, xhr ) {
			if ( status == "success" ) { $("#divload").hide();	}
  			if ( status == "error" ) {
				var msg = "Sorry but there was an error: ";
				$( "#petaisi" ).html( msg + xhr.status + " " + xhr.statusText );
  			}
		}); 
	});	
		
	function imgload(tab) {	document.getElementById(tab).innerHTML ="<img src='../img/loading.gif' />" ; }	
	function togglediv() {	if (document.getElementById('divkwitogl').value=="0") { $('#divkwi').hide(); }	}
			
</script>