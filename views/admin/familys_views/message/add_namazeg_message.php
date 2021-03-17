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
                  echo form_open_multipart("family_controllers/message/Message_c/Update_namazeg_message/".$sarf_data["id"]);
                  $out["deisabled"]="disabled";
                 
                    $required="";
                  $out['input']='UPDATE';
                  $out['input_title']='تعديل ';
            }else{
                  echo form_open_multipart("family_controllers/message/Message_c/add_namazeg_message");
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
                      <label class="label  " style=""> عنوان النموذج</label>
                       <input type="text"   
                       value="<?php if(isset($sarf_data)){  if(!empty($sarf_data["namozeg_name"])){echo $sarf_data["namozeg_name"];} }?>"
                       id="namozeg_name"  name="namozeg_name" class=" form-control "  data-validation="required"/>
            </div> 
          
               
</div>


<div class="col-xs-12 no-padding" >
<label class="label " >  نص الرسالة </label>
<textarea class="form-control"
rows="4"
                              data-validation="required"
                              onKeyDown="limitText(this.form.namozeg_details,this.form.countdown,255);" 
onKeyUp="limitText(this.form.namozeg_details,this.form.countdown,255);"
                              id="namozeg_details" name="namozeg_details" style=""><?php if(isset($sarf_data)){  if(!empty($sarf_data["namozeg_details"])){echo $sarf_data["namozeg_details"];} }?></textarea>
                              <br>
                              <font style="float: left;" size="2">(اقصي عدد حروف: 255)<br>
 <input  readonly
  type="text" name="countdown" size="3" value="255"> الحروف المتبقية .</font>



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
                        <th class="text-center">عنوان النموذج</th>
                        <th class="text-center">الاجراء</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){ ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                <td><?php echo $record->namozeg_name; ?></td>
               
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
        window.location="<?= base_url() . 'family_controllers/message/Message_c/Update_namazeg_message/' .$record->id ?>";
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
        setTimeout(function(){window.location="<?= base_url() . 'family_controllers/message/Message_c/public function delete_namazeg_message($id)
/' .$record->id ?>";}, 500);
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
      
<!---------------------------------------------------------->
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>

