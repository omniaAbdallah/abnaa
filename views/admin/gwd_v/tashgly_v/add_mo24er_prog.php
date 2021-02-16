<style type="text/css">
    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }
    .piece-box table {
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }
    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }
    .print_forma table th {
        text-align: right;
    }
    .print_forma table tr th {
        vertical-align: middle;
    }
    .no-padding {
        padding: 0;
    }
    .header p {
        margin: 0;
    }
    .header img {
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
    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border {
        border: 0 !important;
    }
    .gray_background {
        background-color: #eee;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green {
        background-color: #e6eed5;
    }
    .closed_green {
        background-color: #cdddac;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }
    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }
    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }
    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    .right-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        right: 10px;
        top: 1px;
    }
    .left-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        left: 10px;
        top: 1px;
    }
    .personel-img {
        position: relative;
        overflow: hidden;
        height: 200px;
    }
    .personel-img .front {
        border: 2px solid #eee;
        border-radius: 5px;
    }
    .personel-img .front img {
        width: 100%;
        height: 200px;
    }
    .personel-img .back {
        position: absolute;
        bottom: -200px;
        opacity: 0;
        background: rgba(0, 0, 0, 0.7);
        width: 100%;
        height: 100%;
        transition: 0.3s all ease-in;
        -webkit-transition: 0.3s all ease-in;
        border: 2px solid #fcb632;
    }
    .personel-img:hover .back {
        opacity: 1;
        bottom: 0;
    }
    .personel-img .back i {
        background-color: #fcb632;
        color: #fff;
        padding: 7px;
        font-size: 34px;
        border-radius: 50%;
        margin: 47% 35%;
    }
    .personel-img .show-da {
        position: relative;
    }
    .bond-heading {
        background-color: #00713e;
        color: #fff;
        padding: 10px;
        border-radius: 3px;
    }
    .bond-heading .bond-title {
        margin: 0;
    }
    .bond-body {
        padding: 10px;
        border: 2px solid #ccc;
        display: inline-block;
        width: 100%;
    }
    .table-bordered.table-details tbody > tr > td {
        font-size: 13px !important;
        white-space: pre-line;
    }
    .check-style input[type=checkbox] + label {
        line-height: 20px;
    }
