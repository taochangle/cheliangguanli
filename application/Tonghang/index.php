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
		&nbsp; 地区 &nbsp; <select class="selectpicker show-tick"
			data-live-search="true" name='area'>
			<optgroup label="北京市" data-max-options="1">
				<option>北京市</option>
			</optgroup>
			<optgroup label="天津市" data-max-options="1">
				<option>天津市</option>
			</optgroup>
			<optgroup label="重庆市" data-max-options="1">
				<option>重庆市</option>
			</optgroup>
			<optgroup label="上海市" data-max-options="1">
				<option>上海市</option>
			</optgroup>
				<?php
                $query_sheng = "select region_name,region_id from region where  parent_id = 1 and REGION_ID NOT in (2,3,10,23)";
                $result_sheng = execute($link, $query_sheng);
                while ($data_sheng = mysqli_fetch_assoc($result_sheng)){
			?>
			<optgroup label="<?php echo  $data_sheng['region_name']?>" data-max-options="1">
			<?php
                $query_shi = "select region_name,region_id from region where parent_id = {$data_sheng['region_id']}";
                $result_shi = execute($link, $query_shi);
                while ($data_shi = mysqli_fetch_assoc($result_shi)){
			?>
				<option><?php echo $data_shi['region_name']?></option>
				<?php
				$query_xian = "select region_name from region where parent_id = {$data_shi['region_id']}";
				$result_xian = execute($link, $query_xian);
				while ($data_xian = mysqli_fetch_assoc($result_xian)){
				?>
				<option>    &nbsp;&nbsp; &nbsp;&nbsp;<?php echo $data_xian['region_name']?> </option>
				<?php
				}
				?>
				<?php
                }
				?>
			</optgroup>
			<?php
                }
			?>



		</select> &nbsp;&nbsp; <input class="form-control" type="text" name='tname' /> &nbsp;&nbsp;
		<button type="submit" class="btn btn-primary " name="query">查询</button>
		&nbsp;&nbsp; <a href="add.php" class="btn btn-success  ">添加违章信息</a>
	</form>
<br />
<?php

