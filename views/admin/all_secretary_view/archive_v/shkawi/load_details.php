<div class="col-xs-12 padding-4">

    <input type="hidden" id="sader_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;"><strong>  رقم  الشكوي </strong> </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>  <?=$get_all->rkm?></td>

            <td style="width: 135px;"><strong> تاريخ الشكوي </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->send_date_ar)) {
                    echo  $get_all->send_date_ar;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong> تاريخ الارسال</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
     <td><?php if (!empty($get_all->send_date_ar)) {
              
                    echo  $get_all->send_date_ar;
                    
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>    اسم الموظف </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->sender_name)) {
                    echo  $get_all->sender_name;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 135px;"><strong>  الادارة </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->sender_edara_n)) {
                    echo  $get_all->sender_edara_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong>   القسم</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->sender_qsm_n)) {
                    echo  $get_all->sender_qsm_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>

        <tr>
            <td style="width: 105px;">
                <strong>     نوع الرساله </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->type_n)) {
                    echo  $get_all->type_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
<?php if($get_all->type_n=="شكوي")
{?>
            <td style="width: 135px;"><strong>  نوع الشكوي </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->shkwa_type_n)) {
                    echo  $get_all->shkwa_type_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

<?php }?>
            <td style="width: 150px;"><strong>    المرسل اليه</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->reciver_name)) {
                    echo  $get_all->reciver_name;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>  الادارة</strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->reciver_edara_n)) {
                    echo  $get_all->reciver_edara_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 135px;"><strong>    القسم </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->reciver_qsm_n)) {
                    echo  $get_all->reciver_qsm_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
             <td style="width: 105px;">
                <strong>      نص الرساله</strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->content)) {
                    echo  $get_all->content;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
        <td style="width: 150px;"><strong>الحاله</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>
            <?php if( $get_all->readed!=0){
                            $suspend_type= 'تم الاستلام';
                            $class_suspend='danger';
                            }else{
                            $suspend_type= 'لم يتم الاستلام ';
                            $class_suspend='warning';
                        }
                        ?>
                   <span style="width: 100%;color: black !important;" class="label label-<?=$class_suspend?>"><?=$suspend_type?></span>
                    </td>
          
          

        </tr>
        



        </tbody>
    </table>


</div>



