<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">  طلب تغيير  الحساب البنكي </h3>
        </div>
        <div class="panel-body" >

<div class="col-md-4 col-md-offset-4  btn btn-success  " style="margin-bottom: 15px;font-size: 18px;">
                             بيانات  الحساب البنكي الحالى
                        </div>
        <?php
echo '<input type="hidden"  name="change"  id="add" value="add">';
echo form_open_multipart('human_resources/employee_forms/emp_banks/Emp_banks_c/change_banks_employee/' . $allData->emp_code , array('class' => 'change_banks', 'id' => 'change_banks')); ?>
<div class="col-sm-12 no-padding">
                            <input type="hidden" value="<?php echo $allData->id; ?>" name="row_id">
                           
                              <div class="form-group col-md-2 col-sm-4 padding-4">
                                <label class="label">إسم الموظف  </label>
                            <input type="text" class="form-control" name="emp_n" id="emp_n" 
                            readonly
                                 value="<?php 
 if (isset($employee['employee']) && !empty($employee['employee'])) { 
            echo   
               $employee['employee'];} ?>" />
                <input type="hidden" class="form-control" name="emp_id" id="emp_id" 
                            readonly
                                 value="<?php 
 if (isset($employee['id']) && !empty($employee['id'])) { 
            echo   
               $employee['id'];} ?>" />
                            </div>
                            <div class="form-group col-md-1 col-sm-4 padding-4">
                            <label class="label">كود الموظف  </label>
                            <input type="text" class="form-control" name="emp_code" id="emp_code"
                            readonly
                                 value="<?php 
 if (isset($employee['emp_code']) && !empty($employee['emp_code'])) { 
            echo   
               $employee['emp_code'];} ?>" />
                            </div>
                            <div class="form-group col-md-3 col-sm-4 padding-4">
                            <label class="label"> المسمي الوظيفي  </label>
                            <input type="text" class="form-control" name="mosma_wazefy_n" id="mosma_wazefy_n"
                            readonly
                                 value="<?php 
 if (isset($employee['mosma_wazefy_n']) && !empty($employee['mosma_wazefy_n'])) { 
            echo   
               $employee['mosma_wazefy_n'];} ?>" />
                <input type="hidden"  name="mosma_wazefy_id" id="mosma_wazefy_id"
                                 value="<?php 
 if (isset($employee['degree_id']) && !empty($employee['degree_id'])) { 
            echo   
               $employee['degree_id'];} ?>" />
                            </div>
                            <div class="form-group col-md-2 col-sm-4 padding-4">
                            <label class="label"> الاداره  </label>
                            <input type="text" class="form-control" name="edara_n" id="edara_n"
                            readonly
                                 value=" <?php 
 if (isset($employee['edara_n']) && !empty($employee['edara_n'])) { 
            echo   
                                            $employee['edara_n'];} ?>" />
                            </div>
                            <div class="form-group col-md-2 col-sm-4 padding-4">
                            <label class="label"> القسم  </label>
                            <input type="text" class="form-control" name="qsm_n" id="qsm_n"
                            readonly
                                 value=" <?php 
 if (isset($employee['qsm_n']) && !empty($employee['qsm_n'])) { 
            echo   
                                            $employee['qsm_n'];} ?>" />
                            </div>

                            <div class="form-group col-sm-3">
                                <label class="label "> اسم البنك الحالي<strong
                                            class="astric">*</strong><strong></strong> </label>
                                            
                                <select name="edit_bank_id_fk" id="edit_bank_id_fk"
                                        data-validation="required" aria-required="true"
                                        disabled
                                        onchange="get_code_bank(<?php echo $allData->id; ?>)" class="form-control ">
                                    <option value="">إختر</option>
                                    <?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $bank) {
                                            $select = '';
                                            if ($bank->id == $allData->bank_id_fk) {
                                                $select = 'selected';
                                            }
                                            ?>
                                            <option bank_code='<?= $bank->bank_code ?>'
                                                    value="<?= $bank->id ?>" <?= $select ?>><?= $bank->ar_name ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <label class="label ">كود البنك الحالي<strong
                                            class="astric">*</strong><strong></strong> </label>
                                <input type="text" class="form-control  " name="bank_code" readonly
                                       id="bank_code" value="<?= $allData->bank_code ?>" readonly/>
                            </div>
                            <div class="form-group  col-sm-4">
                                <label class="label ">رقم الحساب الحالي <strong
                                            class="astric">*</strong><strong></strong> </label>
                                <input type="text" readonly class="form-control  " maxlength="24" minlength="24"
                                       class="form-control bottom-input" name="edit_bank_account_num"
                                       id="edit_bank_account_num" data-validation="required"
                                       onfocusout="checkLength($(this).val());"
                                       value="<?= $allData->bank_account_num ?>"/>
                            </div>
                            <div class="form-group col-md-2 col-sm-4 padding-4">
                                <label class="label">   صوره الحساب الحالي</label>
                                <!-- <input type="file" maxlength="24" minlength="24" class="form-control" id="userfile"
                                       name="userfile" data-validation="required"/> -->
                                       <?php if ($allData->bank_id_fk_image != '') {
                            $img_url = "uploads/human_resources/emp_banks/".$allData->bank_id_fk_image;
                        } else {
                            $img_url = "asisst/web_asset/img/logo.png";
                        } ?>
                                       <!-- <a target="_blank" onclick="show_img('<?php echo base_url().$img_url; ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>  -->
                                <img target="_blank" onclick="show_img('<?php echo base_url().$img_url; ?>')"
                                       src="<?php echo base_url().$img_url; ?>"
                                       style="height: 100px;"
                                       >
                            </div>
                        </div>
                        
                            <!-- <div class="form-group col-sm-4">
                                <div class="form-group col-xs-12" style="padding-right: 0">
                                    <div class="form-group">
                                        <div id="post_img" class="imgContent" style="min-height: 120px; ">
                                            <img id="blah<?php echo $allData->id; ?>" style="width: 150px;"
                                                 src="<?php echo base_url().$img_url; ?>">
                                        </div>
                                    </div>
                                </div>
                                 <input type="file" id="bank_image" name="bank_image" class="form-control"
                                       onchange="loadFile(event,<?php echo $allData->id; ?>);"> 
                            </div> -->

                            <div class="col-md-4 col-md-offset-4  btn btn-success  " style="margin-bottom: 15px;font-size: 18px;">
                            بيانات  الحساب البنكي الجديد
                        </div>

<div id="bank_edite">
                        <div class="col-sm-12 col-md-12 col-xs-12 no-padding">
                            <!-- <div class="form-group col-md-3 col-sm-4 padding-4">
                                <label class="label">إسم الموظف لدي البنك</label>
                            <input type="text" class="form-control" name="emp_bank_name" value="<?= $allData->emp_bank_name ?>" />
                            </div> -->
                            <div class="form-group col-md-2 col-sm-4 padding-4">
                                <label class="label"> تاريخ الطلب  </label>
                            <input type="date" class="form-control" name="order_date" id="order_date" 
                            
                                 value="<?php 
 
            echo   date('Y-m-d');
                ?>" />
                   </div>
                            <div class="form-group col-md-2 col-sm-4 padding-4">
                                <label class="label">إسم البنك الجديد</label>
                                <select name="bank_id_fk" id="bank_id_fk" class="form-control banks" data-validation="required"
                                        onchange="$('#bank_code1').val($(this).find('option:selected').attr('bank_code'))">
                                    <option value="">إختر</option>
                                    <?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $value) {
                                            ?>
                                            <option bank_code='<?= $value->bank_code ?>'
                                                    value="<?= $value->id ?>"><?= $value->ar_name ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-1 col-sm-4 padding-4">
                                <label class="label"> كود البنك الجديد  </label>
                                <input type="text" class="form-control banks" name="bank_code" data-validation="required"
                                       id="bank_code1" readonly/>
                 
                            </div>
                            <div class="form-group col-md-4 col-sm-4 padding-4">
                                <label class="label"> رقم الحساب الجديد<span style="color:red;"> (رقم الحساب لابد أن يكون 24  رقم)</span></label>
                                <input type="text" maxlength="24" minlength="24" class="form-control banks"
                                       name="bank_account_num" id="bank_account_num" data-validation="required"
                                       onfocusout="checkLength($(this).val());"/>
                            </div>
                            <div class="form-group col-md-2 col-sm-4 padding-4">
                                <label class="label"> صوره الحساب الجديد</label>
                                <input type="file" maxlength="24" minlength="24" class="form-control" id="userfile"
                                       name="userfile" data-validation="required"/>
                            </div>
</div>
<!-- yara5-11-2020 -->
<!-- yara5-11-2020 -->
<div class="col-xs-12 ">
<?php if(isset($allData_suspened)&&!empty($allData_suspened)){?>
<table id="" class=" example display table table-bordered responsive nowrap text-center" id="banktable"
                           cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="greentd">
                        </tr>
                        <tr class="greentd">
						
                            <th>م   </th>
                           
                            <th>إسم البنك  </th>
							<th>كود البنك </th>
							<th>رقم الحساب </th>
                            <th>صوره الحساب</th>
                             
                          
                        </tr>
                        </thead>
                        <tbody>
                        <?php
						$x=0;
                        foreach ($allData_suspened as  $value) {
						$x++;
                            ?>
                            <tr>
                            <td>
                            <input type="radio"
                                       onclick="suspend_bank(<?php echo $value->id; ?>);"
                                       
                                     
                                       />
                                         
                             </td>
                            
                               
                             <td>

                               <?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $valuee) {
                                            if($valuee->id ==$value->new_bank_id_fk){
                                                echo $valuee->ar_name ;
                                            }
                                        }
                                    }
                                            ?>
                                           
                                    
                            </td>
                                <td>
                                <?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $valuee) {
                                            if($valuee->id ==$value->new_bank_id_fk){
                                                echo $valuee->bank_code ;
                                            }
                                        }
                                    }
                                            ?>
                                </td>
                              
                                <td>
                                <?= $value->new_bank_account_num ?>
                                </td>
								
								
								
                                <td>
                                    <a data-toggle="modal" type="button" style="cursor: pointer"
                                       data-target="#modal-img<?php echo $value->id; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <!--  -->
                                    <div class="modal fade" id="modal-img<?php echo $value->id; ?>" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if ($value->new_bank_image === 0) { ?>
                                                        <img src="<?php echo base_url(); ?>asisst/web_asset/img/logo.png"
                                                             width="100%" height="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>uploads/human_resources/emp_banks/<?php echo $value->new_bank_image; ?>"
                                                             width="100%" height="">
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" style="float: left"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </td>
                               
                              
                            </tr>
							 <?php
                        
                        }
                        ?>
                        </tbody>
                      
                    </table>
                    <?php }?>
</div>
<!-- yara5-11-2020 -->
<!-- yara5-11-2020 -->
                            <div class="col-xs-12 text-center">
                            <?php
            if (isset($last_record) && ($last_record == 4)) {
            
                $disabled = "";
                $span = "";
            }
            else  if (isset($last_record) && ($last_record == 2)) {
            
                $disabled = "";
                $span = "";
            
            
          }  else {

                $disabled = "disabled";
                $span="<span style=\"font-size: medium;\" class=\" badge badge-danger\" id=\"span_form\">لا يمكن طلب جديد لان هنالك طلب جاري </span>";  

            } ?>
                                <button type="button" onclick="change_banks(<?= $allData->emp_code ?>)" id="buttons"
                                <?= $disabled ?>       name="add" value="add" class=" btn btn-success btn-labeled"><span
                                            class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                                    حسابات البنك
                                </button>
                                <?= $span ?>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        </div>
                        </div>
                        </div>