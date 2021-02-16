<div class="col-sm-12 col-md-12 col-xs-12  " style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>إعدادت   اللجان</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12">
                <ul class="nav nav-tabs">
                    <!-- <li class="active"><a href="#tab_main_department" data-toggle="tab"> الإدارات</a></li>
                    <li><a href="#tab_sub_department" data-toggle="tab"> الاقسام</a></li> -->
                    <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_main_department"';} ?>  aria-controls="tab_main_department" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>أسماء اللجان</a>
        </li>
        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_sub_department"';} ?>  aria-controls="tab_sub_department" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>  أعضاء اللجان</a>
        </li>
                </ul>
                <div class="tab-content">
               <div class="tab-pane fade in <?php if(isset($typee) && empty($typee)|| $typee === "tab_main_department") {echo  'active'; }  ?>" id="tab_main_department">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>أسماء اللجان</strong></a>
                                    <?php
                                    if(isset($mainDepartment) && !empty($mainDepartment) && $mainDepartment!=null){
                                        echo form_open_multipart('human_resources/egtma3at/Setting/UpdateMainDepartmentSitting/'.$mainDepartment['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/egtma3at/Setting/AddMainDepartmentSitting/tab_main_department');
                                    }
                                    ?>
                                    <!-- <div class="form-group col-sm-8 col-xs-12">
                                        <label class="label ">إسم الإدارة</label>
                                        <input type="text" name="name" value="<?php if(isset($mainDepartment)) echo $mainDepartment['name'] ?>" class="form-control " autofocus data-validation="required">
                                    </div> -->
                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">إسم اللجنة</label>
                            <input name="title" id="title" class="form-control" style="width:89%; float: right;"
                                   
                                   data-validation="required"
                                   value="<?php if(isset($mainDepartment)) echo $mainDepartment['title'] ?>">
                                  
                        </div>
                                   
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_main_department" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($mainDepartments) && !empty($mainDepartments) && $mainDepartments !=null){ ?>
                                        <table class="example table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                             
                                                <th>إسم اللجنة</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($mainDepartments as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=$x?>
                                                    </td>
                                                 
                                                    <td><?=$value->title?></td>
            <td>
               
                <!-- <a href="<?=base_url()."human_resources/egtma3at/Setting/DeleteMainDepartmenSitting/tab_main_department/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                    <i class="fa fa-trash" aria-hidden="true"></i></a> -->
                    <a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?=base_url()."human_resources/egtma3at/Setting/DeleteMainDepartmenSitting/tab_main_department/".$value->id?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
    <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?php echo base_url().'human_resources/egtma3at/Setting/UpdateMainDepartmentSitting/'.$value->id."/tab_main_department"  ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
              
            </td>
                                                </tr>
                                            <?php $x++; } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                            </div>
                        </div>
<div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_sub_department") {echo  'active'; }  ?>" id="tab_sub_department">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i> أعضاء اللجان</strong></a>
                                    <?php
                                    if(isset($subDepartment) && !empty($subDepartment) && $subDepartment!=null){
                                        echo form_open_multipart('human_resources/egtma3at/Setting/UpdateSubDepartmentSitting/'.$subDepartment['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/egtma3at/Setting/AddSubDepartmentSitting/tab_sub_department');
                                    }
                                    ?>
                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label class="label ">إسم اللجنة</label>
                                        <select  name="lagna_id_fk" id="lagna_id_fk"   class="form-control  selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                                            <option value="">إختر </option>
                                            <?php foreach ($mainDepartments as $value){
                                                $select=''; if(!empty($subDepartment)){ if($subDepartment['lagna_id_fk'] == $value->id){$select='selected';} }
                                                ?>
                                                <option value="<?php echo $value->id; ?>"<?= $select?> <?php ?>><?php echo  $value->title;?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                  <!--  -->
                                  <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">اسم الموظف</label>
                            <input name="emp_name" id="emp_name" class="form-control" style="width:89%; float: right;"
                                   readonly
                                   data-validation="required"
                                   value="<?php if (!empty($subDepartment['emp_name'])) {
                                      
                                       echo $subDepartment['emp_name'];
                                       
                                   } ?>">
                                   <input type="hidden" id="emp_id_fk" name="emp_id_fk"
value="<?php if (!empty($subDepartment['emp_id_fk'])) {
                                      
                                      echo $subDepartment['emp_id_fk'];
                                      
                                  } ?> ">
<input type="hidden" id="edara_id_fk" name="edara_id_fk"
value="<?php if (!empty($subDepartment['edara_id_fk'])) {
                                      
                                      echo $subDepartment['edara_id_fk'];
                                      
                                  } ?>">

<input type="hidden" id="qsm_id_fk" name="qsm_id_fk"
value="<?php if (!empty($subDepartment['qsm_id_fk'])) {
                                      
                                      echo $subDepartment['qsm_id_fk'];
                                      
                                  } ?>">
