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
                  echo form_open_multipart("family_controllers/message/Message_c/Update_send_message_osr/".$sarf_data["id"]);
                  $out["deisabled"]="disabled";
                  if($sarf_data["f2a_search"]!=1)
                  {
                    $disp="none";
                    $search="";
                  }
                  else{
                    $disp="";
                    $search="none";
                  }
                    $required="";
                  $out['input']='UPDATE';
                  $out['input_title']='تعديل ';
            }else{
                  echo form_open_multipart("family_controllers/message/Message_c/send_message_osr");
                  $disp="";
                  $search="none";
                  $out["deisabled"]="";
                  $out["deisabled_bank"]="disabled=''";
                  $out["readonly_bank"]="readonly=''";
                  $out['input']='ADD';
                  $required='required';
                  $out['input_title']='حفظ ';
            }?>
         
           <div class="col-xs-12 no-padding">

           <div class="form-group col-sm-3 col-xs-12 ">
                      <label class="label  " style="">تاريخ الرسالة</label>
                       <input type="date"   
                       value="<?php if(isset($sarf_data)){  if(!empty($sarf_data["message_date"])){echo $sarf_data["message_date"];} }else{echo date("Y-m-d");}?>"
                       id="message_date"  name="message_date" class=" form-control "  data-validation="required"/>
                </div> 
           
           

           <div class="form-group col-sm-3 col-xs-12 ">
                    <label class="label label-green "> فئة البحث</label>
                  <div class="radio-content">
                    <input  type="radio"  tabindex="11"   id="member_type1" name="member_type"  
                        <?php if(isset($sarf_data)){  if($sarf_data["f2a_search"]== 1){echo "checked";} }else{echo "checked";}?>
                            onclick="get_types();" class="member_types"  value="1"    >
                    <label for="member_type1" class="radio-label">مجموعات</label>
                  </div>
                  <div class="radio-content">
                    <input  type="radio" tabindex="11"  id="member_type2"  name="member_type"  
                        <?php if(isset($sarf_data)){  if($sarf_data["f2a_search"]== 2){echo "checked";} }?>
                            onclick="get_types();" class="member_types" value="2"   >
                    <label for="member_type2" class="radio-label">تخصيص اسرة</label>
                  </div>
                 
            </div>
            
                <div id="display" style="display:<?=$disp?>" >
                                  <div class="form-group  col-sm-4">
    <label class="label "> مجموعات الاسر </label>
    <select name="family_group" id="family_group" 
    data-validation="<?=$required?>"
            class="form-control "  >
        <option value="">إختر</option>
        <?php $x=1; foreach ($groups as $row){
            $selected="";
            if(isset($sarf_data)){
            
             
                if($sarf_data["family_group"]== $row->id ){$selected="selected";}
             
               
            }?>
            <option value="<?=$row->id?>" <?=$selected?>><?=$row->group_name?></option>
            <?php $x++;} ?>
    </select>
</div>  
</div>



<div class="form-group col-sm-2 " id="search_osra" style="display:<?=$search?>">
            <button type="button" onclick="get_data()" class="btn btn-labeled btn-warning "  id="searcher_but" style="margin-top: 27px;">
                    <span class="btn-label"><i class="fa fa-search" aria-hidden="true"></i></span>بحث
                </button>
</div>

<div class="col-xs-12 no-padding" id="option"></div>
            <div class="col-xs-12 no-padding" id="option_table">
          <br>
                <?php  if(isset($sarf_details) && !empty($sarf_details)){?>
                    <?php if($sarf_data["f2a_search"]== 2)
            { ?>
                <div class="col-xs-12 no-padding">
                    <table id="" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd">
            <th class="text-center">م</th>
           
                 
      
            <th class="text-center">رقم الملف</th>
           
            <th class="text-center">إسم العائلة </th>
            <th class="text-center">إسم الام </th>
            <th class="text-center">رقم الهوية </th>
           
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
                    <?php echo (!empty($row->contact_mob))? $row->contact_mob : "غير محدد"; ?>
                </td>
                            </tr>
                        <?php  }?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
                <?php }?>
            </div>
