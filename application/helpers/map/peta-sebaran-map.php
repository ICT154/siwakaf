<?php 
include("../include/db.php"); include("../include/dbcon.php");  include("../include/get_time.php"); 
//include ('../include/formatrp.php');  
//-------- Peta START -----------

//$wlat="-7.472613399999998";  $wlon="112.6675398"; $zm="12"; // sidoarjo
$wlat="-7.348077";  $wlon="108.217396"; $zm="12"; // tasikmalaya kota			



$lon_provinsi=""; $lat_provinsi=""; $ico_provinsi=""; $info_provinsi="";

$l2t2_lon = ""; $l2t2_lat = ""; $l2t2_ico = ""; $l2t2_info = ""; $l2t2_jum = 0;
$l2t3_lon = ""; $l2t3_lat = ""; $l2t3_ico = ""; $l2t3_info = ""; $l2t3_jum = 0;

/*/ cari penyedotan yg sudah ---
$q = " SELECT t_penyedotan.idf_penyedotan, t_penyedotan.stat_sedot, t_pelanggan.*, t_spk.tgl_spk FROM t_penyedotan 
	LEFT JOIN t_pelanggan ON t_pelanggan.idf_pelanggan=t_penyedotan.idf_pelanggan
	LEFT JOIN t_spk ON t_spk.idf_penyedotan=t_penyedotan.idf_penyedotan
	WHERE t_spk.idf_spk IS NOT NULL AND t_pelanggan.lat!='' " ;
//---*/
//maunya data pelanggan ja 
$q = " SELECT t_pelanggan.* FROM t_pelanggan WHERE t_pelanggan.lat!='' " ;


$query2=mysqli_query($con, $q); 
			
$tb01 = "<tr><td valign='top'>";
$tb02 = "</td><td valign='top'>:</td><td valign='top'>";
$tb03 = "</td></tr>";
$i=0; while($data=mysqli_fetch_assoc($query2))	{ 

		
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
	
	$mark0="mark_dot_biru.gif"; 
	//if($data["stat_sedot"]=="L2T3"){ $mark0="mark_dot_biru.gif"; }
	if($data["stat_pelanggan"]=="L2T3"){ $mark0="mark_dot_red.gif"; }	
	
	$coorLat[$i] = $data["lat"]; $coorLon[$i] = $data["lon"];
	
	$last_sedot=""; $zz=$data["terakhir_sedot"]; 
	if($zz!="0000-00-00"){ $last_sedot=substr($zz, 8, 2)."-".substr($zz, 5, 2)."-".substr($zz, 0, 4); }
	
	$lon_provinsi .= $data["lon"]."|";		
	$lat_provinsi .= $data["lat"]."|";		
	$ico_provinsi .= $mark0."|";	
	$infoss = "<table width='300px'><tr>
	<td width='100px'></td><td width='1px'></td><td></td></tr>".
	$tb01."ID&nbsp;Pelanggan".$tb02.$data["id_pelanggan"].$tb03.
	$tb01."Nama".$tb02.$data["tanggung_jawab"].$tb03.
	$tb01."Alamat".$tb02.$alamat.$tb03.
	$tb01.".".$tb02.".".$tb03.	
	$tb01."Penyedotan&nbsp;Terakhir".$tb02.$last_sedot.$tb03.
	"</table>|";
	//$tb01."Tgl Penyedotan".$tb02.$data["tgl_spk"].$tb03.
	
	$info_provinsi .= $infoss;
	
	
	if($data["stat_pelanggan"]=="L2T2"){
		$l2t2_lon .= $data["lon"]."|"; 
		$l2t2_lat .= $data["lat"]."|";	
		$l2t2_ico .= $mark0."|"; 
		$l2t2_info .= $infoss; 
		$l2t2_jum++;
	} else if($data["stat_pelanggan"]=="L2T3"){
		$l2t3_lon .= $data["lon"]."|";  
		$l2t3_lat .= $data["lat"]."|";
		$l2t3_ico .= $mark0."|";
		$l2t3_info .= $infoss;
		$l2t3_jum++;
	}
	
	

	
$i++; } $jum_provinsi=$i; 
					 
					  
	
	   ?>

<div class="panel panel-primary" style="height:700px; padding:0; overflow:hidden;">
			<div class="panel-heading">
				<h3 class="panel-title"><?php /*<img style="float:left; margin-right:5px;" src="img/graph.gif" height="15">*/ ?>
				Peta Wilayah </h3>
			</div>
			<div class="panel-body" ><div id="maptab" style="height:625px;"></div></div>
		</div>
	</div>
</div>

