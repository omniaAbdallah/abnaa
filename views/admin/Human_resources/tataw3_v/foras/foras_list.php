
 <?php
    $this->load->view('admin/requires/header');
       $this->load->view('admin/requires/tob_menu');

     
?>
 <div class="col-xs-12 no-padding" >
     <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
         <div class="panel-heading no-padding" style="margin-bottom: 0;">
             <h4 class="panel-title"><?= $title?></h4>

         </div>
         <div class="panel-body" >
             <div class="col-xs-12 no-padding" >
                 <table id="js_table"
                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                     <thead>
                     <tr class="greentd">
                         <th>م </th>
                         <th>اسم الفرصة التطوعية </th>
                         <th>اسم المشرف </th>
                         <th>رقم هاتف المشرف </th>
                         <th>تاريخ البدء </th>
                         <th>تاريخ الإنتهاء </th>
                         <th>جنس المتطوعين </th>
                         <th>الساعات التطوعيه </th>
                         <th>اجراءات </th>




                     </tr>
                     </thead>
                 </table>
             </div>

         </div>
     </div>
 </div>


 <!-- detailsModal -->


 <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document" style="width: 80%;">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
             </div>
             <div class="modal-body" style="padding: 10px 0" id="result">

             </div>
             <div class="modal-footer" style="display: inline-block;width: 100%;">


                 <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                     <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                 </button>

             </div>

         </div>
     </div>
 </div>

 <!-- detailsModal -->


   
   
 <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

   

 <script>
     function load_details(row_id) {

         $.ajax({
             type: 'post',
             url: "<?php echo base_url();?>human_resources/tataw3/foras/Foras/load_details",
             data: {row_id:row_id},
             success: function (d) {
                 $('#result').html(d);


             }

         });

     }
 </script>

    <?php

    
       echo $foras_js;
    ?>

    <?php      $this->load->view('admin/requires/footer'); ?>

