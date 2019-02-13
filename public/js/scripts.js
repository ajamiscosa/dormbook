$(document).ready(function () {

    $('#minimizeSidebar').on('click',function () {
        var $body = $('body');
        if ($body.attr('class')) {
            $body.removeAttr('class');
        } else {
            $body.attr('class', 'sidebar-mini');
        }
    });


    var path = '';
    var pathname = window.location.pathname;

    var count = (pathname.match(/\//g) || []).length;

    if(count>1)
    {
        path = pathname.substring(1, pathname.indexOf('/',1));
    }
    else
    {
        path = pathname.substring(1);
    }


    if(path=="") {
        path = 'dashboard';
    }

    var id = '#'+path;

    var $x = $(id);
    $x.addClass('active');
    if($x.attr('data-parent')!=null) {
        var $idx = $x.attr('data-parent')+'-link';
        console.log($idx);
        $($idx).addClass('active');
    }
});