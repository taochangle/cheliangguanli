<?php include_once'../common/header.inc.php'; ?>



<?php

//判断非法传参，以免数据被破坏
if (! isset ( $_GET ['cid'] ) || ! is_numeric ( $_GET ['cid'] )) {
	skip ( 'index.php', '信息不存在！' );
}
?>

<?php
if (isset ( $_POST ['submit'] )) {

	if(is_uploaded_file($_FILES['img_1']['tmp_name'])&&is_uploaded_file($_FILES['img_2']['tmp_name'])){
			$file_1 = pathinfo($_FILES['img_1']['name']);
			$file_2 = pathinfo($_FILES['img_2']['name']);
		$file_save_path_1 = '../../public/uploads/carinfo/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_1['extension'];
		$file_save_path_2 = '../../public/uploads/carinfo/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_2['extension'];
		move_uploaded_file($_FILES['img_1']['tmp_name'], $file_save_path_1);
		move_uploaded_file($_FILES['img_2']['tmp_name'], $file_save_path_2);

	}elseif(is_uploaded_file($_FILES['img_1']['tmp_name'])&&(!is_uploaded_file($_FILES['img_2']['tmp_name']))){
		$file_1 = pathinfo($_FILES['img_1']['name']);
		$file_save_path_1 = '../../public/uploads/carinfo/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_1['extension'];
		move_uploaded_file($_FILES['img_1']['tmp_name'], $file_save_path_1);
		$query = "select ccar_img_F from liu_car_info where cid = {$_GET['cid']}";
		$result = execute($link,$query);
		 $data = mysqli_fetch_assoc($result);
		$file_save_path_2 = "{$data['ccar_img_F']}";

	}elseif(is_uploaded_file($_FILES['img_2']['tmp_name'])&&(!is_uploaded_file($_FILES['img_1']['tmp_name']))){
		$file_2 = pathinfo($_FILES['img_2']['name']);
		$file_save_path_2 = '../../public/uploads/carinfo/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_2['extension'];
		move_uploaded_file($_FILES['img_2']['tmp_name'], $file_save_path_2);
		$query = "select ccar_img_Z from liu_car_info where cid = {$_GET['cid']}";
		$result = execute($link,$query);
		 $data = mysqli_fetch_assoc($result);
		$file_save_path_1 = "{$data['ccar_img_Z']}";
	}else{
		$query = "select ccar_img_Z,ccar_img_F from liu_car_info where cid = {$_GET['cid']}";
		$result = execute($link,$query);
		 $data = mysqli_fetch_assoc($result);
		$file_save_path_1 = "{$data['ccar_img_Z']}";
		$file_save_path_2 = "{$data['ccar_img_F']}";
	}

	$query = "
		UPDATE liu_car_info
		SET
		ccar_num ='{$_POST['ccar_num']}',
		 cbrand ='{$_POST['cbrand']}',
		 cuser ='{$_POST['cuser']}',
		 cuser_phone ='{$_POST['cuser_phone']}',
		 cchejia_num ='{$_POST['cchejia_num']}',
		 cmotor_num ='{$_POST['cmotor_num']}',
		 cadd_time = now(),
		 creg_time ='{$_POST['creg_time']}',
		 cbanfa_time ='{$_POST['cbanfa_time']}',
		 ceffective_time ='{$_POST['ceffective_time']}',
		 cnext_time ='{$_POST['cnext_time']}',
		 ccar_img_Z ='{$file_save_path_1}',
		 ccar_img_F ='{$file_save_path_2}'
		WHERE	cid = {$_GET['cid']}";
		//var_dump($query);
	execute ( $link, $query );
	if (mysqli_affected_rows ( $link ) == 1) {
		skip ('index.php','更新成功！' );
	} else {
		skip ("edit.php?id={$_GET['cid']}","更新失败！" );
	}
}
?>

<body>

<div class="container body-content">
	<div class="row">
		<div class="col-xs-6 col-md-6" >
			<h2>编辑</h2>

			<form action="" method="post" enctype="multipart/form-data">
				<?php
					$query = "select * from liu_car_info where cid = {$_GET['cid']}";
					$result = execute($link, $query);
					$data = mysqli_fetch_assoc($result);
				?>
				<div class="form-horizontal">
					<h4>车辆信息</h4>
					<hr />

					<div class="form-group">
						<label class="control-label col-md-3" for="Title">车牌号</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" id="ccar_num"  name="ccar_num" type="text" value="<?php echo $data['ccar_num'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="ccar_num" data-valmsg-replace="true"></span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="ReleaseDate">所有人姓名</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true"   id="cuser"  name="cuser" type="text" value="<?php echo $data['cuser'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="Genre">联系电话</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line"  id="cuser_phone"  name="cuser_phone" type="text" value="<?php echo $data['cuser_phone'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Genre" data-valmsg-replace="true"></span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="Price">汽车品牌</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true" id="cbrand"  name="cbrand"  type="text" value="<?php echo $data['cbrand'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="Price">车架号</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true" id="cchejia_num"  name="cchejia_num" type="text" value="<?php echo $data['cchejia_num'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="Price">发动机号</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true" id="cmotor_num"  name="cmotor_num"  type="text" value="<?php echo $data['cmotor_num'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="Price">注册日期</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true" id="datepicker1" name="creg_time" type="text" value="<?php echo $data['creg_time'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="Price">发证日期</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true"  name="cbanfa_time" id="datepicker2"  type="text" value="<?php echo $data['cbanfa_time'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="Price">车检有效期</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true" name="cnext_time" id="datepicker4" type="text" value="<?php echo $data['ceffective_time'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="Price">下次检验有效期</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true"  name="ceffective_time" id="datepicker3"type="text" value="<?php echo $data['cnext_time'] ?>
							" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="Price">行驶证正本</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true" name="img_1"type="file"  />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="Price">行驶证副本</label>
						<div class="col-md-8">
							<input class="form-control text-box single-line" data-val="true" name="img_2"   type="file" />
							<span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-md-3" for="Price">&nbsp;</label>
						<div class=" col-md-8">
							<input type="submit" value="更新" name="submit" class="btn btn-default" />

						</div>
					</div>
				</div>

			</form>
		</div>

		<div class="col-xs-6 col-md-3">
		<h2>&nbsp;</h2>
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
			<h2>&nbsp;</h2>
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
	<p>
		<a href="info.php?cid=<?php echo $_GET['cid'] ?>">查看</a>
		|
		<a href="index.php">返回列表</a>
	</p>

</div>

<script type="text/javascript">
            $(function () {
                $('#datepicker1').datepicker({
                	language:'zh-CN',
                    format:'yyyy年mm月dd日',
                    autoclose:true,
                    todayBtn:'linked'
                });
            });
            $(function () {
                $('#datepicker2').datepicker({
                	language:'zh-CN',
                    format:'yyyy年mm月dd日',
                    autoclose:true,
                    todayBtn:'linked'
                });
            });
            $(function () {
                $('#datepicker3').datepicker({
                	language:'zh-CN',
                    format:'yyyy年mm月dd日',
                    autoclose:true,
                    todayBtn:'linked'
                });
            });
            $(function () {
                $('#datepicker4').datepicker({
                	language:'zh-CN',
                    format:'yyyy年mm月dd日',
                    autoclose:true,
                    todayBtn:'linked'
                });
            });
        </script>
</body>
</html>