<div class="col-xs-12 padding-4">

    <input type="hidden" id="sader_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم  الصادر </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->sader_id_fk	 ?></td>
            <td style="width: 135px;"><strong> تاريخ التحويل </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->date_ar)) {
                    echo  $get_all->date_ar;
                } else{
                    echo 'غير محدد' ;
                }
                ?>

        
            <td style="width: 105px;">
                <strong>     المهمه </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->mohema_n)) {
                    echo  $get_all->mohema_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

           
           

        </tr>

        <tr>
            <td style="width: 105px;">
                <strong>      الموضوع </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->subject)) {
                    echo  $get_all->subject;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 135px;"><strong>  محول من  </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->from_user_n)) {
                    echo  $get_all->from_user_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong>    الاولويه</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->awlawia_n)) {
                    echo  $get_all->awlawia_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>    
تاريخ الاستحقاق</strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>  <?php
                           // $arr = (1 => 'نعم', 0 => 'لا');
                           if (!empty($get_all->esthkak_date)) {
                        echo $get_all->esthkak_date;
                            } else{
                                echo 'غير محدد' ;
                            } ?>
                                
                               
                
                
                </td>

           
          

        </tr>
        
        


        </tbody>
    </table>


</div>



