<?php
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';

$link = connect ();
$user_id = is_login ( $link );
if ($user_id) {
	header("location:success.html");
}
if (isset ( $_POST ['submit'] )) {
    if ($_POST['uname']=='admin'){
        $query = "select * from liu_admin where admin_login_name = '{$_POST['uname']}' and admin_password = md5('{$_POST['upw']}') ";
        $result = execute ( $link, $query );
        $data = mysqli_fetch_assoc ( $result );

        if (mysqli_num_rows ( $result ) == 1) {

            $_SESSION ['manage'] ['uname'] = $data ['admin_login_name'];
            //var_dump( $_SESSION ['manage'] ['uname']);exit();10470c3b4b1fed12c3baac014be15fac67c6e815"

            $_SESSION ['manage'] ['upw'] = sha1 ($data ['admin_password'] );
           // var_dump( $_SESSION ['manage'] ['upw']);
            //echo sha1(md5('123456'));exit();
            $query1 = "update liu_admin set last_login_time = now() where admin_login_name ='{$_POST['uname']}'";
            $result1 = execute ( $link, $query1 );
            skip ( 'success.html', '^_^ 登录成功！' );
        } else {
            skip ( 'login.php', '*_* 登录失败，用户名或密码错误！' );
        }
    }else
    {
	include_once 'inc/login_check.inc.php';
	escape ( $link, $_POST );
	$query = "select * from user where username = '{$_POST['uname']}' and password = md5('{$_POST['upw']}') ";
	$result = execute ( $link, $query );
	$data = mysqli_fetch_assoc ( $result );

	if (mysqli_num_rows ( $result ) == 1) {

		$_SESSION ['user'] ['username'] = $data ['username'];

		$_SESSION ['user'] ['password'] = sha1 ($data ['password'] );
		//$query1 = "update liu_user set ulasttime = now() where uname ='{$_POST['uname']}'";
	//	$result1 = execute ( $link, $query1 );
		skip ( 'success.html', '^_^ 登录成功！' );
	} else {
		skip ( 'login.php', '*_* 登录失败，用户名或密码错误！' );
	}
    }
}

$title = '登录';

?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="陶欣" content="">


    <title>后台管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../public/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../public/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
body {
  padding-top: 160px;
  padding-bottom: 60px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
  </head>
 
  <body>
    <div class="container">
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">请登录</h2>
        <label for="inputEmail" class="sr-only">用户名</label>
        <input type="text" id="inputEmail" name='uname' class="form-control" placeholder="用户名" required autofocus>
        <label for="inputPassword" class="sr-only" >密码</label>
        <input type="password" id="inputPassword" name='upw' class="form-control" placeholder="密码" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">登录</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../public/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
