<style type="text/css">
    .top-label {

        font-size: 13px;
    }

    .table-bordered.tb_table tbody td {
        padding: 0
    }

    .form-control {
        padding: 6px 0px;
    }

    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
        padding-bottom: 25px;
    }


    table tr.green_background th,
    table tr.green_background td {
        background-color: #5eab5e;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }

    table tr.red_background th,
    table tr.red_background td {
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }

    table tr th,
    table tr td,
    table thead td,
    table thead th,
    table tfoot th,
    table tfoot td {
        padding: 3px 5px !important;
    }


    .orangetd td, .orangetd th {
        color: #000;
    }

</style>
<?php
$house_device_status = array(1 => 'جيد', 2 => 'متوسط', 3 => 'غير جيد', 4 => 'يحتاج');
$disabled = '';
?>
<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
            <div class="pull-left">
                <?php $data_load["emp_code"] = $personal_data[0]->emp_code;
                $data_load["id"] = $this->uri->segment(4);
                $this->load->view('admin/Human_resources/drop_down_menu', $data_load); ?>
            </div>
        </div>
        <div class="panel-body">

            <div class="col-sm-12 col-md-12 col-xs-12 no-padding">
                <div class="form-group col-sm-2 col-xs-12">
                    <label class="label ">كود الموظف</label>
                    <input type="text" class="form-control " name="emp_code" value="<?= $employee['emp_code'] ?>" readonly/>
                </div>
                <div class="form-group col-sm-3 col-xs-12">
                    <label class="label ">إسم الموظف</label>
                    <input type="text" class="form-control" name="emp_name" value="<?= $employee['employee'] ?>" readonly/>
                </div>
            </div>
            <div class="clearfix"></div><br>
            <!-- Nav tabs -->

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a id="add_ohad" href="#addohad"  data-toggle="tab"> أضافه عهد جديده </a></li>
                <li><a id="my_ohad"  href="#myohad" data-toggle="tab"> قائمه بالعهد الخاصه بالموظف </a></li>
                <li><a id="tahwlat_ohad"  href="#tahwlatohad" data-toggle="tab"> العهد المحوله </a></li>

            </ul>
            <div class="tab-content">

                <div class="tab-pane fade in active" id="addohad">
                    <!------------------load_est7qaq------------------------------------------------------------------->
                    <div class="load_add_ohad">  </div>

                </div>


                <div class="tab-pane fade " id="myohad">
                    <!------------------load_estqta3------------------------------------------------------------------->
                    <div class="load_my_ohad">  </div>

                </div>


                <div class="tab-pane fade " id="tahwlatohad">
                    <!--------------------load_7sabat----------------------------------------------------------------->
                    <div class="load_tahwlat_ohad"> </div>

                </div>

            </div>

        </div>
</div>
<?php echo form_close(); ?>
<?php
/*
if (isset($all_Data_tansfer) && $all_Data_tansfer != null) {
    foreach ($all_Data_tansfer as $key => $value) {
        ?>
        <div class="modal fade" id="myModalonlyaccept-<?= $value->id . "-" . $this->uri->segment(4) ?>" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تحويل العهدة</h4>
                    </div>
                    <?php echo form_open_multipart("human_resources/Human_resources/transfer_operation/" . $value->id . "/" . $this->uri->segment(4) . "") ?>
                    <div class="modal-body">
                        <div class="row" style="padding: 20px">
                            <div class="form-group col-sm-12 col-xs-12">
                                <label class="label half top-label" style=" padding: 7px; font-size: 14px;">إختر الموظف
                                    المراد التحويل اليه</label>
                                <select name="to_emp_code" class="selectpicker no-padding form-control half"
                                        data-show-subtext="true" data-live-search="true" data-validation="required"
                                        aria-required="true">
                                    <option value="">إختر</option>
                                    <?php
                                    if (isset($all_employee) && $all_employee != null) {
                                        foreach ($all_employee as $row2) {
                                            $select = '';
                                            ?>
                                            <option value="<?= $row2->id ?>" <?= $select ?>><?= $row2->employee ?></option>
                                        <?php } ?>
                                    <?php } ?>

                                </select>
                                <input type="hidden" name="from_emp_code" value="<?= $this->uri->segment(4) ?>"/>
                                <input type="hidden" name="custody_id_fk" value="<?= $value->id ?>"/>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        <button type="submit" name="action" value="action" class="btn btn-success">حفظ</button>

                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <?php
    }
}
*/
?>


<!--
<?php // $data_load["personal_data"]=$personal_data; $this->load->view('admin/Human_resources/sidebar_person_data',$data_load);?>
-->


<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>

    //load_add_ohad  ,  load_my_ohad , load_tahwlat
    $( document ).ready(function() {
        load_page(<?php echo $this->uri->segment(5); ?>,'load_add_ohad');

    });
    $('#add_ohad').click(function(){
        load_page(<?php echo $this->uri->segment(5); ?>,'load_add_ohad');
    });
    $('#my_ohad').click(function(){
        load_page(<?php echo $this->uri->segment(5); ?>,'load_my_ohad');
    });
    $('#tahwlat_ohad').click(function(){
        load_page(<?php echo $this->uri->segment(5); ?>,'load_tahwlat_ohad');
    });

    function load_page(empid,div){
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work/'+div+'/'+empid,
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('.'+div).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $('.'+div).html(html);

            }
        });
    }
</script>

<script type="text/javascript">
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    function dateEnabled(val, id) {
        $('.date' + id).val('');
        $('.date' + id).removeAttr('data-validation');
        $('.date' + id).attr('disabled', true);
        if (val == 1) {
            $('.date' + id).removeAttr('disabled');
            $('.date' + id).attr('data-validation', 'required');
        }
    }
</script>