<input type="hidden" id="mosma_wazefy_id" name="mosma_wazefy_id"
value="<?php if (!empty($subDepartment['mosma_wazefy_id'])) {
                                      
                                      echo $subDepartment['mosma_wazefy_id'];
                                      
                                  } ?>">
                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: left;"
                                    onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                                echo 'disabled';
                            } ?>>
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">  كود الموظف</label>
                            <input name="emp_code_fk" id="emp_code" class="form-control"
                            data-validation="required"
                                   value="<?php if (!empty($subDepartment['emp_code'])) {
                                      
                                      echo $subDepartment['emp_code'];
                                      
                                  } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> المسمى الوظيفي</label>
                            <input name="mosma_wazefy_n" id="job_title" class="form-control"
                                   value="<?php if (!empty($subDepartment['mosma_wazefy_n'])) {
                                      
                                      echo $subDepartment['mosma_wazefy_n'];
                                      
                                  } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الأدارة </label>
                            <input name="edara_n" id="edara_n" class="form-control"
                                   value="<?php if (!empty($subDepartment['edara_n'])) {
                                      
                                      echo $subDepartment['edara_n'];
                                      
                                  } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
<label class="label "> القسم</label>
<input name="qsm_n" id="qsm_n" class="form-control"
       value="<?php if (!empty($subDepartment['qsm_n'])) {echo $subDepartment['qsm_n'];} ?>" readonly>
</div>
<div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_main_department" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
            </div>
                                   <!--  -->
                                   
                                    </form>
                                    <?php if(isset($subDepartments) && $subDepartments!=null){?>
                                        <table id="" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr class="greentd">
                                                <th class="text-center"> م </th>
                                                <th class="text-center"> إسم اللجنة </th>
                                                <th class="text-center">كود الموظف</th>
                                                <th class="text-center">اسم الموظف</th>
                                                <th class="text-center"> الأدارة</th>
                                                <th class="text-center">القسم</th>
                                                <th class="text-center">المسمى الوظيفي</th>
                                                <th class="text-center"> الاجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php
                                            $a=1;
                                            foreach ($subDepartments as $value ) {
                                                
                                                 ?>
                                                <tr>
                                                <td> <?php echo $a; ?> </td>
                            <td> 
                            <?php foreach ($mainDepartments as $valuee){
                                                $select=''; if(!empty($value->lagna_id_fk)){ if( $value->lagna_id_fk== $valuee->id){echo $valuee->title;} }
                            }?>
                                               
                                           
                            
                            
                             </td>
                            <td><?= $value->emp_code ?></td>
                            <td><?= $value->emp_name ?></td>
                            <td><?php 
                            if(isset($value->edara_n)&&!empty($value->edara_n)) 
                            echo $value->edara_n ;
                            else echo 'غير محدد';
                            ?></td>
                            <td>
                            <?php 
                            if(isset($value->qsm_n)&&!empty($value->qsm_n)) 
                            echo $value->qsm_n ;
                            else echo 'غير محدد';
                            ?>
                            </td>
                            <td>
                            <?php 
                            if(isset($value->mosma_wazefy_n)&&!empty($value->mosma_wazefy_n)) 
                            echo $value->mosma_wazefy_n ;
                            else echo 'غير محدد';
                            ?>
                            </td>
        <td data-title="التحكم" class="text-center">
            <!-- <a href="<?php echo base_url('human_resources/egtma3at/Setting/UpdateSubDepartmentSitting') . '/' . $value->id . '/tab_sub_department' ?>"
               title="تعديل"> <i class="fa fa-pencil-square-o"
                                 aria-hidden="true"></i> </a> -->
                                 <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?php echo base_url('human_resources/egtma3at/Setting/UpdateSubDepartmentSitting') . '/' . $value->id . '/tab_sub_department' ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
<!-- <a href="<?=base_url()."human_resources/Edarat_aqsam/DeleteSubDepartmentSitting/tab_sub_department/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
    <i class="fa fa-trash" aria-hidden="true"></i></a> -->
    <a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?=base_url()."human_resources/egtma3at/Setting/DeleteSubDepartmentSitting/tab_sub_department/".$value->id?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>                           
        </td>
                                                        </tr>
                                                   
                                                <?php
                                                $a++;
                                            }  ?>
                                            </tbody>
                                        </table>
                                    <?php }
                                    ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 90%">
   <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" onclick="$('#myModal_emps').modal('hide')"
                   aria-label="Close"><span
                       aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"> الموظفين</h4>
       </div>
       <div class="modal-body">
           <div id="myDiv_emp"></div>
       </div>
       <div class="modal-footer" style="display: inline-block;width: 100%">
           <button type="button" class="btn btn-danger"
                   style="float: left;" onclick="$('#myModal_emps').modal('hide')">إغلاق
           </button>
       </div>
   </div>
</div>
</div>
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
                    "ajax": '<?php echo base_url(); ?>human_resources/egtma3at/Setting/getConnection_emp/',
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
                var job_id = obj.dataset.job_id;
                var qsm_id = obj.dataset.qsm_id;
                var qsm_n = obj.dataset.qsm_n;
                var start_work_date = obj.dataset.start_work_date;
                var card_num = obj.dataset.card_num;
                document.getElementById('emp_name').value = name;
                document.getElementById('emp_id_fk').value = obj.value;
                document.getElementById('emp_code').value = emp_code;
                //6-7-om
                $('#emp_id_fk').val(obj.value);
                //    check_vacation(obj.value);
                document.getElementById('edara_n').value = edara_n;
                document.getElementById('edara_id_fk').value = edara_id;
                document.getElementById('job_title').value = job_title;
                document.getElementById('mosma_wazefy_id').value = job_id;
                document.getElementById('qsm_n').value = qsm_n;
                document.getElementById('qsm_id_fk').value = qsm_id;
                // $("#myModal_emps")modal.('hide');
                $("#myModal_emps .close").click();
            }
        </script>