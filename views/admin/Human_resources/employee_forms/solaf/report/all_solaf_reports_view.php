<style type="text/css">
    td .fa-print {
    padding: 2px 7px;
     background-color:white; 
    color: #080808;
    border-radius: 11px;
}
    td .fa-list {
    padding: 3px 4px;
}
</style>
<?php 
/*
echo $sum_all_solaf;
echo '<br/>';
echo $sum_all_solaf_paid;
echo '<br/>';
echo $sum_solaf_not_paid;
echo '<br/>';
echo'<pre>';
print_r($dddd);*/
?>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>المبلغ المرصود للسلف</th>
        <th>إجمالي السلف المصروفة</th>
        <th>إجمالي الأقساط المسددة</th>
        <th>إجمالي الأقساط الغير مسددة</th>
        <th> الرصيد المتوفر</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?=$mabl3_da3m?></td>
        <td><?=$sum_all_solaf?></td>
        <td><?=$sum_all_solaf_paid?></td>
         <td><?=$sum_solaf_not_paid?></td>
          <td><?=($mabl3_da3m+$sum_all_solaf_paid-$sum_all_solaf)?></td>
      </tr>
    </tbody>
  </table>
<?php
// echo '<pre>';
// print_r($items);
if (isset($all_talabat) && !empty($all_talabat)) {
    ?>
    <div class="col-sm-12 no-padding ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="greentd">
                    <th style="width: 25px;">م</th>
                    <th style="width: 60px;">رقم الطلب</th>
                    <th style="width: 85px;">تاريخ الطلب</th>
                    <th style="width: 200px;">إسم الموظف</th>
                    <th style="width: 75px;">قيمة السلفة</th>
                    <th style="width: 140px;">طريقة سداد السلفة</th>
                    <th style="width: 75px;">عدد الاقساط</th>
                    <th style="width: 75px;">قيمة القسط</th>
                    <th style="width: 75px;"> بداية الخصم</th>
                      <th> نهاية الخصم</th>                    
                    <th> الاجراء</th>
                     <th> مـســـدد</th>
                     <th> غير مسدد</th>
                    <th> حالة السلفة</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($all_talabat) && !empty($all_talabat)) {
                    $x = 1;
                    foreach ($all_talabat as $row) {
                        $num_quest_not_paid = $row->num_quest_not_paid;
                      //  $num_quest_paid = $row->num_quest_paid;
                      //  $real_total_num_quest = $num_quest_not_paid -  $num_quest_paid;
                        if($num_quest_not_paid == 0 ){
                           $class_total_num_quest = '#da5e5e'; 
                           $title_total_num_quest = 'تم السداد';
                        }else{
                           $class_total_num_quest = '#ff7700';   
                           $title_total_num_quest = 'جاري السداد'; 
                        }
                        if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                            $link_update = 'edit_solaf(' . $row->id . ')';
                            $link_delete = 1;
                        } else {
                            $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/solaf/Solaf/edit_solaf/' . $row->id . '";';
                            $link_delete = 0;
                        }
                        if ($row->suspend == 0) {
                            $halet_eltalab = 'جاري ';
                            $halet_eltalab_class = 'warning';
                        } elseif ($row->suspend == 1) {
                            $halet_eltalab = 'تم قبول الطلب ';
                            $halet_eltalab_class = 'success';
                        } elseif ($row->suspend == 2) {
                            $halet_eltalab = 'تم رفض الطلب ';
                            $halet_eltalab_class = 'danger';
                        } elseif ($row->suspend == 4) {
                            $halet_eltalab = 'تم اعتماد الطلب بالموافقة ';
                            $halet_eltalab_class = 'success';
                        } elseif ($row->suspend == 5) {
                            $halet_eltalab = 'تم اعتماد الطلب بالرفض ';
                            $halet_eltalab_class = 'danger';
                        } else {
                            $halet_eltalab = 'غير محدد ';
                            $halet_eltalab_class = 'danger';
                        }
                        // echo '<pre>'; print_r($row->t_rkm);
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php echo $row->t_rkm; ?></td>
                            <td  title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php echo $row->t_rkm_date_m; ?></td>
                            <td  title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php echo $row->emp_name; ?></td>
                            <td  title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php echo $row->qemt_solaf; ?></td>
                            <td  title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php if ($row->sadad_solfa == 1) {
                                    echo 'دفع نقدا';
                                } elseif ($row->sadad_solfa == 2) {
                                    echo ' تخصم مره واحده علي الراتب';
                                } elseif ($row->sadad_solfa == 3) {
                                    echo 'تخصم شهريا علي الراتب';
                                }
                                ?></td>
                            <td  title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php echo $row->qst_num; ?></td>
                            <td  title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php echo $row->qemt_qst ?></td>
                            <td  title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php echo $row->khsm_form_date_m; ?></td>
                            <td  title="الطلب الأن عند<?=$row->current_to_user_name?>"><?php echo $row->khsm_to_date_m; ?></td> 
               <td>
<?php 
if($row->suspend == 2 or  $row->suspend == 5  ){
}else{ 
?>
<?php
if($row->tanfez_sanad_sarf == 'no' and $row->suspend = 4  ){
    $tanfez_sanad_sarf_class = 'danger';
    $tanfez_sanad_sarf_title = 'هناك إذن صرف للسلفة ';
}elseif($row->tanfez_sanad_sarf == 'yes' and $row->suspend = 4 ){
    $tanfez_sanad_sarf_class = 'success'; 
    $tanfez_sanad_sarf_title = 'تم تنفيذ إذن الصرف للسلفة '; 
}else{
   $tanfez_sanad_sarf_class = 'primary';
     $tanfez_sanad_sarf_title = ' ';     
}
 ?>
<div class="dropdown">
                            <button title="<?=$tanfez_sanad_sarf_title?>" class="btn btn-<?=$tanfez_sanad_sarf_class?> dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
<li><a onclick="print_order(<?php echo $row->t_rkm; ?>)" title="طباعه"><i
class="fa fa-print"></i>طباعه نموذج السلفة</a></li>                                                        
<li><a onclick="report_order(<?php echo $row->t_rkm; ?>,<?php echo $num_quest_not_paid ?>)" title="طباعة سند الأمر">
<i class="fa fa-print"></i>طباعة سند الأمر </a></li>
<li><a onclick="funnamozg_khasm(<?php echo $row->t_rkm; ?>)" title="طباعه"><i
     class="fa fa-print"></i>نموذج الخصم من الراتب</a></li>
<li>
<a href="#modal_details" data-toggle="modal"
   onclick="get_solfa_details(<?php echo $row->t_rkm; ?>)">
   <i class="btn fa fa-list"></i>تفاصيل أقساط السلفة</a></li>
<li>
<a  href="<?=base_url() . 'human_resources/employee_forms/solaf/Solaf/tagel_solaf/' . $row->id ?>">
                                        <i class="fa fa-list"> </i>طلب تأجيل السلفة</a>
</li>
<li>
<a  href="<?=base_url() . 'human_resources/employee_forms/solaf/Solaf/ta3gel_solaf/' . $row->t_rkm ?>">
                                        <i class="fa fa-list"> </i>طلب تعجيل السلفة</a>
</li>
  <li><a  href="<?php echo base_url();?>/human_resources/employee_forms/solaf/Solaf/add_picture/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>   إضافة  مرفقات</a></li>
                                <li>
                                <?php
                                if ($row->suspend == 0) { ?>
                                    <?php if (!empty($row->current_to_user_id)) {
                                        $text_trans = 'تم تحويل الطلب';
                                        $trans_diapled = 'none';
                                    } else {
                                        $text_trans = ' تحويل الطلب';
                                        $trans_diapled = '';
                                    } ?>
                                    <a class="option_td<?= $row->id ?>" onclick='swal({
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
                                    <?= $link_update ?>
                                            });' style="display:<?= $trans_diapled ?>">
                                        <i class="fa fa-pencil"> </i></a>
                                        </li>
                                        <li>
                                    <a class="option_td<?= $row->id ?>" onclick=' swal({
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
                                            setTimeout(function(){window.location="<?= base_url() . 'human_resources/employee_forms/solaf/Solaf/delete_solfa/' . $row->id . '/' . $link_delete; ?>";}, 500);
                                            });' style="display:<?= $trans_diapled ?>">
                                        <i class="fa fa-trash"> </i></a>
                                        </li>
                                        <li>
                                    <a onclick="make_transformation_direct(<?= $row->id ?>)"
                                       class="btn btn-warning option_td<?= $row->id ?> "
                                       id="transform_direct<?= $row->id ?>" style="display:<?= $trans_diapled ?>">
                                        <?= $text_trans ?></a>
                                        </li>
                                    <!-- </div> -->
                                    <!-- new -->
                                <?php } else { ?>
                                    <span class="label label-danger">
                            عذرا لا يمكنك التعديل والحذف
                        </span>
                                <?php } ?>
                                </ul>
                            </div>
