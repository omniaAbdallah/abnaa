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
    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;

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

    /* table tr > td, table tr > th {

        border: 2px double #000 !important;
    } */

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
    .sweet-alert {
    background-color: #ffffff;
    width: 594px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -256px;
    margin-top: -200px;
    overflow: hidden;
    display: none;
    z-index: 2000;
    }
</style>

<div id="show_edite">
<div class="col-sm-12 no-padding ">
    <div class="col-sm-12 ">
        <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?></h3>
            </div>
            <div class="panel-body">
                <?php if (!empty($last_galsa)) { ?>
                    <?php

                    echo form_open_multipart(base_url() . ' egtima3at/all_mehwr/All_mehwr_galsa', array('class' => 'myform'));

                    ?>
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="left-headtr">

                                <th class="text-center">رقم الجلسة</th>
                                <th class="text-center">تاريخ الجلسة</th>
                                <th class="text-center">عنوان  الجلسة</th>
                                <th class="text-center">معتمد  الجلسة</th>
                                <th class="text-center">أعضاء الجلسة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">

                                <td><?= $last_galsa->galsa_rkm ?></td>
                                
                                
                                <td>
                                                                    <?=$last_galsa->galsa_date;?>

                                </td>
                                <td><?= $last_galsa->enwan_galsa ?></td>
                            <td><?= $last_galsa->suspender_emp_n ?></td>
                                <td>
                                    <button type="button" class="btn btn-info " data-toggle="modal"
                                            onclick="det_datiles(<?= $last_galsa->galsa_rkm ?>,'تفاصيل الأعضاء')"
                                            data-target="#myModal">أعضاء الجلسة
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12" >

                        <table class="table table-striped table-bordered table-result" id="mytable">
                            <thead>
                            <tr class="info">
                                <th>رقم المحور</th>
                                <!--    25-7-om   -->
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
                                    <input type="file" id="mehwar_morfaq1" name="mehwar_morfaq[]" class="form-control ">
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
                                <input type="hidden" name="length"  id="length" value="<?= $counter ?>">
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
                    echo '<div class="alert alert-danger">   لا توجد جلسات لدي إدارتك !!</div>';

                } ?>
            </div>
        </div>
    </div>
</div>
</div>
<div id="show_details">
<?php
/*
echo '<pre/>';
print_r($all_data);*/

if (isset($all_data) && $all_data != null) { ?>
    <div class="col-sm-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات محاور الجلسات</h3>
            </div>
            <div class="panel-body">

                <div class="col-xs-12">
                    <div class="panel-body">
                        <div class="fade in active">
                            
                                <table id="" class="example display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                                    <th class="text-center">م</th>
                                    <th class="text-center">رقم الجلسة</th>
                                    <th class="text-center">تاريخ الجلسة</th>
                                    <th class="text-center"> المحاور</th>
                                    <th class="text-center">أعضاء الجلسة</th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $a = 1;
                                foreach ($all_data as $row) {
                                  
                                    ?>
                                    <tr>
                                        <td><?php echo $a ?> </td>
                                        <td><?php echo $row->galsa_rkm; ?></td>
                                        <td >
                                               <?php echo $row->galsa_date; ?>
                                        </td>

                                        <td data-toggle="modal" data-target="#myModal"
                                            onclick="get_table_mehwer(<?= $row->galsa_rkm ?>,'تفاصيل المحاور')"><i
                                                    class="fa fa-search-plus"></i></td>

                                        <td>
                                            <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal"
                                               onclick="det_datiles(<?= $row->galsa_rkm ?>,'تفاصيل الأعضاء')"
                                               data-target="#myModal"></i>
                                        </td>

                                        <td class="text-center">


                                            <?php
                                            if ($row->finshed == 0) { ?>
                                            <?php if(isset($result)&&!empty($result)){?>


                                                
                                                                    <a onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                    update(<?=$row->galsa_rkm?>);
                                                });'>
                                                <i class="fa fa-pencil"> </i></a>
                                                
                                                <a onclick=' swal({
                                                        title: "هل انت متأكد من الحذف ؟",
                                                        text: "",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonClass: "btn-danger",
                                                        confirmButtonText: "حذف",
                                                        cancelButtonText: "إلغاء",
                                                        closeOnConfirm: false
                                                        },
                                                        function(){
                                                      delete_mehwer(<?=$row->galsa_rkm ?>);
                                                        });'>
                                                    <i class="fa fa-trash"> </i></a>
                                                    <?php }?>
                                                <!--  <button type="button" class="btn btn-success btn-xs"> إرسال المحاور لرئيس المجلس</button>
      -->


                                            <?php } elseif ($row->finshed == 1) { ?>
                                                <span style="font-weight: normal !important;"
                                                      class="label-danger label label-default">لايمكن التعديل والحذف</span>
                                            <?php } ?>


                                        </td>
                                    </tr>


                                    <?php $a++;
                                } ?>


                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
