<?php include '../inc/isadmin.php';?>
<?php include_once '../common/header.inc.php'; ?>
<?php if (! isset ( $_GET ['uid'] ) || ! is_numeric ( $_GET ['uid'] )) {
	skip ( 'index.php', '信息不存在！' );
}
?>
<?php
if (isset($_POST['submit'])){

    if ($_POST['upw']==''){
            $query = "select upw from liu_user where uid = {$_GET['uid']}";
            $result = execute($link, $query);
            $data = mysqli_fetch_assoc($result);
            $pwd_old = $data['upw'];
            $query = "update  liu_user set upw = '{$pwd_old}',name = '{$_POST['name']}' where uid = {$_GET['uid']}";
            $result = execute($link, $query);
            if (mysqli_affected_rows($link)==1){
                skip('index.php', '更新成功！');
            }else{
                skip('index.php', '更新失败！');
            }
    }else {
        $query = "update  liu_user set   upw= md5('{$_POST['upw']}'),name = '{$_POST['name']}' where uid = {$_GET['uid']}";

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
$query = "select * from liu_user where uid = {$_GET['uid']}";
$result = execute($link, $query);
$data = mysqli_fetch_assoc($result);
?>
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">登录名</td>
            <td><input  type="text" readonly  value="<?php echo $data['uname']?>"/> <span style="color:red">登录名不能修改</span></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="password" name="upw"/></td>
        </tr>
        <tr>
            <td class="tableleft">真实姓名</td>
            <td><input type="text" name="name" value="<?php echo $data['name']?>"/></td>
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