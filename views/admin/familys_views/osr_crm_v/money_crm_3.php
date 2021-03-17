<style>
.label-green{
border: none !important;    
}
label.label-green {
        height: auto;
        line-height: unset;
        
       
        text-align: right !important;
        margin-bottom: 0;
      background-color: transparent;
  
      /*  color: #2b2929;
       font-weight: 600 !important;
      font-size: 14px !important;
      
      */
      
      color: black !important;
    font-weight: 600 !important;
    font-size: 18px !important;
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
    
    
.inner-heading {
    background-color: #9ed6f3;
    padding: 10px;
}
.pop-text{
    background-color: #009688;
    color: #fff;
    padding: 7px;
    font-size: 14px;
    margin-bottom: 3px;
    margin-top: 3px;
}
.pop-text1{
    background-color:#eee;
     padding: 7px;
      font-size: 14px;
      margin-bottom: 3px;
       margin-top: 3px;
}
.pop-title-text{
    margin-top: 4px;
    margin-bottom: 4px;
    padding: 6px;
    background-color: #9ed6f3;
}
.span-validation{
    color: rgb(255, 0, 0);
    font-size: 12px;
    position: absolute;
    bottom: -10px;
    right: 50%;
}
.astric{
    color: red;
    font-size: 25px;
    position: absolute;
}
.help-block.form-error{
    color: #a94442  !important;
    font-size: 11px !important;
    position: absolute !important;
    bottom: -23px !important ;
    right: 50% !important ;
}
    .title-top{
          padding: 8px !important;
      /*/  background-color: rgb(156, 207, 27);
        color: #000;*/
        background: #00713e !important;
    color: white;
        font-size: 18px !important;
        border-radius: 5px !important;
        
        /* border-radius: 5px; */
        font-size: 18px;
    }
    table td{
        padding: 2px !important;
    }
     .label-green label{
        
        font-size:16px;
        color: black !important;
        
        }
        
        
      
        
        
        
</style>
<?php if(isset($all_links['financial']) && $all_links['financial']!=null){

    foreach($all_links['financial'] as  $key=>$value){
        $result[$key]=$all_links['financial'][$key];
    }

}else{
 /*    foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';
     }   */
    }
    $arr_yes_no=array('','نعم','لا');
?>

<div class="col-xs-12" >

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?>
          
             </h3>
            
        </div>
        <div class="panel-body">
       <?php echo form_open_multipart("family_controllers/osr_crm/Osr_crm_zyraat_c/crm_money/".$id."/".$mother_national_num)?>
                <div class="col-sm-9 col-xs-12">
                
               
            
              
                    <div class="col-sm-6 col-xs-12 padding-4">
                  
                        
                         <div class="col-xs-12"  style=" padding: 0">
                           
                         <table id="" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                           
                            <thead>
                            <tr>
                            <th colspan="3"  style="
    background: darkgrey;
">
                            دخل الاسرة</th>
                            </tr>
                            </thead>
                           <tbody>
                        
                       <?php
                       $affect_arr=array(0=>'لا تؤثر',1=>'تؤثر');
                       if(!empty($income_sources)){   for($a=0; $a<sizeof($income_sources);$a++){?>
                          
                           <tr>
      <td > 
         <?php echo$income_sources[$a]->title_setting?>
       </td>
                              <td style="width: 25%;">
 <input type="hidden" name="finance_income_type_id_income<?php echo $a;?>" 
     value="<?php echo $income_sources[$a]->id_setting; ?>">
<input type="text" name="value_income<?php echo $a;?>"   id="value_income<?php echo $a;?>" style="font-size: 18px;"
    data-validation="required" value="<?php
if(!empty($all_records[$income_sources[$a]->id_setting])){
           echo $all_records[$income_sources[$a]->id_setting]->value;
           }else{
               if($income_sources[$a]->id_setting == 66){
                  echo $basic_data_family["retirement"];
               }elseif($income_sources[$a]->id_setting == 71){
                  echo $basic_data_family["guarantee"];
               }elseif($income_sources[$a]->id_setting == 67){
                 echo $basic_data_family["insurance"];
               }else{
                echo 0 ;
               }
            
            }
?>" onkeypress="validate_number(event);" onkeyup="GetMyMoney();" class="form-control value_money" 
     />


                              </td>
<td>
             <input type="radio" name="affect_income<?php echo $a;?>" name_id="<?php echo $a;?>"  id="affect_income<?php echo $a;?>"
    <?php      if(isset($all_records[$income_sources[$a]->id_setting])  && $all_records[$income_sources[$a]->id_setting]!=''){
if(   $all_records[$income_sources[$a]->id_setting]->affect ==1){
  echo'checked';
} }else{echo'checked'; } ?>
          data-validation="required"  class="income_sources_class"   onclick="GetMyMoney()" value="1" >
   <label for="">تؤثر</label>
   <input type="radio" name="affect_income<?php echo $a;?>"   name_id="<?php echo $a;?>" id="affect_income<?php echo $a;?>"

       <?php      if(isset($all_records[$income_sources[$a]->id_setting])  && $all_records[$income_sources[$a]->id_setting]!=''){
           if(   $all_records[$income_sources[$a]->id_setting]->affect ==0){
               echo'checked';
           } } ?>
          data-validation="required"   class="income_sources_class"  onclick="GetMyMoney()" value="0" >
   <label for="">لا تؤثر</label>





</td>
                           </tr>
                           
                       <?php } } ?>
                       
                          <tr>
                            <td  width="40%"  >  الإجمالي </td>
                            <td><input type="text"   id="all_income_values"  readonly value="0"  class="form-control" style="font-size: 18px;"/></td>
                             <td ></td>
                          </tr>
                       
                       
</tbody>
                           </table>                                                      
                           </div>
                    </div>


                    <div class="col-sm-6 col-xs-12">
                  
                        <div class="col-xs-12"  style=" padding: 0">
                        
                        <table id="" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                            <th colspan="3" style="
    background: darkgrey;
">مصروفات الاسرة</th>
                            </tr>
                            </thead>
                           <tbody>
                        <?php

                        if(!empty($monthly_duties)){   for($s=0; $s<sizeof($monthly_duties);$s++){?>
                        
                           <tr>
      <td width="40%" > 
                        
                        
                        
                            <label class="label "  ><?php echo $monthly_duties[$s]->title_setting?></label>
                           </td>
                            
                            
                            <td style="width: 25%;">
<input type="hidden" name="finance_income_type_id_duty<?php echo $s;?>" 
   value="<?php echo $monthly_duties[$s]->id_setting; ?>">
<input type="text"  name="value_duty<?php echo $s;?>"   data-validation="required" style="font-size: 18px;" value="<?php
if(!empty($all_records[$monthly_duties[$s]->id_setting])){ echo $all_records[$monthly_duties[$s]->id_setting]->value;}else{ echo 0 ;}
?>" onkeypress="validate_number(event);" onkeyup="GetMyMoney();" class="form-control  duties_money" 

  />



</td>

<td>

                                <input type="radio" name="affect_duty<?php echo $s;?>"  names_id="<?php echo $s;?>"  data-validation="required"
                                    <?php   if(isset($all_records[$monthly_duties[$s]->id_setting])  && $all_records[$monthly_duties[$s]->id_setting]!=''){
                                                  if(  $all_records[$monthly_duties[$s]->id_setting]->affect == 1){ echo'checked'; } }else{echo'checked'; } ?>
                                       class="monthly_duties_class"     onclick="GetMyMoney()" value="1" >
                                <label for="">تؤثر</label>
                                <input type="radio" name="affect_duty<?php echo $s;?>"   names_id="<?php echo $s;?>"   data-validation="required"
                                    <?php   if(isset($all_records[$monthly_duties[$s]->id_setting])  && $all_records[$monthly_duties[$s]->id_setting]!=''){
                                        if(  $all_records[$monthly_duties[$s]->id_setting]->affect == 0){ echo'checked'; } }?>
                                       class="monthly_duties_class"   onclick="GetMyMoney()" value="0" >
                                <label for="">لا تؤثر</label>

</td>
</tr>

                            <?php } } ?>
                             <tr>
                            <td  width="40%"  >  <label class="label "  > الإجمالي  </label> </td>
                            <td> <input type="text"   id="all_duty_values" value="0"  readonly   class="form-control " style="font-size: 18px;"/></td>
                             <td ></td>
                          </tr>
                            
</tbody>
</table>


                        </div>
                        </div>


                        <!--  -->
                       

                        <!--  -->

                </div>
                <div class="col-md-3 form-group" id="Details">
                <?php if (isset($load_details) && (!empty($load_details))) {
//                    $data['file_num_data']=$file_num_data;
                    $this->load->view($load_details);
                } else { ?>
                    <table class="table table-bordered ">
                        <tbody>
                        <tr>
                            <td style="background-color: #e4e4e4 !important;" colspan="6">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                بيانات الأسرة
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-id-card-o" aria-hidden="true"></i> إسم الأسرة</th>
                            <td class="infotd text-center">
                                <input type="hidden" class="form-control" name="osra_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <th class="info">
                                <i class="fa fa-file-o" aria-hidden="true"></i> رقم الملف
                            </th>
                            <td class="infotd text-center">
                                <!-- <input type="text" class="form-control" readonly  value=""> -->
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-phone-square" aria-hidden="true"></i> جوال التواصل</th>
                            <td class="infotd text-center">
                                <!-- <input type="text" readonly class="form-control" name="contact_mob" value=""> -->
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-file-o" aria-hidden="true"></i> الفئة</th>
                            <td class=" infotd text-center">
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-calendar-o" aria-hidden="true"></i> تاريخ التسجيل</th>
                            <td class="infotd text-center">
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-users" aria-hidden="true"></i> عدد أفراد الأسرة</th>
                            <td class="infotd text-center">
                            </td>
                        </tr>
                        </tbody>
                       
                    </table>
                <?php } ?>
            </div>
            <!---------------------------------------table1------------------------------>

   <style>
   .specific_style{
    
    background-color: #658e1a !important;
    color: white;
   }
   
  .specific_style_2{   
   width: 280px;
    background-color: white;
   color: red;
    border: 1px solid #658e1a;
    }
   </style>
  <div class="clearfix"></div>
          <hr />  
          
          <div class="text-center">
          <table id="" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%" style="width: 50%; margin: auto; height: 84px;">
          
                            <tr>
                                <td  style="width: 280px;font-size: 18px;"> نصيب الفرد  </td>
                                <td  style="width: 280px;font-size: 22px;" id="naseeb" >
                                
                                </td>
                                
                              
                                
                            </tr>
                            <tr>
                                <td  style="width: 280px;font-size: 18px;">فئة الأسرة</td>
                                <td style="width: 280px;font-size: 22px;" id="f2a">0</td>
                            </tr>


                </table>
         </div>

            <input type="hidden" id="myval" class="form-control">
            
             <input type="hidden" name="naseb" id="naseb">
            <input type="hidden" name="family_cat_n" id="family_cat">
            <input type="hidden" name="family_cat_id" id="family_cat_id">     
            
            <!---------------------------------------table1------------------------------>

  <!------------------------------------>
     <div class="col-xs-9 text-center">
     <?php  if(isset($all_records) && $all_records!=null):
                $input_name1='update';
                else:  $input_name1='add'; endif; ?>
         <input type="hidden" name="income_max" value="<?php echo sizeof($income_sources);?>">
         <input type="hidden" name="duty_max" value="<?php echo sizeof($monthly_duties);?>">
         
           
         
        <br />
         <button type="submit"  class="btn btn-labeled btn-success " name="<?php echo $input_name1?>" value="حفظ">
              <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
         </button>
                    
 	</div>
    <?php  echo form_close()?>
    <br/>
    <br/>


</div>
</div>
</div>
	

<script>
  

    document.addEventListener('DOMContentLoaded', function () {
        GetMyMoney();
    });
</script>


<script>
function GetMyMoney() {

    //table1
    var money=[];
    var income_total =0;
    $(".value_money").each(function () {
        money.push($(this).val());
    })
    $(".income_sources_class:radio:checked").each(function () {
        if($(this).val()==1)
        {
          var valu=parseInt(money[$(this).attr('name_id')]);
            if(money[$(this).attr('name_id')] !=''){
                income_total =income_total+ valu;
            }
        }

    }

)

    //table2
    var duties_money=[];
    var duties_total =0;
    $(".duties_money").each(function () {
        duties_money.push($(this).val());
    })
    $(".monthly_duties_class:radio:checked").each(function () {
        if($(this).val()==1)
        {
            var valus=parseInt(duties_money[$(this).attr('names_id')]);
            if(duties_money[$(this).attr('names_id')] !=''){
                duties_total =duties_total+ valus;
            }
        }
    })

    var total =parseInt(income_total) - parseInt(duties_total);
    $('#all_income_values').val(parseInt(income_total));
    $('#all_duty_values').val(parseInt(duties_total));
    $('#myval').val(total);
console.log(total);
    var family_num =<?php echo  $mother_national_num;?>;
    //if ( total !='' && total >0) {
        var dataString = 'total=' + total +'&family_num=' + family_num; 
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/money_function',
            data:dataString,
            cache:false,
            success: function(json_data){
                
                

                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
               // $('#naseeb').text(JSONObject['naseb']);
               $('#naseeb').text(Math.round(JSONObject['naseb']));
                $('#f2a').text(JSONObject['f2a']);
                /**********************************/
                $('#family_cat_id').val(JSONObject['f2a_id']);
                $('#family_cat').val(JSONObject['f2a']);
                $('#naseb').val(Math.round(JSONObject['naseb']));
                
                /************************************/
                
            }
        });


    //}

}


</script>


