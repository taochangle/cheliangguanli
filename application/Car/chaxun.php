<?php

include_once '../common/header.inc.php';
include_once '../inc/page.inc.php';
if (isset($_POST['search'])){
	var_dump($_POST);exit();
	//header("Location:index.php?cuser={$_POST['cuser']}");
}

?>
<style>
.table th, .table td {
	text-align: center;
}
</style>
<body>

<form class="form-inline definewidth m20" action="index.php" method="get">
	车主名：
	<input type="text" name="cuser" id="rolename" required
					class="abc input-default" placeholder="" value="">
	&nbsp;&nbsp;车牌号：
	<input type="text" name="ccar_num" required
					class="abc input-default" placeholder="" value="">
	&nbsp;&nbsp;
				发动机号：
	<input type="text" name="cmotor_num"  required
					class="abc input-default" placeholder="" value="">
	&nbsp;&nbsp;
					车架号：
	<input type="text" name="cchejia_num" required
					class="abc input-default" placeholder="" value="">
	&nbsp;&nbsp;
	<button name="submit" type="submit" class="btn btn-primary btn-xs">查询</button>
	&nbsp;&nbsp;
	<a href="add.php" class="btn btn-success btn-xs">添加车辆信息</a>
</form>
<br />




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


function del(cid)
	{


		if(confirm("确定要删除第"+cid+"条记录吗？"))
		{

			var url = "del.php?cid="+cid;

			window.location.href=url;

		}


	}


</script>