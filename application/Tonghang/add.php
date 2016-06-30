<?php include_once '../common/header.inc.php'; ?>

<?php
if (isset($_POST['submit'])) {

    if (! isset($_POST['f_bf1'])) {
        $_POST['f_bf1'] = '0';
    }
    if (! isset($_POST['f_bno1'])) {
        $_POST['f_bno1'] = '0';
    }
    if (! isset($_POST['f_bf2'])) {
        $_POST['f_bf2'] = '0';
    }
    if (! isset($_POST['f_bno2'])) {
        $_POST['f_bno2'] = '0';
    }
    if (! isset($_POST['f_bf3'])) {
        $_POST['f_bf3'] = '0';
    }
    if (! isset($_POST['f_bno3'])) {
        $_POST['f_bno3'] = '0';
    }
    if (! isset($_POST['f_bf4'])) {
        $_POST['f_bf4'] = '0';
    }
    if (! isset($_POST['f_bno4'])) {
        $_POST['f_bno4'] = '0';
    }
    if (! isset($_POST['f_bf5'])) {
        $_POST['f_bf5'] = '0';
    }
    if (! isset($_POST['f_bno5'])) {
        $_POST['f_bno5'] = '0';
    }
    if (! isset($_POST['f_bf6'])) {
        $_POST['f_bf6'] = '0';
    }
    if (! isset($_POST['f_bno6'])) {
        $_POST['f_bno6'] = '0';
    }
    if (! isset($_POST['f_sy1'])) {
        $_POST['f_sy1'] = '0';
    }
    if (! isset($_POST['f_sf1'])) {
        $_POST['f_sf1'] = '0';
    }
    if (! isset($_POST['f_sno1'])) {
        $_POST['f_sno1'] = '0';
    }
    if (! isset($_POST['f_xy1'])) {
        $_POST['f_xy1'] = '0';
    }
    if (! isset($_POST['f_xf1'])) {
        $_POST['f_xf1'] = '0';
    }
    if (! isset($_POST['f_xno1'])) {
        $_POST['f_xno1'] = '0';
    }

    if (! isset($_POST['f_sy2'])) {
        $_POST['f_sy2'] = '0';
    }
    if (! isset($_POST['f_sf2'])) {
        $_POST['f_sf2'] = '0';
    }
    if (! isset($_POST['f_sno2'])) {
        $_POST['f_sno2'] = '0';
    }
    if (! isset($_POST['f_xy2'])) {
        $_POST['f_xy2'] = '0';
    }
    if (! isset($_POST['f_xf2'])) {
        $_POST['f_xf2'] = '0';
    }
    if (! isset($_POST['f_xno2'])) {
        $_POST['f_xno2'] = '0';
    }

    if (! isset($_POST['f_sy3'])) {
        $_POST['f_sy3'] = '0';
    }
    if (! isset($_POST['f_sf3'])) {
        $_POST['f_sf3'] = '0';
    }
    if (! isset($_POST['f_sno3'])) {
        $_POST['f_sno3'] = '0';
    }
    if (! isset($_POST['f_xy3'])) {
        $_POST['f_xy3'] = '0';
    }
    if (! isset($_POST['f_xf3'])) {
        $_POST['f_xf3'] = '0';
    }
    if (! isset($_POST['f_xno3'])) {
        $_POST['f_xno3'] = '0';
    }

    if (! isset($_POST['f_sy4'])) {
        $_POST['f_sy4'] = '0';
    }
    if (! isset($_POST['f_sf4'])) {
        $_POST['f_sf4'] = '0';
    }
    if (! isset($_POST['f_sno4'])) {
        $_POST['f_sno4'] = '0';
    }
    if (! isset($_POST['f_xy4'])) {
        $_POST['f_xy4'] = '0';
    }
    if (! isset($_POST['f_xf4'])) {
        $_POST['f_xf4'] = '0';
    }
    if (! isset($_POST['f_xno4'])) {
        $_POST['f_xno4'] = '0';
    }

    if (! isset($_POST['f_sy5'])) {
        $_POST['f_sy5'] = '0';
    }
    if (! isset($_POST['f_sf5'])) {
        $_POST['f_sf5'] = '0';
    }
    if (! isset($_POST['f_sno5'])) {
        $_POST['f_sno5'] = '0';
    }
    if (! isset($_POST['f_xy5'])) {
        $_POST['f_xy5'] = '0';
    }
    if (! isset($_POST['f_xf5'])) {
        $_POST['f_xf5'] = '0';
    }
    if (! isset($_POST['f_xno5'])) {
        $_POST['f_xno5'] = '0';
    }

    if (! isset($_POST['f_sy6'])) {
        $_POST['f_sy6'] = '0';
    }
    if (! isset($_POST['f_sf6'])) {
        $_POST['f_sf6'] = '0';
    }
    if (! isset($_POST['f_sno6'])) {
        $_POST['f_sno6'] = '0';
    }
    if (! isset($_POST['f_xy6'])) {
        $_POST['f_xy6'] = '0';
    }
    if (! isset($_POST['f_xf6'])) {
        $_POST['f_xf6'] = '0';
    }
    if (! isset($_POST['f_xno6'])) {
        $_POST['f_xno6'] = '0';
    }
   // var_dump($_POST);exit();
    $query = "INSERT INTO liu_tonghang_base(
                                    t_diqu        ,
                                    t_name          ,
                                    t_phone           ,
                                    t_weixin     ,
                                    t_dizhi

                                ) VALUES (
                                    '{$_POST['t_diqu']}',
                                    '{$_POST['t_name']}',
                                    '{$_POST['t_phone']}',
                                    '{$_POST['t_weixin']}',
                                    '{$_POST['t_dizhi']}'
                                );
                                ";
    execute($link, $query);
    $newid = mysqli_insert_id($link);

    /*
     * 往liu_tonghang_fujian中插数值
     */

    $query = "
        INSERT INTO liu_tonghang_fujian(t_id,f_type,f_sy,f_sf,f_sno,f_xy,f_xf,f_xno,f_bf,f_bno,f_price)
    VALUES (
    '{$newid}',
    1,
    '{$_POST['f_sy1']}',
    '{$_POST['f_sf1']}',
    '{$_POST['f_sno1']}',
    '{$_POST['f_xy1']}',
    '{$_POST['f_xf1']}',
    '{$_POST['f_xno1']}',
    '{$_POST['f_bf1']}',
    '{$_POST['f_bno1']}',
    '{$_POST['f_price1']}'
    );";
    execute($link, $query);
    $query = "
    INSERT INTO liu_tonghang_fujian(t_id,f_type,f_sy,f_sf,f_sno,f_xy,f_xf,f_xno,f_bf,f_bno,f_price)
    VALUES (
    '{$newid}',
    2,
    '{$_POST['f_sy2']}',
    '{$_POST['f_sf2']}',
    '{$_POST['f_sno2']}',
    '{$_POST['f_xy2']}',
    '{$_POST['f_xf2']}',
    '{$_POST['f_xno2']}',
        '{$_POST['f_bf2']}',
    '{$_POST['f_bno2']}',
     '{$_POST['f_price2']}'
    );";
    execute($link, $query);
    $query = "
    INSERT INTO liu_tonghang_fujian(t_id,f_type,f_sy,f_sf,f_sno,f_xy,f_xf,f_xno,f_bf,f_bno,f_price)
    VALUES (
    '{$newid}',
    3,
    '{$_POST['f_sy3']}',
    '{$_POST['f_sf3']}',
    '{$_POST['f_sno3']}',
    '{$_POST['f_xy3']}',
    '{$_POST['f_xf3']}',
    '{$_POST['f_xno3']}',
        '{$_POST['f_bf3']}',
    '{$_POST['f_bno3']}',
     '{$_POST['f_price3']}'
    );";
    execute($link, $query);
    $query = "
    INSERT INTO liu_tonghang_fujian(t_id,f_type,f_sy,f_sf,f_sno,f_xy,f_xf,f_xno,f_bf,f_bno,f_price)
    VALUES (
    '{$newid}',
    4,
    '{$_POST['f_sy4']}',
    '{$_POST['f_sf4']}',
    '{$_POST['f_sno4']}',
    '{$_POST['f_xy4']}',
    '{$_POST['f_xf4']}',
    '{$_POST['f_xno4']}',
        '{$_POST['f_bf4']}',
    '{$_POST['f_bno4']}',
     '{$_POST['f_price4']}'
    );";
    execute($link, $query);
    $query = "
    INSERT INTO liu_tonghang_fujian(t_id,f_type,f_sy,f_sf,f_sno,f_xy,f_xf,f_xno,f_bf,f_bno,f_price)
    VALUES (
    '{$newid}',
    5,
    '{$_POST['f_sy5']}',
    '{$_POST['f_sf5']}',
    '{$_POST['f_sno5']}',
    '{$_POST['f_xy5']}',
    '{$_POST['f_xf5']}',
    '{$_POST['f_xno5']}',
        '{$_POST['f_bf5']}',
    '{$_POST['f_bno5']}',
     '{$_POST['f_price5']}'
    );";
    execute($link, $query);
    $query = "
    INSERT INTO liu_tonghang_fujian(t_id,f_type,f_sy,f_sf,f_sno,f_xy,f_xf,f_xno,f_bf,f_bno,f_price)
    VALUES (
    '{$newid}',
    6,
    '{$_POST['f_sy6']}',
    '{$_POST['f_sf6']}',
    '{$_POST['f_sno6']}',
    '{$_POST['f_xy6']}',
    '{$_POST['f_xf6']}',
    '{$_POST['f_xno6']}',
        '{$_POST['f_bf6']}',
    '{$_POST['f_bno6']}',
     '{$_POST['f_price6']}'
    ); ";
    execute($link, $query);
}
?>