</div>

<div class="modal " id="table_mehwer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> المحاور </h4>
            </div>

            <div class="modal-body" id="result_table_mehwer">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="pop_h"></h4>
            </div>
            <br>
            <div class="modal-body form-group col-sm-12 col-xs-12">
                <div id="members_data"></div>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
$(document).ready(function () {
            console.warn("check gg :: ready");
            
          get_da3wa_galsa(<?= $notify_galsa->galsa_rkm ?>);
            setInterval(get_da3wa_galsa, (1000 * 60 * min));
          

        });
</script>
<script>

    function det_datiles(galsa_rkm,text) {
        $('#pop_h').text(text);

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/load_mem_details",
            data:{id:galsa_rkm},
             beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {

                $('#members_data').html(d);


            }
        });
    }
</script>

<script>
    function add_row() {
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length + 1;
        var dataString = 'length=' + len;
        $('#length').val(len);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>egtima3at/all_mehwr/All_mehwr_galsa/get_table',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#resultTable").append(html);
            }
        });

    }

</script>


<!-- <script>


    function check_button() {
        var x = document.getElementById('resultTable');
        if (x.rows.length > 0) {
            $('#myform').submit();
        } else {

            alert("من فضلك أضف محاور للجلسة !!");
        }
    }

</script> -->
<script>
    function check_button() {
      
        var all_inputs = $(' [data-validation="required"]');
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

        //
       // var files = $('#mehwar_morfaq')[0].files;
   
       // form_data.append("mehwar_morfaq", files[0]);
       var len=  $('#length').val();
       for (var i=1 ; i <= len; i++)
       {
       var files = $('#mehwar_morfaq'+i)[0].files;
       for (var count = 0; count < files.length; count++) {
                var name = files[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'png', 'pdf', 'PNG', 'PDF', 'xls', 'doc', 'docx', 'txt', 'rar']) == -1) {
                    error += "Invalid " + count + " Image File"
                } else {
                    form_data.append("files[]", files[count]);

                }
            }
       }
        var serializedData = $('.myform').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>egtima3at/all_mehwr/All_mehwr_galsa/add_mehwer',
            data: form_data,
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
                        title: "جاري الحفظ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم اضافة  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.myform .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                
                  
                });
                get_add();
              get_details();
                if (html == 1) {

                    //get_data('family_members');
                    // show_tab('family_members');
                }
            }
        });
    }
</script>


<script>

    function get_table_mehwer(galsa_rkm,text) {
        // $("#table_mehwer").show();
        $('#pop_h').text(text);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>egtima3at/all_mehwr/All_mehwr_galsa/get_table_mehwer',
            data: {galsa_rkm: galsa_rkm},
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


<script>
    function get_details() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/all_mehwr/All_mehwr_galsa/load_details",

            beforeSend: function () {
                $('#show_details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_details').html(d);

            }

        });
    }
</script>
<script>
    function get_add() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/all_mehwr/All_mehwr_galsa/get_add",


            success: function (d) {
                $('#show_edite').html(d);

            }

        });
    }
