<style>
    .half_d {
        width: 30% !important;
        float: right !important;
    }

    .half_dd {
        width: 70% !important;
        float: right !important;
    }
</style>
<?php
        $forsa_name = '';
        $forsa_name_abbr = '';
        $wasf = '';
        $anshta = '';
        $makan = '';
        $shroot = '';
        $a3ed_motatw3 = '';
        $mobadra_code = '';
        $madina = '';
        $start_date =date('Y-m-d');
        $end_date = date('Y-m-d');
        $start_join_date = date('Y-m-d');
        $end_join_date = date('Y-m-d');
        $gender = '';
        $tataw3_hours = '';
        $aytam_amal ='';
        $moshrf_name = '';
        $moshrf_jwal = '';
        $mnazm_logo = '';
 ?>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">

            <h3 class="panel-title"><?php echo $title; ?></h3>

 <div class="panel-body">
 
     <div class="col-sm-12 no-padding ">
     

    <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
        <label class="label">رقم الطلب </label>
        <input type="text" name="rkm_talab"value=""class="form-control" readonly="readonly" />
    </div>     
 
  <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
    <label class="label">تاريخ الطلب </label>
    <input type="date" name="date_talab"value="<?=date('Y-m-d')?>"class="form-control"  />
  </div>     
 
 
 <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
    <label class="label">الإدارة </label>
    <input type="text" name="edara_id" value=""class="form-control"  />
 </div>
 
 
  <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
    <label class="label">مقدم الطلب </label>
    <input type="text" name="mokdm_talab" value=""class="form-control"  />
 </div>     
     
     
  <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                    <label class="label">اسم المشرف </label>
                    <input type="text" name="moshrf_name"
                           value="<?= $moshrf_name?>"
                           class="form-control  "  data-validation="required">

  </div>

 </div>
<div class="col-sm-12 no-padding ">

      
        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label class="label"> رقم جوال المشرف </label>
                    <input type="text" name="moshrf_jwal" onkeypress="validate_number(event)"
                           value="<?= $moshrf_jwal?>"
                           onkeyup="check_length_num(this,'10','jwal_span');"
                           maxlength="10"
                           class="form-control "  data-validation="required">
                    <span id="jwal_span" style="bottom: -20px;font-size: 14px;" class="span-validation"> </span>

        </div>

  
<div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
<label class=" label kafel"> طبيعة العمل التطوعي </label>
<input type="hidden" id="type_setting" data-id="" data-title="" data-title_fk="" data-title_n="" data-fe2a_type="">
<input type="text" class="form-control  "
           name="volunteer_description" id="volunteer_description"
           readonly="readonly"
           onclick="change_type_setting(1102,'طبيعة العمل التطوعي ','volunteer_description_id_fk','volunteer_description');load_settigs();"
           style="cursor:pointer;border: white;color: black;width:88%;float: right;"
           data-validation="required"
           value="">
	<input type="hidden" name="volunteer_description_id_fk" id="volunteer_description_id_fk" value="">
		<button type="button"
            onclick="change_type_setting(1102,'طبيعة العمل التطوعي ','volunteer_description_id_fk','volunteer_description');load_settigs();"
            class="btn btn-success btn-next">
			<i class="fa fa-plus"></i>
		</button>
	</div>
  
<div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
    <label class="label ">مجال العمل التطوعي 
    </label>                       
        <select name="magal_tatw3" id="magal_tatw3"
        class="form-control  " 
        data-show-subtext="false" data-live-search="false"
        data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php
            if (!empty($all_emp_magalat)):
            foreach ($all_emp_magalat as $record):
            $select = '';
            if ($magal_tatw3 == $record->id) {
            $select = 'selected';
            } ?>
            <option
            value="<?php echo $record->id; ?>" <?= $select ?>>
            <?php echo $record->emp_magal_name; ?></option>
        <?php
        endforeach;
        endif;
        ?>
        </select>
</div>
  
  
   <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                    <label class="label">  اسم الفرصة التطوعية  </label>
                    <input type="text" name="forsa_name" id="forsa_name"
                           value="<?= $forsa_name?>"
                           oninput="set_abbr(this.value)"
                           class="form-control  "  data-validation="required">

                </div>

   
</div>

<div class="col-sm-12 no-padding ">
<div class="form-group col-md-9 col-sm-6 col-xs-6 padding-4">
                    <label class="label">    وصف الفرصة التطوعية   </label>
                    <input type="text" name="wasf"
                           value="<?= $wasf?>"
                           data-validation="required"
                           class="form-control  " >

                </div>

