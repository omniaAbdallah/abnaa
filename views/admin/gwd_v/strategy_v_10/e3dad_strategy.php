<!------ table -------->
    <div class="col-xs-12 no-padding">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

            <div class="panel-heading">

                <h3 class="panel-title">اعداد الخطط الاستراتيجيه  </h3>

            </div>

            <div class="panel-body" >

                <div class="col-md-12 no-padding">
                <table id="js_table_customer" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">

                        <thead>

                        <tr class="info">

                            <th class="text-center" style="width: 53px;">
                               م</th>


                           
                            <th class="text-center"> الخطه الاستراتيجية</th>
                            <th>  الفترِِة</th>
                           
                            <th class="text-center"> حاله الاجراء</th>
                            <th class="text-center">اعداد الخطه</th>

                        </tr>

                        </thead>
                    </table>



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
            "ajax": '<?php echo base_url(); ?>gwd/strategy/Strategy/data_e3dada',



            aoColumns:[
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

    function load_add_strategy() {
        $('#modal_header').text(' اضافه خطة استراتيجية');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gwd/strategy/Strategy/load_add_strategy",
            beforeSend: function () {
                $('#add_strategy_body').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function(d) {
                $('#add_strategy_body').html(d);
            }
        });
    }

    function get_strategy(id) {

        $("#Modal_strategy").modal('show');
        $('#modal_header').text(' تعديل خطة استراتيجية');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gwd/strategy/Strategy/load_add_strategy",
            data:{id:id},
            beforeSend: function() {
                $('#add_strategy_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function(d) {
                $('#add_strategy_body').html(d);
            }
        });

    }
    function delete_strategy(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/strategy/Strategy/delete_strategy',
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