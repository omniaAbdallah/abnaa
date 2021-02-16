<style>  
/*********** upload malti img ****/ 
.block {  
background-color: rgba(255, 255, 255, 0.5);     
margin: 0 auto;     
margin-bottom: 30px;  
text-align: center;    
-webkit-border-radius: 4px;    
-moz-border-radius: 4px;   
border-radius: 4px;  
} 
label.button {   
-webkit-border-radius: 4px;   
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
transition: all 200ms linear;    } 
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
padding: 10px;    }  
#files1 {  
border: 1px solid #eee; 
margin-top: 10px;
padding: 10px; 
}    #sortable {
list-style-type: none;  
margin: 0;   
padding: 0;  
min-height: 110px;    }   
#sortable li {        margin: 3px 3px 3px 0;        float: left;
width: 100px;        height: 104px;        
text-align: center;        position: relative;   
background-color: #FFFFFF;    }    #sortable li,    
#sortable li img {  
-webkit-border-radius: 4px;     
-moz-border-radius: 4px;    
border-radius: 4px;    }  
#sortable img {  
height: 104px;    } 
.closebtn {    
color: #c72530;        font-weight: bold;     
position: absolute;        right: -1px;  
border-radius: 4px;   
padding: 0px 5px 0px 5px;   
background-color: #fff;  
}    .closebtn h6 { 
font-size: 20px; 
margin: 0; 
}
.r-img-message h2 {        padding-top: 4px;    }    .r-img-message img {        width: 100%;     
height: 75px;        border-radius: 5px; 
margin-top: 20px;        margin-bottom: 20px;    }   
.unread {        background: #c7c7c7;    }</style>




<aside class="lg-side">
                      <div class="inbox-head">
                          <h3>البريد الوارد</h3>
                          <form action="#" class="pull-right position">
                              <div class="input-append">
                                  <input type="text" class="sr-input" placeholder="بحث">
                                  <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                              </div>
                          </form>
                      </div>
                      <div class="inbox-body">
                         <!--<div class="mail-option">
                             <div class="chk-all">
                                 <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                 <div class="btn-group">
                                     <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                         All
                                         <i class="fa fa-angle-down "></i>
                                     </a>
                                     <ul class="dropdown-menu">
                                         <li><a href="#"> None</a></li>
                                         <li><a href="#"> Read</a></li>
                                         <li><a href="#"> Unread</a></li>
                                     </ul>
                                 </div>
                             </div>

                             <div class="btn-group">
                                 <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                     <i class=" fa fa-refresh"></i>
                                 </a>
                             </div>
                             <div class="btn-group hidden-phone">
                                 <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                                     More
                                     <i class="fa fa-angle-down "></i>
                                 </a>
                                 <ul class="dropdown-menu">
                                     <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                     <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                 </ul>
                             </div>
                             <div class="btn-group">
                                 <a data-toggle="dropdown" href="#" class="btn mini blue">
                                     Move to
                                     <i class="fa fa-angle-down "></i>
                                 </a>
                                 <ul class="dropdown-menu">
                                     <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                     <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                 </ul>
                             </div>

                             <ul class="unstyled inbox-pagination">
                                 <li><span>1-50 of 234</span></li>
                                 <li>
                                     <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                                 </li>
                                 <li>
                                     <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                                 </li>
                             </ul>
                         </div>
                         -->
  <table class="table table-inbox table-hover">
    <tbody>
    
    <?php       
if (isset($my_email) && !empty($my_email)) {   
    

  /* echo '<pre>'; 
print_r($my_email);*/

    
foreach ($my_email as $row) {     
if ($row->readed == 0) {   
$unread = 'unread';     

} else {    
$unread = '';    
}  
?>

    <tr class="<?=$unread?>" onclick="get_my_emails('page_content','message_details',<?= $row->id ?>)"  >
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
          <td class="view-message  dont-show">
          <?php if (isset($row->employee_photo) && !empty($row->employee_photo)) { ?>     
<img style="    padding: 2px;
    border-radius: 100px;
    border: 2px solid #eee;
    height: 35px;
    width: 36px;" src="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo ?>"  
class="border-green hidden-xs hidden-sm" alt="">     
<?php } else { ?>     
<img style="    padding: 2px;
    border-radius: 100px;
    border: 2px solid #eee;
    height: 35px;
    width: 36px;" src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png"        
class="border-green hidden-xs hidden-sm" alt="">  
<?php } ?>
          <?= $row->email_from_n; ?>
          <span class="label label-danger pull-right">عاجل</span>
          </td>
          <td class="view-message "><?= $row->content; ?></td>
          <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message  text-right">
     
          <span class="label label-warning pull-right" style="color: black;">
            <i class="fa fa-calendar" aria-hidden="true"></i>
          <?= date('d-m-Y',$row->ttime);?></span>
          <span class="label label-warning pull-right" style="color: black;">
          <i class="fa fa-clock-o" aria-hidden="true"></i>
          <?= date('g:ia',$row->ttime);?></span>
          </td>
      </tr>


  <?php  
}

?>
   <?php }  else{ ?>  
<div class="alert alert-danger" id="text111" style="display:none; color: #BD000A; display:block;">   
لا يوجد رسائل  واردة                 </div>      
<?php                    } ?>    
    
    
    
    <!--
      <tr class="unread">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message  dont-show">PHPClass</td>
          <td class="view-message ">Added a new class: Login Class Fast Site</td>
          <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message  text-right">9:27 AM</td>
      </tr>
      <tr class="unread">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Google Webmaster </td>
          <td class="view-message">Improve the search presence of WebSite</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">March 15</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">JW Player</td>
          <td class="view-message">Last Chance: Upgrade to Pro for </td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">March 15</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Tim Reid, S P N</td>
          <td class="view-message">Boost Your Website Traffic</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">April 01</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
          <td class="view-message dont-show">Freelancer.com <span class="label label-danger pull-right">urgent</span></td>
          <td class="view-message">Stop wasting your visitors </td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">May 23</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
          <td class="view-message dont-show">WOW Slider </td>
          <td class="view-message">New WOW Slider v7.8 - 67% off</td>
          <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message text-right">March 14</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
          <td class="view-message dont-show">LinkedIn Pulse</td>
          <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
          <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message text-right">Feb 19</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Drupal Community<span class="label label-success pull-right">megazine</span></td>
          <td class="view-message view-message">Welcome to the Drupal Community</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">March 04</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Facebook</td>
          <td class="view-message view-message">Somebody requested a new password </td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">June 13</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Skype <span class="label label-info pull-right">family</span></td>
          <td class="view-message view-message">Password successfully changed</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">March 24</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
          <td class="view-message dont-show">Google+</td>
          <td class="view-message">alireza, do you know</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">March 09</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
          <td class="dont-show">Zoosk </td>
          <td class="view-message">7 new singles we think you'll like</td>
          <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message text-right">May 14</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">LinkedIn </td>
          <td class="view-message">Alireza: Nokia Networks, System Group and </td>
          <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message text-right">February 25</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="dont-show">Facebook</td>
          <td class="view-message view-message">Your account was recently logged into</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">March 14</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Twitter</td>
          <td class="view-message">Your Twitter password has been changed</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">April 07</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">InternetSeer Website Monitoring</td>
          <td class="view-message">http://golddesigner.org/ Performance Report</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">July 14</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
          <td class="view-message dont-show">AddMe.com</td>
          <td class="view-message">Submit Your Website to the AddMe Business Directory</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">August 10</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Terri Rexer, S P N</td>
          <td class="view-message view-message">Forget Google AdWords: Un-Limited Clicks fo</td>
          <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message text-right">April 14</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Bertina </td>
          <td class="view-message">IMPORTANT: Don't lose your domains!</td>
          <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message text-right">June 16</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
          <td class="view-message dont-show">Laura Gaffin, S P N </td>
          <td class="view-message">Your Website On Google (Higher Rankings Are Better)</td>
          <td class="view-message inbox-small-cells"></td>
          <td class="view-message text-right">August 10</td>
      </tr>
      <tr class="">
          <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
          </td>
          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
          <td class="view-message dont-show">Facebook</td>
          <td class="view-message view-message">Alireza Zare Login faild</td>
          <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
          <td class="view-message text-right">feb 14</td>
      </tr>
      -->
  </tbody>
  </table>
                      </div>
                  </aside>


























<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable "> 
<div class="panel-heading">    
<h3 class="panel-title">
<i class="fa fa-plus-square"></i> رسائل وارده </h3> 
</div>    <div class="panel-body " style="background-color: #fff;">  
<div id="details">   
<div class="col-xs-12 col-sm-12 col-md-12 no-padding inbox-mail">     
<div class="mailbox-content">         
<?php       
if (isset($my_email) && !empty($my_email)) {   
foreach ($my_email as $row) {     
if ($row->readed == 0) {   
$unread = 'unread';     

} else {    
$unread = '';    
}   
/*if ($_SESSION['role_id_fk'] == 1) {    
$x = $_SESSION['user_id'];              
} else {              
$x = $_SESSION['emp_code'];  
}            
if ($row->email_to_id == $x || $row->email_etlaa_id == $x || $row->email_motbaa_id == $x) {      
*/?>                   
<div class="panel panel-default">  
<div class="panel-heading">      
<span  style="background-color: #006873 !important;" class="bg-green badge avatar-text">عنوان الرسالة</span>                            <span><span><?php echo $row->title ?></span></span> 
<div class="btn-group" role="group" aria-label="..."  
style="float: left;margin-top: -63px;margin-left: 29px;">  
<?php if ($row->readed == 0) {      
?>    
<button type="button" class="btn btn-danger" style="margin-top: 61px;"         
onclick='delete_message(<?= $row->id ?>)'>               
<i class="fa fa-trash"></i> </button>  
<?php } ?>   
<?php if (isset($row->need_replay) && !empty($row->need_replay) && $row->need_replay == 1 
&& isset($row->type_sender) && !empty($row->type_sender) && $row->type_sender == 1) {
?>        <a href="<?= base_url() . "all_secretary/email/Emails/reply_message/" . $row->id ?>" 
class="btn btn-primary" style="margin-top: 61px;"    >
<i style="color: white;" class="fa fa-retweet" aria-hidden="true"></i> </a> 
<?php } ?>    
<?php if (isset($row->type_sender) && !empty($row->type_sender) && $row->type_sender == 1) {   
?>        <a href="<?= base_url() . "all_secretary/email/Emails/forward_message/" . $row->id ?>"     
class="btn btn-info" style="margin-top: 61px;"          
><i style="color: white;" class="fa fa-reply" aria-hidden="true"></i> </a>  
<?php } ?></div>       
</div>     

 <div class="panel-body">  
<a onclick="get_my_emails('page_content','message_details',<?= $row->id ?>)"  
class="inbox_item <?= $unread ?>">            
<div class="inbox-avatar">    
<?php if (isset($row->employee_photo) && !empty($row->employee_photo)) { ?>     
<img src="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo ?>"  
class="border-green hidden-xs hidden-sm" alt="">     
<?php } else { ?>     
<img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png"        
class="border-green hidden-xs hidden-sm" alt="">  
<?php } ?>        
<div class="inbox-avatar-text">      
<div class="avatar-name"><?= $row->email_from_n; ?></div>  
<div>                      
<span class="bg-green badge avatar-text"></span>  
<span><span style="color: black !important;"><?= $row->content; ?></span></span>  
</div>           

</div>          
  

</div>                    </a>  
<?php //}                            
}                            }else{ ?>  
<div class="alert alert-danger" id="text111" style="display:none; color: #BD000A; display:block;">   
لا يوجد رسائل بريد ......                    </div>      
<?php                    } ?>      
</div>   
</div>   


</div>   
</div>  
</div>
</div></div>






<script>    function get_my_emails(div_id,method,id) { 

$.ajax({      
type: 'post',   
url: "<?php echo base_url();?>all_secretary/email/Emails/"+method+'/'+id,  
beforeSend: function () {     
$('#'+div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');    
},       
success: function (d) { 
$('#'+div_id).html(d);  
// $('.selectpicker').selectpicker("refresh");       
// reset_file_input('file');    
}   
}); 
}
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
var r = confirm('هل انت متاكد من حذف الرساله؟');  
if (r == true) {     
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
}
</script>