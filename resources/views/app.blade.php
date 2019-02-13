<!DOCTYPE html>
<!-- saved from url=(0134)dashboard.html?_ga=2.161303871.304443683.1547307201-170644528.1545894064 -->
<html lang="en" class="perfect-scrollbar-on">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @yield('title')
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="dormbook | Cavite State University Interactive Digital Directory for Dormitories">
    <meta itemprop="description" content="Cavite State University Interactive Digital Directory for Dormitories">

    @include('includes.styles')
    @yield('styles')

<body>
<!-- Extra details for Live View on GitHub Pages -->
<div class="wrapper ">
    @include('includes.sidebar')

    <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="32d74249-fcb1-03e2-da51-c8402ba89584">

        @include('includes.navbar')

        <div class="content">
            @yield('content')
        </div>
        <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com/" target="_blank">DORMBOOK ®</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="credits ml-auto">
              <span class="copyright">
                © 2019, made with <i class="fa fa-heart heart"></i> by DevFINITY
              </span>
                    </div>
                </div>
            </div>
        </footer>
        <div class="ps-scrollbar-x-rail" style="width: 1258px; left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px; height: 889px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 365px;"></div></div></div>
</div>
@include('includes.scripts')
@yield('scripts')

<div class="jvectormap-tip"></div>
</body>
</html>