<?php

include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link = connect ();

if (! isset ( $_GET ['jid'] ) || ! is_numeric ( $_GET ['jid'] )) {
	skip ( 'index.php', '*_*id不存在,删除失败！' );
}

$query = "delete from liu_jiazhao where j_id = '{$_GET['jid']}'";
execute ( $link, $query );

if (mysqli_affected_rows ( $link ) == 1) {

	skip('index.php','^_^删除成功！');
} else {
	skip('index.php','*_*删除失败！');
}