</script>


<script>
    function update(id) {
     
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>egtima3at/all_mehwr/All_mehwr_galsa/update",

            beforeSend: function () {
                $('#show_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_details').hide();
                $('#show_edite').html(d);


            }

        });
    }
</script>
<script>
    function update_mehwer() {
        var all_inputs = $(' [data-validation="required"]');
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

        //
        // var files = $('#mehwar_morfaq')[0].files;
   
        // form_data.append("mehwar_morfaq", files[0]);
  
        
        var len=  $('#length_update').val();
        console.log(len);
       for (var i=1 ; i <= len; i++)
       {
       var files = $('#mehwar_morfaq'+i)[0].files;
       for (var count = 0; count < files.length; count++) {
                var name = files[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'png', 'pdf', 'PNG', 'PDF', 'xls', 'doc', 'docx', 'txt', 'rar']) == -1) {
                    error += "Invalid " + count + " Image File"
                } else {
                    form_data.append("files[]", files[count]);

                }
            }
       }
        
        var serializedData = $('.myform').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>egtima3at/all_mehwr/All_mehwr_galsa/update_mehwer',
            data: form_data,
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
                        title: "جاري الحفظ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم اضافة  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.myform .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                   
                });
                $('#show_details').show();
                get_details();
                   get_add();
                if (html == 1) {

                    //get_data('family_members');
                    // show_tab('family_members');
                }
            }
        });
    }
</script>
<script>


    function delete_mehwer(id) {
        
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>egtima3at/all_mehwr/All_mehwr_galsa/delete',
                        data: {id: id},
                        dataType: 'html',
                        cache: false,
                        beforeSend: function () {
                            swal({
                                title: "جاري الحذف ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (html) {
                            //   alert(html);

                            // $('#Modal_esdar').modal('hide');

                            swal({
                                    title: "تم الحذف!",


                                }
                            );
                           

                        }
                    });
               


    }
</script>


<script>


    function delete_row(id,galsa_rkm) {
        var galsa_rkm=galsa_rkm;
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>egtima3at/all_mehwr/All_mehwr_galsa/delete_row',
                        data: {id: id,galsa_rkm:galsa_rkm},
                        dataType: 'html',
                        cache: false,
                        beforeSend: function () {
                            swal({
                                title: "جاري الحذف ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (html) {
                            //   alert(html);

                            // $('#Modal_esdar').modal('hide');

                            swal({
                                    title: "تم الحذف!",


                                }
                            );
                            update(galsa_rkm);

                        }
                    });
               


    }
</script>

<script>

    function get_da3wa_galsa(galsa_rkm) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/all_mehwr/All_mehwr_galsa/check_data",
            data:{galsa_rkm:galsa_rkm},
             success: function (d) {
//console.log(d);
if(d !=0 )
{
    var obj = JSON.parse(d);
    console.log(obj.galsa_rkm_fk);
      //   var title2='انت مدعو لحضور جلسه رقم '.obj.galsa_rkm_fk.'بتاريخ '.obj.galsa_date.'';
         swal({
  title: 'انت مدعو لحضور جلسة رقم ' +obj.galsa_rkm_fk+ ' بتاريخ '+obj.galsa_date+' ',
   text: "عند الضغط علي نعم سيتم تاكيد حضورك  بالجلسة",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم",
  cancelButtonText: "ليس الان",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
   $.ajax({
                            type: 'post',
                            url: "<?php echo base_url();?>egtima3at/all_mehwr/All_mehwr_galsa/update_member_hdoor",
                            data: {galsa_rkm: galsa_rkm},
                            success: function (d) {
                                
                                
                            swal({
                                    title: "تم تاكيد حضورك بالجلسه !",


                                }
                            );
                            }
                        });
  } else {
    swal("تم الالغاء","", "error");
  }
});    
        ///


            }
             }
        });
        
    
    }
</script>
