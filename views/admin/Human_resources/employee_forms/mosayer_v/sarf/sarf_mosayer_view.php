<style type="text/css">
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {
        width: 100%;
        float: right;
    }
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59 !important;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 2px !important;
    }
    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 70px;
        width: 80px;
        margin: auto;
    }
    .main-title {
        /* display: table; */
        text-align: center;
        /* position: relative; */
        height: 120px;
        /* width: 40%; */
    }
    .main-title h4 {
        /* display: table-cell; */
        /* vertical-align: bottom; */
        text-align: center;
        width: 100%;
        margin: 0
    }
    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border{
        border:0 !important;
    }
    .gray_background{
        background-color: #eee;
    }
    @media print{
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img{
        width: 100%;
        height: 120px;
    }
    @page {
        size: landscape;
        margin: 80px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #000000 !important;
        text-align: center;
        vertical-align: middle;
        font-size: 14px !important;
        padding: 2px;
    }
    .flip-mode{
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }
    a {
    font-size: 14px;
    text-decoration: none !important;
    color: #000000 !important;
}
</style>
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
        <!--<div class="form-group col-sm-2 col-xs-12 padding-4">
        <label class="label "> مركز التكلفة </label>
        <select id="markez_taklfa" name="markez_taklfa[]" multiple title=" يمكنك اختيار اكثر من مركز"
                class="form-control selectpicker" onchange="make_search();"
                data-show-subtext="true" data-live-search="true">
            <?php
            if (isset($markez_taklfa) && (!empty($markez_taklfa))) {
                foreach ($markez_taklfa as $key) {
                    $select = '';
                    ?>
                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->name; ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="form-group col-sm-2 col-xs-12 padding-4">
        <label class="label ">  الادارة </label>
        <select id="edara" name="edara[]" multiple title=" يمكنك اختيار اكثر من اداره"
                class="form-control selectpicker" onchange="make_search();"
                data-show-subtext="true" data-live-search="true">
            <?php
            if (isset($edara) && (!empty($edara))) {
                foreach ($edara as $key) {
                    if($key->edara_n !=''){
                    $select = '';
                    ?>
                    <option value="<?php echo $key->edara_id; ?>" <?= $select ?>> <?php echo $key->edara_n; ?></option>
                <?php }}
            } ?>
        </select>
    </div>-->
    <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label">طريقة  الصرف </label>
                    <select name="pay_method_id_fk" id="pay_method_id_fk" 
                     title=" يمكنك اختيار اكثر من طريقة"
                    onchange="make_search();"   class="form-control" 
                  >
                    <option value="">إختر</option>
                        <?php
                        $paid_type = array("2" => "شيك", "3" => "تحويل ");
                        foreach ($paid_type as $key => $value) {
                             ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!--<button 
                style="
    float: left;
    margin-top: 24px;
"
class="btn btn-warning"
                onclick="print_card()" title="طباعة"><i class="fa fa-print"> </i> طباعة المسير </button>-->
        <div class="panel-body">
     <?php 
     ?>
<div id="result">
            <?php 
            if (isset($all_mosayer_data) && !empty($all_mosayer_data)){ 
                $x=1;
                ?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
                 <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="3" style="width: 140px;">اســــــــــــــــــم الموظف</th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الوظيفة</span></th>
                    <th colspan="10" >الأستحقاقات</th>
                    <th rowspan="3" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>
                    <th colspan="6" >الإستقطاعات	</th>
                    <th rowspan="3" ><span class="flip-mode"> إجمالي الإستقطاعات </span></th>
                    <th rowspan="3" ><span class="flip-mode">صافي المرتب </span></th>
                </tr>
                <tr>
                    <th colspan="8" >الرواتب والأجور	</th>
                    <th colspan="2">مزايا وحوافز	</th>
                   <!-- <th rowspan="2">أخرى </th>-->
                     <th rowspan="2">غياب	</th>
                     <th rowspan="2">إجازة بدون راتب</th>
                      <th rowspan="2">تأخير	</th>
                       <th rowspan="2">جزاءات	</th>
                     <th rowspan="2">التأمينات	</th>
                     <th rowspan="2">السلف	</th>
                    <!--<th rowspan="2">أخرى </th>-->
                </tr>
                <tr>
                <th> <span class="">راتب أساسي</span></th>
                <th> <span class="">بدل سكن</span></th>
                <th> <span class="">بدل مواصلات	</span></th>
                 <th> <span class="">بدل إتصال	</span></th>
                   <th> <span class="">بدل إعاشة	</span></th>
                <th> <span class="">بدل طبيعة عمل	</span></th>
                <th> <span class="">العمل الإضافي	</span></th>
                <th> <span class="">بدل تكليف	</span></th>
                    <th>مكافآت </th>
                    <th>بدل الإنتداب</th>
                </thead>
                <tbody>
                <?php
  foreach ($all_mosayer_data as $emp){
   ?>
        <tr>
                <td><?= $x++;?> </td>
                <!--<td><?= $emp->emp_name?></td>-->
                <td><span  style="font-size: 14px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->emp_name ?>">
               <?=character_limiter($emp->emp_name,14)?>
               </span></td>
              <!--  <td><?= $emp->mosma_wazefy_n?></td>-->
                <td><span  style="font-size: 14px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->mosma_wazefy_n ?>">
               <?=character_limiter($emp->mosma_wazefy_n,6)?>
               </span></td>
                <td>
<?= $emp->rateb_asasy?>
</td>
                <td><?= $emp->badal_sakn?>
                </td>
                <td>
             <?= $emp->badal_mowaslat?></td>
                 <td>
             <?= $emp->badal_etsal?>
                 </td>
                <td>
              <?= $emp->badal_e3asha?></td>
                <td>
               <?= $emp->badal_tabe3a_amal?></td>
                 <td>
               <?= $emp->tot_edafi?></td>
                <td>
              <?= $emp->badal_taklef?>
                </td>
              <td onclick="get_pop_detailes(905,<?= $emp->emp_id ?>)"><?= $emp->tot_mokafaa ?></td>
                <td><?= $emp->tot_entdab?></td>
                <!--<td><?= $emp->tot_okraa_esthkaq?></td>-->
                <td style="background: #e6eed5;"><?= $emp->total_esthkak?></td>
                 <td><?= $emp->khasm_keyab?></td>
                 <td><?= $emp->agaza_bdon_rateb?></td>
                  <td><?= $emp->khasm_takher?></td>
                  <td><?= $emp->khasm_gezaa?></td>
                <td>
                <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs " style="padding:1px 5px;" onclick="load_page(<?=$emp->emp_code?>,<?=$emp->id?>,'<?=$emp->emp_name?>','<?=$emp->mosma_wazefy_n?>',<?=0?>,'<?=$emp->khasm_tamen?>')">
<?= $emp->khasm_tamen?></a>
                <!--<?= $emp->khasm_tamen?>-->
                </td>
                <td><?= $emp->khasm_solaf?></td>
                <!--<td><?= $emp->tot_okraa_khasm?> </td>-->
                <td style="background: #e6eed5;"><?= $emp->total_khsomat?></td>
                <td style="background: #e6eed5;"><?= ($emp->safi)?> </td>
</tr>
                <?php
                }
                ?>
                </tbody>
                <tfoot class="open_green">
                <tr>
                    <th colspan="3">الإجمالى</th>
                     <th><?=$all_mosayer_egmali->egmali_rateb_asasy?></th>
                     <th><?=$all_mosayer_egmali->egmali_badal_sakn?></th>
                     <th><?=$all_mosayer_egmali->egmali_badal_mowaslat?></th>
                      <th><?=$all_mosayer_egmali->egmali_badal_etsal?></th>
                     <th><?=$all_mosayer_egmali->egmali_badal_e3asha?></th>
                     <th><?=$all_mosayer_egmali->egmali_badal_tabe3a_amal?></th>
                     <th><?=$all_mosayer_egmali->egmali_tot_edafi?></th>
                     <th><?=$all_mosayer_egmali->egmali_badal_taklef?></th>
                     <th><?=$all_mosayer_egmali->egmali_tot_mokafaa?></th>
                   <th><?=$all_mosayer_egmali->egmali_tot_entdab?></th>
                    <!--<th><?=$all_mosayer_egmali->egmali_tot_okraa_esthkaq?></th>-->
                    <th><?=$all_mosayer_egmali->egmali_total_esthkak?></th>
                    <th><?=$all_mosayer_egmali->egmali_khasm_keyab?></th>
                    <th><?=$all_mosayer_egmali->egmali_agaza_bdon_rateb?></th>
                    <th><?=$all_mosayer_egmali->egmali_khasm_takher?></th>
                    <th><?=$all_mosayer_egmali->egmali_khasm_gezaa?></th>
                    <th><?=$all_mosayer_egmali->egmali_khasm_tamen?></th>
                    <th><?=$all_mosayer_egmali->egmali_khasm_solaf?></th>
                     <!--<th><?=$all_mosayer_egmali->egmali_tot_okraa_khasm?></th>-->
                    <th><?=$all_mosayer_egmali->egmali_total_khsomat?></th>
                    <th><?=$all_mosayer_egmali->egmali_safi?></th>
                </tr>
                </tfoot>
            </table>
                <?php
            }
            ?>
  </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalpop_detailes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 80%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_header"></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class=" col-xs-12 no-padding" id="load_pop_detailes">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-labeled btn-success " onclick="save_egrat()" id="save_start_work" name="add"
                         value="حفظ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;"> أضافه</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <?php
                //    if (isset($get_all) && !empty($get_all) ){
                ?>
               <!-- <button
                        type="button" onclick="print_asnaf(document.getElementById('sanf_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>-->
                <?php
                //   }
                ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function load_page(emp_code,row_id,emp_name,mosma_wazefy_n,badl_code,ancient_value) {
//alert(ancient_value);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Employee_salaries/get_mosayer_egraat",
            data: {emp_code:emp_code,row_id:row_id,emp_name:emp_name,mosma_wazefy_n:mosma_wazefy_n,badl_code:badl_code,ancient_value:ancient_value},
            success: function (d) {
                $('#result').html(d);
            }
        });
    }
</script>
<script>
    function get_pop_detailes(code, emp_id) {
        $('#modalpop_detailes').modal('show');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/get_pop_detailes',
            data: {emp_id: emp_id, mosayer_rkm_fk:<?=$mosayer_rkm_fk?>, code: code},
            cache: false,
            beforeSend: function () {
                /*  swal({
                        title: "جاري الحذف ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });*/
                $('#load_pop_detailes').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (resp) {
                $('#load_pop_detailes').html(resp);
            }
        });
    }
    function save_egrat() {
        var all_inputs = $(' #pop_form [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                // valid=1;
                $(elem).css("border", "2px solid #5cb85c");
            } else {
                valid = 0;
                $(elem).css("border", "2px solid #ff0000");
            }
        });
        $.ajax({
            type: 'post',
            url: $('#pop_form').attr('action'),
            data: $('#pop_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (resp) {
                swal({
                    title: 'تم  الحفظ بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                $('#modalpop_detailes').modal('hide');
            }
        });
    }
</script>
<script>
    function delete_egraa(egraa_id,td_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/delete_egraa',
            data:{egraa_id:egraa_id},
            cache: false,
            beforeSend: function () {
                swal({
                    title: "جاري الحذف ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (resp) {
                swal({
                    title: 'تم  الحذف بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                $('#'+td_id).closest("tr").remove();
                $('#morfq_show').html(resp);
            }
        });
    }
</script>
<script>
    function make_search() {
         var edara =$('#edara').val();
         var markez_taklfa =$('#markez_taklfa').val();
         var pay_method_id_fk =$('#pay_method_id_fk').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/make_sarf_search',
            data: {edara:edara,markez_taklfa:markez_taklfa,pay_method_id_fk:pay_method_id_fk}
          ,
            dataType:
                'html',
            cache:
                false,
            beforeSend:
                function () {
                    $('#result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                }
            ,
            success: function (html) {
                $("#result").html(html);
            }
        });
    }
</script>
<script>
    function print_card() {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/Employee_salaries/print_card'?>",
            type: "POST",
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script> 

<!-- yara4-10-2020 -->
