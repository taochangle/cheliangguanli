<?php
include_once '../common/header.inc.php';
?>
<?php

if (isset($_GET['id'])) {
    $query = "SELECT
b.f_id as fid,
a.t_kuaidi as kuaidi,
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
b.f_bf as f_bf1,
b.f_bno as f_bno1,
	c.f_type AS f_type2,
	c.f_sy AS f_sy2,
	c.f_sf AS f_sf2,
	c.f_sno AS f_sno2,
	c.f_xy AS f_xy2,
	c.f_xf AS f_xf2,
	c.f_xno AS f_xno2,
	c.f_price AS f_price2,
c.f_bf as f_bf2,
c.f_bno as f_bno2,
	d.f_type AS f_type3,
	d.f_sy AS f_sy3,
	d.f_sf AS f_sf3,
	d.f_sno AS f_sno3,
	d.f_xy AS f_xy3,
	d.f_xf AS f_xf3,
	d.f_xno AS f_xno3,
	d.f_price AS f_price3,
d.f_bf as f_bf3,
d.f_bno as f_bno3,
	e.f_type AS f_type4,
	e.f_sy AS f_sy4,
	e.f_sf AS f_sf4,
	e.f_sno AS f_sno4,
	e.f_xy AS f_xy4,
	e.f_xf AS f_xf4,
	e.f_xno AS f_xno4,
	e.f_price AS f_price4,
e.f_bf as f_bf4,
e.f_bno as f_bno4,
	f.f_type AS f_type5,
	f.f_sy AS f_sy5,
	f.f_sf AS f_sf5,
	f.f_sno AS f_sno5,
	f.f_xy AS f_xy5,
	f.f_xf AS f_xf5,
	f.f_xno AS f_xno5,
	f.f_price AS f_price5,
f.f_bf as f_bf5,
f.f_bno as f_bno5,
	g.f_type AS f_type6,
	g.f_sy AS f_sy6,
	g.f_sf AS f_sf6,
	g.f_sno AS f_sno6,
	g.f_xy AS f_xy6,
	g.f_xf AS f_xf6,
	g.f_xno AS f_xno6,
	g.f_price AS f_price6,
g.f_bf as f_bf6,
g.f_bno as f_bno6
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
} else {
    skip('index.php', '记录不存在！');
}
$result = execute($link, $query);

?>

