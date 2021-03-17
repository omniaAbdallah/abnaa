<style>
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .form-group {
        margin-bottom: 0px;
    }
    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .has-success .form-control {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }
    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .tab-content {
        margin-top: 15px;
    }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        color: #ff0303;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
</style>


<div id="show_edite">
<!--<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">-->
<div class="col-sm-9 col-md-9 col-xs-9 fadeInUp wow">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?></h4>
              
            </div>
        </div>
        <!-- <?php echo form_open_multipart('Web/mother'); ?> -->
        <div class="panel-body" style="height: 400px;">
        <?php
        if ($this->uri->segment(5) == "main-detailsa") {
            $class = "active";
            $class1 = "";
            $class2 = "";
            $class3 = "";
            $class4 = "";
            $class5 = "";
            $class6 = "";
            $class7 = "";
            $class8 = "";
        } else if ($this->uri->segment(5) == "contact-details") {
            $class = "";
            $class1 = "active";
            $class2 = "";
            $class3 = "";
            $class4 = "";
            $class5 = "";
            $class6 = "";
            $class7 = "";
            $class8 = "";
        } else if ($this->uri->segment(5) == "health-details") {
            $class = "";
            $class1 = "";
            $class2 = "active";
            $class3 = "";
            $class4 = "";
            $class5 = "";
            $class6 = "";
            $class7 = "";
            $class8 = "";
        } else if ($this->uri->segment(5) == "education-details") {
            $class = "";
            $class1 = "";
            $class2 = "";
            $class3 = "active";
            $class4 = "";
            $class5 = "";
            $class6 = "";
            $class7 = "";
            $class8 = "";
        } else if ($this->uri->segment(5) == "skills-details") {
            $class = "";
            $class1 = "";
            $class2 = "";
            $class3 = "";
            $class4 = "active";
            $class5 = "";
            $class6 = "";
            $class7 = "";
            $class8 = "";
        }
        else if ($this->uri->segment(5) == "house-details") {
            $class = "";
            $class1 = "";
            $class2 = "";
            $class3 = "";
            $class4 = "";
            $class5 = "active";
            $class6 = "";
            $class7 = "";
            $class8 = "";
        }
        else if ($this->uri->segment(5) == "items-details") {
            $class = "";
            $class1 = "";
            $class2 = "";
            $class3 = "";
            $class4 = "";
            $class5 = "";
            $class6 = "active";
            $class7 = "";
            $class8 = "";
        }
        
        else if ($this->uri->segment(5) == "Sublease") {
            $class = "";
            $class1 = "";
            $class2 = "";
            $class3 = "";
            $class4 = "";
            $class5 = "";
            $class6 = "";
            $class7 = "active";
            $class8 = "";
        }
      
        else if ($this->uri->segment(5) == "money-details") {
            $class = "";
            $class1 = "";
            $class2 = "";
            $class3 = "";
            $class4 = "";
            $class5 = "";
            $class6 = "";
            $class7 = "";
            $class8 = "active";
        }
      
        else {
            $class = "active";
            $class1 = "";
            $class2 = "";
            $class3 = "";
            $class4 = "";
            $class5 = "";
            $class6 = "";
            $class7 = "";
            $class8 = "";
        }

       
        
        ?>


            
        <!-- ----------------------------------------------------------------------------- -->
        <div class="custom-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="<?= $class ?>" > <a href="#main-detailsa" aria-controls="main-detailsa" role="tab" data-toggle="tab">
                        بيانات العقد </a></li>
                <li  role="presentation" class="<?= $class1 ?>" ><a href="#contact-details" 
                                                                  aria-controls="contact-details"
                                                                  role="tab" data-toggle="tab">
                                                                  بيانات المؤجر</a></li>
                <li  role="presentation" class="<?= $class2 ?>"><a href="#health-details"
                                                                  aria-controls="health-details"
                                                                  role="tab" data-toggle="tab">
                                                                  بيانات المستأجر </a></li>
                <li role="presentation" class="<?= $class3 ?>"><a href="#education-details"
                                                                  aria-controls="education-details"
                                                                  role="tab" data-toggle="tab">
                                                                  بيانات المنشأة العقارية  </a></li>
                <li role="presentation" class="<?= $class4 ?>"><a href="#skills-details"
                                                                  aria-controls="skills-details"
                                                                  role="tab" data-toggle="tab">
                                                                  بيانات صكوك التملك  </a></li>
                <li role="presentation" class="<?= $class5 ?>"><a href="#house-details" aria-controls="house-details"
                                                                  role="tab" data-toggle="tab">بيانات العقار </a>
                </li>
               
                <!--  -->
                <li role="presentation" class="<?= $class6 ?>"><a href="#items-details"
                                                                  aria-controls="#items-detail"
                                                                  role="tab" data-toggle="tab">
                                                                  بيانات الوحدات الإيجارية  </a></li>
                                                                  

                 <li  role="presentation" class="<?= $class7 ?>"><a href="#Sublease" aria-controls="Sublease"
                                                                  role="tab" data-toggle="tab"> التأجير من الباطن</a>
                </li>
                <li  role="presentation" class="<?= $class8 ?>"><a href="#money_details" aria-controls="money_details"
                                                                  role="tab" data-toggle="tab">البيانات الماليه</a>
                </li>

            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in <?= $class ?>" id="main-detailsa">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'main-detailsa', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
                
                    <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
          <!--  -->
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> رقم الطلب</label>
                        <input type="text" id="talab_rkm" name="talab_rkm" class="form-control  "
                        value="<?php if (isset($record)) {
                                   echo $record['talb_rkm'];
                               } else {
                                   echo $last_rkm;
                               } ?>"  readonly data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> رقم سجل العقد الأساس </label>
                        <input type="text" id="sgl_rkm_asas" name="sgl_rkm_asas" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if (isset($record)) {
                                   echo $record['sgl_rkm_asas'];
                               }  ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> رقم سجل العقد  </label>
                        <input type="text" id="sgl_rkm" name="sgl_rkm" class="form-control  "onkeypress="return isNumberKey(event)"
                               value="<?php if (isset($record)) {
                                   echo $record['sgl_rkm'];
                               }  ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  نوع العقد</label>
                        <select name="no3_3akd" id="no3_3akd" data-validation="required"
                                class="selectpicker no-padding form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true"
                        
                                aria-required="true">
                            <option value="">اختر</option>
                            <?php 
                            $arr_yes_no = array('', 'جديد ', 'مجدد');
                            for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                $selected = '';
                                if ($r == $record['no3_3akd']) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> تاريخ إبرام العقد </label>
                        <input type="date" id="3akd_date" name="3akd_date" class="form-control  "
                               value="<?php if (isset($record)) {
                                   echo $record['aakd_date'];
                               }  ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> مكان إبرام العقد </label>
                        <input type="text" id="3akd_place" name="3akd_place" class="form-control  "
                               value="<?php if (isset($record)) {
                                   echo $record['aakd_place'];
                               }  ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> تاريخ بداية مدة الايجار </label>
                        <input type="date" id="start_rent_date" name="start_rent_date" class="form-control  "
                               value="<?php if (isset($record)) {
                                   echo $record['start_rent_date'];
                               }  ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> تاريخ نهايه مدة الايجار </label>
                        <input type="date" id="end_rent_date" name="end_rent_date" class="form-control  "
                               value="<?php if (isset($record)) {
                                   echo $record['end_rent_date'];
                               }  ?>"  data-validation="required">
                    </div>
