<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>

        </div>
        <div class="panel-body">
        
        
        

            <?php $pay_method_arr = array(1 => ' عيني ');//26-5-om
            ?>
            <div class="col-xs-12 no-padding text-center">

                         
                                <div class="panel-body">


                                    <?php

                                    if (!empty($eslat_estlam_deport)) {
                                        ?>
                                        <table id=""
                                               class="table table-striped table-bordered dt-responsive nowrap example">
                                            <thead>
                                            <tr class="greentd">
                                                <th style="text-align: center !important;">م</th>
                                                <th style="text-align: center !important;">رقم الإيصال</th>
                                                <th style="text-align: center !important;">التاريخ</th>
                                                <th style="text-align: center !important;">نوع الإيصال</th>
                                                <th style="text-align: center !important;">طريقة التوريد</th>
                                                <th style="text-align: center !important;">المبلغ</th>
                                                <th style="text-align: center !important;">الإسم</th>
                                                <th style="text-align: center !important;">البند</th>
                                                <th style="text-align: center !important;">القائم بالترحيل</th>
                                                <th style="text-align: center !important;">تاريخ الترحيل</th>
 <th style="text-align: center !important;">البرنامج التابع</th>
                                                <th style="text-align: center !important;">الإجراء</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 0;
                                            foreach ($eslat_estlam_deport as $row) {
                                                $x++;

                                                ?>
                                                <tr>
                                                    <td><?= $x ?></td>
                                                    <td><?= $row->esal_num ?></td>
                                                    <td><?= $row->esal_date ?></td>
                                                    <td><?= $row->esal_type_title ?></td>
                                                    <td><?php if (!empty($pay_method_arr[$row->pay_method])) {
                                                            echo $pay_method_arr[$row->pay_method];
                                                        } ?></td>
                                                    <td><?= $row->value ?></td>
                                                    <td><?= $row->person_name ?></td>
                                                    <td><?= $row->band_title ?></td>

                                                    <td>
                                                        <span style="color: white !important;"
                                                              class="label label-success"><?= $row->store_deport_publisher_name ?></span>
                                                    </td>
                                                    <td>
                                                        <span style="color: white !important;"
                                                              class="label label-success"><?= $row->store_deport_date_ar ?></span>
                                                    </td>

<td style="background: #fcb632;">
<?php 
if($row->brnamg_tabe3 == 1){
    echo 'مساعدات عينية للأسر';
}elseif($row->brnamg_tabe3 == 2){
    echo 'مصروفات عينية للبرامج والأنشطة';
}elseif($row->brnamg_tabe3 == 3){
    echo' مصروفات عينية أصول';
}else{
    
}
?>

</td>
                                                    <td>
                                                        <a data-toggle="modal" class="btn btn-info btn-xs"
                                                           title="التفاصيل"
                                                           style="padding: 1px 5px;"
                                                           onclick="GetTable(<?php echo $row->id; ?>)"
                                                           data-target="#myModal"> <i class="fa fa-list"></i>
                                                        </a>

<?php
if($row->tahwel_to_ezn_edafa == 0){ ?>
<button type="button" class="btn btn-sm btn-success "
        style="    padding: 1px 5px;"
        onclick="">
    <i class="fa fa-plus"></i> إنشاء  قيد محاسبي
</button>  
<?php }elseif($row->tahwel_to_ezn_edafa == 1){ ?>
   <span style="color: white !important;" class="label label-danger">تم التحويل   </span>
<?php }
 ?>
                                                   
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <div style="color: red; font-size: large;" class="col-sm-12">لم يتم إضافة
                                            إيصالات !!
                                        </div>

                                    <?php } ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
<!---------------------------------------------------------myModals------------------------------------>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body" id="optionearea1">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------------------------myModals------------------------------------>
<div class="modal fade" id="modal-add_morfaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافة مرفقات</h4>
            </div>
            <div class="modal-body" id="my_morfaq_add">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------myModals------------------------------------>
<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="" id="img_morfaq"
                     width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    function GetTable(valu) {
        if (valu != 0 && valu != '') {
            var dataString = 'id=' + valu;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/esalat/Esalat_estlam/GetDetails',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#optionearea1").html(html);
                }
            });

        }

    }

</script>





<script>
    function load_add_morfaq(esal_num) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/esalat/Esalat_estlam/show_attach_esal',
            data: {esal_num: esal_num},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#my_morfaq_add").html(html);

            }
        });

    }

</script>



