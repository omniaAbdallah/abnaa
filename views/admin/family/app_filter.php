
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
 <style>
     @media (min-width: 992px) {
         .col-md-10 {
             float: right;
             width: 10%;
         }

         .col-md-15 {
             float: right;
             width: 15%;
         }

         .col-md-20 {
             float: right;
             width: 20%;
         }

         .col-md-25 {
             float: right;
             width: 25%;
         }

         .col-md-30 {
             float: right;
             width: 30%;
         }

         .col-md-35 {
             float: right;
             width: 35%;
         }

         .col-md-40 {
             float: right;
             width: 40%;
         }

         .col-md-45 {
             float: right;
             width: 45%;
         }

         .col-md-50 {
             float: right;
             width: 50%;
         }

         .col-md-55 {
             float: right;
             width: 55%;
         }
     }

     .label-green-h {
         font-weight: 600;
         color: #000;
         /* background-color: #428bca; */
         /* border: 2px solid #428bca; */
         margin: 0;
         padding: 8px 4px;
         font-size: 16px;
         height: 34px;

     }

     input[type=radio].pay_method {
         width: 20px;
         height: 20px;
     }

     .radio-inline span {
         position: relative;
         top: 4px;
         margin-right: 3px;
     }

     .bs-actionsbox .btn-group button {
         width: 50% !important;
         float: right !important;
         margin: 0 !important;
     }


     #circle_counter {
         float: right;
         width: 200px;
         /*  height: 50px;*/
         border: 2px solid;
         line-height: 24px;
         padding: 4px 8px;
         border-radius: 5px;
         background-color: #5b69bc;
         margin-right: 20px;
         color: white;
     }

     #circle_counter .counter {
         font-size: 20px;
         color: #f8ffbf;
         font-weight: bold;
         float: left;
     }

     td input[type=checkbox], td input[type=radio],
     th input[type=checkbox], th input[type=radio] {
         width: 18px;
         height: 18px;
     }

     .form-group {
         font-family: 'hl';
     }

     .input-style {
         border-radius: 0px;
         border-right: 1px solid #ccc;
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
                                 'family_cat' => 'الفئة'

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
                         <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4" id="div_input">

                         </div>
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

 <div id="body_table_filter">
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
 </div>
 <?php
 if ($this->uri->segment(1)=='family_controllers'){
     ?>
     <div class="clearfix"></div>
     <div class="form-group  col-sm-2 col-xs-12 padding-4 ">

         <h5 class="label-green-h ">  من تاريخ</h5>

         <input type="date" id="date_from" class="form-control" oninput="filter_table()">

     </div>

     <div class="form-group col-sm-2 col-xs-12 padding-4 ">

         <h5 class="label-green-h "> الي تاريخ</h5>

         <input type="date" id="date_to" class="form-control" oninput="filter_table()">

     </div>
 <?php
 }
 ?>
  

   
   
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
   
<script>
    function filter_table() {
        var date_to = $('#date_to').val();
        var date_from = $('#date_from').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/Family/filter_table",
            data: {date_to: date_to, date_from: date_from},
            success: function (d) {
                console.log(d);

                $('#body_table_filter').html(d);

            }

        });
    }
</script>
 <script>
     function show_key_value(search_key_obj) {
         $('#div_input2').html('');
         $('#div_input').html('');


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
             case "file_status":
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
             case "family_cat":
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

         $.ajax({
             url: "<?=base_url() . 'Family/search'?>",
             type: "POST",
             data: {search_key: search_key, key_value: key_value,search_key2:search_key2},
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

