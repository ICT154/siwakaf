<?php

$lat = "";
$lon = "";
$icon = "";
$info_ = "";
$info_win = "";

$lat_mas = "";
$lon_mas = "";
$icon_mas = "";
$info_mas = "";
$info_win_mas = "";

$lat_wah = "";
$lon_wah = "";
$icon_wah = "";
$info_wah = "";
$info_win_wah = "";

$lat_pes = "";
$lon_pes = "";
$icon_pes = "";
$info_pes = "";
$info_win_pes = "";

$lat_lain = "";
$lon_lain = "";
$icon_lain = "";
$info_lain = "";
$info_win_lain = "";

$res = $this->db->get("objekwakaf");

foreach ($res->result() as $key) {

    // $pimpinan = $this->db->get_where('t_data_pimpinan',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();
    // $pengelola = $this->db->get_where('t_data_pengelola',  array('id_data_wakaf' => $key->id_data_wakaf), 1)->row_array();

    $muwakif = $this->db->get_where('muwakif',  array('ID' => $key->MUWAKIF_ID), 1)->row_array();


    if ($key->KATEGORI_WAKAF == "pesantren") {
        $icon_marker = base_url("vendor/assets/images/icon/merah.png");
        $icon_marker_pes = base_url("vendor/assets/images/icon/merah.png");
        $lat_pes .= $pengelola['lat'] . "|";
        $lon_pes .= $pengelola['lng'] . "|";
        $icon_pes .= $icon_marker . "|";
        $info_pes = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";
        $info_win_pes .= $info_pes;
    } else if ($key->KATEGORI_WAKAF == "masjid") {
        $icon_marker = base_url("vendor/assets/images/icon/kuning.png");
        $icon_marker_mas = base_url("vendor/assets/images/icon/kuning.png");
        $lat_mas .= $pengelola['lat'] . "|";
        $lon_mas .= $pengelola['lng'] . "|";
        $icon_mas .= $icon_marker . "|";
        $info_mas = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";
        $info_win_mas .= $info_mas;
    } else if ($key->KATEGORI_WAKAF == "sawah") {
        $icon_marker = base_url("vendor/assets/images/icon/biru.png");
        $icon_marker_wah = base_url("vendor/assets/images/icon/biru.png");
        $lat_wah .= $pengelola['lat'] . "|";
        $lon_wah .= $pengelola['lng'] . "|";
        $icon_wah .= $icon_marker . "|";
        $info_wah = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";
        $info_win_wah .= $info_wah;
    } else if ($key->KATEGORI_WAKAF == "wakaf_lainnya") {
        $icon_marker = base_url("vendor/assets/images/icon/hijau.png");
        $icon_marker_lain = base_url("vendor/assets/images/icon/hijau.png");
        $lat_lain .= $pengelola['lat'] . "|";
        $lon_lain .= $pengelola['lng'] . "|";
        $icon_lain .= $icon_marker . "|";
        $info_lain = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $key->nama_wakif . "<br>Alamat Wakif : " . $key->alamat_wakif . " <br>Luas Tanah : " . $key->luas_tanah . " <br>Luas Bangunan : " . $key->luas_bangunan . " <br>No. Sertifikat : " . $key->sertifikat . "<br>AJB : " . $key->ajb . "<br>AIW : " . $key->aiw . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $pengelola['nama'] . "<br> Pengelola " . $pengelola['pengelola'] . " <br> <br>Alamat Wakaf : " . $pengelola['lokasi'] . "<br> |";
        $info_win_lain .= $info_lain;
    }
    $icon_marker_lain = base_url("vendor/assets/images/icon/hijau.png");
    $lat .= $key->LATITUDE . "|";
    $lon .= $key->LONGITUDE . "|";
    $icon .= base_url("vendor/assets/images/icon/hijau.png") . "|";
    $info_ = "----- INFORMASI TANAH WAKAF ----- <br>Nama Wakif : " . $muwakif['NAMA_MUWAKIF'] . "<br>Alamat Wakif : " . $muwakif['ALAMAT_MUWAKIF'] . " <br>Luas Tanah : " . $key->LUAS_TANAH . " <br>Luas Bangunan : " . $key->LUAS_FUNGSI . " <br>No. Sertifikat : " . $key->BASTW_NOMOR . "<br>AJB : " . $key->SERTIFIKAT_NOMOR . "<br>AIW : " . $key->AIW_NOMOR . "<br><br>----- INFORMASI TANAH WAKAF ----- <br>Wakaf : " . $key->FUNGSI_WAKAF . "<br> Pengelola " .  $key->NAMA_PENGELOLA . " <br> <br>Alamat Wakaf : " . $key->LOKASI_TANAH . "<br> |";

    $info_win .= $info_;
}


