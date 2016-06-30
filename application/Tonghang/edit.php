<?php include_once '../common/header.inc.php'; ?>

<?php
if (isset ( $_POST ['submit'] )) {
    if (!isset($_POST['f_sy1'])){  $_POST['f_sy1']= '0';}
    if (!isset($_POST['f_sf1'])){  $_POST['f_sf1']= '0';}
    if (!isset($_POST['f_sno1'])){ $_POST['f_sno1']= '0';}
    if (!isset($_POST['f_xy1'])){ $_POST['f_xy1']= '0'; }
    if (!isset($_POST['f_xf1'])){ $_POST['f_xf1']= '0'; }
    if (!isset($_POST['f_xno1'])){ $_POST['f_xno1']= '0'; }

    if (!isset($_POST['f_sy2'])){  $_POST['f_sy2']= '0';}
    if (!isset($_POST['f_sf2'])){  $_POST['f_sf2']= '0';}
    if (!isset($_POST['f_sno2'])){ $_POST['f_sno2']= '0';}
    if (!isset($_POST['f_xy2'])){ $_POST['f_xy2']= '0'; }
    if (!isset($_POST['f_xf2'])){ $_POST['f_xf2']= '0'; }
    if (!isset($_POST['f_xno2'])){ $_POST['f_xno2']= '0'; }

    if (!isset($_POST['f_sy3'])){  $_POST['f_sy3']= '0';}
    if (!isset($_POST['f_sf3'])){  $_POST['f_sf3']= '0';}
    if (!isset($_POST['f_sno3'])){ $_POST['f_sno3']= '0';}
    if (!isset($_POST['f_xy3'])){ $_POST['f_xy3']= '0'; }
    if (!isset($_POST['f_xf3'])){ $_POST['f_xf3']= '0'; }
    if (!isset($_POST['f_xno3'])){ $_POST['f_xno3']= '0'; }

    if (!isset($_POST['f_sy4'])){  $_POST['f_sy4']= '0';}
    if (!isset($_POST['f_sf4'])){  $_POST['f_sf4']= '0';}
    if (!isset($_POST['f_sno4'])){ $_POST['f_sno4']= '0';}
    if (!isset($_POST['f_xy4'])){ $_POST['f_xy4']= '0'; }
    if (!isset($_POST['f_xf4'])){ $_POST['f_xf4']= '0'; }
    if (!isset($_POST['f_xno4'])){ $_POST['f_xno4']= '0'; }

    if (!isset($_POST['f_sy5'])){  $_POST['f_sy5']= '0';}
    if (!isset($_POST['f_sf5'])){  $_POST['f_sf5']= '0';}
    if (!isset($_POST['f_sno5'])){ $_POST['f_sno5']= '0';}
    if (!isset($_POST['f_xy5'])){ $_POST['f_xy5']= '0'; }
    if (!isset($_POST['f_xf5'])){ $_POST['f_xf5']= '0'; }
    if (!isset($_POST['f_xno5'])){ $_POST['f_xno5']= '0'; }

    if (!isset($_POST['f_sy6'])){  $_POST['f_sy6']= '0';}
    if (!isset($_POST['f_sf6'])){  $_POST['f_sf6']= '0';}
    if (!isset($_POST['f_sno6'])){ $_POST['f_sno6']= '0';}
    if (!isset($_POST['f_xy6'])){ $_POST['f_xy6']= '0'; }
    if (!isset($_POST['f_xf6'])){ $_POST['f_xf6']= '0'; }
    if (!isset($_POST['f_xno6'])){ $_POST['f_xno6']= '0'; }

$query = "
        update liu_tonghang_base set
t_diqu = \"{$_POST['t_diqu']}\" ,
t_name = \"{$_POST['t_name']}\" ,
t_phone = \"{$_POST['t_phone']}\" ,
t_weixin = \"{$_POST['t_weixin']}\",
t_dizhi = \"{$_POST['t_dizhi']}\",
t_kuaidi = {$_POST['t_kuaidi']}

where t_id = {$_GET['id']}";
/* var_dump($query);exit(); */
execute($link, $query);

$query = "update  liu_tonghang_fujian set
f_sy = {$_POST['f_sy1']},
f_sf = {$_POST['f_sf1']},
f_sno = {$_POST['f_sno1']},
f_xy = {$_POST['f_xy1']},
f_xf = {$_POST['f_xf1']},
f_xno = {$_POST['f_xno1']},
f_price = {$_POST['f_price1']}
 where t_id = {$_GET['id']} and f_type = 1";
execute($link, $query);

$query = "update  liu_tonghang_fujian set
f_sy = {$_POST['f_sy2']},
f_sf = {$_POST['f_sf2']},
f_sno = {$_POST['f_sno2']},
f_xy = {$_POST['f_xy2']},
f_xf = {$_POST['f_xf2']},
f_xno = {$_POST['f_xno2']},
f_price = {$_POST['f_price2']}
where t_id = {$_GET['id']} and f_type = 2";
execute($link, $query);
$query = "update  liu_tonghang_fujian set
f_sy = {$_POST['f_sy3']},
f_sf = {$_POST['f_sf3']},
f_sno = {$_POST['f_sno3']},
f_xy = {$_POST['f_xy3']},
f_xf = {$_POST['f_xf3']},
f_xno = {$_POST['f_xno3']},
f_price = {$_POST['f_price3']}
where t_id = {$_GET['id']} and f_type = 3";
execute($link, $query);
$query = "update  liu_tonghang_fujian set
f_sy = {$_POST['f_sy4']},
f_sf = {$_POST['f_sf4']},
f_sno = {$_POST['f_sno4']},
f_xy = {$_POST['f_xy4']},
f_xf = {$_POST['f_xf4']},
f_xno = {$_POST['f_xno4']},
f_price = {$_POST['f_price4']}
where t_id = {$_GET['id']} and f_type = 4";
execute($link, $query);
$query = "update  liu_tonghang_fujian set
f_sy = {$_POST['f_sy5']},
f_sf = {$_POST['f_sf5']},
f_sno = {$_POST['f_sno5']},
f_xy = {$_POST['f_xy5']},
f_xf = {$_POST['f_xf5']},
f_xno = {$_POST['f_xno5']},
f_price = {$_POST['f_price5']}
where t_id = {$_GET['id']} and f_type = 5";
execute($link, $query);
$query = "update  liu_tonghang_fujian set
f_sy = {$_POST['f_sy6']},
f_sf = {$_POST['f_sf6']},
f_sno = {$_POST['f_sno6']},
f_xy = {$_POST['f_xy6']},
f_xf = {$_POST['f_xf6']},
f_xno = {$_POST['f_xno6']},
f_price = {$_POST['f_price6']}
where t_id = {$_GET['id']} and f_type = 6";
execute($link, $query);
}
?>

