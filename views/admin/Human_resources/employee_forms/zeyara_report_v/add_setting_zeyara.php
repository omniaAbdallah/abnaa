<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: !block !important;
        font-weight: 500 !important;
    }
    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .print_forma {
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-!block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-!block;
        float: right;
        width: 100%;
    }
    .piece-body {
        width: 100%;
        float: right;
    }
    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer {
        display: inline-!block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table {
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }
    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th {
        text-align: right;
    }
    .print_forma table tr th {
        vertical-align: middle;
    }
    .no-padding {
        padding: 0;
    }
    .header p {
        margin: 0;
    }
    .header img {
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }
    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border {
        border: 0 !important;
    }
    .gray_background {
        background-color: #eee;
    }
    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img {
        width: 100%;
        height: 120px;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green {
        background-color: #e6eed5;
    }
    .closed_green {
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/
    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }
    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }
    /**********************************************************/
    @media (min-width: 992px){
        .col_md_10{
            width: 10%;
            float:right;
        }
        .col_md_15{
            width: 15%;
            float:right;
        }
        .col_md_20{
            width: 20%;
            float:right;
        }
        .col_md_25{
            width: 25%;
            float:right;
        }
        .col_md_30{
            width: 30%;
            float:right;
        }
        .col_md_35{
            width: 35%;
            float:right;
        }
        .col_md_40{
            width: 40%;
            float:right;
        }
        .col_md_45{
            width: 45%;
            float:right;
        }
        .col_md_50{
            width: 50%;
            float:right;
        }
        .col_md_55{
            width: 55%;
            float:right;
        }
        .col_md_60{
            width: 60%;
            float:right;
        }
        .col_md_70{
            width: 70%;
            float:right;
        }
        .col_md_75{
            width: 75%;
            float:right;
        }
        .col_md_80{
            width: 80%;
            float:right;
        }
        .col_md_85{
            width: 85%;
            float:right;
        }
        .col_md_90{
            width: 90%;
            float:right;
        }
        .col_md_95{
            width: 95%;
            float:right;
        }
        .col_md_100{
            width: 100%;
            float:right;
        }
    }
    . {
        border-radius: 0px;
        border-right: transparent;
        width: 100%;
    }
</style>
<?php
//print_r($result);
if(isset($result)&&!empty($result))
{
    $title = $result->title;
    $type_name=$result->type_name;
    $edara_id_fk = $result->edara_id_fk;
    $out['form'] = 'human_resources/employee_forms/zeyara_report/Zeyara_report/setting_Zeyara/'.$result->id;
}else{
    $title ='';
    $type_name='';
    $edara_id_fk ='';
    $out['form'] = 'human_resources/employee_forms/zeyara_report/Zeyara_report/setting_Zeyara';
}
$type_visit = array(
    1=>'الغرض من الزيارة',
    2=>'نتيجة الزيارة',
    3=>'جهة الزيارة',
4=>'الموقع',
5=>'مسئول الجهه'
);
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $tittle;  ?></h3>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                            <div class="col-md-2 col-sm-6  padding-4 ">
                        <label class=" label">النوع </label>
                        <select id="type" class="form-control " data-validation="required"
                        onchange="get_edara();"
                                name="type" >
                            <option value="">أختر</option>
                            <?php
                            foreach($type_visit as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"
                                    <?php
                                    if(!empty($type_name)){
                                        if($value ==$type_name){
                                            echo 'selected'; }}  ?>> <?php echo $value;?></option >
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6  padding-4 ">
                        <label class=" label"> الاسم</label>
                        <input type="text" name="title" id="title" 
                               value="<?php echo $title;?>"  data-validation="required"
                               class="form-control ">
                    </div>
                        <!-- yaraa22-9 -->
                     <div class="col-md-2 col-sm-6  padding-4 " id="edara">
                     <?php if(!empty($edara_id_fk)&&($type="purpose")&&($type="result"))
                     {
                         ?>
<label class=" label"> الادارة</label>
<select id="edara_id_fk" class="form-control " 
                                name="edara_id_fk" data-validation="required" >
                            <option value="">أختر</option>
                           <?php foreach($edarat as $row){?>
                                <option value="<?php  echo $row->id.'-'.$row->title; ?>"
                                    <?php
                                    if(!empty($edara_id_fk)){
                                        if(isset($edara_id_fk)&& ($row->id ==$edara_id_fk)){
                                            echo 'selected'; }}  ?>> 
                                            <?php echo $row->title ;  ?></option >
                           <?php }?>
                        </select>
                     <?php }else if(!empty($edara_id_fk)&&($type="ms2ol_geha")){?>
                        <label class=" label"> مسئول الجهة</label>
<select id="edara_id_fk" class="form-control "
                                name="edara_id_fk" data-validation="required" >
                            <option value="">أختر</option>
                           <?php foreach($ms2olen as $row){?>
                                <option value="<?php  echo $row->id.'-'.$row->title; ?>"
                                    <?php
                                    if(!empty($edara_id_fk)){
                                        if(isset($edara_id_fk)&& ($row->id ==$edara_id_fk)){
                                            echo 'selected'; }}  ?>> 
                                            <?php echo $row->title ;  ?></option >
                           <?php }?>
                        </select>
                     <?php }?>
                    </div>
            <div class="col-md-12 text-center">
            <span style="color: red" id="span_id"></span><br>
                <button type="submit"  class="btn btn-labeled btn-success " id="save" name="add" value="add"   >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>
            <?php echo form_close();?>
                <div class="clearfix"></div><br>
                <?php
                if(isset($records)&&!empty($records)){
                    ?>
                    <table id="example" class=" display table table-bordered    responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg info">
                            <th>م</th>
                            <th>النوع</th>
                            <th>   الاسم  </th>
                            <th>الادارة </th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){
                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->type_name;?></td>
                                <td><?php echo $row->title ;?></td>
                                <td style="padding: 0;"><?php echo $row->edara_n;
?></td>
<td>
    <!--***********/////////////////////////////********* 11 *****************//////////////-->
                        <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'human_resources/employee_forms/zeyara_report/Zeyara_report/setting_Zeyara/' .$row->id ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
<a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/employee_forms/zeyara_report/Zeyara_report/delete_settings/' . $row->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
</td>
                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
    <!-- yaraa22-9 -->
    <!-- get_edara -->
    <script>
        function get_edara() {
            var type=$('#type').val();
            
     if ((type==1 ||type==2)  && type!=0){
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url()?>human_resources/employee_forms/zeyara_report/Zeyara_report/load_edarat',
                 dataType: 'html',
                 cache: false,
                 success: function (html) {
                     $('#edara').html(html);
                 }
             });
         }
         else  if (type==5 && type!=0){
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url()?>human_resources/employee_forms/zeyara_report/Zeyara_report/load_geha',
                 dataType: 'html',
                 cache: false,
                 success: function (html) {
                     $('#edara').html(html);
                 }
             });
         }
         else{
            $('#edara').html('');
         }
        }
         </script>

