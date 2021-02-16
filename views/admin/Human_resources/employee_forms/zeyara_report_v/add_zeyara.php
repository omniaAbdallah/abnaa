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
    $zeyara_type=$result->zeyara_type;
    $zeyara_place=$result->zeyara_place;
    $zeyara_place_id_fk=$result->zeyara_place_id_fk;
    $zeyara_date = $result->zeyara_date;
    $from_hour=$result->from_hour;
    $to_hour=$result->to_hour;
    $total_hours=$result->to_hour;
   
    $emp_id = $result->emp_id;
    $emp_code = $result->emp_code;
    $emp_name = $result->emp_name;
    $mosma_wazefy_n = $result->mosma_wazefy_n;
    $mosma_wazefy_id_fk = $result->mosma_wazefy_id_fk;
    $edara_n = $result->edara_n;
    $edara_id_fk = $result->edara_id_fk;
    $qsm_n = $result->qsm_n;
    $qsm_id_fk = $result->qsm_id_fk; 
    $mob = $result->mob;
    $purpose = $result->purpose;
    $purpose_id_fk = $result->purpose_id_fk;
   $nategaa = $result->natega_zeyara;
    $nategaa_id_fk = $result->nategaa_id_fk;

    $geha=$result->zeyara_geha;
    $geha_id_fk = $result->zeyara_geha_id_fk;
    
    $zeyara_notes=$result->zeyara_notes;
    $zeyara_details=$result->zeyara_details;
    $zeyara_results=$result->zeyara_results;
    $ms2ol_geha=$result->ms2ol_geha;
    $ms2ol_id_fk =$result->ms2ol_id_fk;
    $out['form'] = 'human_resources/employee_forms/zeyara_report/Zeyara_report/addzeyara_report/'.$result->id;
}else{
    $zeyara_type='';
    $zeyara_place='';
    $zeyara_place_id_fk='';
    $zeyara_date = date("Y-m-d");
    $from_hour='';
    $to_hour='';
    $total_hours='';
    $zeyara_geha='';
    $mob = '';
    $purpose ='';
    $purpose_id_fk = '';
   $nategaa ='';
    $nategaa_id_fk ='';
    $subject = '';
    $subject_id_fk = '';
    $zeyara_notes='';
    $zeyara_details='';
    $geha_id_fk = '';
    $geha = '';
    $zeyara_results='';
    $ms2ol_geha='';
     $ms2ol_id_fk ='';
    $out['form'] = 'human_resources/employee_forms/zeyara_report/Zeyara_report/addzeyara_report';
}
$type_zeyara = array(
    1=>'ميداني',
    2=>' تواصل',
);
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>

            <div class="panel-body">
            <?php
