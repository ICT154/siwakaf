<script>
function getform(i) {
    var id = i.value;
    if (id == 'JW70512') {
        $('#f_add_w_lainnya').hide();
        $('#f_add_w_lainnya').show();
        $('#tingkat').show();
        $('#alamatmuwakif').hide();
        document.getElementById('jen_gan').innerHTML = 'Nama Pesantren : ';
        document.getElementById('pen_gan').innerHTML = "Mudir'am : ";
        $('#inven').hide();


    } else if (id == 'JW73086') {
        $('#f_add_w_lainnya').hide();
        $('#f_add_w_lainnya').show();
        $('#tingkat').hide();
        $('#inven').show();
        $('#alamatmuwakif').hide();
        document.getElementById('jen_gan').innerHTML = 'Nama Masjid : ';
        document.getElementById('pen_gan').innerHTML = "DKM / Qoyimul Masjid : ";
    } else if (id == 'JW66095') {
        $('#f_add_w_lainnya').hide();
        $('#f_add_w_lainnya').show();
        $('#tingkat').hide();
        $('#alamatmuwakif').show();
        document.getElementById('jen_gan').innerHTML = 'Jenis Wakaf : ';
        document.getElementById('pen_gan').innerHTML = "Pengelola : ";
        $('#inven').hide();
    } else {
        $('#f_add_w_lainnya').hide();
        $('#f_add_w_lainnya').show();
        $('#tingkat').hide();
        $('#alamatmuwakif').show();
        document.getElementById('jen_gan').innerHTML = 'Jenis Wakaf : ';
        document.getElementById('pen_gan').innerHTML = "Pengelola : ";
        $('#inven').hide();
    }
}

//////////////////// SECTION  SAKSI ///////////////////////////

// GET ALL SAKSI BY ID

var id_utama = $("#idpwak").val();


$.ajax({
    url: '<?= base_url('ajx/ajx_gd_saksi') ?>',
    type: 'post',
    data: {
        id_utama
    },
    success: function(pesan) {
        $('#tbsaksi').html(pesan);
    }
});

// END GET ALL SAKSI BY ID


// ADD SAKSI 

function addsaksi() {
    $('#modalsaksi').modal('show');
}

function s_saksi() {
    var id = $('#idakt').val();
    var namasaksi = $('#inputNamaSaksi').val();
    var statussaksi = $('#inputStatusSaksi').val();
    // var temsak = $('#tempsak').val();

    if (namasaksi != '' && statussaksi != '') {
        $.ajax({
            url: '<?= base_url('ajx/ajx_s_saksi_temp') ?>',
            type: 'post',
            data: {
                id: id,
                namasaksi: namasaksi,
                statussaksi: statussaksi,
                id_utama: id_utama
            },
            success: function(pesan) {
                $.ajax({
                    url: '<?= base_url('ajx/ajx_gd_saksi') ?>',
                    type: 'post',
                    data: {
                        id_utama
                    },
                    success: function(pesan) {
                        $('#tbsaksi').html(pesan);
                    }
                });
                $('#modalsaksi').modal('hide');
                $('#inputNamaSaksi').val("");
                //$('#inputStatusSaksi').val("");
            }
        });
    } else {
        alert('Nama Belum Diisi');
    }
}

// END ADD SAKSI 

// EDIT SAKSI

function e_sak(l) {
    var idsa = $(l).data('id');
    $('#modaleditsaksi').modal('show');

    $.ajax({
        url: '<?= base_url('ajx/ajx_e_sak') ?>',
        type: 'post',
        data: {
            idsa: idsa
        },
        success: function(msg) {
            $('#editsaksi').html(msg);
        }
    });

}

