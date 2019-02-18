@extends('app')
@section('title',"Update Dormitory | {$data->Name} | dormbook")
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
        <div class="row">

            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title"><strong>{{ $data->Name }}</strong> Information</h4> <a href="/dorm/update/{{ $data->ID }}" class="btn btn-sm">Update</a>
                    </div>
                    <div class="card-body ">
                        <label>Name</label>
                        <div class="form-group">
                            {{ $data->Name }}
                        </div>
                        <label>Name of Owner</label>
                        <div class="form-group">
                            {{ $data->getOwner()->Name }}
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Address Line 1</label>
                                <div class="form-group">
                                    {{ $data->AddressLine1 }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Address Line 2</label>
                                <div class="form-group">
                                    {{ $data->AddressLine2 }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>City</label>
                                <div class="form-group">
                                    {{ $data->City }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Zip</label>
                                <div class="form-group">
                                    {{ $data->Zip }}
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Latitude</label>
                                <div class="form-group">
                                    {{ $data->Latitude }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Longitude</label>
                                <div class="form-group">
                                    {{ $data->Longitude }}
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
                            {{ $data->Rate }}
                        </div>
                        <hr/>
                        <label># of Rooms</label>
                        <div class="form-group">
                            {{ $data->Rooms }}
                        </div>
                        <hr/>
                        <label>Mobile Number</label>
                        <div class="form-group">
                            {{ $data->MobileNumber }}
                        </div>
                        <label>LandLine Number</label>
                        <div class="form-group">
                            {{ $data->LandLineNumber }}
                        </div>
                        <hr/>
                        <label>Business Permit ID</label>
                        <div class="form-group">
                            {{ $data->BusinessPermit }}
                        </div>
                    </div>
                </div>
            </div>


            @php
                $amenities = json_decode($data->Amenities);
            @endphp
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Facilities / Amenities</h4>
                    </div>
                    <div class="card-body ">
                        <div class="col-md-6">
                            @foreach(\App\Facility::all() as $facility)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input name="Amenities[]" class="form-check-input" type="checkbox" value="{{ $facility->ID }}" {{ in_array($facility->ID, $amenities, true)?"checked":"" }} onclick="return false;">
                                        <span class="form-check-sign"></span>
                                        {{ $facility->Description }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>
    <script>

        var mymap = new L.map('mapid').setView([{{ $data->Latitude }}, {{ $data->Longitude }}], 16);


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


        var name = $("#dormName").val();
        var marker;
        marker = L.marker([{{ $data->Latitude }}, {{ $data->Longitude }}]).addTo(mymap).bindPopup('{{ $data->Name }}')
            .openPopup();



        $('#toggleMap').on('click', function() {
            $('#mapdiv').toggle();
        });
    </script>
@endsection
