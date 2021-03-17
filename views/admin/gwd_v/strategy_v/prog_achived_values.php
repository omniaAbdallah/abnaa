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
<!-- details -->
<div class="col-xs-12 no-padding">
                   <div class="col-sm-12 col-xs-12">
                        <table class="table  table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                            <tr>
                                <th style="width: 110px">إسم الخطة </th>
                                <td>
                                  <span class="label" style="background-color: #32e26b"> 
                                  <?= $get_all->pln_name ?>
                             </span>
                               </td>
                               <th>تاريخ البداية </th>
                                <td><?= $get_all->pln_from_date ?> </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th> الرؤية </th>
                                <td>  <p class="whitespaces"><?= $get_all->pln_roya ?></p></td>
                                <th>تاريخ النهاية </th>
                                <td><?= $get_all->pln_to_date ?> </td>
                            </tr>
                            <tr>
                                <th>الرسالة </th>
                                <td>  <p class="whitespaces"><?= $get_all->pln_resala ?></p></td>
                                <th>  مراجع الخطة</th>
                                <td> <span class="label" style="background-color: #32e26b"><?= $get_all->pln_reviser_name ?></span></td>
                            </tr>
                            <tr>
                                <th> القيم </th>
                                <td>  <p class="whitespaces"><?= $get_all->pln_qiam ?></p></td>
                                <th>معتمد الخطة</th>
                                <td> <span class="label" style="background-color: #ff8080"><?= $get_all->pln_suspender_name ?></span></td>
                            </tr>
                            </tbody>
                        </table>
                </div>
	</div>
    <!-- details -->
<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <div id="panel-title" class="panel-title"><h4>إضافة القيم المتحققة</h4></div>
    </div>
        <div class="panel-body">
            <div class="col-sm-12 no-padding load_strategy">
           <?php echo form_open_multipart('gwd/strategy/Strategy/add_achived', array('id' => 'MyForm_program'));?>
    <?php
    if(!empty($record)){
        $id = $record->id;
        $strategy_id_fk=  $record->strategy_id_fk;
        echo "<input type='hidden' id='id' name='id' value='".$id."'>";
        echo '<input type="hidden" name="update" value="update">';
        echo "<input type='hidden' name='strategy_id_fk'' value='".$strategy_id_fk."'  >";
      //  $program_name= $record->program_name;
        $all_wanted_values = $record->all_wanted_values;
        $part1 = $record->part1;
        $part2 = $record->part2;
        $part3=$record->part3;
        $part4=$record->part4;
       $total=$record->total;
       $part1_achived = $record->part1_achived;
       $part2_achived = $record->part2_achived;
       $part3_achived=$record->part3_achived;
       $part4_achived=$record->part4_achived;
      $total_achived=$record->total_achived;
      //
      $result1 = $record->result1;
      $result2 = $record->result2;
      $result3=$record->result3;
      $result4=$record->result4;
     $total_result=$record->total_result;
    }else{
        echo '<input type="hidden" name="add" value="add">';
     //   $program_name= '';
        $all_wanted_values ='';
        $part1 = '';
    $part2='';
    $part3='';
	   $part4='';
       $total='';
       $part1_achived = '';
       $part2_achived = '';
       $part3_achived='';
       $part4_achived='';
      $total_achived='';
      // $part1_achived = $record->part1_achived;
      $result1 ='';
      $result2 = '';
      $result3='';
      $result4='';
     $total_result='';
    }
    ?>
                    <div class="col-md-12 no-padding">
                    <div class="col-md-8 col-sm-8 col-xs-8 inner-side r-data">
                    <div class="col-sm-4">
               <label class="">    الخطة الاستراتيجيه</label>
              </div> 
      <div class="col-xs-4 r-input">
                            <input type="text" name="tshgly_strtegy_name" id="tshgly_strtegy_name"
                                   value="<?= $get_all->pln_name ?>"
                                   class="form-control" readonly />
                        </div>
                        </div>
                   
