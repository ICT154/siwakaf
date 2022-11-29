<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style type="text/css">
/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
    width: 100%;
    height: 300px;
}

.pac-container {
    z-index: 9000 !important;
}
</style>
<!-- <div class="show" id="show" style="display: none;">
     <input id="pac-input" class="form-control" type="text" placeholder="Search Box" style="display: none;" />
     <div id="map" style="display: none;"></div>
 </div> -->

<!-- Modal -->
<div class="modal fade text-center" id="modalmaps2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <input id="pac-input" class="form-control" type="text" placeholder="Search Box" /> -->
                MAPS
            </div>
            <div class="modal-body" id="p_show">
                <!-- <input id="pac-input" class="form-control" type="text" placeholder="Search Box" />
                 <div id="map"></div> -->
                <?php require_once('../siwakaf/application/helpers/map/map-search2.php') ?>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary" onclick="inputlatlon()">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="latMapLoad" value="">
<input type="hidden" id="adaMapLoad" value="0">

<!-- <input id="pac-input" class="form-control" type="text" placeholder="Search Box" /> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcr0FQt1jrVKdhxVNP-PkodELgq5iFkok&libraries=places">
 </script> -->
<script>
function getMapCoor2() {
    $('#modalmaps2').modal('show');
}

function inputlatlon() {
    lat = document.getElementById("lat_mapsearch").innerHTML;
    if (lat == "") {
        alert("Harap Tentukan dulu koordinat!");
    } else {
        // document.getElementById("lat").value = lat;
        // document.getElementById("lon").value = document.getElementById("lon_mapsearch").innerHTML;
        document.getElementById("inputAlamatMuwakif").value = document.getElementById('location').innerHTML;
        // document.getElementById("latMapLoad").value = document.getElementById("lat_mapsearch").innerHTML;
        $('#modalmaps2').modal('hide');
        // $('#modalmaps').modal('toggle');

        //$("#lon").focus();

    }
}
</script>