<?php } ?>                            
</td>
                           <!-- <td>
                   <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a onclick="report_order(<?php echo $row->t_rkm; ?>,<?php echo $num_quest_not_paid ?>)" title="طباعة سند الأمر">
                                <i class="fa fa-print"></i>طباعة سند الأمر </a></li>
                                <li>
                                <a href="#modal_details" data-toggle="modal"
                                   onclick="get_solfa_details(<?php echo $row->t_rkm; ?>)">
                                   <i class="btn fa fa-list"></i>تفاصيل أقساط السلفة</a></li>
                                <li><a onclick="print_order(<?php echo $row->t_rkm; ?>)" title="طباعه"><i
                                            class="fa fa-print"></i>طباعه نموذج السلفة</a></li>
<li>
<a  href="<?=base_url() . 'human_resources/employee_forms/solaf/Solaf/tagel_solaf/' . $row->t_rkm ?>">
                                        <i class="fa fa-list"> </i>طلب تأجيل السلفة</a>
</li>
  <li><a  href="<?php echo base_url();?>/human_resources/employee_forms/solaf/Solaf/add_picture/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>   إضافة  مرفقات</a></li>
                                <li>
                                <?php
                                if ($row->suspend == 0) { ?>
                                    <?php if (!empty($row->current_to_user_id)) {
                                        $text_trans = 'تم تحويل الطلب';
                                        $trans_diapled = 'none';
                                    } else {
                                        $text_trans = ' تحويل الطلب';
                                        $trans_diapled = '';
                                    } ?>
                                    <a class="option_td<?= $row->id ?>" onclick='swal({
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
                                    <?= $link_update ?>
                                            });' style="display:<?= $trans_diapled ?>">
                                        <i class="fa fa-pencil"> </i></a>
                                        </li>
                                        <li>
                                    <a class="option_td<?= $row->id ?>" onclick=' swal({
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
                                            setTimeout(function(){window.location="<?= base_url() . 'human_resources/employee_forms/solaf/Solaf/delete_solfa/' . $row->id . '/' . $link_delete; ?>";}, 500);
                                            });' style="display:<?= $trans_diapled ?>">
                                        <i class="fa fa-trash"> </i></a>
                                        </li>
                                        <li>
                                    <a onclick="make_transformation_direct(<?= $row->id ?>)"
                                       class="btn btn-warning option_td<?= $row->id ?> "
                                       id="transform_direct<?= $row->id ?>" style="display:<?= $trans_diapled ?>">
                                        <?= $text_trans ?></a>
                                        </li>
                                <?php } else { ?>
                                    <span class="label label-danger">
                            عذرا لا يمكنك التعديل والحذف
                        </span>
                                <?php } ?>
                                </ul>
                            </div>
                            </td>-->
                         <td title="قسط مسدد" style="background: #50ab20 !important;"><?=$row->num_quest_paid?></td>   
                         <td title="قسط غير مسدد" style="background: #da5e5e !important;"><?=$row->num_quest_not_paid?></td>      
                        <td style="background: <?=$class_total_num_quest?>;">
                           <?=$title_total_num_quest?>
                         </td>   
                        </tr>
                        <?php
                        $x++;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
