<?php

$lat = "";
$lon = "";
$icon = "";
$info_ = "";
$info_win = "";

$res = $this->db->get("t_data_wakaf");

foreach ($res->result() as $key) {

    $pimpinan = $this->db->get_where('t_data_pimpinan',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();
    $pengelola = $this->db->get_where('t_data_pengelola',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();


    if ($key->ket_g == "pesantren") {
        $icon_marker = base_url("vendor/assets/images/icon/merah.png");
        $icon_marker_pes = base_url("vendor/assets/images/icon/merah.png");
        $lat_pes .= $pengelola['lat'] . "|";
        $lon_pes .= $pengelola['lng'] . "|";
        $icon_pes .= $icon_marker . "|";
        $info_pes = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";
        $info_win_pes .= $info_pes;
    } else if ($key->ket_g == "masjid") {
        $icon_marker = base_url("vendor/assets/images/icon/kuning.png");
        $icon_marker_mas = base_url("vendor/assets/images/icon/kuning.png");
        $lat_mas .= $pengelola['lat'] . "|";
        $lon_mas .= $pengelola['lng'] . "|";
        $icon_mas .= $icon_marker . "|";
        $info_mas = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";
        $info_win_mas .= $info_mas;
    } else if ($key->ket_g == "sawah") {
        $icon_marker = base_url("vendor/assets/images/icon/biru.png");
        $icon_marker_wah = base_url("vendor/assets/images/icon/biru.png");
        $lat_wah .= $pengelola['lat'] . "|";
        $lon_wah .= $pengelola['lng'] . "|";
        $icon_wah .= $icon_marker . "|";
        $info_wah = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";
        $info_win_wah .= $info_wah;
    } else if ($key->ket_g == "wakaf_lainnya") {
        $icon_marker = base_url("vendor/assets/images/icon/hijau.png");
        $icon_marker_lain = base_url("vendor/assets/images/icon/hijau.png");
        $lat_lain .= $pengelola['lat'] . "|";
        $lon_lain .= $pengelola['lng'] . "|";
        $icon_lain .= $icon_marker . "|";
        $info_lain = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";
        $info_win_lain .= $info_lain;
    }

    $lat .= $pengelola['lat'] . "|";
    $lon .= $pengelola['lng'] . "|";
    $icon .= $icon_marker . "|";
    $info_ = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";

    $info_win .= $info_;
}

?>

<br><br>
<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-globe"></i>
        <?= $bred ?>
    </h1>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<style>
    #map {
        height: 462px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
</style>




<div id="map"></div>



<div id="adlst" style="position:absolute; left:919px; top:106px; z-index:8000; border: #CCCCCC solid 1px; padding:10px; cursor:move; background:#FFFF99;" class="boxshadow">
    <div style="padding: 10px">
        <input id="wakaf_masjid" type="checkbox" value="1" onClick="legend00()" checked> &nbsp;
        <img src="<?= base_url('vendor/assets/') ?>images/icon/kuning.png" width="12px"> Wakaf Masjid


        <br>
        <input id="wakaf_pesantren" type="checkbox" value="1" onClick="legend00()" checked> &nbsp;
        <img src="<?= base_url('vendor/assets/') ?>images/icon/merah.png" width="12px"> Wakaf Pesantren <br>


        <input id="wakaf_lainnya" type="checkbox" value="1" onClick="legend00()" checked> &nbsp;
        <img src="<?= base_url('vendor/assets/') ?>images/icon/hijau.png" width="12px"> Wakaf Lainnya <br>


        <input id="wakaf_sawah" type="checkbox" value="1" onClick="legend00()" checked> &nbsp;
        <img src="<?= base_url('vendor/assets/') ?>images/icon/biru.png" width="12px"> Wakaf Tanah Darat / Sawah <br>

    </div>
</div>

<br><br>
ALL
<input type="text" id="marker_lat" value="<?= $lat ?>">
<input type="text" id="marker_lon" value="<?= $lon ?>">
<input type="text" id="marker_icon" value="<?= $icon ?>">
<input type="text" id="marker_window" value="<?= $info_win ?>">
<input type="text" id="marker_jumlah" value="<?= $res->num_rows() ?>">

<?php

$lat = "";
$lon = "";
$icon = "";
$info_ = "";
$info_win = "";

$this->db->where("ket_g", "masjid");
$res = $this->db->get("t_data_wakaf");

foreach ($res->result() as $key) {

    $pimpinan = $this->db->get_where('t_data_pimpinan',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();
    $pengelola = $this->db->get_where('t_data_pengelola',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();


    if ($key->ket_g == "pesantren") {
        $icon_marker = base_url("vendor/assets/images/icon/merah.png");
    } else if ($key->ket_g == "masjid") {
        $icon_marker = base_url("vendor/assets/images/icon/kuning.png");
    } else if ($key->ket_g == "sawah") {
        $icon_marker = base_url("vendor/assets/images/icon/biru.png");
    } else if ($key->ket_g == "wakaf_lainnya") {
        $icon_marker = base_url("vendor/assets/images/icon/hijau.png");
    }

    $lat .= $pengelola['lat'] . "|";
    $lon .= $pengelola['lng'] . "|";
    $icon .= $icon_marker . "|";
    $info_ = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";

    $info_win .= $info_;
}

?>
<br><br>
MASJID
<input type="text" id="marker_lat_masjid" value="<?= $lat ?>">
<input type="text" id="marker_lon_masjid" value="<?= $lon ?>">
<input type="text" id="marker_icon_masjid" value="<?= $icon ?>">
<input type="text" id="marker_window_masjid" value="<?= $info_win ?>">
<input type="text" id="marker_jumlah_masjid" value="<?= $res->num_rows() ?>">


<?php

$lat = "";
$lon = "";
$icon = "";
$info_ = "";
$info_win = "";

$this->db->where("ket_g", "wakaf_lainnya");
$res = $this->db->get("t_data_wakaf");

foreach ($res->result() as $key) {

    $pimpinan = $this->db->get_where('t_data_pimpinan',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();
    $pengelola = $this->db->get_where('t_data_pengelola',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();


    if ($key->ket_g == "pesantren") {
        $icon_marker = base_url("vendor/assets/images/icon/merah.png");
    } else if ($key->ket_g == "masjid") {
        $icon_marker = base_url("vendor/assets/images/icon/kuning.png");
    } else if ($key->ket_g == "sawah") {
        $icon_marker = base_url("vendor/assets/images/icon/biru.png");
    } else if ($key->ket_g == "wakaf_lainnya") {
        $icon_marker = base_url("vendor/assets/images/icon/hijau.png");
    }

    $lat .= $pengelola['lat'] . "|";
    $lon .= $pengelola['lng'] . "|";
    $icon .= $icon_marker . "|";
    $info_ = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";

    $info_win .= $info_;
}

?>
<br><br>
LAINNYA
<input type="text" id="marker_lat_lainnya" value="<?= $lat ?>">
<input type="text" id="marker_lon_lainnya" value="<?= $lon ?>">
<input type="text" id="marker_icon_lainnya" value="<?= $icon ?>">
<input type="text" id="marker_window_lainnya" value="<?= $info_win ?>">
<input type="text" id="marker_jumlah_lainnya" value="<?= $res->num_rows() ?>">


<?php

$lat = "";
$lon = "";
$icon = "";
$info_ = "";
$info_win = "";

$this->db->where("ket_g", "pesantren");
$res = $this->db->get("t_data_wakaf");

foreach ($res->result() as $key) {

    $pimpinan = $this->db->get_where('t_data_pimpinan',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();
    $pengelola = $this->db->get_where('t_data_pengelola',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();


    if ($key->ket_g == "pesantren") {
        $icon_marker = base_url("vendor/assets/images/icon/merah.png");
    } else if ($key->ket_g == "masjid") {
        $icon_marker = base_url("vendor/assets/images/icon/kuning.png");
    } else if ($key->ket_g == "sawah") {
        $icon_marker = base_url("vendor/assets/images/icon/biru.png");
    } else if ($key->ket_g == "wakaf_lainnya") {
        $icon_marker = base_url("vendor/assets/images/icon/hijau.png");
    }

    $lat .= $pengelola['lat'] . "|";
    $lon .= $pengelola['lng'] . "|";
    $icon .= $icon_marker . "|";
    $info_ = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";

    $info_win .= $info_;
}

?>
<br><br>
PESANTREN
<input type="text" id="marker_lat_pesantren" value="<?= $lat ?>">
<input type="text" id="marker_lon_pesantren" value="<?= $lon ?>">
<input type="text" id="marker_icon_pesantren" value="<?= $icon ?>">
<input type="text" id="marker_window_pesantren" value="<?= $info_win ?>">
<input type="text" id="marker_jumlah_pesantren" value="<?= $res->num_rows() ?>">


<?php

$lat = "";
$lon = "";
$icon = "";
$info_ = "";
$info_win = "";

$this->db->where("ket_g", "sawah");
$res = $this->db->get("t_data_wakaf");

foreach ($res->result() as $key) {

    $pimpinan = $this->db->get_where('t_data_pimpinan',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();
    $pengelola = $this->db->get_where('t_data_pengelola',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();


    if ($key->ket_g == "pesantren") {
        $icon_marker = base_url("vendor/assets/images/icon/merah.png");
    } else if ($key->ket_g == "masjid") {
        $icon_marker = base_url("vendor/assets/images/icon/kuning.png");
    } else if ($key->ket_g == "sawah") {
        $icon_marker = base_url("vendor/assets/images/icon/biru.png");
    } else if ($key->ket_g == "wakaf_lainnya") {
        $icon_marker = base_url("vendor/assets/images/icon/hijau.png");
    }

    $lat .= $pengelola['lat'] . "|";
    $lon .= $pengelola['lng'] . "|";
    $icon .= $icon_marker . "|";
    $info_ = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";

    $info_win .= $info_;
}

?>
<br><br>
SAWAH
<input type="text" id="marker_lat_sawah" value="<?= $lat ?>">
<input type="text" id="marker_lon_sawah" value="<?= $lon ?>">
<input type="text" id="marker_icon_sawah" value="<?= $icon ?>">
<input type="text" id="marker_window_sawah" value="<?= $info_win ?>">
<input type="text" id="marker_jumlah_sawah" value="<?= $res->num_rows() ?>">




<br><br>
TRUE FALSE
<input type="text" id="cek_masjid" value='true'>
<input type="text" id="cek_pesantren" value='true'>
<input type="text" id="cek_lainnya" value='true'>
<input type="text" id="cek_sawah" value='true'>


<script>
    var map;
    var markers = [];
    var infoWindow;


    function initMap() {

        var haightAshbury = {
            lat: -7.03503043508787,
            lng: 107.71006070141564
        };

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: haightAshbury,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        drawmarker();
    }

    function addMarker(location, contentString, micon, ket) {
        var hg = 12;
        var wd = 12;

        var icon00 = {
            url: micon, // url
            scaledSize: new google.maps.Size(wd, hg), // scaled size
            origin: new google.maps.Point(0, 0), // origin
            anchor: new google.maps.Point(wd / 2, 0), // anchor
            labelOrigin: new google.maps.Point(9, 25) // for label
        };

        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: icon00,
            title: ket,
            optimized: false,
            visible: true,
        });

        marker.addListener('click', function(event) {
            if (infoWindow) {
                infoWindow.close();
            }
            infoWindow = new google.maps.InfoWindow();
            infoWindow.setContent(contentString);
            infoWindow.setPosition(event.latLng);
            infoWindow.open(map);
        });

        markers.push(marker);

    }

    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map); //infowindow.open(map,markers[i]);
        }
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function showMarkers() {
        setMapOnAll(map);
    }

    function drawmarker() {

        /// latt marker
        lattt = document.getElementById('marker_lat').value;
        lat_arr = lattt.split("|");

        /// lon marker
        lonnn = document.getElementById('marker_lon').value;
        lon_arr = lonnn.split("|");

        /// icon marker
        iconnn = document.getElementById('marker_icon').value;
        icon_arr = iconnn.split("|");

        /// info window
        infooo = document.getElementById('marker_window').value;
        info_arr = infooo.split("|");

        /// jumlah marker 
        markjum = document.getElementById('marker_jumlah').value;

        for (var i = 0; i < markjum; i++) {
            haightAshbury = {
                lat: lat_arr[i] * 1,
                lng: lon_arr[i] * 1
            };
            //var currCenter = map.getCenter();  
            addMarker(haightAshbury, info_arr[i], icon_arr[i], "");
            //map.setCenter(currCenter); 
        }

        setMapOnAll(map);
    }


    function muncul() {
        deleteMarkers();
        m_lat = "";
        m_lon = "";
        m_ico = "";
        m_info = "";
        m_jum = 0;

        if ($("#wakaf_masjid").is(':checked')) {
            m_lat += $("#marker_lat_masjid").val();
            m_lon += $("#marker_lon_masjid").val();
            m_ico += $("#marker_icon_masjid").val();
            m_info += $("#marker_window_masjid").val();
            m_jum += $("#marker_jumlah_masjid").val() * 1;
        }
        if ($("#wakaf_lainnya").is(':checked')) {
            m_lat += $("#marker_lat_lainnya").val();
            m_lon += $("#marker_lon_lainnya").val();
            m_ico += $("#marker_icon_lainnya").val();
            m_info += $("#marker_window_lainnya").val();
            m_jum += $("#marker_jumlah_lainnya").val() * 1;
        }
        if ($("#wakaf_pesantren").is(':checked')) {
            m_lat += $("#marker_lat_pesantren").val();
            m_lon += $("#marker_lon_pesantren").val();
            m_ico += $("#marker_icon_pesantren").val();
            m_info += $("#marker_window_pesantren").val();
            m_jum += $("#marker_jumlah_pesantren").val() * 1;
        }
        if ($("#wakaf_sawah").is(':checked')) {
            m_lat += $("#marker_lat_sawah").val();
            m_lon += $("#marker_lon_sawah").val();
            m_ico += $("#marker_icon_sawah").val();
            m_info += $("#marker_window_sawah").val();
            m_jum += $("#marker_jumlah_sawah").val() * 1;
        }

        document.getElementById('marker_lat').value = m_lat;
        document.getElementById('marker_lon').value = m_lon;
        document.getElementById('marker_icon').value = m_ico;
        document.getElementById('marker_window').value = m_info;
        document.getElementById('marker_jumlah').value = m_jum;

        drawmarker();
    }

    function legend00() {
        deleteMarkers();
        var cek1 = false;
        var cek2 = false;
        var cek3 = false;
        var cek4 = false;

        if ($("#wakaf_masjid").is(':checked')) {
            cek1 = true;
        }
        if ($("#wakaf_pesantren").is(":checked")) {
            cek2 = true;
        }
        if ($("#wakaf_lainnya").is(":checked")) {
            cek3 = true;
        }
        if ($("#wakaf_sawah").is(":checked")) {
            cek4 = true;
        }

        document.getElementById("cek_masjid").value = cek1;
        document.getElementById("cek_pesantren").value = cek2;
        document.getElementById("cek_lainnya").value = cek3;
        document.getElementById("cek_sawah").value = cek4;
        muncul();
    }
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyDcr0FQt1jrVKdhxVNP-PkodELgq5iFkok&libraries=visualization">
</script>
<script>
    $('#pet2').attr('class', 'active');
</script>