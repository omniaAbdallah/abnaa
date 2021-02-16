<div class="panel panel-default">
    <?php 
    /*
    echo'<pre>';
    print_r($family_sarf);*/
    if ((isset($data)) && (!empty($data))) { ?>
        <div class="panel-heading ">
            <div class="row">

                <div class="col-lg-12">
                    <div class="col-xs-12 col-sm-6">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>الإسم الأب
                                    :</strong><?= $data[0]->father_name ?>
                            </li>
                            <li class="list-group-item"><strong>رقم سجل الاب
                                    :</strong><?= $data[0]->f_national_id ?></li>
                                    
                                 <li class="list-group-item"><strong> الفئة
                                    :</strong><?= $data[0]->osara_fe2a ?></li>    
                                    
                                    
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>الإسم الأم
                                    :</strong><?= $data[0]->mother_name ?>
                            </li>
                            <li class="list-group-item"><strong>رقم سجل الأم
                                    :</strong><?= $data[0]->mother_national_num_fk ?></li>
                            </li>
                            <li class="list-group-item"><i
                                        class="fa fa-phone"></i> <?= $data[0]->m_mob ?></li>

                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <table class="table table-responsive  " style="background-color: white">
                            <thead>
                            <tr>
                                <th>أسم الإبن</th>
                                <th>رقم هوية الإبن</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data as $key => $row) {
                                if (!is_numeric($key)) {
                                    break;
                                }
                                ?>
                                <tr>
                                    <td><?= $row->member_full_name ?></td>
                                    <td><?= $row->member_card_num ?></td>
                                </tr>
                                <?php

                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        
        
        
        
        
        
          <div class="panel panel-success">
    <div class="panel-heading">بيان صرف المساعدات للأسرة</div>
    <div class="panel-body">
    
    
                  <?php if(isset($family_sarf) && !empty($family_sarf) ){ ?>
                                        <table class=" example display table table-bordered table-striped table-hover compact">
                                            <thead>
                                            <tr class="greentd">
                                                <th>م</th>
                                                <th>رقم الصرف</th>
                                                <th>اسم بند المساعدة</th>
                                                <th>بتاريخ</th>
                                                <th>قيمة المساعدة</th>
                                                  <th>عدد الأفراد</th>
                                                <th>خلال شهر </th>

</tr>

</thead>
<tbody>
<?php
$x=1 ;
$total = 0;
 foreach($family_sarf as $row ){
     $total += $row->value;
     ?>
    <tr>
        <td><?=$x++;?></td>
        <td><?= $row->sarf_num_fk?></td>
        <td><?php
            if (!empty($row->band_name->title)){
                echo $row->band_name->title;
            } else{
                echo 'غير محدد' ;
            }
            ?></td>
        <td><?php if (!empty($row->sarf->sarf_date_ar)){
                echo $row->sarf->sarf_date_ar;
            } else{
                echo 'غير محدد' ;
            }?></td>
        <td><?php
            if (!empty($row->value)){
                echo $row->value;
            } else{
                echo 'غير محدد' ;
            }?>

        </td>
          <td><?php
            if (!empty($row->mother_num)){
                echo ($row->mother_num + $row->young_num + $row->adult_num );
            } else{
                echo 'غير محدد' ;
            }?>

        </td>
        <td>
            <?php
            if (!empty($row->sarf_month)){
                echo $row->sarf_month;
            } else{
                echo 'غير محدد' ;
            }
            ?>
        </td>

    </tr>
                                            <?php } ?>

                                            </tbody>
                                            <tfoot>
                                              <th colspan="4" style="text-align: center">الاجمالي</th>
                                              <th colspan="2"style="text-align: center" ><?= $total?></th>
                                            </tfoot>



                                        </table>
                                    <?php } else{
                                        ?>
                                        <div class="alert alert-danger">عفوا... لا يوجد بيانات !</div>
                                    <?php
                                    } ?>
    
    </div>
  </div>
        
        

        
        
        
    <?php } ?>





</div>



