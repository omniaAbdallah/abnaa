<div class="col-sm-12 col-md-12 col-xs-12  " style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>إعدادت الإدارات و الاقسام</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12">


                <ul class="nav nav-tabs">
                    <!-- <li class="active"><a href="#tab_main_department" data-toggle="tab"> الإدارات</a></li>
                    <li><a href="#tab_sub_department" data-toggle="tab"> الاقسام</a></li> -->

                    <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_main_department"';} ?>  aria-controls="tab_main_department" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الإدارات</a>
        </li>
        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_sub_department"';} ?>  aria-controls="tab_sub_department" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الأقسام</a>
        </li>

                </ul>

                <div class="tab-content">
               <div class="tab-pane fade in <?php if(isset($typee) && empty($typee)|| $typee === "tab_main_department") {echo  'active'; }  ?>" id="tab_main_department">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الإدارات</strong></a>
                               
                                    <?php
                                    if(isset($mainDepartment) && !empty($mainDepartment) && $mainDepartment!=null){
                                        echo form_open_multipart('human_resources/Edarat_aqsam/UpdateMainDepartmentSitting/'.$mainDepartment['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Edarat_aqsam/AddMainDepartmentSitting/tab_main_department');
                                    }
                                    ?>
                                    <!-- <div class="form-group col-sm-8 col-xs-12">
                                        <label class="label ">إسم الإدارة</label>
                                        <input type="text" name="name" value="<?php if(isset($mainDepartment)) echo $mainDepartment['name'] ?>" class="form-control " autofocus data-validation="required">
                                    </div> -->
                                 
                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">إسم الإدارة</label>
                            <input name="title" id="title" class="form-control" style="width:89%; float: right;"
                                   readonly
                                   data-validation="required"
                                   value="<?php if(isset($mainDepartment)) echo $mainDepartment['title'] ?>">
                                   <input type="hidden" id="title_id" name="title_id"
value="<?php if (!empty($mainDepartment['title_id'])) {
    echo $mainDepartment['title_id'];
}  ?> ">
<input type="hidden" id="title_code" name="title_code"
value="<?php if (!empty($mainDepartment['title_code'])) {
    echo $mainDepartment['title_code'];
}  ?>  ">

                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: left;"
                                    onclick="GetDiv_emps('myDiv_emp')">
                                <i class="fa fa-plus"></i></button>
                        </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                        id="order_edara"
                                               value="<?php if(isset($mainDepartment)) echo $mainDepartment['trteeb'] ?>" onkeypress="validate_number(event);"
                                               class="form-control "  
                                              
                                            onchange="Checkcode();"
                                               
                                               data-validation="required">
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
                                                <th > الترتيب </th>
                                                <th>الإدارة</th>
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
                                                        <?=($x++)?>
                                                    </td>
                                                    <td><?php echo $value->trteeb; ?></td>
                                                    <td><?=$value->title?></td>
            <td>
                <?php if($value->count>0 ){?>
                    <button class="btn btn-sm btn-danger"> لا يمكن الحذف </button>
                      <!-- <a href="<?php echo base_url().'human_resources/Edarat_aqsam/UpdateMainDepartmentSitting/'.$value->id."/tab_main_department"  ?>" title="تعديل" >
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a> -->

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
        window.location="<?php echo base_url().'human_resources/Edarat_aqsam/UpdateMainDepartmentSitting/'.$value->id."/tab_main_department"  ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
                    
                <?php }else{?>
              
                <!-- <a href="<?=base_url()."human_resources/Edarat_aqsam/DeleteMainDepartmenSitting/tab_main_department/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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
        setTimeout(function(){window.location="<?=base_url()."human_resources/Edarat_aqsam/DeleteMainDepartmenSitting/tab_main_department/".$value->id?>";}, 500);
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
        window.location="<?php echo base_url().'human_resources/Edarat_aqsam/UpdateMainDepartmentSitting/'.$value->id."/tab_main_department"  ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
                <? } ?>
            </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                
                            </div>
                        </div>
                   

