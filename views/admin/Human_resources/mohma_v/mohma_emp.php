<?php if( ($_SESSION['role_id_fk']==3))
{
    ?>
<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if(isset($result)&&!empty($result))
            {
//newww
            $mohma_name=$result->mohma_name;
            $mohma_id_fk=$result->mohma_id_fk;
            $mohma_date=$result->mohma_date;
            $mohma_details=$result->mohma_details;
            $emp_id_fk=$result->emp_id_fk;
$emp_n = $result->emp_n;
//
$edara_id=$result->edara_id;
$edara_n = $result->edara_n;
//
$important=$result->important;
$from_date=$result->from_date;
$to_date=$result->to_date;
$num_days=$result->num_days;
$another_mohma=$result->another_mohma;
                echo form_open_multipart('human_resources/mohma/Mohma_c/update/'.$result->id, array('id' => 'myform'));
            }else{
            echo form_open_multipart('human_resources/mohma/Mohma_c/insert', array('id' => 'myform'));
//newww
$mohma_name='';
$mohma_id_fk='';
$mohma_date=date('Y-m-d');
$mohma_details='';
$emp_id_fk='';
$emp_n = '';
//
$edara_id='';
$edara_n = '';
//
$important='';
$from_date=date("Y-m-d");
$to_date= date("Y-m-d");
$num_days = 1;
$another_mohma='';
            }
            //   $responsable_name = '';
            ?>
            <div class="col-sm-12 form-group">
   <div class="col-md-3 col-sm-6 padding-4 ">
   <?php if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
                                <input type="hidden" name="from_profile" value="1"/>
                            <?php } ?>
				<label class=" label kafel"> أسم المهمة </label>
                <input type="hidden" id="type_setting" data-id="" data-title="" data-title_fk="" data-title_n="" data-fe2a_type="">
				<input type="text" class="form-control  "
                           name="mohma_name" id="mohma_name"
                           readonly="readonly"
                           onclick="change_type_setting(38,'أسم المهمة ','mohma_id_fk','mohma_name');load_settigs();"
                           data-toggle="modal" data-target="#settingModal"
                           style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                           data-validation="required"
                           value="<?= $mohma_name ?>">
					<input type="hidden" name="mohma_id_fk" id="mohma_id_fk" value="
						<?= $mohma_id_fk ?>">
						<button type="button"
                            onclick="change_type_setting(38,'أسم المهمة ','mohma_id_fk','mohma_name');load_settigs();"
                            data-toggle="modal" data-target="#settingModal"
                            class="btn btn-success btn-next">
							<i class="fa fa-plus"></i>
						</button>
					</div>
                <div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label  ">تاريخ الانشاء </label>
                    <input type="date" value="<?=$mohma_date?>" name="mohma_date" id="mohma_date"
                           class="form-control ">
                </div>
                <div class="form-group col-md-3 col-sm-4 col-xs-4 padding-4">
                    <label class="label ">
                    اسناد الي
                    </label>
                    <input name="emp_n" id="emp_n" class="form-control" style="width:86%; float: right;"
                           readonly
                           data-validation="required"
                           value="<?php
                               echo $emp_n;
                            ?>">
                           <input type="hidden" id="emp_id_fk"  name="emp_id_fk" 
                           value="<?php 
                               echo $emp_id_fk;
                         ?>"
                           />
                    <button type="button" class="btn btn-success btn-next" style="float: left;"
                    data-toggle="modal" data-target="#tahwelModal"
                            onclick="load_tahwel(2);" <?php /* if (!empty($emp_data->employee)) {
                        echo 'disabled';
                    } */ ?>>
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-md-3 col-sm-4 col-xs-4 padding-4">
                    <label class="label ">
                   الادارة
                    </label>
                    <input name="edara_n" id="edara_n" class="form-control" style="width:86%; float: right;"
                           readonly
                           value="<?php
                               echo $edara_n;
                            ?>">
                           <input type="hidden" id="edara_id"  name="edara_id" 
                           value="<?php 
                               echo $edara_id;
                         ?>"
                           />
                </div>
                <div class="form-group padding-2 col-md-2 col-xs-12">
                            <label class="label ">درجة الاهمية</label>
                            <select name="important" data-validation="required"
                                    class="form-control">
                                <option value="">إختر</option>
                                <?php
                                $arr = array(
                                 1 => 'مهم',
                                 2 => 'عاجل',
                                 3 => 'غير مهم',
                                 4 => 'غير عاجل'
                                );
                                foreach ($arr as $key => $value) {
                                    $select = '';
                                    if ($important != '') {
                                        if ($key == $important) {
                                            $select = 'selected';
                                        }
                                    } ?>
                                    <option
                                            value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                <div class="col-sm-3  col-md-3 padding-4 ">
                    <label class="label  ">  تفاصيل المهمه </label>
                    <input type="text" data-validation="required" value="<?=$mohma_details?>" name="mohma_details" id="mohma_details"
                           class="form-control ">
                </div>
                <div class="form-group col-md-2  col-sm-6 padding-4">
                            <label class="label text-center">
                                 من تاريخ
                            </label>
                            <input type="date" id="start_date" name="from_date"
                                   class="form-control  " onchange=' get_date();'
                                   value="<?php echo $from_date; ?>">
                        </div>
                        <div class="form-group col-md-2  col-sm-6 padding-4">
                            <label class="label text-center">
                            الي تاريخ
                            </label>
                            <input type="date" id="end_date" name="to_date" class="form-control  "
                                   onchange=' get_date();' value="<?php echo $to_date; ?>">
                        </div>
                        <div class="form-group col-md-1  col-sm-6 padding-4">
                            <div id="cal-end-4">
                                <label class="label "> الوقت المقدر</label>
                                <input type="text" readonly="readonly" name="num_days" id="num_days"
                                       value="<?php echo $num_days; ?>"
                                       class="form-control "
                                       data-validation="required" onkeypress="validate_number(event);"
                                       data-validation-has-keyup-event="true">
                                       <span> يوم </span>
                            </div>
                        </div>
                        <div class="form-group padding-2 col-md-2 col-xs-12">
                            <label class="label ">  مرتبطة بمهمه اخري</label>
                            <select type="text" name="another_mohma" id="another_mohma"
                                    class="form-control  ">
                                    <option value="">إختر</option>
                                <?php
                                $arry = array('1' => 'نعم', '2' => 'لا');
                                foreach ($arry as $key => $value) {
                                    ?>
                                    <option value="<?= $key ?>"
                                        <?php
                                        if ($another_mohma == $key) {
                                            echo 'selected';
                                        }
                                        ?>
                                    ><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
            </div>
            <br>
            <br>
            <div class="col-sm-12 form-group 4 text-center">
                <button type="submit"
                        class="btn btn-labeled btn-success " name="save" value="save">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> إدارة المهمة</h3>
            </div>
            <div class="panel-body">
                <table id="" class="example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th class="text-center">أسم  المهمة</th>
                        <th class="text-center">تاريخ الانشاء</th>
                        <th class="text-center"> تفاصيل المهمه</th>
                        <th class="text-center">  اسناد من</th> 
                       <th class="text-center">  اسناد الي</th> 
                       <th class="text-center">  الوقت المقدر</th> 
                       <th class="text-center"> حالة المهمة </th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                            $link_update = 'edit_mohma(' . $value->id . ')';
                            $add_attaches = 'add_attaches(' . $value->id . ')';
                            $add_comment = 'add_comment(' . $value->id . ')';
                            $link_delete = 'Delete_namozeg(' . $value->id . ')';
                        } else {
                            $link_update = 'window.location="' . base_url() . 'human_resources/mohma/Mohma_c/update/' . $value->id. '";';
                            $add_attaches = 'window.location="' . base_url() . 'human_resources/mohma/Mohma_c/add_attaches/' . $value->id. '";';
                            $add_comment = 'window.location="' . base_url() . 'human_resources/mohma/Mohma_c/add_comment/' . $value->id. '";';
                            $link_delete ='window.location="' . base_url() . 'human_resources/mohma/Mohma_c/Delete_namozeg/' . $value->id. '";';
                        }

                        if($value->suspend ==4){
                            $visit_ended = 'المهمة إنتهت';
                            $visit_ended_color = '#ff8f8f'; 
                         }elseif($value->suspend!=4){
                              $visit_ended = 'المهمة جارية'; 
                              $visit_ended_color = '#ffc049'; 
                         }
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td>
                            <?php
         echo   $value->mohma_name;
                    ?>
                            </td>
                            <td style="color: #c30000;font-weight: bold;"><?= $value->mohma_date ?></td>
                            <td style="background: #dcaff9;"><?= $value->mohma_details ?></td>
                            <td style="color: green;"><?= $value->publisher_name ?></td> 
                         <td style="color: blue;"><?= $value->emp_n ?></td> 
                         <td style="color: green;font-weight: bold;"><?= $value->num_days ?> يوم</td> 
                         <td
                         style="background:<?=$visit_ended_color?>;">
                         <?=$visit_ended?>
                         </td>
                            <td>
<div id="send_all_mohma<?= $value->id; ?>">
<?php if( $value->send_all_mohma==0){ ?>
                              <button class="btn btn-info" 
                                   onclick="send_all_mohma( <?= $value->id; ?>)">
                                    ارسال المهمة </button>
<?php }?>
</div>
                            <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
<li> <a data-toggle="modal" data-target="#myModal_details"
                                   onclick="get_all_data( <?= $value->id; ?>)">
                                    <i class="fa fa-search"> </i>تفاصيل </a>
                               </li>
                    <li><a  onclick='<?php echo $add_attaches?>'><i class="fa fa-commenting-o" aria-hidden="true"></i>إضافة  مرفقات</a></li>
                    <li><a onclick='<?= $add_comment?>'><i class="fa fa-comments-o" aria-hidden="true"></i> اضافة رد  </a></li>            
                    <li>  <a onclick='<?=$link_update?>'>
<i class="fa fa-pencil"></i>تعديل</a>
</li>
<li>
<a onclick='<?=$link_delete?>'>
                                    <i class="fa fa-trash"> </i> حذف </a></li>
<?php if($value->suspend!=4)
{?>

                                    <?php }?>
                  </ul>
                </div>   
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<?php
}else{?>
<div class="alert alert-danger">    نظرا لانك  مدير علي النظام   .. لا يمكنك إضافة مهمة </div>
<?php }?>
<div class="modal fade" id="myModal_details" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل</h4>
            </div>
            <div class="modal-body">
                <div id="result"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> أرسال الي</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12" id="tawel_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_emp"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title_setting ">  </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid"  id="">
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
                                    <label class="label title_setting  "> </label>
                                    <input type="text" onfocus="$('.add_title').hide();" name="name" id="add_title"
                                           value=""
                                           class="form-control">
                                    <input type="hidden" name="row_setting_id" id="row_setting_id" value="">
                                    <span class="add_title" style="color: red; display: none;">هذا الحقل مطلوب</span>
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" >
                                    <button type="button" onclick="add_setting($('#add_title').val(),'add_title','output'); " style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="setting_output">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<script>
    function load_tahwel(type) {
        $('#tawel_result').show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>human_resources/mohma/Mohma_c/load_tahwel',
            data: {type: type},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#tawel_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#tawel_result").html(html);
            }
        });
    }