<div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                    <label class="label">     المكان    </label>
                    <input type="text" name="makan"
                           value="<?= $makan?>"
                           class="form-control  " >

                </div>







</div>

<div class="col-sm-12 no-padding ">

  <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
    <label class="label">بداية الفرصة </label>
    <input type="date" name="from_date"value="<?=date('Y-m-d')?>"class="form-control"  />
  </div>     
 
 
   <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
    <label class="label">نهاية الفرصة  </label>
    <input type="date" name="to_date"value="<?=date('Y-m-d')?>"class="form-control"  />
  </div>     
 

   <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
    <label class="label">المدة </label>
    <input type="text" name="moda"value=""class="form-control" readonly="readonly"  />
  </div>  
<div class="col-md-1 form-group padding-4">
            <label class="label ">من الساعة </label>
            <input type="time" class="form-control" data-validation="required"
                               name="from_time" id="from_time"
                               onchange="get_time();"
                               value="" >
        </div>

        <div class="col-md-1 form-group padding-4">
            <label class="label ">إلى الساعة </label>
            <input type="time" data-validation="required" name="to_time" id="to_time"
                               class="form-control"
                               onchange="get_time();"
                               value="" >
        </div>
 <div class="col-md-1 form-group padding-4">
                            <label class="label ">عدد ساعات التطوع </label>
                            <input type="text" class="form-control" value=""
                                               name="num_hours" id="num_hours" readonly>
   </div>

 <div class="col-md-2 form-group padding-4">
                            <label class="label ">الجنس </label>

         <select class="form-control" name="gender"   style="" >
                        <option value="">اختر</option>
                        <?php
                            foreach ($genders as $key=>$value){
                                ?>
                                <option value="<?= $key?>"
                                    <?php
                                    if ($gender==$key){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $value?></option>
                                <?php
                            }
                        ?>
                    </select>
       </div>

 <div class="col-md-1 form-group padding-4">
                            <label class="label ">العدد المستهدف </label>
                            <input type="text" class="form-control" value=""
                                               name="num_motakdm" id="num_motakdm" readonly>
   </div>


        </div>
        
<div class="col-sm-12 no-padding ">



 <div class="col-md-4 form-group padding-4">
            <label class="label ">الأنشطة - المهام </label>
            <textarea data-validation="required" name="activities"
            class="editor2" id="editor2"></textarea>
</div>

 <div class="col-md-4 form-group padding-4">
            <label class="label ">شروط الفرصة  </label>
            <textarea data-validation="required" name="shroot"
            class="editor3" id="editor3"></textarea>
</div>

 <div class="col-md-4 form-group padding-4">
            <label class="label ">العائد </label>
            <textarea data-validation="required" name="outcome"
            class="editor4" id="editor4"></textarea>
</div>


</div>        
        
        
        
        </div>
<!--

<div class="col-xs-12 no-padding" >
    <div class="col-xs-3 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title">المنظم</h4>

            </div>
            <div class="panel-body" >
                <br>
                <div class="col-sm-12">
                    <?php if(!empty($mnazm_logo)) {
                        ?>
                        <img id="output" src="<?= base_url()."uploads/human_resources/tato3/foras/".$get_foras->mnazm_logo ?>" width="100%"
                        >
                        <?php
                    } else{
                        ?>
                        <img id="output" src="" width="100%">
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">اسم المشرف </label>
                    <input type="text" name="moshrf_name"
                           value="<?= $moshrf_name?>"
                           class="form-control  "  data-validation="required">

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label"> اللوجو </label>
                    <input type="file" name="mnazm_logo"
                           onchange="loadFile(event)"
                           class="form-control  "  >

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label"> رقم هاتف المشرف </label>
                    <input type="text" name="moshrf_jwal" onkeypress="validate_number(event)"
                           value="<?= $moshrf_jwal?>"
                           onkeyup="check_length_num(this,'10','jwal_span');"
                           maxlength="10"
                           class="form-control "  data-validation="required">
                    <span id="jwal_span" style="bottom: -20px;font-size: 14px;" class="span-validation"> </span>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title">وصف الفرص التطوعية</h4>
            </div>
            <div class="panel-body" >
                <div class="col-md-12 no-padding" style=" margin-top: 10px;">


                <div class="form-group col-md-6 col-sm-5 col-xs-12 padding-4">
                    <label class="label">  اسم الفرصة التطوعية  </label>
                    <input type="text" name="forsa_name" id="forsa_name"
                           value="<?= $forsa_name?>"
                           oninput="set_abbr(this.value)"
                           class="form-control  "  data-validation="required">

                </div>
                    <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">    وصف الفرصة التطوعية   </label>
                    <input type="text" name="wasf"
                           value="<?= $wasf?>"
                           data-validation="required"
                           class="form-control  " >

                </div>
                
                <div class="form-group col-md-6 col-sm-5 col-xs-12 padding-4">
                    <label class="label">  الاسم المختصر    </label>
                    <input type="text" name="forsa_name_abbr" id="forsa_name_abbr"
                           value="<?= $forsa_name_abbr?>"
                           class="form-control  "  >

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">    وصف الفرصة التطوعية   </label>
                    <input type="text" name="wasf"
                           value="<?= $wasf?>"
                           data-validation="required"
                           class="form-control  " >

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">   الأنشطة الرئيسية    </label>
                   <textarea class="form-control" name="anshta"><?= $anshta?></textarea>

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">    وصف المكان    </label>
                    <input type="text" name="makan"
                           value="<?= $makan?>"
                           class="form-control  " >

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">    شروط الفرصة    </label>
                    <textarea class="form-control" name="shroot"><?= $shroot?></textarea>

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">     العائد علي المتطوع    </label>
                    <textarea class="form-control" name="a3ed_motatw3"><?= $a3ed_motatw3?></textarea>

                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xs-3 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title">التفاصيل</h4>
            </div>
            <div class="panel-body" >
                <div class="col-md-12 no-padding" style=" margin-top: 10px;">

                <div class="form-group  col-md-12 col-sm-5 col-xs-12 padding-4">
                           <label class="half_d">       نوع العمل    </label>
                    <select class="form-control half_dd "  name="mobadra_code" >
                        <option value="">اختر</option>
                        <?php
                        if (isset($mobdrat) && !empty($mobdrat)){
                            foreach ($mobdrat as $row){
                                ?>
                                <option value="<?= $row->code?>"
                                    <?php
                                    if ($mobadra_code==$row->code){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $row->title?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="half_d">        المدينة    </label>
                    <select class="form-control half_dd"  name="madina" >
                        <option value="">اختر</option>
                        <?php
                        if (isset($cities) && !empty($cities)){
                            foreach ($cities as $row){
                                ?>
                                <option value="<?= $row->id?>"
                                    <?php
                                    if ($madina==$row->id){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $row->name?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="half_d">     تاريخ البدء    </label>
                    <input type="date"  name="start_date"
                           value="<?= $start_date?>"
                           class="form-control half_dd  " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">

                    <label class="half_d">     تاريخ الإنتهاء    </label>
                    <input type="date" name="end_date"
                           value="<?= $end_date?>"

                           class="form-control half_dd " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">

                    <label class="half_d">      بدء الانضمام    </label>
                    <input type="date" name="start_join_date"

                           value="<?= $start_join_date?>"
                           class="form-control half_dd  " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">

                    <label class="half_d">      انتهاء الانضمام    </label>
                    <input type="date" name="end_join_date"
                           value="<?= $end_join_date?>"

                           class="form-control half_dd  " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-1   2 padding-4">

                    <?php
                     $genders = array('1'=>'نساء فقط','2'=>'رجال فقط','3'=>'نساء ورجال')
                    ?>
                    <label class="half_d">        جنس المتطوعين    </label>
                    <select class="form-control half_dd" name="gender"   style="width: 83%;" >
                        <option value="">اختر</option>
                        <?php

                            foreach ($genders as $key=>$value){
                                ?>
                                <option value="<?= $key?>"
                                    <?php
                                    if ($gender==$key){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $value?></option>
                                <?php
                            }

                        ?>
                    </select>



                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">

                    <label class="half_d">      الساعات التطوعيه    </label>
                    <input type="text"    name="tataw3_hours" onkeypress="validate_number(event)"
                           value="<?= $tataw3_hours?>"
                           class="form-control half_dd  " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <?php
                    $days = array('1'=>' يوميا','2'=>' أسبوعيا','3'=>' شهريا')
                    ?>

                    <label class="half_d">       أيام العمل      </label>
                    <select class="form-control half_dd"   name="aytam_amal" >
                        <option value="">اختر</option>
                        <?php

                        foreach ($days as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($aytam_amal==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value?></option>
                            <?php
                        }

                        ?>
                    </select>


                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-md-12 text-center">
        <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   >
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>

    </div>
    <?php
    echo form_close();
    ?>

</div>-->

<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>

<script type="text/javascript">
    CKEDITOR.replace('editor2');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>


<script type="text/javascript">
    CKEDITOR.replace('editor3');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>

<script type="text/javascript">
    CKEDITOR.replace('editor4');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>