</br>
</br>
</br>
                        <table class="table">
  <thead>
    <tr>
      <th scope="col">الارباع</th>
      <th scope="col">القيم المستهدفة</th>
      <th scope="col">القيم المتحققة</th>
      <th scope="col">نتيجة الانجاز</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">الاول</th>
      <td><input type="number" id="part1" value="<?php echo $part1; ?>"
                                   class="form-control"  
                                   readonly
                               ></td>
      <td><input type="number" name="part1_achived" id="achived_part1" value="<?php echo $part1_achived; ?>"
                                   class="form-control value_part"  
                                   onchange="find_next(1)" 
                                   onkeypress="validate_number(event)"                            
                                data-validation="required"
                               ></td>
      <td><input id="result1" name="result1"  data-validation="required" readonly class=" form-control text-center  result"
      <?php
if($result1!=0){
      if($result1 <50)
      {
      echo'  style=" background: red;"';
      }
      else  if($result1 >=50 &&  $result1 <100)
      {
      echo'  style="  background: #e4840c;"';
      }
      else  if( $result1 >100 || $result1 ==100 )
      {
      echo'  style="  background: green;"';
      }
    }    
      ?>
       value="<?php echo $result1; ?> %"
      ></td>
    </tr>
    <tr>
      <th scope="row">التاني</th>
      <td><input type="number" id="part2" value="<?php echo $part2; ?>"
                                   class="form-control"  
                                   readonly
                               ></td>
      <td><input type="number" name="part2_achived" id="achived_part2" value="<?php echo $part2_achived; ?>"
                                   class="form-control value_part"  
                                   onchange="find_next(2)" readonly
                                   onkeypress="validate_number(event)"                            
                                data-validation="required"
                               ></td>
                               <td><input id="result2" data-validation="required" name="result2" readonly class="form-control text-center  result"
                               <?php
if($result2!=0){
      if($result2 <50)
      {
      echo'  style=" background: red;"';
      }
      else  if($result2 >=50 &&  $result2 <100)
      {
      echo'  style="  background: #e4840c;"';
      }
      else  if( $result2 >100 || $result2 ==100 )
      {
      echo'  style="  background: green;"';
      }
    }    
      ?>
       value="<?php echo $result2; ?> %"
                               ></td>
    </tr>
    <tr>
      <th scope="row">الثالث</th>
      <td><input type="number" id="part3" value="<?php echo $part3; ?>"
                                   class="form-control"  
                                   readonly
                               ></td>
      <td><input type="number" name="part3_achived" id="achived_part3" value="<?php echo $part3_achived; ?>"
                                   class="form-control value_part"  
                                   onchange="find_next(3)" readonly
                                   onkeypress="validate_number(event)"                            
                                data-validation="required"
                               ></td>
                               <td><input id="result3" data-validation="required" name="result3" readonly class="form-control text-center  result"
                               <?php
if($result3!=0){
      if($result3 <50)
      {
      echo'  style=" background: red;"';
      }
      else  if($result3 >=50 &&  $result3 <100)
      {
      echo'  style="  background: #e4840c;"';
      }
      else  if( $result3 >100 || $result3 ==100 )
      {
      echo'  style="  background: green;"';
      }
    }    
      ?>
       value="<?php echo $result3; ?> %"
                               ></td>
    </tr>
    <tr>
      <th scope="row">الرايع</th>
      <td><input type="number" id="part4" value="<?php echo $part4; ?>"
                                   class="form-control"  
                                   readonly
                               ></td>
      <td><input type="number" name="part4_achived" id="achived_part4" value="<?php echo $part4_achived; ?>"
                                   class="form-control value_part"  
                                   onblur="find_next(4)" readonly
                                   onkeypress="validate_number(event)"                            
                                data-validation="required"
                               ></td>
                               <td><input id="result4"  data-validation="required" readonly name="result4" class="form-control text-center  result"
                               <?php
