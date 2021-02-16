<style>
    .top-label {
        font-size: 13px;
    }
    .form-control {
        padding: 6px 0px;
    }
    .inner-heading-green {
        background-color: #5eab5e;
        padding: 10px;
        color: #fff;
    }
    .inner-heading-red {
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
    }
    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
    }
    table tr.green_background th,
    table tr.green_background td {
        background-color: #5eab5e;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }
    table tr.red_background th,
    table tr.red_background td {
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }
    table tr th,
    table tr td,
    table thead td,
    table thead th,
    table tfoot th,
    table tfoot td {
        padding: 3px 5px !important;
    }
    .orangetd td, .orangetd th {
        color: #000;
    }
    .plus-btn {
        padding: 6px 5px 5px 5px;
        background-color: green;
        color: #fff;
        border-radius: 50%;
    }
    .plus-btn:hover {
        color: #fff;
        border-radius: 0;
    }
    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 8px;
    }
    a.details {
        padding: 4px;
        background-color: blue;
        color: #fff;
        cursor: pointer;
    }
    .modal-header {
        padding: 6px 5px;
    }
    .modal-header h4 {
        color: #00310d;
    }
    .modal-header p {
        color: #555;
        margin-bottom: 0
    }
    .modal-body p {
        color: #555;
        font-size: 16px
    }
    .modal-body p span {
        color: #00310d;
        font-weight: 600
    }
    .tb-table tbody th, .tb-table tbody td,
    .tb-table tfoot td, .tb-table tfoot th {
        padding: 0px !important;
        text-align: center;
    }
    td input[type=radio] {
        height: 20px;
        width: 20px;
    }
    .greentd td, .greentd th {
        color: #fff !important;
        font-size: 16px !important;
        background-color: #6d6f6e !important;
        border-radius: 3px !important;
    }
    .row-centered {
        text-align: center;
    }
    .col-centered {
        display: inline-block;
        float: none;
        margin-right: -4px;
    }
    .info {
        background-color: #4e5451 !important;
    }
