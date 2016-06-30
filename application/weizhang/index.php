<?php
include_once '../common/header.inc.php';
include_once '../inc/page.inc.php';
?>
<style>
.table th, .table td {
	text-align: center;
}
</style>
<body>

	<form class="form-inline definewidth m20" action="" method="POST">
		<input class="form-control" type="text" name='name' /> &nbsp;&nbsp;
		<button type="submit" class="btn btn-primary " name="query">查询</button>
		&nbsp;&nbsp; <a href="add.php" class="btn btn-success  ">添加违章信息</a>
	</form>
<br />
<?php

//
if (isset($_POST['query'])) {

    $query_count = "select count(*) from 	weizhang
	where name like \"%{$_POST['name']}%\" 	order by id desc  {$page['limit']}";

    $result_count = execute($link, $query_count);
    $count = num($link, $query_count);
    $page = page($count, 20);
    $query = "
	    SELECT
id,
name,
phone,
idcard,
info,
is_ok,
car_num
FROM
weizhang
	where name like \"%{$_POST['name']}%\" 	order by id desc  {$page['limit']}";

} else {
    $query_count = "select count(*) from 	weizhang ";
    $result_count = execute($link, $query_count);
    $count = num($link, $query_count);
    $page = page($count, 20);
    $query = "
SELECT
id,
name,
phone,
idcard,
info,
is_ok,
car_num
FROM
weizhang
    order by id desc  {$page['limit']}";
}
// var_dump ( $query );
$result = execute($link, $query);
?>
<table
		class="table table-striped table-bordered table-hover definewidth m10">
		<thead>
			<tr>
				<th rowspan="2" scope="col">编号</th>
				<th rowspan="2" scope="col">车牌号</th>
				<th rowspan="2" scope="col">车主姓名</th>
				<th rowspan="2" scope="col">电话</th>
				<th rowspan="2" scope="col">身份证号</th>
				<th rowspan="2" scope="col">违章情况</th>
				<th rowspan="2" scope="col">处理情况</th>
				<th colspan="3" scope="col">操作</th>
			</tr>
		</thead>

	<?php

while ($data = mysqli_fetch_assoc($result)) {

    ?>



	 <tr>
			<td><?php echo $data['id']?></td>
			<td><?php echo $data['car_num']?></td>
			<td><?php echo $data['name']?></td>
			<td><?php echo $data['phone']?></td>
			<td><?php echo $data['idcard']?></td>
			<td><?php echo $data['info']?></td>
			
			<td>
			<?php

									if($data['is_ok']==0) {
									    echo '未处理';
									}elseif ($data['is_ok']==1) {
									    echo '已处理';
									}else {
									    echo '暂未填写！';
									}

									?>
			</td>
			<td><a href="detail.php?id=<?php echo $data['id']?>"><span
					class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 查看</a></td>
			<td><a href="edit.php?id=<?php echo $data['id']?>"><span
					class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 修改</a></td>
			<td><a style="color: red" href="javascript:void(0)"
				onclick="del(<?php echo $data['id']?>)"> <span
					class="glyphicon glyphicon-trash" aria-hidden="true"></span> 删除
			</a></td>

		</tr>

	<?php } ?></table>






	<div class="inline pull-right page">
		<nav style="float: right">
			<ul class="pagination pagination-sm">

			<?php
if ($count != 0) {
    echo " <li >
			<a >
				共 <b><span aria-hidden='true'>" . $count . "</span></b>
				条记录
			</a>
		</li>
		";

    echo $page['html'];
}
?>
	</ul>
		</nav>
	</div>



</body>
</html>

<script>
$(function () {
    $('#datepicker-query').datepicker({
    	language: 'zh-CN',
        format: 'yyyy-mm',
        autoclose:true,
        todayBtn: 'linked'
    });
});
 $(function () {
    $('#datepicker-query2').datepicker({
    	language: 'zh-CN',
        format: 'yyyy年mm月',
        autoclose:true,
        todayBtn: 'linked'
    });
});



	function del(id)
	{


		if(confirm("确定要删除第"+id+"条记录吗？"))
		{

			var url = "del.php?id="+id;

			window.location.href=url;

		}


	}

</script>