if ($_SESSION['role_id_fk']==3) {
        ?>
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12 no-padding " >
                <div class="col-md-4 col-sm-6  padding-4 ">
                                <label class=" label"> المندوب </label>
                                <input  type="hidden" name="emp_id" id="emp_id" value="<?=$record[0]->id?>">
                                <input  type="hidden" name="emp_code" id="emp_code" value="<?=$record[0]->emp_code?>">
                                <input  type="text" name="emp_name" id="emp_name" readonly
                                        value="<?php if(isset($record[0]->employee)){ echo $record[0]->employee ; } ?>"
                                        class="form-control "
                                        data-validation-has-keyup-event="true">
                            </div>
                            <div class="col-md-3 col-sm-6  padding-4 ">
                                <label class=" label ">المسمي الوظيفي </label>
                                <input  readonly type="text" name="mosma_wazefy_n" id="mosma_wazefy_n" value="<?php if(isset($record[0]->mosma_wazefy_n)){ echo $record[0]->mosma_wazefy_n ; } ?>"
                                        class="form-control "
                                        data-validation="required"
                                        data-validation-has-keyup-event="true">
                                        <input  type="hidden" name="mosma_wazefy_id_fk" id="mosma_wazefy_id_fk" value="<?=$record[0]->degree_id?>">
                            </div>
                            <div class="col-md-2 col-sm-6  padding-4 ">
                        <label class=" label">الادارة</label>
                        <input  id="edara_n" class="form-control " onchange="show_kafel(this.value);" 
                        readonly  name="edara_n"   value="<?php if(isset($record[0]->edara_n)){ echo $record[0]->edara_n ; } ?>">
                           
                             
                        <input  type="hidden" name="edara_id_fk" id="edara_id_fk" value="<?=$record[0]->administration?>">
                    </div>
                            <div class="col-md-2 col-sm-6  padding-4 ">
                                <label class=" label ">القسم </label>
                                <input  readonly type="text" name="qsm_n" id="qsm_n" value="<?php if(isset($record[0]->qsm_n)){ echo $record[0]->qsm_n ; } ?>"
                                        class="form-control "
                                      
                                        data-validation-has-keyup-event="true">
                                        <input  type="hidden" name="qsm_id_fk" id="qsm_id_fk" value="<?=$record[0]->department?>">
                            </div>
                            <div class="col-md-1 col-sm-6  padding-4 ">
                        <label class=" label">النوع </label>
                        <select id="zeyara_type" class="form-control " 
                                name="zeyara_type" >
                            <option value="">أختر</option>
                            <?php
                            foreach($type_zeyara as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"
                                    <?php
                                    if(!empty($zeyara_type)){
                                        if($key ==$zeyara_type){
                                            echo 'selected'; }}  ?>> <?php echo $value;?></option >
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6  padding-4 ">
                        <label class=" label">التاريخ </label>
                        <input type="date" name="zeyara_date" id="zeyara_date" 
                               value="<?php echo $zeyara_date;?>"
                               class="form-control ">
                    </div>
                    <!-- <div class="col-md-4 col-sm-6  padding-4 ">
                        <label class=" label">جهه الزيارة</label>
                        <input type="text" name="zeyara_geha" id="zeyara_geha" 
                               value="<?php echo $zeyara_geha;?>"   data-validation="required"
                               class="form-control ">
                    </div> -->
                    <div class="col-md-3 col-sm-6 padding-4 ">
				<label class=" label kafel"> الجهه </label>
				<input type="text" class="form-control  "
                           name="geha" id="geha"
                           readonly="readonly"
                           onclick="change_type_setting(3,'جهه الزيارة','geha_id_fk','geha');load_settigs();"
                           style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                            data-validation="required"
                           value="
					<?= $geha ?>">
					<input type="hidden" name="geha_id_fk" id="geha_id_fk" value="
						<?= $geha_id_fk ?>">
						<button type="button"
                            onclick="change_type_setting(3,'جهه الزيارة','geha_id_fk','geha');load_settigs();"
                            class="btn btn-success btn-next">
							<i class="fa fa-plus"></i>
						</button>
					</div>

                    <div class="col-md-3 col-sm-6 padding-4 ">
	<label class=" label kafel">   مسئول الجهه </label>
	
		<input type="text" class="form-control  "
                           name="ms2ol_geha" id="ms2ol_geha"
                           readonly="readonly"
                           onclick="change_type_setting(5,'مسئول الجهه','ms2ol_id_fk','ms2ol_geha');load_settigs();"
                           style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                            data-validation="required"
                           value="
			<?= $ms2ol_geha   ?>">
			<input type="hidden" name="ms2ol_id_fk" id="ms2ol_id_fk" value="
				<?= $ms2ol_id_fk ?>">
				<button type="button"
                            onclick="change_type_setting(5,'مسئول الجهه','ms2ol_id_fk','ms2ol_geha');load_settigs();"
                            class="btn btn-success btn-next">
					<i class="fa fa-plus"></i>
				</button>
			</div>


                    <div class="col-md-2 col-sm-6  padding-4 ">
                        <label class=" label">رقم التواصل</label>
                        <span id="span_phone" style="color: red;    float: left;
    margin-top: -28px;"></span>
                        <input type="text" maxlength="10"
                         onkeyup="check_length_num(this,10,'span_phone');"
                         name="mob" id="mob" onkeypress="validate_number(event);"  value="<?php echo $mob;?>" class="form-control " data-validation="required">
                    </div>

                    <!-- <div class="form-group col-md-2  padding-4">
                            <label class="label ">بداية الزيارة</label>
                            <input type="text" name="from_hour"
                                   onchange="get_time();" id="from_time"
                                   value="<?= $from_hour ?>"
                                   class="form-control  "
                                   data-validation="required"
                                   data-validation-has-keyup-event="true">
                        </div>
                        <div class="form-group col-md-2  padding-4">
                            <label class="label ">نهاية الزيارة</label>
                            <input type="text" name="to_hour"
                                   onchange="get_time();" id="to_time"
                                   value="<?= $to_hour ?>"
                                   class="form-control  "
                                   data-validation="required"
                                   data-validation-has-keyup-event="true">
                        </div>
                     
                        <div class="form-group col-md-1  padding-4">
                            <label class="label ">المده المستغرقة</label>
                            <input type="text" readonly name="total_hours" id="num_hours"
                                   value="<?= $total_hours ?>"
                                   class="form-control  ">
                        </div> -->
                          <!-- yaraa22-9 -->
                          <div class="form-group col-md-2  padding-4">
                            <label class="label ">البداية </label>
                            <input type="time" name="from_hour" onchange="get_time();" id="from_time"
                                   value="<?= $from_hour ?>" class="form-control  " data-validation="required"
                                   data-validation-has-keyup-event="true">
                        </div>
                        <div class="form-group col-md-2  padding-4">
                            <label class="label ">النهاية </label>
                            <input type="time" name="to_hour" onchange="get_time();" id="to_time"
                                   value="<?= $to_hour ?>" class="form-control  " data-validation="required"
                                   data-validation-has-keyup-event="true">
                        </div>
                        <!-- yaraa22-9 -->
                        <div class="form-group col-md-1  padding-4">
                            <label class="label ">المده</label>
                            <input type="text" readonly name="total_hours" id="num_hours"
                                   value="<?= $total_hours ?>"
                                   class="form-control  ">
                        </div>
                   
                    <!-- <div class="col-md-4 col-sm-6  padding-4 ">
                        <label class=" label">مكان الزيارة</label>
                        <input type="text" name="zeyara_place" id="zeyara_place" data-validation="required"
                               value="<?php echo $zeyara_place;?>"
                               class="form-control ">
                    </div> -->
                    <div class="col-md-3 col-sm-6 padding-4 ">
				<label class=" label kafel"> الموقع </label>
				<input type="text" class="form-control  "
                           name="zeyara_place" id="zeyara_place"
                           readonly="readonly"
                           onclick="change_type_setting(4,'الموقع ','zeyara_place_id_fk','zeyara_place');load_settigs();"
                           style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                           data-validation="required"
                           value="
					<?= $zeyara_place ?>">
					<input type="hidden" name="zeyara_place_id_fk" id="zeyara_place_id_fk" value="
						<?= $zeyara_place_id_fk ?>">
						<button type="button"
                            onclick="change_type_setting(4,'الموقع ','zeyara_place_id_fk','zeyara_place');load_settigs();"
                            class="btn btn-success btn-next">
							<i class="fa fa-plus"></i>
						</button>
					</div>

<div class="col-md-3 col-sm-6 padding-4 ">
	<label class=" label kafel">الغرض   </label>
	<input type="hidden" id="type_setting" data-id="" data-title="" data-title_fk="" data-title_n="" data-fe2a_type="">
		<input type="text" class="form-control  "
                           name="purpose" id="purpose"
                           readonly="readonly"
                           onclick="change_type_setting(1,'الغرض من الزيارة','purpose_id_fk','purpose');load_settigs();"
                           style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                           data-validation="required"
                           value="
			<?= $purpose ?>">
			<input type="hidden" name="purpose_id_fk" id="purpose_id_fk" value="
				<?= $purpose_id_fk ?>">
				<button type="button"
                            onclick="change_type_setting(1,'الغرض من الزيارة','purpose_id_fk','purpose');load_settigs();"
                            class="btn btn-success btn-next">
					<i class="fa fa-plus"></i>
				</button>
			</div>
	<div class="col-md-3 col-sm-6 padding-4 ">
				<label class=" label kafel">النتيجة  </label>
				<input type="text" class="form-control  "
                           name="natega_zeyara" id="nategaa"
                           readonly="readonly"
                           onclick="change_type_setting(2,'نتيجة الزيارة ','nategaa_id_fk','nategaa');load_settigs();"
                           style="cursor:pointer;border: white;color: black;float: right;"
                           data-validation="required"
                           value="
					<?= $nategaa ?>">
					<input type="hidden" name="nategaa_id_fk" id="nategaa_id_fk" value="
						<?= $nategaa_id_fk ?>">
						<button type="button"
                            onclick="change_type_setting(2,'نتيجة الزيارة ','nategaa_id_fk','nategaa');load_settigs();"
                            class="btn btn-success btn-next">
							<i class="fa fa-plus"></i>
						</button>
					</div>
                   
                    <div class="col-md-4 col-sm-6  padding-4 ">
                        <label class=" label">التفاصيل </label>
                        <input type="text" name="zeyara_details" id="zeyara_details" 
                               value="<?php echo $zeyara_details;?>"  data-validation="required"
                               class="form-control ">
                    </div>
                    <div class="col-md-4 col-sm-6  padding-4 ">
                        <label class=" label">  النتائج </label>
                        <input type="text" name="zeyara_results" id="zeyara_results" 
                               value="<?php echo $zeyara_results;?>"  data-validation="required"
                               class="form-control ">
                    </div>
                    <div class="col-md-4 col-sm-6  padding-4 ">
                        <label class=" label"> ملاحظات وتوصيات</label>
                        <input type="text" name="zeyara_notes" id="zeyara_notes" 
                               value="<?php echo $zeyara_notes;?>"  data-validation="required"
                               class="form-control ">
                    </div>
                    </div>
            <div class="col-md-12 text-center">
            <span style="color: red" id="span_id"></span><br>
                <button type="submit"  class="btn btn-labeled btn-success " id="save" name="add" value="add"   >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>
            <?php }else{?>
                                <div class="alert alert-danger" role="alert">

                                نظرا لانك ليس موظف.. لا يمكنك إقامة تقرير زيارة وتواصل

</div>
                            <?php }
 ?>
            <?php echo form_close();?>
                <div class="clearfix"></div><br>
                <?php
                if(isset($records)&&!empty($records)){
                    ?>
                    <table id="example" class=" display table table-bordered    responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg info">
                            <th>م</th>
                            <th>التاريخ</th>
                            <th>وقت بداية    </th>
                            <th>وقت انتهاء </th>
                            <th>الوقت المستغرق</th>
                            <th>اسم المندوب </th>
                            <th>رقم الجوال </th>
                            <th>الادارة </th>
                            <th>الغرض من الزيارة </th>
                            <th>الاجراء</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){
                            $currentDateTime =$row->from_hour;

                            $DateTime =$row->to_hour;
            
            $to_time = strtotime("$row->from_hour");
            $from_time = strtotime("$row->to_hour");
            $time_diff =  round(abs($to_time - $from_time) / 60,2). " دقيقة ";
                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->zeyara_date;?></td>
                                <!-- $newDateTime = date('h:i A', strtotime($currentDateTime)),
                    $to_DateTime = date('h:i A', strtotime($DateTime)),
                    $time_diff, -->
                                <td><?php echo $newDateTime = date('h:i A', strtotime($currentDateTime)) ;?></td>
                                <td><?php echo  $to_DateTime = date('h:i A', strtotime($DateTime));?></td>
                                <td><?php echo $time_diff ;?></td>

                                <td style="padding: 0;"><?php echo $row->emp_name;
?></td>
                                <td><?php echo $row->mob ;?></td>
                                <td><?php echo  $row->edara_n ;?></td>
                                <td><?php echo $row->purpose ;?>
                                   <!-- <button type="button" class="btn btn-sm btn-primary"
                                        data-text="<?=$row->purpose?>" onclick="get_details($(this).attr('data-text'))" data-toggle="modal" data-target="#purpose_detail">
                                        المزيد
                                    </button>-->
                                    
                                </td>
                              
<td>
    <!--***********/////////////////////////////********* 11 *****************//////////////-->
    <?php 
      if($_SESSION['role_id_fk'] ==3) {
            ?>
  
     


    <!-- yara -->
    <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
<li>

                                    <!-- <a  data-toggle="modal"
            onclick="get_text('<?= $row->purpose ?>','<?= $row->natega_zeyara ?>','<?= $row->zeyara_results ?>')"
            data-target="#purpose_detail">
            <i class="fa fa-search"> </i>تفاصيل </a> -->
 
                               </li>
                    <li><a  href="<?php echo base_url();?>/human_resources/employee_forms/zeyara_report/Zeyara_report/add_attaches/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>إضافة  مرفقات</a></li>
                    
                    <li>  <a onclick='swal({
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
window.location="<?= base_url() . 'human_resources/employee_forms/zeyara_report/Zeyara_report/addzeyara_report/' .$row->id  ?>";
});'>
<i class="fa fa-pencil"></i>تعديل</a>
</li>

<li>
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
                                        setTimeout(function(){window.location="<?= base_url() . 'human_resources/employee_forms/zeyara_report/Zeyara_report/deleteGam3iaVisitors/' . $row->id ?>";}, 500);
                                        });'>
                                    <i class="fa fa-trash"> </i> حذف </a></li>
                  </ul>
                </div>   
    <!-- yara -->
    <?php  }
        ?>
    <!--///////////////////////***************************//////////////////////////////////****************-->
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
<div class="modal fade" id="purpose_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-success" style="h">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تفاصيل الزيارة</h5>
            </div>
            <div class="modal-body">
                <div class="panel panel-warning" style="box-shadow: 2px 2px 8px #000;">
                    <div class="panel-heading">
                        <h5 class="text-center">الغرض من الزيارة</h5>
                    </div>
                    <div class="panel-body">
                        <p id="ghared">
                            </p>
                    </div>
                </div>
                <div class="panel panel-info" style="box-shadow: 2px 2px 8px #000;">
                    <div class="panel-heading">
                        <h5 class="text-center">نتيجة الزيارة</h5>
                    </div>
                    <div class="panel-body">
                        <p id="natega"></p>
                    </div>
                </div>
                <div class="panel panel-defult" style="box-shadow: 2px 2px 8px #000;">
                    <div class="panel-heading">
                        <h5 class="text-center">النتائج </h5>
                    </div>
                    <div class="panel-body">
                        <p id="subject_visitt"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title_setting ">  </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid"  id="">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success " onclick="$('#add_input').show(); "
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="add_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label title_setting  "> </label>
                                    <input type="text" onfocus="$('.add_title').hide();" name="name" id="add_title"
                                           value=""
                                           class="form-control">
                                    <input type="hidden" name="row_setting_id" id="row_setting_id" value="">
                                    <span class="add_title" style="color: red; display: none;">هذا الحقل مطلوب</span>
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" >
                                    <button type="button" onclick="add_setting($('#add_title').val(),'add_title','output'); " style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="setting_output">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<script>
    function get_details(content) {
        $('#purpose_details').text(content);
    }
