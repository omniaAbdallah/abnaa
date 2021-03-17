<style >
.vertical-tabs .panel-footer {
    background-color: #e6e6e6;
    border-top: 1px solid #e1e6ef;
    display: inline-block;
    width: 100%;
    padding: 5px 10px;
}
.upChevron {
    display: none;
    /* position: absolute; */
    top: 0px;
    left: 0px;
    z-index: 1;
    font-size: 16px;
    cursor: pointer;
    background-color: #09704e;
    padding: 0px 9px;
    color: #fff;
    border-bottom-left-radius: 26px;
    border-bottom-right-radius: 26px;
    /* box-shadow: 0px 5px 0px #005237; */
    box-shadow: -1px 6px 8px #d48a00;
}
</style>
<div class="col-xs-12 ">
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
<div class="panel-heading">
<h3 class="panel-title"> إعداد السياسات   </h3>
</div>
<div class="panel-body">
<div class="col-md-12 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">بدل  الساعات الاضافية
</h5>
                        </div>
                        <?php  
 $url=base_url()."human_resources/egraat_settings/Sysat_setting/addsysat_setting";
echo form_open_multipart($url,array('id' =>'form1')) ?>
                        <div class="panel-body" style=" overflow: hidden;">
                            <!--  -->
                            <table class="table">

  <tbody>
    <tr>
      <th scope="row">معامل حساب الساعة الاضافية خارج ساعات الدوام الرسمي خلال ايام العمل الرسمية </th>
      <td><input id="hours_out_work_days" name="hours_out_work_days" data-validation="required"  class="form-control text-center  result" value="<?php if(isset($table->hours_out_work_days)&&!empty($table->hours_out_work_days)){ echo $table->hours_out_work_days; }?>"></td>
      <th scope="row">ساعه </th>
    </tr>
    <tr>
      <th scope="row">معامل حساب الساعة الاضافية خارج ساعات الدوام الرسمي خلال الأجازات والعطلات الرسمية         </th>
      <td><input id="hours_out_vacation_days" name="hours_out_vacation_days" data-validation="required"  class="form-control text-center  result" value="<?php if(isset($table->hours_out_vacation_days)&&!empty($table->hours_out_vacation_days)){ echo $table->hours_out_vacation_days;}?>"></td>
      <th scope="row">ساعه </th>
    </tr>
  </tbody>
 
</table>
                            <!--  -->
                        </div>
                        <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">
                            <button name="add" value="حفظ" type="submit" class="btn btn-labeled btn-success " style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
               
<!--  -->
<div class="col-md-6 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"> بدل انتداب داخل المملكة  
</h5>
                        </div>
                    
                        <?php 
                        
                        
                        if(isset($record_in)&&!empty($record_in))
                        {
                          $url=base_url()."human_resources/egraat_settings/Sysat_setting/update_badel_in/".$record_in->id;
                          echo form_open_multipart($url,array('id' =>'form1'));
$mostwa_wazefy=$record_in->mostwa_wazefy;
$badal_value_part_day=$record_in->badal_value_part_day;
$badal_value_full_day=$record_in->badal_value_full_day;



                        }
                        else{
 $url=base_url()."human_resources/egraat_settings/Sysat_setting/add_badel_in";
echo form_open_multipart($url,array('id' =>'form1'));
$mostwa_wazefy='';
$badal_value_part_day='';
$badal_value_full_day='';            

}


