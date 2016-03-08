<!doctype html>
<!--Conditionals for IE9 Support-->
<!--[if IE 9]><html lang="en" class="ie ie9"><![endif]-->
<html>
    <head>
        <meta charset="utf-8">

        <title>HamzaTraduction</title>

        <link rel="shortcut icon" href="{$base_theme}favicon.ico">

        <meta name="description" content="Site de traduction"/>
        <meta name="keywords" content="traduction, traduire, votre site, web, page,"/>
        <meta name="author" content="Julien SAUVANNET"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <!--Favicon-->
        <link rel="shortcut icon" href="{$base_theme}favicon.ico" type="image/x-icon">
        <link rel="icon" href="{$base_theme}favicon.ico" type="image/x-icon">
        <!--Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
        <!--Bootstrap 3.3.2-->
        <link href="{$css}bootstrap.min.css" rel="stylesheet" media="screen">
        <!--Icon Fonts-->
        <link href="{$css}font-awesome.min.css" rel="stylesheet" media="screen">
        <link href="{$css}icon-moon.css" rel="stylesheet" media="screen">
        <!--Animations-->
        <link href="{$css}animate.css" rel="stylesheet" media="screen">
        <!--Theme Styles-->
        <link href="{$css}theme-styles.css" rel="stylesheet" media="screen">
        <!--Toastr-->
        <link href="{$css}toastr.css" rel="stylesheet" media="screen">
        <!--Color Schemes-->
        <link class="color-scheme" href="{$css}colors/color-default.css" rel="stylesheet" media="screen">
        <!--Modernizr-->
        <script src="{$js}/libs/modernizr.custom.js"></script>
        <!--Adding Media Queries and Canvas Support for IE8-->
        <!--[if lt IE 9]>
          <script src="{$js}/plugins/respond.min.js"></script>
          <script src="{$js}/plugins/excanvas.js"></script>
        <![endif]-->
        <!--Javascript (jQuery) Libraries and Plugins-->
        <script src="{$js}libs/jquery-1.11.2.min.js"></script>
        <script src="{$js}libs/jquery.easing.1.3.js"></script>
        <script src="{$js}plugins/bootstrap.min.js"></script>
        <script src="{$js}plugins/jquery.touchSwipe.min.js"></script>
        <script src="{$js}plugins/jquery.placeholder.js"></script>
        <script src="{$js}plugins/icheck.min.js"></script>
        <script src="{$js}plugins/jquery.validate.min.js"></script>
        <script src="{$js}plugins/gallery.js"></script>
        <script src="{$js}plugins/jquery.fitvids.js"></script>
        <script src="{$js}plugins/jquery.bxslider.min.js"></script>
        <script src="{$js}plugins/chart.js"></script>
        <script src="{$js}plugins/waypoints.min.js"></script>
        <script src="{$js}plugins/smoothscroll.js"></script>
        <script src="{$js}landing2.js"></script>
        <script src="{$js}toastr.js"></script>
    </head>

    <!--Body-->
    <body class="space-top">

    <!--Override path css-->
    <style type="text/css">
        #spinner { background: url({$images}spinner.GIF) no-repeat; }
        .icheckbox { background:url({$images}forms/checkbox.png) no-repeat; }
    </style>

    <!--Page Preloading-->
    <div id="preloader"><div id="spinner"></div></div>