<body>
	<div class="container body-content">
		<h2>详情信息</h2>
		<div class="row">
			<form action="">
				<fieldset disabled>
					<div class="col-xs-6 col-md-10">
						<div style="font-style: 30px">
							<h4>同行信息</h4>
							<hr />
				<?php
    $data = mysqli_fetch_assoc($result);

    ?>
				<dl class="dl-horizontal">
								<dt>地区</dt>
								<dd>
					<?php echo $data['diqu']?>
						</dd>
								<dt>姓名</dt>
								<dd><?php echo $data['at_name']?>
						</dd>
								<dt>电话</dt>
								<dd><?php echo $data['phone']?>
						</dd>
								<dt>微信</dt>
								<dd><?php echo $data['weixin']?>
					</dd>
								<dt>邮寄地址</dt>
								<dd>
									 <?php echo $data['dizhi']?>
								</dd>
								<dt>发送方式</dt>
								<dd>
									<address>
									<?php

									if($data['kuaidi']==1) {
									    echo '微信';
									}elseif ($data['kuaidi']==0) {
									    echo '快递';
									}else {
									    echo '暂未填写！';
									}

									?>


									</address>
								</dd>
							</dl>
							<h4>业务范畴</h4>
							<hr />
							<dl class="dl-horizontal">
								<dt>办理委托</dt>
								<dd>
									<label class="checkbox-inline"> <input name='f_sy1'
										type="checkbox"
										<?php if ($data['f_sy1']==1){ echo "checked='checked'";} ?>>身份证原件
									</label><label class="checkbox-inline"> <input name='f_sf1'
										type="checkbox"
										<?php if ($data['f_sf1']==1){ echo "checked='checked'";} ?>>身份证复印件
									</label><label class="checkbox-inline"> <input name='f_sno1'
										type="checkbox"
										<?php if ($data['f_sno1']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_xy1'
										type="checkbox"
										<?php if ($data['f_xy1']==1){ echo "checked='checked'";} ?>>行驶证原件
									</label><label class="checkbox-inline"> <input name='f_xf1'
										type="checkbox"
										<?php if ($data['f_xf1']==1){ echo "checked='checked'";} ?>>行驶证复印件
									</label><label class="checkbox-inline"> <input name='f_xno1'
										type="checkbox"
										<?php if ($data['f_xno1']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_bf1'
										type="checkbox"
										<?php if ($data['f_bf1']==1){ echo "checked='checked'";} ?>>保单副本
									</label><label class="checkbox-inline"> <input name='f_bno1'
										type="checkbox"
										<?php if ($data['f_bno1']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <b><?php echo $data['f_price1']?></b>元
									</label>
								</dd>
								<dt>补行驶证</dt>
								<dd>
									<label class="checkbox-inline"> <input name='f_sy2'
										type="checkbox"
										<?php if ($data['f_sy2']==1){ echo "checked='checked'";} ?>>身份证原件
									</label><label class="checkbox-inline"> <input name='f_sf2'
										type="checkbox"
										<?php if ($data['f_sf2']==1){ echo "checked='checked'";} ?>>身份证复印件
									</label><label class="checkbox-inline"> <input name='f_sno2'
										type="checkbox"
										<?php if ($data['f_sno2']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_xy2'
										type="checkbox"
										<?php if ($data['f_xy2']==1){ echo "checked='checked'";} ?>>行驶证原件
									</label><label class="checkbox-inline"> <input name='f_xf2'
										type="checkbox"
										<?php if ($data['f_xf2']==1){ echo "checked='checked'";} ?>>行驶证复印件
									</label><label class="checkbox-inline"> <input name='f_xno2'
										type="checkbox"
										<?php if ($data['f_xno2']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_bf2'
										type="checkbox"
										<?php if ($data['f_bf2']==1){ echo "checked='checked'";} ?>>保单副本
									</label><label class="checkbox-inline"> <input name='f_bno2'
										type="checkbox"
										<?php if ($data['f_bno2']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <b><?php echo $data['f_price2']?></b>元
									</label>
								</dd>
								<dt>补驾照</dt>
								<dd>
									<label class="checkbox-inline"> <input name='f_sy3'
										type="checkbox"
										<?php if ($data['f_sy3']==1){ echo "checked='checked'";} ?>>身份证原件
									</label><label class="checkbox-inline"> <input name='f_sf3'
										type="checkbox"
										<?php if ($data['f_sf3']==1){ echo "checked='checked'";} ?>>身份证复印件
									</label><label class="checkbox-inline"> <input name='f_sno3'
										type="checkbox"
										<?php if ($data['f_sno3']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_xy3'
										type="checkbox"
										<?php if ($data['f_xy3']==1){ echo "checked='checked'";} ?>>行驶证原件
									</label><label class="checkbox-inline"> <input name='f_xf3'
										type="checkbox"
										<?php if ($data['f_xf3']==1){ echo "checked='checked'";} ?>>行驶证复印件
									</label><label class="checkbox-inline"> <input name='f_xno3'
										type="checkbox"
										<?php if ($data['f_xno3']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_bf3'
										type="checkbox"
										<?php if ($data['f_bf3']==1){ echo "checked='checked'";} ?>>保单副本
									</label><label class="checkbox-inline"> <input name='f_bno3'
										type="checkbox"
										<?php if ($data['f_bno3']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <b><?php echo $data['f_price3']?></b>元
									</label>
								</dd>
								<dt>换驾照</dt>
								<dd>
									<label class="checkbox-inline"> <input name='f_sy4'
										type="checkbox"
										<?php if ($data['f_sy4']==1){ echo "checked='checked'";} ?>>身份证原件
									</label><label class="checkbox-inline"> <input name='f_sf4'
										type="checkbox"
										<?php if ($data['f_sf4']==1){ echo "checked='checked'";} ?>>身份证复印件
									</label><label class="checkbox-inline"> <input name='f_sno4'
										type="checkbox"
										<?php if ($data['f_sno4']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_xy4'
										type="checkbox"
										<?php if ($data['f_xy4']==1){ echo "checked='checked'";} ?>>行驶证原件
									</label><label class="checkbox-inline"> <input name='f_xf4'
										type="checkbox"
										<?php if ($data['f_xf4']==1){ echo "checked='checked'";} ?>>行驶证复印件
									</label><label class="checkbox-inline"> <input name='f_xno4'
										type="checkbox"
										<?php if ($data['f_xno4']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_bf4'
										type="checkbox"
										<?php if ($data['f_bf4']==1){ echo "checked='checked'";} ?>>保单副本
									</label><label class="checkbox-inline"> <input name='f_bno4'
										type="checkbox"
										<?php if ($data['f_bno4']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <b><?php echo $data['f_price4']?></b>元
									</label>
								</dd>
								<dt>补车牌</dt>
								<dd>
									<label class="checkbox-inline"> <input name='f_sy5'
										type="checkbox"
										<?php if ($data['f_sy5']==1){ echo "checked='checked'";} ?>>身份证原件
									</label><label class="checkbox-inline"> <input name='f_sf5'
										type="checkbox"
										<?php if ($data['f_sf5']==1){ echo "checked='checked'";} ?>>身份证复印件
									</label><label class="checkbox-inline"> <input name='f_sno5'
										type="checkbox"
										<?php if ($data['f_sno5']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_xy5'
										type="checkbox"
										<?php if ($data['f_xy5']==1){ echo "checked='checked'";} ?>>行驶证原件
									</label><label class="checkbox-inline"> <input name='f_xf5'
										type="checkbox"
										<?php if ($data['f_xf5']==1){ echo "checked='checked'";} ?>>行驶证复印件
									</label><label class="checkbox-inline"> <input name='f_xno5'
										type="checkbox"
										<?php if ($data['f_xno5']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_bf5'
										type="checkbox"
										<?php if ($data['f_bf5']==1){ echo "checked='checked'";} ?>>保单副本
									</label><label class="checkbox-inline"> <input name='f_bno5'
										type="checkbox"
										<?php if ($data['f_bno5']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <b><?php echo $data['f_price5']?></b>元
									</label>
								</dd>
								<dt>违章</dt>
								<dd>
									<label class="checkbox-inline"> <input name='f_sy6'
										type="checkbox"
										<?php if ($data['f_sy6']==1){ echo "checked='checked'";} ?>>身份证原件
									</label><label class="checkbox-inline"> <input name='f_sf6'
										type="checkbox"
										<?php if ($data['f_sf6']==1){ echo "checked='checked'";} ?>>身份证复印件
									</label><label class="checkbox-inline"> <input name='f_sno6'
										type="checkbox"
										<?php if ($data['f_sno6']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_xy6'
										type="checkbox"
										<?php if ($data['f_xy6']==1){ echo "checked='checked'";} ?>>行驶证原件
									</label><label class="checkbox-inline"> <input name='f_xf6'
										type="checkbox"
										<?php if ($data['f_xf6']==1){ echo "checked='checked'";} ?>>行驶证复印件
									</label><label class="checkbox-inline"> <input name='f_xno6'
										type="checkbox"
										<?php if ($data['f_xno6']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <input name='f_bf6'
										type="checkbox"
										<?php if ($data['f_bf6']==1){ echo "checked='checked'";} ?>>保单副本
									</label><label class="checkbox-inline"> <input name='f_bno6'
										type="checkbox"
										<?php if ($data['f_bno6']==1){ echo "checked='checked'";} ?>>无
									</label><label class="checkbox-inline"> <b><?php echo $data['f_price6']?></b>元
									</label>
								</dd>
							</dl>

						</div>
					</div>
				</fieldset>
			</form>
			<div class="col-xs-6 col-md-2">
				<h4>&nbsp;</h4>
				<hr />

			</div>
			<div class="col-xs-6 col-md-2">
				<h4>&nbsp;</h4>
				<hr />

			</div>
		</div>
	<?php ?>
	<p>
			<a
				href="edit.php?id=<?php echo $_GET['id'] ?>&fid=<?php echo $data['fid'] ?>">编辑</a>
			| <a href="index.php">返回列表</a>
		</p>


	</div>

</body>
</html>