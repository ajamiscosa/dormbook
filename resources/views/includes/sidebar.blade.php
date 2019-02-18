
<div class="sidebar" data-color="brown" data-active-color="danger">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com/" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('images/logo-small.png') }}">
            </div>
        </a>
        <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
            dormbook
            <!-- <div class="logo-image-big">
              <img src="../assets/img/logo-big.png">
            </div> -->
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default ps-active-x ps-active-y" data-ps-id="b7e0cd56-08a5-7c6c-5496-49be2c30f99b">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('images/faces/ayo-ogunseinde-2.jpg') }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <span>
                    Chet Faker
                    <b class="caret"></b>
                </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="/logout">
                                <span class="sidebar-mini-icon"><i class="fa fa-sign-out"></i></span>
                                <span class="sidebar-normal">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item" id="dashboard">
                <a href="/">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item" id="dorm">
                <a href="/dorm">
                    <i class="nc-icon nc-box"></i>
                    <p>Dorms</p>
                </a>
            </li>
            <li class="nav-item" id="user">
                <a href="/user">
                    <i class="nc-icon nc-single-02"></i>
                    <p>User Accounts</p>
                </a>
            </li>
            <li class="nav-item" id="setting">
                <a href="/setting">
                    <i class="nc-icon nc-settings"></i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>
        <div class="ps-scrollbar-x-rail" style="width: 260px; left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 258px;"></div></div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px; height: 814px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 430px;"></div></div></div>
</div>