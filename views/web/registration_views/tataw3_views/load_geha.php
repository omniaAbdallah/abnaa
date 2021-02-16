<?php 
// $dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
// $period = array('الصباح','المساء');
// $answer = array(1=>'نعم',2=>'لا');
$required1 = '';
$readonly1 = 'readonly';
$required2 = '';
$readonly2 = 'readonly';
$disabled = 'disabled';
if($this->uri->segment(5) == ""){
	//echo form_open_multipart('Volunteers/Volunteers/new_volunteer'); 
}
else{
//	echo form_open_multipart('Volunteers/Volunteers/edit_volunteer/'.$this->uri->segment(5)); 
	$disabled = '';
	if($volunteer['another_charity'] == 1) {
		$required1 = 'required';
		$readonly1 = '';
	}
	if($volunteer['having_disability'] == 1) {
		$required2 = 'required';
		$readonly2 = '';
	}
}
?>

<div class="col-sm-12 col-md-12 col-xs-12">

   
	    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
		    
		    
			<div class="panel-body">
				<div class="form-group col-sm-12 col-xs-12">
				 
                   

                    <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label">تاريخ الطلب</label>
                    <input type="date" name="talb_date" value="<?=date('Y-m-d');?>" class="form-control " data-validation="required" >
                    </div> 
                    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> نوع التطوع</label>
                          <select name="tato3_no3" class="form-control " id="tato3_no3" data-validation="required"
                         >
                        <option value="">اختر</option>
                        <?php
                        
                                $tato3_no3 = array(1=>'بدون أجر',2=>'بأجر');
                                foreach($tato3_no3 as $key=>$value){
                                    ?>
                        <option value="<?php echo $key;?>" <?php if( isset($volunteer) && !empty($volunteer['tato3_no3'])){
                                            if($key==$volunteer['tato3_no3']){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option>
                        <?php
                                }
                                ?>
                    </select>
				      
				    </div>
				    <div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label "> اسم الجهه</label>
				      	<input type="text" name="name" value="<?php if(isset($volunteer)) echo $volunteer['name'] ?>" placeholder="الإسم" class="form-control " data-validation="required">
				    </div>

				    <div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label ">  رقم السجل </label>
                          <input type="text"  name="id_card" value="<?php if(isset($volunteer)) echo $volunteer['id_card'] ?>" placeholder=" السجل " class="form-control " data-validation="required" onkeypress="validate(event);" onkeyup="return checkUnique($(this).val())">
				      	<span id="checkUnique" style="color: #a94442"></span>
				    </div>

				   
				</div>

				<div class="form-group col-sm-12 col-xs-12">
				    <!-- <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> المدينه</label>
				      	<input type="text" name="center_id_fk" value="<?php if(isset($volunteer)) echo $volunteer['center_id_fk'] ?>" placeholder="العنوان" class="form-control " data-validation="required">
				    </div>
                    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> الحي</label>
				      	<input type="text" name="district_id_fk" value="<?php if(isset($volunteer)) echo $volunteer['district_id_fk'] ?>" placeholder="العنوان" class="form-control " data-validation="required">
				    </div> -->
                    <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> المدينة  </label>
                    <select class="form-control  selectpicker"  name="center_id_fk" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" onchange="get_sub_select(this.value,'center_option');">
                        <option value="">اختر</option>
                        <?php    if(isset($all_city) && !empty($all_city)){
                            foreach ($all_city as $row_city):
                                $selected = '';
                                if (isset($result)) {
                                    if ($row_city->id == $result['center_id_fk']) {
                                        $selected = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                    <?php echo $row_city->title ?></option>
                            <?php endforeach ;}?>
                    </select>
                </div>
               
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> الحي  </label>

                    <select name="district_id_fk" class="form-control  "  id="center_option" name="" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                    </select>
                </div>

					<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> الهاتف أو الجوال</label>
				      
                          <input type="text" maxlength="10"
                        
                      
                        onkeyup="check_length_num(this,10,'span_phone');"
                        name="mobile" id="mob" onkeypress="validate(event);"  value="<?php if(isset($volunteer)) echo $volunteer['mobile'] ?>" class="form-control " data-validation="required">

                        <span id="span_phone" style="color: red;"></span>
                    
                    
                    </div>
                    <div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label "> البريد الإلكتروني</label>
				      	<input type="email" name="email" value="<?php if(isset($volunteer)) echo $volunteer['email'] ?>" placeholder="البريد الإلكتروني" class="form-control ">
				    </div>
                    
                    
               
				</div>

                <div class="form-group col-sm-12 col-xs-12">
     


<!-- <div class="form-group col-sm-2 padding-4 company" style="">

<label class=" label">  نوع المنظمه </label>
<input type="text" name="no3_monzma" 
    id="no3_monzma" class="form-control " 
    value="<?php if(isset($volunteer)) echo $volunteer['no3_monzma'];?>" data-validation-has-keyup-event="true">
</div> -->

<div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label">نوع المنظمه</label>
                    <select id="no3_monzma" class="form-control "
                            name="no3_monzma" data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if (isset($no3_monzma) && !empty($no3_monzma)) {
                            foreach ($no3_monzma as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"<?php if (isset($volunteer) &&$row->id == $volunteer['no3_monzma']) {
                                    echo 'selected';
                                } ?>> <?php echo $row->title; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
</div>

<div class="form-group col-sm-2 padding-4 company" style="">

<label class=" label">   اللوجو الخاص </label>
<input type="file" name="img" 
     class="form-control " 
    value="" data-validation-has-keyup-event="true">
    <?php if(isset($volunteer)&&!empty($volunteer['logo_monzma'])) {?>
    <a data-toggle="modal" data-target="#myModal-view">
     <i class="fa fa-eye" title=" قراءة"></i> </a>
    <?php }?>
                                    
</div>

<!-- <div class="form-group col-sm-8 padding-4 company" style="">

<label class=" label">    مجال العمل </label>
<input type="text" name="work_type" 
    id="work_type" class="form-control " 
    value="<?php if(isset($volunteer)) echo $volunteer['work_type'];?>" data-validation-has-keyup-event="true">
</div> -->

<!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> مجال العمل</label>
                    <select id="work_type" class="form-control "
                            name="work_type" data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if (isset($work_type) && !empty($work_type)) {
                            foreach ($work_type as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"<?php if (isset($volunteer) &&$row->id == $volunteer['work_type']) {
                                    echo 'selected';
                                } ?>> <?php echo $row->title; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
</div> -->
<div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label ">   مجال العمل</label>
                            <select id="work_type" name="work_type[]" multiple
                                    title="يمكنك إختيار أكثر من مجال "
                                    class="form-control selectpicker" 
                                    data-show-subtext="true"
                                    data-live-search="true">
                                
                                <?php
                                foreach ($work_type as $key) {
                                    $select = '';
                                    if (isset($volunteer_work_type) && (!empty($volunteer_work_type))) {
                                        if (in_array($key->id, $volunteer_work_type)) {
                                            $select = 'selected';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                                <?php } ?>
                            </select>
</div>


<div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label ">   الخبرات والمهارات</label>
                            <select id="skills" name="skills[]" multiple
                                    title="يمكنك إختيار أكثر من الخبرات "
                                    class="form-control selectpicker" 
                                    data-show-subtext="true"
                                    data-live-search="true">
                                
                                <?php
                                foreach ($skills as $key) {
                                    $select = '';
                                    
                                    ?>
                                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                                <?php } ?>
                            </select>
</div> 
               
				</div>
                <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label ">    الاهتمامات</label>
                            <select id="interest" name="interest[]" multiple
                                    title="يمكنك إختيار أكثر من الاهتمامات "
                                    class="form-control selectpicker" 
                                    data-show-subtext="true"
                                    data-live-search="true">
                                
                                <?php
                                foreach ($interest as $key) {
                                    $select = '';
                                    
                                    ?>
                                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                                <?php } ?>
                            </select>
</div> 
               
</div>



                   











			    <div class="form-group col-sm-12 col-xs-12">
			    	
			    	<div class="form-group col-sm-6 col-xs-12 padding-4">
				      	<label class="label "> هل سبق لك التطوع لدى جهة خيرية ؟</label>
                          <?php 
                          $answer = array(1=>'نعم',2=>'لا');
				      	foreach ($answer as $key => $value) { 
				      		$checked = '';
                            if(isset($volunteer) && $volunteer['another_charity'] == $key) {
                                $checked = 'checked';
                            }
				      	?>
				      		&emsp;&emsp;&emsp;
				      		<input type="radio" name="another_charity" value="<?=$key?>" data-validation="required" onclick="changeReadonly($(this).val(),'charity')" style="margin-top: 10px" <?=$checked?>> <label><h6><?=$value?></h6></label>
				      		&emsp;&emsp;&emsp;&emsp;
				      	<? } ?>
				    </div>

				    <div class="form-group col-sm-6 col-xs-12 padding-4">
				      	<label class="label "> إذا كانت الإجابة <strong>بنعم </strong>الرجاء تحديد الانشطه التطوعيه التي مارستها</label>
				      	<input type="text" name="charity" id="charity" value="<?php if(isset($volunteer)) echo $volunteer['charity'] ?>" class="form-control " data-validation="<?=$required1?>" <?=$readonly1?>>
				    </div>
				</div>

				

			    <!-- <div class="form-group col-sm-12 col-xs-12">
		            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5" <?=$disabled?>><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
				</div> -->
			</div>
		</div>

</div> 

<!------------------------------------------------------------->

<script>
  $('.selectpicker').selectpicker("refresh");
</script>