

<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
	.no-margin {margin: 0;}
	.check-style{
		display:inline-block;
		margin: 0 10px;
	}
	.check-style input[type=checkbox] + label {
		line-height: 20px;
	}
	.check-style input[type=checkbox] + label:before{
		margin-left:10px;
	}
</style>
<?php 
$dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
$period = array('الصباح','المساء');
$answer = array(1=>'نعم',2=>'لا');
$required1 = '';
$readonly1 = 'readonly';
$required2 = '';
$readonly2 = 'readonly';
$disabled = 'disabled';

if($this->uri->segment(4) == ""){
    $disabled_f2a = '';
    $action='حفظ';
	echo form_open_multipart('tataw3/Tataw3_c/new_motato3'); 
}
else{
	echo form_open_multipart('tataw3/Tataw3_c/edit_volunteer/'.$this->uri->segment(4)); 
    $disabled = '';
    $action='تعديل';
    $disabled_f2a = 'disabled';
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

<div class="roundedBox">
            <div class="col-xs-12 no-padding">
                <div class="stepwizard itab-2">

                    <div class="stepwizard-row setup-panel" data-active="1">
                        <div class="tab tab-1 stepwizard-step col-xs-4 no-padding active">
                            <a href="#step-1" type="button" class="btn obj-tablink btn-default btn-warning"> <span><i class="fa fa-home"></i> البيانات الشخصيه <b class="badge">1</b></span></a>

                        </div>
                        <div class="tab tab-2 stepwizard-step col-xs-4 no-padding">
                            <a href="#step-2" type="button" class="btn btn-default obj-tablink"> <span><i class="fa fa-male"></i>   المجالات واسباب التطوع <b class="badge">2</b></span></a>

                        </div>
                        <div class="tab tab-3 stepwizard-step col-xs-4 no-padding">
                            <a href="#step-3" type="button" class="btn btn-default obj-tablink"> <span><i class="fa fa-paperclip"></i>  فترات العمل التطوعي <b class="badge">3</b></span></a>

                        </div>


                    </div>
                </div>

                <div class="setup-container">


                    <div class="setup-content" id="step-1" style="display: block;  ">
                    <br>
				<div class="setup-head col-md-12 no-padding" style="    height: 460px;">
                <div class="form-group col-sm-12 col-xs-12">
				
                   <div class="form-group col-sm-4 col-xs-12  padding-4" style="    float: left;
    margin-left: 323px;">
			   	 <label class="label">فئه الطلب</label>
					<div class="form-group">
						<?php if(isset($volunteer)&&!empty($volunteer['f2a_talab']&&$volunteer['f2a_talab']==1)) {?>
                        <div class="radio-content">
							<input type="radio" id="esnad1" name="esnad_to" <?=$disabled_f2a?> <?php if(isset($volunteer)&&!empty($volunteer['f2a_talab']&&$volunteer['f2a_talab']==1)) {echo 'checked'; }else{ echo 'checked';} ?>  class="f2a_types" value="1" onclick="load_tahwel()">
							<label for="esnad1" class="radio-label"> فرد</label>
						</div>
                        <?php }elseif(isset($volunteer)&&!empty($volunteer['f2a_talab']&&$volunteer['f2a_talab']==2)){?>
						<div class="radio-content">
							<input type="radio"  id="esnad2" name="esnad_to" <?=$disabled_f2a?> <?php if(isset($volunteer)&&!empty($volunteer['f2a_talab']&&$volunteer['f2a_talab']==2)) {echo 'checked'; }else{ echo '';} ?> class="f2a_types" value="2" onclick="load_tahwel()">
							<label for="esnad2" class="radio-label"> جهه</label>
						</div>
                        <?php }else{?>
                            <div class="radio-content">
							<input type="radio" id="esnad1" name="esnad_to" <?=$disabled_f2a?> <?php if(isset($volunteer)&&!empty($volunteer['f2a_talab']&&$volunteer['f2a_talab']==1)) {echo 'checked'; }else{ echo 'checked';} ?>  class="f2a_types" value="1" onclick="load_tahwel()">
							<label for="esnad1" class="radio-label"> فرد</label>
						</div> 
						<div class="radio-content">
							<input type="radio"  id="esnad2" name="esnad_to" <?=$disabled_f2a?> <?php if(isset($volunteer)&&!empty($volunteer['f2a_talab']&&$volunteer['f2a_talab']==2)) {echo 'checked'; }else{ echo '';} ?> class="f2a_types" value="2" onclick="load_tahwel()">
							<label for="esnad2" class="radio-label"> جهه</label>
						</div>
                        <?php }?>
					</div>


                    </div>
                    

				</div>   

					<div class="col-xs-12" id="tawel_result"  style="display: none; 
    margin-top: -28px;
">



					</div>
				</div>   
                        <!-----------------------------------F_members------------------------------------->


                        <div class="setup-foot col-md-12 no-padding text-center">
                            <!-- <button type="button" id="button_mem_data" class="btn btn-labeled btn-success  save-btn" disabled="" name="ADD" value="ADD">
                                        <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة فرد                             </button> -->

                            <button class="btn btn-danger previousBtn  btn-labeled" type="button"> <span class="btn-label"> <i class="fa fa-forward" aria-hidden="true"></i>
                            </span> السابق
                            </button>
                            <button style="direction: ltr;" class="btn btn-success nextBtn btn-labeled" type="button"> <span class="btn-label" style="right: auto;left: -14px;"> <i class="fa fa-backward" aria-hidden="true"></i>
                            </span> التالي
                            </button>

                            <!-- <button type="button" class="btn btn-labeled btn-warning " onclick="window.location='http://localhost/ABNAAv1/family_controllers/Family/AddNewRegister/screen-tab2'">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>
                                            انهاء
                            </button> -->
                        </div>
                                                
                    </div>

                    <div class="setup-content" id="step-2" style="display: none;">
                        <!-------------------------------F_members----------------------------------------->
                                                
                        <div class="setup-head col-md-12 no-padding" style="    height: 363px;
">
<div class="form-group row col-sm-12 col-xs-12  padding-4">
			    	<h4 class="">المجالات والبرامج المطلوب التطوع بها</h4>
			    	<?php 
			    	//echo '<pre>'; print_r($volunteer_detail_field);
			    	if(isset($fields) && $fields != null) { 
			    		foreach ($fields as $field) {
			    			$checked = '';
                            if(isset($volunteer_detail_field)&&in_array($field->id,$volunteer_detail_field)) {
                                $checked = 'checked';
                            }
			    	?>
			    	<div class="col-xs-3 check-style">
			    		<input class="check_large" type="checkbox" id="gridCheck<?=$field->id;?>" name="fields[]" value="<?=$field->id?>"  data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($fields)?>" <?=$checked?>>
						 <label class="form-check-label" for="gridCheck<?=$field->id;?>"><?=$field->title?></label>
			    	</div>
			    	<? 
			    		} 
			    	}
			    	?>
			    </div>

			    <div class="form-group row col-sm-12 col-xs-12  padding-4">
			    	<h4 class="">ما هو سبب الرغبة بالتطوع لدى الجمعية</h4>
			    	<?php 
			    	//echo '<pre>'; print_r($volunteer_detail_reason);
			    	if(isset($reasons) && $reasons != null) { 
			    		foreach ($reasons as $reason) {
			    			$checked = '';
                            if(isset($volunteer_detail_reason)&&in_array($reason->id,$volunteer_detail_reason)) {
                                $checked = 'checked';
                            }
			    	?>
			    	<div class="col-xs-3 check-style">
			    		<input class="check_large" type="checkbox" id="grid<?=$reason->id;?>" name="reasons[]" value="<?=$reason->id?>"  data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($reasons)?>" <?=$checked?>> 
						<label class="form-check-label" for="grid<?=$reason->id;?>"><?=$reason->title?></label>
			    	</div>
			    	<? 
			    		} 
			    	}
			    	?>
			    </div>
						</div>   
                        <!-----------------------------------F_members------------------------------------->


                        <div class="setup-foot col-md-12 no-padding text-center">
                            <!-- <button type="button" id="button_mem_data" class="btn btn-labeled btn-success  save-btn" disabled="" name="ADD" value="ADD">
                                        <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة فرد                             </button> -->

                            <button class="btn btn-danger previousBtn  btn-labeled" type="button"> <span class="btn-label"> <i class="fa fa-forward" aria-hidden="true"></i>
                            </span> السابق
                            </button>
                            <button style="direction: ltr;" class="btn btn-success nextBtn btn-labeled" type="button"> <span class="btn-label" style="right: auto;left: -14px;"> <i class="fa fa-backward" aria-hidden="true"></i>
                            </span> التالي
                            </button>

                            <!-- <button type="button" class="btn btn-labeled btn-warning " onclick="window.location='http://localhost/ABNAAv1/family_controllers/Family/AddNewRegister/screen-tab2'">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>
                                            انهاء
                            </button> -->
                        </div>

                        
                    </div>



                    <div class="setup-content" id="step-3" style="display: none;">

                      <br>
                        <!-----------------------------------attachs------------------------------------->

                        <div class="setup-head col-md-12 no-padding  padding-4" style="    height: 363px;
">
<div class="form-group  col-sm-12 col-xs-12">
			    	<h4 class="">الأيام والفترات التي أستطيع أن أتطوع بها</h4>
			    </div>

			    <div class="col-md-12 ">
					<div class="col-xs-2  padding-4" >
                    	<label class="label "> الأيام</label>
                    </div>
	               
				    	<?php 
						$allDayes = array();
						
				    	if(isset($volunteer)) {
				    		$allDayes = unserialize($volunteer['dayes']);
				    	}
				    	foreach ($dayes as $key => $value) { 
				    		$checked = '';
                            if(in_array($key,$allDayes)) {
                                $checked = 'checked';
                            }
				    	?>

                       
                        <div class="col-xs-1 check-style">
				    	<input class="check_large" type="checkbox" id="gridcc<?=$key?>" name="dayes[]" value="<?=$key?>"  data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($dayes)?>"  <?=$checked?>>
						 <label class="form-check-label" for="gridcc<?=$key?>"><?=$value?></label>
                         </div>
						
				    	<? } ?>
                        
			    </div>

			    <div class="col-md-12 ">
					<div class="col-xs-2  padding-4">
                    	<label class="label "> الفترات</label>
                    </div>
	              
				    	<?php 
				    	$allPeriods = array();
				    	if(isset($volunteer)) {
				    		$allPeriods = unserialize($volunteer['period']);
				    	}
				    	foreach ($period as $key => $value) { 
				    		$checked = '';
                            if(in_array($key,$allPeriods)) {
                                $checked = 'checked';
                            }
				    	?>
				    	
						<div class="col-xs-4 check-style">
				    	<input class="check_large" type="checkbox" id="gridcv<?=$key?>" name="period[]" value="<?=$key?>"  data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($period)?>" <?=$checked?>>
						 <label class="form-check-label" for="gridcv<?=$key?>"><?=$value?></label>
				    
                         </div> 
						<? } ?>
                     
				    </div>
                     
                        </div>



                        <div class="setup-foot col-md-12 no-padding text-center">

                            <button class="btn btn-danger previousBtn  btn-labeled" type="button"> <span class="btn-label"> <i class="fa fa-forward" aria-hidden="true"></i>
                            </span> السابق
                            </button>
                            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5" <?=$disabled?>><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$action?> </button>
                            <!--<button type="submit" id="button" class="btn btn-labeled btn-success " name="ADD" value="ADD">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>إضافة فرد                             </button>-->


                        </div>


                    </div>


                    <!------------------------------------------------------------->
                </div>
            </div>
        </div>

</form>







        <div class="modal fade" id="my_load_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="width: 70%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="my_load_popLabel"></h4>
                            </div>
                            <div class="modal-body">

                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-12 form-group">
                                        <div class="col-sm-3  col-md-3 padding-4 ">

                                            <button type="button" class="btn btn-labeled btn-success "
                                                onclick="$('#geha_input').show();"
                                                style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                                <span class="btn-label" id="span_id"><i
                                                        class="glyphicon glyphicon-plus"></i></span>

                                            </button>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 no-padding form-group">

                                        <div id="geha_input" style="display: none">
                                            <div class="col-sm-3  col-md-5 padding-2 ">
                                                <label class="label" id="input_label"> </label>
                                                <input type="text" name="input_name" id="input_name" data-validation="required"
                                                    value="" class="form-control ">
                                                <input type="hidden" class="form-control" id="input_id" value="">
                                                <input type="hidden" class="form-control" id="input_num" value="">
                                                <input type="hidden" class="form-control" id="type" value="">


                                            </div>


                                            <div class="col-sm-3  col-md-2 padding-4" id="div_add">
                                                <button type="button" onclick="sumit_pop()" style=" margin-top: 27px;"
                                                    id="btn_pop" class="btn btn-labeled btn-success" name="save"
                                                    value="1">
                                                    <span class="btn-label">
                                                        <i class="glyphicon glyphicon-floppy-disk"></i>
                                                    </span>
                                                    <span id="btn_pop_span">حفظ</span>



                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                </div>

                                <div id="my_load_table"></div>
                            </div>
                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                <button type="button" class="btn btn-danger" style="float: left;"
                                    data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
</div>



<!-- modal view -->
<div class="modal fade" id="myModal-view" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">الصوره</h4>
                                            </div>
                                            <div class="modal-body">
                                           
                                           
                                              <img src="<?= base_url()?>uploads/tato3/tato3_logo/<?php if(isset($volunteer)) echo $volunteer['logo_monzma'];?>"
                                                             width="100%" alt="">
                                           
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
</div>
<!-- modal view -->
 
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

                            aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="myModalLabel"> المدينه- الحي </h4>

            </div>

            <div class="modal-body">

                <div id="myDiv"></div>

            </div>

            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" class="btn btn-danger"

                        style="float: left;" data-dismiss="modal">إغلاق

                </button>

            </div>

        </div>

    </div>

</div>


<script type="text/javascript">
	function changeReadonly(val,id) {
		var obj =document.getElementById(id);
		if(val == 1) {
			obj.readOnly = false;
			obj.setAttribute('data-validation','required');
		}
		else {
			obj.readOnly = true;
			obj.removeAttribute('data-validation');
			obj.value = '';
		}
	}

	function checkUnique(argument) {
		var dataString = 'id_card=' + argument;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Volunteers/Volunteers/checkUnique',
            data:dataString,
            cache:false,
            success: function(result){
                var obj = JSON.parse(result);
                console.log(obj);
                if(obj === null) {
                	document.getElementById('checkUnique').innerHTML = 'رقم الهوية جديد';
                	$('.btn-purple').removeAttr('disabled');
                }
                else {
                	document.getElementById('checkUnique').innerHTML = 'تم إدخال رقم الهوية من قبل';
                	$('.btn-purple').attr('disabled','disabled');
                }
            }
        });
	}

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<?php if($this->uri->segment(4)=='')
{?>
<script>
$( document ).ready(function() {
    load_tahwel();
});
    function load_tahwel() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>tataw3/Tataw3_c/load_tahwel' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#tawel_result").html(html);
            }
        });
    }
