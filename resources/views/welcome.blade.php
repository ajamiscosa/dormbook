<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="google-site-verification" content="exLc2jIt56S6YHs_Rjiv5vGZMQ2GEdTH-3gut9HbU0k" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        {{--{!! $map['js'] !!}--}}
        {{--<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyD77buv2NVIN7gBAnH_Nr-OHG6nhj-t-Nk"></script>--}}
        {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCRELnOMmeXiIBmUl50GT4AZNOPxmKldSY&sensor=true&v=3"></script>--}}
        {{--<script type="text/javascript">--}}
            {{--//<![CDATA[ var map;--}}
            {{--// Global declaration of the map--}}
            {{--var lat_longs_map = new Array();--}}
            {{--var markers_map = new Array();--}}
            {{--var iw_map;--}}
            {{--var geocoder;--}}
            {{--// Global declaration of geocoder for reverser location from latLng--}}
            {{--function initialize_map() {--}}
                {{--var myLatlng = new google.maps.LatLng(14.1920384, 120.8728615);--}}
                {{--iw_map = new google.maps.InfoWindow();--}}
                {{--var myOptions = { zoom: 14, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false };--}}
                {{--map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);geocoder = new google.maps.Geocoder;--}}
            {{--}--}}
            {{--function onstaged_map(){}--}}
            {{--function createMarker_map(markerOptions) { var marker = new google.maps.Marker(markerOptions); markers_map.push(marker); lat_longs_map.push(marker.getPosition()); return marker; }--}}
            {{--google.maps.event.addDomListener(window, "load", initialize_map);--}}
            {{--function reverseGeocode(latlng, callback, obj) {--}}
{{--//callback must be function //--}}
                {{--var latlng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};--}}
                {{--geocoder.geocode({'location': latlng}, function(results, status) { if (status === google.maps.GeocoderStatus.OK) { if (results[1]) { callback(200, results[1].formatted_address, obj ); } else { callback(404, "Not found.", obj); } } else { callback(400, "Something wrong went.", obj ); } }); }--}}
            {{--//]]>--}}
        {{--</script>--}}

        <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
        <style>
            .map {
                height: 100%;
                width: 100%;
            }
        </style>
        <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
        <title>OpenLayers example</title>
    </head>
    <body>
    <div id="map" class="map"></div>
    <script type="text/javascript">
        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([120.8728615, 14.1920384]),
                zoom: 15
            })
        });
    </script>
    </body>

</html>
