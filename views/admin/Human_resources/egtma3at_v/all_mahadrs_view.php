<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>

    
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
        </div>

        <div class="panel-body">
    
    
    
    
    <div class="col-md-12">
        <?php if(isset($records)&&!empty($records)){?>
        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th>مسلسل</th>
                <th>رقم الجلسة</th>
                <th>تاريخ  الجلسة</th>
                <th>  الاعضاء</th>
             <th>وقت البدء  </th>
             <th>وقت الانتهاء  </th>
             <th>المده المستغرقة </th>
                <th>طباعة المحضر</th>
               
            </tr>
            </thead>
            <tbody>
<?php
$x=0;
foreach ($records as $row){
    $x++;
    
    if($row->glsa_finshed == 0){
      $Halet_galsa = 'جلسة نشطة'; 
      $Halet_galsa_color = '#98c73e'; 
    }elseif($row->glsa_finshed == 1){
        $Halet_galsa = 'جلسة إنتهت '; 
         $Halet_galsa_color = '#e65656';   
    }
    ?>
                <tr>
                    <td><?=$x?></td>
                    <td><?=$row->glsa_rkm_full?></td>
                    
                            <td><?= $row->glsa_date_ar ?></td>
                            <td>
                            <button type="button" class="btn btn-sm btn-add" data-toggle="modal"
                                                onclick="det_datiles(<?= $row->glsa_rkm ?>)"
                                                data-target="#myModal"><span class="fa fa-list"></span>
                                            كل الاعضاء
                                        </button>

                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                onclick="det_datiles_action(<?= $row->glsa_rkm ?>,'accept')"
                                                data-target="#myModal"><span class="fa fa-list"></span>
                                            قبل الدعوة
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                onclick="det_datiles_action(<?= $row->glsa_rkm ?>,'refuse')"
                                                data-target="#myModal"><span class="fa fa-list"></span>
                                             رفض الدعوة
                                        </button>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                                onclick="det_datiles_action(<?= $row->glsa_rkm ?>,'wait')"
                                                data-target="#myModal"><span class="fa fa-list"></span>
                                             انتظار الدعوة
                                        </button>
                            </td>
               
                <td><?=$row->time_start?></td>
                <td><?=$row->time_end?></td>
                <td><?php
                    $date1 = new DateTime($row->time_end);
                    $date2 = new DateTime($row->time_start);

//                    echo " date 1::" . $date1->format('Y-m-d') . "<br> date 2 ::" . $date2->format('Y-m-d') . "<br>";
                    $interval = $date1->diff($date2);
//                    echo " year : " . $interval->y . "<br> month :" . $interval->m . "<br> day :" . $interval->d . "<br>";
               /* $x=$row->time_end-$row->time_start;*/
                echo $interval->format("%H:%I:%S");;
                
                ?></td>
      <td>         
       <!-- <a href="<?php echo base_url() ?>human_resources/egtma3at/Egtma3at_c/print_mahdr/<?php echo $row->glsa_rkm  ?>" target="_blank">
                                                <i class="fa fa-print" aria-hidden="true"></i> </a>             -->
                                                <a onclick="print_card(<?= $row->glsa_rkm ?>)" ><i
                                            class="fa fa-print"></i></a>
</td>



                </tr>
    <!----------------------------------------------------------------->
    
<!----------------------------------------------------->
<?php } ?>


            </tbody>
        </table>
        <?php }  ?>


    </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تفاصيل الأعضاء</h4>
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
<script>
        function det_datiles(glsa_rkm) {
            $.ajax({
                type: 'post',
                url: "<?=base_url() . 'human_resources/egtma3at/Egtma3at_c/det_datiles'?>",
                data: {
                    glsa_rkm: glsa_rkm
                }, beforeSend: function () {
                    $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                }, success: function (d) {
                    $('#members_data').html(d);
                }
            });
        }
    </script>
    
    <script>
        function det_datiles_action(glsa_rkm,action) {
            $.ajax({
                type: 'post',
                url: "<?=base_url() . 'human_resources/egtma3at/Egtma3at_c/det_datiles_action'?>",
                data: {
                    glsa_rkm: glsa_rkm,
                    action:action
                }, beforeSend: function () {
                    $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                }, success: function (d) {
                    $('#members_data').html(d);
                }
            });
        }
    </script>
    <script>
    function print_card(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/egtma3at/Egtma3at_c/print_mahdr'?>",
            type: "POST",
            data: {row_id: row_id},
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