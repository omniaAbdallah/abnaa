<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
	.no-margin {margin: 0;}
</style>

<?php 
if($this->uri->segment(6) == ""){
    echo form_open_multipart('tataw3/nmazg/complaints/Complaint/new_complaint', array('class' => 'Electronic_form')); 
    echo '<input type="hidden"  name="add"  id="add" value="add">';
    $action="حفظ";
}
else{
	echo form_open_multipart('tataw3/nmazg/complaints/Complaint/edit', array('class' => 'Electronic_form')); 
    $action="تعديل";
    echo '<input type="hidden"  name="update"  id="update" value="update">';
    echo '<input type="hidden"  name="id"  id="id" value="'.$this->uri->segment(6).'">';
}
?>


<div class="col-sm-12 col-md-12 col-xs-12 padding-4">
	<br>
    <div class="top-line"></div>
	<div class="col-md-12 fadeInUp wow">
	    <div class="panel panel-default">
		    <div class="panel-heading panel-title">
	            <div class="panel-title">
	              	<h4><?=$title?></h4>
	            </div>
	        </div>
		    
			<div class="panel-body">
				<div class="form-group col-sm-12 col-xs-12 padding-4">

			
				
				    <div class="form-group col-sm-3 col-xs-12 padding-4">
				      	<label class="label"> أسم المتطوع</label>
						  <div id="motatw3">
						  
						  <select id="motatw3_id_fk" name="motatw3_id_fk"    onchange="get_moto3();forsa_data();"
                            class="form-control selectpicker" data-validation="required"
                            data-show-subtext="true" data-live-search="true">
                            
							<?php 
						  if (isset($volunteer['motatw3_id_fk']) && (!empty($volunteer['motatw3_id_fk']))) {
							if ($volunteer['motatw3_id_fk']!=0) {
							?>
								<option selected value="<?=$volunteer['motatw3_id_fk']?>-<?=$volunteer['motatw3_name']?>"><?=$volunteer['motatw3_name']?></option>
							<?php }
						}?>


                      
                            <?php
                        if (isset($mot3en) && (!empty($mot3en))) {
                            foreach ($mot3en as $key) {
                                $select = '';
                               
                                ?>
                                <option value="<?php echo $key->id; ?>-<?php echo $key->name; ?>" <?= $select ?>> <?php echo $key->name; ?></option>
                            <?php }
                        } ?>

                             
							</select>
						
							</div>
							
				    </div>

				    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">  مسمي الفرصة الوظيفية</label>
				      	<input type="text" name="forsa_name" readonly id="forsa_name" value="<?php if(isset($volunteer)) echo $volunteer['forsa_name'] ?>"  class="form-control " data-validation="required">
                          <input type="hidden" name="forsa_id_fk" readonly id="forsa_id_fk" value="<?php if(isset($volunteer)) echo $volunteer['forsa_id_fk'] ?>"  class="form-control " data-validation="required">
                          <span id="checkUnique" style="color: #a94442"></span>
				    </div>
					<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">  رقم الجوال</label>
				      	<input type="number" name="jwal" id="jwal" readonly value="<?php if(isset($volunteer)) echo $volunteer['jwal'] ?>"  class="form-control " data-validation="required" >
				      	<span id="checkUnique" style="color: #a94442"></span>
				    </div>

                    <div class="form-group col-sm-3 col-xs-12 padding-4 ">
                    <label class="label ">  القسم المتطوع بة</label>
                    <select id="qsm_id_fk" name="qsm_id_fk"  
                            class="form-control selectpicker" data-validation="required"
                            data-show-subtext="true" data-live-search="true">
                            <option value="">اختر</option>
                        <?php
                        if (isset($qsm) && (!empty($qsm))) {
                            foreach ($qsm as $key) {
                                $select = '';
                                if (isset($volunteer['qsm_id_fk']) && (!empty($volunteer['qsm_id_fk']))) {
                                    if ($key->id==$volunteer['qsm_id_fk']) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->id; ?>-<?php echo $key->name; ?>" <?= $select ?>> <?php echo $key->name; ?></option>
                            <?php }
                        } ?>
                    </select>                    
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">  تاريخ بدء التطوع</label>
				      	<input type="date" name="motatw3_date" id="motatw3_date"  value="<?php if(isset($volunteer)) echo $volunteer['motatw3_date']; else echo date('Y-m-d'); ?>"  class="form-control " data-validation="required">
				    </div>

					</div>

					<div class="form-group col-sm-12 col-xs-12 padding-4">
				   

                    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">  تاريخ  المشكلة</label>
				      	<input type="date" name="problem_date" id="problem_date"  value="<?php if(isset($volunteer)) echo $volunteer['problem_date']; else echo date('Y-m-d'); ?>"  class="form-control " data-validation="required">
				    </div>

                    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label"> نوع  الشكوي</label>
                    <?php
                                     
                                     $period = array(1=>'شكوي',2 => ' تظلم');
                 foreach ($period as $key => $value) {
                     $checked = '';
                     if ($key==1) {
                        $checked = 'checked';
                    }
                     if (isset($volunteer['complaint_type'])&&($volunteer['complaint_type']!='')) {
                         $allPeriods = $volunteer['complaint_type'];
                         if ($key==$allPeriods) {
                             $checked = 'checked';
                         }
                        
                     }
                     
                     ?>
                   
                     <div class="radio-content">

                         <input type="radio"   data-validation="required"
                                                        class="form-control"
                                                        name="complaint_type"
                                                        id="gridcv<?=$key?>"
                                                        value="<?=$key?>"
                                                        width="45px;" <?= $checked ?>
                                                       
                                                        >
                         <label   class="radio-label" for="gridcv<?= $key ?>"> <?= $value ?></label>
                     </div>
                 <? } ?>
                 </div>
					<div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label">  وصف المشكله</label>
				      	<textarea  name="problem_wasf"   class="form-control " data-validation="required">
                          <?php if(isset($volunteer)) echo $volunteer['problem_wasf'] ?>
                    </textarea>
                    
                    </div>

                    <div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label">   من يحقله الاطلاع أو التظلم</label>
                    <?php
                                     
                                     $allowed = array(1=>' مدير التطوع',2 => ' المدير المباشر',3=>'المدير التنفيذي ');
                 foreach ($allowed as $key => $value) {
                     $checked = '';
                     if ($key==1) {
                        $checked = 'checked';
                    }
                     if (isset($volunteer['who_allowed'])&&($volunteer['who_allowed']!='')) {
                         $allallowed = $volunteer['who_allowed'];
                         if ($key==$allallowed) {
                             $checked = 'checked';
                         }
                     }
                     
                     ?>
                   
                     <div class="radio-content">

                         <input type="radio"   data-validation="required"
                                                        class="form-control"
                                                        name="who_allowed"
                                                        id="grid<?= $key ?>"
                                                        value="<?= $key ?>"
                                                        width="45px;" <?= $checked ?>
                                                       
                                                        >
                         <label   class="radio-label" for="grid<?= $key ?>">             <?= $value ?>         </label>
                     </div>
                 <? } ?>
                 </div>
                    
					
                 </div>
				
				<div class="form-group col-sm-12 col-xs-12 padding-4">
				
				<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">   اخر من نظر في المشكلة</label>
				      	<input type="text" name="last_check_problem" value="<?php if(isset($volunteer)) echo $volunteer['last_check_problem']; ?>"  class=" form-control " data-validation="required" autocomplete="off">
				    </div>

					<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">   تاريخ النظر فيها</label>
				      	<input type="date" name="last_check_problem_date" value="<?php if(isset($volunteer)) echo $volunteer['last_check_problem_date']; else echo date('Y-m-d'); ?>"  class=" form-control " data-validation="required" autocomplete="off">
				    </div>


                    <div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label">   التوجية</label>
				      	<textarea  name="twgeh"   class="form-control " data-validation="required">
                          <?php if(isset($volunteer)) echo $volunteer['twgeh'] ?>
                    </textarea>
                    
                    </div>


                    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">   تنفيذ التوجية</label>
                    <?php
                                     
                                     
                                     $twgeh = array(1=>'تم',2=>'لم يتم');
                 foreach ($twgeh as $key => $value) {
                     $checked = '';
                     if ($key==1) {
                        $checked = 'checked';
                    }
                     if (isset($volunteer['tnfez_twgeh'])&&($volunteer['tnfez_twgeh']!='')) {
                         $alltwgeh = $volunteer['tnfez_twgeh'];
                         if ($key==$alltwgeh) {
                             $checked = 'checked';
                         }
                     }
                     
                     ?>
                   
                     <div class="radio-content">

                         <input type="radio"   
                         onclick="changeReadonly($(this).val(),'reason')"
                         data-validation="required"
                                                        class="form-control"
                                                        name="tnfez_twgeh"
                                                        id="gri<?= $key ?>"
                                                        value="<?= $key ?>"
                                                        width="45px;" <?= $checked ?>
                                                       
                                                        >
                         <label   class="radio-label" for="gri<?= $key ?>">             <?= $value ?>         </label>
                     </div>
                 <? } ?>
                 </div>
                 </div>
                 <div class="form-group col-sm-12 col-xs-12 padding-4">
				<div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label">   السبب</label>
				      	<input type="text" id="reason" name="reason"  readonly value="<?php if(isset($volunteer)&&!empty($volunteer['reason'])) echo $volunteer['reason']; ?>"  class=" form-control "  autocomplete="off">
				    </div>
					

                    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">   أسم من أغلق الشكوي</label>
				      	<input type="text" name="close_problem_n" value="<?php if(isset($volunteer)) echo $volunteer['close_problem_n']; ?>"  class=" form-control " data-validation="required" autocomplete="off">
				    </div>

					<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">   تاريخ  أغلاق الشكوي</label>
				      	<input type="date" name="close_problem_date" value="<?php if(isset($volunteer)) echo $volunteer['close_problem_date']; else echo date('Y-m-d'); ?>"  class=" form-control " data-validation="required" autocomplete="off">
				    </div>
                    </div>
			    <!-- <div class="form-group col-sm-12 col-xs-12 padding-4">
		            <button type="submit" name="add" value="حفظ" class="btn btn-labeled btn-success " ><span><i class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></i></span> حفظ </button>
				</div> -->

				<!-- <div class="form-group col-md-12 text-center">

        <button type="submit" class="btn btn-labeled btn-success " name="add" value="حفظ">

            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span><?=$action?>

        </button>



    </div> -->


    <?php
            if ($this->uri->segment(6) != "") {
                $action = "تعديل";
                $button = 'update';
                $onclick = "update_Electronic(" .$this->uri->segment(6) . ");";
            } else {
                $action = "حفظ";
                $button = 'add';
                $onclick = "save_Electronic();";
            } ?>
            <!-- <div class="form-group col-sm-12 col-xs-12 padd">
<?php
            if (isset($last_record) && $last_record == 1) {
                $disabled = "disabled";
                $span="<span style=\"font-size: medium;\" class=\" badge badge-danger\" id=\"span_form\">لا يمكن شكوي جديدة لان هنالك شكوي جاري </span>";

            } else {

                $disabled = "";
                $span = "";

            } ?>
    <button type="submit" name="add_electronic_card" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span>  <?= $action ?>  </button>
</div> -->


            <div class="col-xs-12 no-padding" style="padding: 10px;">
                <div class="">
                    <div class="text-center">
                        <input type="hidden" name="max" id="max"/>
                        <button type="button" id="buttons" <?= $disabled ?>
                                class="btn btn-labeled btn-success
                                            "
                                onclick="<?= $onclick ?>"
                                name="<?php echo $button; ?>"
                                value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="fa fa-floppy-o"></i></span><?= $action ?>
                        </button>
                        <?= $span ?>
                    </div>
                </div>
            </div>
            <!--  -->
			</div>
		</div>
	</div>
</div>


<script>
    function get_details() {

        var dataString = "forsa_id_fk=" + $("#forsa_id_fk").val();
		if(forsa_id_fk!='' && forsa_id_fk!=0)
			{
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>tataw3/nmazg/complaints/Complaint/get_detalis',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tabe3a_forsa").val(html);
           

            }
        });
			}
    }