</style>

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
<?php
$salary_types = array(1 => 'راتب أساسي', 2 => 'راتب مقطوع');
$disabled = '';
?>
<?php
$this->load->view('admin/maham_mowazf_view/basic_data/nav_links');
?>
<div class="container">
    <div class="row row-centered">
        <div class="col-xs-12 no-padding centered">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title ?>
                    </h3>
                    <!--<button onclick="print_card('.$row->id.')" title="طباعه"
                            class="btn btn-primary"
                            style="float: left;
    margin-top: -29px;"
                    >
                        <i class="fa fa-print"></i> طباعة بيانات مفردات- راتب
                    </button>-->
                    <!-- <div class="pull-left">
            <?php $data_load["emp_code"] = $personal_data[0]->emp_code;
                    $data_load["id"] = $this->uri->segment(4);
                    $this->load->view('admin/Human_resources/drop_down_menu', $data_load); ?>
        </div> -->
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 no-padding">
                    
                    <?php
                  /*  echo '<pre>';
                    print_r($all_mosayer_data);*/
                    ?>
                    
                    
                    
                        <div class="col-sm-12 col-xs-12">
                            <table class="table  table-striped table-bordered dt-responsive nowrap">
                                <tbody>
                                <tr>
                                    <th class="info" style="width: 110px; background-color: #4e5451 !important;">إسم
                                        الموظف
                                    </th>
                                    <td>
                                        <?php
                                        if (isset($employee['employee']) && !empty($employee['employee'])) {
                                            echo
                                            $employee['employee'];
                                        } ?>
                                    </td>
                                    <th class="info" style="width: 110px; background-color: #4e5451 !important;">كود
                                        الموظف
                                    </th>
                                    <td>
                                        <?php
                                        if (isset($employee['emp_code']) && !empty($employee['emp_code'])) {
                                            echo
                                            $employee['emp_code'];
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="info" style="width: 110px; background-color: #4e5451 !important;"> المسمي
                                        الوظيفي
                                    </th>
                                    <td>
                                        <?php
                                        if (isset($employee['mosma_wazefy_n']) && !empty($employee['mosma_wazefy_n'])) {
                                            echo
                                            $employee['mosma_wazefy_n'];
                                        } ?>
                                    </td>
                                    <th class="info" style="width: 110px; background-color: #4e5451 !important;">
                                        الاداره- القسم
                                    </th>
                                    <td>
                                        <?php
                                        if (isset($employee['edara_n']) && !empty($employee['edara_n'])) {
                                            echo
                                            $employee['edara_n'];
                                        } ?>-
                                        <?php
                                        if (isset($employee['qsm_n']) && !empty($employee['qsm_n'])) {
                                            echo
                                            $employee['qsm_n'];
                                        } ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            
                            
                            
   <?php      
  /* echo '<pre>';
        print_r($all_mosayer_data);*/
        
         if (isset($all_mosayer_data) && !empty($all_mosayer_data)){ 
$x=1;
?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
              <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="3" style="width: 140px;">شهر </th>
                    <!--<th rowspan="3" style="width: 100px;" ><span class="flip-mode">عام</span></th>-->
                    <th colspan="10" >الأستحقاقات</th>
                    <th rowspan="3" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>
                    <th colspan="7" >الإستقطاعات	</th>
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
                </thead>
                <tbody>
                <?php
                
$egmali_rateb_asasy = $egmali_badal_sakn = $egmali_badal_mowaslat = $egmali_badal_etsal = $egmali_badal_e3asha = $egmali_badal_tabe3a_amal = $egmali_tot_edafi = $egmali_badal_taklef = $egmali_badal_taklef =
                    $egmali_tot_entdab = $egmali_tot_okraa_esthkaq = $egmali_total_esthkak = $egmali_khasm_keyab = $egmali_agaza_bdon_rateb = $egmali_khasm_takher = $egmali_khasm_gezaa = $egmali_khasm_tamen = $egmali_khasm_solaf =
                    $egmali_tot_okraa_khasm = $egmali_total_khsomat = $egmali_safi =$egmali_tot_mokafaa= 0;
                
                
  foreach ($all_mosayer_data as $emp){
    






                $egmali_rateb_asasy += $emp->rateb_asasy;
                                            $egmali_badal_sakn += $emp->badal_sakn;
                                            $egmali_badal_mowaslat += $emp->badal_mowaslat;
                                            $egmali_badal_etsal += $emp->badal_etsal;
                                            $egmali_badal_e3asha += $emp->badal_e3asha;
                                            $egmali_badal_tabe3a_amal += $emp->badal_tabe3a_amal;
                                            $egmali_tot_edafi += $emp->tot_edafi;
                                            $egmali_badal_taklef += $emp->badal_taklef;
                                           // $egmali_badal_taklef += $emp->tot_mokafaa;
                                            $egmali_tot_entdab += $emp->tot_entdab;
                                            $egmali_tot_okraa_esthkaq += $emp->tot_okraa_esthkaq;
                                            $egmali_total_esthkak += $emp->total_esthkak;
                                            $egmali_khasm_keyab += $emp->khasm_keyab;
                                            $egmali_agaza_bdon_rateb += $emp->agaza_bdon_rateb;
                                            $egmali_khasm_takher += $emp->khasm_takher;
                                            $egmali_khasm_gezaa += $emp->khasm_gezaa;
                                            $egmali_khasm_tamen += $emp->khasm_tamen;
                                            $egmali_khasm_solaf += $emp->khasm_solaf;
                                            $egmali_tot_okraa_khasm += $emp->tot_okraa_khasm;
                                            $egmali_total_khsomat += $emp->total_khsomat;
                                            $egmali_safi += $emp->safi;
                                            $egmali_tot_mokafaa += $emp->tot_mokafaa;
    
   ?>
        <tr>
                <td><?= $x++;?> </td>
                <!--<td><?= $emp->emp_name?></td>-->
                <td><span  style="font-size: 14px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= get_arabic_month_name($emp->mosayer_month) ?>">
               <?=get_arabic_month_name($emp->mosayer_month)?>
               
               <?=$emp->mosayer_year?>
               </span></td>
             <!--   <td><?= $emp->mosayer_year?></td>-->
               <!--   <td><span  style="font-size: 14px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->mosayer_year ?>">
               <?=character_limiter($emp->mosayer_year,6)?>
               </span></td>-->
                <td><?= round($emp->rateb_asasy)?></td>
                <td><?= round($emp->badal_sakn)?></td>
                <td><?= round($emp->badal_mowaslat)?></td>
                 <td><?= round($emp->badal_etsal)?></td>
                <td><?= round($emp->badal_e3asha)?></td>
                <td><?= round($emp->badal_tabe3a_amal)?></td>
                 <td><?= round($emp->tot_edafi)?></td>
                <td><?= round($emp->badal_taklef)?></td>
                <td><?= round($emp->tot_mokafaa)?></td>
                <td><?= round($emp->tot_entdab)?></td>
                <!--<td><?= round($emp->tot_okraa_esthkaq)?></td>-->
                <td style="background: #e6eed5;"><?= round($emp->total_esthkak)?></td>
                 <td><?= round($emp->khasm_keyab)?></td>
                 <td><?= round($emp->agaza_bdon_rateb)?></td>
                  <td><?= round($emp->khasm_takher)?></td>
                  <td><?= round($emp->khasm_gezaa)?></td>
                <td><?= round($emp->khasm_tamen)?></td>
                <td><?= round($emp->khasm_solaf)?></td>
              <td><?= round($emp->tot_okraa_khasm)?> </td>
                <td style="background: #e6eed5;"><?= round($emp->total_khsomat)?></td>
                <td style="background: #e6eed5;"><?= round($emp->safi)?> </td>
               
</tr>
                <?php
                }
                ?>
                </tbody>
                
                            <tfoot class="open_green">
            <tr>
                                            <th colspan="2">الإجمالى</th>
                                            <th><?= round($egmali_rateb_asasy) ?></th>
                                            <th><?= round($egmali_badal_sakn) ?></th>
                                            <th><?= round($egmali_badal_mowaslat) ?></th>
                                            <th><?= round($egmali_badal_etsal) ?></th>
                                            <th><?= round($egmali_badal_e3asha) ?></th>
                                            <th><?= round($egmali_badal_tabe3a_amal) ?></th>
                                            <th><?= round($egmali_tot_edafi) ?></th>
                                            <th><?= round($egmali_badal_taklef) ?></th>
                                            <th><?= round($egmali_tot_mokafaa) ?></th>
                                            <th><?= round($egmali_tot_entdab) ?></th>
                                            <!--<th><?= round($egmali_tot_okraa_esthkaq) ?></th>-->
                                            <th><?= round($egmali_total_esthkak) ?></th>
                                            <th><?= round($egmali_khasm_keyab) ?></th>
                                            <th><?= round($egmali_agaza_bdon_rateb) ?></th>
                                            <th><?= round($egmali_khasm_takher) ?></th>
                                            <th><?= round($egmali_khasm_gezaa) ?></th>
                                            <th><?= round($egmali_khasm_tamen) ?></th>
                                            <th><?= round($egmali_khasm_solaf) ?></th>
                                            <th><?= round($egmali_tot_okraa_khasm) ?></th>
                                            <th><?= round($egmali_total_khsomat) ?></th>
                                            <th><?= round($egmali_safi) ?></th>
                                          
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
        </div>
    </div>
</div>
