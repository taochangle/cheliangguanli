<?php

if (empty($_POST['uname'])){
	skip('login.php', '*_* 用户名不能为空！');
}


if (empty($_POST['upw'])){
	skip('login.php', '*_* 密码不能为空！');
}