</script>
<?php }else{?>
    <script>
    $( document ).ready(function() {
    load_tahwel(<?=$this->uri->segment(4)?>);
});
    function load_tahwel(id) {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>tataw3/Tataw3_c/load_tahwel' ,
            data: {type:type,id:id},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#tawel_result").html(html);
              
            }
        });
    }
</script>

<?php }?>
<script src="<?php echo base_url(); ?>/asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        /*********/

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPreviousBtn = $('.previousBtn'),
            SaveBtn = $('.save-btn');

        allWells.hide();


        <?php $tab_show = $this->uri->segment(5, 0);
        if ($tab_show == 2) {
        ?>
        // $('a[href="#step-2"]').tab('show');

        var $target = $('#step-2'),
            $item = $('a[href="#step-2"]');

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 2);

        }

        <?php }elseif ($tab_show == 3) {
        ?>
        var $target = $('#step-3'),
            $item = $('a[href="#step-3"]');

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 3);

        }<?php }elseif ($tab_show == 1) {
        ?>
        var $target = $('#step-1'),
            $item = $('a[href="#step-1"]');

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 1);

        }
        <?php }?>






        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-warning').addClass('btn-default');
                $item.addClass('btn-warning');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='number'],input[type='password']"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');

            /*$(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }

            }*/

            if (isValid) {
                nextStepWizard.removeAttr('disabled').trigger('click');

                if (datactive < 3) {
                    datactive++;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }

            }


            //$(".stepwizard-row").append($moving_div);
        });

       
       


        allPreviousBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                previousStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');

            if (isValid) {
                previousStepWizard.removeAttr('disabled').trigger('click');

                if (datactive <= 3) {
                    datactive--;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }

            }

        });


        $(".setup-content input,.setup-content select").bind("keyup change", function (e) {

            var curStep = $(this).closest(".setup-content"),
                curInputs = curStep.find("input,input[type='text'],input[type='url'],select,input[type='number'],input[type='password']");

            if ($(this).val() != '') {
                $(this).parent().removeClass("has-error");
            } else {
                $(this).parent().addClass("has-error");
            }
        });


        $('div.setup-panel div a.btn-warning').trigger('click');
    });

</script>


<script>
    $(".itab-2").on("click mouseover mouseout", ".tab a", function (e) {
        switch (e.type) {
            case "mouseover": // -----------
                $(this).parent().addClass("hover");
                break;

            case "mouseout": // -----------
                $(this).parent().removeClass("hover");
                break;

            case "click": // -----------
                $(this).parent().addClass("active")
                    .siblings().removeClass("active");

                $(this).parent().parent().attr(
                    "data-active",
                    $(this).parent().index() + 1
                );
                break;

            default: // -----------
                break;
        }

    });


</script>
<script>

    $('.skin-square .i-check input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });

</script>
<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
          //  $(this_input).val('');
        $(this_input).setAttribute("required", "required");
       // document.getElementById("h_rent_amount").setAttribute("required", "required");
        }
       else if ($(this_input).val() == '0000000000') {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html(" الرقم مكون من اصفار");
            $(this_input).val('');
            
        //$('button[type="submit"]').attr("disabled","disabled");
        }
         else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
          // $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>