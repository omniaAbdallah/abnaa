<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?>
            </h3>
        </div>
        <div class="panel-body">
        <table id="js_table_customer" 
   
   class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th class="text-center"> رقم الطلب</th>
                    <th class="text-center"> تاريخ الطلب</th>
                    <th class="text-center">رقم الملف</th>
                    <th class="text-center">  مقدم الطلب</th>
                    <th class="text-center">   رقم الهوية</th>
                
                    <th class="text-center">     سبب الرفض </th>
                    <th class="text-center">     وقت الرفض</th>
                    <th class="text-center">      القائم بالاجراء</th>
                  
                   
                  
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body col-sm-12" id="detail_div">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>family_controllers/osr_ektfaa/Ektfaa_talab/data_refuse',
            
            
            
            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
               
                { "bSortable": true },
                 { "bSortable": true },
                   { "bSortable": true },
                     { "bSortable": true },
                         { "bSortable": true },
                            { "bSortable": true }
               
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
            exportOptions: { columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
        ],
        colReorder: true 
            
            
            
        });
    });
</script>
