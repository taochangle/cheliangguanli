<?php include '../inc/isadmin.php';?>
<?php include_once '../common/header.inc.php'; ?>
<?php if (! isset ( $_GET ['id'] ) || ! is_numeric ( $_GET ['id'] )) {
	skip ( 'index.php', '信息不存在！' );
}
?>
<?php
if (isset($_POST['submit'])){

    if ($_POST['admin_password']==''){
            $query = "select admin_password from liu_admin where id = {$_GET['id']}";
            $result = execute($link, $query);
            $data = mysqli_fetch_assoc($result);
            $pwd_old = $data['admin_password'];
            $query = "update  liu_admin set admin_password = '{$pwd_old}',admin_name = '{$_POST['admin_name']}' where id = {$_GET['id']}";
            $result = execute($link, $query);
            if (mysqli_affected_rows($link)==1){
                skip('index.php', '更新成功！');
            }else{
                skip('index.php', '更新失败！');
            }
    }else {
        $query = "update  liu_admin set   admin_password= md5('{$_POST['admin_password']}'),admin_name = '{$_POST['admin_name']}' where id = {$_GET['id']}";

        $result = execute($link, $query);
        if (mysqli_affected_rows($link)==1){
            skip('index.php', '更新成功！');
        }else{
            skip('index.php', '更新失败！');
        }
    }
}
?>
<body>

<form  method="post" class="definewidth m20">

<?php
$query = "select * from liu_admin where id = {$_GET['id']}";
$result = execute($link, $query);
$data = mysqli_fetch_assoc($result);
?>
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">登录名</td>
            <td><input  type="text" readonly  value="<?php echo $data['admin_login_name']?>"/> <span style="color:red">登录名不能修改</span></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="password" name="admin_password"/></td>
        </tr>
        <tr>
            <td class="tableleft">真实姓名</td>
            <td><input type="text" name="admin_name" value="<?php echo $data['admin_name']?>"/></td>
        </tr>


        <tr>
            <td class="tableleft"></td>
            <td>
                <button name="submit" type="submit" class="btn btn-primary" type="button">保存</button>				 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {
		$('#backid').click(function(){
				window.location.href="index.php";
		 });

    });
</script>