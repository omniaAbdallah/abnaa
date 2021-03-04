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
                
                    <th class="text-center">    محدد المقابلة</th>
                    <th class="text-center">     تاريخ المقابلة</th>
                    <th class="text-center">     وقت المقابلة</th>
                   
                    <th class="text-center">الإجراء</th>
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
            "ajax": '<?php echo base_url(); ?>family_controllers/osr_ektfaa/Ektfaa_talab/data',
            
            
            
            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
               
                { "bSortable": true },
                 { "bSortable": true },
                   { "bSortable": true },
                     { "bSortable": true },
                         { "bSortable": true },
                            { "bSortable": true },
                { "bSortable": false }
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
<!-- <script>
    var dataTable;
    document.addEventListener('DOMContentLoaded', function () {
        // $.noConflict();

        dataTable = $('#all_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url() . 'family_controllers/osr_ektfaa/Ektfaa_talab/fetch_all_data_accept'; ?>",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 10],
                    "orderable": false,
                },
            ],
            destroy:true
        });
    });
</script>
<script>
    function edite(id) {
        swal({
                title: "هل انت متأكد من التعديل ؟",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تعديل",
                cancelButtonText: "إلغاء",
                closeOnConfirm: false
            },
            function () {
                window.location = "<?= base_url() . 'family_controllers/osr_ektfaa/Ektfaa_talab/edite/'?>" + id;
            });
    }

    function delete_row(id) {
        swal({
                title: "هل انت متأكد من الحذف ؟",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "حذف",
                cancelButtonText: "إلغاء",
                closeOnConfirm: false
            },
            function () {
                swal("تم الحذف!", "", "success");
                setTimeout(function () {
                    window.location = "<?= base_url() . 'family_controllers/osr_ektfaa/Ektfaa_talab/Delete/'?>" + id;
                }, 500);
            });
    }

    function get_single_data(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/get_single_data',
            data: {id: id},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#detail_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#detail_div").html(html);
            }
        });
    }

</script>


 -->
