<?php

function skip($url, $message)
{
    $html = <<<A
		<!doctype html>
		<html>
		<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" show="IE=edge,chrome=1" />
		<title>正在跳转... {$message}</title>
		<link rel="stylesheet" href="../public/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Refresh" content="1; url={$url}" />

		</head>
		<body >

		<div class="container">

		<div class="panel panel-default">
  				<div class="panel-heading">
   					 <h3 class="panel-title">信息提示</h3>
  				</div>
  				<div class="panel-body">
     				{$message}，<a href="{$url}" class="btn">1秒后自动跳转</a>
 		 		</div>
		</div>

</div>
		</body>
		</html>
A;
    echo $html;
    exit();
}

function is_login($link)
{
   // var_dump (isset($_SESSION['manage']['uname']) && isset($_SESSION['manage']['upw']));
    if (isset($_SESSION['manage']['uname']) && isset($_SESSION['manage']['upw'])) {
        if ($_SESSION['manage']['uname'] == 'admin') {

            $query = "select * from liu_admin where
            admin_login_name = '{$_SESSION['manage']['uname']}' and sha1(admin_password) = '{$_SESSION['manage']['upw']}'";
            $result = execute($link, $query);
            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_assoc($result);
                return true;
            } else {
                return false;
            }
        } else {
            $query = "select * from user where
	        uname = '{$_SESSION['user']['username']}' and sha1(upw) = '{$_SESSION['user']['password']}'";
            $result = execute($link, $query);
            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_assoc($result);
                return true;
            } else {
                return false;
            }
        }
    } else {
        return false;
    }
}