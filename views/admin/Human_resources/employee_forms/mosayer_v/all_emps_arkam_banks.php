    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$title?></h3>
            </div>
            <div class="panel-body"> 
                <div class="col-md-12 no-padding">
<?php 
if (isset($all_emps) && !empty($all_emps)){ 
?>
  <table class="example table table-bordered table-striped" role="table">
                <thead>
                <tr>
                  <th style="width: 10px">م</th>
                  <th>كود الموظف</th>
                  <th>إسم الموظف</th>
                    <th>رقم الهوية</th>
                   <th>طريقة الصرف</th>
                    <th>إسم الموظف لدي البنك</th>
                  <th>إسم البنك</th>
                   <th>كود البنك </th>
                   <th>رقم الحساب</th> 
                </tr>
                 </thead>
                 <tbody>
                        <?php
                        $c=0;
  foreach ($all_emps as $emp ){
    if($emp->pay_method_id_fk == 2){
        $pay_method_id_fk = 'شيك';
    }elseif($emp->pay_method_id_fk == 3){
        $pay_method_id_fk = 'تحويل بنكي';
    }else{
        $pay_method_id_fk = 'غير محدد';
    }
    $c++;
   ?>        
                <tr>
                  <td><?=$c?></td>
                  <td><?=$emp->emp_code?></td>
                  <td><?=$emp->emp_name?></td>
                  <td><?=$emp->card_num?></td>
                  <td><?=$pay_method_id_fk?></td>
                  <td><?=$emp->esm_lda_bank?></td>
                  <td><?=$emp->bank_name?></td>
                   <td><?=$emp->bank_code?></td>
                     <td><?=$emp->bank_account_num?></td>
                </tr>
    <?php } ?>
              </tbody>
              </table>
<?php
}else{ 
   ?> 
<div class="alert alert-danger">
  <strong>عذرا!</strong> لا يوجد أي بيانات
</div>   
<?php }
 ?>
</div>
 </div>
 </div></div>