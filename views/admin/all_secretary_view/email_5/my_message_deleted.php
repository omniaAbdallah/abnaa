<style>    /*********** upload malti img ****/   
.block {   
background-color: rgba(255, 255, 255, 0.5); 
margin: 0 auto;   
margin-bottom: 30px;  
text-align: center; 
-webkit-border-radius: 4px;  
-moz-border-radius: 4px;
border-radius: 4px;
}  
label.button {        -webkit-border-radius: 4px;        
-moz-border-radius: 4px;      
border-radius: 4px;    
background-color: #c72530;   
border: 1px solid #eee;
color: #fff;
padding: 7px 15px;
margin: 5px 0;  
display: inline-block; 
-webkit-transition: all 200ms linear; 
-moz-transition: all 200ms linear; 
-ms-transition: all 200ms linear; 
-o-transition: all 200ms linear; 
transition: all 200ms linear;
} 
label.button:hover { 
color: #c72530;  
background-color: #fff; 
border: 1px solid #ccc;
cursor: pointer;  
-webkit-transition: all 200ms linear;  
-moz-transition: all 200ms linear;  
-ms-transition: all 200ms linear; 
-o-transition: all 200ms linear;     
transition: all 200ms linear;
}    input#images { 
display: none;    }
#multiple-file-preview {   
border: 1px solid #eee;    
margin-top: 10px;   
padding: 10px;
}   
#files1 {  
border: 1px solid #eee;  
margin-top: 10px;
padding: 10px; 
}  
#sortable {   
list-style-type: none;
margin: 0;   
padding: 0; 
min-height: 110px; 
}    #sortable li {
margin: 3px 3px 3px 0;    
float: left;    
width: 100px; 
height: 104px; 
text-align: center;   
position: relative;   
background-color: #FFFFFF; 
}    #sortable li, 
#sortable li img {   
-webkit-border-radius: 4px;
-moz-border-radius: 4px;  
border-radius: 4px; 
}    #sortable img { 
height: 104px;    } 
.closebtn {   
color: #c72530;    
font-weight: bold;  
position: absolute;
right: -1px; 
border-radius: 4px;    
padding: 0px 5px 0px 5px;    
background-color: #fff;  
}    .closebtn h6 {
font-size: 20px;    
margin: 0;  
}  
.r-img-message h2 {  
padding-top: 4px;    }  
.r-img-message img {  
width: 100%;  
height: 75px;   
border-radius: 5px;   
margin-top: 20px; 
margin-bottom: 20px;  
}  
.unread { 
background: #c7c7c7; 
}</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">    
<div class="panel-heading">    
<h3 class="panel-title">
<i class="fa fa-plus-square"></i> رسائل محذوفه </h3>
</div>
<div class="panel-body " style="background-color: #fff;"> 
<div id="details">     
<div class="col-xs-12 col-sm-12 col-md-12 no-padding inbox-mail"> 
<div class="mailbox-content" id="mail_content">    
<!-- email content ajax-->
<?php   
if (isset($my_email) && !empty($my_email)) {     
foreach ($my_email as $row) { 
/*if ($_SESSION['role_id_fk'] == 1) {    
$x = $_SESSION['user_id'];       
} else {        
$x = $_SESSION['emp_code'];    
}   

if ($row->email_to_id == $x || $row->email_etlaa_id == $x || $row->email_motbaa_id == $x ||
$row->email_from_id == $x) {                   
*/ ?>                               
<a href="<?= base_url() . "all_secretary/email/Emails/message_details/" . $row->id ?>"   
class="inbox_item ">    
<div class="inbox-avatar">    
<?php if (isset($row->employee_photo) &&
!empty($row->employee_photo) &&
file_exists(base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo)) { ?> 
<img src="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo ?>"   
class="border-green hidden-xs hidden-sm" alt="">
<?php 
} else { ?>   
<img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png" 
class="border-green hidden-xs hidden-sm" alt="">               
<?php } ?>                       
<div class="inbox-avatar-text">   
<div class="avatar-name"><?=  $row->email_to_n; ?></div>    
<div>    
<small><span class="bg-green badge avatar-text"><?= $row->title; ?>
</span><span><span><?= $row->content; ?></span></span>  
</small>   

</div>   

</div>                          
<div class="inbox-date hidden-sm hidden-xs hidden-md" style="color: #44433e;"> 
<?php  

if (isset($row->deleted_date) && !empty($row->deleted_date) && ($row->deleted == 1)) {   
?>               <div class="date"> تم الحذف بتاريخ <?= $row->deleted_date ?>  
</div>        

<?php } else {         
?>  
<div class="date"><?= $row->date_ar; ?></div>  
<?php } ?>        
</div>                  
</div>        

</a>        
<?php //}                    
}          

} else {   
echo '<div class="alert alert-danger">لا توجد رسايل </div>';
}   

?>   
</div>            </div>     
</div>   
</div></div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script><script type="text/javascript">
/* $(document).ready(function () {      
$.ajax({         
type: 'post',   
url: '<?php echo base_url()?>all_secretary/email/Emails/my_email_data_js',  
data: {type: 2},            dataType: 'html',      
cache: false,  
beforeSend: function () {        
$('#mail_content').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');    
},            success: function (html) {            
$('#mail_content').html(html);            }        });    });*/
</script>
<script>   
function get_details(id) {  
$.ajax({   
type: 'post',    
url: '<?php echo base_url()?>all_secretary/email/Emails/get_details',
data: {id: id},      
dataType: 'html',     
cache: false,    
success: function (html) {  
$('#details').html(html);   
}  
});
}
</script>
<script>
function delete_message(id) {   
$.ajax({        
type: 'post',  
url: '<?php echo base_url()?>all_secretary/email/Emails/delete_message',
data: {id: id},       
dataType: 'html',      
cache: false,      
success: function (html) {   
get_details(id);  
swal({  
title: " تمت الحذف بنجاح ",       
type: "success",       
confirmButtonClass: "btn-warning",   
closeOnConfirm: false   
});         
}    
});
}
</script>