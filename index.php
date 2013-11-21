<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"href="index.php?page=home">Beersnobs</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php?page=home">Home</a>
                        </li>
                        <li class="dropdown">
                            <a href="index.php?page=reviews" data-hover="dropdown">Reviews</a>
                            <ul class="dropdown-menu">
                                <li><a href="#" onclick = >American Lagers</a></li>
                                <li><a href="#">Light Beers</a></li>
                                <li><a href="#">Belgian</a></li>
                                <li><a href="#">Ales</a></li>
                                <li><a href="#">Imports</a></li>
                                <li class="divider"></li>
                                <li><a href="index.php?page=addreview">Submit A Review</a></li>
                                <li class="divider"></li>
                                <li><a href="index.php?page=addbeer">Add Beer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?page=topbeers">Top Beers</a>
                        </li>
                        <li>
                            <a href="index.php?page=about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" id="main">
            <?php
                $whitelist = array("home","reviews", "topbeers", "about", "addbeer", "addreview");
                if (isset($_GET['page']) && in_array($_GET['page'], $whitelist)) {
                    include("include/".$_GET['page'].".php");
                }
                else
                    include("include/home.php");
            ?>
        </div>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/vendor/twitter-bootstrap-hover-dropdown.min.js"</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