<div class="container body-content">
    <h2>编辑</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id'])){
        $query = "SELECT
        a.t_kuaidi as kuaidi,
        b.f_id as fid,
        a.t_id AS id,
        a.t_name AS at_name,
        a.t_diqu AS diqu,
        a.t_phone AS phone,
        a.t_weixin AS weixin,
        a.t_dizhi as dizhi,
        b.f_type AS f_type1,
        b.f_sy AS f_sy1,
        b.f_sf AS f_sf1,
        b.f_sno AS f_sno1,
        b.f_xy AS f_xy1,
        b.f_xf AS f_xf1,
        b.f_xno AS f_xno1,
        b.f_price AS f_price1,
        c.f_type AS f_type2,
        c.f_sy AS f_sy2,
        c.f_sf AS f_sf2,
        c.f_sno AS f_sno2,
        c.f_xy AS f_xy2,
        c.f_xf AS f_xf2,
        c.f_xno AS f_xno2,
        c.f_price AS f_price2,
        d.f_type AS f_type3,
        d.f_sy AS f_sy3,
        d.f_sf AS f_sf3,
        d.f_sno AS f_sno3,
        d.f_xy AS f_xy3,
        d.f_xf AS f_xf3,
        d.f_xno AS f_xno3,
        d.f_price AS f_price3,
        e.f_type AS f_type4,
        e.f_sy AS f_sy4,
        e.f_sf AS f_sf4,
        e.f_sno AS f_sno4,
        e.f_xy AS f_xy4,
        e.f_xf AS f_xf4,
        e.f_xno AS f_xno4,
        e.f_price AS f_price4,
        f.f_type AS f_type5,
        f.f_sy AS f_sy5,
        f.f_sf AS f_sf5,
        f.f_sno AS f_sno5,
        f.f_xy AS f_xy5,
        f.f_xf AS f_xf5,
        f.f_xno AS f_xno5,
        f.f_price AS f_price5,
        g.f_type AS f_type6,
        g.f_sy AS f_sy6,
        g.f_sf AS f_sf6,
        g.f_sno AS f_sno6,
        g.f_xy AS f_xy6,
        g.f_xf AS f_xf6,
        g.f_xno AS f_xno6,
        g.f_price AS f_price6
        FROM
        liu_tonghang_base a
        LEFT JOIN liu_tonghang_fujian b ON a.t_id = b.t_id
        AND b.f_type = '1'
        LEFT JOIN liu_tonghang_fujian c ON a.t_id = c.t_id
        AND c.f_type = '2'
        LEFT JOIN liu_tonghang_fujian d ON a.t_id = d.t_id
        AND d.f_type = '3'
        LEFT JOIN liu_tonghang_fujian e ON a.t_id = e.t_id
        AND e.f_type = '4'
        LEFT JOIN liu_tonghang_fujian f ON a.t_id = f.t_id
        AND f.f_type = '5'
        LEFT JOIN liu_tonghang_fujian g ON a.t_id = g.t_id
        AND g.f_type = '6'
        where

        a.t_id = {$_GET['id']}";
    }else {
        skip('index.php', '记录不存在！');
    }
    $result = execute($link, $query);
    $data = mysqli_fetch_assoc($result);