<!--------------------------------------------------------modal------------------------------------>
<!--------------------------------------------------------------->
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل السلفه</h4>
            </div>
            <div class="modal-body" id="details"></div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php if (!empty($emp_data)) { ?>
    <script>
        $(document).ready(function () {
            get_had_solfa( <?= $emp_data->id ?> );
            get_num_solf( <?= $emp_data->id ?> );
            get_suspend_solf( <?= $emp_data->id ?> );
        });
    </script>
<?php } ?>
<script>
    function report_order(row_id,num_quest_not_paid) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/solaf/Solaf/get_solfa_order'?>",
            type: "POST",
            data: {
                rkm: row_id,
                num_quest_not_paid: num_quest_not_paid
            },
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
             WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
<script>
    function get_suspend_solf(emp_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_suspend_solf",
            data: {
                emp_id: emp_id
            },
            success: function (msg) {
                var obj = JSON.parse(msg);
                if (obj == 1) {
                    document.getElementById("reg").setAttribute("disabled", "disabled");
                    $("#reggi").append("<span  class='label-danger'> عذرا...  لا يمكنك  طلب سلفه نظرا  لوجود سلفه لم يتم انتهاء اقساطها         </span>");
                }
                else if (obj == 0) {
                    document.getElementById("reg").removeAttribute("disabled", "disabled");
                    $("#reggi").html('');
                }
            }
        });
    }
    function get_num_solf(emp_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_num_solf",
            data: {
                emp_id: emp_id
            },
            success: function (msg) {
                var obj = JSON.parse(msg);
                $('#num_previous_requests').val(obj.num_solf);
                $('#previous_request_date_m').val(obj.last_date);
            }
        });
    }
    function get_had_solfa(emp_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_had_solfa",
            data: {
                emp_id: emp_id
            },
            success: function (d) {
              //  $('#hd_solfa').val(d);
            }
        });
    }
    function make_transformation_direct(solf_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/make_transformation_direct",
            data: {
                solf_id: solf_id
            },
            beforeSend: function () {
                swal({
                    title: "جاري التحويل",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    confirmButtonText: "تم"
                });
            },
            success: function (d) {
                if (d == 1) {
                    swal({
                        title: "تم التحويل",
                        text: "",
                        type: "success",
                        confirmButtonText: "تم"
                    });
                    $('#transform_direct' + solf_id).text('تم التحويل');
                    $(".option_td" + solf_id).hide();
                }
            }
        });
    }
