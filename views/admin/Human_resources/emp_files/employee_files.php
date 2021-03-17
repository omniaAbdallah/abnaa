<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>


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

    . {
        font-size: 13px;
    }
</style>

<?php
$array = array(1 => 'نعم', 2 => 'لا');
$disabled = '';
echo form_open_multipart('human_resources/Human_resources/employee_files/' . $this->uri->segment(4),array("class"=>"employee_files_form"));

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
            <div class="form-group col-sm-2 col-xs-12 padding-4">
                <label class="label ">كود الموظف</label>
                <input type="text" class="form-control " name="emp_code"
                       value="<?= $employee['emp_code'] ?>" readonly/>
                <input type="hidden" name="emp_id" id="emp_id" value="<?= $employee['id'] ?>"/>
            </div>

            <div class="form-group col-sm-3 col-xs-12 padding-4">
                <label class="label ">إسم الموظف</label>
                <input type="text" class="form-control " name="emp_name"
                       value="<?= $employee['employee'] ?>" readonly/>
            </div>
            <div class="form-group col-sm-3 col-xs-12 padding-4">
                <label class="label "> إسم المرفق</label>
                <input type="text" class="form-control  testButton inputclass"
                       name="title" id="title"
                       readonly="readonly"

                       onclick="$('#morfqModal').modal('show');"
                       ondblclick="$('#morfqModal').modal('show');"
                       style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                       data-validation="required"
                       value="">
                <input type="hidden" name="title_fk" id="title_fk" value="">
                <button type="button"  onclick="$('#morfqModal').modal('show');"
                        class="btn btn-success btn-next" style="float: right;">
                    <i class="fa fa-plus"></i></button>

               <!-- <select name="title" id="title" class="form-control">
                    <?php if (isset($files_names) && !empty($files_names)) {
                        foreach ($files_names as $row) {
                            echo '<option value="' . $row->id_setting . '">' . $row->title_setting . '</option>';
                        }
                    } else {
                        echo '<option value=""> لا يوجد أسماء مرفقات مضافة </option>';
                    } ?>
                </select> -->

            </div>
            <div class="form-group col-sm-3 col-xs-12 padding-4">
                <label class="label "> إرفاق - تحميل قراءة المستند</label>
                <input type="file" class="form-control bottom-input" name="emp_file" id="emp_file"
                 data-validation="required"/>
            </div>
            <div class="col-md-2 padding-4">
                <label class="label "> هل يوجد تاريخ</label>

                <select name="commited" class="form-control"
                        onchange="get_date(this.value)" data-validation="required">
                    <option value="">إختر</option>
                    <?php
                    foreach ($array as $key => $value) {
                        $select = '';

                        ?>
                        <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group  col-md-2  col-sm-12 padding-4" >
                <label class="label " style="text-align: center;">
                    <img style="width: 19px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                    من تاريخ
                </label>
                <input type="date" id="from_date_m" name="date_from"
                       class="form-control" data-validation="required" />
            </div>

            <div class="form-group col-md-2 padding-4" >
                <label class="label "style="text-align: center;" >
                    <img style="width: 19px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                    إلي تاريخ

                </label>
                <input type="date" id="to_date_m" name="date_to"
                       class="form-control" data-validation="required" />
            </div>
            <div class="col-md-1 padding-4">
                <label class="label "> هل يوجد تنبيه</label>
                <select name="tanbih_fk" class="form-control bottom-input"
                        onchange="get_period(this.value)" data-validation="required">
                    <option value="">إختر</option>
                    <?php
                    foreach ($array as $key => $value) {

                        ?>
                        <option value="<?= $key ?>"
                            ><?= $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-1 padding-4">
                <?php
                 $period_arr= array('1'=>'يوم','7'=>'اسبوع','15'=>'اسبوعين','30'=>'شهر');
                ?>
                <label class="label "> المدة</label>
                <select name="period" id="period"  class="form-control bottom-input"
                        data-validation="required"  disabled>
                    <option value="">إختر</option>
                    <?php
                    foreach ($period_arr as $key => $value) {
                        ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php } ?>
                </select>

            </div>

            <!-- <div class="form-group col-sm-4 col-xs-12">
                <button type="button" class="btn btn-purple w-md m-b-5" value="1"
                        onclick="getBanks($(this).val(),<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>);">
                    <i class="fa fa-plus"></i> إضافة مرفق جديد
                </button>
            </div>-->

            <div class="col-xs-12 text-center">


                <input type="hidden" name="count"
                       value="<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>">
                <button type="button" id="buttons" name="add" value="حفظ"
                        onclick="insertData(<?=$this->uri->segment(4)?>);" class="btn btn-labeled btn-success "
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
            </div>
            <div class="clearfix"></div><br>

            <div id="employee_files_table"></div>

        </div>



    </div>
</div>


<?php echo form_close(); ?>

<!-- morfqModal Modal -->

<div class="modal fade" id="morfqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> المرفقات </h4>
            </div>
            <div class="modal-body">
                <div  id="">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success " onclick="$('#add_input').show(); "
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="add_input" style="display: none">

                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label title  "> اسم المرفق</label>
                                    <input type="text" onfocus="$('.add_title').hide();" name="name" id="add_title"
                                           value=""
                                           class="form-control">

                                    <span class="add_title" style="color: red; display: none;">هذا الحقل مطلوب</span>
                                </div>

                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" >
                                    <button type="button" onclick="add_page(); " style="margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="output">
                        <div class="col-md-12">
                            <?php
                            if (isset($files_names)&& !empty($files_names)){
                                ?>
                                <table id="" class=" example display table table-bordered  table-striped  responsive nowrap" cellspacing="0" width="100%">
                                    <thead class="greentd">
                                    <tr class="greentd">
                                        <th width="2%">#</th>
                                        <th class="text-center"> اسم المرفق</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($files_names as $value){
                                        ?>
                                        <tr>
                                            <td><input type="radio" name="radio" data-title="<?= $value->id_setting ?>"
                                                       id="radio"
                                                       ondblclick="GetName(<?php echo $value->id_setting; ?>,'<?php echo $value->title_setting; ?>')">
                                            </td>
                                            <td><?= $value->title_setting ?></td>


                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>

                                <?php
                            }
                            ?>

                        </div>


                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- morfqModal Modal -->


<!--
<?php // $data_load["personal_data"] = $personal_data;
// $this->load->view('admin/Human_resources/sidebar_person_data', $data_load); ?>
-->

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function () {
        load_employee_files_table(<?=$this->uri->segment(4)?>);
    });
</script>
<script>
    function load_employee_files_table(emp_id) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>human_resources/Human_resources/employee_files_table/'+emp_id,
            data: {},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#employee_files_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#employee_files_table").html(html);
            }
        });
    }
    function insertData(emp_id) {
        var all_inputs = $('.employee_files_form [data-validation="required"]');
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

        var form_data = new FormData();
        var files = $('#emp_file')[0].files;
            form_data.append("emp_file", files[0]);

        var serializedData = $('.employee_files_form').serializeArray();
        $.each(serializedData, function (key, item) {
            //console.log(item.name+': ' + item.value);
            form_data.append(item.name, item.value);
        });
        form_data.append('add', 1);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/employee_files/'+emp_id,
            data: form_data,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
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
                var all_inputs_set = $('.employee_files_form [data-validation="required"]');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });
                load_employee_files_table(emp_id);

            }
        });
    }

