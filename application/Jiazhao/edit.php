<?php include_once'../common/header.inc.php'; ?>
<?php if (! isset ( $_GET ['jid'] ) || ! is_numeric ( $_GET ['jid'] )) {
	skip ( 'index.php', '信息不存在！' );
}
?>
<?php
if(isset($_POST['submit'])){
    if(is_uploaded_file($_FILES['img_1']['tmp_name'])&&is_uploaded_file($_FILES['img_2']['tmp_name'])){
        $file_1 = pathinfo($_FILES['img_1']['name']);
        $file_2 = pathinfo($_FILES['img_2']['name']);
        $file_save_path_1 = '../../public/uploads/jiazhao/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_1['extension'];
        $file_save_path_2 = '../../public/uploads/jiazhao/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_2['extension'];
        move_uploaded_file($_FILES['img_1']['tmp_name'], $file_save_path_1);
        move_uploaded_file($_FILES['img_2']['tmp_name'], $file_save_path_2);

    }elseif(is_uploaded_file($_FILES['img_1']['tmp_name'])&&(!is_uploaded_file($_FILES['img_2']['tmp_name']))){
        $file_1 = pathinfo($_FILES['img_1']['name']);
        $file_save_path_1 = '../../public/uploads/jiazhao/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_1['extension'];
        move_uploaded_file($_FILES['img_1']['tmp_name'], $file_save_path_1);
        $query = "select j_image2 from liu_jiazhao where j_id = {$_GET['jid']}";
        $result = execute($link,$query);
        $data = mysqli_fetch_assoc($result);
        $file_save_path_2 = "{$data['j_image2']}";

    }elseif(is_uploaded_file($_FILES['img_2']['tmp_name'])&&(!is_uploaded_file($_FILES['img_1']['tmp_name']))){
        $file_2 = pathinfo($_FILES['img_2']['name']);
        $file_save_path_2 = '../../public/uploads/jiazhao/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_2['extension'];
        move_uploaded_file($_FILES['img_2']['tmp_name'], $file_save_path_2);
        $query = "select j_image1 from liu_jiazhao where j_id = {$_GET['jid']}";
        $result = execute($link,$query);
        $data = mysqli_fetch_assoc($result);
        $file_save_path_1 = "{$data['j_image1']}";
    }else{
        $query = "select j_image1,j_image2 from liu_jiazhao where j_id = {$_GET['jid']}";
        $result = execute($link,$query);
        $data = mysqli_fetch_assoc($result);
        $file_save_path_1 = "{$data['j_image1']}";
        $file_save_path_2 = "{$data['j_image2']}";
    }
    $query = "update liu_jiazhao set
            j_user = '{$_POST['juser']}',
            j_phone = '{$_POST['juser_phone']}',
            j_pid = '{$_POST['j_pid']}',
            j_idcard = '{$_POST['j_idcard']}',
         j_regtime ='{$_POST['jreg_time']}',
		 j_image1 ='{$file_save_path_1}',
		 j_image2 ='{$file_save_path_2}'
		WHERE	j_id = {$_GET['jid']}
            ";
     execute($link, $query);
    if (mysqli_affected_rows($link)==1){
        skip('index.php', '修改成功！');
    }else {
        skip('index.php', '添加失败！');
    }
}
?>
<div class="container body-content">
	<h2>修改</h2>
	<?php
	$query = "select * from liu_jiazhao where J_id = {$_GET['jid']}";
	$result = execute($link, $query);
	$data = mysqli_fetch_assoc($result);
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-horizontal">
			<h4>车辆信息</h4>
			<hr />


			<div class="form-group">
				<label class="control-label col-md-2" for="ReleaseDate">姓名</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						id="cuser" name="juser" type="text" value="<?php echo $data['j_user']?>" /> <span
						class="field-validation-valid text-danger"
						data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">联系电话</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line"
						name="juser_phone" type="text" value="<?php echo $data['j_phone']?>" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">身份证号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" name="j_idcard"
						type="text" value="<?php echo $data['j_idcard']?>" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">档案编号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line"
						name="j_pid" type="text" value="<?php echo $data['j_pid']?>" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">注册日期</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						id="datepicker1" name="jreg_time" type="text" value="<?php echo date("Y-m-d",strtotime($data['j_regtime']))?>" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Price"
						data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Price">驾驶证照片1</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						name="img_1" type="file" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Price"
						data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">驾驶证照片2</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						name="img_2" type="file" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Price"
						data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">&nbsp;</label>
				<div class=" col-md-8">
					<input type="submit" value="更新" name="submit"
						class="btn btn-default" />

				</div>
			</div>
		</div>
	</form>

	<div>
		<a href="index.php">返回列表</a>
	</div>
</div>

<script type="text/javascript">
            $(function () {
                $('#datepicker1').datepicker({
                    language: 'zh-CN',
                    format: 'yyyy-mm-dd',
                    autoclose:true,
                    todayBtn: 'linked'

                });
            });

    $(function () {
        $('#backid').click(function(){
                window.location.href="index.php";
         });

    });

        </script>