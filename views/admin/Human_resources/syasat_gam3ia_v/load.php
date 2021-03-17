<?php if(!empty($fe2a)&& $fe2a=='egraa')
{?>
<div class="col-md-4 col-sm-4  padding-4">
                    <label class="label  ">  اسم الاجراء </label>
                    <input type="text"
                    data-validation="required"
                       name="title" id="title" 
                    value=""
                           class="form-control ">
 </div>
 <div class="col-md-2 col-sm-4  padding-4">
                    <label class="label  ">   رقم الاصدار </label>
                    <input type="number"
                    data-validation="required"
                       name="rkm" id="rkm" 
                    value=""
                           class="form-control ">
 </div>

 <div class="col-md-3 col-sm-4  padding-4">
                    <label class="label  ">  تاريخ الاصدار </label>
                    <input type="date"
                    data-validation="required"
                       name="d_date_ar" id="d_date_ar" 
                    value="<?php echo date('Y-m-d'); ?>"
                           class="form-control ">
 </div>
 <?php }else if(!empty($fe2a)&& $fe2a=='namozg'){?>
    <div class="col-md-4 col-sm-4  padding-4">
                    <label class="label  ">  اسم النموذج </label>
                    <input type="text"
                    data-validation="required"
                       name="title" id="title" 
                    value=""
                           class="form-control ">
 </div>
 <div class="col-md-2 col-sm-4  padding-4">
                    <label class="label  ">   رقم النموذج </label>
                    <input type="number"
                    data-validation="required"
                       name="rkm" id="rkm" 
                    value=""
                           class="form-control ">
 </div>

 <div class="col-md-3 col-sm-4  padding-4">
                    <label class="label  ">  رمز النموذج </label>
                    <input type="text"
                    data-validation="required"
                       name="ramz" id="ramz" 
                    value=""
                           class="form-control ">
 </div>

 <?php }else{?>

    <div class="col-md-4 col-sm-4  padding-4">
                    <label class="label  ">  الاسم  </label>
                    <input type="text"
                    data-validation="required"
                       name="title" id="title" 
                    value=""
                           class="form-control ">

 <?php }?>