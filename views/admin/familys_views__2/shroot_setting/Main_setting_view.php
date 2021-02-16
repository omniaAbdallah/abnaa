<style>
    .panel-body {
        padding: 15px;
    }

    .tab-content .panel-body {
        background: #fff;
        border: 1px solid gray;
        border-radius: 2px;
        padding: 5px;
        position: relative;
    }

    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #09704e;
        border-right-color: #09704e;
        background-color: #09704e;
        color: #fff !important;
    }

    .nav > li > a:hover, .nav > li > a:focus {
        text-decoration: none;
        background-color: #eee;
        color: #0f0f0f;
    }

    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #09704e;
        border-right-color: #09704e;
        background-color: #09704e;
        color: #fff;
    }

    ul.nav-tabs.holiday-month {
        border: 1px solid gray;
        height: 400px;
        overflow: scroll;
    }

    .nav-tabs > li > a:hover {
        border-color: #eee #eee #ddd;
    }

    ul.nav-tabs.holiday-month > li > a {
        color: #222;
        font-weight: 600;
        padding: 5px 5px;
        font-size: 13px;
    }

    .no-dt-buttons div.dt-buttons {
        display: none !important;
    }

    .no-dt-buttons .dataTables_filter {
        width: 100% !important;

    }

    .no-dt-buttons .dataTables_paginate {

        width: 60%;

    }

    .no-dt-buttons .dataTables_wrapper .dataTables_info {
        width: 40%;
    }
</style>

<!--<link rel="stylesheet" href="--><?php //echo base_url()?><!--asisst/admin_asset/css/stylecrm.css" />-->

<!-- Main content -->

<div class="col-sm-12 padding-4">


    <div class="col-sm-2 padding-4">
        <ul class="nav nav-tabs tabs-left holiday-month" style="    border: 1px solid gray;">
            <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray != null) {
                $x = 0;
                foreach ($this->myarray as $key => $value) {?>

                    <?php if (isset($typee) && !empty($typee) && $typee) {
                        $active = "";
                        if ($typee == $key) {
                            $active = 'active';
                            $value = $value;
                        }
                    } ?>
                    <li class="<?php if (isset($typee) && !empty($typee) && $typee) {
                        echo $active;
                    } else {
                        echo ($x == 0) ? 'active' : '';
                    } ?>"  style="float: right; width: 100%;">

                        <a <?php  echo 'href="#tab' . $key . '"'; ?>
                               onclick="load_table(<?=$key?>);" data-toggle="tab"> <i class="fa fa-cog" aria-hidden="true"></i> <?= $value ?>
                        </a>
                    </li>

                    <?php $x++;
                }
            } ?>


        </ul>
    </div>
    <!-- Tab panels -->
    <div class="tab-content col-sm-10 padding-4">
        <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray !=null){
            $x = 0;
            foreach ($this->myarray as $key=>$value){?>
                <?php if(isset($typee) && !empty($typee) && $typee) {
                    $active ="";
                    if($typee == $key ){
                        $active = 'active';
                        $value = $value;
                    }

                }
                ?>
                <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)) {echo $active; }else {echo ($x == 0)? 'active':''; }  ?>" id="tab<?= $key ?>">
                    <div class="panel-body">
                        <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                <i class="fa fa-cog" aria-hidden="true"></i>

                                <?=$value?>
                            </strong></a>
                        <div class="table-responsive">
                            <?php
                            if(isset($record) && !empty($record) && $record!=null){
                                echo form_open_multipart('family_controllers/shroot_setting/Main_setting/UpdateSetting/'.$id.'/'. $key  , array('id' => 'object_form_'.$key, 'class' => 'object_form_'.$key));
                            }
                            else{
                                echo form_open_multipart('family_controllers/shroot_setting/Main_setting/AddSetting/'.$key , array('id' => 'object_form_'.$key, 'class' => 'object_form_'.$key));
                            }
                            ?>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label"> العنوان</label>
                                <input type="text" id="title_<?=$key?>"   name="title" value="<?php if(isset($record)) echo $record['title'] ?>" class="form-control" autofocus data-validation="required">

                            </div>


                            <!--<div class="form-group col-sm-12 col-xs-12 text-center">

                                <button type="submit" name="add" value="حفظ" class="btn btn-sm btn-success btn-labeled "><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ
                                </button>

                            </div>-->

                            <div class="col-xs-12 no-padding" style="padding: 10px;">
                                <div class="text-center">

<!--                                    <input type="hidden" id="id_--><?//=$key?><!--" name="id">-->
                                    <button type="button" id="button_<?=$key?>" onclick="add_setting(<?=$key?>);"
                                    name="add" value="add" class="btn btn-labeled btn-success" >
                                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    </button>
                                </div>
                            </div>


                            <?php echo form_close() ?>

                            <div id="load_table_<?=$key?>"></div>
                        </div>
                    </div>
                </div>
                <?php  $x++; } } ?>
    </div>


</div>


<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    $(document).ready(function () {
        console.log("ready!  load_table");

        load_table(<?=$from_code?>);
    });

</script>

<script>
    function load_table(from_code) {
        //$('#table_panal').show();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/shroot_setting/Main_setting/load_table",
            data: {from_code:from_code},
            cache: true,
            beforeSend: function () {
                $('#load_table_'+from_code).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_table_'+from_code).html(d);
            }
        });
    }
</script>
<script>

    function add_setting(from_code) {
        var all_inputs = $('.object_form_'+from_code+' [data-validation="required"]');
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

        form_data.append('add', 1);
        form_data.append('from_code', from_code);
        var serializedData = $('.object_form_'+from_code).serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/shroot_setting/Main_setting/add_setting',
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
                        title: "جاري الإضاقة ... ",
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
                var all_inputs_set = $('.object_form_'+from_code+' .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });

                if (html) {
                    // add row in table

                    $("#no_data_"+from_code).remove();
                    $("#table_data_"+from_code).append(html);

                }
            }
        });
    }

    function update_setting(row_id, from_code,num_row) {
        var all_inputs = $('.object_form_'+from_code+' [data-validation="required"]');
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

        form_data.append('add', 1);
        form_data.append('from_code', from_code);
        form_data.append('id', row_id);
        form_data.append('num_row', num_row);
        var serializedData = $('.object_form_'+from_code).serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/shroot_setting/Main_setting/update_setting',
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
                        title: "جاري التعديل ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم التعديل  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.object_form_'+from_code+' .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });
                $('#button_'+from_code).html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> حفظ ");
                $('#button_'+from_code).attr("onclick","add_setting("+from_code+");");


                if (html) {
                    // add row in table

                    //row_num
                    // $('table > tbody > tr').eq(index).after(html)
                    var index =Number(num_row);
                    console.log(index);
                    console.log(html);
                    // $("#table_data_"+from_code).eq(index).after(html);
                    $("#"+row_id).html(html);
                    //$("#table_data_"+from_code).append(html);

                }
            }
        });
    }
</script>