</script>
<script>
    function get_all_data(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/mohma/Mohma_c/get_all_data",
            data: {id: id},
            beforeSend: function () {
                $('#result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (msg) {
                $('#result').html(msg);
            }
        });
    }
</script>
<!-- send_all_mohma -->
<script>
    function send_all_mohma(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/mohma/Mohma_c/send_all_mohma",
            data: {id: id},
            success: function (msg) {
                $('#send_all_mohma'+id).html('<span style="color:green;">تم ارسال المهمة</span>');
            }
        });
    }
</script>
<script>
    function add_option(valu)
    {
if(valu!='')
{
        var id='<?php echo $last_id +1;?>';
        var x=$('#destination').val();
        $('#destination').append('<option value='+id+' selected>'+valu+'</option>');
        $('.selectpicker').selectpicker('refresh');
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/mohma/Mohma_c/add_option",
            data:{valu:valu},
            success:function(d) {
                document.getElementById("button_append").setAttribute("disabled", "disabled");
            }
        });
}else{
    swal({
    title: " برجاء ادخال   اسم مهمة ! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
}
    }
</script>
<script type="text/javascript">
            Date.prototype.addDays = function (days) {
                var date = new Date(this.valueOf());
                time1 = Math.abs(date.getTime());
                time2 = 1000 * 3600 * 24 * days;
                total = time1 + time2;
                date = new Date(total);
                return date;
            }
        </script>
<script>
            function get_date() {
                if ($('#end_date').val() == '' || $('#start_date').val() == '') {
                    return 1;
                }
                var a = new Date($('#end_date').val());
                var x = new Date($('#start_date').val());
                diffDays = '';
                if (a >= x) {
                    var timeDiff = Math.abs(a.getTime() - x.getTime());
                    diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                    var date = new Date(document.getElementById("end_date").value);
                    day = date.addDays(1).getDate();
                    month = date.addDays(1).getMonth() + 1;
                    year = date.addDays(1).getFullYear();
                    console.log("date :: " + ("0" + day).slice(-2) + '-' + ("0" + month).slice(-2) + '-' + year);
                    document.getElementById("num_days").value = diffDays + 1;
                    return diffDays + 1;
                } else {
                    swal({
                        title: 'لا يجب أن يسبق تاريخ نهاية  تاريخ بدايته!',
                        type: 'warning',
                        confirmButtonText: 'تم'
                    });
                    document.getElementById("end_date").value = '';
                    document.getElementById("num_days").value = '';
                    document.getElementById("num_days").value = diffDays;
                    return diffDays;
                }
            }
        </script>
<!-- yara -->
<script>
    function change_type_setting(id, title, title_fk, title_n) {
        $('.title_setting').text(title);
        $('#type_setting').data('id', id);
        $('#type_setting').data('title', title);
        $('#type_setting').data('title_fk', title_fk);
        $('#type_setting').data('title_n', title_n);
    }
</script>
<script>
    function add_setting(value, title, div) {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var row_id = $('#row_setting_id').val();
        if (value != 0 && value != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/mohma/Mohma_c/add_setting',
                data: {value: value, type: type, type_name: type_name, row_id: row_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + title).val(' ');
                    $('#row_setting_id').val('');
                    $('#setting_output').html(html);
                    load_settigs();
                }
            });
        }
        else {
            swal({
                title: 'من فضلك تأكد من الحقول الناقصه !',
                type: 'warning',
                confirmButtonText: 'تم'
            });
        }
    }