<div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_sub_department") {echo  'active'; }  ?>" id="tab_sub_department">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الاقسام</strong></a>
                               
                                    <?php
                                    if(isset($subDepartment) && !empty($subDepartment) && $subDepartment!=null){
                                        echo form_open_multipart('human_resources/Edarat_aqsam/UpdateSubDepartmentSitting/'.$subDepartment['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Edarat_aqsam/AddSubDepartmentSitting/tab_sub_department');
                                    }
                                    ?>
                                    <div class="form-group col-sm-5 col-xs-12">
                                        <label class="label ">الإادرة</label>
                                        <select  name="from_id_fk" id="from_id_fk"   class="form-control  selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                                            <option value="">إختر </option>
                                            <?php foreach ($mainDepartments as $value){
                                                $select=''; if(!empty($subDepartment)){ if($subDepartment['from_id_fk'] == $value->id){$select='selected';} }
                                                ?>
                                                <option value="<?php echo $value->id; ?>"<?= $select?> <?php ?>><?php echo  $value->title;?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group col-sm-5 col-xs-12">
                                        <label class="label ">القسم</label>
                                        <input type="text" name="name" value="<?php if(isset($subDepartment)) echo $subDepartment['name'] ?>" class="form-control " autofocus data-validation="required">
                                    </div> -->
                                    <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> القسم</label>
                            <input name="title" id="title_sub" class="form-control" style="width:89%; float: right;"
                                   readonly
                                   data-validation="required"
                                   value="<?php if(isset($subDepartment)) echo $subDepartment['title'] ?>">
                                   <input type="hidden" id="title_id_sub" name="title_id"
value="<?php if (!empty($subDepartment['title_id'])) {
    echo $subDepartment['title_id'];
}  ?> ">
<input type="hidden" id="title_code_sub" name="title_code"
value="<?php if (!empty($subDepartment['title_code'])) {
    echo $subDepartment['title_code'];
}  ?>  ">

                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: left;"
                                    onclick="GetDiv_sub('myDiv_emp')">
                                <i class="fa fa-plus"></i></button>
                        </div>
                                    <div class="form-group col-sm-2 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                        id="order_qsm"
                                        onchange="Checkcode_qsm();"
                                               value="<?php if(isset($subDepartment)) echo $subDepartment['trteeb'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_main_department" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if(isset($subDepartments) && $subDepartments!=null){?>

                                        <table id="" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr class="greentd">
                                                <th class="text-center"> م </th>
                                                <th class="text-center"> الإدارة </th>
                                                <th class="text-center"> القسم </th>
                                                <th class="text-center"> الاجراء </th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">

                                            <?php
                                            $a=1;
                                            foreach ($subDepartments as $record ) {
                                                $max=1;
                                                 if(!empty($record->sub_departments) > 0){
                                                    $max =sizeof($record->sub_departments);
                                                 }
                                                 ?>
                                                <tr>
                                                <td rowspan="<?php echo $max ?>"><?php echo $a++ ?></td>

                                                <td rowspan="<?php echo $max ?>"><?php echo $record->title; ?></td>
                                                <?php if (!empty($record->sub_departments)) {
                                                    foreach ($record->sub_departments as $sub) { ?>

                                                        <td> <?php echo $sub->title; ?> </td>

        <td data-title="التحكم" class="text-center">
            <!-- <a href="<?php echo base_url('human_resources/Edarat_aqsam/UpdateSubDepartmentSitting') . '/' . $sub->id . '/tab_sub_department' ?>"
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
        window.location="<?php echo base_url('human_resources/Edarat_aqsam/UpdateSubDepartmentSitting') . '/' . $sub->id . '/tab_sub_department' ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>



<!-- <a href="<?=base_url()."human_resources/Edarat_aqsam/DeleteSubDepartmentSitting/tab_sub_department/".$sub->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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
        setTimeout(function(){window.location="<?=base_url()."human_resources/Edarat_aqsam/DeleteSubDepartmentSitting/tab_sub_department/".$sub->id?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>                           
                                 
                                 
        </td>
                                                        </tr>
                                                    <?php }
                                                } else { ?>
                                                    <td> لايوجد أقسام</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-danger">لا يوجد الحذف والتعديل
                                                        </button>
                                                    </td>
                                                    </tr>
                                                <?php } ?>
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
           <h4 class="modal-title" id="myModalLabel">الهيكل الإداري</h4>
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
                    '<thead><tr class="info"><th style="width: 50px;">م</th><th style="width: 50px;"> كود الأدارة  </th><th style="width: 50px;"> أسم الأدارة  </th>' +
                    
                    '</tr></thead><table><div id="dataMember"></div></div>';
                $("#" + div).html(html);
                $('#js_table_members2').show();
                var oTable_usergroup = $('#js_table_members2').DataTable({
                    dom: 'Bfrtip',
                    "ajax": '<?php echo base_url(); ?>human_resources/Edarat_aqsam/getConnection_emp/',
                    aoColumns: [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                     
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
               
                var title_id = obj.dataset.title_id;
                var title = obj.dataset.name;
                var code = obj.dataset.code;
              
                document.getElementById('title_id').value = title_id;
                document.getElementById('title').value = title;
                document.getElementById('title_code').value = code;
               
                $("#myModal_emps .close").click();
            }
        </script>

        <!--  -->
        <script>
            function GetDiv_sub(div) {
                html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                    '<thead><tr class="info"><th style="width: 50px;">م</th><th style="width: 50px;"> كود الأدارة  </th><th style="width: 50px;"> أسم الأدارة  </th>' +
                    
                    '</tr></thead><table><div id="dataMember"></div></div>';
                $("#" + div).html(html);
                $('#js_table_members2').show();
                var oTable_usergroup = $('#js_table_members2').DataTable({
                    dom: 'Bfrtip',
                    "ajax": '<?php echo base_url(); ?>human_resources/Edarat_aqsam/getConnection_sub/',
                    aoColumns: [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                     
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
            function Get_sub(obj) {
               
                var title_id = obj.dataset.title_id;
                var title = obj.dataset.name;
                var code = obj.dataset.code;
              
                document.getElementById('title_id_sub').value = title_id;
                document.getElementById('title_sub').value = title;
                document.getElementById('title_code_sub').value = code;
               
                $("#myModal_emps .close").click();
            }
        </script>

        <!-- yara -->

<script>
    function Checkcode() {
    //    var national_id_type = $('#national_id_type').val();
      var  prog_code= $('#order_edara').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Edarat_aqsam/Checkcode',
            data: {prog_code:prog_code},
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
                    $('#order_edara').val('');

                } else if (html == 0) {
                    //swal("   ترتيب  جديد","", "scuess");
                    swal("   ترتيب  جديد    ","", "success");
                    $('#order_edara').val(prog_code);
                  
                }
            }
        });
    }
</script>


<script>
    function Checkcode_qsm() {
    var from_id_fk = $('#from_id_fk').val();

   if(from_id_fk !='')
   {
      var  prog_code= $('#order_qsm').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Edarat_aqsam/Checkcode_qsm',
            data: {prog_code:prog_code,from_id_fk:from_id_fk},
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
                $('#order_qsm').val('');

            } else if (html == 0) {
                //swal("   ترتيب  جديد","", "scuess");
                swal("   ترتيب  جديد    ","", "success");
                $('#order_qsm').val(prog_code);
              
            }
        }
            
        });

   }
 else  {
    swal(" برجاء ادخال اداره     ","", "error");
    $('#order_qsm').val('');
   }
    }
</script>