<div class="col-xs-12 no-padding">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">

            <h3 class="panel-title"><?php echo $title; ?></h3>

        </div>

        <div class="panel-body">

            <?php

            if (isset($emp) && $emp === 0) {

            } else {

                ?>

                <table id="js_table_ozonat"

                       style="width: 100% !important;"

                       class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">

                    <thead>

                    <tr class="greentd">

                        <th style="width: 20px;">م</th>

                        <th style="width: 90px;">نوع الاذن</th>

                        <th style="width: 90px;">تاريخ الاذن</th>

                        <th style="width: 200px;">اسم الموظف</th>

                        <th style="width: 80px;">بدايه الاذن</th>

                        <th style="width: 80px;">نهايه الاذن</th>

                        <th style="width: 80px;">المدة</th>

                        <!-- <th style="width: 120px;" >افاده شئون الموظفين</th> -->

                        <th style="width: 200px;"> الاجراء</th>

                        <th style="width: 120px;"> الطلب الأن عند</th>

                        <th style=""> حالة الطلب</th>

                    </tr>

                    </thead>

                </table>

                <?php

            }

            ?>

        </div>

    </div>

</div>


<!-- detailsModal -->

<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 85%;">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" onclick="$('#detailsModal').modal('hide')">&times;</button>

                <h4 class="modal-title"> التفاصيل </h4>

            </div>

            <div class="modal-body" id="details_result" style="width: 75%;">

            </div>

            <div class="modal-body" id="ozonat_result" style="width: 75%;">

            </div>

            <div class="modal-body" id="profile_result" style="    width: 25%;

    float: left;



    margin-top: -272px;">

            </div>

            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button

                        type="button" onclick="print_ezn(document.getElementById('row_id').value)"

                        class="btn btn-labeled btn-purple ">

                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعه الاذن

                </button>

                <button

                        type="button" onclick="print_ozonat(document.getElementById('emp_id').value)"

                        class="btn btn-labeled btn-purple ">

                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span> طباعه افاده شئوون الموظفين

                </button>

                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsModal').modal('hide')">

                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق

                </button>

            </div>

        </div>

    </div>

</div>

<!-- detailsModal -->

<!-- Ozonat_details Modal -->

<div class="modal fade" id="Ozonat_detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 70%;">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" onclick="$('#Ozonat_detailsModal').modal('hide')">&times;</button>

                <h4 class="modal-title"> التفاصيل </h4>

            </div>

            <div class="modal-body" id="ozonat_result">

            </div>

            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button

                        type="button" onclick="print_ozonat(document.getElementById('emp_id').value)"

                        class="btn btn-labeled btn-purple ">

                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة

                </button>

                <button type="button" class="btn btn-labeled btn-danger "
                        onclick="$('#Ozonat_detailsModal').modal('hide')">

                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق

                </button>

            </div>

        </div>

    </div>

</div>

<!-- Ozonat_details Modal -->

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>



<?php

if (!isset($_POST['from_profile'])) { ?>

    <script type="text/javascript">

        $(document).ready(function () {

            var oTable_usergroup = $('#js_table_ozonat').DataTable({

                dom: 'Bfrtip',

                "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/all_ozonat/Ezn_order/display_data',

                aoColumns: [

                    {"bSortable": true},

                    {"bSortable": true},

                    {"bSortable": true},

                    {"bSortable": true},

                    {"bSortable": true},

                    {"bSortable": true},

                    {"bSortable": true},

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

                scrollX: true

            });

        });

    </script>



<?php } ?>

<script>

    function print_ezn(row_id) {

        var request = $.ajax({

            url: "<?=base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/print_ezn'?>",

            type: "POST",

            data: {row_id: row_id},

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

<script>

    function print_ozonat(emp_id) {

        var request = $.ajax({

            url: "<?=base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/print_ozonat'?>",

            type: "POST",

            data: {emp_id: emp_id},

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

<script>

    function print_new_ezn(value) {

        var ezn_id = value;

        var request = $.ajax({

            // print_resrv -- print_contract

            url: "<?=base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/print_new_ezn'?>",

            type: "POST",

            data: {

                ezn_id: ezn_id

            },

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

<script>

    function load_page(row_id) {

        $.ajax({

            type: 'post',

            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_details",

            data: {row_id: row_id},

            beforeSend: function () {

                $('#details_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');

            },

            success: function (d) {

                $('#details_result').html(d);

            }

        });

    }

</script>

<?php

if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>

    <script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>

    <script>

        $('.example').DataTable({

            dom: 'Bfrtip',

            buttons: [

                'pageLength',

                'copy',

                'csv',

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

            colReorder: true

        });

    </script>

<?php } ?>

