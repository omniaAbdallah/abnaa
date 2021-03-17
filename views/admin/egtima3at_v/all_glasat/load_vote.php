

<style type="text/css">
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #09704E;
        display: inline-block;
        width: 100%;
    }

    .piece-header  {
        background-color: #09704E;
        display: inline-block;
        float: right;
        width: 100%;
        padding: 5px;
        color: #fff;
    }
    .piece-header h6{
        text-align: center;
    }
    .piece-body {

        width: 100%;
        float: right;
    }
    .bordered-bottom{
        border-bottom: 3px solid #09704E;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #09704E;
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
      /*  padding: 2px 8px !important;*/
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
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
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
        size: A4;
        margin: 20px 0 0;
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
     /*   border: 1px solid #abc572;*/
    }
    .under-line{
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3 ,
    .under-line .col-xs-4,
    .under-line .col-xs-6 ,
    .under-line .col-xs-8
    {
        border-left: 1px solid #abc572;
    }
.table-lgna tbody tr:nth-child(2n+1){
    background-color: #e6eed5 ;
}
</style>


<?php

   
         $reasons = array(2 => 'رفض', 1 => 'قبول');   
       
    ?>
   
  
     <!--------------------------------------------------------->  
     
     
     

 <!------------------------------------------------------->

 <!-- ----------------------------------------------------- -->
<?php   if (isset($galsa_member) && !empty($galsa_member)){  ?>

<div class="piece-box">
       <div class="piece-header bordered-bottom">
         <h5 class="text-center"><strong>أعضاء الجلسة</strong></h5>
        </div>
                <div class="piece-body">
                    <div class="col-xs-12  under-line   no-padding">
                    <!-- <table class="table table-bordered table-lgna">
            <thead>
            <tr class="greentd">
                <th class="gray_background">اعداد الاعضاء المعتمدين</th>
                <th class="gray_background">اعداد الاعضاء المعتمدين مع التحفظ</th>
                <th class="gray_background">اعداد الاعضاء المعتذرين</th>
                <th class="gray_background">اعداد الاعضاء لم يقوموا بالتصويت</th>
            </tr>
            </thead>
            <tbody>
         
                <tr class="">
                    <td class="text-center"><?=$accept?> </td>
                    <td class="text-center"> <?=$refuse?> </td>
                    <td class="text-center"> <?=$acceptwithrules?>  </td>
                    <td class="text-center"> <?=$noaction?>
                 </td>
              
                </tr>
               

        </tbody>
        </table> -->
           
            <table  id="exampleey" class="table table-bordered table-lgna">
            <thead>
            <tr class="greentd">
            <th >م</th>
        <th>كود الموظف</th>
        <th>اسم الموظف</th>
        <th >  النوع</th>
        <th > المسمي الوظيفي</th>
        <th >  الإدارة</th>
        <th > القسم</th>
        <th >  الوظيفة بالجلسة</th>
                <th class="gray_background">التوقيع</th>
            </tr>
            
            </thead>
            <tbody>
            <?php       $x=1;  foreach ($galsa_member as $member) {  ?>
                <tr class="">
                    <td> <?=$x++?>  </td>
                   
               
               <td><?= $member->emp_code ?>
                          </td>
               <td><?= $member->emp_n ?></td>
               
               <td><?php
                if($member->type==1)
                {
                    echo "موظف";
                }
                else  if($member->type==2)
                {
                    echo "عضو جمعيه عمومية";
                }
                
                
                ?></td>


               <td><?= $member->emp_mosama_wazifa_n ?>
                          </td>
               <td><?= $member->emp_edara_n ?>
                        
                          </td>
              
                          <td><?= $member->emp_qsm_n ?>
                          
                          </td>
                          <td> 
                            <?php  if ($member->wazifa_in_galsa==1) {
                                   echo 'رئيس الجلسة';
                               }?>
<?php  if ($member->wazifa_in_galsa==2) {
                                  echo  ' أمين سر الجلسة';
                               }?> 
          <?php  if ($member->wazifa_in_galsa==3) {
                                   echo  'عضو بالجلسة';
                               }?>
                          
                       </td>


                    <td style="    text-align: right;  padding-right: 15px;">
                    
                    
                    <?php  foreach ($reasons as $key => $value) {
                      if($_SESSION["emp_name"]==$member->emp_n)
                        {
$disabled="";
                        }
                        else
                        {
                            $disabled="disabled";    
                        }
                        
                        ?>

                           <div class="radio-content">
                            <input type="radio" class="check<?php echo $member->id; ?>" <?=$disabled?>
                               name="<?php echo $member->id; ?>" value="<?= $key ?>"
                               onclick="add_galsa(<?php echo $key ?>,<?php echo $member->galsa_id_fk;?>)"
                               <?php if (isset($member->vote) &&($member->vote!=0)&& $member->vote == $key) {
                                        echo 'checked';} ?> id="sign<?= $key ?><?php echo $member->id; ?>" > 
                            
                           <label class="radio-label" for="sign<?= $key ?><?php echo $member->id; ?>"> <?= $value ?></label>
                            </div>
                            
                        <?php } ?>
                 </td>
              
                </tr>
                <?php  } ?>

        </tbody>
        </table>
</div>
</div>
</div>
         <?php  } ?>

        
<!------------------------------------------------------->
<script>




$('#exampleey').DataTable( {
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