<?php
 include_once'../common/header.inc.php'; ?>
 <?php if (! isset ( $_GET ['cid'] ) || ! is_numeric ( $_GET ['cid'] )) {
	skip ( 'index.php', '信息不存在！' );
}
?>
<?php
$query = "select * from liu_car_info where cid = {$_GET['cid']}";
$result = execute($link,$query);

?>

<body >
<div class="container body-content">
	<h2>详情信息</h2>
	<div class="row">
		<div class="col-xs-6 col-md-6" >
			<div style="font-style: 30px">
				<h4>车辆信息</h4>
				<hr />
				<?php

					while ( $data = mysqli_fetch_assoc ( $result ) ) {
				 ?>
				<dl class="dl-horizontal">
					<dt>车牌号</dt>
					<dd>
						<?php echo $data['ccar_num'] ?></dd>
					<dt>车主姓名</dt>
					<dd>
						<?php echo $data['cuser'] ?></dd>
					<dt>联系电话</dt>
					<dd>
						<?php echo $data['cuser_phone'] ?></dd>
					<dt>品牌型号</dt>
					<dd>
						<?php echo $data['cbrand'] ?></dd>
					<dt>车架号</dt>
					<dd>
						<?php echo $data['cchejia_num'] ?></dd>
					<dt>发动机号</dt>
					<dd>
						<?php echo $data['cmotor_num'] ?></dd>
					<dt>注册日期</dt>
					<dd>
						<?php echo $data['creg_time'] ?></dd>
					<dt>本次检验有效期</dt>
					<dd>
						<?php echo $data['cnext_time'] ?></dd>
					<dt>下次检验有效期</dt>
					<dd>
						<?php echo $data['ceffective_time'] ?></dd>
				</dl>

			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<h4>
				行驶证正本（
				<a href="<?php echo $data['ccar_img_Z'] ?>">原版下载</a>
				）
			</h4>
			<hr />
			<a href="#" class="thumbnail">
				<img src="<?php echo $data['ccar_img_Z'] ?>" alt="行驶证照片正本"></a>
		</div>
		<div class="col-xs-6 col-md-3">
			<h4>
				行驶证副本（
				<a href="<?php echo $data['ccar_img_F'] ?>">原版下载</a>
				）
			</h4>
			<hr />
			<a href="#" class="thumbnail">
				<img src="<?php echo $data['ccar_img_F'] ?>" alt="行驶证照片副本"></a>
		</div>
	</div>
	<?php } ?>
	<p>
		<a href="edit.php?cid=<?php echo $_GET['cid'] ?>">编辑</a>
		|
		<a href="index.php">返回列表</a>
	</p>


</div>

</body>
</html>