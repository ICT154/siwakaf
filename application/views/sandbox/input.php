<input type="checkbox" id="satu" value="1" onclick="chek()" checked>

<input type="checkbox" id="dua" value="2" onclick="chek()" checked>
<input type="checkbox" id="tiga" value="3" onclick="chek()" checked>


<input type="text" id="disini" value="truetruetrue">
<script>
function chek() {
    var cek1 = false;
    var cek2 = false;
    var cek3 = false;
    if ($("#satu").is(':checked')) {
        cek1 = true;
    }
    if ($("#dua").is(":checked")) {
        cek2 = true;
    }
    if ($("#tiga").is(":checked")) {
        cek3 = true;
    }

    document.getElementById('disini').value = cek1 + "" + cek2 + "" + cek3 + "";
}
</script>
<script src="<?= base_url('vendor/') ?>assets/js/jquery-2.1.4.min.js"></script>