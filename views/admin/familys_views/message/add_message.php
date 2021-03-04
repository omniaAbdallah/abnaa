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
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
            <!-------------------------------------------------------------------------------------->
            <?php if(isset($sarf_data)){
                  echo form_open_multipart("family_controllers/message/Message_c/Update/".$sarf_data["id"]);
                  $out["deisabled"]="disabled";
                  if($sarf_data["f2a_search"]!=1)
                  {
                    $disp="none";
                  }
                  else{
                    $disp="";
                  }
                    
                  $out['input']='UPDATE';
                  $out['input_title']='تعديل ';
            }else{
                  echo form_open_multipart("family_controllers/message/Message_c");
                  $disp="";
                  $out["deisabled"]="";
                  $out["deisabled_bank"]="disabled=''";
                  $out["readonly_bank"]="readonly=''";
                  $out['input']='ADD';
                  $out['input_title']='حفظ ';
            }?>
         
           <div class="col-xs-12 no-padding">

           <div class="form-group col-sm-4 col-xs-12 padding-4">
                      <label class="label  " style="">اسم المجموعة</label>
                       <input type="text" style=""   
                       value=" <?php if(isset($sarf_data)){  if(!empty($sarf_data["group_name"])){echo $sarf_data["group_name"];} }?>"
                       id="group_name"  name="group_name" class=" no-padding form-control form-control "  data-validation="required"/>
                </div> 
           
                <div class="col-xs-12 no-padding">

           <div class="form-group col-sm-5 col-xs-12 padding-4">
                    <label class="label label-green "> فئة البحث</label>
                  <div class="radio-content">
                    <input  type="radio"  tabindex="11"   id="member_type1" name="member_type"  
                        <?php if(isset($sarf_data)){  if($sarf_data["f2a_search"]== 1){echo "checked";} }else{echo "checked";}?>
                            onclick="get_types();" class="member_types"  value="1"    >
                    <label for="member_type1" class="radio-label">ملفات موجودة بالجمعية</label>
                  </div>
                  <div class="radio-content">
                    <input  type="radio" tabindex="11"  id="member_type2"  name="member_type"  
                        <?php if(isset($sarf_data)){  if($sarf_data["f2a_search"]== 2){echo "checked";} }?>
                            onclick="get_types();" class="member_types" value="2"   >
                    <label for="member_type2" class="radio-label">ملفات تحتاج لاعادة بحث</label>
                  </div>
                  <div class="radio-content">
                    <input  type="radio" tabindex="11"  id="member_type3"  name="member_type"  
                        <?php if(isset($sarf_data)){  if($sarf_data["f2a_search"]== 3){echo "checked";} }?>
                            onclick="get_types();" class="member_types"  value="3"   >
                    <label for="member_type3" class="radio-label">طلب جديد </label>
                  </div>
            </div>
            
                <div id="display" style="display:<?=$disp?>" >
                                  <div class="form-group  col-sm-2">
    <label class="label "> فئة الاسرة </label>
    <select name="family_cat[]" id="family_cat"  multiple title="يمكنك إختيار أكثر من فئة"
            class="form-control selectpicker"  data-show-subtext="true" data-live-search="true"  aria-required="true" tabindex="-1" aria-hidden="true">
        <option value="">إختر</option>
        <?php $x=1; foreach ($family_category as $row){
            $selected="";
            if(isset($sarf_data)){
             $family_cat= unserialize($sarf_data["family_cat"]);
             foreach($family_cat as $value=>$key)
             {
                if($row->id== $key ){$selected="selected";}
             }
               
            }?>
            <option value="<?=$row->id?>" <?=$selected?>><?=$row->title?></option>
            <?php $x++;} ?>
    </select>
</div>  

<div class="form-group  col-sm-3">
    <label class="label "> حالة الملف </label>
    <select name="file_status[]" id="file_status"  multiple title="يمكنك إختيار أكثر من حالة"
            class="form-control selectpicker"  data-show-subtext="true" data-live-search="true"  aria-required="true" tabindex="-1" aria-hidden="true">
        <option value="">إختر</option>
        <?php $x=1; foreach ($files_status as $row){
            $selected="";
            if(isset($sarf_data)){
                $file_status= unserialize($sarf_data["file_status"]);
                foreach($file_status as $value=>$key)
                {
                   if($row->id== $key ){$selected="selected";}
                }
                // if($row->id== $sarf_data["file_status"] ){$selected="selected";}
            }?>
            <option value="<?=$row->id?>" <?=$selected?>><?=$row->title?></option>
            <?php $x++;} ?>
    </select>
</div>  


    </div>


    
