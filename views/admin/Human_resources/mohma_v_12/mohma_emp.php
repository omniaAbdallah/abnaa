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
            $mohma_date=$result->mohma_date;
            $mohma_details=$result->mohma_details;
            $emp_id_fk=$result->emp_id_fk;
$emp_n = $result->emp_n;
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
$mohma_date=date('Y-m-d');
$mohma_details='';
$emp_id_fk='';
$emp_n = '';
$important='';
$from_date=date("Y-m-d");
$to_date= date("Y-m-d", strtotime(date("Y-m-d") . ' + 1 days'));
$num_days = 1;
$another_mohma='';




            }
            //   $responsable_name = '';
            ?>
            <div class="col-sm-12 form-group">


            <div class="col-md-3  managment-div-select form-group padding-4">
                            <label class="label ">أسم المهمة</label>

        <select name="mohma_name" id="destination" style="width:88%;float: right"
                class="form-control "
                data-show-subtext="true" data-live-search="true"
                data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php
            if (!empty($ghat)):
                foreach ($ghat as $record):
                    $select='';
                    if ($mohma_name == $record->id_setting) {
                        $select = 'selected';
                    }
                    ?>
                    <option
                     <?= $select?>   value="<? echo $record->id_setting; ?>" ><? echo $record->title_setting; ?></option>
                    <?php
                endforeach;
            endif;
            ?>
        </select>
   <button type="button"  id="button_append" class="btn btn-info btn-sm" title="إضافة مهمة أخرى" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> </button>
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
                          
                           value="<?php
                               echo $emp_n;
                            ?>">
                           <input type="hidden" id="emp_id_fk"  name="emp_id_fk" 
                           value="<?php 
                               echo $emp_id_fk;
                         ?>"
                           
                           />
                    <button type="button" class="btn btn-success btn-next" style="float: left;"
                    
                  
                            onclick="$('#tahwelModal').modal('show');load_tahwel(2);" <?php /* if (!empty($emp_data->employee)) {
                        echo 'disabled';
                    } */ ?>>
                        <i class="fa fa-plus"></i></button>
                   
                </div>

                <div class="form-group padding-4 col-md-2 col-xs-12">
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
               
                <div class="col-sm-4  col-md-4 padding-4 ">
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

                        <div class="form-group padding-4 col-md-3 col-xs-12">
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
                       <th class="text-center">  اسناد الي</th> 
                       <th class="text-center">  الوقت المقدر</th> 
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td>
                            
                            <?php
            if (!empty($ghat)):
                foreach ($ghat as $record):
                    if ($value->mohma_name == $record->id_setting) {
                        echo $record->title_setting;
                    }
                    ?>
                   
                    <?php
                endforeach;
            endif;
            ?>
                            </td>
                            <td><?= $value->mohma_date ?></td>
                        
                            <td><?= $value->mohma_details ?></td>
                         <td><?= $value->emp_n ?></td> 
                           
                         <td><?= $value->num_days ?> يوم</td> 
                            <td>
                                
                               
<div id="send_all_mohma">
<?php if( $value->send_all_mohma==0){
    ?>
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
                    <li><a  href="<?php echo base_url();?>/human_resources/mohma/Mohma_c/add_attaches/<?php echo $value->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>إضافة  مرفقات</a></li>
                    
                    <li>  <a onclick='swal({
title: "هل انت متأكد من التعديل ؟",
text: "",
type: "warning",
showCancelButton: true,
confirmButtonClass: "btn-warning",
confirmButtonText: "تعديل",
cancelButtonText: "إلغاء",
closeOnConfirm: false
},
function(){
window.location="<?= base_url() . 'human_resources/mohma/Mohma_c/update/' .$value->id  ?>";
});'>
<i class="fa fa-pencil"></i>تعديل</a>
</li>

<li>
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
                                        swal("تم الحذف!", "", "success");
                                        setTimeout(function(){window.location="<?= base_url() . 'human_resources/mohma/Mohma_c/Delete_namozeg/' . $value->id ?>";}, 500);
                                        });'>
                                    <i class="fa fa-trash"> </i> حذف </a></li>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog "  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافه مهمة </h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="col-xs-7 col-xs-offset-2">
                        <div class="form-group">
                            <h6>اسم مهمة:<span class=""></span></h6>
                            <input type="text" id="destin" name="dest" class="form-control" style="width: 80%;float: right">
                            <button type="button" id="save" onclick="add_option($('#destin').val());" class="btn btn-danger"  style="float: left" data-dismiss="modal">حفظ</button>

                        </div>
                        <div class="clearfix"></div>
                        <br>
                    </div>

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width:100%;">
                <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
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
   
    //yara
    function Get_emp_Name(edara_id, edara_n, type) {
        var checkBox = document.getElementById("myCheck" + edara_id);
        if (checkBox.checked == true) {
        
            $('#emp_n').val(edara_n);

              $('#emp_id_fk').val(edara_id);
         
             $('#tahwelModal').modal('hide');
        } 
    }
</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script>

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
                $('#send_all_mohma').html('<span style="color:green;">تم ارسال المهمة</span>');
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