<table class="table table-bordered s col-md-12" style="">        <thead>     
<tr>            <td colspan="2">         
<?php if ((isset($row->person_img)) && (!empty($row->person_img)) ) { ?>              
<img id="empImg" src="<?php echo base_url();?>uploads/human_resources/emp_photo/thumbs/<?php echo $row->person_img ;?>"  alt="">   
<?php } else{  ?>             
<img  id="empImg" src="<?php echo base_url();?>asisst/admin_asset/img/user.png"  alt="">               
<?php } ?>            </td>        </tr>       
</thead>     
<tbody>  
<tr class="greentd">            <td class="text-center">الإسم</td>   
</tr>        <tr>            <td id="name-emp" class="text-center">   
<?php if(isset($row->employee)&& !empty($row->employee)) echo $row->employee ;?>        
</td>        </tr>        <tr class="greentd">      
<td class="text-center">الوظيفة</td>        </tr>        <tr>     
<td id="job-title" class="text-center">        
<?php if(isset($row->job_name)&& !empty($row->job_name)) echo $row->job_name ;?>   
   
</td>     
</tr>     
</tbody> 
</table>

