 <div class="col-sm-9 no-padding">
<div class="col-xs-12 padding-4">
<table class="table  " style="table-layout: fixed">
    <tbody>
    <tr>
        <td style="width: 105px;">
            <strong>فئة الرسالة</strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php $arrx = array(1 => 'خاص', 2 => 'عام');
                                foreach ($arrx as $key => $valuee) {
                                    if ($key == $get_all->msg_f2a) {
                                        echo $valuee;
                                    }
                                }
                                ?></td>
        <td style="width: 135px;"><strong> تاريخ الرسالة</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if (!empty($get_all->msg_date)) {
                echo  $get_all->msg_date;
            } else{
                echo 'غير محدد' ;
            }
            ?>
       

<td style="width: 105px;">
            <strong>وقت البدء</strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td> <?php
        if (!empty($get_all->start_time)):
            echo   $get_all->start_time;
        endif;
        ?>
        </td>
    </tr>

    <tr>
        <td style="width: 105px;">
            <strong>
تاريخ البدء</strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td> <?php
        if (!empty($get_all->start_date)):
            echo   $get_all->start_date;
        endif;
        ?></td>
        <td style="width: 135px;"><strong> مده عرض الرساله</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if (!empty($get_all->moda)) {
                echo  $get_all->moda;
            } else{
                echo 'غير محدد' ;
            }
            ?>
            </td>
   
    </tr>
   
   <tr>
        <td style="width: 105px;">
            <strong>   محتوي الرساله</strong>
        </td>

        <td colspan="8"><?php if (!empty($get_all->subject)) {
                echo  $get_all->subject;
            } else{
                echo 'غير محدد' ;
            }
            ?></td> 
   </tr>
    </tbody>
</table>
</div>
<h5>المرسل إليهم </h5>
<?php if (isset($records) && $records != null) { ?>
            <table id="examplex" class=" table table-bordered table-striped" >
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th class="text-center">كود الموظف</th>
                    <th class="text-center">اسم الموظف</th>
                    <th class="text-center">المشاهدة </th>
                    <th class="text-center">وقت المشاهدة </th>
                    <th class="text-center">تاريخ المشاهدة </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $x = 1;
                foreach ($records as $value) {
                    ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $value->emp_code ?></td>
                        <td><?= $value->emp_name ?></td>
                        <td>                           
<?php if($value->seen ==1)
{
echo "
<span style='
background-color: green;
'>
تمت المشاهدة <i class='fa fa-wrong'> </i></span>";
}
else{
echo " <span style='
background-color: red;
'>لم تتم المشاهدة</span>";
}
?></td>
<td><?php
if(!empty($value->seen_date))
{
echo $value->seen_date;
}else{
  echo 'غير محدد';
} ?></td>
<td>
<?php
if(!empty($value->seen_time))
{
echo $value->seen_time;
}else{
  echo 'غير محدد';
} ?></td>
                    </tr>
                    <?php
               $x++; }
                ?>
                </tbody>
            </table>
<?php } ?>
<h5> المرفقات</h5>
<?php
                   if (isset($one_data) && !empty($one_data)){
                       $x=1;
                       $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                       $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                      
                           $folder ='uploads/human_resources/ta3mem';
                       
                       ?>
                   <table id="example88" class="table  table-bordered table-striped table-hover">
                       <thead>
                         <tr class="greentd">
                             <th>م</th>
                             <th>نوع الملف</th>
                             <th>اسم الملف</th>
                             <th> الملف</th>
                             <th>الحجم</th>
                             
                            

                         </tr>
                       </thead>
                       <tbody >
                       <?php
                       foreach ($one_data as $morfaq){
                           $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
                          //  $Destination = 'uploads/archive/deals/1bec9894697603bd9a45630d73230be5.jpg';

                           $Destination = $folder .'/'.$morfaq->file;
                           if (file_exists($Destination)){
                               $bytes=  filesize($Destination) ;
                           } else{
                               $bytes ='';
                           }

                            $size = '';
                           if ($bytes >= 1073741824)
                           {
                               $size = number_format($bytes / 1073741824, 2) . ' GB';
                           }
                           elseif ($bytes >= 1048576)
                           {
                               $size = number_format($bytes / 1048576, 2) . ' MB';
                           }
                           elseif ($bytes >= 1024)
                           {
                               $size = number_format($bytes / 1024, 2) . ' KB';
                           }
                           elseif ($bytes > 1)
                           {
                               $size = $bytes . ' bytes';
                           }
                           elseif ($bytes == 1)
                           {
                               $size = $bytes . ' byte';
                           }
                           else
                           {
                               $size = '0 bytes';
                           }
                           ?>
                           <tr>
                               <td><?= $x++?></td>
                               <td>
                                   <?php
                                   if (in_array($ext,$image)){?>
                                   <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>
                                  <?php } elseif (in_array($ext,$file)){?>
                                   <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>

                                 <?php  }
                                   ?>

                               </td>
                               <td>
                                   <?php
                                   if (!empty($morfaq->title)){
                                       echo $morfaq->title;
                                   } else{
                                       echo 'لا يوجد ' ;
                                   }
                                   ?>

                               </td>
                               <td>
                                   

                                   <!--  -->
                                   <?php
                                   if (in_array($ext,$image)){
                               ?>
                               <?php if (!empty($morfaq->file)) {
                                   $url = base_url() . $folder .'/'. $morfaq->file;
                               } else {
                                   $url = base_url('asisst/fav/apple-icon-120x120.png');
                               } ?>

                               <a target="_blank" onclick="show_img('<?= $url ?>')">
                                   <i class=" fa fa-eye"></i>
                               </a> 
                           
                               <?php
                           }  elseif (in_array($ext,$file)){
                               ?>
                              
                               <!-- <a href="<?php echo base_url() . 'human_resources/ta3mem/Ta3mem_c/read_file/' . $mehwar_morfaq ?>"
                                  target="_blank">
                                   <i class=" fa fa-eye"></i></a> -->
                                   
                                   <?php if (!empty($morfaq->file)) {
                                  // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                                  $url = base_url() .'human_resources/ta3mem/Ta3mem_c/read_file/'. $morfaq->file;
                               } else {
                                   $url = base_url('asisst/fav/apple-icon-120x120.png');
                               } ?>

                               <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                   <i class=" fa fa-eye"></i>
                               </a> 


                                  
                               <?php
                           }
                        else {
                           echo 'لا يوجد';
                       }
                       ?>
                                   <!--  -->
                               </td>
                               <td>
                                   <?= $size?>
                               </td>
                               
                             
                           </tr>
                       <?php
                       }
                       ?>
                       </tbody>
                   </table>
                   <?php
                   }
                   ?>

</div>

<div class="col-sm-3 no-padding">
<h5> صوره الرسالة</h5>
<?php if (!empty($get_all->img)) {
                                        $url = base_url() . 'uploads/human_resources/ta3mem/' . $get_all->img;
                                    } else {
                                        $url = base_url('asisst/fav/apple-icon-120x120.png');
                                    } ?>
                                    <img  style="width: 100%; height:  100%;" src="<?= $url ?>">
                                      
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




$('#example88').DataTable( {
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