<div class="form-group col-sm-2 padding-4">
            <button type="button" onclick="get_data()" class="btn btn-labeled btn-warning "  id="searcher_but" style="margin-top: 27px;">
                    <span class="btn-label"><i class="fa fa-search" aria-hidden="true"></i></span>بحث
                </button>
    </div>
    </div> 
            <div class="col-xs-12 no-padding" id="option"></div>
            <div class="col-xs-12 no-padding" id="option_table">
               
                <?php  if(isset($sarf_details) && !empty($sarf_details)){?>
                <div class="col-sm-12 no-padding">
                    <table id="" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd">
            <th class="text-center">م</th>
            <?php if($sarf_data["f2a_search"]== 3)
            { ?>
                 <th class="text-center">رقم الطلب</th>
            <?php }else{?>
            <th class="text-center">رقم الملف</th>
            <?php }?>
            <th class="text-center">إسم العائلة </th>
            <th class="text-center">إسم الام </th>
            <th class="text-center">رقم الهوية </th>
            <th class="text-center">الفئة </th>
            <th class="text-center">حالة الملف </th>
            <th class="text-center"> رقم الجوال </th>
        </tr>
                        </thead>
                        <tbody class="text-center" id="tbody_update">
                        <?php  $x=1; foreach ($sarf_details as $row){?>
                            <tr>
                                <td><?=$x++;?></td>
                                <td><?=$row->file_num?></td>
                                <td class="text-center"><?=$row->father_name?> </td>
                <td class="text-center"><?=$row->mother_name?> </td>
                <td class="text-center"><?=$row->mother_national_num?> </td>
                 <td class="text-center">
                    <?php echo (!empty($row->family_cat_name))? $row->family_cat_name : "غير محدد"; ?>
                </td>

                <td class="text-center">
                    <?php echo (!empty($row->process_title))? $row->process_title : "غير محدد"; ?>
                </td>

                <td class="text-center">
                    <?php echo (!empty($row->contact_mob))? $row->contact_mob : "غير محدد"; ?>
                </td>
                            </tr>
                        <?php  }?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
            <!---------------------------------------->
            <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
            <br>
                <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success  btn-labeled" id="submit_but" disabled="">
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

                        <th  class="text-center">اسم  المجموعة </th>
                        <th  class="text-center"> تاريخ انشاء المجموعة  </th>
                        <th   class="text-center"> منشئ المجموعة </th>
                        <th class="text-center"> وقت انشاء المجموعة</th>
                        <th class="text-center">الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){ ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                <td><?php echo $record->group_name; ?></td>
                <td><?php echo $record->date_ar; ?></td>
                <td><?php echo $record->publisher_name; ?></td>
                <td><?php echo $record->time; ?></td>
                <td>
             
<a data-toggle="modal" data-target="#modal-sm-data" onclick="get_details(<?=$record->id?>,<?=$record->f2a_search?>);"
class="btn btn-xs btn-primary" title="التفاصيل" style="padding: 1px 6px;"> <i class="fa fa-list"></i>  </a>




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
        window.location="<?= base_url() . 'family_controllers/message/Message_c/Update/' .$record->id ?>";
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
        setTimeout(function(){window.location="<?= base_url() . 'family_controllers/message/Message_c/delete/' .$record->id ?>";}, 500);
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

        <div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success modal-lg " role="document" style="width:95%;">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                             <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">تفاصيل  </h3>
                    </div>
                    <div class="modal-body ">
                     <div id="option_details">
                     </div>
                    </div>
                    <div class="modal-footer " style="display: inline-block; width: 100%;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
       



<!---------------------------------------------------------->
<script>
    function get_details(id,member_type){
        var dataString =  "id=" +id + "&member_type=" +member_type;
         $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/message/Message_c/LoadPage_details',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option_details").html(html);
            }
        });
    }
    //---------------------------------------------------
  
</script>
<script>
    function get_data() {
    
        var member_type = 0;
        var len2= $('.info2').length;
      
        var cbs_member = document.getElementsByClassName("member_types");
        for (var i = 0; i < cbs_member.length; i++) {
            if (cbs_member[i].type == 'radio') {
                if (cbs_member[i].checked == true) {
                    member_type = cbs_member[i].value;
                }
            }// end if check
        } // end for
        //-----------------------------------------------
  
        var family_cat=$('#family_cat').val();
        var file_status=$('#file_status').val();
        var basicdataString = 'member_type=' + member_type +  "&family_cat="+family_cat+  "&file_status="+file_status;
        if (member_type != "" && member_type !="0" ){
      
           
           
                var dataString = basicdataString ;
               
                send_ajax_data(dataString);
                
            
         
        } else{
            $("#option_table").html("");
          alert("تأكد من إدخال جميع البيانات ");
         }
         
    }
    //========================================
    function send_ajax_data(dataString) {
        // alert(dataString);
        $("#option_table").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/message/Message_c/LoadPage',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option_table").html(html);
                $('#submit_but').removeAttr("disabled"); //submit_but

            }
        });
        return false;
    }
    //========================================
   
</script>
<script>
    function get_types() {
        var member_type=0;
        //-----------------------------------------------
       
        //-----------------------------------------------
        var cbs_member = document.getElementsByClassName("member_types");
        for(var i=0; i < cbs_member.length; i++) {
            if(cbs_member[i].type == 'radio') {
                if(cbs_member[i].checked == true){
                    member_type =cbs_member[i].value;
                }
            }// end if check
        } // end for
        //-----------------------------------------------
        $("#option_table").html("");
        if(member_type !=1)
        {
            $("#display").hide();
        }
        else{
            $("#display").show();
        }
        
     
    }
</script>
