<?php
?>
<?php //include_once 'config/config.inc.php'; ?>
<!DOCTYPE html>
<html>

<head>
<title>注册</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/css/home/style.css" rel="stylesheet"
	type="text/css" />
<script src="../public/register.js"
	type="text/javascript"></script>
<script src="../public/xmlhttprequest.js"
	type="text/javascript"></script>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="../public/jquery.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div itemprop="" id="content" class="container" role="main">
		<div id="rgbgdiv">
					
					<form class="form-horizontal"
						style="border: 3px solid #f7f8fa;margin-top:50px; padding: 50px 0 50px 0">
						<h2 class='text-center'>注册</h2>
						<br />
						<br />
						<div class="form-group">
							<label for="regname" class="col-sm-2 control-label">用户名</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="regname"
									>
							</div>
							<label id="namediv" class="col-sm-3 control-label">请输入用户名</label>
						</div>

						<div class="form-group">
							<label for="regpwd1" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="regpwd1"
									>
							</div>
							<label id="pwddiv1" class="col-sm-3 control-label">请输入密码</label>
						</div>
						<div class="form-group">
							<label for="regpwd2" class="col-sm-2 control-label">确认密码</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="regpwd2"
									>
							</div>
							<label id="pwddiv2" class="col-sm-3 control-label">请输入确认密码</label>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">邮箱</label>
							<div class="col-sm-4">
								<input type="email" class="form-control" id="email"
									>
							</div>
							<label id="emaildiv" class="col-sm-3 control-label">找回密码使用</label>
						</div>
						<div class="form-group">
							<label for="phone" class="col-sm-2 control-label">手机号</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="phone"
									>
							</div>
							<label id="phonediv" class="col-sm-3 control-label">请填写手机号</label>
						</div>

						<div class="form-group">
							<label for="realname" class="col-sm-2 control-label">姓名</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="realname"
									>
							</div>
							<label id="realnamediv" class="col-sm-3 control-label">请填写真实姓名</label>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">性别</label>
							<div class="col-sm-4">

								
								<select class="form-control" id="sex">
  <option value='1'>男</option>
  <option value='0'>女</option>
</select>
								
								
								
								
							</div>

						</div>

						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button id="regbtn" onclick="reg()" disabled="disabled" type="submit"
									class="btn btn-success  text-center">注册</button>
								&nbsp;	 &nbsp; &nbsp;<a target='_balnk' href='login.php'  type="submit" class="btn btn-default ">登录</a>
								
							</div>
							<br />
						
							<div class="col-sm-offset-2 col-sm-10">
						<a target='_balnk' onclick='found()' class="btn btn-link btn-sm " role="button"><small>忘记密码</small></a>	
					
							</div>
							</div>
						</div>
					</form>
		</div>
		<div id="imgdiv" style="visibility: hidden;">&nbsp;</div>
		<!--  -->




	</div>
	<!-- container -->
		


	
 
<script>

function reg() {
	
	//location = 'login.php';
	//alert(1);
	//$('imgdiv').style.visibility = 'visible';
	/* fd = window.open ('register_check.php?user_name=' + $('regname').value
			+ '&user_password=' + $('regpwd1').value + '&user_email='
			+ $('email').value + '&user_phone=' + $('phone').value
			+ '&user_realname=' + $('realname').value + '&user_birthday='
			+ $('birthday').value + '&user_sex=' + $('sex').value
			+ '&user_address=' + $('address').value); */
	 window.open('register_check.php?user_name=' + document.getElementById('regname').value
			+ '&user_password=' + document.getElementById('regpwd1').value + '&user_email='
			+ document.getElementById('email').value + '&user_phone=' + document.getElementById('phone').value
			+ '&user_realname=' + document.getElementById('realname').value 
			,'found','width=480,height=480');
	
}
function found(){
	//alert(screen.width);
	fd  = window.open('found.php','found','width=480,height=480');
	fd.moveTo((screen.width-480)/2,(screen.height-480)/2);
}
</script>

		

</body>
</html>