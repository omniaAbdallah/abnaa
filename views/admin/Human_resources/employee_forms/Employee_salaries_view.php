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
        font-size: 11px !important;
        padding: 2px;
    }
    .flip-mode{
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }
</style>
<!--
  <form action="<?=site_url('Customer/process')?>" method="post">

  -->



<div class="col-sm-12 no-padding">
    <div  class="panel default">
        <div class="panel-heading">
        
        <div class="col-sm-6">
         <h3 class="panel-title"><?php echo $title;  ?></h3>
        
        </div>
           
            
     <div class="col-sm-6" style="text-align: left; margin-bottom: 3px;">        
      
<a onclick='taghez_mosayer(1);'><i class="fa fa-trash" aria-hidden="true"></i> </a>
      
            
<button id="add_cart"  type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
  تجهيز المسير
</button>
</div>
        </div>
        <div class="panel-body">
   <form action="<?=site_url('human_resources/employee_forms/Employee_salaries/process')?>" method="post">       
        
            <?php
            if (isset($all_emps) && !empty($all_emps)){ 
                $x=1;
                ?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
                <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="3" style="width: 140px;">اســــــــــــــــــم الموظف</th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الوظيفة</span></th>
                    <th colspan="11" >الأستحقاقات</th>
                    <th rowspan="3" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>
                    <th colspan="7" >الإستقطاعات	</th>
                    <th rowspan="3" ><span class="flip-mode">الإستقطاعات إجمالي </span></th>
                    <th rowspan="3" ><span class="flip-mode">المرتب صافى </span></th>
                    <th rowspan="3" >ملاحظات</th>
                </tr>
                <tr>
                  <!--  <th rowspan="2" ><span class="flip-mode">الراتب الأساسي  </span></th>-->
                    <th colspan="8" >الرواتب والأجور	</th>
                    <th colspan="2">مزايا وحوافز	</th>
                    <th rowspan="2">أخرى </th>
                    
                     <th rowspan="2">غياب	</th>
                     <th rowspan="2">إجازة بدون راتب</th>
                      <th rowspan="2">تأخير	</th>
                       <th rowspan="2">جزاءات	</th>
                     
                     <th rowspan="2">التأمينات	</th>
                    
                   
                     <th rowspan="2">السلف	</th>
                  
                   
                    <th rowspan="2">أخرى </th>
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
          
           
           $tot_mokafaa       = 0;
           $tot_entdab       = 0;
           $tot_okraa_esthkaq   = 0;
         
           $total_esthkak = ($rateb_asasy + $badal_sakn + $badal_mowaslat + $badal_tabe3a_amal + $badal_taklef +
                              $badal_etsal + $badal_e3asha + $tot_mokafaa + $tot_entdab +  $tot_edafi + $tot_okraa_esthkaq  );
        
        
          $khasm_keyab        = 0;
           $agaza_bdon_rateb   = 0;
            $khasm_takher       = 0; 
              $khasm_gezaa        = 0; 
         $khasm_tamen        = $emp->khasm_tamen;
        
       
         $khasm_solaf        = 0;
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
          
          
           $egmali_tot_mokafaa       += 0;
           $egmali_tot_entdab         +=0;
           $egmali_tot_okraa_esthkaq +=0;
           
         
           $egmali_total_esthkak += ($rateb_asasy + $badal_sakn + $badal_mowaslat + $badal_tabe3a_amal + $badal_taklef +
                              $badal_etsal + $badal_e3asha + $tot_mokafaa + $tot_entdab + $tot_okraa_esthkaq +   $tot_edafi  );
        
        
        
         $egmali_khasm_keyab        = 0;
         $egmali_agaza_bdon_rateb   = 0;
          $egmali_khasm_takher       = 0;
           $egmali_khasm_gezaa        = 0;
          
         $egmali_khasm_tamen        += $emp->khasm_tamen;
       
        
         $egmali_khasm_solaf        = 0;
        $egmali_tot_okraa_khasm    +=0;
            
         $egmali_total_khsomat += ($khasm_tamen + $agaza_bdon_rateb + $khasm_keyab + $khasm_solaf + $khasm_gezaa + $khasm_takher + $egmali_tot_okraa_khasm );         
 
  $egmali_safi += ($total_esthkak - $total_khsomat);
 
 /*************/
 
 
 
   ?>
        <tr>
                <td><?= $x++;?> </td>
                <!--<td><?= $emp->emp_name?></td>-->
                
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->emp_name ?>">
               <?=character_limiter($emp->emp_name,18)?>
               </span></td>
                
                
              <!--  <td><?= $emp->mosma_wazefy_n?></td>-->
                
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->mosma_wazefy_n ?>">
               <?=character_limiter($emp->mosma_wazefy_n,12)?>
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
                <td><?= $tot_okraa_esthkaq?></td>
                <td style="background: #e6eed5;"><?= $total_esthkak?></td>
                
                
                 <td><?= $khasm_keyab?></td>
                 <td><?= $agaza_bdon_rateb?></td>
                  <td><?= $khasm_takher?></td>
                  <td><?= $khasm_gezaa?></td>
                 
                 
                <td><?= $khasm_tamen?></td>
               
               
                <td><?= $khasm_solaf?></td>
               
               
                <td><?= $tot_okraa_khasm?> </td>
                <td style="background: #e6eed5;"><?= $total_khsomat?></td>
                <td style="background: #e6eed5;"><?= ($safi)?> </td>
                <td>notes </td>
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
                    <th><?=$egmali_tot_okraa_esthkaq?></th>
                    <th><?=$egmali_total_esthkak?></th>
                    
                    <th><?=$egmali_khasm_keyab?></th>
                    <th><?=$egmali_agaza_bdon_rateb?></th>
                    <th><?=$egmali_khasm_takher?></th>
                    <th><?=$egmali_khasm_gezaa?></th>
                    
                    
                    <th><?=$egmali_khasm_tamen?></th>
                    
                    
                    <th><?=$egmali_khasm_solaf?></th>
                    
                    
                     <th><?=$egmali_tot_okraa_khasm?></th>
                    <th><?=$egmali_total_khsomat?></th>
                    <th><?=$egmali_safi?></th>
                     <th>--</th>
                </tr>
                
                </tfoot>
            </table>
                <?php
   
                
            }
            ?>
        </div>
        
      <input type="hidden" name="eslam" value="eslam val" />  
        
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
    D
    <div id="cart_table">
    
    asdasdasdasdasd
    asd
    
    </div>
    
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script>
  //  function taghez_mosayer(id,emp_id,value,type) {
        function taghez_mosayer(id) {   
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
                        data: {id: id},
                        dataType: 'html',
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
                        success: function (html) {
                            //   alert(html);
                            $('#tasnef').val('');
                            // $('#Modal_esdar').modal('hide');
                            swal({
                                    title: "تم الحذف!",
                                }
                            );
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>

<script>
$(document).on('click','#add_cart', function() {
$('#cart_table').load('<?=site_url('human_resources/employee_forms/Employee_salaries/process')?>',function(){
 
})
}
</script>