<?php

include_once '../common/header.inc.php';
include_once 'tool.inc.php';
if ($_SESSION['manage'] ['uname']!='admin'){
    skip('http://localhost/', '对不起，你没有访问权限！');
}
?>