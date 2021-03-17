<div class="col-sm-12 col-md-12 col-xs-12  " style="padding: 0;">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">

        <div class="panel-heading">

            <div class="panel-title">

                <h4> أعدادات فترات المسيرات   </h4>

            </div>

        </div>

        <div class="panel-body">

            <div class="form-group col-sm-12 col-xs-12">

                <div class="tab-content">

               <div >

                            <div class="panel-body">

                                    <?php

                                    if(isset($mainDepartment) && !empty($mainDepartment) && $mainDepartment!=null){

                                        echo form_open_multipart('human_resources/employee_forms/Mosayar_month/UpdateMainDepartmentSitting/'.$mainDepartment['id']);

                                    }

                                    else{

                                        echo form_open_multipart('human_resources/employee_forms/Mosayar_month/AddMainDepartmentSitting');

                                    }

                                    ?>

                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">

                            <label class="label "> السنة الحالية </label>

                           

        <select name="year" id="year" class="form-control" data-validation="required">

        <option  value="">اختر</option>

        <?php 

          $yearss = range(2020, 2030);

  foreach ($yearss as $key) {

    $selected='';

    if($mainDepartment['year']==$key)

    {

        $selected='selected';    

    }   

        ?>

<option <?=$selected?> value="<?=$key?>"><?=$key?></option>

        <?}?>

        </select>

                        </div>

        <div class="form-group col-sm-2 col-xs-12 padding-4">

        <label class="label ">  الشهر </label>

        <select id="month" name="month" data-validation="required"

                class="form-control " onchange="Checkcode__();"

               >

               <option  value="">اختر</option>

            <?php

              $monthss = array("1" => "يناير", "2" => "فبراير", "3" => "مارس", "4" => "أبريل", "5" => "مايو",

              "6" => "يونيو", "7" => "يوليو", "8" => "أغسطس", "9" => "سبتمبر", "10" => "أكتوبر",

              "11" => "نوفمبر", "12" => "ديسمبر");

            if (isset($monthss) && (!empty($monthss))) {

                foreach ($monthss  as $key => $value) {

                    $select = '';

                    if($key == $mainDepartment['month']){

                    $select = 'selected';

                     } ?>

                    <option value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>

                <?php }

            } ?>

        </select>

        </div>

                        <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">

                            <label class="label "> من تاريخ </label>

                             <input type="date" name="from_date_ar" id="from_date_ar" class="form-control" 

                                   data-validation="required"

                                   value="<?php if(isset($mainDepartment)) echo $mainDepartment['from_date_ar']

                                   ;

                                   else echo date('Y-m-d'); ?>"> 

                            </div> 

                            <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">

                            <label class="label "> الي تاريخ  </label>

                            <input type="date" name="to_date_ar" id="to_date_ar" class="form-control" 

                                   data-validation="required"

                                   value="<?php if(isset($mainDepartment)) echo $mainDepartment['to_date_ar'];

                                   else echo date('Y-m-d');

                                   ?>"> 

                            </div>

                                    <div class="form-group col-sm-12 col-xs-12 text-center">

                                        <button type="submit" name="add_main_department" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">

                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>

                                    </div>

                                    </form>

                                    <?php if (isset($mainDepartments) && !empty($mainDepartments) && $mainDepartments !=null){ ?>

                                        <table class="example table table-bordered table-striped table-hover">

                                            <thead>

                                            <tr class="info">

                                                <th>م</th>

                                                <th>السنة الحالية   </th>

                                                <th>الشهر    </th>

                                                <th>من تاريخ    </th>

                                                <th>الي تاريخ    </th>

                                                <th>الإجراء</th>

                                            </tr>

                                            </thead>

                                            <tbody>

                                            <?php

                                            $x = 1;

                                            foreach ($mainDepartments as $value) {

                                                ?>

                                                <tr>

                                                    <td >

                                                        <?=($x++)?>

                                                    </td>

                                                    <td

                                                    ><?=$value->year?></td>

                                                    <td

                                                    >

            <?php

              $monthss = array("1" => "يناير", "2" => "فبراير", "3" => "مارس", "4" => "أبريل", "5" => "مايو",

              "6" => "يونيو", "7" => "يوليو", "8" => "أغسطس", "9" => "سبتمبر", "10" => "أكتوبر",

              "11" => "نوفمبر", "12" => "ديسمبر");

            if (isset($monthss) && (!empty($monthss))) {

                foreach ($monthss  as $key => $valuee) {

                    if($key == $value->month){

                        echo $valuee;

                     } ?>

                <?php }

            } ?>

                                                    </td>

                                                    <td

                                                    ><?=$value->from_date_ar?></td>

                                                    <td

                                                    ><?=$value->to_date_ar?></td>

            <td >

   

                    <a onclick='swal({

        title: "هل انت متأكد من التعديل ؟",

        text: "",

        type: "warning",

        showCancelButton: true,

        confirmButtonClass: "btn-warning",

        confirmButtonText: "تعديل",

        cancelButtonText: "إلغاء",

        closeOnConfirm: false

        },

        function(){

        window.location="<?php echo base_url().'human_resources/employee_forms/Mosayar_month/UpdateMainDepartmentSitting/'.$value->id.""  ?>";

        });'>

    <i class="fa fa-pencil"> </i></a>

                    <a onclick=' swal({

        title: "هل انت متأكد من الحذف ؟",

        text: "",

        type: "warning",

        showCancelButton: true,

        confirmButtonClass: "btn-danger",

        confirmButtonText: "حذف",

        cancelButtonText: "إلغاء",

        closeOnConfirm: false

        },

        function(){

        swal("تم الحذف!", "", "success");

        setTimeout(function(){window.location="<?=base_url()."human_resources/employee_forms/Mosayar_month/DeleteMainDepartmenSitting/".$value->id?>";}, 500);

        });'>

    <i class="fa fa-trash"> </i></a>

            </td>

                                                </tr>

                                            <?php } ?>

                                            </tbody>

                                        </table>

                                    <?php } ?>

                            </div>

                        </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

    function Checkcode() {

      var  year= $('#year').val();

      var  month= $('#month').val();

      if(year !='')

      {

        $.ajax({

            type: 'post',

            url: '<?php echo base_url() ?>human_resources/employee_forms/Mosayar_month/Checkcode',

            data: {year:year,month:month},

            dataType: 'html',

            cache: false,

            beforeSend: function () {

                    swal({

                        title: "جاري التحقق ... ",

                        text: "",

                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

                        showConfirmButton: false,

                        allowOutsideClick: false

                    });

            },

            success: function (html) {

                if (html == 1) {

                    swal(" برجاء ادخال عام وشهر  لم يتم ادخالة من قبل","", "error");

                    $('#year').val('');

                    $('#month').val('');

                } else if (html == 0) {

                    //swal("   ترتيب  جديد","", "scuess");

                    swal("    عام وشهر  جديد    ","", "success");

                    $('#year').val(year);

                    $('#month').val(month);

                }

            }

        });

      }else{

        swal(" برجاء ادخال عام ","", "error");

        $('#month').val('');

      }

    }

</script>