<input type="hidden" id="mark00_lat" value="<?php echo $lat_provinsi;?>" >
<input type="hidden" id="mark00_lon" value="<?php echo $lon_provinsi;?>">
<input type="hidden" id="mark00_ico" value="<?php echo $ico_provinsi;?>">
<input type="hidden" id="mark00_info" value="<?php echo $info_provinsi;?>">
<input type="hidden" id="mark00_jum" value="<?php echo ($jum_provinsi*1);?>">


<input type="hidden" id="mark00_l2t2_lat" value="<?php echo $l2t2_lat;?>" >
<input type="hidden" id="mark00_l2t2_lon" value="<?php echo $l2t2_lon;?>">
<input type="hidden" id="mark00_l2t2_ico" value="<?php echo $l2t2_ico;?>">
<input type="hidden" id="mark00_l2t2_info" value="<?php echo $l2t2_info;?>">
<input type="hidden" id="mark00_l2t2_jum" value="<?php echo ($l2t2_jum*1);?>">


<input type="hidden" id="mark00_l2t3_lat" value="<?php echo $l2t3_lat;?>" >
<input type="hidden" id="mark00_l2t3_lon" value="<?php echo $l2t3_lon;?>">
<input type="hidden" id="mark00_l2t3_ico" value="<?php echo $l2t3_ico;?>">
<input type="hidden" id="mark00_l2t3_info" value="<?php echo $l2t3_info;?>">
<input type="hidden" id="mark00_l2t3_jum" value="<?php echo ($l2t3_jum*1);?>">



<div id="adlst" style="position:absolute; left:700px; top:200px; z-index:8000; border: #CCCCCC solid 1px; padding:10px; cursor:move; background:#FFFF99; display: none" class="boxshadow" onmouseover="ohov('1')" onmouseout="ohov('0')">
	<div style="padding: 10px">		
		<input id="lgd_l2t2" type="checkbox" value="1" onClick="legend00()" checked> &nbsp;
		<img src="img/mark_dot_biru.gif" width="12px"> Pelanggan L2T2
		<br>
		<input id="lgd_l2t3" type="checkbox" value="1" onClick="legend00()" checked> &nbsp;
		<img src="img/mark_dot_red.gif" width="12px"> Pelanggan L2T3
	</div>
