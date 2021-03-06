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

</style>







<style>

	

	.tableFixHead 

	{

		overflow-y: auto; 

		height: 650px;

	}

	

.tableFixHead thead th 

	{ position: sticky; 

		top: 0; 

	}



.tableFixHead tfoot th 

	{ position: sticky; 

		bottom: 0; 

	}	

	

	



	table  

	{

		border-collapse: inherit; 

		width: 100%;

	}

 

th     

	{

		background:#e1eace;   

	}

	

	.table-bordered > tfoot > tr > th, .table-bordered > tfoot > tr > td {

     border-top: 1px solid #ffffff !important;

    border-right: 1px solid #ffffff !important;

    background: #e1eace;

}

.table {

    border: 1px solid #000000;

}	

 

	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {

    border: 1px solid #000000;

    text-align: center;

    vertical-align: middle;

    font-size: 14px !important;

    padding: 2px;

}

	

	             tr{cursor: pointer; transition: all .25s ease-in-out}



	   .selected{background-color: #58b446; font-weight: bold; color: #fff;}

            

</style>

<!--

  <form action="<?=site_url('Customer/process')?>" method="post">

  -->

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





<?php 
echo $halet_taghez;
if($halet_taghez == 'yes'){  ?>



<span style="float: left; margin-left: 4px;" class="label label-danger">تم تجهيز المسير لهذا الشهر</span>



<?php }else{  ?>

<button style="float: left; margin-left: 4px;" id="add_cart"   onclick="get_details(<?=$current_month_mosayer?>);"  type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">

  <i class="fa fa-cogs" aria-hidden="true"></i>

  تجهيز المسير <?=$mosayer_month?> -  <?=$halet_taghez?>

</button>

<?php } ?>

            </h3>

            

            <?php } ?>

     

     

   <!--  

     <div class="col-sm-6" style="text-align: left; margin-bottom: 3px;">        

<button id="add_cart"   onclick="get_details(<?=date('m')?>);"  type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">

  <i class="fa fa-cogs" aria-hidden="true"></i>

  تجهيز المسير

</button>