$this->db->where("KATEGORI_WAKAF", "KEBUN/TNH KOSONG");
$res_lain = $this->db->get("objekwakaf");

$this->db->where("KATEGORI_WAKAF", "MASJID");
$res_mas = $this->db->get("objekwakaf");

$this->db->where("KATEGORI_WAKAF", "PESANTREN");
$res_pes = $this->db->get("objekwakaf");

$this->db->where("KATEGORI_WAKAF", "SAWAH");
$res_wah = $this->db->get("objekwakaf");

?>

<!-- ALL -->
<input type="hidden" id="marker_lat" value="<?= $lat ?>">
<input type="hidden" id="marker_lon" value="<?= $lon ?>">
<input type="hidden" id="marker_icon" value="<?= $icon ?>">
<input type="hidden" id="marker_window" value="<?= $info_win ?>">
<input type="hidden" id="marker_jumlah" value="<?= $res->num_rows() ?>">


<!-- MASJID -->
<input type="hidden" id="marker_lat_masjid" value="<?= $lat_mas ?>">
<input type="hidden" id="marker_lon_masjid" value="<?= $lon_mas ?>">
<input type="hidden" id="marker_icon_masjid" value="<?= $icon_mas ?>">
<input type="hidden" id="marker_window_masjid" value="<?= $info_win_mas ?>">
<input type="hidden" id="marker_jumlah_masjid" value="<?= $res_mas->num_rows() ?>">


<!-- LAINNYA -->
<input type="hidden" id="marker_lat_lainnya" value="<?= $lat_lain ?>">
<input type="hidden" id="marker_lon_lainnya" value="<?= $lon_lain ?>">
<input type="hidden" id="marker_icon_lainnya" value="<?= $icon_lain ?>">
<input type="hidden" id="marker_window_lainnya" value="<?= $info_win_lain ?>">
<input type="hidden" id="marker_jumlah_lainnya" value="<?= $res_lain->num_rows() ?>">


<!-- PESANTREN -->
<input type="hidden" id="marker_lat_pesantren" value="<?= $lat_pes ?>">
<input type="hidden" id="marker_lon_pesantren" value="<?= $lon_pes ?>">
<input type="hidden" id="marker_icon_pesantren" value="<?= $icon_pes ?>">
<input type="hidden" id="marker_window_pesantren" value="<?= $info_win_pes ?>">
<input type="hidden" id="marker_jumlah_pesantren" value="<?= $res_pes->num_rows() ?>">

<!-- SAWAH -->
<input type="hidden" id="marker_lat_sawah" value="<?= $lat_wah ?>">
<input type="hidden" id="marker_lon_sawah" value="<?= $lon_wah ?>">
<input type="hidden" id="marker_icon_sawah" value="<?= $icon_wah ?>">
<input type="hidden" id="marker_window_sawah" value="<?= $info_win_wah ?>">
<input type="hidden" id="marker_jumlah_sawah" value="<?= $res_wah->num_rows() ?>">


