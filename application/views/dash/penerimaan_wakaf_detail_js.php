<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>


<script>
var id = $('#inputId').val();
$.ajax({
    url: "<?= base_url('dash/ajx_g_s_w') ?>",
    type: 'post',
    data: {
        id: id
    },
    success: function(msg) {
        $('#saksihere').html(msg);
    }
});
$.ajax({
    url: "<?= base_url('dash/ajx_g_b_w') ?>",
    type: 'post',
    data: {
        id: id
    },
    success: function(msg) {
        $('#bang_here').html(msg);
    }
});

$.ajax({
    url: "<?= base_url('dash/ajx_g_in_w') ?>",
    type: 'post',
    data: {
        id: id
    },
    success: function(msg) {
        $('#inv_here').html(msg);
    }
});


$('#pen').attr('class', 'active open');
$('#penwak').attr('class', 'active');

var kat = $('#katwak').val();
if (kat == 'JW70512') {
    document.getElementById('kat_gan').innerHTML = '3. Nama Pesantren : ';
    document.getElementById('Pengelola').innerHTML = "5. Mudir'am : ";
    document.getElementById('Status').innerHTML = "6. Status Wakaf : ";
    document.getElementById('Muwakif').innerHTML = "7. Muwakif : ";
    document.getElementById('Sertifikat').innerHTML = "8. No. Sertifikat/AJB/AUW  : ";
    document.getElementById('Luas').innerHTML = "8. Luas Pesantren : ";
    document.getElementById('Luas').innerHTML = "9. Luas Pesantren : ";
    document.getElementById('Estimasi').innerHTML = "10. Estimasi Nilai Bangunan : ";
    document.getElementById('Estimasi2').innerHTML = " Estimasi Nilai Tanah : ";
    document.getElementById('Bangunan').innerHTML = "12. Bangunan Lain Dilingkungan Tanah Wakaf Pesantren: ";
    $('#Tingkat').show();
    $('#Inventaris').hide();
} else if (kat == 'JW73086') {
    $('#Tingkat').hide();
    $('#Tingkat2').hide();
    document.getElementById('kat_gan').innerHTML = '3. Nama Masjid : ';
} else {
    $('#Tingkat').hide();
    $('#Inventaris').hide();
    $('#Tingkat2').hide();
    document.getElementById('Bangunan').innerHTML = "12. Bangunan Lain Dilingkungan Tanah Wakaf : ";
}
</script>