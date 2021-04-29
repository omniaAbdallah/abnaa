<style>
    .radio label::before {
        content: none;
        display: inline-block;
        position: absolute;
        width: 20px;
        height: 20px;
        right: 0;
        margin-left: -20px;
        border: 1px solid #cccccc;
        border-radius: 50%;
        background-color: #fff;
        -webkit-transition: border 0.15s ease-in-out;
        transition: border 0.15s ease-in-out;
    }

    .radio input[type="radio"] {
        opacity: 1;
    }
</style>
<style type="text/css">
    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }

    .piece-box {
        /*margin-bottom: 12px;*/
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0;
        font-size: 17px;
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 2px solid #000 !important;
        }
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered.bor {
        border: 5px double #000;
    }

    .table-bordered.bor > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered.bor > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered.bor > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 2px solid #000;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }

    .bond-header {
        height: 100px;
        margin-bottom: 30px;
    }

    .bond-header .right-img img,
    .bond-header .left-img img {
        width: 100%;
        height: 100px;
    }

    .main-bond-title {
        display: table;
        height: 100px;
        text-align: center;
        width: 100%;
    }

    .main-bond-title h3 {
        display: table-cell;
        vertical-align: bottom;
        color: #d89529;
    }

    .main-bond-title h3 span {
        border-bottom: 2px solid #006a3a;
    }

    .green-border span {
        border: 3px solid #6abb46;
        padding: 10px;
        border-radius: 10px;
    }

    .btn-success {
        background-color: #3c990b !important;
        border-color: #12891b !important;
    }

    .btn-purple {
        background-color: #5b69bc !important;
        border-color: #4c59a7 !important;
    }
</style>
<style>
    .form-group .help-block.form-error {
        display: block !important;
        color: #a94442 !important;
        font-size: unset !important;
        position: unset !important;
    }
</style>

<div class="col-md-12 no-padding">
    <div class="panel panel-default">
        <div class="panel-heading">إجراءات علي طلب</div>
        <div class="panel-body">
            <?php echo form_open_multipart("family_controllers/Family_transformation/esnad_emp/", array('id' => 'transform_form')); ?>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">الموظف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> المسمي الوظيفي </label>
                                <select class="form-control  form-control-sm"
                                        data-validation="required"
                                        onchange="get_emp(this.value);">
                                    <option value=" ">اختر</option>
                                    <?php if (isset($departs) && !empty($departs)) {
                                        foreach ($departs as $row_departs) { ?>
                                            <option value="<?= $row_departs->code ?>"><?= $row_departs->title ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> الموظف </label>
                                <select class="form-control  form-control-sm" name="user_to"
                                        data-validation="required"
                                        id="user_to-7">
                                    <?php foreach ($mowazf as $item) { ?>
                                        <option value="<?= $item->person_id ?>"><?= $item->person_name ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> الاجراء </label>
                                <select class="form-control  form-control-sm"
                                        name="process_procedure_id_fk" data-validation="required">
                                    <option value=" ">اختر</option>
                                    <?php if (isset($select_process_procedures) && !empty($select_process_procedures)) {
                                        foreach ($select_process_procedures as $row_process_procedures) { ?>
                                            <option value="<?= $row_process_procedures->id ?>"><?= $row_process_procedures->title ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">المرئيات وإبداء الرأي</label>
                                <textarea class="form-control  " data-validation="required"
                                          id="exampleFormControlTextarea1" name="reason"
                                          rows="3"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" id="transform_btn" onclick="//check_befor_submit()"
                                    class="btn btn-labeled btn-success " name="save" value="save">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تحويل
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>

</div>
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
<script type="text/javascript">
    $.validate({
        modules: 'logic',
        /*// for live search required*/
        validateHiddenInputs: true
        , lang: 'ar'
    });
    $(".selectpicker").selectpicker("refresh");
    $('#transform_btn').on('click', function (e) {
        var isValid = $(e.target).parents('form').isValid();
        if (!isValid) {
            console.error('not valid');
            e.preventDefault(); //prevent the default action
            // return false;
        }
        if (isValid) {
            console.log('valid')
            check_befor_submit();
            return false;
        }
        // return false;
    });
</script>
<script>
    function check_befor_submit() {
        var valid = 1;
        var text_valid = '';

        var formData = $('#transform_form').serializeArray();

        var osr_id = [];
        var oTable = $('#js_table_customer').dataTable();
        var rowcollection = oTable.$(".checkbox_osr:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            osr_id.push($(elem).val());
            formData.push({name: "osr_ids[]", value: $(elem).val()});

        });
        if (osr_id.length == 0) {
            valid = 0;
            text_valid += ' اختر احد الاسر لتحوليها'
        }
        $.ajax({
            type: 'post',
            url: $('#transform_form').attr('action'),
            data: formData,
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري التحويل ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم التحويل   بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                location.reload();
            }
        });
    }
</script>