<!-- TRUE FALSE -->
<input type="hidden" id="cek_masjid" value='true'>
<input type="hidden" id="cek_pesantren" value='true'>
<input type="hidden" id="cek_lainnya" value='true'>
<input type="hidden" id="cek_sawah" value='true'>

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
        <input id="wakaf_masjid" type="checkbox" value="1" onclick="legend00()" checked> &nbsp;
        <img src="<?= base_url('vendor/assets/') ?>images/icon/kuning.png" width="12px"> Wakaf Masjid


        <br>
        <input id="wakaf_pesantren" type="checkbox" value="1" onclick="legend00()" checked> &nbsp;
        <img src="<?= base_url('vendor/assets/') ?>images/icon/merah.png" width="12px"> Wakaf Pesantren <br>


        <input id="wakaf_lainnya" type="checkbox" value="1" onclick="legend00()" checked> &nbsp;
        <img src="<?= base_url('vendor/assets/') ?>images/icon/hijau.png" width="12px"> Wakaf Lainnya <br>


        <input id="wakaf_sawah" type="checkbox" value="1" onclick="legend00()" checked> &nbsp;
        <img src="<?= base_url('vendor/assets/') ?>images/icon/biru.png" width="12px"> Wakaf Tanah Darat / Sawah <br>

    </div>
</div>
<script src="<?= base_url('vendor/') ?>assets/js/jquery-2.1.4.min.js"></script>
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
            zoom: 10,
            center: haightAshbury,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        drawmarker();
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

    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

    function legend00() {
        deleteMarkers();
        m_lat = "";
        m_lon = "";
        m_ico = "";
        m_info = "";
        m_jum = 0;

        var cek1 = false;
        var cek2 = false;
        var cek3 = false;
        var cek4 = false;

        if ($("#wakaf_masjid").is(":checked")) {
            m_lat += $("#marker_lat_masjid").val();
            m_lon += $("#marker_lon_masjid").val();
            m_ico += $("#marker_icon_masjid").val();
            m_info += $("#marker_window_masjid").val();
            m_jum += $("#marker_jumlah_masjid").val() * 1;
            cek1 = true;
        }
        if ($("#wakaf_lainnya").is(":checked")) {
            m_lat += $("#marker_lat_lainnya").val();
            m_lon += $("#marker_lon_lainnya").val();
            m_ico += $("#marker_icon_lainnya").val();
            m_info += $("#marker_window_lainnya").val();
            m_jum += $("#marker_jumlah_lainnya").val() * 1;
            cek2 = true;
            // alert("hay");
        }
        if ($("#wakaf_pesantren").is(":checked")) {
            m_lat += $("#marker_lat_pesantren").val();
            m_lon += $("#marker_lon_pesantren").val();
            m_ico += $("#marker_icon_pesantren").val();
            m_info += $("#marker_window_pesantren").val();
            m_jum += $("#marker_jumlah_pesantren").val() * 1;
            cek3 = true;
        }
        if ($("#wakaf_sawah").is(":checked")) {
            m_lat += $("#marker_lat_sawah").val();
            m_lon += $("#marker_lon_sawah").val();
            m_ico += $("#marker_icon_sawah").val();
            m_info += $("#marker_window_sawah").val();
            m_jum += $("#marker_jumlah_sawah").val() * 1;
            cek4 = true;
        }

        document.getElementById('marker_lat').value = m_lat;
        document.getElementById('marker_lon').value = m_lon;
        document.getElementById('marker_icon').value = m_ico;
        document.getElementById('marker_window').value = m_info;
        document.getElementById('marker_jumlah').value = m_jum;

        document.getElementById("cek_masjid").value = cek1;
        document.getElementById("cek_pesantren").value = cek2;
        document.getElementById("cek_lainnya").value = cek3;
        document.getElementById("cek_sawah").value = cek4;
        drawmarker();
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyCZPMgZUPk_PjxNl4KXT6zJIlHYslARZDU&libraries=visualization"></script>
<script>
    $('#pet2').attr('class', 'active');
</script>