</div>


 <script>
     
	 var map;
     var markers = [];
	 var infoWindow;
	 	 	 
	 
     function initMap() {
	  	  	  	
        //var haightAshbury = {lat: -3.887317, lng: 118.723582};
		 var haightAshbury = {lat: <?php echo $wlat; ?>, lng: <?php echo $wlon; ?>};	  
		 map = new google.maps.Map(document.getElementById('maptab'), {
          zoom: <?php echo $zm; ?>, //12 
						       
          center: haightAshbury,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

       
		//drawmarkermap();
		  
		funGeojson("../data/3278_kota_tasikmalaya-kec", "3278-kec" ); 
		map.data.setStyle(function(feature) {
			var color0 = "blue";	
			var color0s  = "blue";
			var strokeWeight0 = 1;
			var fillOpacity0 = 0.01;
			var zIndex0 = 1;
			var clickable0 = false;
									
			
			// -------- layer tasikmalaya
			var TEST0 = feature.getProperty('kode_kab_s'); 	
			 console.log(" TEST0 : "+TEST0);
			//var TEST01 = feature.getProperty('test_luas_desa_luas'); 
			if(typeof TEST0!=='undefined' && TEST0=='3278') { 
				color0 = "#AAA000";  zIndex0 = 1; //clickable0 = true;	
				
				//----
				colorss = [ "#4CCCCD", "#C1EABE", "#FC9775", "#FF6699", "#99b3ff", "#ffeb99", "#ffb3ff", "#cce0ff", "#80ff80","#99e6e6" , "#d6d6c2", "#8AF3B6", "#94EAFC", "#F5E67D", "#F7A5A6", "#ED65E0", "#6CF37B", "#F4C578",   "#4CCCCD", "#C1EABE", "#FC9775", "#FF6699", "#99b3ff", "#ffeb99", "#ffb3ff", "#cce0ff", "#80ff80","#99e6e6" , "#d6d6c2", "#8AF3B6", "#94EAFC", "#F5E67D", "#F7A5A6", "#ED65E0", "#6CF37B", "#F4C578"];	
				fillOpacity0 = 0; //pingin diwarnai katanya
				color0 = colorss[Math.floor(Math.random() * 20)];
				strokeWeight0 = 1;
				color0s = "#AAA000";
				//----		
			}
			
			var icon0 = "";			
			
			return {			  
				fillColor: color0,
				fillOpacity: fillOpacity0,
				strokeWeight: strokeWeight0,
				strokeColor: color0s,
				strokeOpacity: 1,	
				icon : icon0,
				zIndex: zIndex0,
				clickable: clickable0
			};
		});
				
		 
		lb00 = { lat: -7.307546, lng: 108.177727 };	addMarkerLabel(lb00, map, "Kec. Bungursari");
		lb00 = { lat: -7.354429, lng: 108.257190 };	addMarkerLabel(lb00, map, "Kec. Cibeureum");
		lb00 = { lat: -7.334477, lng: 108.213458 };	addMarkerLabel(lb00, map, "Kec. Cihideung");
		lb00 = { lat: -7.314864, lng: 108.224586 };	addMarkerLabel(lb00, map, "Kec. Cipedes");
		lb00 = { lat: -7.291456, lng: 108.196670 };	addMarkerLabel(lb00, map, "Kec. Indihiang");
		lb00 = { lat: -7.403946, lng: 108.205133 };	addMarkerLabel(lb00, map, "Kec. Kawalu");
		lb00 = { lat: -7.347547, lng: 108.186437 };	addMarkerLabel(lb00, map, "Kec. Mangkubumi");
		lb00 = { lat: -7.331469, lng: 108.260693 };	addMarkerLabel(lb00, map, "Kec. Purbaratu");
		lb00 = { lat: -7.397308, lng: 108.248304 };	addMarkerLabel(lb00, map, "Kec. Tamansari");
		lb00 = { lat: -7.329745, lng: 108.228303 };	addMarkerLabel(lb00, map, "Kec. Tawang");
						 
		 
		heatmap = new google.maps.visualization.HeatmapLayer({
          	data: getPoints(),
          	map: map			
        });
		heatmap.set('radius', heatmap.get('radius') ? null : 12);
		
		 
      }

	 //===========================
	 
	 function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }

      function changeGradient() {
        var gradient = [
          'rgba(0, 255, 255, 0)',
          'rgba(0, 255, 255, 1)',
          'rgba(0, 191, 255, 1)',
          'rgba(0, 127, 255, 1)',
          'rgba(0, 63, 255, 1)',
          'rgba(0, 0, 255, 1)',
          'rgba(0, 0, 223, 1)',
          'rgba(0, 0, 191, 1)',
          'rgba(0, 0, 159, 1)',
          'rgba(0, 0, 127, 1)',
          'rgba(63, 0, 91, 1)',
          'rgba(127, 0, 63, 1)',
          'rgba(191, 0, 31, 1)',
          'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
      }

      function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 10);
      }

      function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
      }

      // Heatmap data: 500 Points
      function getPoints() {
        return [
			<?php
			$i=0; while($i< $jum_provinsi*1 ){ 
				print "new google.maps.LatLng(".$coorLat[$i].", ".$coorLon[$i]."),";
				$i++;
			}	
			?>
         
        ];
		  
	  }
	 	 
	 
	// Adds a marker to the map and push to the array.
	function addMarker(location, contentString, micon, ket) {
		//var iconBase = 'img/';
		
		var hg=12; var wd=hg; 
		if(micon=="mark_red.gif" || micon=="mark_black.gif"){ hg=15; wd=12; }
		
		var icon00 = {
			url: "img/"+micon, // url
			scaledSize: new google.maps.Size(wd, hg), // scaled size
			origin: new google.maps.Point(0, 0), // origin
			anchor: new google.maps.Point(wd/2, 0), // anchor
			labelOrigin: new google.maps.Point(9, 25) // for label
		};
		
		var marker = new google.maps.Marker({
			position: location,
			map: map,
			//icon: iconBase + micon,
			icon: icon00,
			title: ket,
			optimized: false,
			visible: true,	
			/*
			label: {
				text: ket,
				color: 'black',
				fontSize: '11px',
				x: '200',
				y: '300'
			},*/
		});
		
		marker.addListener('click', function(event) {         
				
			if (infoWindow) {
				infoWindow.close();
			}
			infoWindow = new google.maps.InfoWindow();
    		
			// Replace the info window's content and position.
			infoWindow.setContent(contentString);
			infoWindow.setPosition(event.latLng);
			
			infoWindow.open(map);						
			/*							
			setTimeout(function(){ 				
				easyPie(); 
			}, 212); */
			
		});  

		markers.push(marker);

	}

	 
    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map); //infowindow.open(map,markers[i]);
        }
      }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
      }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
      }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
	  		
	function drawmarkermap() {
		lat00=document.getElementById('mark00_lat').value;		lat_arr=lat00.split("|");
		lon00=document.getElementById('mark00_lon').value;		lon_arr=lon00.split("|");
		ico00=document.getElementById('mark00_ico').value;		ico_arr=ico00.split("|");
		info00=document.getElementById('mark00_info').value;	info_arr=info00.split("|");
		//--------
		markjum=document.getElementById('mark00_jum').value;
		deleteMarkers();
						
		for (var i = 0; i < markjum; i++) {
			haightAshbury = {lat: lat_arr[i]*1, lng: lon_arr[i]*1};
			//var currCenter = map.getCenter();  
			addMarker(haightAshbury, info_arr[i], ico_arr[i], "");
			//map.setCenter(currCenter); 
		}
		
		setMapOnAll(map); 
		//document.getElementById('mark_jud').innerHTML =document.getElementById('mark00_jud').value;;
	}
	<?php // $('#adlst').draggable({		handle: 'div'  }); ?>
	function ohov(a) {
		if(a=='1') { $("#adlst").css("opacity", "1");$("#adlst").css("filter", "alpha(opacity=100)");}
		else{	$("#adlst").css("opacity", "0.6");	$("#adlst").css("filter", "alpha(opacity=60)");	}
	}
	function redrawmark() {
		<?php /*
		lat00="";	lon00="";	ico00="";	info00="";	markjum=0;
				
		val=document.getElementById('legend02').value;
		n=val.indexOf("provinsi"); if(n > -1) {
			lat00=lat00+document.getElementById('lat_provinsi').value;
			lon00=lon00+document.getElementById('lon_provinsi').value;
			ico00=ico00+document.getElementById('ico_provinsi').value;
			info00=info00+document.getElementById('info_provinsi').value;
			markjum=markjum+document.getElementById('jum_provinsi').value*1;
		}
		
			
		document.getElementById('mark00_lat').value=lat00;
		document.getElementById('mark00_lon').value=lon00;
		document.getElementById('mark00_ico').value=ico00;
		document.getElementById('mark00_info').value=info00;
		document.getElementById('mark00_jum').value=markjum;
		*/?>
		drawmarkermap();
	}
	
	function klikcbox(idd, val) { 
		a=val+'|'; b=document.getElementById('legend02').value; 
		if(document.getElementById(idd).checked) {document.getElementById('legend02').value=b+a;} 
		else {document.getElementById('legend02').value=b.replace(a, '');} redrawmark();
	}
	 
	function changeMapJenis(){
		v = $("#filt_stat").val();
		console.log(v);
		if(v=="Heatmap"){
			deleteMarkers();
			heatmap.setMap(map);			
			$("#adlst").hide();
			infoWindow.close();
		} else if(v=="Point"){
			heatmap.setMap(null);
			drawmarkermap();
			adlst
			$("#adlst").show();
		}
	}
	 
	function legend00(){		
		m_lat=""; m_lon=""; m_ico=""; m_info=""; m_jum=0;
		if($("#lgd_l2t2").is(':checked')){ 
			m_lat += $("#mark00_l2t2_lat").val();
			m_lon += $("#mark00_l2t2_lon").val();
			m_ico += $("#mark00_l2t2_ico").val();
			m_info += $("#mark00_l2t2_info").val();
			m_jum += $("#mark00_l2t2_jum").val()*1;
		}
		if($("#lgd_l2t3").is(':checked')){ 
			m_lat += $("#mark00_l2t3_lat").val();
			m_lon += $("#mark00_l2t3_lon").val();
			m_ico += $("#mark00_l2t3_ico").val();
			m_info += $("#mark00_l2t3_info").val();
			m_jum += $("#mark00_l2t3_jum").val()*1;
		}
		
		document.getElementById('mark00_lat').value=m_lat;
		document.getElementById('mark00_lon').value=m_lon;
		document.getElementById('mark00_ico').value=m_ico;
		document.getElementById('mark00_info').value=m_info;
		document.getElementById('mark00_jum').value=m_jum;
		
		drawmarkermap();
	}
	 
	 
	function funGeojson(file, nmId ){
		//$("#loader_call").show();
		$.getJSON(file+'.geojson', function (data0) {
			geojson0 = map.data.addGeoJson(data0); 
			//cekLoaderLegend(nmId+"|");			
		});	
	}
	
		
	
	 
	function addMarkerLabel(location, map, label0) {	  
	  new google.maps.Marker({
		position: location,
		label: {text: label0, color: "#0000ff"},
		map: map,
		icon: 'img/mark_null.gif'  
	  });
	}
</script>


   
<?php include("set-gmap-key.php");?>
<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=<?php echo $gmap_key;?>&libraries=visualization"></script>


<script src="../js/jquery-ui.js"></script>	
<script>
	$('#adlst').draggable({		handle: 'div'  });		
</script>
	

<?php //-------- Peta END -----------*/?>
