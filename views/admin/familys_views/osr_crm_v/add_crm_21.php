<style type="text/css">
    .pdd{
        margin: 0;padding: 0
        }
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 140px;
        height: 140px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }
    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    input[type=radio] {
        height: 20px;
        width: 20px;
    }
label.label-green {
    display: inline-block;
    width: 100%;
}
label.label-green {
    height: auto;
    line-height: unset;
    font-size: 16px !important;
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
</style>
<?php
            $this->load->model("familys_models/Register");
            $data_load["basic_data_family"] = $basic_data_family;
            $data_load["mother_num"] = $mother_national_num;
            $data_load["person_account"] = $basic_data_family["person_account"];
            $data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
            $data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
            $data_load["file_num"] = $basic_data_family["file_num"];
           $data_load["employees"] = $employees;
            $this->load->view('admin/familys_views/drop_down_button', $data_load); ?>
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
            <!-------------------------------------------------------------------------------------->
            <?php if(isset($crm_data)){
                  echo form_open_multipart("family_controllers/osr_crm/Osr_crm_c/Update/".$crm_data["id"].'/'.$crm_data["mother_national_num"]);
                  $out["deisabled"]="disabled";
                  if($crm_data["need_visit"]=='no')
                  {
                    $disp="none";
                  }
                  else{
                    $disp="";
                  }
                    
                  $out['input']='UPDATE';
                  $out['input_title']='تعديل ';
            }else{
                  echo form_open_multipart("family_controllers/osr_crm/Osr_crm_c/add_crm/".$mother_national_num);
                  $disp="none";
                  $out["deisabled"]="";
                  $out["deisabled_bank"]="disabled=''";
                  $out["readonly_bank"]="readonly=''";
                  $out['input']='ADD';
                  $out['input_title']='حفظ ';
            }?>
         
           <div class="col-xs-12 no-padding">

           <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> تاريخ الاتصال</label>
                       <input type="date"
                      readonly
                       value="<?php if(isset($crm_data["contact_date"])){  if(!empty($crm_data["contact_date"])){echo $crm_data["contact_date"];} }else{echo date('Y-m-d');}?>"
                       id="contact_date"  name="contact_date" class=" form-control "  />
                       <input type="hidden" value="<?=$mother_national_num?>" name="mother_national_num"/>
                </div> 
           
              <!--  <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> وقت الاتصال</label>
                       <input type="time"
                       readonly
                       value="<?php if(isset($crm_data["contact_time"])){  if(!empty($crm_data["contact_time"])){echo $crm_data["contact_time"];} }else{echo date('H:i:s');}?>"
                       id="contact_time"  name="contact_time" class=" form-control "  />
                </div> -->

          
              
                                  <div class="form-group  col-sm-2 padding-4">
    <label class="label ">  وسيلة الاتصال </label>
    <select name="wasela_etsal" id="wasela_etsal"   data-validation="required "
            class="form-control "  >
        <option value="">إختر</option>
        <?php foreach ($method_etsal as $row){
            $selected="";
            if(isset($crm_data)){
             
                if($crm_data['wasela_etsal']== $row->conf_id ){$selected="selected";}
             
               
            }?>
            <option value="<?=$row->conf_id?>" <?=$selected?>><?=$row->title?></option>
            <?php } ?>
    </select>
</div>  

<div class="form-group  col-sm-2 padding-4">
    <label class="label ">   نتيجة المكالمة </label>
    <select name="contact_result" id="contact_result"   data-validation="required "
            class="form-control "  >
        <option value="">إختر</option>
        <?php foreach ($natega_etsal as $row){
            $selected="";
            if(isset($crm_data)){
             
                if($crm_data['contact_result']== $row->conf_id ){$selected="selected";}
             
               
            }?>
            <option value="<?=$row->conf_id?>" <?=$selected?>><?=$row->title?></option>
            <?php } ?>
    </select>
</div>  


<div class="form-group  col-sm-2 padding-4">
    <label class="label ">    هل يحتاج لزيارة </label>
    <select name="need_visit" id="need_visit" 
            class="form-control "    data-validation="required "
            onchange="get_types();"
             >
        <option value="">إختر</option>
        <?php 
        $need_visit_arr=array('yes'=>'نعم',
        'no'=>'لا');
        foreach ($need_visit_arr as $key=>$value){
            $selected="";
            if(isset($crm_data['need_visit'])){
             
                if($crm_data['need_visit']== $key ){$selected="selected";}
             
               
            }?>
            <option value="<?=$key?>" <?=$selected?>><?=$value?></option>
            <?php } ?>
    </select>
</div>  


<div id="display" style="display:<?=$disp?>" >
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> تاريخ الزيارة</label>
                       <input type="date"
                       value="<?php if(isset($crm_data["visit_date"])){if(!empty($crm_data["visit_date"])){echo $crm_data["visit_date"];} }else{echo date('Y-m-d');}?>"
                       id="visit_date"  name="visit_date" class=" form-control "  />
                </div> 

                <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> وقت الزيارة</label>
                       <input type="time"   
                       value="<?php if(isset($crm_data["from_visit_time"])){  if(!empty($crm_data["from_visit_time"])){echo $crm_data["from_visit_time"];} }else{echo date('H:i');}?>"
                       id="from_visit_time"  name="from_visit_time" class="  form-control "  />
                </div> 
                
                       <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> وقت الزيارة</label>
                       <input type="time"   
                       value="<?php if(isset($crm_data["to_visit_time"])){  if(!empty($crm_data["to_visit_time"])){echo $crm_data["to_visit_time"];} }else{echo date('H:i');}?>"
                       id="to_visit_time"  name="visit_time" class="  form-control "  />
                </div> 
                
                      
                
                       <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style="">  نوع البحث</label>
                 
                 <select name="no3_bahth" class="form-control">
                            <option value="new_visit">زيارة جديدة</option>
                            <option value="bahth_tatb3">بحث تتبعي</option>

                        </select>
                </div>    
          
<div class="form-group  col-sm-2 padding-4">
    <label class="label ">  الغرض من الزيارة </label>
    <select name="purpose_visit" id="contact_result"   
            class="form-control "  >
        <option value="">إختر</option>
        <?php foreach ($all_purpose_visit as $purpose){
            $selected="";
            if(isset($crm_data)){
             
                if($crm_data['purpose_visit']== $purpose->conf_id ){$selected="selected";}
             
               
            }?>
            <option value="<?=$purpose->conf_id?>" <?=$selected?>><?=$purpose->title?></option>
            <?php } ?>
    </select>
</div>


           <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> ملاحظات </label>
                       <input type="time"   
                       value="<?php if(isset($crm_data["notes"])){  if(!empty($crm_data["notes"])){echo $crm_data["notes"];} }else{ }?>"
                       id="notes"  name="notes" class="  form-control "  />
                </div> 
                
 </div>   
 </div>


    


           
            
            <!---------------------------------------->
            <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
            <br>
                <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success  btn-labeled" id="submit_but">
                    <span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
            </div>
            <!---------------------------------------->
            <?php  echo form_close()?>
            </div>
    </div>
</div>
</div>
            
            <?php 
           /* echo'<pre>'; 
            print_r($all_data);*/
            
             if(isset($all_data) && !empty($all_data)){ ?>
                <div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
                <table id="example" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="greentd">
                        <th class="text-center">م</th>

                        <th  class="text-center">تاريخ الاتصال </th>
                        <th  class="text-center"> وقت الاتصال </th>
                        <th   class="text-center"> وسيلة الاتصال </th>
                        <th class="text-center">نتيجة المكالمة</th>
                        <th class="text-center">يحتاج زيارة</th>
                         <th class="text-center">تاريخ الزيارة</th>
                          <th class="text-center">وقت الزيارة</th>
                        <th class="text-center"> القائم بالاتصال </th>
                        <th class="text-center">الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){
                    
                    if($record->need_visit == 'yes'){
                      $need_visit = 'نعم';
                      $background = '#98cc7d';
                     
                    }elseif($record->need_visit == 'no'){
                      $need_visit = 'لا';     
                      $background = '#ff9aad';
                    }
                     
                    
                    ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                <td><?php echo $record->contact_date; ?></td>
                <td><?php echo $record->contact_time; ?></td>
                <td><?php echo $record->contact_result_n; ?></td>
                <td><?php echo $record->wasela_etsal_n; ?></td>
<td style="background:<?=$background?>;"><?=$need_visit?></td>
<td style="background:<?=$background?>;"><?=$record->visit_date?></td>
<td style="background:<?=$background?>;"><?=$record->visit_time?></td>
                <td><?php echo $record->emp_name; ?></td>
              
                <td>





<a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/Update/' .$record->id.'/'.$record->mother_national_num	 ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
<a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/delete/' .$record->id .'/'.$record->mother_national_num ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>

</td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                </div>
    </div>
</div>
</div>
            <?php } ?>
            <!-------------------------------------------------------------------------------------->
       
<!----------------------------------------------------------------->

<!---------------------------------------------->



<script>
    function get_types() {
        var x=$('#need_visit').val();
        if(x=='yes')
        {
            $("#display").show();
        }
        else{
            $("#display").hide();
        }
       
        
     
    }
</script>
