<?php
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
var_dump($_SESSION);
$link = connect ();
$user_id = is_login ( $link );
if ($user_id) {
	skip ( 'index.php', '*_* 不要重复登陆！' );
}
if (isset ( $_POST ['submit'] )) {
	
	include_once 'inc/login_check.inc.php';
	escape ( $link, $_POST );
	$query = "select * from liu_user where uname = '{$_POST['uname']}' and upw = md5('{$_POST['upw']}') ";
	$result = execute ( $link, $query );
	$data = mysqli_fetch_assoc ( $result );
	
	if (mysqli_num_rows ( $result ) == 1) {
		
		$_SESSION ['manage'] ['uname'] = $data ['uname'];
		
		$_SESSION ['manage'] ['upw'] = sha1 ($data ['upw'] );var_dump($_SESSION);exit();
		$query1 = "update liu_user set ulasttime = now() where uname ='{$_POST['uname']}'";
		$result1 = execute ( $link, $query1 );
		skip ( 'index.php', '^_^ 登录成功！' );
	} else {
		skip ( 'login.php', '*_* 登录失败，用户名或密码错误！' );
	}
}

$title = '登录';

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title;?></title>
	<meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="../../public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../../public/Css/style.css" />
    <script type="text/javascript" src="../../public/js/jquery.js"></script>
    <script type="text/javascript" src="../../public/js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../../public/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../public/js/ckform.js"></script>
    <script type="text/javascript" src="../../public/js/common.js"></script>
    <style type="text/css">
        body {
            padding-top: 100px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
			  
			height: 30%;  
			overflow: auto;  
			margin: auto;  
			position: absolute;  
			top: 0; left: 0; bottom: 0; right: 0; 
            max-width: 300px;
            padding: 19px 29px 29px;
          
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05); 
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>  
</head>
<body>
 <div class="container">
    

    <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">登录系统</h2>
        <input type="text" name="uname" class="input-block-level" placeholder="账号">
        <input type="password" name="upw" class="input-block-level" placeholder="密码">
        
       
        <p><button class="btn  btn-primary" type="submit">登录</button></p>
    </form>

    </div> <!-- /container -->
</body>
</html>