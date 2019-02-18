@extends('app')
@section('title',"Update Dormitory | {$data->Name} | dormbook")
@section('styles')
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}"/>
<link href="{{ asset('css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

@endsection
@section('content')
    <form method="POST" action="/dorm/{{$data->ID}}/update">
<div class="row">

    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Update Dormitory Information</h4>
            </div>
            <div class="card-body ">
                    {{ csrf_field() }}
                    <label>Name</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="Name" id="dormName" required value="{{ $data->Name }}" readonly>
                    </div>
                    <label>Name of Owner</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Owner" name="Owner" required value="{{ $data->getOwner()->Name }}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Address Line 1</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address Line 1" name="AddressLine1" required value="{{ $data->AddressLine1 }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Address Line 2</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address Line 2" name="AddressLine2" value="{{ $data->AddressLine2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>City</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="City" name="City" required value="{{ $data->City }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Zip</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Zip" name="Zip" required  value="{{ $data->Zip }}">
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Latitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Latitude" id="Latitude" name="Latitude" required value="{{ $data->Latitude }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Longitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Longitude" id="Longitude" name="Longitude" required value="{{ $data->Longitude }}">
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
                        <input type="text" class="form-control" placeholder="Monthly Rate" name="Rate" required value="{{ $data->Rate }}">
                    </div>
                    <hr/>
                    <label># of Rooms</label>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Number of Rooms" name="Rooms" required step="1" value="{{ $data->Rooms }}">
                    </div>
                    <hr/>
                    <label>Mobile Number</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Mobile Number" name="MobileNumber" required value="{{ $data->MobileNumber }}">
                    </div>
                    <label>LandLine Number</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="LandLine Number" name="LandLineNumber" value="{{ $data->LandLineNumber }}">
                    </div>
                    <hr/>
                    <label>Business Permit ID</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Business ID" name="BusinessPermit" required value="{{ $data->BusinessPermit }}">
                    </div>
            </div>
        </div>
    </div>


    @php
        $amenities = json_decode($data->Amenities);
    @endphp
    <div class="col-md-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Facilities / Amenities</h4>
                    </div>
                    <div class="card-body ">
                        <div class="col-md-6">
                            @foreach(\App\Facility::all() as $facility)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input name="Amenities[]" class="form-check-input" type="checkbox" value="{{ $facility->ID }}" {{ in_array($facility->ID, $amenities, true)?"checked":"" }}>
                                        <span class="form-check-sign"></span>
                                        {{ $facility->Description }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-info btn-round">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </form>
<form method="post" action="/dorm/images/{{ $data->ID }}/upload" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">Images</h4>
                </div>
                <div class="card-body ">

                        <div class="file-loading">
                            <input id="file-0c" class="file" type="file" name="Images[]" multiple data-theme="explorer-fas">

                        </div>
                        <input type="submit" value="Submit"/>
                </div>
                <div class="card-footer ">


                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')

    <script src="{{ asset('js/sortable.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{ asset('fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{ asset('explorer-fas/theme.js')}}" type="text/javascript"></script>

    <script>
        $("#file-0c").fileinput({
            'theme': 'fas',
            'allowedFileExtensions': ['jpg', 'png', 'bmp'],
            'elErrorContainer': '#errorBlock',
            showUpload: false
            {{--'uploadUrl': '/dorm/images/{{ $data->ID }}/upload'--}}
        });
    </script>
    <script>
        var abc = 0;      // Declaring and defining global increment variable.
        $(document).ready(function() {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
            $('#add_more').click(function() {
                $(this).before($("<div/>", {
                    id: 'thumbnail'
                }).fadeIn('slow').append($("<input/>", {
                    name: 'Images[]',
                    type: 'file',
                    id: 'file'
                }), $("<br/><br/>")));
            });
// Following function will executes on change event of file input to select different file.
            $('body').on('change', '#file', function() {
                if (this.files && this.files[0]) {
                    abc += 1; // Incrementing global variable by 1.
                    var z = abc - 1;
                    var x = $(this).parent().find('#previewimg' + z).remove();
                    $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                    $(this).hide();
                    $("#abcd" + abc).append($("<img/>", {
                        id: 'img',
                        src: 'x.png',
                        alt: 'delete'
                    }).click(function() {
                        $(this).parent().parent().remove();
                    }));
                }
            });
// To Preview Image
            function imageIsLoaded(e) {
                $('#previewimg' + abc).attr('src', e.target.result);
            };
            $('#upload').click(function(e) {
                var name = $(":file").val();
                if (!name) {
                    alert("First Image Must Be Selected");
                    e.preventDefault();
                }
            });
        });
    </script>
<script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>
<script>

    var mymap = new L.map('mapid').setView([{{ $data->Latitude }}, {{ $data->Longitude }}], 16);

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

    var tileLayer = new L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
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

    var name = $("#dormName").val();
    var marker;
    marker = L.marker([{{ $data->Latitude }}, {{ $data->Longitude }}]).addTo(mymap).bindPopup(name)
        .openPopup();


    $(document).on('click', '#dropPin', function() {
        var name = $("#dormName").val();
        if(name=="") {
            alert('Please provide dorm\'s name first.');
            return;
        }

        if (marker) {
            mymap.removeLayer(marker);
        }

        marker = new L.marker([lat, lng]).addTo(mymap)
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
