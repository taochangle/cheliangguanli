<?php

/*
 * |————————————————————————————————————
 * | Author: 陶欣 <sshinetao@qq.com> Created on : 2016-4-26, 1:02:28
 * |————————————————————————————————————
 */
include_once 'inc/mysql.inc.php';
$link = connect ();
$sql = "select * from user where username='" . $_GET ['name'] . "'";
$num = num($link, $sql);
if ($num != 0) {
	echo '2';
} elseif ($num == 0) {
	echo '1';
}