<style type="text/css">

    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
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

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
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

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
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

    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }

    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    .right-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        right: 10px;
        top: 1px;
    }

    .left-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        left: 10px;
        top: 1px;
    }

    .personel-img {
        position: relative;
        overflow: hidden;
        height: 200px;
    }

    .personel-img .front {
        border: 2px solid #eee;
        border-radius: 5px;
    }

    .personel-img .front img {
        width: 100%;
        height: 200px;
    }

    .personel-img .back {
        position: absolute;
        bottom: -200px;
        opacity: 0;
        background: rgba(0, 0, 0, 0.7);
        width: 100%;
        height: 100%;
        transition: 0.3s all ease-in;
        -webkit-transition: 0.3s all ease-in;
        border: 2px solid #fcb632;
    }

    .personel-img:hover .back {
        opacity: 1;
        bottom: 0;
    }

    .personel-img .back i {
        background-color: #fcb632;
        color: #fff;
        padding: 7px;
        font-size: 34px;
        border-radius: 50%;
        margin: 47% 35%;
    }

    .personel-img .show-da {
        position: relative;
    }

    .bond-heading {
        background-color: #00713e;
        color: #fff;
        padding: 10px;
        border-radius: 3px;
    }

    .bond-heading .bond-title {
        margin: 0;
    }

    .bond-body {
        padding: 10px;
        border: 2px solid #ccc;
        display: inline-block;
        width: 100%;

    }

    .table-bordered.table-details tbody > tr > td {
        font-size: 13px !important;
        white-space: pre-line;
    }

    .check-style input[type=checkbox] + label {
        line-height: 20px;
    }

