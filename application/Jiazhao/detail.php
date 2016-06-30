<?php
 include_once'../common/header.inc.php'; ?>
 <?php if (! isset ( $_GET ['jid'] ) || ! is_numeric ( $_GET ['jid'] )) {
	skip ( 'index.php', '信息不存在！' );
}
?>
<?php
$query = "select * from liu_jiazhao where j_id = {$_GET['jid']}";
$result = execute($link,$query);

?>

<body >
<div class="container body-content">
	<h2>详情信息</h2>
	<div class="row">
		<div class="col-xs-6 col-md-6" >
			<div style="font-style: 30px">
				<h4>驾照信息</h4>
				<hr />
				<?php

					while ( $data = mysqli_fetch_assoc ( $result ) ) {
				 ?>
				<dl class="dl-horizontal">
					<dt>姓名</dt>
					<dd>
						<?php echo $data['j_user'] ?></dd>
					<dt>电话</dt>
					<dd>
						<?php echo $data['j_phone'] ?></dd>
					<dt>身份证号</dt>
					<dd>
						<?php echo $data['j_idcard'] ?></dd>
					<dt>档案编号</dt>
					<dd>
						<?php echo $data['j_pid'] ?></dd>
					<dt>注册日期</dt>
					<dd>
					<?php echo date("Y/m/d",strtotime($data['j_regtime']))?></dd>

				</dl>

			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<h4>
				照片1（
				<a href="<?php echo $data['j_image1'] ?>">原版下载</a>
				）
			</h4>
			<hr />
			<a href="#" class="thumbnail">
				<img src="<?php echo $data['j_image1'] ?>" alt="行驶证照片正本"></a>
		</div>
		<div class="col-xs-6 col-md-3">
			<h4>
				照片2（
				<a href="<?php echo $data['j_image2'] ?>">原版下载</a>
				）
			</h4>
			<hr />
			<a href="#" class="thumbnail">
				<img src="<?php echo $data['j_image2'] ?>" alt="行驶证照片副本"></a>
		</div>
	</div>
	<?php } ?>
	<p>
		<a href="edit.php?jid=<?php echo $_GET['jid'] ?>">编辑</a>
		|
		<a href="index.php">返回列表</a>
	</p>


</div>

</body>
</html>