<style>
    .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {
        display: inline-block;
        font-size: 18px;
        margin: 0;
        line-height: 1;
    }

    .table-bordered {
        border: 1px solid #f4f4f4;
    }
    table {
        background-color: transparent;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table-bordered thead td, .table-bordered thead th {
        border-bottom-width: 2px;
    }
    .table td, .table th {
        padding: .75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .badge {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        background-color: #777;
        border-radius: 10px;
    }
    .bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
        background-color: #dd4b39 !important;
    }
    .bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
        background-color: #f39c12 !important;
    }
    .bg-light-blue, .label-primary, .modal-primary .modal-body {
        background-color: #3c8dbc !important;
    }
    .bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
        background-color: #00a65a !important;
    }
    .classnewa{
        height: 25px;
        padding-top: 6px;
        font-size: 15px;
    }
</style>

<div class="col-xs-12 no-padding">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>

        <div class="panel-body">
            <?php
            echo form_open_multipart('human_resources/employee_forms/job_requests/Job_request/Update_details/' . $get_requset->id
                ,array("class"=>"add_details_form"));
            $dept_name = $get_requset->dept_name;
            $job_title = $get_requset->job_title;
            $rkm_talab = $get_requset->rkm_talab;
            $date_talab = $get_requset->date_talab;
            $date_talab_ar = $get_requset->date_talab_ar;
            $sub_dep_id_fk = $get_requset->sub_dep_id_fk;
            $dep_id_fk = $get_requset->dep_id_fk;
            $job_title_id_fk = $get_requset->job_title_id_fk;
            $num_for_job = $get_requset->num_for_job;
            $type_name = $get_requset->type_name;
            $nature_name = $get_requset->nature_name;

            ?>
            <div class="col-md-12 no-padding">
                <table class="table table-bordered center">
                    <thead style="background: #737373;color: white;">
                    <th>رقم الطلب </th>
                    <th>تاريخ الطلب</th>
                    <th>الإدارة-القسم</th>
                    <th>مسمي الوظيفة</th>
                    <th>العدد</th>
                    <th>نوع الوظيفة</th>
                    <th>طبيعة العمل بالوظيفة</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td><span class=" classnewa badge bg-green"><?php if(!empty($rkm_talab)) { echo $rkm_talab;} ?></span></td>
                        <td><span class=" classnewa badge bg-red"><?php if(!empty($date_talab_ar)) { echo $date_talab_ar;} ?></span></td>
                        <td><span class=" classnewa badge bg-light-blue"><?php if(!empty($dept_name)) { echo $dept_name;} ?></span></td>
                        <td><span class=" classnewa badge btn-success" ><?php if(!empty($job_title)) { echo $job_title;} ?></span></td>
                        <td><span class="classnewa badge btn-primary" ><?php if(!empty($num_for_job)) { echo $num_for_job;} ?></span></td>
                        <td><span class="classnewa badge bg-red" ><?php if(!empty($type_name)) { echo $type_name;} ?></span></td>
                        <td><span class="badge bg-yellow" ><?php if(!empty($nature_name)) { echo $nature_name;} ?></span></td>
                    </tr>
                    </tbody></table>

            </div>

            <div class="col-md-12 no-padding">

                <input type="hidden" id="row_id" name="row_id" value="<?= $get_requset->id?>">
                <div class="form-group col-md-3 col-sm-6  padding-4  ">
                    <label class="label  ">إسم سبب ومبرر الإحتياج</label>
                    <input type="text" name="details_reason" id="details_reason"
                           class="form-control" data-validation="required" >
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="col-xs-12 text-center">

                <button type="button" class="btn btn-labeled btn-success " name="add" value="add" id="add"
                        onclick="add_details();"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

            </div>
            <?php
            echo form_close();
            ?>


        </div>
    </div>
</div>

<div class="col-xs-12 no-padding">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title_t; ?></h3>
        </div>

        <div class="panel-body">
        <div id="details_result_t"> </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        load_details_result();
    });
</script>

<script>
    function load_details_result() {

        var row_id = $('#row_id').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/load_details_result",
            data: {row_id: row_id, type: 1},
            beforeSend: function () {
                $('#details_result_t').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_result_t').html(d);

            }

        });

    }
</script>
<script>

    function add_details() {
        var all_inputs = $('.add_details_form [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/job_requests/Job_request/add_update_details',
            data: $('.add_details_form').serialize()+'&add=1',
            dataType: 'text',
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
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم الحفظ  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.add_details_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    //console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });
                load_details_result();
            }
        });
    }
</script>