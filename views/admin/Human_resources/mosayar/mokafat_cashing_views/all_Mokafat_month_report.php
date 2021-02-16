<div class="col-xs-12 no-padding">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">

            <h3 class="panel-title"><?php echo $title; ?> </h3>

        </div>

        <div class="panel-body">

<?php


$days_arr=array();

for ($a=1;$a<19;$a++){
        $days_arr[] =$a;
}
array_unshift($days_arr,19,20,21,22,23,24,25,26,27,28,29,30,31);
/*echo'<pre>';
print_r($days_arr);
echo'</pre>';
die;
*/
?>
            <?php if(!empty($records)){ ?>
            <table id="" class="table table-striped table-bordered dt-responsive nowrap append_table" cellspacing="0" width="100%">

                <thead>

                <tr>

                    <th rowspan="2" class="text-center">م</th>
                    <th rowspan="2" class="text-center">إسم الموظف </th>
                    <th colspan="31"  style="text-align: center">تاريخ الأيام</th>



                    <th rowspan="2" class="text-center">إجمالي المكافأت </th>

                </tr>
                <tr>
                    <?php foreach ($days_arr as $num){ ?>
                        <th class="text-center"><?=$num?></th>
                    <?php } ?>
                </tr>

                </thead>
               <tbody>
               <?php

               $total=0;
               $x=1; foreach ($records as $row){  ?>
                   <tr>
                       <td><?=$x?></td>
               <td><?php echo $row->bank_responsible_name?></td>
                   <?php $total_row=0; foreach ($days_arr as $num){ ?>
                       <td ><?php if(!empty($row->days[$num])){ $total_row +=$row->days[$num]; echo $row->days[$num]; }?></td>
                   <?php } ?>
                       <td class="text-center"><?=$total_row?></td>
                   </tr>
               <?php $total +=$total_row; $x++;} ?>
               </tbody>

                <tbody>

                <tr>

                    <td class="text-center" colspan="33">الإجمالى</td>

                    <td class="text-center" ><?=$total?></td>



                </tr>

                </tbody>

            </table>
            <?php }else{ ?>
             <div class="alert alert-danger">لا توجد بيانات !!</div>
           <?php } ?>
        </div>
    </div>
</div>