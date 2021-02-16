<?php
/*
echo '<pre>';
 print_r($all_aksat);*/
 ?>
 <?php
//$this->load->view('admin/maham_mowazf_view/basic_data/nav_links');
?>
 <div class="tab-content col-xs-12 col-sm-12 padding-4">
                    <?php if (isset($quests) && $quests != null) {
                        $x = 0;
                    ?>
                        <div class="col-xs-12">
                            <table id="all_data" class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="greentd">
                                        <th class="text-center">رقم القسط</th>
                                         <th class="text-center">تاريخ القسط </th>
                                        <th class="text-center">قيمه القسط </th>
                                        <th class="text-center">خلال شهر</th>
                                        <th class="text-center">خلال عام</th>
                                        <th class="text-center">حالة السداد </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
    <?php
    $total_solfa=0;
    $total_paid=0;
    foreach ($quests as $record) {
        $total_solfa+=$record->value_of_qst;
        if($record->paid=='yes'){
            $total_paid+=$record->value_of_qst;
        }
        ?>

        <tr>
            <td><?php echo ($x + 1); ?></td>
             <td><?php echo $record->qst_date_ar; ?> </td>
            <td><?php echo $record->value_of_qst; ?> </td>
           
            
            <td><?php echo $record->month; ?></td>
          <td><?php echo $record->year; ?></td>
            <td>
            <?php if($record->paid=='no'){ ?>
           
               <span class="label label-danger">غير مسدد</span>   
            <?php }if($record->paid=='yes'){ ?>
                <span class="label label-success">تم السداد</span>
           <?php  }elseif($record->paid=='wait'){?>
              
              <span class="label label-warning">تم التأجيل</span>

            <?php }?>
            </td>


        </tr>
    <?php $x++;
    } ?>
                                </tbody>
<tfoot>
    <tr>
    <td style="text-align: center;font-size: 20px;">اجمالي السلفه</td>
    <td  style="background-color: #086bbf;color: white;text-align: center;font-size: 20px;"><?=$total_solfa?></td>
     <td style="text-align: center;font-size: 20px;"> المسدد</td>
     <td  style="background-color: #0aa942;color: white;text-align: center;font-size: 20px;"><?=$total_paid?></td>
      <td style="text-align: center;font-size: 20px;"> المتبقي</td>
    <td style="background-color: #d44b4b;color: white;text-align: center;font-size: 20px;"><?=$total_solfa- $total_paid?></td>
    </tr>
   

</tfoot>
                            </table>
                        </div>
                    <?php } ?>
                </div>
 
 
 

 
 <?php 
 
 
 
if (isset($items) && !empty($items)) {
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
                    <th style="width: 75px;">قيمة السلفة</th>
                    <th style="width: 140px;">طريقة سداد السلفة</th>
                    <th style="width: 75px;">عدد الاقساط</th>
                    <th style="width: 75px;">قيمة القسط</th>
                    <th style="width: 75px;"> بداية الخصم</th>
                    <th> الاجراء</th>
                    <th> حالة الطلب</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /*
                echo'<pre>';
                print_r($items);*/
                if (isset($items) && !empty($items)) {
                    $x = 1;
                    foreach ($items as $row) {
                        
                        $num_quest_not_paid = $row->num_quest_not_paid;
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
                            <td><?php echo $row->t_rkm; ?></td>
                            <td><?php echo $row->t_rkm_date_m; ?></td>
                       
                            <td><?php echo $row->qemt_solaf; ?></td>
                            <td><?php if ($row->sadad_solfa == 1) {
                                    echo 'دفع نقدا';
                                } elseif ($row->sadad_solfa == 2) {
                                    echo ' تخصم مره واحده علي الراتب';
                                } elseif ($row->sadad_solfa == 3) {
                                    echo 'تخصم شهريا علي الراتب';
                                }
                                ?></td>
                            <td><?php echo $row->qst_num; ?></td>
                            <td><?php echo $row->qemt_qst ?></td>
                            <td><?php echo $row->khsm_form_date_m; ?></td>
                            <td>
                   <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
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

                            </td>
                      
                            <td>
                        <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                            <?php echo $halet_eltalab; ?>
                        </span>
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
<?php }else{ ?>
  <div class="alert alert-danger">
  <strong>معذرة !</strong> الرجاء متابعه الطلبات
</div>  
<?php  } ?>

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
    function report_order(row_id) {



        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/solaf/Solaf/get_solfa_order'?>",
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