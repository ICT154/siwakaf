<script>
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
            url: '<?= base_url('dash/ajx_s_in') ?>',
            type: 'post',
            data: {
                jenisinven: jenisinven,
                unit: unit,
                kead_unit: kead_unit,
                tem: tem
            },
            success: function(pesan) {
                $('#modalinven').modal('hide');
                $('#inputUnit').val("");
                $.ajax({
                    url: '<?= base_url('dash/ajx_gd_inv') ?>',
                    type: 'post',
                    data: {
                        tem
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

function a_w_lainnya() {
    $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: $(this).serialize(),
        success: function(pesan) {

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
        url: '<?= base_url('dash/ajx_s_e_bang') ?>',
        type: 'post',
        data: {
            idbang: idbang,
            jb: jb,
            anb: anb,
            spb: spb
        },
        success: function(pesan) {
            $.ajax({
                url: '<?= base_url('dash/ajx_gd_bang') ?>',
                type: 'post',
                data: {
                    // id: id,
                    tem: tem
                },
                success: function(pesan) {
                    $('#tbbang').html(pesan);
                    //$('#modalbangunan').modal('hide');
                    $('#modalbangunanedit').modal('hide');
                }
            });
        }
    });
}


function e_bang(x) {
    var id = $(x).data('id');
    $.ajax({
        url: '<?= base_url('dash/ajx_e_bang') ?>',
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


function d_bang(f) {
    var id = $(f).data('id');
    var tem = $('#tempsak').val();
    $.ajax({
        url: '<?= base_url('dash/ajx_d_bang') ?>',
        type: 'post',
        data: {
            id: id
        },
        success: function(msg) {
            $.ajax({
                url: '<?= base_url('dash/ajx_gd_bang') ?>',
                type: 'post',
                data: {
                    // id: id,
                    tem: tem
                },
                success: function(pesan) {
                    $('#tbbang').html(pesan);
                    //$('#modalbangunan').modal('hide');
                }
            });
        }
    });
}


function s_bang() {
    var jb = $('#inputJenisBang').val();
    var anb = $('#inputAtasNama').val();
    var spb = $('#inputSp').val();
    var tem = $('#tempsak').val();
    $.ajax({
        url: '<?= base_url('dash/ajx_s_bang_temp') ?>',
        type: 'post',
        data: {
            jb: jb,
            anb: anb,
            spb: spb,
            tem: tem
        },
        success: function(pesan) {
            $.ajax({
                url: '<?= base_url('dash/ajx_gd_bang') ?>',
                type: 'post',
                data: {
                    // id: id,
                    tem: tem
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

function addbangunan() {
    $('#modalbangunan').modal('show');
}



function e_sak(l) {
    var idsa = $(l).data('id');
    $('#modaleditsaksi').modal('show');

    $.ajax({
        url: '<?= base_url('dash/ajx_e_sak') ?>',
        type: 'post',
        data: {
            idsa: idsa
        },
        success: function(msg) {
            $('#editsaksi').html(msg);
        }
    });

}

function d_sak(p) {
    var idsa = $(p).data('id');
    var id = $('#idakt').val();
    var temsak = $('#tempsak').val();
    $.ajax({
        url: '<?= base_url('dash/ajx_d_sak') ?>',
        type: 'post',
        data: {
            idsa: idsa
        },
        success: function(pesan) {
            //alert('sip');s
            $.ajax({
                url: '<?= base_url('dash/ajx_gd_saksi') ?>',
                type: 'post',
                data: {
                    id: id,
                    temsak: temsak
                },
                success: function(pesan) {
                    $('#tbsaksi').html(pesan);
                }
            });
        }
    });
}

function addsaksi() {
    $('#modalsaksi').modal('show');
}

function s_saksi() {
    var id = $('#idakt').val();
    var namasaksi = $('#inputNamaSaksi').val();
    var statussaksi = $('#inputStatusSaksi').val();
    var temsak = $('#tempsak').val();

    if (namasaksi != '' && statussaksi != '') {
        $.ajax({
            url: '<?= base_url('dash/ajx_s_saksi_temp') ?>',
            type: 'post',
            data: {
                id: id,
                namasaksi: namasaksi,
                statussaksi: statussaksi,
                temsak: temsak
            },
            success: function(pesan) {
                $.ajax({
                    url: '<?= base_url('dash/ajx_gd_saksi') ?>',
                    type: 'post',
                    data: {
                        id: id,
                        temsak: temsak
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

$('#pen').attr('class', 'active open');
$('#penwak').attr('class', 'active');
// $('#pre').show();
$.ajax({
    url: '<?= base_url('dash/ajx_gd_pimpinan') ?>',
    type: 'post',
    success: function(pesan) {
        $('#opt_pimpinan').html(pesan);
    }
});

var id = $('#idakt').val();
var temsak = $('#tempsak').val();
$.ajax({
    url: '<?= base_url('dash/ajx_gd_saksi') ?>',
    type: 'post',
    data: {
        temsak: temsak
    },
    success: function(pesan) {
        $('#tbsaksi').html(pesan);
    }
});
</script>