</div>-->

        </div>

        <div class="panel-body">

   <form action="<?=site_url('human_resources/employee_forms/Employee_salaries/process')?>" method="post">       

            <?php

            /*

           echo '<pre>';

            print_r($all_emps);

            */

            if (isset($all_emps) && !empty($all_emps)){ 

                $x=1;

                ?> 

                 <div class="tableFixHead">

           <table class="table"   id="table">

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

                  <!--  <th rowspan="2" ><span class="flip-mode">الراتب الأساسي  </span></th>-->

                    <th colspan="8" >الرواتب والأجور	</th>

                    <th colspan="2">مزايا وحوافز	</th>

                   <!-- <th rowspan="2">أخرى </th>-->

                     <th rowspan="2">غياب	</th>

                     <th rowspan="2">إجازة بدون راتب</th>

                      <th rowspan="2">تأخير	</th>

                       <th rowspan="2">جزاءات	</th>

                     <th rowspan="2">التأمينات	</th>

                     <th rowspan="2">السلف	</th>

                   <!-- <th rowspan="2">أخرى </th>-->

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

                   <!-- <th>ج ب ر</th>

                    <th>ج غ  </th>

                     <th>ج  ت </th>

                     <th>ج  س</th>

                      <th>ج ج </th>  

                        <th>ج ت  </th>-->

                      <!--

                    <th>إجمالي</th>

                    <th>عدد الدقائق</th>

                    <th>إجمالي</th>

                    <th>حصة الموظف</th>

                    <th>سابقة</th>-->

                </thead>

                <tbody>

                <?php

            $egmali_rateb_asasy       = 0;

           $egmali_badal_sakn         = 0;

           $egmali_badal_mowaslat     = 0;

            $egmali_badal_etsal        = 0;

             $egmali_badal_e3asha       = 0;

           $egmali_badal_tabe3a_amal  = 0;

            $egmali_tot_edafi          = 0;

           $egmali_badal_taklef       = 0;

           $egmali_tot_mokafaa       = 0;

           $egmali_tot_entdab       = 0;

           $egmali_tot_okraa_esthkaq = 0;

           $egmali_total_esthkak   = 0;

         $egmali_khasm_keyab        = 0;

         $egmali_agaza_bdon_rateb   = 0;

          $egmali_khasm_takher       = 0;

           $egmali_khasm_gezaa        = 0;

         $egmali_khasm_tamen        = 0;

         $egmali_khasm_solaf        = 0;

          $egmali_tot_okraa_khasm = 0;

         $egmali_total_khsomat  = 0;        

            $egmali_safi = 0;

  foreach ($all_emps as $emp){

           $rateb_asasy       = $emp->rateb_asasy;

           $badal_sakn        = $emp->badal_sakn;

           $badal_mowaslat    = $emp->badal_mowaslat;

            $badal_etsal       = $emp->badal_etsal;  

            $badal_e3asha      = $emp->badal_e3asha;  

           $badal_tabe3a_amal = $emp->badal_tabe3a_amal;

             $tot_edafi         = 0;

           $badal_taklef      = $emp->badal_taklef;

           $tot_mokafaa       = $emp->current_month_mokfaa;

           $tot_entdab       = $emp->badal_entdab;

           $tot_okraa_esthkaq   = 0;

           $total_esthkak = ($rateb_asasy + $badal_sakn + $badal_mowaslat + $badal_tabe3a_amal + $badal_taklef +

                              $badal_etsal + $badal_e3asha + $tot_mokafaa + $tot_entdab +  $tot_edafi + $tot_okraa_esthkaq  );

          $khasm_keyab        = 0;

           $agaza_bdon_rateb   = 0;

            $khasm_takher       = 0; 

              $khasm_gezaa        = 0; 

         $khasm_tamen        = $emp->khasm_tamen;

         $khasm_solaf        = ($emp->current_month_solaf +  $emp->current_month_solaf_ta3gel);

       $tot_okraa_khasm = 0;

       $total_khsomat = ($khasm_tamen + $agaza_bdon_rateb + $khasm_keyab + $khasm_solaf + $khasm_gezaa + $khasm_takher +$tot_okraa_khasm );         

  $safi = ($total_esthkak - $total_khsomat);

 /*************/

           $egmali_rateb_asasy       += $emp->rateb_asasy;

           $egmali_badal_sakn        += $emp->badal_sakn;

           $egmali_badal_mowaslat    += $emp->badal_mowaslat;

            $egmali_badal_etsal       += $emp->badal_etsal;  

            $egmali_badal_e3asha      += $emp->badal_e3asha;  

           $egmali_badal_tabe3a_amal += $emp->badal_tabe3a_amal;

             $egmali_tot_edafi         += 0;

           $egmali_badal_taklef      += $emp->badal_taklef;

           $egmali_tot_mokafaa       += $emp->current_month_mokfaa;

           $egmali_tot_entdab         +=$emp->badal_entdab;

           $egmali_tot_okraa_esthkaq +=0;

           $egmali_total_esthkak += ($rateb_asasy + $badal_sakn + $badal_mowaslat + $badal_tabe3a_amal + $badal_taklef +

                              $badal_etsal + $badal_e3asha + $tot_mokafaa + $tot_entdab + $tot_okraa_esthkaq +   $tot_edafi  );

         $egmali_khasm_keyab        += 0;

         $egmali_agaza_bdon_rateb   += 0;

          $egmali_khasm_takher       += 0;

           $egmali_khasm_gezaa        = 0;

         $egmali_khasm_tamen        += $emp->khasm_tamen;

         $egmali_khasm_solaf        += ($emp->current_month_solaf +  $emp->current_month_solaf_ta3gel);

        $egmali_tot_okraa_khasm    +=0;

         $egmali_total_khsomat += ($khasm_tamen + $agaza_bdon_rateb + $khasm_keyab + $khasm_solaf + $khasm_gezaa + $khasm_takher + $egmali_tot_okraa_khasm );         

  $egmali_safi += ($total_esthkak - $total_khsomat);

 /*************/

   ?>

        <tr>

                <td><?= $x++;?> </td>

                <!--<td><?= $emp->emp_name?></td>-->

                <td><span  style=" float:right;font-size: 14px; color: black; font-weight: bold;  !important;"  

                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->emp_name ?>">

               <?=character_limiter($emp->emp_name,14)?>

               </span></td>

              <!--  <td><?= $emp->new_mosma_wazefy?></td>-->

                <td><span  style="float:right;font-size: 14px; color: black; font-weight: bold;  !important;"  

                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->new_mosma_wazefy ?>">

               <?=character_limiter($emp->new_mosma_wazefy,6)?>

               </span></td>

                <td><?= $rateb_asasy?></td>

                <td><?= $badal_sakn?></td>

                <td><?= $badal_mowaslat?></td>

                 <td><?= $badal_etsal?></td>

                <td><?= $badal_e3asha?></td>

                <td><?= $badal_tabe3a_amal?></td>

                 <td><?= $tot_edafi?></td>

                <td><?= $badal_taklef?></td>

                <td><?= $tot_mokafaa?></td>

                <td><?= $tot_entdab?></td>

                <!--<td><?= $tot_okraa_esthkaq?></td>-->

                <td style="background: #e6eed5;"><?= $total_esthkak?></td>

                 <td><?= $khasm_keyab?></td>

                 <td><?= $agaza_bdon_rateb?></td>

                  <td><?= $khasm_takher?></td>

                  <td><?= $khasm_gezaa?></td>

                <td><?= $khasm_tamen?></td>

                <td><?= $khasm_solaf?></td>

                <!--<td><?= $tot_okraa_khasm?> </td>-->

                <td style="background: #e6eed5;"><?= $total_khsomat?></td>

                <td style="background: #e6eed5;"><?= ($safi)?> </td>

               

</tr>

                <?php

                }

                ?>

                </tbody>

                <tfoot class="open_green">

                <tr>

                    <th colspan="3">الإجمالى</th>

                     <th><?=$egmali_rateb_asasy?></th>

                     <th><?=$egmali_badal_sakn?></th>

                     <th><?=$egmali_badal_mowaslat?></th>

                      <th><?=$egmali_badal_etsal?></th>

                     <th><?=$egmali_badal_e3asha?></th>

                     <th><?=$egmali_badal_tabe3a_amal?></th>

                     <th><?=$egmali_tot_edafi?></th>

                     <th><?=$egmali_badal_taklef?></th>

                     <th><?=$egmali_tot_mokafaa?></th>

                   <th><?=$egmali_tot_entdab?></th>

                   <!-- <th><?=$egmali_tot_okraa_esthkaq?></th>-->

                    <th><?=$egmali_total_esthkak?></th>

                    <th><?=$egmali_khasm_keyab?></th>

                    <th><?=$egmali_agaza_bdon_rateb?></th>

                    <th><?=$egmali_khasm_takher?></th>

                    <th><?=$egmali_khasm_gezaa?></th>

                    <th><?=$egmali_khasm_tamen?></th>

                    <th><?=$egmali_khasm_solaf?></th>

                    <!-- <th><?=$egmali_tot_okraa_khasm?></th>-->

                    <th><?=$egmali_total_khsomat?></th>

                    <th><?=$egmali_safi?></th>

                     

                </tr>

                </tfoot>

            </table>

                <?php

            }

            ?>

        </div>

        </div>

        </form>

    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" style="width: 95%;" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">

        <i class="fa fa-cogs" aria-hidden="true"></i>

        تجهيز المسير  </h5>

      </div>

      <div class="modal-body">

   <div id="mosayer_details">

    </div>

      </div>

      <div class="modal-footer">

                <button type="button" onclick="taghez_mosayer()"

                        class="btn btn-labeled btn-success " id="save_start_work" name="add" value="حفظ تجهيز المسير">

                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ تجهيز المسير

                </button>



                <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>



                <button type="button"

                        class="btn btn-labeled btn-danger "  data-dismiss="modal">

                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق

                </button>

            </div>

    </div>

  </div>

