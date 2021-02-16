<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
	.no-margin {margin: 0;}
</style>

<?php 
if($this->uri->segment(6) == ""){
    echo form_open_multipart('human_resources/tataw3/contracts/Contracts/new_contract'); 
  
    $action="حفظ";
}
else{
	echo form_open_multipart('human_resources/tataw3/contracts/Contracts/edit_contract/'.$this->uri->segment(6)); 
    $action="تعديل";
	
}
?>
<div class="col-sm-12 col-md-12 col-xs-12 padding-4">
	<div class="col-sm-2 col-md-2 col-xs-2">
		<button type="button" class="btn btn-success w-md m-b-5 " onclick="window.location.href = '<?=base_url()?>human_resources/tataw3/contracts/Contracts';"><i class="fa fa-reply"></i> رجوع  </button>
	</div>
</div>

<div class="col-sm-12 col-md-12 col-xs-12 padding-4">
	<br>
    <div class="top-line"></div>
	<div class="col-md-12 fadeInUp wow">
	    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
		    <div class="panel-heading">
	            <div class="panel-title">
	              	<h4><?=$title?></h4>
	            </div>
	        </div>
		    
			<div class="panel-body">
				<div class="form-group col-sm-12 col-xs-12 padding-4">

				<div class="form-group col-sm-2 col-xs-12 padding-4 ">
                    <label class="label ">مسمي الفرصة التطوعية</label>
                    <select id="forsa_id_fk" name="forsa_id_fk"  
                            class="form-control selectpicker" data-validation="required"
							onchange="get_details();get_mot3en();"
                            data-show-subtext="true" data-live-search="true">
                            <option value="">اختر</option>
                        <?php
                        if (isset($foras) && (!empty($foras))) {
                            foreach ($foras as $key) {
                                $select = '';
                                if (isset($volunteer['forsa_id_fk']) && (!empty($volunteer['forsa_id_fk']))) {
                                    if ($key->id== $volunteer['forsa_id_fk']) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->forsa_name; ?></option>
                            <?php }
                        } ?>
                    </select>                    
                </div>
				<div class="form-group col-sm-3 col-xs-12 padding-4">
				      	<label class="label"> طبيعية الفرصة التطوعية</label>
				      	<input type="text" name="tabe3a_forsa" id="tabe3a_forsa" readonly value="<?php if(isset($volunteer)) echo $volunteer['tabe3a_forsa'] ?>"  class="form-control " data-validation="required">
				    </div>
				    <div class="form-group col-sm-3 col-xs-12 padding-4">
				      	<label class="label"> الإسم</label>
						  <div id="motatw3">
						  
						  <select id="motatw3_id_fk" name="motatw3_id_fk"   onchange="get_moto3();"
                            class="form-control selectpicker" data-validation="required"
                            data-show-subtext="true" data-live-search="true">
                            <option value="">اختر</option>
							<?php 
						  if (isset($volunteer['motatw3_id_fk']) && (!empty($volunteer['motatw3_id_fk']))) {
							if ($volunteer['motatw3_id_fk']!=0) {
							?>
								<option selected value="<?=$volunteer['motatw3_id_fk']?>-<?=$volunteer['motatw3_name']?>"><?=$volunteer['motatw3_name']?></option>
							<?php }
						}?>


                             
							</select>
						
							</div>
							
				    </div>

				    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label"> رقم الهوية</label>
				      	<input type="number" name="card_num" readonly id="card_num" value="<?php if(isset($volunteer)) echo $volunteer['card_num'] ?>"  class="form-control " data-validation="required" onkeyup="return checkUnique($(this).val())">
				      	<span id="checkUnique" style="color: #a94442"></span>
				    </div>
					<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">  رقم الجوال</label>
				      	<input type="number" name="jwal" id="jwal" readonly value="<?php if(isset($volunteer)) echo $volunteer['jwal'] ?>"  class="form-control " data-validation="required" onkeyup="return checkUnique($(this).val())">
				      	<span id="checkUnique" style="color: #a94442"></span>
				    </div>

					</div>

					<div class="form-group col-sm-12 col-xs-12 padding-4">
				    <div class="form-group col-sm-3 col-xs-12 padding-4">
				      	<label class="label"> البريد الإلكتروني</label>
				      	<input type="email" name="email" id="email" readonly value="<?php if(isset($volunteer)) echo $volunteer['email'] ?>"  class="form-control " data-validation="required">
				    </div>


					<div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label"> المهمة الاساسية</label>
				      	<input type="text" name="mohma" value="<?php if(isset($volunteer)) echo $volunteer['mohma'] ?>"  class="form-control " data-validation="required">
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
				<div class="form-group col-sm-2 col-xs-12 padding-4 ">
                    <label class="label ">   مدير التطوع</label>
                    <select id="moder_tatw3_emp_code" name="moder_tatw3_emp_code"  
                            class="form-control selectpicker" data-validation="required"
                            data-show-subtext="true" data-live-search="true">
                            <option value="">اختر</option>
                        <?php
                        if (isset($employees) && (!empty($employees))) {
                            foreach ($employees as $key) {
                                $select = '';
                                if (isset($volunteer['moder_tatw3_emp_code']) && (!empty($volunteer['moder_tatw3_emp_code']))) {
                                    if ($key->emp_code==$volunteer['moder_tatw3_emp_code']) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->emp_code; ?>-<?php echo $key->employee; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>
                            <?php }
                        } ?>
                    </select>                    
                </div>
				
				<div class="form-group col-sm-12 col-xs-12 padding-4">
				<div class="form-group col-sm-3 col-xs-12 padding-4 ">
                    <label class="label ">  المدير المباشر</label>
                    <select id="moder_mobashr_emp_code" name="moder_mobashr_emp_code"  
                            class="form-control selectpicker" data-validation="required"
                            data-show-subtext="true" data-live-search="true">
                            <option value="">اختر</option>
                        <?php
                        if (isset($employees) && (!empty($employees))) {
                            foreach ($employees as $key) {
                                $select = '';
                                if (isset($volunteer['moder_mobashr_emp_code']) && (!empty($volunteer['moder_mobashr_emp_code']))) {
                                    if ($key->emp_code== $volunteer['moder_mobashr_emp_code']) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->emp_code; ?>-<?php echo $key->employee; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>
                            <?php }
                        } ?>
                    </select>                    
                </div>
				<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">   المكان</label>
				      	<input type="text" name="mkan" value="<?php if(isset($volunteer)) echo $volunteer['mkan']; ?>"  class=" form-control " data-validation="required" autocomplete="off">
				    </div>

					<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">   المدينة</label>
				      	<input type="text" name="madina" value="<?php if(isset($volunteer)) echo $volunteer['madina']; ?>"  class=" form-control " data-validation="required" autocomplete="off">
				    </div>


				<div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">  بداية العقد</label>
				      	<input type="date" name="from_date" value="<?php if(isset($volunteer)) echo $volunteer['from_date']; else echo date('Y-m-d'); ?>"  class=" form-control " data-validation="required" autocomplete="off">
				    </div>
					

				    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label">  نهاية العقد</label>
				      	<input type="date" name="to_date" value="<?php if(isset($volunteer)) echo $volunteer['to_date']; else echo date('Y-m-d'); ?>"  class=" form-control " data-validation="required" autocomplete="off">
				    </div>


					<div class="form-group col-sm-1 col-xs-12 padding-4">
				      	<label class="label"> المده</label>
				      	<input type="number" name="moda" value="<?php if(isset($volunteer)) echo $volunteer['moda'] ?>"  class="form-control " data-validation="required" autocomplete="off">
				    </div>

					<div class="form-group col-sm-1 col-xs-12 padding-4">
				      	<label class="label"> عدد الساعات</label>
				      	<input type="number" name="num_hours" value="<?php if(isset($volunteer)) echo $volunteer['num_hours'] ?>"  class="form-control " data-validation="required" autocomplete="off">
				    </div>
				</div>

			    <!-- <div class="form-group col-sm-12 col-xs-12 padding-4">
		            <button type="submit" name="add" value="حفظ" class="btn btn-labeled btn-success " ><span><i class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></i></span> حفظ </button>
				</div> -->

				<div class="form-group col-md-12 text-center">

        <button type="submit" class="btn btn-labeled btn-success " name="add" value="حفظ">

            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span><?=$action?>

        </button>



    </div>
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
            url: '<?php echo base_url() ?>human_resources/tataw3/contracts/Contracts/get_detalis',
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
                url: "<?php echo base_url();?>human_resources/tataw3/contracts/Contracts/get_mot3en",
                data: dataString,
              
                success: function (d) {

                    $('#motatw3').html(d);

                }
            });
			}
        }
    </script>
	

    <script>
    function get_moto3() {

        var dataString = "motatw3_id_fk=" + $("#motatw3_id_fk").val();
		if(motatw3_id_fk!='' && motatw3_id_fk!=0)
			{
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/tataw3/contracts/Contracts/get_moto3',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (data) {
				var obj = JSON.parse(data);
                $('#card_num').val(obj.id_card);
				$('#jwal').val(obj.mobile);
				$('#email').val(obj.email);

            }
        });
			}
    }
</script>