?>
                        <div class="panel-body" style=" overflow: hidden;">
                            <!--  -->
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">المستوي الوظيفي</th>
      <th scope="col">قيمة بدل الانتداب اليومي جزئي </th>
      <th scope="col">قيمة بدل الانتداب اليومي كلي </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td> <select name="mostwa_wazefy" id="mostwa_wazefy"
                        class="form-control "
                      
                        data-validation="required" aria-required="true">
                    <option value="">إختر</option>
                    <?php
                    if (isset($manager_category_in) && !empty($manager_category_in)) {
                        foreach ($manager_category_in as $row) {
                            ?>
                            <option value="<?php echo $row->id; ?>"<?php 
                            if ($row->id == $mostwa_wazefy) {
                               echo 'selected';
                            } ?>> <?php echo $row->name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select></td>
      <td ><input type="number" name="badal_value_part_day" id="badal_value_part_day" value="<?=$badal_value_part_day?>" class="form-control  text-center"  onkeypress="validate_number(event)" data-validation="required"></td>
      <td><input type="number" id="badal_value_full_day" name="badal_value_full_day"  value="<?=$badal_value_full_day?>" data-validation="required" class="form-control text-center  result"></td>
    </tr>
  </tbody>
</table>
                            <!--  -->
                        </div>
                        <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">
                            <button name="add" value="حفظ" type="submit" class="btn btn-labeled btn-success " style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
                    </div>
                    </form>
              
                <?php if(isset($table_badel_in)&&!empty($table_badel_in)){?>
                
                  <table id="" class=" table  table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                              <th> المستوي الوظيفي</th>
                              <th> قيمة بدل الانتداب اليومي جزئي </th>
                              <th> قيمة بدل الانتداب اليومي كلي</th>
                              <th>الاجراء</th>

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        $x=1;
                        foreach ($table_badel_in as $row){?>
                        <tr>
                                <td><?= $x++?></td>
                                <td>
                                <?php
                    if (isset($manager_category) && !empty($manager_category)) {
                        foreach ($manager_category as $roww) {
                            ?>
                            <?php 
                            if ($roww->id == $row->mostwa_wazefy) {
                             echo $roww->name;
                            } ?>
                            <?php
                        }
                    }
                    ?>
                                
                                </td>
                                <td><?= $row->badal_value_part_day;?></td>
                                <td><?= $row->badal_value_full_day;?></td>

                                <td>
                            <!-- <a onclick='swal({
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
window.location="<?= base_url() . 'human_resources/egraat_settings/Sysat_setting/update_badel_in/' .$row->id  ?>";
});'>
<i class="fa fa-pencil"></i></a>-->



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
                                        setTimeout(function(){window.location="<?= base_url() . 'human_resources/egraat_settings/Sysat_setting/delete_badel_out/' . $row->id ?>";}, 500);
                                        });'>
                                    <i class="fa fa-trash"> </i>  </a>
                                
                                </td>

                        <?php $x++; }?> 
                        </tbody>
                    </table>
                <?php }?>
                </div>
                <!--  -->
                <div class="col-md-6 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"> بدل انتداب خارج المملكة 
</h5>
                        </div>
                        <?php 
                        
                        
                        if(isset($record)&&!empty($record))
                        {
                          $url=base_url()."human_resources/egraat_settings/Sysat_setting/update_badel_out/".$record->id;
                          echo form_open_multipart($url,array('id' =>'form1'));
$mostwa_wazefy=$record->mostwa_wazefy;
$badal_value_part_day=$record->badal_value_part_day;
$badal_value_full_day=$record->badal_value_full_day;



                        }
                        else{
 $url=base_url()."human_resources/egraat_settings/Sysat_setting/add_badel_out";
echo form_open_multipart($url,array('id' =>'form1'));
$mostwa_wazefy='';
$badal_value_part_day='';
$badal_value_full_day='';            

}


