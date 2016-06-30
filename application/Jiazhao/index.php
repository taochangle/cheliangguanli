<?php
include_once '../common/header.inc.php';
include_once '../inc/page.inc.php';
?>
<?php
$query_count = "select count(*) from liu_jiazhao ";
$result_count = execute ( $link, $query_count );
$count = num ( $link, $query_count );
$page = page ( $count, 20 );
$query = "select * from liu_jiazhao order by j_id desc {$page['limit']}";
$result = execute($link, $query);

?>
<style>
.table th, .table td {
	text-align: center;
}
</style>
<table
		class="table table-striped table-bordered table-hover definewidth m10">
		<thead>
			<tr>
				<th rowspan="2" scope="col">编号</th>
				<th rowspan="2" scope="col">姓名</th>
				<th rowspan="2" scope="col">电话</th>
				<th rowspan="2" scope="col">身份证号</th>
				<th rowspan="2" scope="col">档案编号</th>
				<th rowspan="2" scope="col">注册日期</th>
				<th colspan="3" scope="col">操作</th>
			</tr>
		</thead>

	<?php

while ($data = mysqli_fetch_assoc($result)) {

    ?>



	 <tr>
			<td><?php echo $data['j_id']?></td>
			<td><?php echo $data['j_user']?></td>
			<td><?php echo $data['j_phone']?></td>
			<td><?php echo $data['j_idcard']?></td>
			<td><?php echo $data['j_pid']?></td>
			<td><?php echo date("Y/m/d",strtotime($data['j_regtime']))?></td>
			<td><a href="detail.php?jid=<?php echo $data['j_id']?>"><span
					class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 察看</a></td>
			<td><a href="edit.php?jid=<?php echo $data['j_id']?>"><span
					class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 修改</a></td>
			<td><a style="color: red" href="javascript:void(0)"
				onclick="del(<?php echo $data['j_id']?>)"> <span
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

			var url = "del.php?jid="+id;

			window.location.href=url;

		}


	}

</script>