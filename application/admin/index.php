<?php
include '../inc/isadmin.php';
 ?>
<?php include_once '../common/header.inc.php';
?>
<?php
$query = "select * from liu_admin limit 1";
$result = execute($link, $query);
$data = mysqli_fetch_assoc($result);
?>
<body >
<div class="container body-content">
	<h2>详情信息</h2>
	<div class="row">
		<div class="col-xs-6 col-md-6" >
			<div style="font-style: 30px">
				<h4>管理员信息</h4>
				<hr />
				<dl class="dl-horizontal">
					<dt>序号</dt>
					<dd>
						<?php echo $data['id'] ?></dd>
					<dt>登录名</dt>
					<dd>
						<?php echo $data['admin_login_name'] ?></dd>
					<dt>别名</dt>
					<dd>
						<?php echo $data['admin_name'] ?></dd>
					<dt>上次登录日期</dt>
					<dd>
						<?php echo $data['last_login_time'] ?></dd>
				</dl>

			</div>
		</div>
	<!-- 	<div class="col-xs-6 col-md-3">
			<h4>

			</h4>
			<hr />

		</div> -->
		<div class="col-xs-6 col-md-3">
			<h4>
				头像
			</h4>
			<hr />
			<a href="#" class="thumbnail">
				<img src="<?php echo $data['admin_img'] ?>" alt="管理员头像"></a>
		</div>
	</div>

	<p>
		<a href="edit.php?id=<?php echo $data['id'] ?>">编辑</a>


	</p>


</div>

</body>