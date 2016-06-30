
<!DOCTYPE html>
<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link = connect ();
if (! is_login ( $link )) {
    skip ( 'login.php', '*_* 请先登录！' );
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap-select.min.css" />

    <link rel="stylesheet" type="text/css" href="../../public/css/prettify.css" />


    <script type="text/javascript" src="../../public/js/jquery.js"></script>
    <script type="text/javascript" src="../../public/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../../public/js/bootstrap-datepicker.min.js"></script>
       <script type="text/javascript" src="../../public/js/bootstrap-select.min.js"></script>
          <script type="text/javascript" src="../../public/js/defaults-zh_CN.js"></script>
    <script type="text/javascript" src="../../public/js/locales/bootstrap-datepicker.zh-CN.min.js" charset="UTF-8"></script>

    <script type="text/javascript" src="../../public/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../public/js/ckform.js"></script>
    <script type="text/javascript" src="../../public/js/common.js"></script>
    <script src="../../public/js/ie-emulation-modes-warning.js"></script>
     <script src="../../public/js/ie10-viewport-bug-workaround.js"></script>
<!--[if lte IE 9]>
<script src="../../public/js/respond.min.js"></script>
<script src="../../public/js/html5shiv.min"></script>
<![endif]-->
<script src="../../public/js/show.js"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;


        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>