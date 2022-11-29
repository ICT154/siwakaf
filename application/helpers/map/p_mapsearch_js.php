<div class="popup" id="dlg_form_map" style="overflow:auto; z-index: 20 !important; ">
    <div class="popupdiv"
        style="width:80%; border: #000000 3px solid;background:#FFFFFF; position:absolute; top:7%; left:10%;">
        <div align="center" onclick="$('.popup').hide(); $('body').removeClass('overflow-hidden');" title="Close"
            class="mTfktip xhov" style="position:absolute;top:-10px; right:-10px; z-index: 99999">X</div>
        <h5 style=" margin:1px; padding:5px; background:#0099CC; text-align:center; color:#FFFFFF;"> <b>MAP</b> </h5>

        <div style="position:absolute; left: 50%; top:200px; display:none; z-index: 99997" id="loader_map">
            <div class="lds-roller">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <div style="padding:30px; height: 500px;" id="mapmap">
            Loading ...
        </div>
        <input type="hidden" id="latMapLoad" value="">
        <input type="hidden" id="adaMapLoad" value="0">
    </div>
</div>


<script>
//=== Map search START ---
function maptab00() {
    $("#loader_map").show();
    $("#mapmap").load("ajx/map-search2.php", function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            $("#loader_map").hide(); /*alert("External content loaded successfully!"); */
            $("#adaMapLoad").val("1");
            $("#searchInput").focus();
        }
        if (statusTxt == "error") {
            alert("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });
}

function loadlatlon() {
    $("#loader_map").show();
    lat = document.getElementById("lat").value;
    lon = document.getElementById("lon").value;
    $("#mapmap").load("ajx/map-search2.php?lat=" + lat + "&lon=" + lon, function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            $("#loader_map").hide(); /*alert("External content loaded successfully!"); */
            $("#adaMapLoad").val("1");
            $("#latMapLoad").val(lat);
        }
        if (statusTxt == "error") {
            alert("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });
}

function inputlatlon() {
    lat = document.getElementById("lat_mapsearch").innerHTML;
    if (lat == "") {
        alert("Harap Tentukan dulu koordinat!");
    } else {
        document.getElementById("lat").value = lat;
        document.getElementById("lon").value = document.getElementById("lon_mapsearch").innerHTML;

        document.getElementById("latMapLoad").value = document.getElementById("lat_mapsearch").innerHTML;
        $("#dlg_form_map").hide();
        $('body').removeClass('overflow-hidden');

        $("#lon").focus();

    }
}

$(document).ready(function() {
    //maptab00();
    <?php /*if($jform=="edit") { if($data["gps_lon"]<>"") {?> loadlatlon();
    <?php }} */ ?>
});

function getMapCoor() {
    $("#dlg_form_map").show();
    $('body').addClass('overflow-hidden');
    $("#searchInput").focus();
    if ($("#adaMapLoad").val() == "0") {
        loadlatlon();
    } else {
        lat00 = $("#lat").val();
        lon00 = $("#lon").val();

        if (lat00 != $("#latMapLoad").val()) {
            console.log("beda " + lat00 + " " + $("#latMapLoad").val());
            pindahCoor(lat00, lon00);
        }
    }
}
//=== Map search END ---
</script>