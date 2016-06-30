<?php include '../inc/isadmin.php';?>
<?php include_once '../common/header.inc.php';
?>
<?php
if (isset($_POST['submit'])){
    if (($_POST['uname']=='')||($_POST['upw']=='')){
        skip('add.php', '用户名和密码不能为空！');
    }
    if ($_POST['uname']=='admin'){
        skip('add.php', '该用户名被禁用！');
    }
    $query = "insert into liu_user set
    uname = '{$_POST['uname']}',
    upw= md5('{$_POST['upw']}'),
    utime = now(),
    name='{$_POST['name']}'
    ";
    execute($link, $query);
    if (mysqli_affected_rows($link)==1){
        skip('index.php', '添加成功');
    }else {
        skip('index.php', '添加失败');
    }
}
?>
<div class="container body-content">
	<h2>添加</h2>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-horizontal">
			<h4>后台管理用户</h4>
			<hr />


			<div class="form-group">
				<label class="control-label col-md-2" for="ReleaseDate">用户名</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" data-val="true"
						id="cuser" name="uname" type="text" value="" /> <span
						class="field-validation-valid text-danger"
						data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">别名</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line"
						name="name" type="text" value="" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">密码</label>
				<div class="col-md-8">
					<input class="form-control text-box single-line" name="upw"
						type="text" value="" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
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
        $('#backid').click(function(){
                window.location.href="index.php";
         });

    });

        </script>