</style>
<?php if ($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 3) { ?>
    <div id="update">
<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <div id="panel-title" class="panel-title"><h4>أضافة الموشرات التشغلية</h4></div>
    </div>
        <div class="panel-body">
            <div class="col-sm-12 no-padding load_strategy">
           <?php echo form_open_multipart('gwd/Tashgly/add_add_mo24er', array('id' => 'MyForm_program'));?>
    <?php
    if(!empty($recordd)){
        $id = $recordd->id;
        //$tashgly_id_fk=  $record->tashgly_id_fk;
        echo "<input type='hidden' id='id' name='id' value='".$id."'>";
        echo '<input type="hidden" name="update" value="update">';
       // echo "<input type='hidden' name='tashgly_id_fk'' value='".$tashgly_id_fk."'  >";
        $mo24er_name= $recordd->mo24er_name;
      
    }else{
        echo '<input type="hidden" name="add" value="add">';
        $mo24er_name= '';
     
    }
    ?>

                    <div class="col-md-12 no-padding">
                    <div class="col-md-8 col-sm-8 col-xs-8 inner-side r-data">
                    <div class="col-sm-4">
               <label class="">    الخطة التشغيلية</label>
              </div> 
      <div class="col-xs-8 r-input">
                            <input type="text" name="tshgly_strtegy_name" id="tshgly_strtegy_name"
                                   value="<?= $tshgly_strtegy_name ?>"
                                   class="form-control bottom-input" readonly />

                                   <input type="hidden" name="tashgly_id_fk" id="tashgly_id_fk"
                                   value="<?= $record->tashgly_id_fk ?>"
                                   />
                        </div>
                        </div>
                    <div class="col-md-8 col-sm-8 col-xs-8 inner-side r-data">
                    <div class="col-sm-4">
           <label class="">     البرنامج التشغيلي</label>
     </div> 
      <div class="col-xs-8 r-input">
                            <input type="text" name="program_name" id="program_name"
                                   value="<?= $record->program_name ?>"
                                   class="form-control bottom-input" readonly />
                                   <input type="hidden" name="program_id_fk" id="program_id_fk"
                                   value="<?= $record->id ?>"
                                     />
                        </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 inner-side r-data">
                    <div class="col-sm-4">
           <label class="">       المؤشر التشغيلي</label>
     </div> 
      <div class="col-xs-8 r-input">
      <input type="text" name="mo24er_name" id="mo24er_name" value="<?php echo $mo24er_name; ?>"
      class="form-control mother_form"  data-validation="required" data-validation-has-keyup-event="true">
                        </div>
                        </div>
                       
<!-- yara7-4-2020 -->
<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
   <!-- <div class="col-sm-4">
           <label class="">    </label>
     </div>  -->
<div class="col-xs-8 r-input">
<input type="button" id="buttons"  class="btn btn-success" style="display: inline-block;padding: 6px 12px;"
                        onclick="save_data(<?= $record->id ?>);" 
                       value="  حفظ" id="saves" />
                   
                       </div>
                       </div>
                    </div>
                </div>
                <!--  -->
                </div>
                <!--  -->
            </div>
        </div>
     </div>
        <?php } ?>


         <!-- details -->
         <?php if(!empty($result)&&isset($result)){?>
    <div class="col-xs-12 no-padding">

<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

    <div class="panel-heading">

        <h3 class="panel-title"> الموشرات التشغلية</h3>

    </div>
    <div class="panel-body" >

        <div class="col-md-12 no-padding">
        <table id="js_table_customer" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">

                <thead>

                <tr class="info">

                    <th class="text-center" style="width: 53px;">
                       م</th>


                    <!-- <th class="text-center">  الخطة التشغيلية</th>
                    <th>  البرنامج التشغيلي</th> -->
                    <th class="text-center"> الموشرات التشغلية</th>
                    <th class="text-center">الاجراءات</th>

                </tr>

                </thead>
                
            </table>



        </div>

    </div>

</div>

</div>
         <?php }?>
        <!--------------------------------------------------------------->
       <!-- <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script> -->
    <script>
        function save_data(prog_id) {
           // checkTotal();
            var all_inputs = $('[data-validation="required"]');
            var valid = 1;
            var text_valid = "";
            all_inputs.each(function (index, elem) {
                console.log(elem.id + $(elem).val());
                if ($(elem).val() != '') {
                    // valid=1;
                    $(elem).css("border-color", "");
                } else {
                    valid = 0;
                    $(elem).css("border-color", "red");
                }
            });
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gwd/Tashgly/add_add_mo24er',
                data: $('#MyForm_program').serialize(),
                cache: false,
                beforeSend: function (xhr) {
                    if (valid == 0) {
                    swal({title: 'من فضلك ادخل كل الحقول ', text: text_valid, type: 'error', confirmButtonText: 'تم'});
                    xhr.abort();
                } else if (valid == 1) {
                    swal({title: 'جاري اضافة  ', type: 'success', confirmButtonText: 'تم'});
                }
                },
                success: function (html) {
                    swal({
                        title: 'تم الحفظ ',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'تم'
                    });
                    var all_inputs_set = $('.mother_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');  
                });
                    load_page_program(prog_id);
                   // console.log(html);
                 // window.location.href='<?php echo base_url();?>/gwd/Tashgly/add_program/'+html;
                }
            });
        }
    </script>
<!-- yara -->
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php

//echo $customer_js;

?>
<script type="text/javascript">
    $(document).ready(function() {

        load_page_program(<?= $record->id ?>);
    });
</script>
<script>
    function load_page_program(prog_id){

        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax":
            {
                "url":'<?php echo base_url(); ?>gwd/Tashgly/data_mo24er',
                "type":"Post",
                "data":{
                    "prog_id":prog_id
                }
                
            }
            
             ,



            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
              

            ],

            buttons: [
                'pageLength',
                'copy',
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
            colReorder: true,
            destroy:true


        });

    } 

    function get_mo24er_program(id,prog_id) {

$.ajax({
    type: 'post',
    url: "<?php echo base_url();?>gwd/Tashgly/update_mo24er_prog",
    data:{id:id,prog_id:prog_id},
 
    success: function(d) {
        $('#update').html(d);
    }
});

}
function delete_mo24er_program(id,prog_id) {
$.ajax({
    type: 'post',
    url: '<?php echo base_url() ?>gwd/Tashgly/delete_mo24er_program',
    data: {id: id,prog_id:prog_id},
    dataType: 'html',
    cache: false,
    success: function (html) {
        swal("تم الحذف!", "", "success");
        load_page_program(prog_id);
        //window.location.reload();

    }
});

}
    </script>
    