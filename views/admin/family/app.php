
 <?php
    $this->load->view('admin/requires/header');
       $this->load->view('admin/requires/tob_menu');

     
?>
    <style>
     /**************************/
     /* 27-1-2019 */
     label.label-green {
         height: auto;
         line-height: unset;
         font-size: 14px !important;
         font-weight: 600 !important;
         text-align: right !important;
         margin-bottom: 0;
         background-color: transparent;
         color: #002542;
         border: none;
         padding-bottom: 0;
         font-weight: bold;
     }

     .half {
         width: 100% !important;
         float: right !important;
     }

     .input-style {
         border-radius: 0px;
         border-right: 1px solid #eee;
     }

     .form-group {
         margin-bottom: 0px;
     }

     .bootstrap-select > .btn {
         width: 100%;
         padding-right: 5px;
     }

     .bootstrap-select.btn-group .dropdown-toggle .caret {
         right: auto !important;
         left: 4px;
     }

     .bootstrap-select.btn-group .dropdown-toggle .filter-option {
         font-size: 15px;
     }

     /*	.form-control{
             font-size: 15px;
             color: #000;
             border-radius: 4px;
             border: 2px solid #b6d089 !important;
         }*/
     .form-control:focus {
         border: 2px solid #b6d089;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
         box-shadow: 2px 2px 2px 1px #beffc3;
     }

     .has-success .form-control {
         border: 2px solid #b6d089;

         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
     }

     .has-success .form-control:focus {
         border: 2px solid #b6d089;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
         box-shadow: 2px 2px 2px 1px #beffc3;
     }

     .tab-content {
         margin-top: 15px;
     }


 </style>

 <div class="col-xs-12 text-center">

     <button type="button" class="btn btn-labeled btn-inverse " id="attach_button" data-target="#myModal_search"
             data-toggle="modal">
         <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
     </button>
     <div class="modal fade" id="myModal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document" style="width: 95%">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">بحث</h4>
                 </div>
                 <div class="modal-body" id="div_search">

                     <div class="col-sm-12">
                         <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                             <?php $search_key = array('file_num' => 'رقم الملف ',
                                 'name' => 'الاسم',
                                 'segel' => 'السجل المدني',
                                 'contact_mob' => 'جوال التواصل',
                                 'file_status' => 'حالة الملف',
                                 'family_cat' => 'الفئة',
                                 'family_sarf' => 'اخر صرف للاسر'

                             ); ?>
                             <label class="label label-green  half"> بحث بـ </label>
                             <select name="search_key" id="search_key" onchange="show_key_value(this)"
                                     class="form-control half input-style" data-validation="required">
                                 <option value="0">- اختر -</option>
                                 <?php foreach ($search_key as $key => $value) { ?>
                                     <option value="<?= $key ?>"><?= $value ?></option>
                                 <?php } ?>
                             </select>
                         </div>
                         
                         <!------->
                         
                            <div style="display: none;" class="form-group col-md-2 col-sm-4 col-xs-12 padding-4" id="div_status">
	 <label class="label label-green  half"> حالة الملف</label>
	 <select name="file_status[]" id="file_status"
			 data-actions-box="true" onchange="filter_table()"
			 class="choose-date selectpicker form-control  dep"
			 multiple title="يمكنك إختيار أكثر من طريقه"
			 aria-required="true" data-show-subtext="true" data-live-search="true">

		 <option value="1">نشط كليا </option>
		 <option value="2">نشط جزئيا </option>
		 <option value="3">موقوف مؤقتا </option>
		 <option value="4">موقوف نهائيا</option>

	 </select>

 </div>
                         
                         <!---------->
                         
                         
                         <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4" id="div_input">

                         </div>
                         
                                         <!-- yara -->
                         <?php
            $status = array(1 => 'نشط كليا', 2 => 'نشط جزئيا ', 3 => 'موقوف مؤقتا', 4 => 'موقوف نهائيا');
            ?>
            <div class="form-group col-sm-2 col-xs-12 padding-4 multi_sel" style="display: none;     margin-top: -9px;">

                <h5 class="label-green-h "> حالة الملف</h5>

                <select name="key_value[]" id="key_value"
                        data-actions-box="true" 
                        class="choose-date selectpicker form-control  dep"
                        multiple title="يمكنك إختيار أكثر من حالة للملف"
                        aria-required="true" data-show-subtext="true" data-live-search="true">
                    <!-- <option value="">إختر</option> -->
                    <?php if (isset($status) && !empty($status) && $status != null) {
                        foreach ($status as $key => $value) { ?>


                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php }
                    } ?>

                </select>

            </div>
            <!-- yara -->
                         
                         <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4" id="div_input2">

                         </div>
                          <div class="col-sm-2">
                         <button type="button" onclick="searchResults()" class="btn btn-labeled btn-success " style="margin-top: 27px;">
                             <span class="btn-label"><i class="fa fa-search-plus"></i></span> بحث
                         </button>
                     </div>

                     </div>
                    
                     <br><br>
                     <div class="col-sm-12" id="table_reuselt" style="display: none;">
                         <table class="table example table-striped table-bordered">

                             <thead>
                             <tr class="info">
                                 <th class="text-center"> م</th>
                                 <th class="text-center">رقم الملف</th>
                                 <th class="text-center"> اسم رب الاسرة</th>
                                 <th class="text-center"> رقم الهويه</th>
                                 <th class="text-center"> اسم الام </th>
                                 <th class="text-center"> رقم الهويه</th>
                                 <th class="text-center"> اسم الوكيل</th>
                                 <th class="text-center"> رقم الهوية</th>
                                 <th class="text-center"> الجوال</th>
                                 <th class="text-center"> حالة الملف</th>
                                 <th class="text-center"> الفئة</th>
                                   <th class="text-center"> القيمة</th>

                             </tr>
                             </thead>
                             <tbody id="result_search_modal">

                             </tbody>
                         </table>
                     </div>

                 </div>
                 <div class="modal-footer" style="display: inline-block;width: 100%">

                     <button type="button" class="btn btn-danger"
                             data-dismiss="modal">إغلاق
                     </button>

                 </div>
             </div>
         </div>
     </div>
 </div>


    <table id="js_table_customer" 
   
    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
        <thead>
            <tr class="greentd">
              <th>م </th>
                <th >رقم الملف </th>
                <th >إسم رب الأسرة</th>
                <th>رقم الهوية</th>
                <th>إسم الام</th>
                <th >رقم الهوية</th>
                <th >إجراءات</th>
                <th >حالة الملف</th>
                    <th>الفئة</th>
                  <th >تحديث الملف</th>
                    <th > فتح الملف</th>
                   
                
            </tr>
        </thead>
    </table>
  
 <div class="modal fade" id="sarfModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document" style="width: 95%;">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" style="">
                 <i class="fa fa-info-circle" aria-hidden="true"></i>

                 التفاصيل</h4>
             </div>
             <div class="modal-body" style="padding: 10px 10px" id="sarf_result">

             </div>
             <div class="modal-footer" style="display: inline-block;width: 100%;">



                 <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                     <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                 </button>

             </div>

         </div>
     </div>
 </div>

 <!--Nagwa 21-3 -->
 <div class="modal fade " id="send_data_whats" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-success modal-lg " role="document" style="width:70%;">
         <div class="modal-content ">
             <div class="modal-header ">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                     <span aria-hidden="true">&times;</span></button>
                 <h3 class="modal-title">  ارسال عبر الواتس </h3>
             </div>
             <div class="modal-body ">
                 <input type="hidden" name="message_id" id="message_id"/>
                 <input type="hidden" name="contact_mob" id="contact_mob"/>
                 <div id="">
                     <!--------------------------------------------------->
                     <div class="form-group">

                     </div>
                     <?php
                     $mes = 'السلام عليكم ورحمة الله وبركاته/' .' '.'تسر  الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)  أن تتواصل مع حضراتكم..'
                     ?>

                     <input type="text" id="message_header" class="form-control" name="message_header" value="<?= $mes ?>" >
                     <label class="label">الرسالة</label>

                     <textarea style="width: 100%;" placeholder="اكتب نص الرساله هناااا" name="message_whats" id="message_whats" ></textarea>
                     <!------------------------------------------------------------------------------------------->
                 </div>
             </div>
             <div class="modal-footer " style="display: inline-block; width: 100%;">
                 <button type="button" style="float: left;" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                 <button type="button" formtarget="_blank" style="float: right;" onclick="send_sms_whats();"  class="btn btn-success" ><li class="fa fa-envelope-o"> ارسال</li></li></button>
             </div>

         </div>
     </div>
 </div>


 <script>
     function send_sms_whats()
     {
         var message_header  =$('#message_header').val();
         var message_whats=$('#message_whats').val();

         var contact_mob = '966'+$('#contact_mob').val();
         //  var contact_mob = '966'+'543629615';
         var full_message = message_header+message_whats ;
         if ($.trim($('#message_whats').val()).length < 1){
             swal({
                 title:"من فضلك ادخل نص الرساله !",
                 type:"warning" ,
                 confirmButtonText:"تم"
             });
         }
         else {

             var link="https://web.whatsapp.com/send?phone="+contact_mob+"&text="+full_message+"&source&data";
             if (window.showModalDialog){
                 window.showModalDialog(link,"popup","dialogWidth:600px;dialogHeight:600px");
             }else{
                 window.open(link,"name","height=600,width=600,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes");
             }
             $('#send_data_whats').modal('hide');
             $('#message_whats').val('');
             $('#contact_mob').val('');
         }




     }
 </script>
 <script>
     function get_member_send_whats(valu,contact_mob)
     {
         $('#message_id').val(valu);
         $('#contact_mob').val(contact_mob);
     }
 </script>
 <!--Nagwa 21-3 -->


   
   
 <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<!--

