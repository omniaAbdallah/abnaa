<style type="text/css">
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    .table-result.table > thead > tr > td.info, .table-result.table > tbody > tr > td.info,
    .table-result.table > tfoot > tr > td.info, .table-result.table > thead > tr > th.info,
    .table-result.table > tbody > tr > th.info, .table-result.table > tfoot > tr > th.info,
    .table-result.table > thead > tr.info > td, .table-result.table > tbody > tr.info > td,
    .table-result.table > tfoot > tr.info > td, .table-result.table > thead > tr.info > th,
    .table-result.table > tbody > tr.info > th, .table-result.table > tfoot > tr.info > th {
        background-color: #4f7b00;
        color: #fff;
    }

    .table-striped > tbody > tr:nth-child(odd) > td,
    .table-striped > tbody > tr:nth-child(odd) > th {
        background-color: #edffce;
    }
</style>
<style type="text/css">

    button[type=submit] {

        background-color: #3c990b;
        border: 1px solid transparent;
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border-radius: 4px;
        padding-top: 0;
        padding-bottom: 0;
    }

    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    table .headtr > td, table .headtr > th {
        /* background-color: #c1ccaf !important;
         color: #222 ;*/
        color: #d00303 !important;
        background-color: white !important;
    }

    table .headtr2 > td, table .headtr2 > th {
        background-color: #ffa7a7 !important;
        color: #222;
    }

    table tr > td, table tr > th {

        border: 2px double #000 !important;
    }

    .table-mehwer tr > td textarea {
        /* background-color: #dbecbd;*/
        background-color: #ffffff;
        color: green;
    }

    .table > tbody > tr > th, .table > tfoot > tr > th,
    .table > thead > tr > td, .table > tbody > tr > td,
    .table > tfoot > tr > td {

        padding: 5px !important;
    }

    table .left-headtr > td, table .left-headtr > th {
        background-color: #f2a516;
    }

    .left-headtr label.label {
        text-align: center !important;
        color: #000 !important;
    }

    .fa-plus.sspan {
        background-color: #5b69bc;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
    }
</style>


<div class="col-sm-12 no-padding ">
    <div class="col-sm-12 ">
        <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?></h3>
            </div>
            <div class="panel-body">
                <?php if (!empty($last_galsa)) { ?>
                    <?php

                    echo form_open_multipart(base_url() . 'md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/mehwr_glsa/'.$last_galsa, array('id' => 'myform'));

                    ?>
                    <div class="col-sm-12">

                        <table class="table table-striped table-bordered table-result" id="mytable">
                            <thead>
                            <tr class="info">
                                <th>رقم المحور</th>
                                <th style="width: 60%;">عبارة عن</th>
                                <th> المرفق</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="resultTable">
                            <?php
                            $counter = 1; ?>
                            <tr id="<?= $counter ?>">
                                <td style="width: 100px;"><input type="text" name="mehwar_rkm[]"
                                                                 data-validation="required"
                                                                 class="form-control text-center" value="1"></td>
                                <td>
                                    <input type="text" name="mehwar_title[]" data-validation="required"
                                           class="form-control text-center">
                                </td>
                                <td>
                                    <input type="file" name="mehwar_morfaq[]" class="form-control ">
                                </td>

                                <td>
                                    <a href="#" onclick="add_row();$(this).remove();"><i
                                            class="fa fa-plus sspan"></i></a>
                                    <a class="" id="deleteRow" href="#" onclick="$('#1').remove(); ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                </td>
                            </tr>


                            </tbody>
                            <tfoot>
                            <td colspan="4">
                                <input type="hidden" name="btn" value="btn">
                                <button type="button" onclick="check_button()" style="float: left;margin-left: 60px"
                                        class="btn-success btn-labeled btn" name="btn" value="1">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </tfoot>
                            </td>

                        </table>
                        <!--                        25-7-om  -->
                    </div>
                    <?php echo form_close() ?>
                <?php } else {
                    echo '<div class="alert alert-danger"> لا توجد جلسات !!</div>';

                } ?>
            </div>
        </div>
    </div>
</div>


<div class="col-sm-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> محاور الجلسه</h3>
        </div>
        <div class="panel-body">
            <div id="members_data"> </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>


<script>
    $(document).ready(function() {
        get_table_mehwer(<?=$last_galsa?>);
    });
</script>


<script>
    function add_row() {
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length + 1;
        var dataString = 'length=' + len;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/get_table',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#resultTable").append(html);
            }
        });

    }

</script>


<script>


    function check_button() {
        var x = document.getElementById('resultTable');
        if (x.rows.length > 0) {
            $('#myform').submit();
        } else {

            alert("من فضلك أضف محاور للجلسة !!");
        }
    }

</script>

<script>

    function get_table_mehwer(glsa_rkm) {
        // $("#table_mehwer").show();

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/get_table_mehwer',
            data: {glsa_rkm: glsa_rkm},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (html) {
                $("#members_data").html(html);
            }
        });

    }
</script>
