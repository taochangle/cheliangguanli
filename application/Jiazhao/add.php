<?php include_once '../common/header.inc.php'; ?>
<?php

if (isset($_POST['submit'])) {

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
       
        $file_save_path_2 = '';

    }elseif(is_uploaded_file($_FILES['img_2']['tmp_name'])&&(!is_uploaded_file($_FILES['img_1']['tmp_name']))){
        $file_2 = pathinfo($_FILES['img_2']['name']);
        $file_save_path_2 = '../../public/uploads/jiazhao/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_2['extension'];
        move_uploaded_file($_FILES['img_2']['tmp_name'], $file_save_path_2);
        
        $file_save_path_1 = '';
    }else{
        
        $file_save_path_1 = '';
        $file_save_path_2 = '';
    }
    $query = "insert into liu_jiazhao
            (
               j_user,

            j_phone,
            j_pid,
            j_idcard,
            j_regtime,
            j_image1,

            j_image2
            )
            values(
             '{$_POST['juser']}',
              '{$_POST['juser_phone']}',
               '{$_POST['j_pid']}',
                '{$_POST['j_idcard']}',
             '{$_POST['jreg_time']}',
              '{$file_save_path_1}',
              '{$file_save_path_2}'
            )";
    execute($link, $query);
    if (mysqli_affected_rows($link) == 1) {
        skip('index.php', '添加成功！');
    } else {
        skip('index.php', '添加失败！');
    }
}
?>
<div class="container body-content">
	<h2>增加</h2>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-horizontal">
			<h4>车辆信息</h4>
			<hr />


			<div class="form-group">
				<label class="control-label col-md-2" for="ReleaseDate">姓名</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						id="cuser" name="juser" type="text" value="" /> <span
						class="field-validation-valid text-danger"
						data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">联系电话</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line"
						name="juser_phone" type="text" value="" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">身份证号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" name="j_idcard"
						type="text" value="" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">档案编号</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line"
						name="j_pid" type="text" value="" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">注册日期</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						id="datepicker1" name="jreg_time" type="text" value="" /> <span
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