</script>
<script type="text/javascript">
    jQuery(function ($) {
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>
    function add_page() {

      //  var title_n = $('#' + title).val();
       var title_n = $('#add_title').val();
        if (title_n != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/Human_resources/add_morfq',
                data: {title:title_n},
                dataType: 'html',
                cache: false,
                success: function (html) {

                    $('#add_title' ).val(' ');
                    $("#output" ).html(html);
                }
            });

        }
        else{
            $('.add_title' ).show();
            return;


        }

      //  if (value != 0 && value != '') {


     //   }
        // else {
        //     $('.' + title).show();
        //     return;
        // }

    }


</script>
<script>
    function GetName(id,title) {
        $('#title_fk').val(id);
        $('#title').val(title);
        $('#morfqModal').modal('hide');

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

    var inc = 1;

    function getBanks(argument, allCount) {
        inc = inc;
        if (argument) {
            var dataString = 'numbers=' + argument + '&count=' + allCount + '&inc=' + inc;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getfiles',
                data: dataString,
                cache: false,
                success: function (html) {
                    $('#emp_files').show();
                    $('#result').append(html);
                }
            });
            inc = ++inc;
        } else {
            $('#result').html('');
        }
    }


</script>

<script>
    function get_date(id) {


        if (id == 2){
            // $('#from_date_h').prop('disabled', true);
            $('#from_date_m').prop('disabled', true);
            $('#to_date_m').prop('disabled', true);
            // $('#to_date_h').prop('disabled', true);
        } else if(id == 1){
            $('#to_date_m').removeAttr("disabled");
           // $('#to_date_h').removeAttr("disabled");
            $('#from_date_m').removeAttr("disabled");
           // $('#from_date_h').removeAttr("disabled");
        }

    }
</script>
<script>
    function get_period(value) {
        if (value==1){
            $('#period').removeAttr('disabled');
        }
        else if (value==2){
            $('#period').attr('disabled','disabled');

        }

    }
</script>

