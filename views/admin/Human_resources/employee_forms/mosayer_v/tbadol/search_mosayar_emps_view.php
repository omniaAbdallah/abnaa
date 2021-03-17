<style>

   .myheader{

    background: #4e4e4e;

    color: white;

   } 

.table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {

    border-top: 1px solid #ffffff !important;

    border-right: 1px solid #ffffff !important;

    /* background: #e8e8e8; */

    /* border-radius: 4px !important; */

    font-size: 15px !important;

    color: black;

}

</style>

            <!------------------------------------------------------------------------------------>

            <?php

            /*

           echo '<pre>';

            print_r($all_data);*/

             if (isset($all_data) && !empty($all_data)) { ?>

                <?php $months = array("01" => "يناير", "02" => "فبراير", "03" => "مارس", "04" => "أبريل", "05" => "مايو",

                    "06" => "يونيو", "07" => "يوليو", "08" => "أغسطس", "09" => "سبتمبر", "10" => "أكتوبر",

                    "11" => "نوفمبر", "12" => "ديسمبر"); ?>

                <table id="examplex" class=" display table table-bordered   responsive nowrap" cellspacing="0">

                    <thead>

                    <tr class="myheader">

                        <th class="text-center">م</th>

                        <th class="text-center">رقم الصرف</th>

                        <th class="text-center">بند الصرف</th>

                        <th class="text-center">الـتاريـخ</th>

                        <th class="text-center">طريقة الصرف</th>

                        <th class="text-center">عبارة عن</th>

                        <th class="text-center"> شهر</th>

                         <th class="text-center"> عدد الموظفين</th>

                        <th class="text-center"> المبلغ</th>

                       <th class="text-center">التفاصيل</th>

                        <th class="text-center">تاريخ الصرف</th>

                         <!--<th class="text-center">الإجراء</th>-->

                           <th class="text-center">حالة الصرف</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php  

                    $x=1;

                    foreach ($all_data as $record) { 

                        if($record->halet_sarf == 'yes'){

                            $title_halet_sarf = 'تم الصرف';

                            $class_halet_sarf = 'success';

                         }elseif($record->halet_sarf == 'no'){

                            $title_halet_sarf = 'قيد الصرف';

                            $class_halet_sarf = 'warning'; 

                         }else{

                            $title_halet_sarf = 'قيد التنفيذ';

                            $class_halet_sarf = 'warning';    

                         }

                       

                     $orderdate = explode('-', $record->mosayer_date_ar);

                     $month = $orderdate[1];

                     $day   = $orderdate[2];

                     $year  = $orderdate[0];

                        

                        ?>

                        <tr class="">

                            <td><?php echo $x++ ?></td>

                            <td rowspan="2"><?php echo $record->mosayer_rkm; ?></td>

                            <td rowspan="2">رواتب الموظفين</td>

                            <td rowspan="2"><?php echo $record->mosayer_date_ar; ?></td>

                            <td style="background-color: #3c990b; color: white;">شيك</td>

                            <td  rowspan="2">

                            <?php

                            if(!empty($record->mosayer_date_ar))

                            {

?>

                            رواتب الموظفين <?php if (isset($months[$month])) {

                                    echo $months[$month];

                                } ?>

                                <?php if (isset($year)) {

                                    echo $year;

                                } ?>

                                 م

                            <?php }?>

                            </td>

                            <td rowspan="2"><?php 

                             if(!empty($record->mosayer_date_ar))

                             {

                            if (isset($months[$month])) {

                                    echo $months[$month];

                                } }?></td>

                            <td><?php echo $record->num_all_sheeks; ?></td>

                            <td><?php echo $record->sum_all_sheeks; ?></td>

                            <td rowspan="2">   


 <a target="_blank" title="للتفاصيل" 
  href="<?php echo base_url() ;?>human_resources/employee_forms/Employee_salaries/allmosayer/<?php echo $record->mosayer_rkm;?>/<?php echo $record->mosayer_month;?>/<?php echo $record->mosayer_year;?>" class="btn btn-xs btn-warning" >

 <i class="fa fa-list-alt" aria-hidden="true"></i> </a> 



                                </td>

                              <td>

                                <a type="button" class="btn btn- btn-xs" style="background-color: #15bfad;border-color: #15bfad;" data-toggle="modal"

                                   data-target="#myModal_____<?= $record->id ?>">

                      

                                     

                                        <span style="color: #222221;font-weight: bold ">تجهيز إذن صرف </span>

                                  

                                     

                                    <?php 

                                    ?>

                                </a>

                            </td>

   <td><span style="width: 100% !important;" class="label label-<?=$class_halet_sarf?>"><?=$title_halet_sarf?></span> </td>                     

                        </tr>



                               

<?php if($record->num_all_tahwel!=0){?>

               

                        <tr class="">

                           <td><?php echo $x++ ?></td>

                           

                            

                           

                            <td style="background-color: #3c990b; color: white;">تحويل</td>

                      

                  

                            <td><?php echo $record->num_all_tahwel; ?></td>

                            <td><?php echo $record->sum_all_tahwel; ?></td>



                              <td>

                                <a type="button" class="btn btn-abnaa btn-xs" data-toggle="modal"

                                   data-target="#myModal_____<?= $record->id ?>">

                                    <?php

                                    if (isset($record->due_date) and $record->due_date != null) {

                                        ?>

                                       <!-- <span style="color: red; font-weight: bold ">الإرسال <?php echo date('Y-m-d', $record->due_date) ?></span> -->

                                        <span style="color: #222221;font-weight: bold ">  <?php echo date('Y-m-d', $record->cashing_date) ?></span>

                                    <?php } else {

                                        ?>

                                      غير محدد

                                    <?php }

                                    ?>

                                </a>

                            </td>

   <td><span style="width: 100% !important;" class="label label-<?=$class_halet_sarf?>"><?=$title_halet_sarf?></span> </td>                     

                        </tr>

                        <?php } ?>

                      

                        

                        

                        

                        <tfoot>

    <tr>

      <td  colspan="8" style="text-align: center;background: #cccccc;">الإجمالي</td>

      <td style="text-align: center;background: #cccccc;"><?php echo ($record->sum_all_tahwel +  $record->sum_all_sheeks); ?></td>

    </tr>

  </tfoot>

    <?php } ?>

                    </tbody>

                </table>

           

            <?php }else{ ?>

            <div class="col-sm-12">

          <div class="alert alert-danger"> 

  <strong>عذرا !</strong> الرجاء مراجعة بنود البحث

</div>      

   </div>             

           <?php  } ?>

            </div>

            

                <div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">

        <div class="modal-dialog modal-success modal-lg " role="document" style="width: 90%">

            <div class="modal-content ">

                <div class="modal-header ">

                    <h1 class="modal-title">تفاصيل المسير  </h1>

                </div>

                <div class="modal-body row">

                    <div id="option_details">

                    </div>

                </div>

                <div class="modal-footer ">

                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                </div>

            </div>

            <!-- /.modal-content -->

        </div >

        <!-- /.modal-dialog -->

    </div>

            <script>

$('#examplex').DataTable( {

    dom: 'Bfrtip',

    buttons: [

        'pageLength',

        'copy',

        'csv',

        'excelHtml5',

        {

            extend: "pdfHtml5",

            orientation: 'landscape'

        },

        {

            extend: 'print',

            exportOptions: { columns: ':visible'},

            orientation: 'landscape'

        },

        'colvis'

    ],

    colReorder: true

} );

</script>



<script>

       function get_details(mosayer_rkm,f2a) {

        $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');

        $.ajax({

            type: 'post',

            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/LoadPage',

            data: {mosayer_rkm:mosayer_rkm,f2a:f2a},

            dataType: 'html',

            cache: false,

            success: function (html) {

                $("#option_details").html(html);

            }

        });

    }

</script>