<?php

/*
 * $count：总记录
 * $page_size：分页大小
 * $num_btn：按钮数码
 * $page：分页get参数
 */
function page($count, $page_size, $num_btn = 4, $page = 'page') {
	/*
	 * 判断是否有记录
	 */
	if ($count==0){
		$data = array (
			'limit' => '',
			'html' => '' );
		return $data;
	}
	if (! isset ( $_GET [$page] ) || ! is_numeric ( $_GET [$page] ) || $_GET [$page] < 1) {
		$_GET [$page] = 1;
	}
	
	/*
	 * 总页数
	 */
	$page_num_all = ceil ( $count / $page_size );
	if ($_GET [$page] > $page_num_all) {
		$_GET [$page] = $page_num_all;
	}
	$start = ($_GET [$page] - 1) * $page_size;
	$limit = "limit {$start},{$page_size}";
	$current_url = $_SERVER ['REQUEST_URI']; // URL获取
	$arr_current = parse_url ( $current_url ); // URL拆分
	$current_path = $arr_current ['path']; // 将文件路径部分保存
	$url = '';
	if (isset ( $arr_current ['query'] )) {
		parse_str ( $arr_current ['query'], $arr_query );
		unset ( $arr_query [$page] );
		if (empty ( $arr_query )) {
			$other = http_build_query ( $arr_query );
			$url = "{$current_path}?{$other}&{$page}=";
		} else {
			$other = http_build_query ( $arr_query );
			
			$url = "{$current_path}?{$other}&{$page}=";
		}
	} else {
		$url = "{$current_path}?{$page}=";
	}
	
	$html = array ();
	if ($num_btn >= $page_num_all) {
		for($i = 1; $i <= $page_num_all; $i ++) {
			if ($_GET [$page] == $i) {
				$html [$i] = "<li class='active'><a>{$i}</strong></a></li>";//当前页
			} else {
				$html [$i] = "<li><a href='{$url}{$i}'>{$i}</a></li>";
			}
		}
	} else {
		$num_left = floor ( ($num_btn - 1) / 2 );
		$start = $_GET [$page] - $num_left;
		$end = $start + ($num_btn - 1);
		if ($start < 1) {
			$start = 1;
		}
		if ($end > $page_num_all) {
			$start = $page_num_all - ($num_btn - 1);
		}
		for($i = 0; $i < $num_btn; $i ++) {
			if ($_GET [$page] == $start) {
				$html [$start] = "<li class='active'><a >{$start}</strong></a></li>";
			} else {
				$html [$start] = "<li><a href='{$url}{$start}'>{$start}</a></li>";
			}
			
			$start ++;
		}
		
		/*
		 * 按钮大于三个时候省略号效果
		 */
		if (count ( $html ) >= 3) {
			reset ( $html );
			$key_first = key ( $html );
			end ( $html );
			$key_end = key ( $html );
			if ($key_first != 1) {
				array_shift ( $html );
				array_unshift ( $html, "<li><a href='{$url}1'>第一页</a></li>" );
			}
			if ($key_end != $page_num_all) {
				array_pop ( $html );
				array_push ( $html, "<li><a href='{$url}{$page_num_all}'>最后一页</a></li>" );
			}
		}
	}
	if ($_GET [$page] != 1) {
		$prev = $_GET [$page] - 1;
		array_unshift ( $html, "<li><a href='{$url}{$prev}' aria-label='Previous'> <span aria-hidden='true'>上一页</span>" );
	}
	if ($_GET [$page] != $page_num_all) {
		$next = $_GET [$page] + 1;
		array_push ( $html, " <li><a href='{$url}{$next}' aria-label='Next'> <span aria-hidden='true'>下一页</span>" );
	}
	$html = implode ( '  ', $html );
	$data = array (
			'limit' => $limit,
			'html' => $html ,
	);
	return $data;
}



?>