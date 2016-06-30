<?php
header ( 'Content-Type:text/html;charset=utf-8' );
include_once ("inc/mysql.inc.php");
$link = connect ();
if (! empty ( $_GET ['name'] ) && ! is_null ( $_GET ['name'] )) {
	$query = "select * from app_user where username='" . $_GET ['name'] . "' and password = '" . $_GET ['pwd'] . "'";
	$num = num ( $link, $query );
	if ($num > 0) {
		$query = "update app_user set iscanuse = 1 where username='" . $_GET ['name'] . "' and password = '" . $_GET ['pwd'] . "'";
		execute ( $link, $query );
		$upnum = mysqli_affected_rows ( $link );
		if ($upnum > 0) {
			$_SESSION ['name'] = $_GET ['name'];
			echo "<script>alert('恭喜您激活账户成功！');window.location.href='main.php';</script>";
		} else {
			echo "<script>alert('您已经激活！');window.location.href='main.php';</script>";
		}
	} else {
		echo "<script>alert('激活失败！');window.location.href='register.php';</script>";
	}
}
?>