if($result4!=0){
      if($result4 <50)
      {
      echo'  style=" background: red;"';
      }
      else  if($result4 >=50 &&  $result4 <100)
      {
      echo'  style="  background: #e4840c;"';
      }
      else  if( $result4 >100 || $result4 ==100 )
      {
      echo'  style="  background: green;"';
      }
    }    
      ?>
       value="<?php echo $result4; ?> %"
                               ></td>
    </tr>
    <tr>
      <th scope="row">المجموع</th>
      <td><input type="number" readonly name="total" id="total" value="<?php echo $total; ?>"
                                   class="form-control "  readonly                          
                                data-validation="required"
                               /></td>
                               <td><input type="number" readonly name="total_achived" id="total_achived" value="<?php echo $total_achived; ?>"
                                   class="form-control "  readonly                          
                                data-validation="required"
                               /></td>
      <td>  <input id="total_result" data-validation="required"  name="total_result"  readonly class="form-control text-center " 
      <?php
if($total_result!=0){
      if($total_result <50)
      {
      echo'  style=" background: red;"';
      }
      else  if($total_result >=50 && $total_result <100)
      {
      echo'  style="  background: #e4840c;"';
      }
      else  if( $total_result >100 || $total_result ==100 )
      {
      echo'  style="  background: green;"';
      }
    }    
      ?>
       value="<?=$total_result;?> %"> </td>
    </tr>
  </tbody>
</table>                   
<!-- yara7-4-2020 -->
<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
   <div class="col-sm-4">
           <label class="">     إعتماد القيم المتحققة </label>
     </div> 
<div class="col-xs-8 r-input">
<input type="button" id="buttons"  class="btn btn-success" style="display: inline-block;padding: 6px 12px;"
                        onclick="save_data();"
                       value="إعتماد القيم المتحققة" id="saves" />
<span>
<p style="
    color: red;
">
عندما تكون جميع الارباع محجوبه تاكد من اعتماد القيمه المستهدفة
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
                url: '<?php echo base_url() ?>gwd/strategy/Strategy/add_achived',
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
                 // window.location.href='<?php echo base_url();?>/gwd/Tashgly/add_program/'+html;
                }
            });
        }
    </script>
<!-- yara -->
<script type="text/javascript">
function findTotal_achived(){
    var arr = document.getElementsByClassName('value_part');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total_achived').value = tot;
}
    </script>
    <script type="text/javascript">
function find_next(id){
    findTotal_achived();
var achived_value=$('#achived_part'+id).val();
var wants_value=$('#part'+id).val();
var result=(achived_value/wants_value)*100;
res = result.toFixed(3);
$('#result'+id).val(+res);
if(res<50)
{
    document.getElementById("result"+id).setAttribute("style", " background: red;"); 
}
else if((res<100)&&(res>=50)){
    document.getElementById("result"+id).setAttribute("style", " background: #e4840c;"); 
}
else if(100<=res){
    document.getElementById("result"+id).setAttribute("style", " background: #43c143;"); 
}
findTotal_result();
    var partid=id+1;
    document.getElementById("achived_part"+partid).removeAttribute("readonly", "readonly");
}
    </script>
<script type="text/javascript">
function findTotal_result(){
var all_achived_value=$('#total_achived').val();
var all_wants_value=$('#total').val();
var result=(all_achived_value/all_wants_value)*100;
res = result.toFixed(3);
console.log(res);
$('#total_result').val(+res);
if(res<50)
{
    document.getElementById("total_result").setAttribute("style", " background: red;"); 
}
else if((res<100)&&(res>=50)){
    document.getElementById("total_result").setAttribute("style", " background: #e4840c;"); 
}
else if(100<=res){
    document.getElementById("total_result").setAttribute("style", " background: #43c143;"); 
}
}
    </script>