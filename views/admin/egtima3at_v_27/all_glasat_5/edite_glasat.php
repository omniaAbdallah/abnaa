<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title;  ?> </h3>
        </div>

        <div class="panel-body">
            <?php
            if(isset($galsa_member)){?>
           
            <!-- <form action="<?php echo base_url();?>md/all_glasat/All_glasat/update_galsa/<?php echo $this->uri->segment(5);?>/
<?php echo $this->uri->segment(6);?>" method="post" id="form1"> -->
<?php echo form_open_multipart('md/all_glasat/All_glasat/update_galsa/'.$last_magls_update->id.'', array( 'class' => 'galsa_form')); ?>

                <?php } else{?>
                    <?php echo form_open_multipart('md/all_glasat/All_glasat', array( 'class' => 'galsa_form')); ?>
                <!-- <form action="<?php echo base_url();?>md/all_glasat/All_glasat" method="post" id="form1"> -->

                <?php   }  ?>
            <div class="col-sm-12">
                
                
                <div class="form-group col-sm-4">
                    <label class="label">رقم الجلسه</label>
                    <input type="text" class="form-control" data-validation="required" name="glsa_rkm_full" readonly value="<?php echo date("Y");?>/<?php echo $edara;?>/<?php echo $last_galsa;?>"/>
                    <input type="hidden" name="glsa_rkm" readonly value="<?php echo $last_galsa;?>"/>


                </div>

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                   
                        <label class="label"> تاريخ  الجلسة </label>
                        <input  type="date"  class="form-control" data-validation="required" name="galsa_date" 
                               value="<?php if(isset($last_magls_update)){echo $last_magls_update->galsa_date;}else{echo date('Y-m-d');}?> "   />
                    
                </div>

                <div class="form-group col-md-4 col-sm-6 col-xs-12 padding-4">
                   
                   <label class="label"> عنوان  الجلسة </label>
                   <input  class="form-control" data-validation="required" name="enwan_galsa" 
                          value="<?php if(isset($last_magls_update))echo $last_magls_update->enwan_galsa;?> " type="text"   />
               
                  </div>
                  <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">


        <label class="label">  معتمد الجلسة  </label>


<select id="suspender_emp_n" name="suspender_emp_n" data-validation="required"

title="    اختر    معتمد الجلسة    "

class="form-control selectpicker"

data-show-subtext="true"

data-live-search="true">
<option value="" >اختر    معتمد الجلسة  </option>
<?php

if (isset($all_Emps) && (!empty($all_Emps))) {

foreach ($all_Emps as $key) {

$select = '';

if (isset($last_magls_update) && (!empty($last_magls_update))) {

if ($key->employee == $last_magls_update->suspender_emp_n) {

$select = 'selected';

}

}

?>
<option value="<?php echo $key->employee; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>
<?php }
} ?>
</select>
</div>
  
               
</div>


              

 <div class="col-md-12 no-padding">