?>
                        <div class="panel-body" style=" overflow: hidden;">
                            <!--  -->
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">المستوي الوظيفي</th>
      <th scope="col">قيمة بدل الانتداب اليومي جزئي </th>
      <th scope="col">قيمة بدل الانتداب اليومي كلي </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td> <select name="mostwa_wazefy" id="mostwa_wazefy"
                        class="form-control "
                      
                        data-validation="required" aria-required="true">
                    <option value="">إختر</option>
                    <?php
                    if (isset($manager_category_out) && !empty($manager_category_out)) {
                        foreach ($manager_category_out as $row) {
                            ?>
                            <option value="<?php echo $row->id; ?>"<?php 
                            if ($row->id == $mostwa_wazefy) {
                               echo 'selected';
                            } ?>> <?php echo $row->name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select></td>
      <td ><input type="number" name="badal_value_part_day" id="badal_value_part_day" value="<?=$badal_value_part_day?>" class="form-control  text-center"  onkeypress="validate_number(event)" data-validation="required"></td>
      <td><input type="number" id="badal_value_full_day" name="badal_value_full_day"  value="<?=$badal_value_full_day?>" data-validation="required" class="form-control text-center  result"></td>
    </tr>
  </tbody>
</table>
                            <!--  -->
                        </div>
                        <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">
                            <button name="add" value="حفظ" type="submit" class="btn btn-labeled btn-success " style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
                    </div>
                    </form>
              
                <?php if(isset($table_badel_out)&&!empty($table_badel_out)){?>
                
                  <table id="" class=" table  table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                              <th> المستوي الوظيفي</th>
                              <th> قيمة بدل الانتداب اليومي جزئي </th>
                              <th> قيمة بدل الانتداب اليومي كلي</th>
                              <th>الاجراء</th>

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        $x=1;
                        foreach ($table_badel_out as $row){?>
                        <tr>
                                <td><?= $x++?></td>
                                <td>
                                <?php
                    if (isset($manager_category) && !empty($manager_category)) {
                        foreach ($manager_category as $roww) {
                            ?>
                            <?php 
                            if ($roww->id == $row->mostwa_wazefy) {
                             echo $roww->name;
                            } ?>
                            <?php
                        }
                    }
                    ?>
                                
                                </td>
                                <td><?= $row->badal_value_part_day;?></td>
                                <td><?= $row->badal_value_full_day;?></td>

                                <td>
                            <!-- <a onclick='swal({
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
window.location="<?= base_url() . 'human_resources/egraat_settings/Sysat_setting/update_badel_out/' .$row->id  ?>";
});'>
<i class="fa fa-pencil"></i></a>-->



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
                                        setTimeout(function(){window.location="<?= base_url() . 'human_resources/egraat_settings/Sysat_setting/delete_badel_out/' . $row->id ?>";}, 500);
                                        });'>
                                    <i class="fa fa-trash"> </i>  </a>
                                
                                </td>

                        <?php $x++; }?> 
                        </tbody>
                    </table>
                <?php }?>

                </div>
               <!--  -->
               <div class="col-md-12 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">بدل التكليف بالوكالة 
</h5>
                        </div>
                        <?php  
 $url=base_url()."human_resources/egraat_settings/Sysat_setting/addsysat_taklef";
echo form_open_multipart($url,array('id' =>'form1')) ?>
                        <div class="panel-body" style=" overflow: hidden;">
                            <!--  -->
                            <table class="table">
  <tbody>
    <tr>
      <th scope="row">مدة التكليف   الحد الأدني بالاشهر   </th>
      <td><input id="taklef_moda_minmum" name="taklef_moda_minmum" data-validation="required"  class="form-control text-center  result" value="<?php if(isset($table_taklef->taklef_moda_minmum)&&!empty($table_taklef->taklef_moda_minmum)){ echo $table_taklef->taklef_moda_minmum; }?>"></td>
      <th scope="row">الحد الاقصي بالاشهر  </th>
      <td><input id="taklef_moda_maxmum" name="taklef_moda_maxmum" data-validation="required"  class="form-control text-center  result" value="<?php if(isset($table_taklef->taklef_moda_maxmum)&&!empty($table_taklef->taklef_moda_maxmum)){ echo $table_taklef->taklef_moda_maxmum; }?>"></td>
      <!-- <th scope="row">شهر </th>
     -->
    </tr>
    <tr>
      <th scope="row">بدل التكليف  الحد الادني    </th>
      <td><input id="taklef_badel_minmum" name="taklef_badel_minmum" data-validation="required"  class="form-control text-center  result" value="<?php if(isset($table_taklef->taklef_badel_minmum)&&!empty($table_taklef->taklef_badel_minmum)){ echo $table_taklef->taklef_badel_minmum; }?>"></td>
      <th scope="row"> %الحد الاقصي      </th>
      <td><input id="taklef_badel_maxmum" name="taklef_badel_maxmum" data-validation="required"  class="form-control text-center  result" value="<?php if(isset($table_taklef->taklef_badel_maxmum)&&!empty($table_taklef->taklef_badel_maxmum)){ echo $table_taklef->taklef_badel_maxmum; }?>"></td>
      <th scope="row">  %من قيمة الراتب الأساسي    </th>
    </tr>
  </tbody>
</table>
                            <!--  -->
                        </div>
                        <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">
                            <button name="add" value="حفظ" type="submit" class="btn btn-labeled btn-success " style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
               <!--  -->
                </div>
                    </div>
                </div>