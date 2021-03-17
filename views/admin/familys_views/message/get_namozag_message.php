



<label class="label " >  نص الرسالة </label>
<textarea name="message" id="message" 
rows="4"
class="form-control "  data-validation="required"
 onKeyDown="limitText(this.form.message,this.form.countdown,255);" 
onKeyUp="limitText(this.form.message,this.form.countdown,255);">
<?php if(!empty($reason->namozeg_details)){  if(!empty($reason->namozeg_details)){echo $reason->namozeg_details;} }?>
</textarea><br>
<br>
<font style="float: left;" size="2">(اقصي عدد حروف: 255)<br>
 <input  readonly
  type="text" name="countdown" size="3" value=""> الحروف المتبقية .</font>
  

