<!DOCTYPE html>
<!-- saved from url=(0048)https://getbootstrap.com/docs/4.0/examples/blog/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/paper-dashboard.css" rel="stylesheet">

    <!-- Custom styles for this template -->
</head>

<body style=" background-color: #f4f3ef;">

<div class="container" style="width: 640px;">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-lg-12 text-center">
                <img src="images/dormbook.png"/>

            </div>
        </div>
    </header>

    <br/>
    <div class="form-group">
        <div class="input-group" style="background-color: white;">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="nc-icon nc-single-02"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search">
        </div>

        <button class="btn btn--primary horus-btn-search" key="searchButton">
                                       <span class="horus-btn-search__icon icon-ic icon-contain icon-bg-icn_search_light">
                                       <span class="horus-btn-search__label">Search</span>
                                       </span>
        </button>
    </div>
</div>
<main role="main" class="container" style="width: 640px;">

@include('includes.searchitem')


</main><!-- /.container -->

<footer>
    <div class="wrap">
        <ul>
            <li>New York Restaurant</li>
            <li>3926 Anmoore Road</li>
            <li>New York, NY 10014</li>
            <li>718-749-1714</li>
        </ul>
        <ul>
            <li>France Restaurant</li>
            <li>68, rue da le Couronne</li>
            <li>75002 PARIS</li>
            <li>02.94.23.69.56</li>
        </ul>
        <ul>
            <li><a href="">Blog</a></li>
            <li><a href="">Careers</a></li>
            <li><a href="">Privacy Policy</a></li>
            <li><a href="">Contact</a></li>
        </ul>
        <ul>
            <li><img src="../images/dormbook.png" alt="logo"></li>
            <li>&copy; All rights reserved 2015</li>

        </ul>
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


<svg xmlns="http://www.w3.org/2000/svg" width="200" height="250" viewBox="0 0 200 250" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="13" style="font-weight:bold;font-size:13pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body></html>