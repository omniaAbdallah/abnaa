<!------ table -------->
    <div class="col-xs-12 no-padding">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

            <div class="panel-heading">

                <h3 class="panel-title">الخطط التشغيلية </h3>

            </div>

            <div class="panel-body" >

                <div class="col-md-12 no-padding">
                <table id="js_table_customer" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">

                        <thead>

                        <tr class="info">

                            <th class="text-center" style="width: 53px;">
                                <button type="button" data-toggle="modal" data-target="#Modal_strategy"
                                        onclick="load_add_tashgly();"
                                        class="btn btn-success btn-next" style="float: right;">
                                    <i class="fa fa-plus"></i>  </button></th>


                          
                            <th class="text-center"> الخطة التشغيلية</th>
                            <th>  الفترة</th>
                         
                            <th>مراجع الخطة</th>
                            <th>معتمد الخطة</th>
                            <th>  إضافه برامج الخطة</th>
                            <th class="text-center">الاجراءات</th>

                        </tr>

                        </thead>
                    </table>



                </div>

            </div>

        </div>

    </div>

<div class="modal fade" id="Modal_strategy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal_header"> إنشاءخطط تشغيلية</h4>
            </div>
            <div class="modal-body">
                <div id="add_strategy_body">
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <input type="hidden" name="id" id="id" >
                <button type="button" onclick="save_strategy();" class="btn btn-labeled btn-success"
                        name="saves" id="saves" value="save" data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>    إضافه </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal"><span
                            class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>



            </div>
        </div>
    </div>
</div>

<!----- end table ------>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php

//echo $customer_js;

?>
<script type="text/javascript">
    $(document).ready(function() {

        load_page();
    });
</script>
<script>
    function load_page(){

        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>gwd/Tashgly/data',



            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
              

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
            colReorder: true,
            destroy:true


        });

    }

    function load_add_tashgly() {
        $('#modal_header').text(' إنشاء خطط التشغيلية');
        // $('#saves').val('إضافه');
        $('#saves').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> إضافه ");

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gwd/Tashgly/load_add_tashgly",
            beforeSend: function () {
                $('#add_strategy_body').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function(d) {
                $('#add_strategy_body').html(d);
            }
        });
    }

    function get_tashgly(id) {

        $("#Modal_strategy").modal('show');
        $('#modal_header').text(' تعديل الخطط التشغيلية');
        //$('#saves').val('تعديل');
        $('#saves').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> تعديل ");

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gwd/Tashgly/load_add_tashgly",
            data:{id:id},
            beforeSend: function() {
                $('#add_strategy_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function(d) {
                $('#add_strategy_body').html(d);
            }
        });

    }
    function delete_tashgly(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Tashgly/delete_tashgly',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal("تم الحذف!", "", "success");
                load_page();
                //window.location.reload();

            }
        });

    }


</script> 