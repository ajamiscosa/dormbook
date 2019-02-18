<!DOCTYPE html>
<!-- saved from url=(0048)https://getbootstrap.com/docs/4.0/examples/blog/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>dormbook - cvsu interactive dormitory listing</title>

    <!-- Bootstrap core CSS -->
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/paper-dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}"/>

    <!-- Custom styles for this template -->
    <style>

        a {
            color: #454F59;
            text-decoration: none; /* no underline */
        }
        a:link{
            color: #454F59;
            text-decoration: none; /* no underline */
        }
        a:visited{
            color: #000;
            text-decoration: none; /* no underline */
        }
        a:hover {
            color: #454F59;
            text-decoration: none; /* no underline */
        }
    </style>
</head>

<body style=" background-color: #f4f3ef; " >

<div class="container" style="width: 640px;">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-lg-12 text-center">
                <img src="images/dormbook.png"/>

            </div>
        </div>
    </header>

    <br/>
    <form method="post" action="/search">
        {{ csrf_field() }}
    <div class="form-group">
        <div class="input-group" style="background-color: white;">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="nc-icon nc-single-02"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search" name="Search" value="{{ isset($search)?$search:"" }}">
        </div>

        <button type="submit" class="btn btn--primary horus-btn-search" key="searchButton">
                                       <span class="horus-btn-search__icon icon-ic icon-contain icon-bg-icn_search_light">
                                       <span class="horus-btn-search__label">Search</span>
                                       </span>
        </button>

        @if(isset($search))
            <a href="#" class="btn btn--primary horus-btn-search pull-right" id="toggleMap">View Map
            </a>
        @endif
    </div>
    </form>
</div>
<main id="main" role="main" class="container" style="width: 640px; height: auto;">
<div id="listDiv">

    @if(isset($data))
        @foreach($data as $entry)
            @include('includes.searchitem', ['data'=>$entry])
        @endforeach
    @endif

</div>

<div id="mapdiv">
    <div class="col-lg-12">
        <div id="mapid" style="width: 100%; height: 350px;">

        </div>
    </div>
</div>



</main><!-- /.container -->
<footer class="blog-footer">
    <div class="col-lg-12 text-center">
        <img src="images/dormbook.png"/>
    </div>
    <p>
        Copyright ® 2019. dormbook
    </p>
    <div class="col-lg-12 text-center">
        <a href="/"><strong>Home</strong></a> | <a href="/admin"><strong>Admin</strong></a> | <a href="/about"><strong>About</strong></a>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.jquery.min.js"></script>
<script src="js/paper-dashboard.min.js"></script>
<script src="js/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
    //Era
      $(document).on('click','.collapsed', function(){
        var collapseItem = $(this).attr('rel');
        $('.nav-tabs').find('a').each(function() {
            $(this).removeClass('active');
            if($(this).attr('href') == collapseItem){
              $(this).tab('show');
            }
        });
      });
</script>

<script>

</script>
<script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>
<script>

    var mymap = new L.map('mapid').setView([14.194331, 120.876732], 14);

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


    @if(isset($data))
        @foreach($data as $entry)

        var name = '<strong>{{ $entry->Name }}</strong><br/>'+
            '{{ $entry->AddressLine1 }}, {{ $entry->AddressLine2 }}, '+
            '{{ $entry->City }}, Cavite<br/>{{ $entry->Rate }}<br/>' +
            '<img src="/uploads/{{ $entry->ID }}/1.jpg" style="max-height: 100px; max-width: 100px;"/>';

        var marker;
        marker = L.marker([{{ $entry->Latitude }}, {{ $entry->Longitude }}]).addTo(mymap).bindPopup(name)
            .openPopup();

        @endforeach
    @endif


$('#mapdiv').hide();

$('#toggleMap').on('click', function() {
        $('#listDiv').toggle();
        $('#mapdiv').toggle();
        var text = $(this).text();

        $(this).text(text=="VIEW LIST"?"VIEW MAP":"VIEW LIST");
    });
</script>


<svg xmlns="http://www.w3.org/2000/svg" width="200" height="250" viewBox="0 0 200 250" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="13" style="font-weight:bold;font-size:13pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body></html>