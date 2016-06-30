<?php include '../inc/isadmin.php';?>
<?php include_once '../common/header.inc.php'; ?>
<style>
.table th, .table td {
	text-align: center;
}
</style>
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">
    用户名称：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary btn-xs">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success btn-xs" id="addnew">新增用户</button>
</form>
<?php

$query = "select * from liu_user";
$result = execute($link, $query);

?>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户id</th>
        <th>用户名称</th>
        <th>真实姓名</th>
         <th>注册时间</th>
        <th>最后登录时间</th>
       <th colspan="2" scope="col">操作</th>
    </tr>
    </thead>
    <?php
        while ($data = mysqli_fetch_assoc($result)){
    ?>
	     <tr>
            <td><?php echo $data['uid'] ?></td>
            <td><?php echo $data['uname'] ?></td>
            <td><?php echo $data['name'] ?></td>
             <td><?php echo $data['utime'] ?></td>
            <td><?php echo $data['ulasttime'] ?></td>
            <td><a href="edit.php?uid=<?php echo $data['uid']?>"><span
					class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 修改</a></td>
			<td><a style="color: red" href="javascript:void(0)"
				onclick="del(<?php echo $data['uid']?>)"> <span
					class="glyphicon glyphicon-trash" aria-hidden="true"></span> 删除
			</a></td>
        </tr>
        <?php
}
        ?>
</table>
</body>
</html>
<script>


	function del(uid)
	{


		if(confirm("确定要删除第"+uid+"条记录吗？"))
		{

			var url = "del.php?uid="+uid;

			window.location.href=url;

		}




	}
</script>