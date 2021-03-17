
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
<style>
/*
h2.subtitle {
font-size: 20px;
    color: #96c73e;
    font-weight: bold;
    border-right: 9px solid #ffb61e;
    padding-right: 8px;
    line-height: 40px;
}

.omomia-table.table>thead>tr>th, .omomia-table.table>thead>tr>td {
    border-bottom-width: 2px;
    background-color: #ffb61e;
    color: #000;
    text-align: center;
    border-radius: 13px;
}
.omomia-table.table{
border-collapse:separate; 
border-spacing:0.8em;
 }
.omomia-table.table>tbody>tr{
    margin-bottom: 10px;
}
.omomia-table.table>tbody>tr>th, .omomia-table.table>tbody>tr>td {
    border-bottom-width: 2px;
    background-color: #216b5e;
    color: #fff;
    text-align: center;
    border-radius: 13px;
}
.box-title {
    position: relative;
    background-color: #216b5e;
    color: #fff;
    text-align: center;
    border-radius: 13px;
    padding: 10px 7px;
    font-size: 18px;
    display: inline-block;
    min-width: 300px;
    z-index: 1;
}
.content_page{
    position: relative;
}
.content_page:after {
    position: absolute;
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    border: 3px dotted #999;
    position: absolute;
    top: 40px;
    z-index: 0;
}
.dataTables_wrapper{
    z-index: 1;
}
.dataTables_wrapper .dataTables_filter {
 
    padding-right: 10px;
}
#addSearchInputs{
    display: none;
}
.dataTables_wrapper .dataTables_filter input{
    width: 200px;
}
*/
</style>
     
        <div class="cicleat-sec col-xs-12 no-padding ">
          
                        <div class="col-md-12 col-sm-12 col-xs-12 padding-4">
                        
                        
                        
 
                        
                        
                        
                        <table  class="table   table-striped omomia-table"  id="myTable">
             <thead>
               <tr>
                 <th style="">م</th>
                 <th style="width: 25%;">رقم العضوية</th>
                 <th>إسم العضو</th>
          <!-- <th style="width: 140px;">رقم هوية</th> -->
           <!--  <th style="">رقم الجوال</th> -->
               </tr>
             </thead>
             <tbody>
             <?php
             /*
             echo '<pre>';
             print_r($all_gam3ia_omomia);*/
                   $a = 1;
                   if (isset($all_gam3ia_omomia) && !empty($all_gam3ia_omomia)) {
                       foreach ($all_gam3ia_omomia as $record) {
                           ?>
                           <tr>
                               <td class="droid"><?php echo $a ?></td>
                               <td class="droid">
                                   <?php
                                   if (isset($record->odwiat->rkm_odwia_full) && ($record->odwiat->rkm_odwia_full)!= NULL ) {
                                       echo $record->odwiat->rkm_odwia_full;
                                   } else {
                                       echo "غير محدد";
                                   }
                                   ?>
                               </td>
                               <td><?php echo $record->laqb_title.'/'. $record->name; ?></td>
                               
                               
                           <!--  <td class="droid"><?php echo $record->card_num; ?></td> -->
                            <!--    <td class="droid"><?php echo $record->jwal; ?></td> -->

                           </tr>
                           <?php
                           $a++;
                       }
                   } else { ?>
                       <td colspan="6">
                           <div style="color: red; font-size: large;">لم يتم اضافه أعضاء </div>
                       </td>
                   <?php }
                   ?>
             
             
             
             
                                </tbody>
           </table>
                        </div>

                    </div>


 </div>



<!-- <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
        الملف الشخصي

        </div>
        <div class="panel-body" >

        <table id="" class="table table-striped table-bordered dt-responsive nowrap example"
                                       cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center">م</th>
                                        <th class="text-center">رقم العضوية</th>
                                        <th class="text-center">إسم العضو</th>
                                        <th>رقم الهوية</th>
                                        <th>رقم الجول</th>
                                        <th>نوع العضوية</th>
                                        <th>حالة العضوية</th>

                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a = 1;

                                    if (isset($records) && !empty($records)) {

                                        foreach ($records as $record) {
                                            ?>
                                            <tr>
                                                <td><?php echo $a ?></td>

                                                <td>
                                                    <?php
                                                    if (isset($record->odwiat->rkm_odwia_full) && ($record->odwiat->rkm_odwia_full) != NULL) {
                                                        echo $record->odwiat->rkm_odwia_full;
                                                    } else {
                                                        echo "غير محدد";
                                                    }


                                                    ?>
                                                </td>
                                                <td><?php echo $record->laqb_title . '/' . $record->name; ?></td>
                                                <td><?php echo $record->card_num; ?></td>
                                                <td><?php echo $record->jwal; ?></td>

                                                <td>
                                                    <?php
                                                    if (isset($record->odwiat->no3_odwia_title) && !empty($record->odwiat->no3_odwia_title)) {
                                                        echo $record->odwiat->no3_odwia_title;
                                                    } else {
                                                        echo "غير محدد";
                                                    }

                                                    ?>
                                                </td>

                                                <td>
                                                    <?php


                                                    if (isset($record->odwiat->odwia_status_title) && !empty($record->odwiat->odwia_status_title)) {
                                                        echo $record->odwiat->odwia_status_title;
                                                    } else {
                                                        echo "غير محدد";
                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $a++;

                                        }
                                    } else { ?>
                                        <td colspan="6">
                                            <div style="color: red; font-size: large;">لم يتم اضافه أعضاء الي الان</div>
                                        </td>
                                    <?php }
                                    ?>
                                    </tbody>
                                </table>

 </div>
</div>
</div> -->

<!-- <div class="col-md-12">
                               
                               <div class="panel panel-default" style="height: 650px">
                                   <div class="panel-heading panel-title"> أعضاء الجمعية العمومية</div>
                                   <div class="panel-body">
                                   <table class="table   table-striped omomia-table"  id="myTable">
             <thead>
               <tr>
                 <th style="width: 60px;">م</th>
                 <th style="width: 140px;">رقم العضوية</th>
                 <th>إسم العضو</th>
         
               </tr>
             </thead>
             <tbody>
             <?php
                   $a = 1;
                   if (isset($all_gam3ia_omomia) && !empty($all_gam3ia_omomia)) {
                       foreach ($all_gam3ia_omomia as $record) {
                           ?>
                           <tr>
                               <td class="droid"><?php echo $a ?></td>
                               <td class="droid">
                                   <?php
                                   if (isset($record->odwiat->rkm_odwia_full) && ($record->odwiat->rkm_odwia_full)!= NULL ) {
                                       echo $record->odwiat->rkm_odwia_full;
                                   } else {
                                       echo "غير محدد";
                                   }
                                   ?>
                               </td>
                               <td><?php echo $record->laqb_title.'/'. $record->name; ?></td>
                           

                           </tr>
                           <?php
                           $a++;
                       }
                   } else { ?>
                       <td colspan="6">
                           <div style="color: red; font-size: large;">لم يتم اضافه أعضاء </div>
                       </td>
                   <?php }
                   ?>
             
             
             
             
                                </tbody>
           </table>
                                   </div>

                                  
                               </div>
                         
                       </div> -->
                       <script type="text/javascript" src="<?= base_url() . 'asisst/web_asset/' ?>js/jquery-1.10.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>