</script>
<script>
    function get_solfa_details(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_solaf_details",
            data: {
                rkm: valu
            },
            success: function (d) {
                $('#details').html(d);
            }
        });
    }
</script>
<script>
    function print_order(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/solaf/Solaf/get_solfa_print'?>",
            type: "POST",
            data: {
                rkm: row_id
            },
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
             WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
<script>
    function GetType() {
        var valu = $('#sadad_solfa').val();
        console.log(valu);
        if (valu) {
            if (valu == 1) {
                document.getElementById("qst_num").value = 1;
                document.getElementById("qst_num").setAttribute("readonly", "readonly");
                document.getElementById("quest_val").value = document.getElementById("qemt_solaf").value;
                document.getElementById("quest_val").removeAttribute("readonly", "readonly");
                var today = new Date();
                Getdate(today);
            } else if (valu == 2) {
                document.getElementById("qst_num").value = 1;
                document.getElementById("qst_num").setAttribute("readonly", "readonly");
                document.getElementById("quest_val").value = document.getElementById("qemt_solaf").value;
                document.getElementById("quest_val").setAttribute("readonly", "readonly");
                var today = new Date();
                Getdate(today);
            } else {
                document.getElementById("qst_num").value = '';
                document.getElementById("qst_num").removeAttribute("readonly", "readonly");
                document.getElementById("quest_val").removeAttribute("readonly", "readonly");
            }
        }
    }
</script>
<script>
    function Getdiv() {
        if (document.getElementById("qst_num").value) {
            console.log(document.getElementById("qemt_solaf").value);
            console.log(document.getElementById("qst_num").value);
            document.getElementById("quest_val").removeAttribute("readonly", "readonly");
            document.getElementById("quest_val").value = Math.round((document.getElementById("qemt_solaf").value / document
                .getElementById("qst_num").value * 100) / 100);
            document.getElementById("quest_val").setAttribute("readonly", "readonly");
            var today = new Date();
            Getdate(today);
        }
    //    alert(document.getElementById("hd_solfa").value);
      //alert(document.getElementById("qemt_solaf").value);
if (document.getElementById("qemt_solaf").value > document.getElementById("hd_solfa").value) {
           swal({
                title: "لا يمكن أن تتجاوز السلفة حد السلفة",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
            document.getElementById("qemt_solaf").value = '';
          //  document.getElementById("qst_num").value = ''; 
    }
    }
</script>
<script>
    function Getdate(valu) {
        console.warn('valu :: '+valu);
        var y = document.getElementById("qst_num").value;
        console.log('qst_num : '+y);
        y = parseInt(y);
        var d = new Date(valu);
        console.log('new Date ::'+d.toLocaleDateString());
        d.setMonth(d.getMonth() + y);
        console.log('new Date 2  ::'+d.toLocaleDateString());
//         var str = $.datepicker.formatDate('yy-mm-dd', d.toLocaleDateString());
        var date = d.toLocaleDateString();
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;
            return [year, month, day].join('-');
        //   return [year, month, day].join('/');
        }
//alert(date);
        date = formatDate(date);
        console.warn('date :: '+date);
/*
 var yyy = document.getElementById("khsm_to_date_m").value;
 alert(yyy);*/
        document.getElementById("khsm_to_date_m").value = date;
        //document.getElementById("khsm_to_date_m").setAttribute("disabled", "disabled");
    }
</script>
<script>
    function get_details() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_details",
            success: function (d) {
                $('#details').html(d);
            }
        });
    }
