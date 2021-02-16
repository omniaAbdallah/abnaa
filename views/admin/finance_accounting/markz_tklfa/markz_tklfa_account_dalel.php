<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading"><h3 class="panel-title"><?php echo $title ?> </h3></div>
        <div class="panel-body"><!-- Nav tabs -->

            <div class="col-xs-12 no-padding" id="form_div">
                <div class="col-sm-3  col-md-2 padding-4  form-group"><label class="label ">رقم الحساب </label>
                    <input type="text" class="form-control  " name="rkm_hesab" id="account_num"
                           data-validation="required" aria-required="true" readonly="readonly"
                           ondblclick="$('#myModal').modal('show');load_account_tree()" style="width: 78%;float: right;"
                           style="cursor:pointer;" autocomplete="off" value=""><input type="hidden"
                                                                                      id="hesab_no3" value="">
                    <button type="button" onclick="$('#myModal').modal('show');load_account_tree()"
                            class="btn btn-success btn-next"><i class="fa fa-plus"></i></button>
                </div>
                <div class="col-sm-4  col-md-4 padding-4  form-group"><label class="label ">إسم
                        الحساب </label>
                    <input type="text" class="form-control " name="hesab_name" id="account"
                           data-validation="required" aria-required="true" readonly=""
                           value="" style="width: 100% !important;"></div>

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <label class="label "> مركز التكلفه</label>
                    <input id="markez_name" data-validation="required" aria-required="true" readonly="readonly"
                           class="form-control"
                           onclick="$('#myModal_markz_taklfaa').modal('show');load_mrakz()"
                           style="width: 78%;float: right;"/>
                    <button type="button" onclick="$('#myModal_markz_taklfaa').modal('show');load_mrakz()"
                            class="btn btn-success btn-next"><i class="fa fa-plus"></i></button>
                    <input type="hidden" id="markez">
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6" style="    margin-top: 26px;">
                    <div id="div_add_hesab" style="display: block;">
                        <button type="button" onclick="add_hesab()" class="btn btn-labeled btn-success "
                                name="save" value="save"><span class="btn-label"><i
                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 text-center" style="margin-top: 15px;"></div>
            <div id="my_hesab"><br><br>
                <?php if (!empty($hesabs)) {
                    $display_table = '';
                } else {
                    $display_table = 'none';
                } ?>
                <table id="js_table_customer" class="  table table-bordered table-striped" role="table"
                       style="display:<?= $display_table ?>;">
                    <thead>
                    <tr class="greentd">
                        <th class="text-center"> م</th>
                        <th class="text-center"> مركز التكلفه</th>
                        <th class="text-center"> رقم الحساب</th>
                        <th class="text-center"> اسم الحساب</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width: 70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">الدليل المحاسبي </h4></div>
                        <div class="modal-body" id="load_account_tree">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="myModal_markz_taklfaa" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width: 70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> مراكز التكلفة </h4>
                        </div>
                        <div class="modal-body" id="load_mrakz">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    <?php if (!empty($hesabs)) {?>
    $(document).ready(function () {
        set_table();
    });
    <?php }  ?>


    function set_table() {
        $('#js_table_customer').show('slow');
        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>finance_accounting/markz_tklfa/Markz_tklfaa_order/get_data',
            aoColumns: [{"bSortable": true}, {"bSortable": true}, {"bSortable": true}, {"bSortable": true}, {"bSortable": true}],
            buttons: ['pageLength', 'copy', 'excelHtml5', {
                extend: "pdfHtml5",
                orientation: 'landscape'
            }, {extend: 'print', exportOptions: {columns: ':visible'}, orientation: 'landscape'}, 'colvis'],
            colReorder: true,
            destroy: true
        });
        oTable_usergroup.on('order.dt search.dt', function () {
            oTable_usergroup.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }</script>
<script> function load_mrakz() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>finance_accounting/markz_tklfa/Markz_tklfaa_order/load_mrakz",
            beforeSend: function () {
                $('#load_mrakz').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_mrakz').html(d);
            }
        });
    }

    function load_account_tree() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>finance_accounting/markz_tklfa/Markz_tklfaa_order/load_account_tree",
            beforeSend: function () {
                $('#load_account_tree').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_account_tree').html(d);
            }
        });
    }</script>

<!-- hesab -->
<script>
    function add_hesab() {
        var markez = $('#markez').val();
        var account_num = $('#account_num').val();
        var hesab_no3 = $('#hesab_no3').val();
        var account = $('#account').val();
        var all_inputs = $(' #form_div [data-validation="required"]');
        var valid = 1;
        all_inputs.each(function (index, elem) {
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "#5cb85c");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        if (valid != 0) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>finance_accounting/markz_tklfa/Markz_tklfaa_order/add_hesab",
                type: "POST",
                data: {markez: markez, account_num: account_num, account: account, hesab_no3: hesab_no3},
                beforeSend: function () {
                    swal({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false

                    });
                },
                success: function (d) {
                    $('#markez').val(' ');
                   /* $('#markez_name').val(' ');
                    $('#account_num').val(' ');
                    $('#account').val(' ');*/
                    all_inputs.each(function (index, elem) {
                            $(elem).val('');
                            $(elem).css("border-color", "");
                    });
                    swal({
                        title: " تمت الاضافه بنجاح ",
                        type: "success",
                        confirmButtonClass: "btn-warning",
                        closeOnConfirm: false,
                        confirmButtonText: 'تم'

                    });

                    set_table();
                }
            });
        } else {
            swal({
                title: " برجاء ادخال  البيانات! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false,
                confirmButtonText: 'تم'

            });
        }
    }</script>


<script> function delete_hesab(id) {
        swal({
                title: "هل انت متأكد من الحذف ؟",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "حذف",
                cancelButtonText: "إلغاء",
                closeOnConfirm: true
            },
            function () {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>finance_accounting/markz_tklfa/Markz_tklfaa_order/delete_hesab',
                    data: {id: id},
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        swal({
                            title: 'تم الحذف بنجاح',
                            type: 'success',
                            confirmButtonText: 'تم'
                        });
                        set_table();
                    }
                });
            });

    }</script>