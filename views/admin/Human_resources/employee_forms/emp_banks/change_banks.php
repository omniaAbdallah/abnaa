<div id="Modal_body">
<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">  طلب تغيير  الحساب البنكي </h3>
        </div>
        <div class="panel-body" >
<?php
if (isset($allData)&&!empty($allData)&&($_SESSION['role_id_fk']==3)) {
        ?>
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
                                
                                       <?php if ($allData->bank_id_fk_image != '') {
                            $img_url = "uploads/human_resources/emp_banks/".$allData->bank_id_fk_image;
                        } else {
                            $img_url = "asisst/web_asset/img/logo.png";
                        } ?>
                                       <img target="_blank" onclick="show_img('<?php echo base_url().$img_url; ?>')"
                                       src="<?php echo base_url().$img_url; ?>"
                                       style="height: 100px;"
                                       >
                                    <!-- <i class=" fa fa-eye"></i> -->
                               
                            </div>
                        </div>
                        
                          

                            <div class="col-md-4 col-md-offset-4  btn btn-success  " style="margin-bottom: 15px;font-size: 18px;">
                            بيانات  الحساب البنكي الجديد
                        </div>

<div id="bank_edite">
                        <div class="col-sm-12 col-md-12 col-xs-12 no-padding">
                            
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
                            <div class="col-xs-12 text-center">

                            <?php
            if (isset($last_record) && ($last_record == 4) || $last_record == 0  ) {
            
                $disabled = "";
                $span = "";
            }elseif (isset($last_record) && ($last_record == 2)) {
            
                $disabled = "";
                $span = "";
            
            
          }  else {

                $disabled = "disabled";
                $span="<span style=\"font-size: medium;\" class=\" badge badge-danger\" id=\"span_form\">لا يمكن طلب جديد لان هنالك طلب جاري </span>";  

            } ?>
                                <button type="button" onclick="change_banks(<?= $allData->emp_code ?>)" id="buttons"
                                <?= $disabled ?>   name="add" value="add" class=" btn btn-success btn-labeled"><span
                                            class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                                    حسابات البنك
                                </button>
                                <?= $span ?>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                            <?php }else{?>
                            <!-- yraaaaaaaaaaaaaaaaaa_admin -->
                            <!-- yraaaaaaaaaaaaaaaaaa_admin -->
                            <!-- yraaaaaaaaaaaaaaaaaa_admin -->
                            <!--  -->
                            <div id="bank_edite">
                        <div class="form-group col-md-3 col-sm-4 col-xs-6 padding-4">
                            <label class="label ">اسم الموظف</label>
                            <input name="emp_n" id="emp_n" class="form-control"
                                   style="width:84%; float: right;"
                                   readonly
                                   value="<?php if (!empty($emp_data->employee)) {
                                       echo $emp_data->employee;
                                   }  ?>">
                                    <input type="hidden" id="emp_id" name="emp_id"
                           value="<?php if (!empty($emp_data->id)) {
                               echo $emp_data->id;
                           }  ?> ">
                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style=""
                                    onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                                echo 'disabled';
                            } ?>>
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الرقم الوظيفي</label>
                            <input name="emp_code_fk" id="emp_code" class="form-control"
                                   oninput="checkValidateVacationDayes()"
                                   value="<?php if (!empty($emp_data->emp_code)) {
                                       echo $emp_data->emp_code;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> المسمى الوظيفي</label>
                            <input name="mosma_wazefy_n" id="mosma_wazefy_n" class="form-control"
                                   value="<?php if (!empty($emp_data->job_title)) {
                                       echo $emp_data->job_title;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الأدارة </label>
                            <input name="edara_n" id="edara_n" class="form-control"
                                   value="<?php if (!empty($emp_data->edara_n)) {
                                       echo $emp_data->edara_n;
                                   }  ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> القسم</label>
                            <input name="qsm_n" id="qsm_n" class="form-control"
                                   value="<?php if (!empty($emp_data->qsm_n)) {
                                       echo $emp_data->qsm_n;
                                   }  ?>" readonly>
                        </div>
       
                      
                        </div>
                        <!-- yraaaaaaaaaaaaaaaaaa_admin -->
                            <?php }
 ?>