</script>
<script>

        function get_mot3en() {
			var dataString = "forsa_id_fk=" + $("#forsa_id_fk").val();
			if(forsa_id_fk!='' && forsa_id_fk!=0)
			{
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>tataw3/nmazg/contracts/Contracts/get_mot3en",
                data: dataString,
              
                success: function (d) {

                    $('#motatw3').html(d);

                }
            });
			}
        }
    </script>
	
    <script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script>
      $(document).ready(function () {
        get_moto3();
        forsa_data();
        });
    function get_moto3() {

        var dataString = "motatw3_id_fk=" + $("#motatw3_id_fk").val();
		if(motatw3_id_fk!='' && motatw3_id_fk!=0)
			{
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>tataw3/nmazg/complaints/Complaint/get_moto3',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (data) {
				var obj = JSON.parse(data);
               // $('#card_num').val(obj.id_card);
				$('#jwal').val(obj.mobile);
				//$('#motatw3_date').val(obj.talb_date);

            }
        });
			}
    }
    function forsa_data() {
        var motatw3_id_fk = $('#motatw3_id_fk').val();
        var rkm_akd_id = $('#rkm_akd_id').val();
        if (motatw3_id_fk !='' && rkm_akd_id !='') {

            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>tataw3/nmazg/complaints/Complaint/forsa_data",
                data: {motatw3_id_fk: motatw3_id_fk},
                success: function (d) {
                    var json = d;
                    obj = JSON.parse(json);
                    // console.log(obj);
                    $('#forsa_id_fk').val(obj[0]['id']);
                    $('#forsa_name').val(obj[0]['forsa_name']);
                    //$('#wasf').val(obj[0]['wasf']);
                //    $('#motatw3_date').val(obj[0]['start_date']);
                    //$('#makan').val(obj[0]['makan']);
                }
            });
        }
    }
    function changeReadonly(val, id) {
        var obj = document.getElementById(id);
        if (val == 2) {
            obj.readOnly = false;
            obj.setAttribute('data-validation', 'required');
        } else if (val == 1) {
            obj.readOnly = true;
            obj.removeAttribute('data-validation');
            obj.value = '';
        }
    }
</script>


<script>
    function save_Electronic() {
        var all_inputs = $(' [data-validation="required"]');
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
        var form_data = new FormData();


        var serializedData = $('.Electronic_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>tataw3/nmazg/complaints/Complaint/new_complaint',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
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
                var all_inputs_set = $('.Electronic_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                   
                });
                if (html == 1) {

                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>


<script>

    function update_Electronic(id) {

        var all_inputs = $(' [data-validation="required"]');
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
        var form_data = new FormData();

        var serializedData = $('.Electronic_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>tataw3/nmazg/complaints/Complaint/edit',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
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
                    title: 'تم تعديل  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.Electronic_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                 //   $(elem).val('');

                  
                });
                if (html == 1) {

                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>