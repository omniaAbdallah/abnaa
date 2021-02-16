
<?php
/*
 echo '<pre>';
 print_r($records);*/
if (isset($records) && !empty($records)) {
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
                    <!--<th style="width: 60px;">خاص بالسلفة رقم</th> -->
                    <th style="width: 85px;">تاريخ الطلب</th>
                    <th style="width: 200px;">إسم الموظف</th>
                      <th style="width: 200px;">المسمي الوظيفي</th>
                    <th style="width: 140px;">طريقة السداد</th>
                    <th style="width: 75px;"> التعجيل لشهر</th>
                    <th style="width: 75px;">   قيمه السداد </th>
                  
                    <th> الاجراء</th>
                    <th> حالة الطلب</th>
                    <th>إجراء علي الطلب</th>
                     <th>تنفيذ الطلب</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($records) && !empty($records)) {
                    $x = 1;
                    foreach ($records as $row) {
                    //    print_r($records);
                           $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/solaf/Solaf/edit_ta3gel_solaf/' . $row->id . '/' . $row->solfa_rkm .'";';
                            $link_delete = 0;
                        if ($row->suspend == 0) {
                            $halet_eltalab = 'جاري ';
                            $halet_eltalab_class = 'orange';
                        } elseif ($row->suspend == 1) {
                            $halet_eltalab = 'تم قبول الطلب ';
                            $halet_eltalab_class = '#50ab20';
                        } elseif ($row->suspend == 2) {
                            $halet_eltalab = 'تم رفض الطلب ';
                            $halet_eltalab_class = '#ff827e';
                        }elseif ($row->suspend == 4) {
                            $halet_eltalab = 'تم اعتماد الطلب ';
                            $halet_eltalab_class = '#50ab20';
                        }elseif ($row->suspend == 5) {
                            $halet_eltalab = 'تم اعتماد الطلب ';
                            $halet_eltalab_class = '#ff827e';
                        }elseif ($row->suspend == 5) {
                            $halet_eltalab = 'تم تحويل الطلب ';
                            $halet_eltalab_class = '#ff827e';
                        }  
                         else {
                            $halet_eltalab = 'غير محدد ';
                            $halet_eltalab_class = '#ff827e';
                        }
                        
                        
                        
                        if ($row->fe2a_ta3gel == 1) {
                                    $title_fe2a = ' نقدي ';
                                    $color_fe2a = ' green ';
                                    $process_fe2a = ' تحويل إلي أمين الصندوق ';
                                } elseif ($row->fe2a_ta3gel == 2) {
                                    $title_fe2a =  '  تحويل';
                                     $color_fe2a = ' orange ';
                                     $process_fe2a = ' تحويل إلي المالية ';
                                } elseif ($row->fe2a_ta3gel == 3) {
                                    $title_fe2a =  'خصم من الراتب';
                                     $color_fe2a = ' red ';
                                     $process_fe2a = 'خصم من المسير ';
                                }
                        
                        // echo '<pre>'; print_r($row->t_rkm);
                        
                        
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                             <td><?php echo $row->t_rkm; ?></td>
                           <!-- <td><?php echo $row->solfa_rkm; ?></td>-->
                           
                            <td><?php echo $row->t_rkm_date_m; ?></td>
                            <td><?php echo $row->emp_name; ?></td>
                            <td><?php echo $row->mosma_wazefy_n; ?></td>
                            <td style="background:<?=$color_fe2a?>;"><?=$title_fe2a ?></td>
                                 <td> 
                                 <?php
                          //   echo    unserialize($row->for_month);
                         //  echo $allFields = unserialize($row->for_month);
                        // echo '<pre>';  print_r($allFields);
                             $months = array(
                                 1 => 'Jan',
                              2 => 'Feb', 
                              3 => 'Mar',
                               4 => 'Apr',
                                5 => 'May',
                                 6 => 'Jun', 
                                 7 => 'Jul', 
                                 8 => 'Aug',
                                  9 => 'Sep',
                                   10 => 'Oct',
                                    11 => 'Nov',
                                     12 => 'Dec');
            if (isset($months) && (!empty($months))) {
                foreach ($months as $key=>$value) {
                    $allFields = unserialize($row->for_month);
                    if (isset($allFields) && (!empty($allFields))) {
                        if (in_array($key, $allFields)) {
                         echo  $value ;
                         echo '/2020';
                         echo ',';
                       
                        }
                    }
                }
            }
                    ?>
                                 </td>
                                
                                 <td><?php echo $row->qemt_qst; ?></td>
                          
                            <td>
                            <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a  href="<?php echo base_url();?>/human_resources/employee_forms/solaf/Solaf/add_picture_ta3gel/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>   إضافة  مرفقات</a></li>
                   
                                        </ul>
                            </div>
                            </td>
                            <td style="background:<?=$halet_eltalab_class?>;">
                            <?php echo $halet_eltalab; ?>
                            </td>
                            <td style="background:<?=$halet_eltalab_class?>;">
                            <?php echo $process_fe2a; ?>
                            </td>
                            <td>
                            <?php if($row->tanfez == 'yes'){  ?>
                            
                           <span class="badge badge-danger">تم تنفيذ العملية</span>
                            <?php }else{  ?>
                            
                            
                            
<a  onclick=' swal({
    title: "هل انت متأكد من تنفيذ العملية ?",
    text: "",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-primary",
    confirmButtonText: "قم بالاجراء",
    cancelButtonText: "إلغاء",
    closeOnConfirm: false
    },
    function(){
    swal("تم الاجراء!", "", "success");
    setTimeout(function(){window.location="<?= base_url() . 'human_resources/employee_forms/solaf/Solaf/do_action_ta3gel_sarf/' . $row->id . '/' . $row->t_rkm .'/' .$row->solfa_rkm.'/'.$row->emp_code_fk.'/'.$row->fe2a_ta3gel; ?>";}, 500);
    });' >

<button  class="btn btn-sm btn-success">تنفيذ العملية</button>

</a>
   <?php } ?>           
                  
          
          <!--               
   <button type="button" onclick="do_sarf(<?=$row->id?>)" class="btn btn-xs btn-warning">
 </button>-->
                           
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

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>



<script>
    function do_sarf(mosayer_rkm) {

        swal({
                title: "هل تريد تنفيذ الصرف ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>human_resources/employee_forms/solaf/Solaf/do_action_ta3gel_sarf',
                        data: {mosayer_rkm: mosayer_rkm},
                        dataType: 'html',
                        cache: false,
                        beforeSend: function (xhr) {
                            swal({
                                title: "جاري التنفيذ ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (html) {
                            swal({
                                title: 'تم تنفيذ الصرف بنجاح',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            location.reload();
                        }
                    });

                } else {

                }
            });
    }
</script>