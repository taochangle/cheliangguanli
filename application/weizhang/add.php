<?php include_once '../common/header.inc.php'; ?>
<?php 
if (isset($_POST['submit'])){
	$query = "insert into weizhang
	(name,phone,idcard,car_num,info,is_ok)
	values
	('{$_POST['name']}','{$_POST['phone']}','{$_POST['idcard']}','{$_POST['car_num']}','{$_POST['info']}','{$_POST['is_ok']}')";
	$result = execute($link, $query);
	if (mysqli_affected_rows($link)==1){
		skip('index.php', '添加成功！');
	}else {
		skip('add.php','添加失败！');
	}
}
?>
<div class="container body-content">
	<h2>增加</h2>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-horizontal">
			<h4>违章记录</h4>
			<hr />
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">姓名</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						name="name" type="text" value="" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Price"
						data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Title">电话号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" id="ccar_num"
						name="phone" type="text" value="" /> <span
						class="field-validation-valid text-danger"
						data-valmsg-for="ccar_num" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="ReleaseDate">身份证号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						name="idcard" type="text" value="" /> <span
						class="field-validation-valid text-danger"
						data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">车牌号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" name="car_num"
						type="text" value="" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Price">违章情况</label>
				<div class="col-md-8">
					<textarea class="form-control text-box single-line" data-val="true"
						id="cbrand" rows="5" name="info"></textarea>
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
					<input type="submit" value="添加" name="submit"
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