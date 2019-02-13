@extends('app')
@section('title','Add New Dormitory')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Add New Dormitory</h4>
            </div>
            <div class="card-body ">
                <form method="#" action="#">
                    <label>Name</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <label>Name of Owner</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Owner">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Address Line 1</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address Line 1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Address Line 2</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address Line 2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>City</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Zip</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Zip">
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Latitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Latitude" id="Latitude">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Longitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Longitude" id="Longitude">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="button" value="Show Map"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="mapid" style="width: 100%; height: 500px;">

                            </div>
                        </div>
                    </div>
                    <hr/>
                    <label>Monthly Rate</label>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Monthly Rate">
                    </div>
                    <hr/>
                    <label>Mobile Number</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Mobile Number">
                    </div>
                    <label>LandLine Number</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="LandLine Number">
                    </div>
                    <hr/>
                    <label>Business Permit ID</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Business ID">
                    </div>
                </form>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
<script>

    var mymap = L.map('mapid').setView([14.19480, 120.88169], 14);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(mymap);


    L.marker([14.19480, 120.88169]).addTo(mymap)
        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        .openPopup();

    var popup = L.popup();

    var lat = 0;
    var lng = 0;

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString()+".<br/><input type='button' value='Drop Pin' id='dropPin' />")
            .openOn(mymap);

        lat = e.latlng.lat;
        lng = e.latlng.lng;
    }

    mymap.on('click', onMapClick);

//    L.marker([14.19480, 120.88169]).addTo(mymap);

    $(document).on('click', '#dropPin', function() {
        L.marker([lat, lng]).addTo(mymap)
            .bindPopup('Taena.<br> Easily customizable.')
            .openPopup();

        $('#Latitude').val(lat);
        $('#Longitude').val(lng);

    });
</script>
@endsection
