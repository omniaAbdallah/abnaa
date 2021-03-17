<div class="col-sm-12 col-md-12 col-xs-12  " style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>إعدادت  التقيمات للموظفين </h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12">


                

                <div class="tab-content">
               <div >
                            <div class="panel-body">
                                
                                    
                               
                                    <?php
                                    if(isset($mainDepartment) && !empty($mainDepartment) && $mainDepartment!=null){
                                        echo form_open_multipart('human_resources/egraat_settings/Taqeem_setting/UpdateMainDepartmentSitting/'.$mainDepartment['id']);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/egraat_settings/Taqeem_setting/AddMainDepartmentSitting');
                                    }
                                    ?>
                                  
                                  <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> عنصر التقييم</label>
                            <input name="item_name" id="item_name" class="form-control"
                            data-validation="required"
                            value="<?php if(isset($mainDepartment)) echo $mainDepartment['item_name'] ?>"> 
                            </div>

                            <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> شواهد التقييم</label>
                            <input name="shwahd" id="shwahd" class="form-control"
                            data-validation="required"
                            value="<?php if(isset($mainDepartment)) echo $mainDepartment['shwahd'] ?>"> 
                            </div>



                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> المسؤول</label>
                             <input name="masool_name" id="masool_name" class="form-control" style="width:89%; float: right;"
                                   readonly
                                   data-validation="required"
                                   value="<?php if(isset($mainDepartment)) echo $mainDepartment['masool_name'] ?>"> 
                            
<input type="hidden" id="masool_code" name="masool_code"
value="<?php if (!empty($mainDepartment['masool_code'])) {
    echo $mainDepartment['masool_code'];
}  ?>  ">

<input type="hidden" id="masool_id" name="masool_id"
value="<?php if (!empty($mainDepartment['masool_id'])) {
    echo $mainDepartment['masool_id'];
}  ?>  ">
                             <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: left;"
                                    onclick="GetDiv_emps('myDiv_emp')">
                                <i class="fa fa-plus"></i></button> 

                               
                        </div>

                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">  الدرجة العليا</label>
                            <input type="number" name="max_degree" id="max_degree" class="form-control"
                            data-validation="required"
                            value="<?php if(isset($mainDepartment)) echo $mainDepartment['max_degree'] ?>"> 
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
                                                <th> عنصر التقييم</th>
                                                <th>شواهد التقييم</th>
                                                
                                                <th>المسؤول</th>
                                                <th>  الدرجة العليا</th>
                                              
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
                                                    <td><?=$value->item_name?></td>
                                                    <td><?=$value->shwahd?></td>
                                                    <td><?=$value->masool_name?></td>
                                                    <td><?=$value->max_degree?></td>
            <td>
               
                <!-- <a href="<?=base_url()."human_resources/egraat_settings/Taqeem_setting/DeleteMainDepartmenSitting/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                    <i class="fa fa-trash" aria-hidden="true"></i></a> -->
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
        window.location="<?php echo base_url().'human_resources/egraat_settings/Taqeem_setting/UpdateMainDepartmentSitting/'.$value->id.""  ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
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
        setTimeout(function(){window.location="<?=base_url()."human_resources/egraat_settings/Taqeem_setting/DeleteMainDepartmenSitting/".$value->id?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
             
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
           <h4 class="modal-title" id="myModalLabel"> المسمي الوظيفي </h4>
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

<!--  -->
<script>
            function GetDiv_emps(div) {
                html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                    '<thead><tr class="info"><th style="width: 50px;">م</th><th style="width: 50px;"> كود المسمي الوظيفي  </th><th style="width: 50px;">  المسمي الوظيفي  </th>' +
                    
                    '</tr></thead><table><div id="dataMember"></div></div>';
                $("#" + div).html(html);
                $('#js_table_members2').show();
                var oTable_usergroup = $('#js_table_members2').DataTable({
                    dom: 'Bfrtip',
                    "ajax": '<?php echo base_url(); ?>human_resources/egraat_settings/Taqeem_setting/getConnection_emp/',
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
               
                var title_id = obj.dataset.id;
                var title = obj.dataset.name;
                var code = obj.dataset.code;
              
                document.getElementById('masool_id').value = title_id;
                document.getElementById('masool_name').value = title;
                document.getElementById('masool_code').value = code;
               
                $("#myModal_emps .close").click();
            }
        </script>

        <!--  -->
        