function s_e_saksi() {
    var id = $('#inputIdSaksi').val();
    var namasaksi = $('#inputNamaSaksiEdit').val();
    var statussaksi = $('#inputStatusSaksiEdit').val();
    // var temsak = $('#tempsak').val();
    if (namasaksi != '' && statussaksi != '') {

        $.ajax({
            url: '<?= base_url('ajx/ajx_s_e_sak') ?>',
            type: 'post',
            data: {
                id: id,
                namasaksi: namasaksi,
                statussaksi: statussaksi
            },
            success: function(msg) {
                $.ajax({
                    url: '<?= base_url('ajx/ajx_gd_saksi') ?>',
                    type: 'post',
                    data: {
                        // id: id,
                        id_utama
                    },
                    success: function(pesan) {
                        $('#tbsaksi').html(pesan);
                        $('#modaleditsaksi').modal('hide');
                    }
                });
            }
        });

    } else {
        alert('Nama Belum Diisi');
    }

}

// end edit saksi

/// delete saksi ///
function d_sak(p) {
    var idsa = $(p).data('id');
    // var id = $('#idakt').val();
    // var temsak = $('#tempsak').val();
    $.ajax({
        url: '<?= base_url('ajx/ajx_d_sak') ?>',
        type: 'post',
        data: {
            idsa: idsa
        },
        success: function(pesan) {
            //alert('sip');s
            $.ajax({
                url: '<?= base_url('ajx/ajx_gd_saksi') ?>',
                type: 'post',
                data: {
                    // id: id,
                    id_utama
                },
                success: function(pesan) {
                    $('#tbsaksi').html(pesan);
                    $('#modaleditsaksi').modal('hide');
                }
            });
        }
    });
}

////////////////////// END SECTION SAKSI ////////////////////////



/////////////// SECTION BANGUNAN /////////////////////

//////////// get bangunan by id utama /////////////////

$.ajax({
    url: '<?= base_url('ajx/ajx_gd_bang') ?>',
    type: 'post',
    data: {
        // id: id,
        id_utama
    },
    success: function(pesan) {
        $('#tbbang').html(pesan);
        $('#inputAtasNama').val("");
        $('#modalbangunan').modal('hide');
    }
});


///////////////// ADD BANGUNAN ////////////////////
function addbangunan() {
    $('#modalbangunan').modal('show');
}

function s_bang() {
    var jb = $('#inputJenisBang').val();
    var anb = $('#inputAtasNama').val();
    var spb = $('#inputSp').val();
    var tem = $('#tempsak').val();
    $.ajax({
        url: '<?= base_url('ajx/ajx_s_bang_temp') ?>',
        type: 'post',
        data: {
            jb: jb,
            anb: anb,
            spb: spb,
            id_utama
        },
        success: function(pesan) {
            $.ajax({
                url: '<?= base_url('ajx/ajx_gd_bang') ?>',
                type: 'post',
                data: {
                    // id: id,
                    id_utama
                },
                success: function(pesan) {
                    $('#tbbang').html(pesan);
                    $('#inputAtasNama').val("");
                    $('#modalbangunan').modal('hide');
                }
            });
        }
    });
}
//////////// end add bangunan ////////////////////

/////// edit bangunan 
function e_bang(x) {
    var id = $(x).data('id');
    $.ajax({
        url: '<?= base_url('ajx/ajx_e_bang') ?>',
        type: 'post',
        data: {
            id: id
        },
        success: function(pesan) {
            $('#modalbangunanedit').modal('show');
            $('#herebang').html(pesan);
        }
    });
}

function s_e_bang() {
    var idbang = $('#inputIdBang').val();
    var jb = $('#inputJenisBangEdit').val();
    var anb = $('#inputNamaBangEdit').val();
    var spb = $('#inputSpEdit').val();
    var tem = $('#tempsak').val();

    $.ajax({
        url: '<?= base_url('ajx/ajx_s_e_bang') ?>',
        type: 'post',
        data: {
            idbang: idbang,
            jb: jb,
            anb: anb,
            spb: spb
        },
        success: function(pesan) {
            $.ajax({
                url: '<?= base_url('ajx/ajx_gd_bang') ?>',
                type: 'post',
                data: {
                    // id: id,
                    id_utama
                },
                success: function(pesan) {
                    $('#tbbang').html(pesan);
                    $('#inputAtasNama').val("");
                    $('#modalbangunanedit').modal('edit');
                }
            });
        }
    });
}

