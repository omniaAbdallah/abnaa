<style>
h4{
    color: <?=$record->color ?> !important;
}

</style>
<?php   if(!empty($record)){

    if(!empty($record->ehdaa_to)){
    ?>
     <br /> <br /><br />
        <div class="col-md-12 padding-4 ">
            <div class="col-sm-12  col-md-12 padding-4 ">
                <label class="label label-green  ">إهداء إلي  </label>
                <input  type="text" name="ehdaa_to" id="ehdaa_to" class="form-control  input-style" placeholder="أدخل البيانات"
                        value=""   data-validation="required"
                        oninput="document.getElementById('name_card_ehdaa_to').innerHTML =$(this).val();">
                <!--document.getElementById('html-content-holder').innerHTML =$(this).val(); -->
            </div>
            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">إهداء إلي (اعلي) </label>-->
                <input  type="hidden" name="ehdaa_to_top" id="ehdaa_to_top" value="<?=$record->ehdaa_to_top?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" onchange="">
            </div>

            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">إهداء إلي (اليمين) </label>-->
                <input  type="hidden" name="ehdaa_to_right" id="ehdaa_to_right" value="<?=$record->ehdaa_to_right?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" onchange="">
            </div>
        </div>
    <?php } ?>

    <?php
    if(!empty($record->ehdaa_from)){
    ?>
     <br /> <br /><br />
        <div class="col-md-12 padding-4 ">
            <div class="col-sm-12  col-md-12 padding-4 ">
                <label class="label label-green  ">إهداء من  </label>
                <input  type="text" name="ehdaa_from" id="ehdaa_from" class="form-control  input-style" placeholder="أدخل البيانات"
                        value=""   data-validation="required"
                        oninput="document.getElementById('name_card_ehdaa_from').innerHTML =$(this).val();">
            </div>
            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">إهداء من (اعلي) </label>-->
                <input  type="hidden" name="ehdaa_from_top" id="ehdaa_from_top" value="<?=$record->ehdaa_from_top?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" onchange="">
            </div>

            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">إهداء من (اليمين) </label>-->
                <input  type="hidden" name="ehdaa_from_right" id="ehdaa_from_right" value="<?=$record->ehdaa_from_right?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" onchange="">
            </div>
        </div>
    <?php } ?>

    <?php
    if(!empty($record->luqb)){
        ?>
         <br /> <br /><br />
        <div class="col-md-12 padding-4 ">
            <div class="col-sm-12  col-md-12 padding-4 ">
                <label class="label label-green  "> اللقب </label>
                <input  type="text" name="luqb" id="luqb" class="form-control  input-style" placeholder="أدخل البيانات"
                        value=""   data-validation="required"
                        oninput="document.getElementById('name_card_luqb').innerHTML =$(this).val();">
            </div>
            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">اللقب (اعلي) </label>-->
                <input  type="hidden" name="luqb_top" id="luqb_top" value="<?=$record->luqb_top?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" >
            </div>

            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">اللقب (اليمين) </label>-->
                <input  type="hidden" name="luqb_right" id="luqb_right" value="<?=$record->luqb_right?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" >
            </div>
        </div>
    <?php } ?>

    <?php
    if(!empty($record->emp_name)){
        ?>
         <br /> <br /><br />
        <div class="col-md-12 padding-4 ">
            <div class="col-sm-12  col-md-12 padding-4 ">
                <label class="label label-green  "> الإسم </label>
                <input  type="text" name="emp_name" id="emp_name" class="form-control  input-style" placeholder="أدخل البيانات"
                        value=""   data-validation="required"
                        oninput="document.getElementById('name_card_emp_name').innerHTML =$(this).val();">
            </div>
            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">اسم الموظف (اعلي) </label>-->
                <input  type="hidden" name="emp_name_top" id="emp_name_top" value="<?=$record->emp_name_top?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" onchange="">
            </div>

            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">اسم الموظف (اليمين) </label>-->
                <input  type="hidden" name="emp_name_right" id="emp_name_right" value="<?=$record->emp_name_right?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" onchange="">
            </div>
        </div>
    <?php } ?>

    <?php
    if(!empty($record->tabr3_type)){
        ?>
         <br /> <br /><br />
        <div class="col-md-12 padding-4 ">
            <div class="col-sm-12  col-md-12 padding-4 ">
                <label class="label label-green  "> قيمة التبرع </label>
                <input  type="text" name="tabr3_type" id="tabr3_type" class="form-control  input-style" placeholder="أدخل البيانات"
                        value=""   data-validation="required"
                        oninput="document.getElementById('name_card_tabr3_type').innerHTML =$(this).val();">
            </div>
            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">قيمة التبرع (اعلي) </label>-->
                <input  type="hidden" name="tabr3_type_top" id="tabr3_type_top" value="<?=$record->tabr3_type_top?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" onchange="">
            </div>

            <div class="col-sm-12  col-md-12 padding-4 ">
<!--                <label class="label label-green  ">قيمة التبرع (اليمين) </label>-->
                <input  type="hidden" name="tabr3_type_right" id="tabr3_type_right" value="<?=$record->tabr3_type_right?>" class="form-control  input-style" placeholder="أدخل البيانات"
                        data-validation="required" onchange="">
            </div>
        </div>
    <?php } ?>


<?php } ?>