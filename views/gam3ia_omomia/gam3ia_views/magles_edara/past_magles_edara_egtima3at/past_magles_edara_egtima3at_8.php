<style>

.box {

    position: relative;

    border-radius: 3px;

    background: #ffffff;

    border-top: 3px solid #d2d6de;

    margin-bottom: 20px;

    width: 100%;

    box-shadow: 0 1px 1px rgba(0,0,0,0.1);

}

.box-header {

    color: #444;

    display: block;

    padding: 10px;

    position: relative;

}

.box-header.with-border {

    border-bottom: 1px solid #f4f4f4;

}

.box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {

    display: inline-block;

    font-size: 18px;

    margin: 0;

    line-height: 1;

}

.box-body {

    border-top-left-radius: 0;

    border-top-right-radius: 0;

    border-bottom-right-radius: 3px;

    border-bottom-left-radius: 3px;

    padding: 10px;

}

.box-footer {

    border-top-left-radius: 0;

    border-top-right-radius: 0;

    border-bottom-right-radius: 3px;

    border-bottom-left-radius: 3px;

    border-top: 1px solid #f4f4f4;

    padding: 10px;

    background-color: #fff;

}

.table-bordered {

    border: 1px solid #f4f4f4;

}

table {

    background-color: transparent;

}

.table {

    width: 100%;

    max-width: 100%;

    margin-bottom: 20px;

}

.table thead th {

    vertical-align: bottom;

    border-bottom: 2px solid #dee2e6;

}

.table-bordered thead td, .table-bordered thead th {

    border-bottom-width: 2px;

}

.table td, .table th {

    padding: .75rem;

    vertical-align: top;

    border-top: 1px solid #dee2e6;

}

.badge {

    display: inline-block;

    min-width: 10px;

    padding: 3px 7px;

    font-size: 12px;

    font-weight: 700;

    line-height: 1;

    color: #fff;

    text-align: center;

    white-space: nowrap;

    vertical-align: middle;

    background-color: #777;

    border-radius: 10px;

}

.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {

    background-color: #dd4b39 !important;

}

.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {

    background-color: #f39c12 !important;

}

.bg-light-blue, .label-primary, .modal-primary .modal-body {

    background-color: #3c8dbc !important;

}

.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {

    background-color: #00a65a !important;

}

</style>





<div class="col-md-12">

<div class="col-md-12">