</div>
</div>
</div>
</div>
<div id="ezn_Modal_body_tabel">
                    <?php
                        if (isset($allData_added)&&!empty($allData_added)) {
                
                    ?>
                 
                    <div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">  طلبات تغيير  الحساب البنكي </h3>
        </div>
        <div class="panel-body">
                    <table id="" class=" example display table table-bordered responsive nowrap text-center" id="banktable"
                           cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="greentd">
                        </tr>
                        <tr class="greentd">
						
                            <th>م   </th>
                            <th>رقم الطلب </th>
                            <th> تاريخ الطلب </th>
                            <th>إسم الموظف </th>
							<th>المسمي الوظيفي</th>
							<th>الاداره </th>
							<th>القسم </th>
                            <th>صوره الحساب</th>
                                <th>الاجراء</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        <?php
						$x=0;
                        foreach ($allData_added as  $value) {
						$x++;
                            ?>
                            <tr><td>
                                    <?= $x ?>
                             </td>
                            
                                <td>
                               <?= $value->rkm ?>
                                </td>
                                <td>
                               <?= $value->order_date ?>
                                </td>
                                <td>
                                    <?= $value->new_emp_bank_name ?>
                                </td>
                                <td>
                                <?= $value->mosma_wazefy_n ?>
                                </td>
								<td>
                                <?= $value->edara_n ?>
                                </td>
								<td>
                                <?= $value->qsm_n ?>
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
                               
                                <td>

                               
<!-- yarraa -->

                                
                                     

                                  

    <div id="send_all">
<?php if( $value->suspend==0){
    ?>
                                <!-- <button class="btn btn-info" 
                                   onclick="send_all( <?= $value->id; ?>,<?=$value->emp_id?>)">
                                   اعتماد الطلب </button> -->
<?php }else if( $value->suspend==4){?>
   <span style="font-size: medium;background: green;" class="badge badge-warning" > تم  الاعتماد بالموافقه </span>

 <?php }else if( $value->suspend==2){?>
   <span style="font-size: medium;background: red;" class="badge badge-warning" >  تم  الاعتماد بالرفض </span>
 <?php } ?>

</div>

<a onclick="print_eqrar(<?= $value->id ?>)"><i
                                            class="fa fa-print"></i></a>
    <a data-toggle="modal" 
                                       onclick="edite_bank(<?php echo $value->id; ?>);"
                                       data-target="#modal-info"
                                     
                                       >
                                       <i class="fa fa-pencil"> </i></a>   
                                    
                                    <a onclick='deleteFinanceEmp(<?php echo $value->id; ?>,<?php echo $value->emp_id; ?>)
                                            '><i class="fa fa-trash"
                                                 aria-hidden="true"></i>
                                    </a>
                                
<!-- yarraaa -->

                                </td>
                            </tr>
							 <?php
                        
                        }
                        ?>
                        </tbody>
                      
                    </table>
                    </div>
                    </div>
                    </div>
                  
                    <?php }?>
                    </div>
					<!-- yarraaaa -->
              
                    <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 80%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close"
                                                onclick="$('#myModal_emps').modal('hide')"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div id="myDiv_emp"></div>
                                    </div>
                                    <div class="modal-footer" style="display: inline-block;width: 100%">
                                        <button type="button" class="btn btn-danger"
                                                style="float: left;" onclick="$('#myModal_emps').modal('hide')">
                                            إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>
    function change_banks(emp_id) {
        // var all_inputs = $(' [estktat3 data-validation="required"]');
        var all_inputs = $(' #change_banks [data-validation="required"]');
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
        var files = $('#userfile')[0].files;
        form_data.append("userfile", files[0]);
        var serializedData = $('.change_banks').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/emp_banks/Emp_banks_c/change_banks_employee',
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
                var all_inputs_set = $('.banks .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    //get_add();
                });
                get_bank();
             get_details_banks(emp_id);
                if (html == 1) {
                   
                }
            }
        });
    }
</script>


<script>
    function edite_bank(id) {
      
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/edite_bank",
            beforeSend: function () {
                $('#bank_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#bank_edite').html(d);
            }
        });
    }
</script>
<script>
    function suspend_bank(id) {
      
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/suspend_bank",
            beforeSend: function () {
                $('#bank_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#bank_edite').html(d);
            }
        });
    }
