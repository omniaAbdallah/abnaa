<table class="table table-bordered center" style="   margin: auto;



width: 80% !important;" >



 <thead>



 <tr>



 <th style="background: #737373;color: white;" colspan="4">محاور الجلسة </th>



 </tr>



   <tr>



     <th style="background: #737373;color: white; width: 5%;">م</th>



     <th style="background: #737373;color: white;">المحور</th>

   

     <th style="background: #737373;color: white;">القرار</th>

   </tr>



 </thead>



 <tbody>



 <?php 



 if(isset($open_galesa[0]->mehwr_details) and $open_galesa[0]->mehwr_details != ''){



     $x=0;



     foreach($open_galesa[0]->mehwr_details as $row){



$x++;



     ?>



     



     <tr>



       <td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>><?=$x?></td>



     <td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>><i style="color: #e5343d;" class="fa fa-spinner fa-spin" style="font-size:24px"></i><?=$row->mehwar_title ?></td>

     

<td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>><?php 





if(isset($row->elqrar)&&!empty($row->elqrar))



{

echo '<span class="badge bg-green">'.$row->elqrar .'</span>' ;}else{echo 'لم يتم اتخاذ القرار';}  ?></td>



   </tr>



     



<?php   } }



 



 ?>



 



   



 </tbody>



</table> 