<table id="table_anf" class="table-bordered table table-responsive tb-table">
    <thead>
    <tr class="greentd">
        <th >م</th>
        <th>كود الموظف</th>
        <th>اسم الموظف</th>
        <th > المسمي الوظيفي</th>
        <th >  الإدارة</th>
        <th > القسم</th>
        <th >  الوظيفة بالجلسة</th>
        <th>   </th>
       
    </tr>
    </thead>
    <tbody id="asnafe_table">
    <?php
   
    if ((isset($galsa_member)) && (!empty($galsa_member)) && ($galsa_member != 0)) {
        $z = 1;
        foreach ($galsa_member as $sanfe) {
            ?>
            <tr id="row_<?= $z ?>">
                <td><?= $z ?></td>
               
                <td><input type="text" name="code[]" class="form-control testButton "
                           id="code<?= $z ?>"
                           value="<?= $sanfe->emp_code ?>"
                           ondblclick=" GetDiv_sanfe('myDiv_sanfe',<?= $z ?>)"
                           readonly/></td>
                <td><input type="text" name="emp_n[]" class="form-control testButton "
                           id="emp_n<?= $z ?>"
                           value="<?= $sanfe->emp_n ?>" readonly/></td>
                <td><input type="text" name="emp_mosama_wazifa_n[]" class="form-control testButton "
                           id="emp_mosama_wazifa_n<?= $z ?>"
                           value="<?= $sanfe->emp_mosama_wazifa_n ?>" readonly/>
                           <input type="hidden" name="emp_mosama_wazifa[]" id="emp_mosama_wazifa<?= $z ?>"   value="<?= $sanfe->emp_mosama_wazifa ?>"/>
                           </td>
                <td><input type="text" name="emp_edara_n[]" class="form-control testButton "
                           id="emp_edara_n<?= $z ?>"
                           value="<?= $sanfe->emp_edara_n ?>" readonly/>
                           <input type="hidden" name="emp_edara[]" id="emp_edara<?= $z ?>"   value="<?= $sanfe->emp_edara ?>"/>
                           </td>
               
                           <td><input type="text" name="emp_qsm_n[]" class="form-control testButton "
                           id="emp_qsm_n<?= $z ?>"
                           value="<?= $sanfe->emp_qsm_n ?>" readonly/>
                           <input type="hidden" name="emp_qsm[]" id="emp_qsm<?= $z ?>"   value="<?= $sanfe->emp_qsm ?>"/> 
                           </td>
                           <td> <select name="wazifa_in_galsa[]" id="wazifa_in_galsa<?= $z ?>" data-validation="required"
                                class=" form-control "  
                                data-show-subtext="true" data-live-search="true"
                        
                                aria-required="true">
                            <option value="">اختر</option>
                            <option value="1" <?php  if ($sanfe->wazifa_in_galsa==1) {
                                    echo 'selected';
                                }?> >'رئيس الجلسة</option>
            <option value="2" <?php  if ($sanfe->wazifa_in_galsa==2) {
                                   echo  'selected';
                                }?> > أمين سر الجلسة</option>
            <option value="3"<?php  if ($sanfe->wazifa_in_galsa==3) {
                                    echo  'selected';
                                }?>> عضو بالجلسة</option>
                           
                        </select></td>

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
            <td><input type="text" name="code[]" class="form-control testButton "
                       id="code1" value=""
                       data-validation="required"
                       ondblclick=" GetDiv_sanfe('myDiv_sanfe',1)"
                       readonly/></td>
                      
            <td><input type="text" data-validation="required" name="emp_n[]"
                       class="form-control testButton "
                       id="emp_n1" value="" readonly/></td>
            <td><input type="text"  name="emp_mosama_wazifa_n[]"
                       class="form-control testButton "
                       id="emp_mosama_wazifa_n1" value="" readonly/>
                       <input type="hidden" name="emp_mosama_wazifa[]" id="emp_mosama_wazifa1" value=""/>  
                       </td>
            <td><input type="text"  name="emp_edara_n[]"
                       class="form-control testButton "
                       id="emp_edara_n1" value="" readonly/>
                       <input type="hidden" name="emp_edara[]" id="emp_edara1" value=""/> 
                       </td>
            <td><input type="text"  name="emp_qsm_n[]"
            readonly
                       class="form-control testButton "
                       id="emp_qsm_n1" value=""/>
                       <input type="hidden" name="emp_qsm[]" id="emp_qsm1" value=""/> 
                       </td>
            <td> <select name="wazifa_in_galsa[]" id="wazifa_in_galsa1" data-validation="required"
                                class="selectpicker no-padding form-control choose-date form-control "
                                data-show-subtext="true" data-live-search="true"
                        
                                aria-required="true">
                            <option value="">اختر</option>
                            <?php 
                            $arr_yes_no = array('', 'رئيس الجلسة ', ' أمين سر الجلسة', '  عضو بالجلسة');
                            for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                               
                                ?>
                                <option value="<?php echo $r; ?>"  ><?php echo $arr_yes_no[$r]; ?> </option>
                            <?php } ?>
                        </select></td>
           
           

            <td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                            class="fa fa-trash"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>


    <tr>
        <th colspan="2" class="text-center" style="background-color: #fff;">
            <button type="button" onclick="add_row_sanfe()" class="btn-success btn"
                    style="font-size: 16px;"><i class="fa fa-plus"></i> إضافة موظف
            </button>
        </th>
      
        <th colspan="9" class="text-center" style="background-color: #fff;">
            <!--<button type="button" onclick="" class="btn-danger btn" style="font-size: 16px;"><i
                        class="fa fa-trash"></i> حذف صنف
            </button>-->
        </th>
    </tr>

    </tfoot>
</table>
</div>

            </form>

            
 
            <div class="col-md-12 text-center">
                                <!--<button type="submit"
                                        class="btn btn-labeled btn-success " name="add" value="ADD" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>-->
                               <?php if ((isset($open_galesa)) && (!empty($open_galesa)) && ($open_galesa > 0)) {

                                            $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة جلسة جديدة لوجود جلسة نشطة بالمجلس </span>';
                                            $disabled = 'disabled';
                                        } else {
                                            $span = '';
                                            $disabled = '';
                                        } ?>   

<?php if (isset($last_magls_update) && $last_magls_update != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $last_magls_update->id . '">';
                                    $onclick = "update();";
                                else: $input_name1 = 'add';
                                $onclick ="save()";
                                    $input_name2 = 'add_save'; endif; ?>

                    <button type="button" <?= $disabled ?> 
                            class="btn btn-labeled btn-warning " onclick="<?=$onclick?>" name="<?=$input_name1?>"
                            value="ADD"
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                    </button>
                   <input type="hidden" name="add" value="ADD"/>
                     <?= $span ?>

            </div>
                       
       
    </div>
    </div> 
    </div>