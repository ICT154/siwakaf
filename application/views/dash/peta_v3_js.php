<?php
$q = "SELECT * FROM t_wakaf_akt_penerimaan
INNER JOIN t_wakaf_peruntukan ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_peruntukan.id_penerimaan_wakaf
INNER JOIN t_wakaf_pemberi ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_pemberi.id_penerimaan_wakaf
INNER JOIN t_wakaf_penerima ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_penerima.id_penerimaan_wakaf
INNER JOIN t_wakaf_luas ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_luas.id_penerimaan_wakaf
INNER JOIN t_wakaf_sertifikat ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_sertifikat.id_penerimaan_wakaf
INNER JOIN gambar ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = gambar.id_penerimaan_wakaf";
$query = $this->db->query($q);
$i = 0;
$lattl = "";
$lottl = "";
$ico = "";
$jum = 0;
$lattp = "";
$lotts = "";
$icop = "";
$pes_jum = "";
$lattm = "";
$lottm = "";
$icom = "";
$mas_jum = "";
while ($row = $query->unbuffered_row()) {
    if ($row->id_kategori == "JW73086") {
        $iconmarker = base_url('vendor/mark_dot_blue.gif');
    } else if ($row->id_kategori == "JW70512") {
        $iconmarker = base_url('vendor/mark_dot_red.gif');
    } elseif ($row->jenis_peruntukan == "sawah") {
        $iconmarker = base_url('vendor/mark_dot_green.gif');
    } else {
        $iconmarker = base_url('vendor/mark_dot_grey.gif');
    }

    if ($row->id_kategori == "JW73086") {
        $lattm .= $row->lat . "|";
        $lottm .= $row->lng . "|";
        $icom .= $iconmarker . "|";
        $mas_jum++;
    } else if ($row->id_kategori == "JW70512") {
        $lattp .= $row->lat . "|";
        $lotts .= $row->lng . "|";
        $icop .= $iconmarker . "|";
        $pes_jum++;
    } elseif ($row->jenis_peruntukan == "sawah") {
        $latts .= $row->lat . "|";
        $lotts .= $row->lng . "|";
        $icos .= $iconmarker . "|";
        $saw_jum++;
    } else {
        $lattl .= $row->lat . "|";
        $lottl .= $row->lng . "|";
        $ico .= $iconmarker . "|";
        $jum++;
    }
    $i++;
}
?>

<input type="hidden" id="lat_masjid" value="<?= $lattm ?>">
<input type="hidden" id="lng_masjid" value="<?= $lottm ?>">
<input type="hidden" id="ico_masjid" value="<?= $icom ?>">
<input type="hidden" id="markjum" value="<?= $mas_jum ?>">




<script>
function initMap() {

    //var haightAshbury = {lat: -3.887317, lng: 118.723582};
    var haightAshbury = {
        lat: -7.03503043508787,
        lng: 107.71006070141564
    };
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12, //12 

        center: haightAshbury,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    function addmarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            optimized: false,
            visible: true,
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

    function drawmaker() {
        lat00 = document.getElementById('lat_masjid').value;
        lat_arr = lat00.split("|");
        lon00 = document.getElementById('lng_masjid').value;
        lon_arr = lon00.split("|");
        markjum = document.getElementById('markjum').value;

        for (var i = 0; i < markjum; i++) {
            haightAshbury = {
                lat: lat_arr[i] * 1,
                lng: lon_arr[i] * 1
            };

            addMarker(haightAshbury);
        }
    }

    drawmaker();
}



// function drawmaker() {
//     lat00 = document.getElementById('lat_masjid').value;
//     lat_arr = lat00.split("|");
//     lon00 = document.getElementById('lng_masjid').value;
//     lon_arr = lon00.split("|");
//     markjum = document.getElementById('markjum').value;

//     for (var i = 0; i < markjum; i++) {
//         haightAshbury = {
//             lat: lat_arr[i] * 1,
//             lng: lon_arr[i] * 1
//         };

//         addMarker(haightAshbury);
//     }
// }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=<?php echo $key; ?>&libraries=visualization">
</script>