</div>



   <script>

            

            function selectedRow(){

                

                var index,

                    table = document.getElementById("table");

            

                for(var i = 1; i < table.rows.length; i++)

                {

                    table.rows[i].onclick = function()

                    {

                         // remove the background from the previous selected row

                        if(typeof index !== "undefined"){

                           table.rows[index].classList.toggle("selected");

                        }

                        console.log(typeof index);

                        // get the selected row index

                        index = this.rowIndex;

                        // add class selected to the row

                        this.classList.toggle("selected");

                        console.log(typeof index);

                     };

                }

                

            }

            selectedRow();

	   

	 

        </script>

<?=$mosayer_month?>

<script>

    function taghez_mosayer() {

        <?php if (!empty($mosayer_month)){ ?>

        var mosayer_month = '<?=$mosayer_month?>';

        <?php }else{?>

        var mosayer_month = 0;

        <?php } ?>

        if (mosayer_month >= 0) {



            swal({

                    title: "هل انت متاكد من تجهيز المسير",

                    type: "warning",

                    showCancelButton: true,

                    confirmButtonClass: "btn-danger",

                    confirmButtonText: "نعم!",

                    cancelButtonText: "لا!",

                    closeOnConfirm: false,

                    closeOnCancel: false

                },

                function (isConfirm) {

                    if (isConfirm) {

                        $.ajax({

                            type: 'post',

                            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/process',

                            dataType: 'html',

                            cache: false,

                            beforeSend: function () {

                                swal({

                                    title: "جاري تجهيز المسير ",

                                    text: "",

                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

                                    showConfirmButton: false,

                                    allowOutsideClick: false

                                });

                            },

                            success: function (html) {

                                swal({

                                    title: 'تم تجهيز المسير بنجاح ',

                                    type: 'success',

                                    confirmButtonText: 'تم'

                                });

                            }

                        });

                    } else {

                        swal({

                            title: 'تم إلغاء',

                            type: 'error',

                            confirmButtonText: 'تم'

                        });

                    }

                });

        }else {

            swal({

                title: " تم تجهيز المسير من قبل لهذا الشهر",

                type: "danger",

                confirmButtonClass: "btn-danger",

                confirmButtonText: "تم"

            });

        }

    }

   /* function taghez_mosayer() {

        swal({

                title: "هل انت متاكد من تجهيز المسير",

                type: "warning",

                showCancelButton: true,

                confirmButtonClass: "btn-danger",

                confirmButtonText: "نعم!",

                cancelButtonText: "لا!",

                closeOnConfirm: false,

                closeOnCancel: false

            },

            function (isConfirm) {

                if (isConfirm) {

                    $.ajax({

                        type: 'post',

                        url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/process',

                        dataType: 'html',

                        cache: false,

                        beforeSend: function () {

                            swal({

                                title: "جاري الحفظ ... ",

                                text: "",

                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

                                showConfirmButton: false,

                                allowOutsideClick: false

                            });

                        },

                        success: function (html) {

                            swal({

                                title: 'تم الحفظ بنجاح',

                                type: 'success',

                                confirmButtonText: 'تم'

                            });

                        }

                    });

                } else {

                    swal({

                        title: 'تم إلغاء',

                        type: 'error',

                        confirmButtonText: 'تم'

                    });

                }

            });

    }*/

</script>

<script>

    function get_all_data() {

    alert('s');

$('#cart_table').load('<?=site_url('human_resources/employee_forms/Employee_salaries/process')?>',function(){

})

}

    function get_details(month) {

        var dataString = "month=" + month;

        $("#mosayer_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');

        $.ajax({

            type: 'post',

            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/get_load_mosayer',

            data: dataString,

            dataType: 'html',

            cache: false,

            success: function (html) {

                $("#mosayer_details").html(html);

            }

        });

    }

</script>