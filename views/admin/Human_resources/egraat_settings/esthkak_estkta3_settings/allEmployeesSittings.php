
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
         <!--   <h3 class="panel-title"><?php echo $title ?> </h3> -->
        </div>
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <!-- <li class="active"><a href="#tab_allowances"  data-toggle="tab"><i class="fa fa-list  fa-2x" style="display: block;text-align: center"></i> الإستحقاقات</a></li>
                <li><a href="#tab_deduction" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i> الإستقطاعات</a></li> -->


                <li class="active">
            <a <?php if(isset($disabled)){}else{echo 'href="#tab_allowances"';} ?>   data-toggle="tab"  >
            الإستحقاقات</a></li>
       
        <li >
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_deduction"';} ?>   data-toggle="tab" >
             الإستقطاعات</a></li>
        
            </ul>
            <!-- Tab panels -->
            <div class="tab-content">
                <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_allowances") {echo  'active'; }  ?>" id="tab_allowances">
		 <?php
                                    if(isset($allowance) && !empty($allowance) && $allowance!=null){
                                        echo form_open_multipart('human_resources/egraat_settings/Esthkak_estkta3_setting/UpdateSittingAllowances/'.$allowance['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/egraat_settings/Esthkak_estkta3_setting/AddSittingAllowances/tab_allowances');
                                    }
                                    ?>
                                     
                                    <div class="form-group col-sm-2 col-xs-12">
                <?php
                 $period_arr= array('rawateb'=>'الرواتب والأجور','mazaya'=>'مزايا وحوافز');
                ?>
                <label class="label "> الفئة</label>
                <select name="f2a" id="f2a"  class="form-control "
                        data-validation="required"  >
                    <option value="">إختر</option>
                    <?php
                    foreach ($period_arr as $key => $value) {
                        $selected='';
                         if(!empty($allowance['f2a'])&&$allowance['f2a']==$key) {
                             $selected='selected';
                         }
                        ?>
                        <option <?= $selected ?> value="<?= $key ?>"><?= $value ?></option>
                    <?php } ?>
                </select>
            </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label ">نوع الإستحقاق</label>
                                        <input type="text" name="title" value="<?php if(isset($allowance)) echo $allowance['title'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-2 col-xs-12">
                                        <label class="label "> متعلق بنشاط اجرائي ؟</label>
                                        <input  name="egraa_activity" type="checkbox" 
                                        class="form-control"
                                                       

                                                       value="1"<?php if (!empty($allowance['egraa_activity']) && $allowance['egraa_activity'] == 1) {

                                                    echo 'checked';

                                                } ?>>
                                       
                                    </div>
                                    <div class="form-group col-sm-2 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                        id="in_order_1"
                                        onchange="Checkcode_type1(1);"
                                               value="<?php if(isset($allowance)) echo $allowance['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_allowances" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($allowances) && !empty($allowances) && $allowances !=null){ ?>
                                        <table class="example table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th > الترتيب </th>
                                                <th>الإسم</th>
                                                <th > الفئة </th>
                                                 <th> متعلق بنشاط إجرائي </th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($allowances as $value) {
                                                
                                                if($value->egraa_activity == 1){
                                                 $egraa_activity = 'نعم ';  
                                                }elseif($value->egraa_activity == null){
                                                   $egraa_activity = 'لا ';   
                                                }else{
                                                  $egraa_activity = '';     
                                                }
                                                
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>
                                                    <td><?php echo $value->in_order; ?></td>
                                                    <td><?=$value->title?></td>
                                                    <td>
                                                <?php
                         if(!empty($value->f2a)&& ($value->f2a=='rawateb')) {
                           echo 'الرواتب والأجور';
                         } else   if(!empty($value->f2a)&& ($value->f2a=='mazaya')) {
                            echo 'مزايا وحوافز';
                        }
                        ?> 
                                                    </td>
                                                    <td><?=$egraa_activity?></td>
                                                     <td>  <a href="<?php echo base_url().'human_resources/egraat_settings/Esthkak_estkta3_setting/UpdateSittingAllowances/'.$value->id."/tab_allowances"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."human_resources/egraat_settings/Esthkak_estkta3_setting/DeleteSittingAllowances/tab_allowances/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td> 
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>

                </div>
                <div class="tab-pane fade in<?php if(isset($typee) && !empty($typee)&& $typee === "tab_deduction") {echo  'active'; }  ?>" id="tab_deduction">
                    
 <?php
                                    if(isset($deduction) && !empty($deduction) && $deduction!=null){
                                        echo form_open_multipart('human_resources/egraat_settings/Esthkak_estkta3_setting/UpdateDeductionSitting/'.$deduction['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/egraat_settings/Esthkak_estkta3_setting/AddDeductionSitting/tab_deduction');
                                    }
                                    ?>
                                   
                                     <div class="form-group col-sm-2 col-xs-12">
                <?php
                 $period_arr= array('thabet'=>'ثابتة','mota3er'=>'متغيرة');
                ?>
                <label class="label "> الفئة</label>
                <select name="f2a" id="f2a"  class="form-control "
                        data-validation="required"  >
                    <option value="">إختر</option>
                    <?php
                    foreach ($period_arr as $key => $value) {
                        $selected='';
                         if(!empty($deduction['f2a'])&&$deduction['f2a']==$key) {
                             $selected='selected';
                         }
                        ?>
                        <option <?= $selected ?> value="<?= $key ?>"><?= $value ?></option>
                    <?php } ?>
                </select>
            </div>
           
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label ">إسم الإستقطاع</label>
                                        <input type="text" name="title" value="<?php if(isset($deduction)) echo $deduction['title'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-2 col-xs-12">
                                        <label class="label "> متعلق بنشاط اجرائي ؟ </label>
                                        <input  name="egraa_activity" type="checkbox" money="0"
                                        class="form-control"
                                                       

                                                       value="1"<?php if (!empty($deduction['egraa_activity']) && $deduction['egraa_activity'] == 1) {

                                                    echo 'checked';

                                                } ?>>
                                       
                                    </div>
                                    <div class="form-group col-sm-2 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                        id="in_order_2"
                                        onchange="Checkcode_type2(2);"
                                               value="<?php if(isset($deduction)) echo $deduction['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_deduction" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($deductions) && !empty($deductions) && $deductions !=null){ ?>
                                        <table class="example table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th > الترتيب </th>
                                                <th>الإسم</th>
                                                <th > الفئة </th>
                                                <th> متعلق بنشاط اجرائي</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($deductions as $value) {
                                                  if($value->egraa_activity == 1){
                                                 $egraa_activity = 'نعم ';  
                                                }elseif($value->egraa_activity == null){
                                                   $egraa_activity = 'لا ';   
                                                }else{
                                                  $egraa_activity = '';     
                                                }
                                                
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>
                                                    <td><?php echo $value->in_order; ?></td>
                                                    <td><?=$value->title?></td>
                                                    <td>
                                                <?php
                         if(!empty($value->f2a)&& ($value->f2a=='thabet')) {
                           echo 'ثابتة';
                         } else   if(!empty($value->f2a)&& ($value->f2a=='mota3er')) {
                            echo 'متغيرة';
                        }
                        ?> 
                                                    </td>
                                                    <td><?=$egraa_activity?></td>
                                                    <td>  <a href="<?php echo base_url().'human_resources/egraat_settings/Esthkak_estkta3_setting/UpdateDeductionSitting/'.$value->id."/tab_deduction"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."human_resources/egraat_settings/Esthkak_estkta3_setting/DeleteDeductionSitting/tab_deduction/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function Checkcode_type1(type) {
    //    var national_id_type = $('#national_id_type').val();
      var  prog_code= $('#in_order_1').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/egraat_settings/Esthkak_estkta3_setting/Checkcode',
            data: {prog_code:prog_code,type:type},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                
                    swal({
                        title: "جاري التحقق ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                
            },
            success: function (html) {
                if (html == 1) {
                    swal(" برجاء ادخال ترتيب  لم يتم ادخالة من قبل","", "error");
                    $('#in_order_1').val('');

                } else if (html == 0) {
                    //swal("   ترتيب  جديد","", "scuess");
                    swal("   ترتيب  جديد    ","", "success");
                    $('#in_order_1').val(prog_code);
                  
                }
            }
        });
    }
</script>
<script>
    function Checkcode_type2(type) {
    //    var national_id_type = $('#national_id_type').val();
      var  prog_code= $('#in_order_2').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/egraat_settings/Esthkak_estkta3_setting/Checkcode',
            data: {prog_code:prog_code,type:type},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                
                    swal({
                        title: "جاري التحقق ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                
            },
            success: function (html) {
                if (html == 1) {
                    swal(" برجاء ادخال ترتيب  لم يتم ادخالة من قبل","", "error");
                    $('#in_order_2').val('');

                } else if (html == 0) {
                    //swal("   ترتيب  جديد","", "scuess");
                    swal("   ترتيب  جديد    ","", "success");
                    $('#in_order_2').val(prog_code);
                  
                }
            }
        });
    }
</script>