<?php    if (isset($my_email) && !empty($my_email)) {   
foreach ($my_email as $row) {     ?>   
<a href="<?= base_url() . "maham_mowazf/email/Emails/message_details/" . $row->id ?>"
class="inbox_item ">    
<div class="inbox-avatar">       
<?php if (isset($row->employee_photo) && !empty($row->employee_photo) && file_exists(base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo)) { ?>      
<img src="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo ?>"         
class="border-green hidden-xs hidden-sm" alt="">       
<?php } else { ?>                  
<img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png"                       
          class="border-green hidden-xs hidden-sm" alt="">        
<?php } ?>                        <div class="inbox-avatar-text">    
<div class="avatar-name"><?=                                    $row->email_to_n; ?></div>       
<div>                     
<small><span                                
class="bg-green badge avatar-text"><?= $row->title; ?>
</span><span><span><?= $row->content; ?></span></span>                                </small>                    
</div>                        </div>                     
<div class="inbox-date hidden-sm hidden-xs hidden-md" style="color: #44433e;">       
<?php                         
if (isset($row->deleted_date) && !empty($row->deleted_date) && ($row->deleted == 1)) {                
?>                            
<div class="date"> تم الحذف بتاريخ <?= $row->deleted_date ?>     
</div>                         
<?php } else {             
?>    

<div class="date"><?= $row->date_ar; ?></div>                      
<?php } ?>         

</div>              
</div>                </a>   
<?php //}    
}    } else {    
echo '<div class="alert alert-danger">لا توجد رسايل </div>';    }?>