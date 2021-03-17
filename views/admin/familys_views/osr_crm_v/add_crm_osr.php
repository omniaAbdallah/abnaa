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
            /*$this->load->model("familys_models/Register");
            $data_load["basic_data_family"] = $basic_data_family;
            $data_load["mother_num"] = $mother_national_num;
            $data_load["person_account"] = $basic_data_family["person_account"];
            $data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
            $data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
            $data_load["file_num"] = $basic_data_family["file_num"];
           $data_load["employees"] = $employees;
            $this->load->view('admin/familys_views/drop_down_bahth', $data_load); */
             /*   $data_load["basic_data_family"] = $basic_data_family;
    $data_load["mother_num"] = $mother_national_num;
    $data_load["file_num"] = $basic_data_family["file_num"];
    $this->load->view('admin/familys_views/drop_down_bahth', $data_load); */ ?>
    
        <?php
    $data_load["basic_data_family"] = $basic_data_family;
    $data_load["mother_num"] = $mother_national_num;
    $data_load["file_num"] = $basic_data_family["file_num"];
    $this->load->view('admin/familys_views/drop_down_bahth', $data_load); ?>
     
<div class="col-xs-12 no-padding disabled" id="osr_connect_div">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
            <!-------------------------------------------------------------------------------------->
            <?php if(isset($crm_data)){
                  echo form_open_multipart("family_controllers/osr_crm/Osr_crm_c/Update_crm_osr/".$crm_data["id"].'/'.$crm_data["mother_national_num"]);
                  $out["deisabled"]="disabled";
                 
                    
                  $out['input']='UPDATE';
                  $out['input_title']='تعديل ';
            }else{
                  echo form_open_multipart("family_controllers/osr_crm/Osr_crm_c/add_crm_osr/".$mother_national_num);
                  $disp="none";
                  $out["deisabled"]="";
                  $out["deisabled_bank"]="disabled=''";
                  $out["readonly_bank"]="readonly=''";
                  $out['input']='ADD';
                  $out['input_title']='حفظ ';
            }?>
         
           <div class="col-xs-8 no-padding">

           <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> تاريخ التواصل</label>
                       <input type="date"
                      readonly
                       value="<?php if(isset($crm_data["contact_date"])){  if(!empty($crm_data["contact_date"])){echo $crm_data["contact_date"];} }else{echo date('Y-m-d');}?>"
                       id="contact_date"  name="contact_date" class=" form-control "  />
                       <input type="hidden" value="<?=$mother_national_num?>" name="mother_national_num"/>
                </div> 
           
                <!-- <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> وقت التواصل</label>
                       <input type="time"
                       readonly
                       value="<?php if(isset($crm_data["contact_time"])){  if(!empty($crm_data["contact_time"])){echo $crm_data["contact_time"];} }else{echo date('H:i');}?>"
                       id="contact_time"  name="contact_time" class=" form-control "  />
                </div>  -->

          
              
                                  <div class="form-group  col-sm-4 padding-4">
    <label class="label ">  وسيلة التواصل </label>
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

 


<div class="form-group  col-sm-3 padding-4">
    <label class="label ">    الغرض من التواصل </label>
    <select name="purpose_etsal" id="purpose_etsal"   data-validation="required "
            class="form-control "  >
        <option value="">إختر</option>
        <?php foreach ($purpose_etsal as $row){
            $selected="";
            if(isset($crm_data)){
             
                if($crm_data['purpose_etsal']== $row->conf_id ){$selected="selected";}
             
               
            }?>
            <option value="<?=$row->conf_id?>" <?=$selected?>><?=$row->title?></option>
            <?php } ?>
    </select>
</div>  

<div class="form-group  col-sm-3 padding-4">
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
<div class="form-group  col-sm-12 padding-4">
    <label class="label ">       نتيجة التواصل </label>
  

            <textarea class="editor1"
                              data-validation="required"
                              id="editor1" name="visit_result" rows="2" style=""><?php if(isset($crm_data["details"])){  if(!empty($crm_data["details"])){echo $crm_data["details"];} }?></textarea>
       
</div>  








    
</div>

<div class="col-md-4 form-group" id="Details">
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
            
            <?php  if(isset($all_data) && !empty($all_data)){ ?>
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

                        <th  class="text-center">تاريخ التواصل </th>
                        <th  class="text-center"> وقت التواصل </th>
                        <th class="text-center"> القائم بالتواصل </th>
                        <th   class="text-center"> وسيلة التواصل </th>
                        <th class="text-center">نتيجة المكالمة</th>
                        <th class="text-center">الغرض من التواصل </th>
                      
                        <th class="text-center">الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){ ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                <td><?php echo $record->contact_date; ?></td>
                <td><?php echo $record->contact_time; ?></td>
                <td><?php echo $record->emp_name; ?></td>
                
                <td><?php
                 if(isset($record->method_etsal_name)&&!empty($record->method_etsal_name))
                 {
                echo $record->method_etsal_name  ;
            }?>
         </td>
         <td><?php
          if(isset($record->natega_etsal_name)&&!empty($record->natega_etsal_name))
          {
         echo $record->natega_etsal_name ;
        } ?>
         </td>
              
         <td>
         
         <?php 
         if(isset($record->purpose_etsal_name)&&!empty($record->purpose_etsal_name))
         {
         echo $record->purpose_etsal_name ;
         }?>
         </td>
                <td>





                <a href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/Update_crm_osr/' . $record->id .'/'.$record->mother_national_num?>" class="btn btn-warning"><i class="fa fa-pencil"></i>تعديل</a>
        <a href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/delete_crm_osr/' . $record->id .'/'.$record->mother_national_num?>" onclick="return confirm(\'Are You Sure To Delete? \')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف </a>

    <a  data-toggle="modal" data-target="#myModal_details"
                        onclick="getDetails_crm(<?= $record->id ?>)" data-backdrop="static" data-keyboard="false"  class="btn btn-purple"><i class="fa fa-list"></i>تفاصيل</a>
     

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






<div class="modal fade" id="myModal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> تفاصيل </h4>
            </div>
            <div class="modal-body" id="details_table">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getDetails_crm(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_c/getDetails_crm',
                data: dataString,
                dataType: 'html',
                cache: false,
               beforeSend: function () {
                $('#details_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
                success: function (html) {
                    $("#details_table").html(html);
                }
            });
        }
    }
</script>


<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>
<script type="text/javascript">
    CKEDITOR.replace('editor1');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>