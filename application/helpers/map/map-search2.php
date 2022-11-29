<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <style>
        #map {
            width: 100%;
            height: 300px;
        }

        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #searchInput {
            background-color: #fff;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 60%;
        }

        #searchInput:focus {
            border-color: #4d90fe;
        }
    </style>

    <noscript>
</head></noscript><?php /*to trap virustotal*/ ?>
</head>

<body>

    <input id="searchInput" class="controls" type="search" placeholder="Enter a location">

    <div class="row" style="padding:20px; border: #CCCCCC dotted 1px;">
        <div class="alert alert-info">Places Search Box using Google Maps</div>

        <div class="col">
            <div id="map">
            </div>
        </div>
    </div>
    <div class="row">
        <ul id="geoData">
            <li><b>Full Address:</b> <span id="location"></span></li>
            <li><b>Postal Code:</b> <span id="postal_code"></span></li>
            <li><b>Country:</b> <span id="country"></span></li>
            <li><b>Latitude:</b> <span id="lat_mapsearch"><?php if (isset($_GET["lat"])) {
                                                                echo $_GET["lat"];
                                                            } ?></span></li>
            <li><b>Longitude:</b> <span id="lon_mapsearch"><?php if (isset($_GET["lon"])) {
                                                                echo $_GET["lon"];
                                                            } ?></span></li>
        </ul>
        <button type="button" value="1" onclick="inputlatlon()" class="btn btn-white btn-danger btn-sm">COPY
            LATITUDE &amp; LONGITUDE TO INPUT</button>

        <br><br>
        <i style="color: #FF0000">note : silahkan isi di pencarian, lalu drag icon agar lebih presisi</i>
    </div>

    <script>
        var map;
        var marker;
        var infowindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -7.03431739684084,
                    lng: 107.70762026491343
                },
                zoom: 10
            });

            var input = document.getElementById('searchInput');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            infowindow = new google.maps.InfoWindow();

            marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
                draggable: true,
                animation: google.maps.Animation.DROP
            });

            var geocoder = new google.maps.Geocoder();

            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                marker.setIcon(({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                infowindow.open(map, marker);

                //Location details
                for (var i = 0; i < place.address_components.length; i++) {
                    if (place.address_components[i].types[0] == 'postal_code') {
                        document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
                    }
                    if (place.address_components[i].types[0] == 'country') {
                        document.getElementById('country').innerHTML = place.address_components[i].long_name;
                    }
                }
                document.getElementById('location').innerHTML = place.formatted_address;
                document.getElementById('lat_mapsearch').innerHTML = place.geometry.location.lat();
                document.getElementById('lon_mapsearch').innerHTML = place.geometry.location.lng();

            });

            google.maps.event.addListener(marker, "dragstart", function(event) {
                marker.setAnimation(3); // raise
            });

            google.maps.event.addListener(marker, "dragend", function(event) {
                marker.setAnimation(4); // fall
            });

            //--- drag ---				

            google.maps.event.addListener(marker, 'dragend', function() {
                geocoder.geocode({
                    'latLng': marker.getPosition()
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            //$('#address').val(results[0].formatted_address);							
                            //-----
                            var postCode = extractFromAdress(results[0].address_components, "postal_code");
                            var street = extractFromAdress(results[0].address_components, "route");
                            var town = extractFromAdress(results[0].address_components, "locality");
                            var country = extractFromAdress(results[0].address_components, "country");
                            var lvl01 = extractFromAdress(results[0].address_components,
                                "administrative_area_level_1");
                            var lvl02 = extractFromAdress(results[0].address_components,
                                "administrative_area_level_2");
                            var lvl03 = extractFromAdress(results[0].address_components,
                                "administrative_area_level_3");
                            var lvl04 = extractFromAdress(results[0].address_components,
                                "administrative_area_level_4");
                            //$('#a_kota').val(lvl02);
                            //$('#a_kec').val(lvl03);
                            //$('#a_kel').val(lvl04);
                            //--------							
                            //$('#latitude').val(marker.getPosition().lat());
                            //$('#longitude').val(marker.getPosition().lng());

                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);

                            //Location details
                            document.getElementById('postal_code').innerHTML = postCode;
                            document.getElementById('country').innerHTML = country;
                            document.getElementById('location').innerHTML = results[0].formatted_address;
                            document.getElementById('lat_mapsearch').innerHTML = marker.getPosition().lat();
                            document.getElementById('lon_mapsearch').innerHTML = marker.getPosition().lng();

                        }
                    }
                });
            });

            //--- drag end--- 

            <?php if (isset($_GET["lat"])) {
                if ($_GET["lat"] <> "" and $_GET["lon"] <> "") { ?>

                    myLatlng = new google.maps.LatLng(<?php echo $_GET["lat"] * 1; ?>, <?php echo $_GET["lon"] * 1; ?>);
                    marker.setPosition(myLatlng);
                    marker.setVisible(true);
                    map.setCenter(myLatlng);
                    map.setZoom(15);
                    //---
                    geocoder.geocode({
                        'latLng': marker.getPosition()
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                //$('#address').val(results[0].formatted_address);							
                                //-----
                                var postCode = extractFromAdress(results[0].address_components, "postal_code");
                                var street = extractFromAdress(results[0].address_components, "route");
                                var town = extractFromAdress(results[0].address_components, "locality");
                                var country = extractFromAdress(results[0].address_components, "country");
                                var lvl01 = extractFromAdress(results[0].address_components, "administrative_area_level_1");
                                var lvl02 = extractFromAdress(results[0].address_components, "administrative_area_level_2");
                                var lvl03 = extractFromAdress(results[0].address_components, "administrative_area_level_3");
                                var lvl04 = extractFromAdress(results[0].address_components, "administrative_area_level_4");
                                //$('#a_kota').val(lvl02);
                                //$('#a_kec').val(lvl03);
                                //$('#a_kel').val(lvl04);
                                //--------							
                                //$('#latitude').val(marker.getPosition().lat());
                                //$('#longitude').val(marker.getPosition().lng());

                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map, marker);

                                //Location details
                                document.getElementById('postal_code').innerHTML = postCode;
                                document.getElementById('country').innerHTML = country;
                                document.getElementById('location').innerHTML = results[0].formatted_address;
                                document.getElementById('lat_mapsearch').innerHTML = marker.getPosition().lat();
                                document.getElementById('lon_mapsearch').innerHTML = marker.getPosition().lng();

                            }
                        }
                    });

            <?php }
            } ?>

        }



        function extractFromAdress(components, type) {
            for (var i = 0; i < components.length; i++)
                for (var j = 0; j < components[i].types.length; j++)
                    if (components[i].types[j] == type) return components[i].long_name;
            return "";
        }

        function pindahCoor(lat00, lon00) {
            myLatlng = new google.maps.LatLng(lat00, lon00);
            marker.setPosition(myLatlng);
            marker.setVisible(true);
            map.setCenter(myLatlng);
            map.setZoom(14);
            //---
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                'latLng': marker.getPosition()
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        //$('#address').val(results[0].formatted_address);							
                        //-----
                        var postCode = extractFromAdress(results[0].address_components, "postal_code");
                        var street = extractFromAdress(results[0].address_components, "route");
                        var town = extractFromAdress(results[0].address_components, "locality");
                        var country = extractFromAdress(results[0].address_components, "country");
                        var lvl01 = extractFromAdress(results[0].address_components, "administrative_area_level_1");
                        var lvl02 = extractFromAdress(results[0].address_components, "administrative_area_level_2");
                        var lvl03 = extractFromAdress(results[0].address_components, "administrative_area_level_3");
                        var lvl04 = extractFromAdress(results[0].address_components, "administrative_area_level_4");
                        //$('#a_kota').val(lvl02);
                        //$('#a_kec').val(lvl03);
                        //$('#a_kel').val(lvl04);
                        //--------							
                        //$('#latitude').val(marker.getPosition().lat());
                        //$('#longitude').val(marker.getPosition().lng());

                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);

                        //Location details
                        document.getElementById('postal_code').innerHTML = postCode;
                        document.getElementById('country').innerHTML = country;
                        document.getElementById('location').innerHTML = results[0].formatted_address;
                        document.getElementById('lat_mapsearch').innerHTML = marker.getPosition().lat();
                        document.getElementById('lon_mapsearch').innerHTML = marker.getPosition().lng();

                    }
                }
            });
        }
    </script>
    <?php require_once('../siwakaf/application/helpers/map/set-gmap-key.php'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $gmap_key; ?>&libraries=places&callback=initMap" async defer></script>

    <?php /*<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> */ ?>
</body>

</html>