@extends('app')
@section('title','Add New Dormitory')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}"/>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection
@section('content')
<form method="POST" action="/dorm/store">
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Add New Dormitory</h4>
            </div>
            <div class="card-body ">
                    {{ csrf_field() }}
                    <label>Name</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="Name" id="dormName" required>
                    </div>
                    <label>Name of Owner</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Owner" name="Owner" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Address Line 1</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address Line 1" name="AddressLine1" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Address Line 2</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address Line 2" name="AddressLine2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>City</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="City" name="City" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Zip</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Zip" name="Zip" required>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Latitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Latitude" id="Latitude" name="Latitude" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Longitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Longitude" id="Longitude" name="Longitude" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="button" value="Show Map" id="toggleMap"/>
                        </div>
                    </div>
                    <div class="row pt-1" id="mapdiv">
                        <div class="col-lg-12">
                            <div id="mapid" style="width: 100%; height: 500px;">

                            </div>
                        </div>
                    </div>
                    <hr/>
                    <label>Monthly Rate</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Monthly Rate" name="Rate" required>
                    </div>
                    <hr/>
                    <label># of Rooms</label>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Number of Rooms" name="Rooms" required step="1">
                    </div>
                    <hr/>
                    <label>Mobile Number</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Mobile Number" name="MobileNumber" required>
                    </div>
                    <label>LandLine Number</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="LandLine Number" name="LandLineNumber">
                    </div>
                    <hr/>
                    <label>Business Permit ID</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Business ID" name="BusinessPermit" required>
                    </div>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round">Submit</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>
<script>

    var mymap = L.map('mapid').setView([14.2917802,120.9115148], 11);
    new L.Control.Search({
        url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
        jsonpParam: 'json_callback',
        propertyName: 'display_name',
        propertyLoc: ['lat','lon'],
//        marker: L.circleMarker([0,0],{radius:30}),
        autoCollapse: true,
        autoType: false,
        minLength: 2
    }).addTo(mymap);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        minZoom: 9,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(mymap);


    var popup = L.popup();

    var lat = 0;
    var lng = 0;

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString()+".<br/><input class='btn btn-sm btn-info' type='button' value='Drop Pin' id='dropPin' />")
            .openOn(mymap);

        lat = e.latlng.lat;
        lng = e.latlng.lng;
    }

    mymap.on('click', onMapClick);

//    L.marker([14.19480, 120.88169]).addTo(mymap);

    $(document).on('click', '#dropPin', function() {
        var name = $("#dormName").val();
        if(name=="") {
            alert('Please provide dorm\'s name first.');
            return;
        }
        L.marker([lat, lng]).addTo(mymap)
            .bindPopup(name)
            .openPopup();

        $('#Latitude').val(lat);
        $('#Longitude').val(lng);

    });


    $('#toggleMap').on('click', function() {
        $('#mapdiv').toggle();
    });
</script>
@endsection
