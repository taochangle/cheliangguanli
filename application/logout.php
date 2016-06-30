<?php
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$title = '退出后台登录';

$link = connect ();
$member_id = is_login($link);
 if (!is_login ( $link )) {

 header('Location:login.php');

 }
 session_unset();
 session_destroy();
header('Location:login.php');