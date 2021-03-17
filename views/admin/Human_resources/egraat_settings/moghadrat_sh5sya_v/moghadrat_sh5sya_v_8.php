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
<h3 class="panel-title"> <?=$title?> </h3>
</div>
<div class="panel-body">
<div class="col-md-12 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">إعدادت المغادرات الشخصية
</h5>
                        </div>
                        <div class="panel-body" style=" overflow: hidden;">
                            <!--  -->
                            <?php  $url=base_url()."human_resources/egraat_settings/Moghadrat_sh5sya";

echo form_open_multipart($url,array('id' =>'form1')) ?>
                            <table class="table">
  <tbody>
    <tr>
      <th scope="row">   الحد الاقصي لعدد المغادرات الشخصيه خلال شهر  </th>
      <td><input id="result1" name="nums_in_month" value="<?php if(isset($table->nums_in_month)&&!empty($table->nums_in_month)){ echo $table->nums_in_month; }?> 

      " data-validation="required"  class="form-control text-center  result" value=""></td>
      <th scope="row">مرة </th>
    </tr>
    <tr>
      <th scope="row">الحد الاقصي لمده المغادره الشخصيه    </th>
      <td><input id="result1" name="nums_in_one_time" value="<?php if(isset($table->nums_in_one_time)&&!empty($table->nums_in_one_time)){ echo $table->nums_in_one_time;}?>" data-validation="required"  class="form-control text-center  result" value=""></td>
      <th scope="row">مده </th>
    </tr>
    <tr>
      <th scope="row">العدد المسموح لدوام الكامل   </th>
      <td><input id="result1" name="moda_dwam_kamel" value="<?php if(isset($table->moda_dwam_kamel)&&!empty($table->moda_dwam_kamel)){ echo $table->moda_dwam_kamel;}?>" data-validation="required"  class="form-control text-center  result" value=""></td>
      <th scope="row">في الشهر </th>
    </tr>
    <tr>
      <th scope="row">العدد المسموح به للدوام الجزئي   </th>
      <td><input id="result1" name="moda_dwam_gozee" value="<?php if(isset($table->moda_dwam_gozee)&&!empty($table->moda_dwam_gozee)){ echo $table->moda_dwam_gozee;}?>" data-validation="required"  class="form-control text-center  result" value=""></td>
      <th scope="row">في الشهر  </th>
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
                </div>
<!--  -->

                       
                <!--  -->
               
               <!--  -->
                </div>
                    </div>
                </div>