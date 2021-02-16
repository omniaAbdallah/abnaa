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
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
   
        <div id="panel-title" class="panel-title"><h4>إضافة القيم المستهدفة</h4></div>
    
    </div>
        <div class="panel-body">

            <div class="col-sm-12 no-padding load_strategy">
           <?php echo form_open_multipart('gwd/Tashgly/add_wants', array('id' => 'MyForm_program'));?>
    <?php
    if(!empty($record)){
        $id = $record->id;
        $tashgly_id_fk=  $record->tashgly_id_fk;
        echo "<input type='hidden' id='id' name='id' value='".$id."'>";
        echo '<input type="hidden" name="update" value="update">';
        echo "<input type='hidden' name='tashgly_id_fk'' value='".$tashgly_id_fk."'  >";
      
        $program_name= $record->program_name;
        $all_wanted_values = $record->all_wanted_values;
        $part1 = $record->part1;
        $part2 = $record->part2;
        $part3=$record->part3;
        $part4=$record->part4;
       $total=$record->total;


    }else{
     

        echo '<input type="hidden" name="add" value="add">';
        $program_name= '';
        $all_wanted_values ='';
        $part1 = '';
    $part2='';
    $part3='';
	   $part4='';
       $total='';
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
                                  
                        </div>
                        </div>

                    <div class="col-md-8 col-sm-8 col-xs-8 inner-side r-data">
                    
               
                    <div class="col-sm-4">
           <label class="">     البرنامج التشغيلي</label>
     </div> 
      <div class="col-xs-8 r-input">
                     
                            <input type="text" name="program_name" id="program_name"
                                   value="<?= $program_name ?>"
                                   class="form-control bottom-input" readonly />
                                  
                        </div>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-8 inner-side r-data">
                    <div class="col-sm-4">
           <label class="">     القيمة المستهدفة الكلية</label>
     </div> 
      <div class="col-xs-4 r-input">
      <input type="text" name="all_wanted_values" id="all_wanted_values" value="<?php echo $all_wanted_values; ?>"
      class="form-control "  onkeypress="validate_number(event)" data-validation="required" data-validation-has-keyup-event="true">

                        </div>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-8 inner-side r-data">
                    <div class="col-sm-12">
           <label class="">    الارباع </label>
     </div> 



                        <div class="col-md-8 col-sm-8 col-xs-8 "style="
    float: left;
">
                    <div class="col-sm-4">
           <label class="">    الربع الاول </label>
     </div> 
      <div class="col-xs-4 r-input">
                     
                            <input type="number" name="part1" id="part1" value="<?php echo $part1; ?>"
                                   class="form-control value_money"  
                                   onblur="findTotal()" name_id="0"
                                   onkeypress="validate_number(event)"                            
                                data-validation="required"
                               >
                        </div>
                        </div>

                        <!-- yara7-4-2020 -->
                        <div class="col-md-8 col-sm-8 col-xs-8"style="
    float: left;
">
                    <div class="col-sm-4">
           <label class="">    الربع الثاني </label>
     </div> 
      <div class="col-xs-4 r-input">
                     
                            <input type="number" name="part2" name_id="1" id="part2" value="<?php echo $part2; ?>"
                                   class="form-control value_money"  onblur="findTotal()"  onkeypress="validate_number(event)"                            
                                data-validation="required"
                              />
                        </div>
                        </div>
                        <!--  -->
                        <div class="col-md-8 col-sm-8 col-xs-8 "style="
    float: left;
">
                    <div class="col-sm-4">
           <label class="">    الربع الثالث </label>
     </div> 
      <div class="col-xs-4 r-input">
                     
                            <input type="number" name="part3" id="part3" name_id="2" value="<?php echo $part3; ?>"
                                   class="form-control value_money"   onblur="findTotal()" onkeypress="validate_number(event)"                            
                                data-validation="required"
                               />
                        </div>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-8 " style="
    float: left;"
>
                    <div class="col-sm-4">
           <label class="">    الربع الرابع </label>
     </div> 
      <div class="col-xs-4 r-input">
                     
                            <input type="number" name="part4" id="part4" name_id="3" value="<?php echo $part4; ?>"
                                   class="form-control value_money"  onblur="findTotal()"  onkeypress="validate_number(event)"                            
                                data-validation="required"
                               />
                        </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8"  style="
    float: left;">
                    <div class="col-sm-4">
           <label class="">     المجموع </label>
     </div> 
      <div class="col-xs-4 r-input">
                     
                            <input type="number" readonly name="total" id="total" value="<?php echo $total; ?>"
                                   class="form-control "  onkeypress="validate_number(event)"                            
                                data-validation="required"
                               />
                        </div>
                        </div>
                    
<!-- yara7-4-2020 -->

<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
   <div class="col-sm-4">
           <label class="">     إعتماد القيم المستهدفة </label>
     </div> 
<div class="col-xs-8 r-input">
<input type="button" id="buttons"  class="btn btn-success" style="display: inline-block;padding: 6px 12px;"
                        onclick="checkTotal();" <?php if(($record->total !=0)&&($record->total !='')){
echo "disabled";
                        }?>
                       value="إعتماد القيم المستهدفة" id="saves" />
<span>
<p style="
    color: red;
">
بإمكانك إعتماد توزيع الارباع  . وعند الإعتماد يمكنك تعديل قيم المتحققة . ولا يمكنك تعديل قيم المستهدفة مرة اخري . إلا إذا طلبت تعديل الإعتماد.
</p>
</span>                       
                       
                       </div>
                       </div>
                        
                    </div>



                </div>
            </div>

        </div>
     </div>
        <?php } ?>
        <!--------------------------------------------------------------->

       <!-- <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script> -->

    


    <script>

        function save_data() {
         
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
                url: '<?php echo base_url() ?>gwd/Tashgly/add_wants',
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
                
                    console.log(html);

                  window.location.href='<?php echo base_url();?>/gwd/Tashgly/add_program/'+html;

                }
            });
        }




    </script>
<!-- yara -->

<script type="text/javascript">
function findTotal(){
    var arr = document.getElementsByClassName('value_money');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
   
}

    </script>

<script type="text/javascript">
function checkTotal(){
    var  total= $('#total').val() ;

  var   all_wanted_values=$('#all_wanted_values').val();
  console.log(total);
  console.log(all_wanted_values);
    if(all_wanted_values == total)
    {
       // document.getElementById("buttons").removeAttribute("disabled", "disabled");
        save_data();
    }
    else{
        swal({
                      title: "لا يمكن ان تكون القيمه المستهدفه الكلية لا تساوي قيمة الارباع!",


      }
      );

      $('#part1').val('');
      $('#part2').val('');
      $('#part3').val('');
      $('#part4').val('');
      $('#total').val('');
        //document.getElementById("buttons").setAttribute("disabled", "disabled");
    }
}
    </script>