 $(function () {
        $('.nav_crumbs .container .nav_crumbs_ul li a i:first').attr('class', 'glyphicon glyphicon-home');
        $('.nav_crumbs_ul li a:first').attr('href', indexUrl);
        $('.nav_crumbs_ul li a:eq(1)').attr('href', breadcrumbUrl);
        $('.nav_crumbs_ul li a:last').removeAttr('href');
    });