</script>
<script>
    function get_text(ghared, natega,subject) {
        $('#ghared').text(ghared);
        $('#natega').text(natega);
        $('#subject_visitt').text(subject);
    }
</script>
<script>
    function change_type_setting(id, title, title_fk, title_n) {
        var edara_n = $('#edara_n').val();
        $('.title_setting').text(title);
        $('#type_setting').data('id', id);
        $('#type_setting').data('title', title);
        $('#type_setting').data('title_fk', title_fk);
        $('#type_setting').data('title_n', title_n);
        $('#type_setting').data('edara_n', edara_n);
    }
</script>
<script>
    function add_setting(value, title, div) {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var row_id = $('#row_setting_id').val();
        var edara_id_fk = $('#edara_id_fk').val();
        var edara_n = $('#edara_n').val();
        var geha = $('#geha').val();
        var geha_id_fk = $('#geha_id_fk').val();
        if (value != 0 && value != ''&&type!=5) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/employee_forms/zeyara_report/Zeyara_report/add_setting',
                data: {value: value, type: type, type_name: type_name, row_id: row_id,edara_id_fk:edara_id_fk,edara_n:edara_n},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + title).val(' ');
                    $('#row_setting_id').val('');
                    $('#setting_output').html(html);
                    load_settigs();
                }
            });
        }
        else  if (value != 0 && value != ''&&type==5) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/employee_forms/zeyara_report/Zeyara_report/add_setting',
                data: {value: value, type: type, type_name: type_name, row_id: row_id,geha_id_fk:geha_id_fk,geha:geha},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + title).val(' ');
                    $('#row_setting_id').val('');
                    $('#setting_output').html(html);
                    load_settigs();
                }
            });
        } 
        else {
            swal({
                title: 'من فضلك تأكد من الحقول الناقصه !',
                type: 'warning',
                confirmButtonText: 'تم'
            });
        }
    }