</style>
<?php if ($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 3) { ?>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-body">

            <div class="col-sm-12 no-padding load_strategy">

    <?php
    if(!empty($record)){
        echo form_open_multipart('gwd/strategy/Strategy/load_add_strategy', array('id' => 'MyForm_add'));
        $id = $record->id;
        echo "<input type='hidden' id='id' name='id' value='".$id."'>";
        echo '<input type="hidden" name="update" value="update">';
        $pln_rkm = $record->pln_rkm;
        $pln_name = $record->pln_name;
        $pln_from_date = $record->pln_from_date;
        $pln_to_date = $record->pln_to_date;
        $pln_reviser_emp_code = $record->pln_reviser_emp_code;
        $pln_reviser_name = $record->pln_reviser_name;
        $pln_suspender_emp_code = $record->pln_suspender_emp_code;
        $pln_suspender_name = $record->pln_suspender_name;
        $pln_wasf = $record->pln_wasf;
        $pln_roya = $record->pln_roya;
        $pln_resala = $record->pln_resala;
        $pln_qiam = $record->pln_qiam;

    }else{
        echo form_open_multipart('gwd/strategy/Strategy/load_add_strategy', array('id' => 'MyForm_add'));
        echo '<input type="hidden" name="add" value="add">';
        if (!empty($last_pln_rkm)) {
            $pln_rkm = $last_pln_rkm + 1;
        } else {
            $pln_rkm = 1;
        }
        $pln_name='';
        $pln_from_date=date('Y-m-d');
        $pln_to_date=date('Y-m-d');
        $pln_reviser_emp_code='';
        $pln_reviser_name='';
        $pln_suspender_emp_code='';
        $pln_suspender_name='';
        $pln_wasf='';
        $pln_roya='';
        $pln_resala='';
        $pln_qiam='';
    }

    ?>

                    <div class="col-md-12 no-padding">
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                        <div class="col-sm-2">
                                <label class="">  اسم الخطة </label>
                        </div>
                        <div class="col-xs-10 r-input">
                            
                            <input type="text" name="pln_name" id="pln_name"
                                   value="<?= $pln_name ?>"
                                   class="form-control " data-validation="required">
                        </div>

                    </div>  

                     <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                        <div class="col-sm-2">
                                <label class=""> وصف الخطة </label>
                        </div>
                        <div class="col-xs-10 r-input">
                            
                        <textarea class="form-control" name="pln_wasf" style="margin: 0px 0px 0px -1.21528px;
    
    height: 59px;" id="pln_wasf">
                                <?php echo $pln_wasf;?>
                        </textarea>
                        </div>

                    </div>  


                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-2">
                                    <label class="">  الرؤية </label>
                            </div>
                            <div class="col-xs-10 r-input">
                                
                            <textarea class="form-control" 
                            style="
    
    margin: 0px 0px 0px -1.21528px;

    height: 59px;
    
    " 
                            name="pln_roya" id="pln_roya">
                                                            <?php echo $pln_roya;?>
                                                        </textarea>
                            </div>

                    </div>  

                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-2">
                                    <label class="">  الرسالة </label>
                            </div>
                            <div class="col-xs-10 r-input">
                                
                            <textarea class="form-control"
                            style="margin: 0px 0px 0px -1.21528px;
  
    height: 59px;"
                             name="pln_resala" id="pln_resala">
                                <?php echo $pln_resala;?>
                            </textarea>
                            </div>

                    </div>  
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-2">
                                    <label class="">  القيم </label>
                            </div>
                            <div class="col-xs-10 r-input">
                                
                            <textarea class="form-control"
                            style="margin: 0px 0px 0px -1.21528px;
   
    height: 59px;"
                             name="pln_qiam" id="pln_qiam">
                                <?php echo $pln_qiam;?>
                            </textarea>
                            </div>

                    </div>  


                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-2">
                                    <label class="">  تاريخ البدايه </label>
                            </div>
                            <div class="col-xs-10 r-input">
                                
                            <input id="pln_from_date" name="pln_from_date" class="form-control bottom-input " type="date"
                                   value="<?php echo $pln_from_date; ?>" style=" width: 100%;float: right" />
                            </div>

                    </div> 

                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-2">
                                    <label class="">  تاريخ النهايه </label>
                            </div>
                            <div class="col-xs-10 r-input">
                                
                            <input id="pln_to_date" name="pln_to_date" class="form-control bottom-input " type="date"
                                   value="<?php echo $pln_to_date; ?>" style=" width: 100%;float: right" />
                            </div>

                    </div> 


                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-2">
                                    <label class="">   مراجع الخطة </label>
                            </div>
                            <div class="col-xs-10 r-input">
               
                <select id="pln_reviser_name" name="pln_reviser_name" data-validation="required"

                title="    اختر  مراجع الخطة  "

                class="form-control selectpicker"

                data-show-subtext="true"

                data-live-search="true">
                <option value="" >اختر  مراجع الخطة</option>
                <?php

                if (isset($all_Emps) && (!empty($all_Emps))) {

                foreach ($all_Emps as $key) {

                    $select = '';

                    if (isset($pln_reviser_name) && (!empty($pln_reviser_name))) {

                        if ($key->employee == $pln_reviser_name) {

                            $select = 'selected';

                        }

                    }

                    ?>

                    <option value="<?php echo $key->employee; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>

                <?php }

                } ?>

                </select>
                            </div>

                    </div>   




                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-2">
                                    <label class="">   معتمد الخطة </label>
                            </div>
                            <div class="col-xs-10 r-input">
               
                <select id="pln_suspender_name" name="pln_suspender_name" data-validation="required"

                title="    اختر  معتمد الخطة  "

                class="form-control selectpicker"

                data-show-subtext="true"

                data-live-search="true">
                <option value="" > اختر  معتمد الخطة</option>
                <?php

                if (isset($all_Emps) && (!empty($all_Emps))) {

                foreach ($all_Emps as $key) {

                    $select = '';

                    if (isset($pln_suspender_name) && (!empty($pln_suspender_name))) {
                        if ($key->employee == $pln_suspender_name) {
                 

                            $select = 'selected';

                        }

                    }

                    ?>

                    <option value="<?php echo $key->employee; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>

                <?php }

                } ?>

                </select>
                            </div>

                    </div> 













                        <!-- <div class="form-group col-md-2  col-sm-4 padding-4">
                            <label class="label text-center">
                                <img style="width: 19px;float: right;"
                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                تاريخ بداية الخطة
                            </label>
                            <input id="pln_from_date" name="pln_from_date" class="form-control bottom-input " type="date"
                                   value="<?php echo $pln_from_date; ?>" style=" width: 100%;float: right" />

                        </div>
                        <div class="form-group col-md-2  col-sm-4 padding-4">
                            <label class="label text-center">
                                <img style="width: 19px;float: right;"
                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                تاريخ بنهايه الخطة
                            </label>
                            <input id="pln_to_date" name="pln_to_date" class="form-control bottom-input " type="date"
                                   value="<?php echo $pln_to_date; ?>" style=" width: 100%;float: right" />

                        </div>

                        <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">مراجع الخطة</label>
                            <input type="hidden" name="pln_reviser_emp_code" id="pln_reviser_emp_code" value="<?=$pln_reviser_emp_code?>">
                            <input name="pln_reviser_name" id="pln_reviser_name" class="form-control" style="width:84%; float: right;"
                                   readonly value="<?php echo $pln_reviser_name; ?>">
                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: right;"
                                    onclick="GetDiv_emps('myDiv_emp','pln_reviser')" >
                                <i class="fa fa-plus"></i></button>

                        </div>

                        <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">معتمد الخطة</label>
                            <input type="hidden" name="pln_suspender_emp_code" id="pln_suspender_emp_code" value="<?=$pln_reviser_emp_code?>">
                            <input name="pln_suspender_name" id="pln_suspender_name" class="form-control" style="width:84%; float: right;"
                                   readonly value="<?php echo $pln_suspender_name; ?>">
                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: right;"
                                    onclick="GetDiv_emps('myDiv_emp','pln_suspender')" >
                                <i class="fa fa-plus"></i></button>

                        </div>

                        <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 80%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" onclick="$('#myModal_emps').modal('hide')"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div id="myDiv_emp"></div>
                                    </div>
                                    <div class="modal-footer" style="display: inline-block;width: 100%">
                                        <button type="button" class="btn btn-danger"
                                                style="float: left;" onclick="$('#myModal_emps').modal('hide')">إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">وصف الخطة</label>

                            <textarea class="form-control" name="pln_wasf" id="pln_wasf">
                                <?php echo $pln_wasf;?>
                            </textarea>

                        </div>

                        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">الرؤيه</label>
                            <textarea class="form-control" name="pln_roya" id="pln_roya">
                                <?php echo $pln_roya;?>
                            </textarea>

                        </div>
                        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">الرساله</label>
                            <textarea class="form-control" name="pln_resala" id="pln_resala">
                                <?php echo $pln_resala;?>
                            </textarea>

                        </div>
                        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">القيم</label>
                            <textarea class="form-control" name="pln_qiam" id="pln_qiam">
                                <?php echo $pln_qiam;?>
                            </textarea>

                        </div> -->


                        

                        <!--<div class="col-xs-12 text-center" style="margin-top: 15px">
                            <button type="button" onclick="save_me();"
                                    class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ"
                                    style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>-->

                        <?php //form_close();?>
                    </div>



                </div>
            </div>

        </div>

        <?php } ?>
        <!--------------------------------------------------------------->

       <!-- <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script> -->

    <script>
        function GetDiv_emps(div,input_id) {
            html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr class="info"><th style="width: 50px;">#</th>' +
                '<th style="width: 50px;"> كود الموظف  </th>' +
                '<th style="width: 50px;"> أسم الموظف  </th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members2').show();
            var oTable_usergroup = $('#js_table_members2').DataTable({
                dom: 'Bfrtip',
                "ajax": {
                    "url": '<?php echo base_url(); ?>gwd/strategy/Strategy/getConnection_emp/',
                    "type" : "POST",
                    "data": {
                        "input_id": input_id
                    },
                },
                aoColumns: [
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true}
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
                destroy: true,
                "order": [[1, "asc"]]

            });
        }

        function Get_emp_Name(obj) {

            console.log(' obj :' + obj.dataset.name + ': ');
            console.log(' input_id :' + obj.dataset.input_id + ' ');
            var name = obj.dataset.name;
            var emp_code = obj.dataset.emp_code;
            var input_id = obj.dataset.input_id;

            document.getElementById(input_id+'_name').value = name;
            document.getElementById(input_id+'_emp_code').value = emp_code;

            // $("#myModal_emps")modal.('hide');
            $("#myModal_emps .close").click();


        }

    </script>


    <script>

        function save_strategy() {
            var all_inputs = $('[data-validation="required"]');
            var valid = 1;
            var text_valid = "";
            all_inputs.each(function (index, elem) {
                console.log(elem.id + $(elem).val());
                if ($(elem).val() != '') {
                    // valid=1;
                    $(elem).css("border-color", "");
                } else {
                    valid = 0;
                    $(elem).css("border-color", "red");

                }
            });

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gwd/strategy/Strategy/load_add_strategy',
                data: $('#MyForm_add').serialize(),
                dataType: 'text',  // what to expect back from the PHP script, if anything
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
                        title: 'تم الحفظ ',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'تم'
                    });
                    load_page();

                    //window.location.reload
                }
            });
        }




    </script>
<script>

$('.selectpicker').selectpicker("refresh");

</script>