</script>
<script>
    function edite_banks(emp_id) {
        // var all_inputs = $(' [estktat3 data-validation="required"]');
        var all_inputs = $(' #change_banks [data-validation="required"]');
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
        var files = $('#userfile')[0].files;
        form_data.append("userfile", files[0]);
        var serializedData = $('.change_banks').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/emp_banks/Emp_banks_c/edite_banks_employee',
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
                var all_inputs_set = $('.form-control .banks ');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    //get_add();
                });
             get_details_banks(emp_id);
             get_bank();
                if (html == 1) {
                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>
<script>
    function get_code_bank(id) {
        var valu = $("#bank_id_fk" + id).find('option:selected').attr('bank_code');
        $('#bank_code2' + id).val(valu);
    }
</script>

<script>
    function deleteFinanceEmp(id, emp_id) {
        swal({
                title: "هل انت متاكد من الحذف?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم!",
                cancelButtonText: "لا!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>human_resources/employee_forms/emp_banks/Emp_banks_c/deleteFinanceEmp',
                        data: {id: id, emp_id: emp_id},
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
                            get_details_banks(emp_id);
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>

<script>
function get_bank() {
        $('#modal_header').text('طلب تغيير الحساب البنكي');
        $.ajax({
            type: 'post',
         
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/change_bank_form",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
</script>
<script>
    function get_details_banks(emp_id) {
      //  $('#show_details_estktat3').show();
        $.ajax({
            type: 'post',
            data: {emp_id: emp_id},
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/load_details_banks",
            beforeSend: function () {
                $('#ezn_Modal_body_tabel').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body_tabel').html(d);
            }
        });
    }
</script>

<script>
            function GetDiv_emps(div) {
                html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                    '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف  </th><th style="width: 50px;"> أسم الموظف  </th>' +
                    '<th style="width: 170px;" >الأدارة   </th>' +
                    '<th style="width: 170px;" >القسم</th>' +
                    '</tr></thead><table><div id="dataMember"></div></div>';
                $("#" + div).html(html);
                $('#js_table_members2').show();
                var oTable_usergroup = $('#js_table_members2').DataTable({
                    dom: 'Bfrtip',
                    "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/emp_banks/Emp_banks_c/getConnection_emp/',
                    aoColumns: [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}
                    ],
                    buttons: [
                        'pageLength',
                        'copy',
                        'excelHtml5',
                        {
                            extend: "pdfHtml5",
                            orientation: 'landscape'
                        },
                        {
                            extend: 'print',
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true,
                    destroy: true,
                    "order": [[1, "asc"]]
                });
            }
            //8-6-om
            function Get_emp_Name(obj) {
                console.log(' obj :' + obj.dataset.name + ': ');
                var name = obj.dataset.name;
                var emp_code = obj.dataset.emp_code;
                var edara_id = obj.dataset.edara_id;
                var edara_n = obj.dataset.edara_n;
                var job_title = obj.dataset.job_title;
                var qsm_id = obj.dataset.qsm_id;
                var qsm_n = obj.dataset.qsm_n;
              
                document.getElementById('emp_n').value = name;
                document.getElementById('emp_id').value = obj.value;
                document.getElementById('emp_code').value = emp_code;
               
                $('#emp_id_fk').val(obj.value);
               

                document.getElementById('edara_n').value = edara_n;
           
                document.getElementById('mosma_wazefy_n').value = job_title;
                document.getElementById('qsm_n').value = qsm_n;
               
                // $("#myModal_emps")modal.('hide');
                $("#myModal_emps .close").click();
                get_emp_bank(obj.value);
            }
        </script>

<script>
function get_emp_bank(emp_id) {
        $('#modal_header').text('طلب تغيير الحساب البنكي');
        $.ajax({
            type: 'post',
         
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/get_bank_form",
            data: {emp_id: emp_id},
            beforeSend: function () {
                $('#Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
</script>
<!-- send_all -->
<!-- send_al -->
<script>
    function send_all(id,emp_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/send_all",
            data: {id: id,emp_id:emp_id},
            
            success: function (msg) {
                $('#send_all').html('  <span style="font-size: medium;background: green;" class=" badge badge-success">تم  الاعتماد</span>');
                //$('#send_all').html('<span style="color:green;">تم  الاعتماد</span>');
            }
        });
    }
</script>

<script>
    function print_eqrar(id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/emp_banks/Emp_banks_c/print_eqrar'?>",
            type: "POST",
            data: {id: id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }


</script> 