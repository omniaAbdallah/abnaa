<?php
 if(isset($da3watt) && !empty($da3watt) ){
 if($da3watt->action_da3wa ==Null ||$da3watt->action_da3wa =='' ){?>
<div class="modal modal-startup2 fade" id="dawa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document"
    style="
    width: 82%;
">
        <div class="modal-content" style="
    width: 100%;
">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">
                 <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
دعوة لحضور إجتماع  </h6>
            </div>
            <div class="modal-body">
<div class="box box-primary">
<div class="box-body box-profile">
 <table class="table">
    <tbody>
      <tr>
        <td style="background: #d9534f; color: white;" >رقم الجلسة  <span class="badge bg-green"><?php if(isset($galsa_details->glsa_rkm)&&!empty($galsa_details->glsa_rkm))
      {echo $galsa_details->glsa_rkm;} 
      ?>
      </span> </td>
         <td style="background: #d9534f; color: white;">تاريخ الجلسة   <span class="badge bg-green">
         <?php if(isset($galsa_details->glsa_date_ar)&&!empty($galsa_details->glsa_date_ar))
      {echo $galsa_details->glsa_date_ar;} 
      ?>
      </span></td>
           <td style="background: #d9534f; color: white;">الموضوع <span class="badge bg-blue"><?php if(isset($galsa_details->subject)&&!empty($galsa_details->subject))
       {
echo $galsa_details->subject;
       } 
      ?></span> </td>
    </tr>
    </tbody>
  </table>
</div>
<!-- yarara -->
<div class="">
    <div class="print_forma  no-border    col-xs-12 allpad-12">
        <div class="col-xs-12">
            <div class="personality" style="margin-top: 28px;">
              <!--  <div class="col-xs-1"></div>-->
                <div class="col-xs-8 ahwal_style">
                    <h6 class="" style="font-weight: bold !important;font-size: 15px !important; color: #a70000;">
                        <?php echo  $da3watt->emp_name; ?>
                    </h6>
                </div>
                <div class="col-xs-3">
                    <h6 class=""
                        style="font-weight: bold !important;font-size: 15px !important; color: #a70000;">
						السلام عليكم ورحمة الله وبركاتة ،وبعد :
                    </h6>
                </div>
                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                    <h6 style="font-weight: bold !important; color: #09704e;"></h6>
                </div>
                <div class="col-xs-12 no-padding">
                    <div class="form-group col-sm-12 col-xs-12">
                        <h6 style="line-height: 20px; color: black; font-weight: bold; font-family: sans-serif;">
                        <i style="color: red;" class="fa fa-quote-right" aria-hidden="true"></i>
						  قد تمت دعوتكم لحضور اجتماع الذي تقرر عقده بمشيئة الله في يوم  <?=$galsa_details->glsa_day?> <?=$galsa_details->glsa_date_ar?>،وذلك في تمام الساعة <?=$galsa_details->glsa_time?><?php
                                if (isset($all_places) && (!empty($all_places))) {
                                    foreach ($all_places as $key) {
                                        if (isset($galsa_details->makn_en3qd) && (!empty($galsa_details->makn_en3qd))) {
                                            if ($key->id_setting == $galsa_details->makn_en3qd) {
                                                echo $key->title_setting;
                                            }
                                        }}}
                                        ?> بمقر الجمعية  .للنظر في جدول الأعمال التالي :-
                        </h6>
                    </div>
                         <div class="form-group col-sm-12 col-xs-12">            
                  <table class="table  table-bordered">
  <thead>
    <tr>
      <th style="color: white;background: #fcb632;">م</th>
      <th style="color: white;background: #fcb632;">إسم المحور</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(isset($mahwrs) and $mahwrs != null){ 
   foreach($mahwrs as $mehwar) { ?>
      <tr>
      <td style="color: blue; text-align: right; font-size: 14px !important;"><?=$mehwar->mehwar_rkm?></td>
      <td style="color: blue; text-align: right; font-size: 14px !important;"><?=$mehwar->mehwar_title?></td>
    </tr>
  <?php  
     }
 }
   ?>
  </tbody>
</table>
 </div>  
  <i  style="color: red;" class="fa fa-quote-left" aria-hidden="true"></i>                
                    <div class="form-group col-sm-12 col-xs-12">
				
                        <h6 style="line-height: 22px; color: #0068c1; font-weight: bold;">نسأل الله أن يتقبل طاعاتكم وصالح أعمالكم</h6>
						<h6 style="line-height: 22px; color: #0068c1; font-weight: bold;">تقبلوا تحياتنا والله يحفظكم</h6>
                    
                    </div>
                </div>
             <div class="col-xs-12 no-padding">
                     <?php 
?>
             </div>    
            </div>
            <div class="special col-xs-12 ">
                <div class="col-xs-4 text-center">
                </div>
                <div class="col-xs-3 text-center">
                </div>
                <div class="col-xs-5 text-center ">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
</div>
<!-- yaraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<div class="modal-footer">
<div class="col-xs-12">
<div class="col-md-12" id="refuse_d3waa" style="display:none; padding-bottom: 16px; ">
<span style="
    float: right;
">سبب رفض الدعوة</span>
<input type="text" id="reasonn"  class="form-control" name="reason">
</div>
<div class="col-md-12" id="actionn">
<div class="col-md-4">
<a  onclick="confirm_da3wa(<?=$da3watt->id?>,'accept')" class="btn btn-success btn-block"><b>قبول الدعوة</b></a>
</div>
 <div class="col-md-4">
<a onclick="confirm_da3wa(<?=$da3watt->id?>,'refuse')" class="btn btn-danger btn-block"><b>رفض الدعوة</b></a>
  </div>
  <div class="col-md-4">
<a onclick="confirm_da3wa(<?=$da3watt->id?>,'wait')" class="btn btn-warning btn-block"><b>تأجيل النظر في الدعوة</b></a>
  </div>
</div>
    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php } }?>