<div class="box">

            <div class="box-header">

              <h3 class="box-title">الإجتماع الحالي</h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body no-padding">

              <table class="table table-condensed">

                <tbody>

                <?php if(!empty($open_galesa[0])){  ?>



                 <tr>

                  <th style="width: 10px">#</th>

                  <th>رقم الجلسة</th>

                  <th><span class="badge bg-green"> <?php if(isset($open_galesa[0]->glsa_rkm_full)&&!empty($open_galesa[0]->glsa_rkm_full))

                   {

echo $open_galesa[0]->glsa_rkm_full;

                   } 

                  ?></span></th>

              

                  <th>تاريخ الجلسة</th>

                  <th><span class="badge bg-red"><?php if(isset($open_galesa[0]->glsa_date_m)&&!empty($open_galesa[0]->glsa_date_m))

                   {

echo $open_galesa[0]->glsa_date_m;

                   } 

                  ?></span></th>

              

                  <th>توقيت الجلسة</th>

                  <th><span class="badge bg-light-blue"><?php if(isset($open_galesa[0]->time_start)&&!empty($open_galesa[0]->time_start))

                   {

echo $open_galesa[0]->time_start;

                   } 

                  ?></span></th>

              

                  <th>مكان الإنعقاد</th>

                  <th><span class="badge bg-blue">الجمعية</span></th>

                </tr>

                

                

                 

                <tr>

                  <th style="width: 10px">#</th>

                  <th>الأعضاء 

                   <span class="badge bg-green"><?=$open_galesa[0]->glsa_members_hdoor_num?> تأكيد حضور </span> 

                   <span class="badge bg-red"><?=$open_galesa[0]->glsa_members_absent_num?>  معتذر</span>

                    <span class="badge bg-yellow"><?php if(!empty($open_galesa[0]->glsa_members_num))

                    

                    

                   echo $open_galesa[0]->glsa_members_num;

                   

                   else echo "0";

                   ?>  جاري</span>

                  </th>

                  <th> 

                    

             

                  <a  data-toggle="modal"

                                            onclick="det_datiles(<?= $open_galesa[0]->glsa_rkm ?>)"

                                            data-target="#myModal"><span class="badge bg-light-blue">للإطلاع اضفط هنا</span>

                                        

                  </a>

                

                </th>

                    <th>المحاور <span class="badge bg-yellow"><?php if(isset($open_galesa[0]->mehwr_num)&&!empty($open_galesa[0]->mehwr_num))

                   {

echo $open_galesa[0]->mehwr_num;

                   } 

                  ?> محور</span>
                    <span class="badge bg-green">تم مناقشة<?php if(isset($open_galesa[0]->qrar_num)&&!empty($open_galesa[0]->qrar_num)){echo

$open_galesa[0]->qrar_num;

        }else{
            echo '0';
        } 

       ?> محور</span> 
                  
                  
                  </th>

                  <th> 

                

                  <a data-toggle="modal" data-target="#myModal"

                                            onclick="get_table_mehwer(<?= $open_galesa[0]->glsa_rkm ?>,'تفاصيل المحاور')">

                                            <span class="badge bg-light-blue">للإطلاع اضفط هنا </span>

                  </a>

                </th>

<!-- yaraaa29-6 -->
<th style="">



   
   <?php if(isset($open_galesa[0]->glsa_date_m)&&!empty($open_galesa[0]->glsa_date_m))

   {
    if(($open_galesa[0]->glsa_date_m==date('m/d/Y'))){

  ?>


   
   <a onclick='swal({

title: "هل   تريد مشاهده مناقشة الجلسة ؟",

text: "",

type: "warning",

showCancelButton: true,

confirmButtonClass: "btn-warning",

confirmButtonText: "نعم",

cancelButtonText: "إلغاء",

closeOnConfirm: false

},

function(){

window.location="<?= base_url() . 'gam3ia_omomia/Gam3ia_omomia/mon24et_egtma3at_magles'?>";

});

'>


   <span class="badge bg-green">الذهاب لمتاقشة الجلسة</span> </a>
<?php }elseif($open_galesa[0]->glsa_date_m > date('m/d/Y')){?>

    <span class="badge bg-green"> باقي من الزمن</span>

    
<?php 
$datetime1 =$open_galesa[0]->glsa_date_m;
$datetime2 = date('m/d/Y');


//  echo $datetime1;

//   echo $datetime2;
//echo $datetime1->diff($datetime2)->format("%d");


$january = new DateTime($datetime1);
$february = new DateTime($datetime2);
$interval = $february->diff($january);

// %a will output the total number of days.




?>
    <span class="badge bg-red">
    
    <?php echo $interval->format('%a ')."\n";?>
     يوم

   <?php echo $interval->format('%m ');?>
   شهر

   <?php echo $interval->format('%y ');?>
  سنه</span>

<?php }elseif($open_galesa[0]->glsa_date_m < date('m/d/Y')){?>

    <span class="badge bg-red">   تم انتهاء مناقشة الجلسة</span>
<?php } ?>

<?php }?>
   
   
   </th>
<!-- yaraaaaaaaaaaaaa -->

                    </tr>

                <?php }else{  echo '<div class="alert alert-danger">لا توجد بيانات</div>'; } ?>

        

             

              </tbody></table>

            </div>
            <table class="table table-bordered center" style="   margin: auto;

width: 80% !important;" >

 <thead>

 <tr>

 <th style="background: #737373;color: white;" colspan="3">محاور الجلسة </th>

 </tr>

   <tr>

     <th style="background: #737373;color: white; width: 5%;">م</th>

     <th style="background: #737373;color: white;">المحور</th>
 

   </tr>

 </thead>

 <tbody>

 <?php 

 if(isset($open_galesa[0]->mehwr_details) and $open_galesa[0]->mehwr_details != ''){

     $x=0;

     foreach($open_galesa[0]->mehwr_details as $row){

$x++;

     ?>

     

     <tr>

       <td><?=$x?></td>

     <td><?=$row->mehwar_title ?></td>
    
    

   </tr>

     

<?php   } }

 

 ?>

 

   

 </tbody>