</script>
<script>
    function load_settigs() {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
            // $('#settingModal').modal('show');
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url()?>human_resources/mohma/Mohma_c/load_settigs',
                 data: {type: type, type_name: type_name},
                 dataType: 'html',
                 cache: false,
                 beforeSend: function () {
                     $('#setting_output').html(
                         '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                     );
                 },
                 success: function (html) {
                     $('#setting_output').html(html);
                 }
             });
    }
</script>
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
    <script>
    //yara
    function Get_emp_Name(emp_id,emp_n,edara_id, edara_n, type) {
        var checkBox = document.getElementById("myCheck" + emp_id);
        if (checkBox.checked == true) {
            $('#emp_n').val(emp_n);
              $('#emp_id_fk').val(emp_id);
              $('#edara_n').val(edara_n);
$('#edara_id').val(edara_id);
             $('#tahwelModal').hide();
        } 
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#type_setting').data("title_fk");
        var title_n = $('#type_setting').data("title_n");
        /// id title function
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#settingModal').hide();
    }
</script>
<?php } else{?>
<script>
    //yara
    function Get_emp_Name(emp_id,emp_n,edara_id, edara_n, type) {
        var checkBox = document.getElementById("myCheck" + emp_id);
        if (checkBox.checked == true) {
            $('#emp_n').val(emp_n);
              $('#emp_id_fk').val(emp_id);
              $('#edara_n').val(edara_n);
$('#edara_id').val(edara_id);
$('#tahwelModal').modal('hide');
        } 
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#type_setting').data("title_fk");
        var title_n = $('#type_setting').data("title_n");
        /// id title function
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#settingModal').modal('hide');
    }
</script>
<?php }?>