<style>    /*********** upload malti img ****/    .block {        background-color: rgba(255, 255, 255, 0.5);        margin: 0 auto;        margin-bottom: 30px;        text-align: center;        -webkit-border-radius: 4px;        -moz-border-radius: 4px;        border-radius: 4px;    }    label.button {        -webkit-border-radius: 4px;        -moz-border-radius: 4px;        border-radius: 4px;        background-color: #c72530;        border: 1px solid #eee;        color: #fff;        padding: 7px 15px;        margin: 5px 0;        display: inline-block;        -webkit-transition: all 200ms linear;        -moz-transition: all 200ms linear;        -ms-transition: all 200ms linear;        -o-transition: all 200ms linear;        transition: all 200ms linear;    }    label.button:hover {        color: #c72530;        background-color: #fff;        border: 1px solid #ccc;        cursor: pointer;        -webkit-transition: all 200ms linear;        -moz-transition: all 200ms linear;        -ms-transition: all 200ms linear;        -o-transition: all 200ms linear;        transition: all 200ms linear;    }    input#images {        display: none;    }    #multiple-file-preview {        border: 1px solid #eee;        margin-top: 10px;        padding: 10px;    }    #files1 {        border: 1px solid #eee;        margin-top: 10px;        padding: 10px;    }    #sortable {        list-style-type: none;        margin: 0;        padding: 0;        min-height: 110px;    }    #sortable li {        margin: 3px 3px 3px 0;        float: left;        width: 100px;        height: 104px;        text-align: center;        position: relative;        background-color: #FFFFFF;    }    #sortable li,    #sortable li img {        -webkit-border-radius: 4px;        -moz-border-radius: 4px;        border-radius: 4px;    }    #sortable img {        height: 104px;    }    .closebtn {        color: #c72530;        font-weight: bold;        position: absolute;        right: -1px;        border-radius: 4px;        padding: 0px 5px 0px 5px;        background-color: #fff;    }    .closebtn h6 {        font-size: 20px;        margin: 0;    }    .r-img-message h2 {        padding-top: 4px;    }    .r-img-message img {        width: 100%;        height: 75px;        border-radius: 5px;        margin-top: 20px;        margin-bottom: 20px;    }    .unread {        background: #c7c7c7;    }    span{            color: black;    font-weight: normal;    font-size: 12px;    }        .badge.avatar-text {    margin-left: 5px;    color: #fff;    font-weight: normal;    padding: 3px 10px;    border-radius: 10px;}</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable "> 
<div class="panel-heading"> 
<h3 class="panel-title">
<i class="fa fa-plus-square"></i> رسائل المرسله </h3>   
</div>    <div class="panel-body " style="background-color: #fff;"> 
<div id="details_message">     
<div class="col-xs-12 col-sm-12 col-md-12 no-padding inbox-mail"> 
<div class="mailbox-content" id="mail_content">  

<!-- email content ajax-->
<?php
/*echo '<pre>';print_r($my_email);*/
if (isset($my_email) && !empty($my_email)) { 
foreach ($my_email as $row) {     
?>      
<a onclick="get_my_emails('page_content','message_details',<?= $row->id ?>)"  
class="inbox_item ">            <div class="panel panel-default">  
<div class="panel-heading"> 
<span style="background-color: green;" class="bg-green badge avatar-text">   
<i class="fa fa-paper-plane" aria-hidden="true"></i>      تم الإرسال إلي </span> 
<span><?= $row->email_to_n; ?></span> 
<span style="background-color: #2d2b2b;" 
class="bg-green badge avatar-text" >  
<i class="fa fa-calendar" aria-hidden="true"></i>  
<?php echo date('Y-m-d',$row->date);?>    
</span>   
<span style="background-color: #2d2b2b;" class="bg-green badge avatar-text">    
<i class="fa fa-clock-o" aria-hidden="true"></i>  
<?php echo date('h:i:s',$row->ttime);?>   
</span>      </div>   
<div class="panel-body">       
<div class="inbox-avatar">  
<?php if (isset($row->employee_photo) && !empty($row->employee_photo) 
&& file_exists(base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo)) { ?>   
<img src="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo ?>"  
class="border-green hidden-xs hidden-sm" alt="">    
<?php } else { ?>      
<img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png"   
class="border-green hidden-xs hidden-sm" alt="">       
<?php } ?>     
<div class="inbox-avatar-text">     
<div class="avatar-name"></div> 
<div>            
<small>
<span  class="bg-green badge avatar-text"><?= $row->title; ?></span>   
<span><span><?= $row->content; ?></span>
</span>   

</small>    

</div>    
</div> 

</div>
</div> 
</div>  
</a>        <?php //}   
}} else {    echo '<div class="alert alert-danger">لا توجد رسايل </div>';}?>    
</div>   
</div>   
</div>  
</div></div><script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js">
</script><script type="text/javascript">  
function get_my_emails(div_id, method, id) {  
$.ajax({        
type: 'post', 
url: "<?php echo base_url();?>all_secretary/email/Emails/" + method + '/' + id,   
beforeSend: function () {     
$('#' + div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');      
},    
success: function (d) {   
$('#' + div_id).html(d);    
// $('.selectpicker').selectpicker("refresh");  
// reset_file_input('file');    
}   
});  
}  
/*$(document).ready(function() { 
$.ajax({  
type: 'post',
url: '<?php echo base_url()?>all_secretary/email/Emails/my_email_data_js' ,
data:{type:1},            dataType: 'html',    
cache: false,     
beforeSend: function () {   
$('#mail_content').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');   
},            success: function (html) {            
$('#mail_content').html(html);    
}        });    });*/</script>
<script> 
function get_details_message(id) {
$.ajax({          
type: 'post',  
url: '<?php echo base_url()?>all_secretary/email/Emails/get_details_message',   
data: {id: id},    
dataType: 'html',     
cache: false,   
success: function (html) {  

$('#details_message').html(html);    
}    
});  
}
</script>
<script>  
function delete_message_sent(id) { 
$.ajax({ 
type: 'post',   
url: '<?php echo base_url()?>all_secretary/email/Emails/delete_message', 
data: {id: id}, 
dataType: 'html',  
cache: false,  
success: function (html) { 
get_details_message(id);     
swal({     
title: " تمت الحذف بنجاح ",  
type: "success",   
confirmButtonClass: "btn-warning",  
closeOnConfirm: false  
});   
}  
}); 
}</script>
<script> 
function archive_message(id) { 
$.ajax({          
type: 'post',
url: '<?php echo base_url()?>all_secretary/email/Emails/archive_message', 
data: {id: id},   
dataType: 'html',   
cache: false,   
success: function (html) {
// get_details_message(id);     
get_my_emails('page_content','my_sent_emails') 
swal({    
title: " تمت التحويل الي الارشيف بنجاح ",     
type: "success",             
confirmButtonClass: "btn-warning",     
closeOnConfirm: false
}); 
}  
});  
}
</script>