<?php

$lat = "";
$lon = "";
$icon = "";
$info_ = "";
$info_win = "";

$res = $this->db->get("t_wakaf_peruntukan");

foreach ($res->result() as $key) {
    $cek = $this->db->get_where("t_wakaf_akt_penerimaan", array("id_jenis" => $key->id_peruntukan))->row_array();

    if ($cek['id_kategori' == "JW66095"]) {
        $icon_marker = base_url("vendor/assets/images/icon/merah.png");
    } else if ($cek['id_kategori' == "JW70512"]) {
        $icon_marker = base_url("vendor/assets/images/icon/kuning.png");
    } else {
        $icon_marker = base_url("vendor/assets/images/icon/biru.png");
    }

    $lat .= $key->lat . "|";
    $lon .= $key->lng . "|";
    $icon .= $icon_marker . "|";
    $info_ = "----- INFORMASI TANAH WAKAF ----- <br>Peruntukan Wakaf : " . $key->jenis_peruntukan . "<br>Alamat : " . $key->alamat . " <br>No. Telp : " . $key->no_telp . "<br> ";

    $info_win .= $info;
}


?>

<script>
var map;
var markers = [];
var infoWindow;


function initMap() {
    map = new google.maps.Map(document.getElementById('maptab'), {
        zoom: 12,
        center: new google.maps.LatLng(-7.03503043508787, 107.71006070141564),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
}

function drawmarker() {

}
</script>