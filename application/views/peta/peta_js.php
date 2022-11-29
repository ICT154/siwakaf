<script>
let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-7.03503043508787, 107.71006070141564),
        zoom: 12,
    });
    var hg = 1;
    var wd = hg;
    const icon_url = "<?= base_url("vendor/assets/images/icon/") ?>";
    const icons = {
        wakaf_lainnya: {
            icon: icon_url + "mark_dot_merah_bulet.gif",
            size: new google.maps.Size(5, 5)
        },
        wakaf_pesantren: {
            icon: icon_url + "mark_dot_green_buled.gif",
            size: new google.maps.Size(5, 5)
        },
        wakaf_masjid: {
            icon: icon_url + "Untitled-removebg-preview.png",
            size: new google.maps.Size(5, 5)
        },


    };

    const fitur = [
        <?php
            $get_data = $this->db->get('t_wakaf_akt_penerimaan');
            foreach ($get_data->result() as $kk) {
                $get_lat = $this->db->get_where("t_wakaf_peruntukan", array("id_peruntukan" => $kk->id_jenis), 1)->row_array();
                if ($kk->id_kategori == 'JW66095') {
                    echo "{
                        position: new google.maps.LatLng(" . $get_lat['lat'] . ", " . $get_lat['lng'] . "),
                        type:'wakaf_lainnya',
                    },";
                } elseif ($kk->id_kategori == 'JW70512') {
                    echo "{
                        position: new google.maps.LatLng(" . $get_lat['lat'] . ", " . $get_lat['lng'] . "),
                        type:'wakaf_pesantren',
                    },";
                } else {
                    echo "{
                        position: new google.maps.LatLng(" . $get_lat['lat'] . ", " . $get_lat['lng'] . "),
                        type:'wakaf_masjid',
                    },";
                }
            }
            ?>
    ];

    for (let i = 0; i < fitur.length; i++) {
        const marker = new google.maps.Marker({
            position: fitur[i].position,
            icon: icons[fitur[i].type].icon,
            map: map,
        });
    }

}
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=<?php echo $key; ?>&libraries=visualization">
</script>