<!--  -->
                    </div>
                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer">
                            <div class="text-center">
                                <?php if (isset($record) && $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('main-detailsa');";
                                else: $input_name1 = 'add';
                                $onclick ="save_mother('main-detailsa')";
                                    $input_name2 = 'add_save'; endif; ?>
                                    <?php
            if (isset($last_record) && $last_record != 4) {
                $disabled = "disabled";
                $span="<span style=\"font-size: medium;\" class=\" badge badge-danger\" id=\"span_form\">لا يمكن طلب جديد لان هنالك طلب جاري </span>";

            } else {

                $disabled = "";
                $span = "";

            } ?>
                                <button type="button" onclick="<?=$onclick?> " id="buttons"
                                        class="btn btn-labeled btn-success "<?=$disabled?>
                                        name="add" value="حفظ">
                                                    <span class="btn-label"><i
                                                                class="fa fa-floppy-o"></i></span>حفظ
                                    
                                </button>
                                <?=$span?>
                            </div>
                        </div>
                    </div>
                    
                    <?php echo form_close() ?>
                </div>
                <div role="tabpanel" class="tab-pane fade in <?= $class1 ?>" id="contact-details">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'contact-details', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
              
                   
                    <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
          <!--  -->
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  الاسم </label>
                        <input type="text" id="mo2ger_name" name="mo2ger_name" class="form-control  "
                        value="<?php if(isset($record)) echo $record['mo2ger_name'] ?>" data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> الجنسية </label>
                        <select name="mo2ger_gensia" id="mo2ger_gensia" class="form-control "
                                data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if (isset($nationality) && $nationality != null) {
                                foreach ($nationality as $value) {
                                    $select = '';
                                    if (isset($record) && $record['mo2ger_gensia'] == $value->id_setting) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option value="<?= $value->id_setting ?>" <?= $select ?>><?= $value->title_setting ?></option>
                                    <?
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
             
		<label class="label "> نوع هوية </label>
		<select name="mo2ger_national_num_type" id="mo2ger_national_num_type" class="form-control " data-validation="required">
			<option value="">إختر</option>
			<?php
			if(isset($national_type) && $national_type != null) {
				foreach ($national_type as $value) {
					$select = '';
					if(isset($record) && $record['mo2ger_national_num_type'] == $value->id_setting) {
						$select = 'selected';
					}
			?>
			<option value="<?=$value->id_setting?>" <?=$select?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> رقم الهوية </label>
		<input type="text" id="mo2ger_national_num" name="mo2ger_national_num" placeholder="رقم هوية " class="form-control " value="<?php if(isset($record)) echo $record['mo2ger_national_num'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> نسخه الهوية </label>
		<input type="text" id="mo2ger_national_ns5a" name="mo2ger_national_ns5a" placeholder="نسخه هوية " class="form-control " value="<?php if(isset($record)) echo $record['mo2ger_national_ns5a'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> رقم الجوال </label>
		<input type="text" id="mo2ger_phone" name="mo2ger_phone" placeholder="رقم الجوال " class="form-control " value="<?php if(isset($record)) echo $record['mo2ger_phone'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">    البريد الالكتروني </label>
                        <input type="email" id="mo2ger_email" name="mo2ger_email" class="form-control  "
                        value="<?php if(isset($record)) echo $record['mo2ger_email'] ?>"  data-validation="required">
                    </div>
                    
<!--  -->
                    </div>
                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer">
                            <div class="text-center">
                           
                                 
                                <?php if (isset( $record) &&  $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('contact-details');";
                                    $disabled="";
                                $text="";
                                else: $input_name1 = 'add';
                                $disabled="disabled";
                                $onclick ="save_mother('contact-details')";
                                $text=" <span style='color:red;'> لا يمكن حفظ طلبك قبل ملئ بيانات العقد</span> ";
                                    $input_name2 = 'add_save'; endif; ?>


                                <button type="button" onclick="<?=$onclick?>" id="buttons"
                                        class="btn btn-labeled btn-success "<?=$disabled?>
                                        name="add" value="حفظ">
                                                    <span class="btn-label"><i
                                                                class="fa fa-floppy-o"></i></span>حفظ
                                    والانتقال الي الشاشه الاخري
                                </button>
                                <?=$text?>
                            </div>
                        </div>
                    </div>
                   
                    <?php echo form_close() ?>
                </div>
                <div role="tabpanel" class="tab-pane fade in <?= $class2 ?>" id="health-details">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'health-details', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
                    <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
          <!--  -->
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  الاسم </label>
                        <input type="text" id="most2ger_name" name="most2ger_name" class="form-control  "
                        value="<?php if(isset($record)) echo $record['most2ger_name'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> الجنسية </label>
                        <select name="most2ger_gensia" id="most2ger_gensia" class="form-control "
                                data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if (isset($nationality) && $nationality != null) {
                                foreach ($nationality as $value) {
                                    $select = '';
                                    if (isset($record) && $record['most2ger_gensia'] == $value->id_setting) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option value="<?= $value->id_setting ?>" <?= $select ?>><?= $value->title_setting ?></option>
                                    <?
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
             
		<label class="label "> نوع هوية </label>
		<select name="most2ger_national_num_type" id="most2ger_national_num_type" class="form-control " data-validation="required">
			<option value="">إختر</option>
			<?php
			if(isset($national_type) && $national_type != null) {
				foreach ($national_type as $value) {
					$select = '';
					if(isset($record) && $record['most2ger_national_num_type'] == $value->id_setting) {
						$select = 'selected';
					}
			?>
			<option value="<?=$value->id_setting?>" <?=$select?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> رقم الهوية </label>
		<input type="text" id="most2ger_national_num" name="most2ger_national_num" placeholder="رقم هوية " class="form-control " value="<?php if(isset($record)) echo $record['most2ger_national_num'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> نسخه الهوية </label>
		<input type="text" id="most2ger_national_ns5a" name="most2ger_national_ns5a" placeholder="نسخه هوية " class="form-control " value="<?php if(isset($record)) echo $record['most2ger_national_ns5a'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> رقم الجوال </label>
		<input type="text" id="most2ger_phone" name="most2ger_phone" placeholder="رقم الجوال " class="form-control " value="<?php if(isset($record)) echo $record['most2ger_phone'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">    البريد الالكتروني </label>
                        <input type="email" id="most2ger_email" name="most2ger_email" class="form-control  "
                        value="<?php if(isset($record)) echo $record['most2ger_email'] ?>"  data-validation="required">
                    </div>
                    
<!--  -->
                    </div>
                   

                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer">
                            <div class="text-center">
                                <?php if (isset( $record) &&  $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    $disabled="";
                                    $text="";
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('health-details');";
                                else: $input_name1 = 'add';
                                $disabled="disabled";
                                $onclick ="save_mother('health-details')";
                                $text=" <span style='color:red;'> لا يمكن حفظ طلبك قبل ملئ بيانات العقد</span> ";
                                    $input_name2 = 'add_save'; endif; ?>
                                <button type="button" onclick="<?=$onclick?>" id="buttons"
                                        class="btn btn-labeled btn-success "<?=$disabled?>
                                        name="add" value="حفظ"> 
                                                    <span class="btn-label"><i
                                                                class="fa fa-floppy-o"></i></span>حفظ
                                    والانتقال الي الشاشه الاخري
                                </button>
                                <?=$text?>
                            </div>
                        </div>
                    </div>
                   
                    <?php echo form_close() ?>
                </div>
                <div role="tabpanel" class="tab-pane fade in <?= $class3 ?>" id="education-details">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'education-details', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
                   
                    <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
          <!--  -->
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  اسم المنشأة العقارية  </label>
                        <input type="text" id="mon42a_name" name="mon42a_name" class="form-control  "
                        value="<?php if(isset($record)) echo $record['mon42a_name'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  عنوان المنشأة العقارية  </label>
                        <input type="text" id="mon42a_address" name="mon42a_address" class="form-control  "
                        value="<?php if(isset($record)) echo $record['mon42a_address'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
           <label class="label "> رقم السجل التجارى </label>
           <input type="text" id="mon42a_sgl_num" name="mon42a_sgl_num" placeholder=" رقم السجل التجارى " class="form-control " value="<?php if(isset($record)) echo $record['mon42a_sgl_num'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
       
                       </div>
                       <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
           <label class="label "> رقم  الهاتف </label>
           <input type="text" id="mon42a_phone" name="mon42a_phone" placeholder=" رقم  الهاتف " class="form-control " value="<?php if(isset($record)) echo $record['mon42a_phone'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
       
                       </div>
                       <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
           <label class="label ">رقم الفاكس  </label>
           <input type="text" id="mon42a_fax" name="mon42a_fax" placeholder=" رقم  الفاكس " class="form-control " value="<?php if(isset($record)) echo $record['mon42a_fax'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
       
                       </div>
                       <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  اسم  الوسيط  </label>
                        <input type="text" id="waseet_name" name="waseet_name" class="form-control  "
                        value="<?php if(isset($record)) echo $record['waseet_name'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> الجنسية </label>
                        <select name="waseet_gensia" id="waseet_gensia" class="form-control "
                                data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if (isset($nationality) && $nationality != null) {
                                foreach ($nationality as $value) {
                                    $select = '';
                                    if (isset($record) && $record['waseet_gensia'] == $value->id_setting) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option value="<?= $value->id_setting ?>" <?= $select ?>><?= $value->title_setting ?></option>
                                    <?
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
             
		<label class="label "> نوع هوية </label>
		<select name="waseet_national_num_type" id="waseet_national_num_type" class="form-control " data-validation="required">
			<option value="">إختر</option>
			<?php
			if(isset($national_type) && $national_type != null) {
				foreach ($national_type as $value) {
					$select = '';
					if(isset($record) && $record['waseet_national_num_type'] == $value->id_setting) {
						$select = 'selected';
					}
			?>
			<option value="<?=$value->id_setting?>" <?=$select?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> رقم الهوية </label>
		<input type="text" id="waseet_national_num" name="waseet_national_num" placeholder="رقم هوية " class="form-control " value="<?php if(isset($record)) echo $record['waseet_national_num'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> نسخه الهوية </label>
		<input type="text" id="waseet_national_ns5a" name="waseet_national_ns5a" placeholder="نسخه هوية " class="form-control " value="<?php if(isset($record)) echo $record['waseet_national_ns5a'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
           
		<label class="label "> رقم الجوال </label>
		<input type="text" id="waseet_phone" name="waseet_phone" placeholder="رقم الجوال " class="form-control " value="<?php if(isset($record)) echo $record['waseet_phone'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">    البريد الالكتروني </label>
                        <input type="email" id="waseet_email" name="waseet_email" class="form-control  "
                        value="<?php if(isset($record)) echo $record['waseet_email'] ?>"  data-validation="required">
                    </div>
                    <!--  -->
                    </div>
                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer">
                            <div class="text-center">
                                <?php if (isset( $record) &&  $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    $disabled="";
                                    $text="";
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('education-details');";
                                else: $input_name1 = 'add';
                                $disabled="disabled";
                                $onclick ="save_mother('education-details')";
                                $text=" <span style='color:red;'> لا يمكن حفظ طلبك قبل ملئ بيانات العقد</span> ";
                                    $input_name2 = 'add_save'; endif; ?>
                                <button type="button" onclick="<?=$onclick?>" id="buttons"
                                        class="btn btn-labeled btn-success "<?=$disabled?>
                                        name="add" value="حفظ">
                                                    <span class="btn-label"><i
                                                                class="fa fa-floppy-o"></i></span>حفظ
                                    والانتقال الي الشاشه الاخري
                                </button>
                                <?=$text?>
                            </div>
                        </div>
                    </div>
                  
                    <?php echo form_close() ?>
                </div>
                <div role="tabpanel" class="tab-pane fade in <?= $class4 ?>" id="skills-details">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'skills-details', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
                    <div class="col-xs-12 no-padding">
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   رقم الصك </label>
                        <input type="text" id="sak_rkm" name="sak_rkm" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['sak_rkm'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   جهه الاصدار </label>
                        <input type="text" id="esdar_sak" name="esdar_sak" class="form-control  "
                        value="<?php if(isset($record)) echo $record['esdar_sak'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> تاريخ   الإصدار  </label>
                        <input type="date" id="esdar_sak_date" name="esdar_sak_date" class="form-control  "
                        value="<?php if(isset($record)) echo $record['esdar_sak_date'] ?>" data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">    مكان الإصدار  </label>
                        <input type="text" id="esdar_sak_place" name="esdar_sak_place" class="form-control  "
                        value="<?php if(isset($record)) echo $record['esdar_sak_place'] ?>" data-validation="required">
                    </div>
                    </div>
               
                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer">
                            <div class="text-center">
                                <?php if (isset( $record) &&  $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    $disabled="";
                                    $text="";
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('skills-details');";
                                else: $input_name1 = 'add';
                                $disabled="disabled";
                                $onclick ="save_mother('skills-details')";
                                $text=" <span style='color:red;'> لا يمكن حفظ طلبك قبل ملئ بيانات العقد</span> ";
                                    $input_name2 = 'add_save'; endif; ?>
                                <button type="button" onclick="<?=$onclick?>"
                                        id="buttons" class="btn btn-labeled btn-success "<?=$disabled?>
                                        name="add" value="حفظ">
                                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    والانتقال الي الشاشه الاخري
                                </button>
                                <?=$text?>
                            </div>
                        </div>
                    </div>
                    
                    <?php echo form_close() ?>
                </div>
                <div role="tabpanel" class="tab-pane fade in <?= $class5 ?>" id="house-details">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'house-details', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
                    
                  
                    <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
                  <!--  -->
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">    العنوان الوطني  </label>
                        <input type="text" id="3akar_address" name="3akar_address" class="form-control  "
                        value="<?php if(isset($record)) echo $record['3akar_address'] ?>"  data-validation="required">
                    </div>
                    <!-- نوع بناء العقار  -->
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label ">   نوع بناء العقار  </label>
                    <select name="3akar_bnaa_type" id="3akar_bnaa_type" class="form-control " data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if(isset($type_house) && $type_house != null) {
                            foreach ($type_house as $value) {
                                $select = '';
                                if(isset($record) && $record['aakar_bnaa_type'] == $value->id_setting) {
                                    $select = 'selected';
                                }
                        ?>
                        <option value="<?=$value->id?>" <?=$select?>><?=$value->title?></option>
                        <?
                            }
                        }
                        ?>
                    </select>
                    </div>

                     <!-- نوع بناء العقار  -->
                     <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label ">   نوع إستخدام العقار  </label>
                    <select name="3akar_use_type" id="3akar_use_type" class="form-control " data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if(isset($type_use_house) && $type_use_house != null) {
                            foreach ($type_use_house as $value) {
                                $select = '';
                                if(isset($record) && $record['aakar_use_type'] == $value->id_setting) {
                                    $select = 'selected';
                                }
                        ?>
                        <option value="<?=$value->id?>" <?=$select?>><?=$value->title?></option>
                        <?
                            }
                        }
                        ?>
                    </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> عدد الأدوار </label>
                        <input type="text" id="num_adoar" name="num_adoar" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['num_adoar'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> عدد الوحدات  </label>
                        <input type="text" id="num_whda" name="num_whda" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['num_whda'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   عدد المصاعد   </label>
                        <input type="text" id="num_msad" name="num_msad" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['num_msad'] ?>" data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> عدد المواقف   </label>
                        <input type="text" id="num_mo2f" name="num_mo2f" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['num_mo2f'] ?>"  data-validation="required">
                    </div>
	
                    <!--  -->
                    </div>
              
                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer" >
                            <div class="text-center">
                                <?php if (isset( $record) &&  $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    $disabled="";
                                    $text="";
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('house-details');";
                                else: $input_name1 = 'add';
                                $disabled="disabled";
                                $onclick ="save_mother('house-details')";
                                $text=" <span style='color:red;'> لا يمكن حفظ طلبك قبل ملئ بيانات العقد</span> ";
                                    $input_name2 = 'add_save'; endif; ?>
                                <button type="button" onclick="<?=$onclick?>" id="buttons"
                                        class="btn btn-labeled btn-success "<?=$disabled?>
                                        name="add" value="حفظ">
                                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    والانتقال الي الشاشه الاخري
                                </button>
                                <?=$text?>
                            </div>
                        </div>
                    </div>
                  
                    <?php echo form_close() ?>
                </div>
                <!-- yara -->
                <div role="tabpanel" class="tab-pane fade in <?= $class6 ?>" id="items-details">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'items-details', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
                    
                    <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
                  <!--  -->
                  <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label ">   نوع  الوحده  </label>
                    <select name="no3_whda" id="no3_whda" class="form-control " data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if(isset($type_whda) && $type_whda != null) {
                            foreach ($type_whda as $value) {
                                $select = '';
                                if(isset($record) && $record['no3_whda'] == $value->id) {
                                    $select = 'selected';
                                }
                        ?>
                        <option value="<?=$value->id?>" <?=$select?>><?=$value->title?></option>
                        <?
                            }
                        }
                        ?>
                    </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  رقم الوحده </label>
                        <input type="text" id="rkm_whda" name="rkm_whda" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['rkm_whda'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  مؤثثة </label>
                        <input type="text" id="moses_name" name="moses_name" class="form-control  "
                        value="<?php if(isset($record)) echo $record['moses_name'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  رقم الدور </label>
                        <input type="text" id="rkm_door" name="rkm_door" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['rkm_door'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label ">     حالة التأثيث </label>
                    <select name=moses_status"" id="moses_status" class="form-control " data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if(isset($hala_t2ses) && $hala_t2ses != null) {
                            foreach ($hala_t2ses as $value) {
                                $select = '';
                                if(isset($record) && $record['moses_status'] == $value->id) {
                                    $select = 'selected';
                                }
                        ?>
                        <option value="<?=$value->id?>" <?=$select?>><?=$value->title?></option>
                        <?
                            }
                        }
                        ?>
                    </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  خزائن مطبخ  مركبة </label>
                        <input type="text" id="kitchen_parts" name="kitchen_parts" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['kitchen_parts'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> نوع الغرفة</label>
                        <input type="text" id="room_type" name="room_type" class="form-control  "
                        value="<?php if(isset($record)) echo $record['room_type'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">العدد</label>
                        <input type="text" id="room_num" name="room_num" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['room_num'] ?>"  data-validation="required">
                    </div>

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> نوع التكييف</label>
                        <input type="text" id="takeef_type" name="takeef_type" class="form-control  "
                        value="<?php if(isset($record)) echo $record['takeef_type'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">العدد</label>
                        <input type="text" id="takeef_num" name="takeef_num" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['takeef_num'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  رقم عداد الكهرباء</label>
                        <input type="text" id="electric_num" name="electric_num" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['electric_num'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">القراءة الحالية</label>
                        <input type="text" id="electric_read" name="electric_read" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['electric_read'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  رقم عداد المياه</label>
                        <input type="text" id="water_num" name="water_num" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['water_num'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">القراءة الحالية</label>
                        <input type="text" id="water_read" name="water_read" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['water_read'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  رقم عداد الغاز</label>
                        <input type="text" id="gas_num" name="gas_num" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['gas_num'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">القراءة الحالية</label>
                        <input type="text" id="gas_read" name="gas_read" class="form-control  " onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['gas_read'] ?>"  data-validation="required">
                    </div>
                    
                    
                    
              <!--  -->
              </div>
                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer" >
                            <div class="text-center">
                                <?php if (isset( $record) &&  $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    $disabled="";
                                    $text="";
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('items-details');";
                                else: $input_name1 = 'add';
                                $disabled="disabled";
                                $onclick ="save_mother('items-details')";
                                $text=" <span style='color:red;'> لا يمكن حفظ طلبك قبل ملئ بيانات العقد</span> ";
                                    $input_name2 = 'add_save'; endif; ?>
                                <button type="button" onclick="<?=$onclick?>" id="buttons"
                                        class="btn btn-labeled btn-success "<?=$disabled?>
                                        name="add" value="حفظ">
                                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    والانتقال الي الشاشه الاخري
                                </button>
                                <?=$text?>
                            </div>
                        </div>
                    </div>
                  
                    <?php echo form_close() ?>
                </div>
                <!-- yara -->
 <!-- yara -->
 <div role="tabpanel" class="tab-pane fade in <?= $class7 ?>" id="Sublease">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'Sublease', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
                    
                  

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   التأجير من الباطن</label>
                        <select name="rent_from_baten"
                                class=" form-control "
                                data-show-subtext="true" data-live-search="true"
                        
                                aria-required="true">
                            <option value="">اختر</option>
                            <?php 
                            $arr = array('', 'يحق ', 'لا يحق');
                            for ($r = 1; $r < sizeof($arr); $r++) {
                                $selected = '';
                                if ($r ==  $record['rent_from_baten']) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr[$r]; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
              
                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer" >
                            <div class="text-center">
                                <?php if (isset( $record) &&  $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    $disabled="";
                                    $text="  ";
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('Sublease');";
                                else: $input_name1 = 'add';
                                $disabled="disabled";
                                $onclick ="save_mother('Sublease')";
                                $text=" <span style='color:red;'> لا يمكن حفظ طلبك قبل ملئ بيانات العقد</span> ";
                                    $input_name2 = 'add_save'; endif; ?>
                                <button type="button" onclick="<?=$onclick?>" id="buttons"
                                        class="btn btn-labeled btn-success "<?=$disabled?>

                                        name="add" value="حفظ">
                                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    والانتقال الي الشاشه الاخري
                                </button>
                                <?=$text?>
                            </div>
                        </div>
                    </div>
                  
                    <?php echo form_close() ?>
                </div>
                <!-- yara -->
                <!-- yara -->
                <div role="tabpanel" class="tab-pane fade in <?= $class8 ?>" id="money_details">
                    <?php echo form_open_multipart('osr/service_orders/add_rent', array('id' => 'money_details', 'class' => 'mother_form')); ?>
                    <input type="hidden" name="add" value="حفظ">
                    
                    <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
                  <!--  -->
                  <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   اجره السعي(لا يدخل ضمن القيمة الإجمالية لعقد الإيجار)</label>
                        <input type="text" id="sa3y_ogra" name="sa3y_ogra" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['sa3y_ogra'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  مبلغ الضمان(لا يدخل ضمن القيمة الإجمالية لعقد الإيجار) </label>
                        <input type="text" id="daman_value" name="daman_value" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['daman_value'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  الأجرة  الشهرية للكهرباء</label>
                        <input type="text" id="electric_month_value" name="electric_month_value" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['electric_month_value'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   الأجرة  الشهرية للغاز </label>
                        <input type="text" id="gas_month_value" name="gas_month_value" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['gas_month_value'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   الأجرة  الشهرية للمياه </label>
                        <input type="text" id="water_month_value" name="water_month_value" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['water_month_value'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   الأجرة  الشهرية للمواقف </label>
                        <input type="text" id="mawkf_month_value" name="mawkf_month_value" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['mawkf_month_value'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">   الأجرة  الشهرية للإيجار </label>
                        <input type="text" id="rent_month_value" name="rent_month_value" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['rent_month_value'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">  عدد المواقف المستأجرة </label>
                        <input type="text" id="num_mawkf_rent" name="num_mawkf_rent" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['num_mawkf_rent'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">    دفعه الإيجار  الدوريه  </label>
                        <input type="text" id="rent_dawrey" name="rent_dawrey" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['rent_dawrey'] ?>"  data-validation="required">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">       دوره سداد الإيجار  </label>
                        <input type="text" id="dawret_rent_sadad" name="dawret_rent_sadad" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['dawret_rent_sadad'] ?>"  data-validation="required">
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">    دفعه الإيجار  الاخيرة  </label>
                        <input type="text" id="last_rent_value" name="last_rent_value" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['last_rent_value'] ?>"data-validation="required">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">    عدد دفعات الإيجار  </label>
                        <input type="text" id="num_rent_df2at" name="num_rent_df2at" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['num_rent_df2at'] ?>"  data-validation="required">
                    </div>

                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label ">      إجمالي قيمة العقد  </label>
                        <input type="text" id="total_value_aked" name="total_value_aked" class="form-control  "onkeypress="return isNumberKey(event)"
                        value="<?php if(isset($record)) echo $record['total_value_aked'] ?>"  data-validation="required">
                    </div>
                    
                    <!--  -->
                    </div>
              
                    <div class="col-xs-12 no-padding" style="padding: 10px;">
                        <div class="panel-footer" >
                            <div class="text-center">
                                <?php if (isset( $record) &&  $record != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    $disabled="";
                                    $text="";
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
                                    $onclick = "update_family_zwag('money_details');";
                                else: $input_name1 = 'add';
                                $disabled="disabled";
                                $text=" <span style='color:red;'> لا يمكن حفظ طلبك قبل ملئ بيانات العقد</span> ";
                                $onclick ="save_mother('money_details')";
                               
                                    $input_name2 = 'add_save'; endif; ?>
                                <button type="button" onclick="<?=$onclick?>" id="buttons"
                                        class="btn btn-labeled btn-success "<?=$disabled?>

                                        name="add" value="حفظ">
                                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                  
                                </button>
                                <?=$text?>
                            </div>
                        </div>
                    </div>
                  
                    <?php echo form_close() ?>
                </div>
                <!-- yara -->
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
<div id="show_details">
<div class="col-sm-12 col-md-12 col-xs-12 " >
    <div class="panel panel-info">
        <div class="panel-heading panel-title">
طلبات  ايجارات المنازل
        </div>

        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <?php
                if (isset($records) && $records != null) {
                  
                   
                    // $files = array('بطاقة العائلة '=>'family_card','عقد النكاح  '=>'identity_img','صورة الهوية  '=>'marriage_contract','الصورة الشخصية  '=>'personal_picture','عقد القاعة '=>'hall_contract','تعريف بالراتب '=>'salary_definition','تزكية الامام  '=>'imam_recommendation');
                    $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                    $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

                    ?>

                    <table id="" class="example display table table-bordered responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الطلب</th>
                            <th>رقم سجل العقد الأساس</th>
                            <th> رقم سجل العقد</th>
                            <th> نوع العقد</th>
                            <th> تاريخ إبرام العقد</th>
                            <th> مكان إبرام العقد</th>
                            
                            <th>تاريخ بداية مدة الايجار</th>
                            <th> تاريخ نهايه مدة الايجار</th>
                           
                            <th>حالة الطلب </th>
                            
                            <th>التفاصيل</th>
                            <th>الإجراء</th>
                            <!-- <th>الطباعه</th> -->
                        </tr>
                        </thead>
                        </tr>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($records as $value) {
                            ?>
                            <tr>
                                <td><?= ($x++) ?></td>
                                <td><?= $value->talb_rkm ?></td>
                                <td><?= $value->sgl_rkm_asas ?></td>
                                <td><?= $value->sgl_rkm ?></td>


                                <td><?php if($value->no3_3akd==1){echo 'جديد';}elseif($value->no3_3akd==2){echo 'مجدد';}  ?></td>

                                <td><?= $value->aakd_date ?></td>
                                <td><?= $value->aakd_place ?></td>

                                <td><?= $value->start_rent_date ?></td>
                                <td><?= $value->end_rent_date ?></td>


                                
                                <td><span style="font-size: medium" class="badge badge-<?php if (key_exists($value->suspend, $suspend_class)) {
                                        echo $suspend_class[$value->suspend];
                                    } else {
                                        echo "Dark";
                                    } ?>"><?php if (key_exists($value->suspend, $suspend_title)) {
                                            echo $suspend_title[$value->suspend];
                                        } else {
                                            echo "غير محدد";
                                        } ?></span></td>

                                
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                     onclick="get_order_details(<?= $value->id ?>)"       data-target="#myModal"><span class="fa fa-list"></span>
                                        التفاصيل
                                    </button>
                                </td>
                                <td>
                                    <?php if ($value->suspend == 0) { ?>
                                        <a onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                editMarriageOrders(<?= $value->id ?>);
                                                });'>
                                            <i class="fa fa-pencil"> </i></a>
                                        <a onclick="delete_marrage(<?= $value->id?>)" >
                                            <i class="fa fa-trash"> </i></a>

                                    <?php } else { ?>
                                        <span style="font-size: medium" class=" badge badge-info">لا يمكن التعديل او الحذف</span>
                                    <?php } ?>
                                </td>

                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                    
                        <?
                    
                } else {
                    echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>

</div>

<div class="modal" id="myModal" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document" style="width: 90%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تفاصيل </h4>
                                    </div>
                                    <br>
                                    <div id="details_div" class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                       


                                    </div>
                                    <div class="modal-footer" style="border-top: 0;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
</div>

<script>
                function save_mother(div_id) {
                    var tabs = ['main-detailsa', 'contact-details', 'health-details', 'education-details', 'skills-details', ' house-details','items-details','Sublease','money_details'];

                    function checkAdult(tab) {
                        return tab == div_id;
                    }

                    var tab_index = tabs.findIndex(checkAdult);
                    console.warn('tab_index :: ' + tab_index);
                    var all_inputs = $(' #' + div_id + ' [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/service_orders/Rent_orders/add_rent',
                        data: $('.mother_form').serialize(),
                        cache: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم اضافة  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                  var all_inputs_set = $('.mother_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                  
                    
                });
                get_details();
                   get_add();
                            // if (tab_index <= 8) {
                            //     if (tab_index == 8) {
                            //         console.warn('show_tab :: ' + tabs[0]);
                            //         show_tab(tabs[0]);
                            //     } else {
                            //         console.warn('show_tab :: ' + tabs[(tab_index + 1)]);
                            //         show_tab(tabs[(tab_index + 1)]);
                            //     }
                            // }
                        }
                    });
                }
            </script>

<script>
    function get_details() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/service_orders/Rent_orders/load_details",

            beforeSend: function () {
                $('#show_details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_details').html(d);

            }

        });
    }
</script>





<script>
                function update_family_zwag(div_id) {
                    var tabs = ['main-detailsa', 'contact-details', 'health-details', 'education-details', 'skills-details', ' house-details','items-details','Sublease','money_details'];

                    function checkAdult(tab) {
                        return tab == div_id;
                    }

                    var tab_index = tabs.findIndex(checkAdult);
                    console.warn('tab_index :: ' + tab_index);
                    var all_inputs = $(' #' + div_id + ' [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/service_orders/Rent_orders/edite',
                        data: $('.mother_form').serialize(),
                        cache: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم التعديل  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                
                            if (tab_index <= 8) {
                                if (tab_index == 8) {
                                    // console.warn('show_tab :: ' + tabs[0]);
                                    // show_tab(tabs[0]);
                                    var all_inputs_set = $('.mother_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                  
                    
                });
                get_details();
                $('#show_details').show();
                get_add();
                                } else {
                                    console.warn('show_tab :: ' + tabs[(tab_index + 1)]);
                                    show_tab(tabs[(tab_index + 1)]);
                                }
                            }
                        }
                    });
                }
            </script>

<script>
    function editMarriageOrders(id) {
        // $('#pop_rkm').text(rkm);
        $('#show_details').hide();
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>osr/service_orders/Rent_orders/editMarriageOrders",

            beforeSend: function () {
                $('#show_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_edite').html(d);


            }

        });
    }
</script>

<script>
    function get_add() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/service_orders/Rent_orders/get_add",


            success: function (d) {
                $('#show_edite').html(d);

            }

        });
    }
</script>

<script>


    function delete_marrage(id) {
        swal({
                title: "هل انت متاكد من الحذف?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/service_orders/Rent_orders/delete_egar',
                        data: {id: id},
                        dataType: 'html',
                        cache: false,
                        beforeSend: function () {
                            swal({
                                title: "جاري الحذف ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (html) {
                            //   alert(html);

                            // $('#Modal_esdar').modal('hide');

                            swal({
                                    title: "تم الحذف!",


                                }
                            );
                            get_details();
                            get_add();

                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });


    }
</script>



<script>
    function get_order_details(id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/service_orders/Rent_orders/get_order_details",
            data:{id:id},

            success: function (d) {
                $('#details_div').html(d);

            }

        });
    }
</script>