</script>
<script>
    function get_details_dbt() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_details_dbt",
            success: function (d) {
                $('#details_dbt').html(d);
            }
        });
    }
</script>
<script>
    function get_details_doc() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_details_doc",
            success: function (d) {
                $('#details_doc').html(d);
            }
        });
    }
</script>
<script>
    function get_details_exp() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_details_exp",
            success: function (d) {
                $('#details_exp').html(d);
            }
        });
    }
</script>
<script>
    function Getdiv_quest(had_quest) {
        console.log(had_quest);
        console.log(document.getElementById("qst_num").value);
        if (document.getElementById("qst_num").value <= had_quest) {
            console.log(document.getElementById("qemt_solaf").value);
            console.log(document.getElementById("qst_num").value);
            document.getElementById("quest_val").removeAttribute("readonly", "readonly");
            var new_value= Math.round((document.getElementById("qemt_solaf").value / document
                .getElementById("qst_num").value * 100) / 100);
            if(!isNaN(parseInt(document.getElementById("qst_num").value))){
                document.getElementById("quest_val").value = new_value;
            }else {
                document.getElementById("quest_val").value = '';
            }
            document.getElementById("quest_val").setAttribute("readonly", "readonly");
            var today = new Date();
            Getdate(today);
        }
        else {
            swal({
                title: "   يجب ان يكون عدد الاقساط اقل من  	أقصي مدة سداد! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
            document.getElementById("quest_val").value = '';
            document.getElementById("qst_num").value = '';
        }
    }
</script>
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copy',
                'csv',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    },
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true,
        });
    </script>
<?php } ?>
<script>
function get_had_solfa_new(emp_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_had_solfa_new",
            data: {
                emp_id: emp_id
            },
            success: function (d) {
                $('#hd_solfa').val(d);
            }
        });
    }
    </script>
    <script>
    function funnamozg_khasm(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/solaf/Solaf/namozg_khasm'?>",
            type: "POST",
            data: {
                rkm: row_id
            },
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
             WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>