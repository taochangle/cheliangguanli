<?php include_once '../common/header.inc.php'; ?>

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

        $file_save_path_2 = '';

    }elseif(is_uploaded_file($_FILES['img_2']['tmp_name'])&&(!is_uploaded_file($_FILES['img_1']['tmp_name']))){
        $file_2 = pathinfo($_FILES['img_2']['name']);
        $file_save_path_2 = '../../public/uploads/carinfo/'.date('YmdHis',time()).rand(1000,9999).'.'.$file_2['extension'];
        move_uploaded_file($_FILES['img_2']['tmp_name'], $file_save_path_2);

        $file_save_path_1 = '';
    }else{

        $file_save_path_1 = '';
        $file_save_path_2 = '';
    }
    if($_POST['cadd_time']==''){
        $_POST['cadd_time'] = date('Y-m-d H:i:s')
        ;
    }

    $query = "INSERT INTO liu_car_info(
                                    ccar_num        ,
                                    cbrand          ,
                                    cuser           ,
                                    cuser_phone     ,
                                    cchejia_num     ,
                                    cmotor_num      ,
                                    cadd_time       ,
                                    creg_time       ,
                                    cbanfa_time     ,
                                    ceffective_time ,
                                    cnext_time  ,
                                    ccar_img_Z,
                                    ccar_img_F
                                ) VALUES (
                                    '{$_POST['ccar_num']}',
                                    '{$_POST['cbrand']}',
                                    '{$_POST['cuser']}',
                                    '{$_POST['cuser_phone']}',
                                    '{$_POST['cchejia_num']}',
                                    '{$_POST['cmotor_num']}',
                                     '{$_POST['cadd_time']}',
                                    '{$_POST['creg_time']}',
                                    '{$_POST['cbanfa_time']}',
                                    '{$_POST['ceffective_time']}',
                                    '{$_POST['cnext_time']}',
                                    '{$file_save_path_1}',
                                    '{$file_save_path_2}'
                                );
                                ";

    execute ( $link, $query );
    if (mysqli_affected_rows ( $link ) == 1) {
        skip ( 'add.php', '添加成功！' );
    } else {
        skip ( 'index.php', '添加失败！' );
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
                <label class="control-label col-md-2" for="Price">办理日期</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true" id="datepicker5" name="cadd_time" type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Title">车牌号</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" id="ccar_num"  name="ccar_num" type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="ccar_num" data-valmsg-replace="true"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="ReleaseDate">所有人姓名</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true"   id="cuser"  name="cuser" type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="ReleaseDate" data-valmsg-replace="true"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="Genre">联系电话</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line"  id="cuser_phone"  name="cuser_phone" type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Genre" data-valmsg-replace="true"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="Price">汽车品牌</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true" id="cbrand"  name="cbrand"  type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">车架号</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true" id="cchejia_num"  name="cchejia_num" type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">发动机号</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true" id="cmotor_num"  name="cmotor_num"  type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">注册日期</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true" id="datepicker1" name="creg_time" type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">发证日期</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true"  name="cbanfa_time" id="datepicker2"  type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">车检有效期</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true" name="cnext_time" id="datepicker4" type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">下次检验有效期</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true"  name="ceffective_time" id="datepicker3"type="text" value="" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">行驶证正本</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true" name="img_1"type="file"  />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">行驶证副本</label>
                <div class="col-md-8">
                    <input class="form-control text-box single-line" data-val="true" name="img_2"   type="file" />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="Price">&nbsp;</label>
                <div class=" col-md-8">
                    <input type="submit" value="添加" name="submit" class="btn btn-default" />

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
                $('#datepicker5').datepicker({
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
</body>

</html>