/////// end edit bangunan



/////////// delete bangunan 

function d_bang(f) {
    var id = $(f).data('id');
    var tem = $('#tempsak').val();
    $.ajax({
        url: '<?= base_url('ajx/ajx_d_bang') ?>',
        type: 'post',
        data: {
            id: id
        },
        success: function(msg) {
            $.ajax({
                url: '<?= base_url('ajx/ajx_gd_bang') ?>',
                type: 'post',
                data: {
                    // id: id,
                    id_utama
                },
                success: function(pesan) {
                    $('#tbbang').html(pesan);
                    // $('#inputAtasNama').val("");
                    // $('#modalbangunanedit').modal('edit');
                }
            });
        }
    });
}

////////// END SECTION BANGUNAN ////////////////

///////////// SECTION INVENTARIS //////////////


//// get all inven by idutama 
$.ajax({
    url: '<?= base_url('ajx/ajx_gd_inv') ?>',
    type: 'post',
    data: {
        id_utama
    },
    success: function(pesan) {
        $('#tinv').html(pesan);
    }
});
///////////////////



/////////// add inven

function addinven() {
    // alert('p');sf
    $('#modalinven').modal('show');
}

function s_inven() {
    var jenisinven = $('#inputJenisInven').val();
    var unit = $('#inputUnit').val();
    var kead_unit = $('#inputStatInvenUnit').val();
    var tem = $('#tempsak').val();

    if (unit != '') {
        $.ajax({
            url: '<?= base_url('ajx/ajx_s_in') ?>',
            type: 'post',
            data: {
                jenisinven: jenisinven,
                unit: unit,
                kead_unit: kead_unit,
                id_utama
            },
            success: function(pesan) {
                $('#modalinven').modal('hide');
                $('#inputUnit').val("");
                $.ajax({
                    url: '<?= base_url('ajx/ajx_gd_inv') ?>',
                    type: 'post',
                    data: {
                        id_utama
                    },
                    success: function(pesan) {
                        $('#tinv').html(pesan);
                    }
                });
            }
        });
    } else {
        alert('Harap Isi Dengan Benar !');
    }
}
////// end edit



///////// edit inven 

function e_inv(f) {
    var id = $(f).data('id');
    $.ajax({
        url: "<?= base_url("ajx/ajx_e_inv") ?>",
        type: "post",
        data: {
            id
        },
        success: function(msg) {
            $('#modalinven_edit').modal('show');
            $("#edit_inv").html(msg);
        }
    });
}


function s_e_inven() {
    var jenisinven = $('#inputJenisInven_edit').val();
    var unit = $('#inputUnit_edit').val();
    var kead_unit = $('#inputStatInvenUnit_edit').val();
    var id = $('#id_inv_hid').val();
    $.ajax({
        url: "<?= base_url("ajx/ajx_s_e_inv") ?>",
        type: "post",
        data: {
            jenisinven: jenisinven,
            unit: unit,
            kead_unit: kead_unit,
            id: id
        },
        success: function(msg) {
            $('#modalinven_edit').modal('hide');
            $.ajax({
                url: '<?= base_url('ajx/ajx_gd_inv') ?>',
                type: 'post',
                data: {
                    id_utama
                },
                success: function(pesan) {
                    $('#tinv').html(pesan);
                }
            });
        }
    });
}
////// end edit inv /

///// delete inv 
function d_inv(f) {
    var id = $(f).data('id');
    $.ajax({
        url: "<?= base_url("ajx/ajx_d_inv") ?>",
        type: "post",
        data: {
            id
        },
        success: function(msg) {
            $.ajax({
                url: '<?= base_url('ajx/ajx_gd_inv') ?>',
                type: 'post',
                data: {
                    id_utama
                },
                success: function(pesan) {
                    $('#tinv').html(pesan);
                }
            });
        }
    });
}


////////// end inventory
</script>