</script>
<script>
    function load_settigs() {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var edara_n = $('#edara_n').val();
        var edara_id_fk = $('#edara_id_fk').val();

        var geha = $('#geha').val();
        var geha_id_fk = $('#geha_id_fk').val();
        
         if (edara_n !=''&&type!=5){
             $('#settingModal').modal('show');
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url()?>human_resources/employee_forms/zeyara_report/Zeyara_report/load_settigs',
                 data: {type: type, type_name: type_name,edara_n:edara_n,edara_id_fk:edara_id_fk},
                 dataType: 'html',
                 cache: false,
                 beforeSend: function () {
                     $('#setting_output').html(
                         '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                     );
                 },
                 success: function (html) {
                     $('#setting_output').html(html);
                 }
             });
         }
        else if (type==3){
             $('#settingModal').modal('show');
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url()?>human_resources/employee_forms/zeyara_report/Zeyara_report/load_settigs',
                 data: {type: type, type_name: type_name,edara_n:edara_n,edara_id_fk:edara_id_fk},
                 dataType: 'html',
                 cache: false,
                 beforeSend: function () {
                     $('#setting_output').html(
                         '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                     );
                 },
                 success: function (html) {
                     $('#setting_output').html(html);
                 }
             });
         }
         else if ((type==5)&&(geha !='')&&(geha_id_fk !=0)){
             $('#settingModal').modal('show');
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url()?>human_resources/employee_forms/zeyara_report/Zeyara_report/load_settigs',
                 data: {type: type, type_name: type_name,geha:geha,geha_id_fk:geha_id_fk},
                 dataType: 'html',
                 cache: false,
                 beforeSend: function () {
                     $('#setting_output').html(
                         '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                     );
                 },
                 success: function (html) {
                     $('#setting_output').html(html);
                 }
             });
         }
       else{
             swal({
                 title: 'من فضلك حدد الجهه اولا !',
                 type: 'warning',
                 confirmButtonText: 'تم'
             });
         }
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#type_setting').data("title_fk");
        var title_n = $('#type_setting').data("title_n");
        /// id title function
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#settingModal').modal('hide');
    }