?>
        <div class="form-horizontal">
            <h4>同行信息</h4>
            <hr />

            <div class="form-group">
                <h4>同行信息</h4>
                <label class="control-label col-md-2" for="Title">地区</label>

                <div class="col-md-8">

                    <select name='t_diqu' class="selectpicker show-tick "  data-live-search="true">
                    <optgroup label="" data-max-options="1">
                    <option><?php echo $data['diqu']?></option>
                    </optgroup>
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
                $query_shi = "select region_name from region where parent_id = {$data_sheng['region_id']}";
                $result_shi = execute($link, $query_shi);
                while ($data_shi = mysqli_fetch_assoc($result_shi)){
			?>
				<option><?php echo $data_shi['region_name']?></option>
				<?php
                }
				?>
			</optgroup>
			<?php
                }
			?>
                    </select>
                    <span class="field-validation-valid text-danger" data-valmsg-for="ccar_num" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="ReleaseDate">同行姓名</label>
                <div class="col-md-4">
                    <input name='t_name' class="form-control text-box single-line" data-val="true"   id="cuser"  name="cuser" type="text" value="<?php echo $data['at_name']?>" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="Genre">联系电话</label>
                <div class="col-md-4">
                    <input name='t_phone' class="form-control text-box single-line"  id="cuser_phone"  name="cuser_phone" type="text" value="<?php echo $data['phone']?>" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Genre" data-valmsg-replace="true"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="Price">微信</label>
                <div class="col-md-4">
                    <input name='t_weixin' class="form-control text-box single-line" data-val="true" id="cbrand"  name="cbrand"  type="text" value="<?php echo $data['weixin']?>" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">邮寄地址</label>
                <div class="col-md-4">
                    <textarea name='t_dizhi' class="form-control text-box single-line"><?php echo $data['dizhi']?></textarea>
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">发送方式</label>
                <div class="col-md-4">
                <?php
                if ($data['kuaidi']==1){
                ?>
                  <label class="checkbox-inline">  <input name='t_kuaidi' checked type="radio" value="1"> 微信</label>
				  <label class="checkbox-inline"> <input name='t_kuaidi'type="radio"   value="0"> 快递	</label>
				  <?php
                }elseif ($data['kuaidi']==0){
				  ?>
				   <label class="checkbox-inline">  <input name='t_kuaidi'  type="radio" value="1"> 微信</label>
				  <label class="checkbox-inline"> <input name='t_kuaidi'type="radio" checked  value="0"> 快递	</label>
				  <?php
                }else{
				  ?>
				  <label class="checkbox-inline">  <input name='t_kuaidi' type="radio" value="1"> 微信</label>
				  <label class="checkbox-inline"> <input name='t_kuaidi'type="radio"   value="0"> 快递	</label>
				  <?php
                }
				  ?>
                </div>
            </div>
            <h4>办理业务</h4>
            <hr>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">委托</label>
                <div class="col-md-8">
                    <label class="checkbox-inline">
                        <input name='f_sy1'  type="checkbox" <?php if ($data['f_sy1']==1){ echo "checked='checked'";} ?>  value="1">身份证原件</label><label class="checkbox-inline">
                        <input name='f_sf1' type="checkbox" <?php if ($data['f_sf1']==1){ echo "checked='checked'";} ?>  value="1">身份证复印件</label>
                        <label class="checkbox-inline">
                        <input name='f_sno1' type="checkbox" <?php if ($data['f_sno1']==1){ echo "checked='checked'";} ?>  value="1" >无</label>
                    <label class="checkbox-inline">
                        <input name='f_xy1' type="checkbox" <?php if ($data['f_xy1']==1){ echo "checked='checked'";} ?>  value="1">行驶证原件</label>
                    <label class="checkbox-inline">
                        <input name='f_xf1' type="checkbox" <?php if ($data['f_xf1']==1){ echo "checked='checked'";} ?>   value="1">行驶证复印件</label>
                    <label class="checkbox-inline">
                        <input name='f_xno1' type="checkbox" <?php if ($data['f_xno1']==1){ echo "checked='checked'";} ?>  value="1">无</label>
                        <label class="checkbox-inline">
                        <input name='f_price1'  type="text" value="<?php echo $data['f_price1']?>" > 元</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">补行驶证</label>
                 <div class="col-md-8">
                    <label class="checkbox-inline">
                        <input name='f_sy2'  type="checkbox" <?php if ($data['f_sy2']==1){ echo "checked='checked'";} ?>  value="1">身份证原件</label><label class="checkbox-inline">
                        <input name='f_sf2' type="checkbox" <?php if ($data['f_sf2']==1){ echo "checked='checked'";} ?>  value="1">身份证复印件</label>
                        <label class="checkbox-inline">
                        <input name='f_sno2' type="checkbox" <?php if ($data['f_sno2']==1){ echo "checked='checked'";} ?>  value="1" >无</label>
                    <label class="checkbox-inline">
                        <input name='f_xy2' type="checkbox" <?php if ($data['f_xy2']==1){ echo "checked='checked'";} ?>  value="1">行驶证原件</label>
                    <label class="checkbox-inline">
                        <input name='f_xf2' type="checkbox" <?php if ($data['f_xf2']==1){ echo "checked='checked'";} ?>   value="1">行驶证复印件</label>
                    <label class="checkbox-inline">
                        <input name='f_xno2' type="checkbox" <?php if ($data['f_xno2']==1){ echo "checked='checked'";} ?>  value="1">无</label>
                        <label class="checkbox-inline">
                        <input name='f_price2'  type="text" value="<?php echo $data['f_price2']?>" > 元</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">补驾照</label>
                <div class="col-md-8">
                    <label class="checkbox-inline">
                        <input name='f_sy3'  type="checkbox" <?php if ($data['f_sy3']==1){ echo "checked='checked'";} ?>  value="1">身份证原件</label><label class="checkbox-inline">
                        <input name='f_sf3' type="checkbox" <?php if ($data['f_sf3']==1){ echo "checked='checked'";} ?>  value="1">身份证复印件</label>
                        <label class="checkbox-inline">
                        <input name='f_sno3' type="checkbox" <?php if ($data['f_sno3']==1){ echo "checked='checked'";} ?>  value="1" >无</label>
                    <label class="checkbox-inline">
                        <input name='f_xy3' type="checkbox" <?php if ($data['f_xy3']==1){ echo "checked='checked'";} ?>  value="1">行驶证原件</label>
                    <label class="checkbox-inline">
                        <input name='f_xf3' type="checkbox" <?php if ($data['f_xf3']==1){ echo "checked='checked'";} ?>   value="1">行驶证复印件</label>
                    <label class="checkbox-inline">
                        <input name='f_xno3' type="checkbox" <?php if ($data['f_xno3']==1){ echo "checked='checked'";} ?>  value="1">无</label>
                        <label class="checkbox-inline">
                        <input name='f_price3'  type="text" value="<?php echo $data['f_price3']?>" > 元</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">换驾照</label>
                <div class="col-md-8">
                    <label class="checkbox-inline">
                        <input name='f_sy4'  type="checkbox" <?php if ($data['f_sy4']==1){ echo "checked='checked'";} ?>  value="1">身份证原件</label><label class="checkbox-inline">
                        <input name='f_sf4' type="checkbox" <?php if ($data['f_sf4']==1){ echo "checked='checked'";} ?>  value="1">身份证复印件</label>
                        <label class="checkbox-inline">
                        <input name='f_sno4' type="checkbox" <?php if ($data['f_sno4']==1){ echo "checked='checked'";} ?>  value="1" >无</label>
                    <label class="checkbox-inline">
                        <input name='f_xy4' type="checkbox" <?php if ($data['f_xy4']==1){ echo "checked='checked'";} ?>  value="1">行驶证原件</label>
                    <label class="checkbox-inline">
                        <input name='f_xf4' type="checkbox" <?php if ($data['f_xf4']==1){ echo "checked='checked'";} ?>   value="1">行驶证复印件</label>
                    <label class="checkbox-inline">
                        <input name='f_xno4' type="checkbox" <?php if ($data['f_xno4']==1){ echo "checked='checked'";} ?>  value="1">无</label>
                        <label class="checkbox-inline">
                        <input name='f_price4'  type="text" value="<?php echo $data['f_price4']?>" > 元</label>
                </div>
            </div>
            <div class="form-group">
                            <label class="control-label col-md-2" for="Price">补车牌</label>
                            <div class="col-md-8">
                    <label class="checkbox-inline">
                        <input name='f_sy5'  type="checkbox" <?php if ($data['f_sy5']==1){ echo "checked='checked'";} ?>  value="1">身份证原件</label><label class="checkbox-inline">
                        <input name='f_sf5' type="checkbox" <?php if ($data['f_sf5']==1){ echo "checked='checked'";} ?>  value="1">身份证复印件</label>
                        <label class="checkbox-inline">
                        <input name='f_sno5' type="checkbox" <?php if ($data['f_sno5']==1){ echo "checked='checked'";} ?>  value="1" >无</label>
                    <label class="checkbox-inline">
                        <input name='f_xy5' type="checkbox" <?php if ($data['f_xy5']==1){ echo "checked='checked'";} ?>  value="1">行驶证原件</label>
                    <label class="checkbox-inline">
                        <input name='f_xf5' type="checkbox" <?php if ($data['f_xf5']==1){ echo "checked='checked'";} ?>   value="1">行驶证复印件</label>
                    <label class="checkbox-inline">
                        <input name='f_xno5' type="checkbox" <?php if ($data['f_xno5']==1){ echo "checked='checked'";} ?>  value="1">无</label>
                        <label class="checkbox-inline">
                        <input name='f_price5'  type="text" value="<?php echo $data['f_price5']?>" > 元</label>
                </div>
                        </div>
                        <div class="form-group">
                <label class="control-label col-md-2" for="Price">违章</label>
                 <div class="col-md-8">
                    <label class="checkbox-inline">
                        <input name='f_sy6'  type="checkbox" <?php if ($data['f_sy6']==1){ echo "checked='checked'";} ?>  value="1">身份证原件</label><label class="checkbox-inline">
                        <input name='f_sf6' type="checkbox" <?php if ($data['f_sf6']==1){ echo "checked='checked'";} ?>  value="1">身份证复印件</label>
                        <label class="checkbox-inline">
                        <input name='f_sno6' type="checkbox" <?php if ($data['f_sno6']==1){ echo "checked='checked'";} ?>  value="1" >无</label>
                    <label class="checkbox-inline">
                        <input name='f_xy6' type="checkbox" <?php if ($data['f_xy6']==1){ echo "checked='checked'";} ?>  value="1">行驶证原件</label>
                    <label class="checkbox-inline">
                        <input name='f_xf6' type="checkbox" <?php if ($data['f_xf6']==1){ echo "checked='checked'";} ?>   value="1">行驶证复印件</label>
                    <label class="checkbox-inline">
                        <input name='f_xno6' type="checkbox" <?php if ($data['f_xno6']==1){ echo "checked='checked'";} ?>  value="1">无</label>
                        <label class="checkbox-inline">
                        <input name='f_price6'  type="text" value="<?php echo $data['f_price6']?>" > 元</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">&nbsp;</label>
                <div class=" col-md-8">
                    <input type="submit" value="更新" name="submit" class="btn btn-primary " />

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
</body>

</html>