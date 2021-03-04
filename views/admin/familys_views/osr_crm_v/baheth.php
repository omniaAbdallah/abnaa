

<!--<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<!--
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>




<script type="text/javascript" src="//cdn.jsdelivr.net/snap.svg/0.1.0/snap.svg-min.js"></script>
-->



<style>

.bg-danger, .bg-danger>a {
    color: #fff!important;
}
.bg-danger {
    background-color: #dc3545!important;
}
.small-box {
    border-radius: .25rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
}
	.small-box>.inner {
    padding: 10px;
}
	
	.small-box h3, .small-box p {
    z-index: 5;
}
.small-box p {
    font-size: 1rem;
}
	
	.small-box .icon {
    color: rgba(0,0,0,.15);
    z-index: 0;
}
	
	.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.glyphicon, .small-box .icon>i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    left: 15px;
    top: 15px;
    transition: all .3s linear;
}
	.small-box>.small-box-footer {
    background: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
}
.bg-danger, .bg-danger>a {
    color: #fff!important;
}

.small-box:hover .icon>i.fa, .small-box:hover .icon>i.fab, .small-box:hover .icon>i.far, .small-box:hover .icon>i.fas, .small-box:hover .icon>i.glyphicon, .small-box:hover .icon>i.ion {
    font-size: 75px;
}

.small-box:hover .icon>i {
    font-size: 95px;
}
.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.glyphicon, .small-box .icon>i.ion {
    font-size: 70px;
    top: 20px;
}

	.small-box>.small-box-footer:hover {
    background: rgba(0,0,0,.15);
    color: #fff;
}
	
	.bg-warning, .bg-warning>a {
    color: #1f2d3d!important;
}

.bg-warning {
    background-color: #ffc107!important;
}
	
	
	.bg-success, .bg-success>a {
    color: #fff!important;
}
.bg-success {
    background-color: #28a745!important;
}
	
	.bg-info, .bg-info>a {
    color: #fff!important;
}
.bg-info {
    background-color: #17a2b8!important;
}
	
	
	
	#customers {
   
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

 
#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #0b4332;
    color: white;
}
</style> 


<section class="content" style="padding-top: 10px;">
 
      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box  bg-info">
              <div class="inner">
                <h3><?=$all_visits?></h3>

                <p>إجمالي الزيارات</p>
              </div>
              <div class="icon">
           <i class="fa fa-file-text-o" aria-hidden="true"></i>

              </div>
              <a href="<?=base_url()?>family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm" class="small-box-footer"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> إنشاء موعد زيارة

</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box  bg-warning">
              <div class="inner">
                <h3><?=$all_visits_gari?> زيارة</h3>

                <p>الزيارات الجارية</p>
              </div>
              <div class="icon">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
                      <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                        جدول الزيارات الجارية
</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$all_visits_ended?> زيارة</h3>

                <p> جدول الزيارات المنتهية</p>
              </div>
              <div class="icon">
                <i class="fa fa-check" aria-hidden="true"></i>
              </div>
                       <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> معلومات أكثر
</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$all_etslat?> إتصال</h3>

                <p>إتصالات تمت مع الأسر</p>
              </div>
              <div class="icon">
       <i class="fa fa-list-alt" aria-hidden="true"></i>
              </div>
                      <a href="<?=base_url()?>family_controllers/osr_crm/Osr_crm_c/add_crm" class="small-box-footer"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>إنشاء إتصال جديد 
</a>
            </div>
          </div>
          <!--
			   <div class="col-lg-3 col-6">
     
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>الطلبات الجديدة</p>
              </div>
              <div class="icon">
<i class="fa fa-file-text-o" aria-hidden="true"></i>
                </div>
              <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> معلومات أكثر
</a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
   
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53 </h3>

                <p>  المقابلات الجديدة</p>
              </div>
              <div class="icon">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
              </div>
                      <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> معلومات أكثر
</a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
     
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>الطلبات الموافق عليها</p>
              </div>
              <div class="icon">
                <i class="fa fa-check" aria-hidden="true"></i>
              </div>
                       <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> معلومات أكثر
</a>
            </div>
          </div>
   
          <div class="col-lg-3 col-6">
 
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>الطلبات المرفوضة</p>
              </div>
              <div class="icon">
            <i class="fa fa-times" aria-hidden="true"></i>
              </div>
                      <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> معلومات أكثر
</a>
            </div>
          </div>
          -->
          <!-- ./col -->
        </div>
        
        <div class="row">
        <div class="col-md-8">

        <div class="panel panel-success">
          <div class="panel-heading">
              <h3 class="box-title">تواصل تم مع الأسر</h3>
            </div>
            <!-- /.box-header -->
              <div class="panel-body">
              
              <table class="table table-condensed">
                <tbody><tr>
                  <th>م</th>
                  <th>التاريخ</th>
                  <th>التوقيت</th>
                  <th style="">الشرح</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>14-2-2021</td>
                  <td>11:00am</td>
                  <td>تم الاتصال بي من الأسرة لتعديل موعد الزيارة</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>14-2-2021</td>
                  <td>11:30pm</td>
                  <td>تم الاتصال بي من الأسرة للتأكيد موعد الزيارة</td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>14-2-2021</td>
                  <td>12:00am</td>
                  <td>تم الاتصال بي من الأسرة لتعديل موعد الزيارة</td>
                </tr>
               <tr>
                  <td>4.</td>
                  <td>14-2-2021</td>
                  <td>12:15am</td>
                  <td>تم الاتصال بي من الأسرة لتعديل موعد الزيارة</td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-4">
        <div class="box box-danger">
         
            <div class="box-body">
                        <div id="my-cool-chart"></div>
<canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>

                    

            </div>
            <!-- /.box-body -->
          </div>
        </div>
        </div>
        
        <div class="row">
        <div class="col-xs-12">
        <div class="panel panel-success">
          <div class="panel-heading">
              <h3 class="box-title">أخر عمليات الإتصال التي تمت </h3>

  
            </div>
            <!-- /.box-header -->
                    <div class="panel-body no-padding">
   
                     <?php  if(isset($all_data) && !empty($all_data)){ ?>
                <div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> </h3>
        </div>
        <div class="panel-body">
                <table id="example" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="greentd">
                        <th class="text-center">م</th>

                        <th  class="text-center">تاريخ الاتصال </th>
                        <th  class="text-center">وقت الاتصال </th>
                         <th  class="text-center">فئة الإتصال </th>
                        <th class="text-center"> القائم بالاتصال </th>
                        <th   class="text-center"> وسيلة الاتصال </th>
                        <th class="text-center">نتيجة المكالمة</th>
                   
                      
                        <th class="text-center">الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){
                    
                    if($record->file_num == 0 or $record->file_num == null ){
                        $fe2_osra = 'طلب أسرة';
                        $fe2_osra_color = '#ffa268';
                    }elseif($record->file_num != 0 or $record->file_num != null){
                       $fe2_osra = 'ملف أسرة'; 
                           $fe2_osra_color = '#15c0ad';
                    }else{
                       $fe2_osra = 'غير محدد'; 
                           $fe2_osra_color = 'white';  
                    }
                    ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                
                <td style="color: green;font-weight: bold;"><?php echo $record->contact_date; ?></td>
                <td style="color: #c30000;font-weight: bold;"><?php echo $record->contact_time; ?></td>
                
                <td style="background: <?=$fe2_osra_color?>;"><?=$fe2_osra?></td>
                <td style="background-color: #d8a050ad;"><?php echo $record->emp_name; ?></td>
                
                <td style="background: #e691b8 !important;"><?php echo $record->method_etsal_name ?>
         </td>
         <td style="background-color: #7dd8a1;"><?php echo $record->natega_etsal_name ?>
         </td>
              
        
         <td>
<!-- yara -->
<div class="btn-group btn-group-sm">


      <!--
            <a href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/Update/' . $record->id ?>" class="btn btn-warning"><i class="fa fa-pencil"></i>تعديل</a>
        <a href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/delete/' . $record->id ?>" onclick="return confirm(\'Are You Sure To Delete? \')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف </a>
    -->
       
        
        

    
    
   <a  data-toggle="modal" data-target="#myModal_details"
                        onclick="getDetails_crm(<?= $record->id ?>)" data-backdrop="static" data-keyboard="false"  class="btn btn-purple"><i class="fa fa-list"></i>تفاصيل</a>
     
 
        </td>

                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                </div>
    </div>
</div>
</div>
            <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
 <!-------------------------------------------------------------------->
         <div class="row">
        <div class="col-xs-12">
        <div class="panel panel-success">
          <div class="panel-heading">
              <h3 class="box-title">أخر الزيارات التي تمت </h3>

  
            </div>
            <!-- /.box-header -->
                    <div class="panel-body no-padding">
   

            <?php  if(isset($all_data_zyrat) && !empty($all_data_zyrat)){ ?>
                <div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> </h3>
        </div>
        <div class="panel-body">
                <table id="example" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="greentd">
                        <th class="text-center">م</th>
                        <th  class="text-center">رقم الزيارة </th>
                        <th  class="text-center">تاريخ الزيارة </th>
                        <th  class="text-center"> من الساعة </th>
                        <th  class="text-center"> إلي الساعة </th>
                                     <th class="text-center">الفئة </th>
                        <th class="text-center"> نوع البحث </th>
                        <th class="text-center"> الغرض من   الزيارة</th>
                        <th class="text-center"> القائم الزيارة </th>
                        <th class="text-center"> حالة الزيارة </th>
                        <th class="text-center">الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data_zyrat as $record){
                        if($record->search_type== 1){
                        $background_color = '#8ad099';
                    }elseif($record->search_type== 2){
                        $background_color =  '#8ac0d0';
                    }elseif($record->search_type== 3 ){
                        $background_color =  '#d08aa4';
                    }
                    
                     if($record->file_num > 0){
                        $fe2 = 'ملف أسرة';
                        $fe2_color = '#50ab20';
                    }elseif($record->file_num == null){
                         $fe2 = 'طلب أسرة';
                          $fe2_color = '#ff7700';
                    }
                    
                    if($record->visit_ended == 'yes'){
                       $visit_ended = 'الزيارة إنتهت';
                       $visit_ended_color = '#ff8f8f'; 
                    }elseif($record->visit_ended=='no'){
                         $visit_ended = 'الزيارة جارية'; 
                         $visit_ended_color = '#ffc049'; 
                    }
                    
                    ?>
                    
         
                    <tr class="">
    <td><?php echo $x++ ?></td>
    <td><?php echo $record->rkm_visit; ?></td>
    <td><?php echo $record->visit_date; ?></td>
    <td style="color: #c30000;font-weight: bold;"><?php echo date('h:i A', strtotime($record->visit_time_from)) ; ?></td>
    <td style="color: green;font-weight: bold;"><?php echo date('h:i A', strtotime($record->visit_time_to)) ; ?></td>
        <td style="background:<?=$fe2_color?>;"><?=$fe2?></td>
     <td style="background:<?=$background_color?>;"><?php
         $search_type_arr=array(1=>'بحث جديد',
                               2=>'زيارة تتبعية',
                               3=>'زيارة طلب خدمة');
    if (key_exists($record->search_type,$search_type_arr)){
            echo $search_type_arr[$record->search_type];
        } ?></td>

    <td style="background: #dcaff9;">
 <?=$record->visit_reason_title?>

    </td>
    <td style="color: blue;"><?php echo $record->emp_name; ?></td>
  <td style="background:<?=$visit_ended_color?>;"><?=$visit_ended?></td>
    <td>

        <div class="btn-group">
            <button type="button" class="btn btn-sm  btn-info">إجراءات
            </button>
            <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                    data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li>
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
                        window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/Update/' . $record->id ?>";
                        });'>
                        <i class="fa fa-pencil"> </i> تعديل </a>
                </li>
                <li><a onclick=' swal({
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
                        setTimeout(function(){window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/delete/' . $record->id ?>";}, 500);
                        });'>
                        <i class="fa fa-trash"> </i> حذف </a>
                </li>
                <li>
                    <a  data-toggle="modal" data-target="#myModal_details"
                        onclick="getDetails_zyraa(<?= $record->id ?>)"
                    >
                        <i class="fa fa-list"></i>
                        التفاصيل
                    </a>
                </li>
                <li>
                    <a  data-toggle="modal" data-target="#myModal_details" onclick="change_time_zyraa(<?= $record->id ?>)">
                        <i class="fa fa-clock-o"></i>
                        تغير الموعد
                    </a>
                </li>
                
                <?php if($record->visit_ended=='no'){?>
                <li>
                    <a onclick='swal({
                        title: "هل انت متأكد من  بدء الزيارة ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "بدء",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: false
                        },
                        function(){
                        window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/start_zyraa/' . $record->id ?>";
                        });'>
                        <i class="fa fa-archive"> </i> بدء الزيارة </a>
                </li>
                <?php }?>


                <?php if($record->visit_ended=='yes'){?>
                <li>
                    <a onclick='swal({
                        title: "هل انت متأكد من  إستكمال بيانات الزيارة  ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "إستكمال",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: false
                        },
                        function(){
                        window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/complete_zyraa_data/' . $record->id ?>";
                        });'>
                        <i class="fa fa-upload"> </i> إستكمال بيانات الزيارة  </a>
                </li>
                <?php }?>
                
                <?php if ($record->visit_ended == 'yes') {
    ?>
    <li>
        <a data-toggle="modal" data-target="#myModal_details"
           onclick="transformatiom_zyraa(<?= $record->id ?>)">
            <i class="fa fa-share"></i>
            تحويل الزيارة
        </a>
    </li>
    <?php
} ?>
    <li>
                    <a target="_blank" href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/add_crm_etsal/' . $record->id ?>"
                    >
                        <i class="fa fa-phone"> </i> إنشاء إتصال مع الاسرة   </a>
                </li>
                <li>
                    <a target="_blank"  href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/crm_money/' . $record->id ?>"
                    >
                        <i class="fa fa-phone"> </i>   أضافة الحالة المالية    </a>
                </li>
<li>
    <a onclick="close_crm_zyraat(<?= $record->id ?>)">
        <i class="fa fa-close"></i>
        اغلاق الزيارة
    </a>
</li>
            </ul>
        </div>
    </td>
</tr>
                    <?php }?>
                    </tbody>
                </table>
                </div>
    </div>
</div>
</div>
            <?php } ?>



            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
 
 
 <!-------------------------------------------------------------------->       


     
      </div> 
    </section>
   <canvas id="myChart" width="400" height="400"></canvas> 
   
<!--
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 -->
 <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    $(document).ready(function() {
        var ctx = $("#chart-line");
        var myLineChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["إجمالي عدد الزيارات", "الزيارات الجارية", "الزيارات المنتهية", "إتصالات مع الأسر"],
                datasets: [{
                    data: [<?=$all_visits?>, <?=$all_visits_gari?>, <?=$all_visits_ended?>, <?=$all_etslat?>],
                    backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'إحصائية عامة '
                }
            }
        });
    });
</script>
 