</script>
<script>
    function show_kafel(value) {
        $('#nategaa').val('');
        $('#purpose').val('');
        $('#purpose_id_fk').val('');
        $('#nategaa_id_fk').val('');
        if (value == 2) {
            $('.show_kafel').show();
        } else {
            $('.show_kafel').hide();
            $('#financial_value').val('');
            $('#kafel_status_fk').val('');
        }
    }
</script>
<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled","disabled");
        }
       else if ($(this_input).val() == '0000000000') {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html(" الرقم مكون من اصفار");
        $('button[type="submit"]').attr("disabled","disabled");
        }
         else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>
<!-- yara25-10-2020 -->
<script>
        function get_time() {
            var start = $('#from_time').val();
            var end = $('#to_time').val();
            //  alert(start);
            //  return;
            if (start != '' && end != '') {
                s = start.split(':');
                e = end.split(':');
                var ss = s[s.length - 1].split(' ');
                var ee = e[e.length - 1].split(' ');
                if (ss[ss.length - 1] === 'PM') {
                    if (parseInt(s[0]) === 12) {
                    } else {
                        s[0] = parseInt(s[0]) + 12;
                    }
                }
                if (ee[ee.length - 1] === 'PM') {
                    if (parseInt(e[0]) === 12) {
                    } else {
                        e[0] = parseInt(e[0]) + 12;
                    }
                }
                min = parseInt(e[1]) - parseInt(s[1]);
                console.log('min :' + min + " e[1] :" + e[1] + " s[1] :" + s[1]);
                hour_carry = 0;
                if (min < 0) {
                    min += 60;
                    hour_carry += 1;
                }
                console.log('min :' + min);
                hour = e[0] - s[0] - hour_carry;
                diff = hour + "." + min;
                console.log('min :' + min + " hours :" + hour + " diff :" + diff);
                diff_munites = (diff* 60);
                $('#num_hours').val(diff_munites);
                if (diff_munites <= 0) {
                    $('#num_hours').val(0);
                    document.getElementById("save").disabled = true;
                    document.getElementById("span_id").style.display = 'block';
                    document.getElementById("span_id").innerText = 'من فضلك ادخل فترة زمنية صحيحة';
                } else {
                    document.getElementById("save").disabled = false;
                    document.getElementById("span_id").style.display = 'none';
                  
                }
            }
        }
    </script>
    <!-- yaraa22-9 -->