//
if (isset($_POST['query'])) {

    $query_count = "select count(*)
FROM
	liu_tonghang_base a
LEFT JOIN liu_tonghang_fujian b ON a.t_id = b.t_id
AND b.f_type = '1'
LEFT JOIN liu_tonghang_fujian c ON a.t_id = c.t_id
AND c.f_type = '2'
LEFT JOIN liu_tonghang_fujian d ON a.t_id = d.t_id
AND d.f_type = '3'
LEFT JOIN liu_tonghang_fujian e ON a.t_id = e.t_id
AND e.f_type = '4'
LEFT JOIN liu_tonghang_fujian f ON a.t_id = f.t_id
AND f.f_type = '5'
LEFT JOIN liu_tonghang_fujian g ON a.t_id = g.t_id
AND g.f_type = '6'
	where   a.t_diqu like \"%{$_POST['area']}%\" and	a.t_name like binary \"%{$_POST['tname']}%\" ";

    $result_count = execute($link, $query_count);
    $count = num($link, $query_count);
    $page = page($count, 20);
    $query = "
	    select  b.f_id as fid,   	a.t_id AS '编号',a.t_kuaidi as kuaidi,
    	a.t_name AS '姓名',
    	a.t_diqu AS '地区',
    	a.t_phone AS '电话',
    	a.t_weixin AS '微信',
    	a.t_dizhi AS '地址' from 	liu_tonghang_base a
LEFT JOIN liu_tonghang_fujian b ON a.t_id = b.t_id
AND b.f_type = '1'
LEFT JOIN liu_tonghang_fujian c ON a.t_id = c.t_id
AND c.f_type = '2'
LEFT JOIN liu_tonghang_fujian d ON a.t_id = d.t_id
AND d.f_type = '3'
LEFT JOIN liu_tonghang_fujian e ON a.t_id = e.t_id
AND e.f_type = '4'
LEFT JOIN liu_tonghang_fujian f ON a.t_id = f.t_id
AND f.f_type = '5'
LEFT JOIN liu_tonghang_fujian g ON a.t_id = g.t_id
AND g.f_type = '6'
	where a.t_diqu like \"%{$_POST['area']}%\" and	a.t_name like binary \"%{$_POST['tname']}%\" 	order by a.t_id desc  {$page['limit']}";

} else {
    $query_count = "select count(*) from 	liu_tonghang_base a
LEFT JOIN liu_tonghang_fujian b ON a.t_id = b.t_id
AND b.f_type = '1'
LEFT JOIN liu_tonghang_fujian c ON a.t_id = c.t_id
AND c.f_type = '2'
LEFT JOIN liu_tonghang_fujian d ON a.t_id = d.t_id
AND d.f_type = '3'
LEFT JOIN liu_tonghang_fujian e ON a.t_id = e.t_id
AND e.f_type = '4'
LEFT JOIN liu_tonghang_fujian f ON a.t_id = f.t_id
AND f.f_type = '5'
LEFT JOIN liu_tonghang_fujian g ON a.t_id = g.t_id
AND g.f_type = '6' ";
    $result_count = execute($link, $query_count);
    $count = num($link, $query_count);
    $page = page($count, 20);
    $query = "
	    SELECT
	    a.t_kuaidi as kuaidi,
	    b.f_id as fid,
    	a.t_id AS '编号',
    	a.t_name AS '姓名',
    	a.t_diqu AS '地区',
    	a.t_phone AS '电话',
    	a.t_weixin AS '微信',
    	a.t_dizhi AS '地址',
    	b.f_type AS '办理委托1',
    	b.f_sy AS '身份证原件1',
    	b.f_sf AS '身份证复印件1',
    	b.f_sno AS '无1',
    	c.f_type AS '补行驶证2',
    	c.f_sy AS '身份证原件2',
    	c.f_sf AS '身份证复印件2',
    	c.f_sno AS '无2',
    	d.f_type AS '补驾照3',
    	d.f_sy AS '身份证原件3',
    	d.f_sf AS '身份证复印件3',
    	d.f_sno AS '无3',
    	e.f_type AS '换驾照4',
    	e.f_sy AS '身份证原件4',
    	e.f_sf AS '身份证复印件4',
    	e.f_sno AS '无4',
    	f.f_type AS '补车牌5',
    	f.f_sy AS '身份证原件5',
    	f.f_sf AS '身份证复印件5',
    	f.f_sno AS '无5',
    	g.f_type AS '办违章6',
    	g.f_sy AS '身份证原件6',
    	g.f_sf AS '身份证复印件6',
    	g.f_sno AS '无6'
FROM
	liu_tonghang_base a
LEFT JOIN liu_tonghang_fujian b ON a.t_id = b.t_id
AND b.f_type = '1'
LEFT JOIN liu_tonghang_fujian c ON a.t_id = c.t_id
AND c.f_type = '2'
LEFT JOIN liu_tonghang_fujian d ON a.t_id = d.t_id
AND d.f_type = '3'
LEFT JOIN liu_tonghang_fujian e ON a.t_id = e.t_id
AND e.f_type = '4'
LEFT JOIN liu_tonghang_fujian f ON a.t_id = f.t_id
AND f.f_type = '5'
LEFT JOIN liu_tonghang_fujian g ON a.t_id = g.t_id
AND g.f_type = '6'  order by a.t_id desc  {$page['limit']}";
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
			<td><?php echo $data['编号']?></td>
			<td><?php echo $data['地区']?></td>
			<td><?php echo $data['姓名']?></td>
			<td><?php echo $data['电话']?></td>
			<td><?php echo $data['微信']?></td>
			<td><?php echo $data['地址']?></td>
			<td>
			<?php

									if($data['kuaidi']==1) {
									    echo '未处理';
									}elseif ($data['kuaidi']==0) {
									    echo '已处理';
									}else {
									    echo '暂未填写！';
									}

									?>
			</td>
			<td><a href="detail.php?id=<?php echo $data['编号']?>"><span
					class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 查看</a></td>
			<td><a href="edit.php?id=<?php echo $data['编号']?>"><span
					class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 修改</a></td>
			<td><a style="color: red" href="javascript:void(0)"
				onclick="del(<?php echo $data['编号']?>)"> <span
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