<?php
header("Content-type: text/html; charset=utf-8");
$file = $_GET['content'];
$user = date('Ymdhis',time()).$_GET['user'].'.txt';

Header( "Content-type:   application/octet-stream ");
Header( "Accept-Ranges:   bytes ");
header( "Content-Disposition:   attachment;   filename=$user ");
header( "Expires:   0 ");
header( "Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 ");
header( "Pragma:   public ");
echo $file;



