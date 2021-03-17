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
<div class="col-xs-12 no-padding" >
    <?php
    if (isset($volunteer) && !empty($volunteer)){
        echo form_open_multipart('human_resources/tataw3/nmazg/need_training/Need_training/update_need_training/'.$volunteer['id']);
$action="تعديل";
      
        $traning_rkm= $volunteer['traning_rkm']; 

    } else{
        echo form_open_multipart('human_resources/tataw3/nmazg/need_training/Need_training/add_need_training');
        if (!empty($last_rkm_talb)) {
            $traning_rkm = $last_rkm_talb + 1;
        } else {
            $traning_rkm = 1;
        }
        $action="حفظ";

    }
    ?>
    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title"><?=$title?></h4>
            </div>
            <div class="panel-body" >
                <div class="col-md-12 no-padding" style=" margin-top: 10px;">

                 
                      
                        <input type="hidden" id="traning_rkm" name="traning_rkm" value="<?=$traning_rkm?>" class="form-control"
                              >
                   

                   
                              <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                    <label class="label ">مسمي الفرصة التطوعية</label>
                    <select id="forsa_id_fk" name="forsa_id_fk"  
                            class="form-control selectpicker" data-validation="required"
							onchange="get_mot3en();"
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
                                <option value="<?php echo $key->id; ?>-<?php echo $key->forsa_name; ?>" <?= $select ?>> <?php echo $key->forsa_name; ?></option>
                            <?php }
                        } ?>
                    </select>                    
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

                    


                    <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                        <label class="label">  فترة التطوع بعد الحصول علي التدريب  </label>
                        <input type="text" name="ftra_tatw3" id="ftra_tatw3"
                               value=" <?php if(isset($volunteer)) echo $volunteer['ftra_tatw3']; ?>
                               " class="form-control "  data-validation="required" >
                    </div>


                    <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                    <label class="label ">    المشرف الفني</label>
                    <select id="moshrf_id_fk" name="moshrf_id_fk"  
                            class="form-control selectpicker" data-validation="required"
                            data-show-subtext="true" data-live-search="true">
                            <option value="">اختر</option>
                        <?php
                        if (isset($employees) && (!empty($employees))) {
                            foreach ($employees as $key) {
                                $select = '';
                                if (isset($volunteer['moshrf_id_fk']) && (!empty($volunteer['moshrf_id_fk']))) {
                                    if ($key->id==$volunteer['moshrf_id_fk']) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->id; ?>-<?php echo $key->employee; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>
                            <?php }
                        } ?>
                    </select>                    
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                        <label class="label">  مسؤول قياس الأثر  </label>
                        <input type="text" name="ms2ol_quas" id="ms2ol_quas"
                               value="<?php if(isset($volunteer)) echo $volunteer['ms2ol_quas']; ?>" class="form-control "  data-validation="required" >
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
                        <label class="label">  التأهيل المقترح لسد الفجوات </label>
                        <textarea class="form-control" name="t2hel" id="t2hel"
                                  class="form-control "  data-validation="required"><?php if(isset($volunteer)) echo $volunteer['t2hel']; ?></textarea>

                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
                        <label class="label">  مؤشر تحسين الأداء </label>
                        <textarea class="form-control" name="thseen_adaa" id="thseen_adaa"
                                  class="form-control "  data-validation="required"><?php if(isset($volunteer)) echo $volunteer['thseen_adaa']; ?></textarea>

                    </div>
                    <div class="col-md-12 no-padding">
        <table id="table_anf" class="table-bordered table table-responsive tb-table">
            <thead>
            <tr class="greentd">
                <th >م</th>
                <th>المهام المطلوبة</th>
                <th>المهارات المطلوبة </th>
                <th> المهارات التي تحتاج تحسن </th>
                
                <th>  الاجراء </th>
            </tr>
            </thead>
            <tbody id="asnafe_table">
            <?php
        
            if ((isset($volunteer_maham)) && (!empty($volunteer_maham)) && ($volunteer_maham != 0)) {
                $z = 1;
                foreach ($volunteer_maham as $sanfe) {
                    ?>
                    <tr id="row_<?= $z ?>">
                        <td><?= $z ?></td>
                        <td><input type="text" name="mahm_need[]" class="form-control testButton "
                                id="mahm_need<?= $z ?>"
								data-validation="required"
                                value="<?= $sanfe->mahm_need ?>"
                               
                               
                                /></td>
                        <td><input type="text" name="maharat_need[]" class="form-control testButton "
                                id="maharat_need<?= $z ?>"
								data-validation="required"
                                value="<?= $sanfe->maharat_need ?>" /></td>
								
								
                        <td><input type="text" name="maharat_need_approved[]" class="form-control testButton "
                                id="maharat_need_approved<?= $z ?>"
								data-validation="required"
                                value="<?= $sanfe->maharat_need_approved ?>" />
                               
                                </td>
								
                        
                               
                        <td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                                        class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                   
                    $z++;
                }
            } else { ?>
                <tr id="row_1">
                    <td>1</td>
                    <td><input type="text" name="mahm_need[]" class="form-control testButton "
                            id="mahm_need1" value=""
                            data-validation="required"
                           
                            />
                           
                            </td>
                    <td><input type="text" data-validation="required" name="maharat_need[]"
                            class="form-control testButton "
                            id="maharat_need1" value="" />
                            </td>
                    <td><input type="text"  name="maharat_need_approved[]"
                            class="form-control testButton "
							data-validation="required"
                            id="maharat_need_approved1" value="" />
                           
                            </td>
                    
                    
                            <td>
                    <!-- <a id="1" onclick=" $(this).closest('tr').remove();"><i
                                    class="fa fa-trash"></i></a> -->
                                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="4" class="text-center" style="background-color: #fff;">
                    <!--<button type="button" onclick="" class="btn-danger btn" style="font-size: 16px;"><i
                                class="fa fa-trash"></i> حذف صنف
                    </button>-->
                </th>
                <th colspan="2" class="text-center" style="background-color: #fff;">
                    <button type="button" onclick="add_row_sanfe();  " class="btn-success btn"
                            style="font-size: 16px;"><i class="fa fa-plus"></i>  اضافه
                    </button>
                </th>
            </tr>
            </tfoot>
        </table>
</div>

                    
                    <div class="form-group col-md-12 text-center">
        <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   >
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span><?=$action?>
        </button>
    </div>





                </div>
            </div>
        </div>
        
    </div>
    
    <?php
    echo form_close();
    ?>
</div>



<script>

        function get_mot3en() {
			var dataString = "forsa_id_fk=" + $("#forsa_id_fk").val();
			if(forsa_id_fk!='' && forsa_id_fk!=0)
			{
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>human_resources/tataw3/nmazg/need_training/Need_training/get_mot3en",
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
            url: '<?php echo base_url() ?>human_resources/tataw3/nmazg/need_training/Need_training/get_moto3',
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
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
function add_row_sanfe() {


    var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;
      //  document.getElementById("wazifa_in_galsa"+len).setAttribute("disabled", "disabled");
        var m=len+1;
///
          //  y.remove(x.selectedIndex);
///
        //
        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="mahm_need[]" id="mahm_need' + (len + 1) + '" value=""   /></td>\n' +
            '                        <td> <input type="text" data-validation="required" class="form-control testButton " name="maharat_need[]" id="maharat_need' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="maharat_need_approved[]" id="maharat_need_approved' + (len + 1) + '" value="" /> </td>\n' +
           
            
                
           
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';
        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);
          
       
 
        // 
    }
</script>