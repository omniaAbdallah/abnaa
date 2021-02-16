

<div class="col-sm-12 no-padding">
    <div  class="panel default">
        <div class="panel-heading" style="background: #0b97a5;border-radius: 6px; ">
    <?php if(isset($current_month) and $current_month != null){ ?>
            <h3 style="color: white;" class="panel-title">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                <?=$title; ?>
                <?=$current_month->month_n?>
                في الفترة من
                <span class="label label-default" style="font-size: 17px;background: white !important; border:none; ">
<strong style="color: black;"><?=$current_month->from_date_ar?></strong>
</span>
                إلي
                <span class="label label-default" style="font-size: 17px;background: white !important; border:none;">
<strong style="color: black;"><?=$current_month->to_date_ar?></strong>
</span>
                <span class="label label-default"
                      style="font-size: 17px;background: white !important; border:none; float: left; ">
<strong style="color: black;">القائم بالإجراء   : 
<?php if (isset($_SESSION['user_login_name']) && $_SESSION['user_login_name'] != null) {
    echo $_SESSION['user_login_name'];
} else {
    echo $_SESSION['user_name'];
} ?>
 </strong>
</span>
            </h3>
            
            <?php } ?>
        </div>


<?php
/*
echo '<pre>';
print_r($all_mosayer_actions);*/
 ?>
 
 
 <div class="col-xs-12 col-md-12">
<?php 
if (isset($all_mosayer_actions) && !empty($all_mosayer_actions)){ 
?>

  <table class="example table table-bordered table-striped" role="table">
                <thead>
         
                <tr>
                
                  <th style="width: 10px">م</th>
                    <th>صورة الموظف</th>
                  <th>كود الموظف</th>
                  <th>إسم الموظف</th>
                  <th>المسمي الوظيفي</th>
                   <th>تم التعديل علي </th>
                   <th>القيمة القديمة</th> 
                    <th>القيمة الجديدة</th> 
                     <th>السبب</th> 
                      <th>بتاريخ</th>
                       <th>التوقيت</th>
                          <th>بواسطة</th> 
                 <!--
                  <th style="width: 40px">نوع الأجازة</th>-->
                </tr>
                 </thead>
                 <tbody>
                        <?php
                        $c=0;
  foreach ($all_mosayer_actions as $egraa ){
    $c++;
    if($egraa->ancient_value == null){
     $ancient_value =$egraa->rateb_asasy;   
    }else{
        
     $ancient_value= $egraa->ancient_value;
    }
    
   ?>        
                
                
                <tr>
                  <td><?=$c?></td>
                 <td><img src="<?=base_url()?>/uploads/human_resources/emp_photo/thumbs/<?=$egraa->emp_photo?>" class="img-circle" width="35" height="35" alt="user"></td>
                  <td><?=$egraa->emp_code?></td>
                 <!-- <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/f99b0dd6f845fc13acc362f876f97212.jpg" class="img-circle" width="35" height="35" alt="user"></td>
                   <td><span class="label label-success">أجازة سنوية</span></td>
                  -->
                  
                
                  <td><?=$egraa->emp_name?></td>
                  <td><?=$egraa->mosma_wazefy_n?></td>
                   <td><?=$egraa->badal_name?></td>
                    <td><?=$ancient_value?></td>
                     <td><?=$egraa->new_value?></td>
                      <td><?=$egraa->reason?></td>
                      
                      <td><span class="label label-success"><?=$egraa->egraa_date_ar?></span></td>
                       <td><span class="label label-success"><?=$egraa->time_add?></span></td>
                        <td><span class="label label-danger"><?=$egraa->publisher_name?></span></td>
                      
                </tr>
    
    
    <?php } ?>
              </tbody>
              
              </table>


<?php
}else{ 
   ?> 
<div class="alert alert-danger">
  <strong>عذرا!</strong> لا يوجد أي إجراءات تمت علي المسير إلي الأن 
</div>   
   
<?php }
 ?>

</div>
 
 
 
 </div>
 </div>
 
 