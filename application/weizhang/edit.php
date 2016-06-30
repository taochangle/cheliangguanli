<?php include_once '../common/header.inc.php'; ?>

<?php 
if (! isset ( $_GET ['id'] ) || ! is_numeric ( $_GET ['id'] )) {
	skip ( 'index.php', '*_*id不存在,修改失败！' );
}
if (isset($_POST['submit'])){
	
	$query = "update  weizhang set 
	name = '{$_POST['name']}',
	phone='{$_POST['phone']}',
	idcard='{$_POST['idcard']}',
	car_num='{$_POST['car_num']}',
	info = '{$_POST['info']}',
	is_ok = {$_POST['is_ok']}";
	//var_dump($query);exit();
	$result = execute($link, $query);
	if (mysqli_affected_rows($link)==1){
		skip('index.php', '修改成功！');
	}else {
		skip('add.php','修改失败！');
	}
}
?>
<div class="container body-content">
	<h2>编辑</h2>
	<?php 
	$query = "select * from weizhang where id= {$_GET ['id']}";
	//var_dump($query);
	$result = execute($link, $query);
	
	$data = mysqli_fetch_assoc($result);
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-horizontal">
			<h4>违章记录</h4>
			<hr />
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">姓名</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						name="name" type="text" value="<?php echo $data['name']?>" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Price"
						data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Title">电话号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" id="ccar_num"
						name="phone" type="text" value="<?php echo $data['phone']?>" /> <span
						class="field-validation-valid text-danger"
						data-valmsg-for="ccar_num" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="ReleaseDate">身份证号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						name="idcard" type="text" value="<?php echo $data['idcard']?>" /> <span
						class="field-validation-valid text-danger"
						data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">车牌号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" name="car_num"
						type="text" value="<?php echo $data['car_num']?>" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Price">违章情况</label>
				<div class="col-md-8">
					<textarea class="form-control text-box single-line" data-val="true"
						id="cbrand" rows="5" name="info"><?php echo $data['info']?></textarea>
					<span class="field-validation-valid text-danger"
						data-valmsg-for="Price" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Price">是否处理</label>
				<div class="col-md-8">
					<select class="form-control" name='is_ok'>
						<option value='1'>是</option>
						<option value='0'>否</option>
					</select> <span class="field-validation-valid text-danger"
						data-valmsg-for="Price" data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">&nbsp;</label>
				<div class=" col-md-8">
					<input type="submit" value="修改" name="submit"
						class="btn btn-default" />

				</div>
			</div>
		</div>
	</form>

	<div>
		<a href="index.php">返回列表</a>
	</div>
</div>
</body>

</html>