<div class="col-xs-12 no-padding" >
<label class="label " >  نص الرسالة </label>
<textarea  name="message" id="message" 
maxlength="255"
rows="4"
   class="form-control "  data-validation="required">
   <?php if(isset($sarf_data)){  if(!empty($sarf_data["message"])){echo $sarf_data["message"];} }?>
</textarea>
<span style="float: left;">اقصي عدد حروف 255</span>
</div>

    </div>

   
          
            <!---------------------------------------->
            <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
            <br>
                <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success  btn-labeled" id="submit_but" >
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

                        <th  class="text-center">  رقم الرسالة </th>
                        <th  class="text-center"> تاريخ  الرسالة  </th>
                        <th  class="text-center"> وقت  الرسالة  </th>
                        <th   class="text-center">  الفئة   </th>
                        <th  class="text-center">   القائم بالارسال  </th>
                  <th>
                  التفاصيل
                  </th>
                        <th class="text-center">الاجراء</th>
                        <th class="text-center">أرسال</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){ ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                <td><?php echo $record->message_rkm; ?></td>
                <td><?php echo $record->message_date; ?></td>
                <td><?php echo $record->time; ?></td>
                <td>
                
                <?php if($record->f2a_search==1)
                {
                    echo 'مجموعة ';
                }
                else if($record->f2a_search==2)
                {
                    echo 'اسر ';

                }?>
                </td>
                <td><?php echo $record->publisher_name; ?></td>
                <td>
             
<a data-toggle="modal" data-target="#modal-sm-data" onclick="get_details(<?=$record->id?>,<?=$record->f2a_search?>);"
class="btn btn-xs btn-primary" title="التفاصيل" style="padding: 1px 6px;"> <i class="fa fa-list"></i> التفاصيل </a>

</td>
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
        window.location="<?= base_url() . 'family_controllers/message/Message_c/Update_send_message_osr/' .$record->id ?>";
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
        setTimeout(function(){window.location="<?= base_url() . 'family_controllers/message/Message_c/delete_message/' .$record->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>

</td>
<td>
<?php if($record->send_message==0){?>
<a onclick="send_message(<?=$record->id?>);"
id="send_message"
class="btn btn-xs btn-warning">
<i class="fa fa-envelope" aria-hidden="true"></i>
</a>
<?php }else{?>
    <a 
class="btn btn-xs btn-success">
<i class="fa fa-envelope" aria-hidden="true"></i>
<?php }?>
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
            url: '<?php echo base_url() ?>family_controllers/message/Message_c/LoadPage_details_message',
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
  
        // var family_cat=$('#family_cat').val();
        // var file_status=$('#file_status').val();
        var basicdataString = 'member_type=' + member_type ;
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
            url: '<?php echo base_url() ?>family_controllers/message/Message_c/LoadPage_send_message',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option_table").html(html);
               

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
            $("#search_osra").show();
            document.getElementById("submit_but").setAttribute("disabled", "disabled");
            document.getElementById("family_group").removeAttribute("data-validation", "required");
        }
        else{
            $("#display").show();
            document.getElementById("submit_but").removeAttribute("disabled", "disabled");
            document.getElementById("family_group").setAttribute("data-validation", "required");
            $("#search_osra").hide();
        }
        
     
    }
    function Get_emp_Name(file_num) {
        var checkBox = document.getElementById("myCheck" + file_num);
        if (checkBox.checked == true) {
            $('#message_date').append("<input type='hidden' id='file_num" + file_num + "'  name='file_num[]' value='" + file_num + "'/>" );
          
           
            document.getElementById("submit_but").removeAttribute("disabled", "disabled");
        } else {
            $("#file_num" + file_num).remove();
        }
    }
</script>
<!-- send_message -->
<script>
 //========================================
 function send_message(id) {
        
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/message/Message_c/send_message',
            data:{id:id},
            dataType: 'html',
            cache:false,
            success: function(html){
               
                $('#send_message').removeClass('btn-warning');
                $('#send_message').addClass('btn-success');



            }
        });
        return false;
    }
</script>