<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.flash.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/jszip.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.colVis.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/dataTables.responsive.min.js"></script>

 -->
   
 <!-- detailsModal -->
 <script>
     function load_sarf_details(mother_num) {

         $.ajax({
             type: 'post',
             url: "<?php echo base_url();?>Family/load_sarf_details",
             data: {mother_num:mother_num},
             success: function (d) {
                 $('#sarf_result').html(d);


             }

         });

     }
 </script>
 <script>
     function show_key_value(search_key_obj) {
         $('#div_input2').html('');
         $('#div_input').html('');
		 $('#div_input2').html('');
           $('.multi_sel').hide();
            $('#div_status').hide();
         
		    var options2 = '';

         var search_key = $(search_key_obj).val();
         var search_key_text = $(search_key_obj).find("option:selected").text();
         var label_search = '<label class="label label-green  half" > ' + search_key_text + '</label>';

         var html = '';
         var options = '';

         switch (search_key) {
             case "file_num":
                 var input_html = '<input type="number" name="key_value" id="key_value" class="form-control">\n';
                 html = label_search + input_html;
                 $('#div_input').html(html);

                 break;
             case "contact_mob":
                 var input_html = '<input type="number" name="key_value" id="key_value" class="form-control">\n';
                 html = label_search + input_html;
                 $('#div_input').html(html);

                 break;
             /*case "file_status":
                 $.ajax({
                     url: "<?=base_url() . 'Family/get_values'?>",
                     type: "POST",
                     data: {key: 'file_status'},
                     success: function (msg) {
                         if (msg === 'false') {
                             return 'false';
                         } else {
                             var obj = JSON.parse(msg);

                             for (var i = 0; i < obj.length; i++) {
                                 options += '<option value="' + obj[i].value + '">' + obj[i].text + '</option>';
                             }
                             var select_html = '<select name="key_value" id="key_value" class="form-control half input-style" data-validation="required">\n' +
                                 '                                <option value="0">- اختر -</option>\n' + options +
                                 '                            </select>';
                             html = label_search + select_html;
                             $('#div_input').html(html);
                         }
                     },
                     error: function () {
                     }
                 });

                 break;
                 */
                   case "file_status":
                 var values = $('#file_status').val();
                 $('#div_status').show();
              
                 break;
             case "family_cat":
                 $('#div_status').show();
                 $.ajax({
                     url: "<?=base_url() . 'Family/get_values'?>",
                     type: "POST",
                     data: {key: 'family_cat'},
                     success: function (msg) {
                         if (msg === 'false') {
                             return 'false';
                         } else {
                             var obj = JSON.parse(msg);

                             for (var i = 0; i < obj.length; i++) {
                                 options += '<option value="' + obj[i].id + '">' + obj[i].title + '</option>';
                             }
                             var select_html = '<select name="key_value" id="key_value" class="form-control half input-style" data-validation="required">\n' +
                                 '                                <option value="0">- اختر -</option>\n' + options +
                                 '                            </select>';
                             var label_search = '<label class="label label-green  half" > ' + search_key_text + '</label>';
                             html = label_search + select_html;
                             $('#div_input').html(html);
                         }
                     },
                     error: function () {
                     }
                 });
              
                 break;
                 
                 
                 
                 
                 /*	       case "family_cat":
                 $.ajax({
                     url: "<?=base_url() . 'Family/get_values'?>",
                     type: "POST",
                     data: {key: 'family_cat'},
                     success: function (msg) {
                         if (msg === 'false') {
                             return 'false';
                         } else {
                             var obj = JSON.parse(msg);

                             for (var i = 0; i < obj.length; i++) {
                                 options += '<option value="' + obj[i].id + '">' + obj[i].title + '</option>';
                             }
                             var select_html = '<select name="key_value" id="key_value" class="form-control half input-style" data-validation="required">\n' +
                                 '                                <option value="0">- اختر -</option>\n' + options +
                                 '                            </select>';
                             var label_search = '<label class="label label-green  half" > ' + search_key_text + '</label>';
                             html = label_search + select_html;
                             $('#div_input').html(html);
                         }
                     },
                     error: function () {
                     }
                 });
                 $.ajax({
                     url: "<?=base_url() . 'Family/get_values'?>",
                     type: "POST",
                     data: {key: 'file_status'},
                     success: function (msg) {
                         if (msg === 'false') {
                             return 'false';
                         } else {
                             var obj = JSON.parse(msg);

                             for (var i = 0; i < obj.length; i++) {
                                 options2 += '<option value="' + obj[i].value + '">' + obj[i].text + '</option>';
                             }
                             var select_html = '<select name="key_value" id="key_value_status" class="form-control half input-style" data-validation="required">\n' +
                                 '                                <option value="0">- اختر -</option>\n' + options2 +
                                 '                            </select>';
                           //  html = label_search + select_html;
                             var label_search2 = '<label class="label label-green  half" > ' +'حالة الملف'  + '</label>';
                             html = label_search2 + select_html;
                             $('#div_input2').html(html);
                         }
                     },
                     error: function () {
                     }
                 });
                 break;
                 */
                case "family_sarf":
                
                 $.ajax({
                     url: "<?=base_url() . 'Family/get_values'?>",
                     type: "POST",
                     data: {key: 'family_sarf'},
                     success: function (msg) {
                         if (msg === 'false') {
                             return 'false';
                         } else {
                            var obj = JSON.parse(msg);
                          
                          var bnod_help=obj.bnod_help;
var options2='';

                             for (var i = 0; i < bnod_help.length; i++) {
                              
                                 options2 += '<option value="' + bnod_help[i].id + '">' + bnod_help[i].title + '</option>';
                             }
                           
                                 var select_html2 = '<select name="key_valuex" id="key_valuex" class="form-control half input-style" data-validation="required">\n' +
                                 '                                <option value="0">- اختر -</option>\n' + options2 +
                                 '                            </select>';
                            
                             html2='بند الصرف'+select_html2;
                           
                            $('.multi_sel').show();
                             $('#div_input2').html(html2);
                         }
                     },
                     error: function () {
                     }
                 });

                 break;
                 
                 
             /*case "family_cat":
                 $.ajax({
                     url: "<?=base_url() . 'Family/get_values'?>",
                     type: "POST",
                     data: {key: 'family_cat'},
                     success: function (msg) {
                         if (msg === 'false') {
                             return 'false';
                         } else {
                             var obj = JSON.parse(msg);

                             for (var i = 0; i < obj.length; i++) {
                                 options += '<option value="' + obj[i].id + '">' + obj[i].title + '</option>';
                             }
                             var select_html = '<select name="key_value" id="key_value" class="form-control half input-style" data-validation="required">\n' +
                                 '                                <option value="0">- اختر -</option>\n' + options +
                                 '                            </select>';
                             html = label_search + select_html;
                             $('#div_input').html(html);
                         }
                     },
                     error: function () {
                     }
                 });
                 break;
                 */
             case "name":
                 var select_html = '<select name="search_key_2" onchange="show_key_value2(this)" id="search_key_2" class="form-control half input-style" data-validation="required">\n' +
                     '                                <option value="0">- اختر -</option>\n'
                     + '<option value="father.full_name">الاب</option> '
                     + '<option value="mother.full_name">الام</option> '
                     + '<option value="wakels.w_name">الوكيل</option> '
                     + '<option value="f_members.member_full_name">الابناء</option> ' +
                     '                            </select>';
                 html = label_search + select_html;
                 $('#div_input').html(html);
                 break;
             case "segel":
                 var select_html = '<select name="search_key_2" onchange="show_key_value2(this)" id="search_key_2" class="form-control half input-style" data-validation="required">\n' +
                     '                                <option value="0">- اختر -</option>\n'
                     + '<option value="father.f_national_id">الاب</option> '
                     + '<option value="wakels.w_national_id">الوكيل</option> '
                     + '<option value="mother.mother_national_num_fk">الام</option> '
                     + '<option value="f_members.member_card_num">الابناء</option> ' +
                     '                            </select>';
                 html = label_search + select_html;
                 $('#div_input').html(html);
                 break;
         }

     }

     function show_key_value2(obj) {

         var search_key = $('#search_key').val();
         var search_key_text = $(obj).find("option:selected").text();
         var label_search = '<label class="label label-green  half" > ' + search_key_text + '</label>';

         var html = '';
         var input_html = '<input type="text" name="key_value_2" id="key_value" class="form-control">\n';
         html = label_search + input_html;
         $('#div_input2').html(html);

     }

     function searchResults() {
         var search_key = $('#search_key').val();
         var search_key2 = $('#search_key_2').val();
         var key_value = $('#key_value').val();
        // var key_value2 = $('#key_value_status').val();
          var key_valuex = $('#key_valuex').val();
           var key_value2 = $('#file_status').val();
	

         $.ajax({
             url: "<?=base_url() . 'Family/search'?>",
             type: "POST",
             data: {search_key: search_key, key_value: key_value,search_key2:search_key2,key_value2:key_value2,key_valuex:key_valuex},
             success: function (msg) {
                 $('#table_reuselt').show();
                 $('#result_search_modal').html(msg);

             },
             error: function () {
             }
         });
     }
 </script>


    <?php

    
       echo $customer_js;
    ?>

   





 
    <?php      $this->load->view('admin/requires/footer'); ?>




<?php
/*


$query = $this->db->query('select * from basic ');
//$query = $this->db->query('select * from basic ');

$the_json_code =  json_encode($query->result());
//$the_json_code =  json_encode($records);

print_r($the_json_code);
*/
?>


<?php
/*
$jsonArray = json_decode($all_data,true);



echo '<pre>';
print_r($jsonArray);
echo '<pre>';
*/
?>