<div class="container body-content">
	<h2>增加</h2>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-horizontal">
			<h4>同行信息</h4>
			<hr />

			<div class="form-group">
				<h4>同行信息</h4>
				<label class="control-label col-md-2" for="Title">地区</label>

				<div class="col-md-8">

					<select name='t_diqu' class="selectpicker show-tick "
						data-live-search="true">
						<optgroup label="北京市" data-max-options="1">
				<option>北京市</option>
			</optgroup>
			<optgroup label="天津市" data-max-options="1">
				<option>天津市</option>
			</optgroup>
			<optgroup label="重庆市" data-max-options="1">
				<option>重庆市</option>
			</optgroup>
			<optgroup label="上海市" data-max-options="1">
				<option>上海市</option>
			</optgroup>
			<?php
                $query_sheng = "select region_name,region_id from region where  parent_id = 1 and REGION_ID NOT in (2,3,10,23)";
                $result_sheng = execute($link, $query_sheng);
                while ($data_sheng = mysqli_fetch_assoc($result_sheng)){
			?>
			<optgroup label="<?php echo  $data_sheng['region_name']?>" data-max-options="1">
			<?php
                $query_shi = "select region_name,region_id from region where parent_id = {$data_sheng['region_id']}";
                $result_shi = execute($link, $query_shi);
                while ($data_shi = mysqli_fetch_assoc($result_shi)){
			?>
				<option><?php echo $data_shi['region_name']?></option>
				<?php
				$query_xian = "select region_name from region where parent_id = {$data_shi['region_id']}";
				$result_xian = execute($link, $query_xian);
				while ($data_xian = mysqli_fetch_assoc($result_xian)){
				?>
				<option style="color: black">    &nbsp;&nbsp; &nbsp;&nbsp; <?php echo $data_xian['region_name']?></option>
				<?php
				}
				?>
				<?php
                }
				?>
			</optgroup>
			<?php
                }
			?>

					</select> <span class="field-validation-valid text-danger"
						data-valmsg-for="ccar_num" data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="ReleaseDate">同行姓名</label>
				<div class="col-md-4">
					<input name='t_name' class="form-control text-box single-line"
						data-val="true" id="cuser" name="t_name" type="text" value="" /> <span
						class="field-validation-valid text-danger"
						data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Genre">联系电话</label>
				<div class="col-md-4">
					<input name='t_phone' class="form-control text-box single-line"
						id="cuser_phone" name="t_phone" type="text" value="" /> <span
						class="field-validation-valid text-danger" data-valmsg-for="Genre"
						data-valmsg-replace="true"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="Price">微信</label>
				<div class="col-md-4">
					<input name='t_weixin' class="form-control text-box single-line"
						data-val="true" id="cbrand" name="t_weixin" type="text" value="" />
					<span class="field-validation-valid text-danger"
						data-valmsg-for="Price" data-valmsg-replace="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">邮寄地址</label>
				<div class="col-md-4">
					<textarea name='t_dizhi' class="form-control text-box single-line"></textarea>
					<span class="field-validation-valid text-danger"
						data-valmsg-for="Price" data-valmsg-replace="true"></span>
				</div>
			</div>

				<div class="form-group">
				<label class="control-label col-md-2" for="Price">发送方式</label>
				<div class="col-md-4">