</table> 
            <!-- /.box-body -->

          </div>

        </div>











<div class="col-md-12">

<div class="box">

            <div class="box-header">

              <h3 class="box-title">إجتماعات سنوات سابقة </h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body no-padding">

              <table id="example" class="table table-condensed">

               

                <thead>

                <tr>

                  <th style="width: 10px">م</th>

                 

                  <th>رقم الجلسة </th>

                   <th>تاريخ الجلسة </th>

                   <th>حالة الجلسة</th>

                   

                  <th style="width: 40px">عام</th>

                  <th> مشاهده محضر الجلسه</th>

                </tr>

                </thead>

                <tbody>

                <?php if(isset($last_galesat)&&!empty($last_galesat))

                {

                  $x=1;

                  $colors = ["yellow","red","light-blue","green"];

                  

                 

                 foreach($last_galesat as $row) 

                 {

                  if ($row->glsa_finshed == 0) {

                    $Halet_galsa = 'جلسة نشطة';

                   

                } elseif ($row->glsa_finshed == 1) {

                    $Halet_galsa = 'جلسة إنتهت ';

                   

                }

                  ?>

                <tr>

                  <td><?=$x?></td>

                

                  <td><span class="badge bg-green"><?=$row->glsa_rkm_full?></span></td>

                  <td><span class="badge bg-red"><?=$row->glsa_date_m?>	</span></td>

                  <td><span class="badge bg-red">

                                    <?php echo $Halet_galsa; ?></span>

                                </td>

                  <td><span class="badge bg-<?php 





echo $colors[$x];



                  

                  

                  

                  ?>"><?php

               

                  $parts = explode('/', $row->glsa_date_m);

echo $parts[2];

                 ?></span>

                 </td>



                 <td>



                 <a onclick='swal({

        title: "هل   تريد مشاهده المحضر ؟",

        text: "",

        type: "warning",

        showCancelButton: true,

        confirmButtonClass: "btn-warning",

        confirmButtonText: "نعم",

        cancelButtonText: "إلغاء",

        closeOnConfirm: false

        },

        function(){

        window.location="<?= base_url() . 'gam3ia_omomia/Gam3ia_omomia/mahder_magles_edara/' .$row->glsa_rkm  ?>";

        });

        '>

    <i class="fa fa-eye"></i></a>

    <a data-toggle="modal" data-target="#myModal"

onclick="get_table_mehwer(<?= $row->glsa_rkm  ?>,'تفاصيل المحاور')">
<span class="badge bg-green">عرض المحاور والقرارات</span> 
</a>







                 </td>

                </tr>

                <?php $x++;

              

              

              }}?>

               

              </tbody></table>

            </div>

            <!-- /.box-body -->

          </div>



 </div>

</div>

<div class="modal" id="myModal" tabindex="-1" role="dialog"

     aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">تفاصيل </h4>

            </div>

            <br>

            <div class="modal-body form-group col-sm-12 col-xs-12">

                <div id="members_data"></div>

            </div>

            <div class="modal-footer" style="border-top: 0;">

                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق

                </button>

            </div>

        </div>

    </div>

</div>

<script>



    function det_datiles(glsa_rkm) {

        $.ajax({

            type: 'post',

            url: "<?=base_url() . 'gam3ia_omomia/Gam3ia_omomia/det_datiles_magles_edara'?>",

            data: {

                glsa_rkm: glsa_rkm

            }, beforeSend: function () {

                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');

            }, success: function (d) {



                $('#members_data').html(d);





            }

        });

    }

</script>

<script>



    function get_table_mehwer(glsa_rkm,text) {

        // $("#table_mehwer").show();

        $('#pop_h').text(text);

        $.ajax({

            type: 'post',

            url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/get_table_mehwer_magles_edara',

            data: {glsa_rkm: glsa_rkm},

            dataType: 'html',

            cache: false,

            beforeSend: function () {

                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');

            }, success: function (html) {

                $("#members_data").html(html);

            }

        });



    }

</script>

<script>





    $('#example').DataTable({

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

                exportOptions: {columns: ':visible'},

                orientation: 'landscape'

            },

            'colvis'

        ],

        colReorder: true

    });





</script>