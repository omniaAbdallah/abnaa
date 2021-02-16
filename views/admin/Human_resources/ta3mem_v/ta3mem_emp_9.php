<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
                echo form_open_multipart('human_resources/ta3mem/Ta3mem_c/insert', array('id' => 'myform'));
                $date = date('Y-m-d');
                // $file_num = "";
                // $father_name = "";
            $emp_name = '';
            $card_num='';
            $emp_id_fk = '';
            $emp_code_fk = '';
            $edara_id_fk = '';
            $edara_n = '';
            $qsm_id_fk = '';
            $qsm_n = '';
            $mosma_wazefy_n='';
            $mosma_wazefy_id='';
                $details = "";
             //   $responsable_name = '';
            ?>
            <div class="col-sm-12 form-group">



      
                <div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label  ">تاريخ التعميم </label>
                    <input type="date" value="<?=date('Y-m-d');?>" name="ta3mem_date" id="ta3mem_date"
                           class="form-control ">
                </div>
        


                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الإدارة</label>
                            <input name="edara_n" id="edara_n" class="form-control" style="width:89%; float: right;"
                                   readonly
                                   data-validation="required"
                                   value="<?php if (!empty($emp_data->edara_n)) {
                                       echo $emp_data->edara_n;
                                   } else {
                                       echo $edara_n;
                                   } ?>">
                                 
<input type="hidden" id="edara_id_fk" name="edara_id_fk"
value="<?php if (!empty($emp_data->edara_id)) {
    echo $emp_data->edara_id;
} else {
    echo $edara_id_fk;
} ?>  ">


                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: left;"
                                    onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                                echo 'disabled';
                            } ?>>
                                <i class="fa fa-plus"></i></button>
                        </div>


                        <div class="col-sm-3  col-md-3 padding-4 ">
                    <label class="label  "> المرفق </label>
                    <input type="file" value="" name="file" id="file"    data-validation="required"
                           class="form-control ">
                </div>
                       
                        
                      
                       
           
                <div class="col-sm-6  col-md-12 padding-4 ">
                    <label class="label  ">الموضوع </label>
                    <!-- <input type="text" value="" name="details" id="editor1"
                           class="editor1"> -->
                           <textarea class="editor1"
                           data-validation="required"
                            id="editor1" name="subject" rows="2" style=""></textarea>

                </div>
                </div>
            <br>
            <br>
                            <div class="col-sm-12 form-group 4 text-center">
                                <button type="submit" 
                                        class="btn btn-labeled btn-success " name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>    حفظ
                                </button>
                            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<?php if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> إدارة التعميم</h3>
            </div>
            <div class="panel-body">
                <table id="" class="example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th class="text-center">تاريخ التعميم</th>
                        <th class="text-center"> الأدارة</th>
                        <th class="text-center">المرفق</th>
                        <th class="text-center"> عدد المشاهدات</th>

                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td><?= $value->ta3mem_date ?></td>
                            <td><?= $value->edara_n ?></td>
                        
                            
                            <td>
                        <?php
                        $file = $value->file;

                        if (!empty($file)) {
                            ?>
                            <?php
                            $type = pathinfo($file)['extension'];
                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                            $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                            if (in_array($type, $arry_images)) {
                                ?>
                                <?php if (!empty($file)) {
                                    $url = base_url() . 'uploads/human_resources/ta3mem/' . $file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>

                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
                            
                                <?php
                            } elseif (in_array(strtoupper($type), $arr_doc)) {
                                ?>
                               
                               
                                    
                                    <?php if (!empty($file)) {
                               
                                    $url =base_url().'human_resources/ta3mem/Ta3mem_c/read_file/'.$file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>

                                <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 


                                   
                                <?php
                            }
                        } else {
                            echo 'لا يوجد';
                        }
                        ?>

                    </td>
                            
                    <td>  
                    <?=$value->count_all;?>
                    </td>
                      
                             <td>  
                             <a >
                             </a>
                             <a data-toggle="modal" data-target="#myModal_details"
                                  
                                    onclick="get_all_data( <?=$value->id;?>)">
                                    <i class="fa fa-search"> </i> </a>

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
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/ta3mem/Ta3mem_c/Delete_namozeg/' . $value->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i>
    
    
    </a> 
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
<?php } ?>
<div class="modal fade" id="myModal_details" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 90%">
   <div class="modal-content">
       <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title" id="myModalLabel">تفاصيل</h4>
       </div>
       <div class="modal-body">
           <div id="result"></div>
       </div>
       <div class="modal-footer" style="display: inline-block;width: 100%">
       <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق
           </button>
       </div>
   </div>
</div>
</div>
<div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 90%">
   <div class="modal-content">
       <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title" id="myModalLabel"></h4>
       </div>
       <div class="modal-body">
           <div id="myDiv_emp"></div>
       </div>
       <div class="modal-footer" style="display: inline-block;width: 100%">
       <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق
           </button>
       </div>
   </div>
</div>
</div>
<script>
            function GetDiv_emps(div) {
                html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                    '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 170px;" >الأدارة   </th>' +                  
                    '</tr></thead><table><div id="dataMember"></div></div>';
                $("#" + div).html(html);
                $('#js_table_members2').show();
                var oTable_usergroup = $('#js_table_members2').DataTable({
                    dom: 'Bfrtip',
                    "ajax": '<?php echo base_url(); ?>human_resources/ta3mem/Ta3mem_c/getConnection_emp/',
                    aoColumns: [
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
              
                
                var edara_id = obj.dataset.edara_id;
                var edara_n = obj.dataset.edara_n;
                document.getElementById('edara_n').value = edara_n;
                document.getElementById('edara_id_fk').value = edara_id;
                $("#myModal_emps .close").click();
            }
        </script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script>
<script>
$('.checkbox_toggle').bootstrapToggle({
  on: 'نشط',
  off: 'غير نشط'
});
</script>
<script>
    function change_status(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/ta3mem/Ta3mem_c/change_status",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#status_hidden'+id).val(status);
                get_all_data();
            }
        });
    }
</script>
<script>
function get_all_data(id)
{
    $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/ta3mem/Ta3mem_c/get_all_data",
            data:{id:id},
            beforeSend: function () {
                $('#result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (msg) {
                $('#result').html(msg);
            }
        });
}
</script>

<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>
<script type="text/javascript">
CKEDITOR.replace('editor1');
CKEDITOR.add;
CKEDITOR.config.toolbar = [
    ['Styles', 'Format', 'Font', 'FontSize'],
    '/',
    ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],

    ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
];
</script>
<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>

    function show_bdf(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>