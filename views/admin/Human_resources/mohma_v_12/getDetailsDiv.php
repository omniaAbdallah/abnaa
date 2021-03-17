<div class="col-xs-12 padding-4">


    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong> أسم المهمة</strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td> <?php
            if (!empty($ghat)):
                foreach ($ghat as $record):
                    if ($get_all->mohma_name == $record->id_setting) {
                        echo $record->title_setting;
                    }
                    ?>
                   
                    <?php
                endforeach;
            endif;
            ?></td>
            <td style="width: 135px;"><strong> تاريخ الانشاء </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->mohma_date)) {
                    echo  $get_all->mohma_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?>

        
            <td style="width: 105px;">
                <strong>   ارسال الي </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->emp_n)) {
                    echo  $get_all->emp_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

           
           

        </tr>

        <tr>
            <td style="width: 105px;">
                <strong>     
درجة الاهمية </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td> <?php
                                $arr = array(
                                 1 => 'مهم',
                                 2 => 'عاجل',
                                 3 => 'غير مهم',
                                 4 => 'غير عاجل'
                                );
                                foreach ($arr as $key => $value) {
                                    $select = '';
                                    if ($get_all->important != '') {
                                        if ($key == $get_all->important) {
                                            echo $value; 
                                        }
                                    } ?>
                                    
                                    <?php
                                }
                                ?></td>

            <td style="width: 135px;"><strong>  تفاصيل المهمه </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->mohma_details)) {
                    echo  $get_all->mohma_details;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong>   من تاريخ</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
               <td><?php if (!empty($get_all->from_date)) {
              
                    echo $get_all->from_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
        <td style="width: 150px;"><strong>   الي تاريخ</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
               <td><?php if (!empty($get_all->to_date)) {
              
                    echo $get_all->to_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 135px;"><strong> الوقت المقدر</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->num_days)) {
                    echo  $get_all->num_days;
                } else{
                    echo 'غير محدد' ;
                }
                ?>
                يوم
                </td>
            <td style="width: 150px;"><strong>مرتبطة بمهمه اخري</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>
            
            <?php
                                $arry = array('1' => 'نعم', '2' => 'لا');
                                foreach ($arry as $key => $value) {
                                    ?>
                                   
                                        <?php
                                        if ($get_all->another_mohma == $key) {
                                            echo $value;
                                        }
                                        ?>
                                   
                                    <?php
                                }
                                ?>
            </td>

        </tr>
      
       



        </tbody>
    </table>


</div>



