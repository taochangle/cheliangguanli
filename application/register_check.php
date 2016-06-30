<?php
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link = connect ();


$query = "insert into user
		(username,password,email,truename,cellphone)
		values
		('" . trim ( $_GET ['user_name'] ) . "','" . md5 ( trim ( $_GET ['user_password'] ) ) . "','" . $_GET ['user_email'] . "','" . $_GET ['user_realname'] . "','" . $_GET ['user_phone'] . "')";
$result = execute ( $link, $query );
if (mysqli_affected_rows ( $link ) == 1) {
	skip('login.php', '注册成功！');
}else {
	skip('register.php', '注册失败！');
}
?>