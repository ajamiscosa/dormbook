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
            color: #454F59;
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
    <h2 class="text-center">"We've Found It All For You"</h2>

    Have you ever searched for dormitories in the internet? Have you seen all the different prices there are for the same room? DormBook helps you compare the prices of different dormitories. It will also show the features and even its location. Don't lose time, effort and money, DormBook makes it easy for you to find your ideal dormitories, at the best price and safe!

    <br/>
    <br/>
    <br/>
    <h5 class="text-center">CvSU Mission</h5>

    Cavite State University shall provide excellent, equitable, and relevant educational opportunities in the arts, science, and technology through quality instruction and relevant research and development activities.
    It shall produce professional, skilled, and morally upright individuals for global competitiveness.

    <br/>
    <br/>
    <br/>
    <h5 class="text-center">CvSU Vision</h5>
    The premier university in historic Cavite recognized for excellence in the development of morally upright and globally competitive individuals.

    <br/>
    <br/>
    <br/>
    <h5 class="text-center">CvSU Quality Policy</h5>
    We commit to the highest standards of education, value our stakeholders, strive for continual improvement of our products and services, and upload the university’s tenets of Truth, excellence, and service to produce globally competitive and morally upright individuals.
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


</body></html>