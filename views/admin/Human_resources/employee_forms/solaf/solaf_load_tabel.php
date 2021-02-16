<?php
/*
echo '<pre>';
print_r($rows);*/
    if (isset($rows) && !empty($rows)) {
        $x = 1;

        foreach ($rows as $row) { ?>

      <table class="table  table-striped table-bordered dt-responsive nowrap">
        <tbody>
        <tr>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
               رقم الطلب
            </th>
            <td><?php echo $row->t_rkm; ?></td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
             تاريخ الطلب
             </th>
            <td><?php echo $row->t_rkm_date_m; ?></td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            اسم الموظف</th>

            <td><?php echo $row->emp_name; ?></td>
        </tr>
        <tr>
        <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            
         الرقم الوظيفي 
            </th>
            <td><?php echo $row->emp_code_fk; ?></td>


            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            المسمى الوظيفي </th>
          
            <td><?php echo $row->job_title; ?></td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            الأدارة </th>
 
            <td><?= $row->edara_n;?></td>

        </tr>
        
        <tr>
        <th class="info" style="width: 110px; background-color: #4e5451 !important;">
             القسم </th>
         
            <td><?php echo $row->qsm_n; ?></td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            قيمه السلفه </th>
           
            <td><?php echo $row->qemt_solaf; ?></td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
             تاريخ بدايه الخصم</th>
  
            <td><?php echo $row->khsm_form_date_m; ?></td>
        </tr>
        <tr>
        <th class="info" style="width: 110px; background-color: #4e5451 !important;">
             عدد الاقساط</th>
         
            <td><?php echo $row->qst_num; ?></td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            قيمه القسط </th>
      
            <td><?php echo $row->qemt_solaf /$row->qst_num; ?></td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            حد السلفة</th>
    
            <td><?php echo $row->hd_solfa; ?></td>
        </tr>
        <tr>
        <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            طريقه سداد السلفه </th>
         
            <td><?php if($row->sadad_solfa==1){echo 'دفع نقدا';}elseif($row->sadad_solfa==2){echo ' تخصم مره واحده علي الراتب';}
                    elseif($row->sadad_solfa==3){echo 'تخصم شهريا علي الراتب';}
                    ?>


            </td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
             تاريخ اخر سلفه</th>
         
            <td><?php echo $row->previous_request_date_m; ?></td>
            <th class="info" style="width: 110px; background-color: #4e5451 !important;">
            سبب السلفه</th>
       
            <td><?php echo $row->solaf_reason; ?></td>

        </tr>
        </tbody>
    </table>
    <?php }
    } ?>