<label class="checkbox-inline"> <input name='t_kuaidi' 	type="radio" value="1"> 微信</label>
<label class="checkbox-inline"> <input name='t_kuaidi'type="radio" value="0"> 快递	</label>
				</div>
			</div>



			<h4>办理业务</h4>
			<hr>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">委托</label>
				<div class="col-md-10">
					<label class="checkbox-inline"> <input name='f_sy1' type="checkbox"
						value="1">身份证原件
					</label><label class="checkbox-inline"> <input name='f_sf1'
						type="checkbox" value="1">身份证复印件
					</label> <label class="checkbox-inline"> <input name='f_sno1'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_xy1'
						type="checkbox" value="1">行驶证原件
					</label> <label class="checkbox-inline"> <input name='f_xf1'
						type="checkbox" value="1">行驶证复印件
					</label> <label class="checkbox-inline"> <input name='f_xno1'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_bf1'
						type="checkbox" value="1">保单副本
					</label> <label class="checkbox-inline"> <input name='f_bno1'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_price1'
						type="text"> 元
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">补行驶证</label>
				<div class="col-md-10">
					<label class="checkbox-inline"> <input name='f_sy2' type="checkbox"
						value="1">身份证原件
					</label><label class="checkbox-inline"> <input name='f_sf2'
						type="checkbox" value="1">身份证复印件
					</label> <label class="checkbox-inline"> <input name='f_sno2'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_xy2'
						type="checkbox" value="1">行驶证原件
					</label> <label class="checkbox-inline"> <input name='f_xf2'
						type="checkbox" value="1">行驶证复印件
					</label> <label class="checkbox-inline"> <input name='f_xno2'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_bf2'
						type="checkbox" value="1">保单副本
					</label> <label class="checkbox-inline"> <input name='f_bno2'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_price2'
						type="text"> 元
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">补驾照</label>
				<div class="col-md-10">
					<label class="checkbox-inline"> <input name='f_sy3' type="checkbox"
						value="1">身份证原件
					</label><label class="checkbox-inline"> <input name='f_sf3'
						type="checkbox" value="1">身份证复印件
					</label> <label class="checkbox-inline"> <input name='f_sno3'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_xy3'
						type="checkbox" value="1">行驶证原件
					</label> <label class="checkbox-inline"> <input name='f_xf3'
						type="checkbox" value="1">行驶证复印件
					</label> <label class="checkbox-inline"> <input name='f_xno3'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_bf3'
						type="checkbox" value="1">保单副本
					</label> <label class="checkbox-inline"> <input name='f_bno3'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_price3'
						type="text"> 元
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">换驾照</label>
				<div class="col-md-10">
					<label class="checkbox-inline"> <input name='f_sy4' type="checkbox"
						value="1">身份证原件
					</label><label class="checkbox-inline"> <input name='f_sf4'
						type="checkbox" value="1">身份证复印件
					</label> <label class="checkbox-inline"> <input name='f_sno4'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_xy4'
						type="checkbox" value="1">行驶证原件
					</label> <label class="checkbox-inline"> <input name='f_xf4'
						type="checkbox" value="1">行驶证复印件
					</label> <label class="checkbox-inline"> <input name='f_xno4'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_bf4'
						type="checkbox" value="1">保单副本
					</label> <label class="checkbox-inline"> <input name='f_bno4'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"><input name='f_price4'
						type="text"> 元</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">补车牌</label>
				<div class="col-md-10">
					<label class="checkbox-inline"> <input name='f_sy5' type="checkbox"
						value="1">身份证原件
					</label><label class="checkbox-inline"> <input name='f_sf5'
						type="checkbox" value="1">身份证复印件
					</label> <label class="checkbox-inline"> <input name='f_sno5'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_xy5'
						type="checkbox" value="1">行驶证原件
					</label> <label class="checkbox-inline"> <input name='f_xf5'
						type="checkbox" value="1">行驶证复印件
					</label> <label class="checkbox-inline"> <input name='f_xno5'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_bf5'
						type="checkbox" value="1">保单副本
					</label> <label class="checkbox-inline"> <input name='f_bno5'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"><input name='f_price5'
						type="text"> 元</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">违章</label>
				<div class="col-md-10">
					<label class="checkbox-inline"> <input name='f_sy6' type="checkbox"
						value="1">身份证原件
					</label><label class="checkbox-inline"> <input name='f_sf6'
						type="checkbox" value="1">身份证复印件
					</label> <label class="checkbox-inline"> <input name='f_sno6'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_xy6'
						type="checkbox" value="1">行驶证原件
					</label> <label class="checkbox-inline"> <input name='f_xf6'
						type="checkbox" value="1">行驶证复印件
					</label> <label class="checkbox-inline"> <input name='f_xno6'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"> <input name='f_bf6'
						type="checkbox" value="1">保单副本
					</label> <label class="checkbox-inline"> <input name='f_bno6'
						type="checkbox" value="1">无
					</label> <label class="checkbox-inline"><input name='f_price6'
						type="text"> 元</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="Price">&nbsp;</label>
				<div class=" col-md-8">
					<input type="submit" value="添加" name="submit"
						class="btn btn-primary " />

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
                    format: 'yyyy年mm月dd日',
                    autoclose:true,
                    todayBtn: 'linked'

                });
            });
            $(function () {
                $('#datepicker2').datepicker({
                    language: 'zh-CN',
                    format: 'yyyy年mm月dd日',
                    autoclose:true,
                    todayBtn: 'linked'
                });
            });
            $(function () {
                $('#datepicker3').datepicker({
                    language: 'zh-CN',
                    format: 'yyyy年mm月dd日',
                    autoclose:true,
                    todayBtn: 'linked'
                });
            });
            $(function () {
                $('#datepicker4').datepicker({
                    language: 'zh-CN',
                    format: 'yyyy年mm月dd日',
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
</body>

</html>