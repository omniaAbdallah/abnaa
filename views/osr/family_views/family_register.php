<div class="sidebar-quick-links-fixed hidden-xs">
    <a href="javascript:void(0);" class="side-btn">تسجيل الدخول</a>
    <ul>
        <li>
            <a href="#">
                <i class="fa fa-home"></i>
                <span>دخول الموظفين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-users"></i>
                <span>دخول مستفيدين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول متعفف </span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-money"></i>
                <span>دخول  متبرع</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول  كفيل</span>
            </a>
        </li>

    </ul>
</div>
<!-- Sidebar Quick Links -->


<div class="social-sidebar hidden-xs" dir="ltr">
    <ul>
        <li class="facebook">
            <a href="#" target="_blank">
                <i class="fa fa-facebook"></i>
                <span>تابعنا على فيسبوك</span>
            </a>
        </li>
        <li class="twitter">
            <a href="#" target="_blank">
                <i class="fa fa-twitter"></i>
                <span>تابعنا على تويتر</span>
            </a>
        </li>
        <li class="instagram">
            <a href="#" target="_blank">
                <i class="fa fa-instagram"></i>
                <span>تابعنا على انستجرام</span>
            </a>
        </li>
        <li class="youtube">
            <a href="#" target="_blank">
                <i class="fa fa-youtube-play"></i>
                <span>تابعنا على يوتيوب</span>
            </a>
        </li>
        <li class="snapchat">
            <a href="#" target="_blank">
                <i class="fa fa-snapchat-ghost"></i>
                <span>تابعنا على سناب شات</span>
            </a>
        </li>
    </ul>
</div>

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>web">الرئيسية</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_register">خدمات أسرة</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_register">تسجيل أسرة</a></li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container">
       <div class="family_register pbottom-30">
           <div class="col-md-4 col-sm-4 col-xs-6">
               <a href="#" class="md-trigger" data-modal="modal-1">
                   <div class="box-register">
                       <img src="<?=base_url().'asisst/web_asset/'?>img/tc-icon.png">
                       <h5>شروط تسجيل المستفيدين</h5>
                   </div>
               </a>
           </div>
           <div class="col-md-4 col-sm-4 col-xs-6">
               <a href="#" class="md-trigger" data-modal="modal-2">
                   <div class="box-register">
                       <img src="<?=base_url().'asisst/web_asset/'?>img/User-Files-icon.png">
                       <h5>المستندات المطلوبة عند تقديم الطلب</h5>
                   </div>
               </a>
           </div>
           <div class="col-md-4 col-sm-4 col-xs-6">
               <a href="#"  class="md-trigger" data-modal="modal-3">
                   <div class="box-register">
                       <img src="<?=base_url().'asisst/web_asset/'?>img/curriculum-support.png">
                       <h5>المستندات المطلوبة عند قبول الطلب للإعتماد </h5>
                   </div>
               </a>
           </div>
       </div>

       

       <div class="col-xs-12 no-padding">
        <div >
            <?php
            echo form_open_multipart('registration/Family/family_register');
            ?>
          <div class="well">
             <div class="col-sm-12 form-group no-padding">
                <div class="col-sm-6 col-md-2 padding-4">
                    <label class="label label-green  ">رقم السجل المدنى للأب </label>
                    <input type="text" name="father_national_num" maxlength="10"
                           onkeypress="validate(event);check_length_num(this,10,'father_span_num');"
                           value="<?php if(isset($result)){ echo $result["father_national_num"];} ?>"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="father_span_num" style="color: red;"></span>
                </div>
                <div class="col-sm-6  col-md-4 padding-4 ">
                    <label class="label label-green  ">إسم الأب رباعي  </label>
                    <input  type="text" name="full_name" class="form-control  input-style" placeholder="أدخل البيانات"
                    value=""   data-validation="required">
                </div>
                
            </div>
            <div class="col-sm-12 form-group no-padding">
            <div class=" col-sm-6  col-md-4 padding-4">
                    <label class="label label-green  col_md_32">إسم الام  رباعى  </label>
                    <input type="text" name="full_name_order"  id="full_name_order" 
                    value=""
                    class="form-control col_md_68 input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            <div class="col-sm-6 col-md-2 padding-4">
                    <label class="label label-green  ">نوع هوية الأم </label>
                    <select name="national_id_type"
                            class="selectpicker no-padding form-control choose-date form-control two_three"
                            data-show-subtext="true" data-live-search="true" data-validation="required" onchange="GetNationalidType(this.value)"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($national_id_array as $row2):
                            $selected = '';
                            if ($row2->id_setting == $result['national_id_type_mother']) {
                                $selected = 'selected';
                            } ?>
                            <option
                                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> >
                                <?php echo $row2->title_setting; ?></option>
                        <?php endforeach;?>
                        <option value="0"<?php if(!empty($result)){
                            if($result['national_id_type'] ==0){
                                echo'selected';
                            }
                        }?> >أخري</option>
                    </select>
                
                </div>
                <div class="col-sm-6 col-md-2 padding-4">
                    <label class="label label-green  ">رقم هوية الأم</label>
                    <input type="text"  name="mother_national_num"  id="mother_national_num"  maxlength="10" onkeypress="validate(event);"
                    value=""
                    disabled="disabled"
                    id="mother_national_num" onkeyup=""
                    class="form-control  input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="result_span_num" style="color: red;"></span>
                </div>
                <div class="col-sm-6 col-md-2 padding-4">
                    <label class="label label-green  ">الحالة الإجتماعية</label>
                    <select  name="marital_status_id_fk"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control two_three"
                             data-show-subtext="true" data-live-search="true"   aria-required="true" >
                        <option value="">اختر</option>
                        <?php foreach ($marital_status_array as $row6):
                            $selected='';if($row6->id_setting==$result['marital_status_id_fk_mother']){$selected='selected';}   ?>
                            <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                
               
            </div>
           
                <div class="col-sm-12 form-group  no-padding" >
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> جوال التواصل ( الرسائل)    </label>
                    <input type="text" maxlength="11" name="contact_mob"  value=""
                    onkeypress="validate(event);" 
                    onkeyup="check_length_mob(this,11,'span_phone');" 
                  
                    class="form-control  input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="span_phone" style="color: red;"></span>
                </div>
                </div>
            <div class="col-sm-12 form-group  no-padding" >


                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> المدينة  </label>
                    <select class="form-control  selectpicker"  name="center_id_fk" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" onchange="get_sub_select(this.value,'center_option');">
                        <option value="">اختر</option>
                        <?php    if(isset($all_city) && !empty($all_city)){
                            foreach ($all_city as $row_city):
                                $selected = '';
                                if (isset($result)) {
                                    if ($row_city->id == $result['center_id_fk']) {
                                        $selected = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                    <?php echo $row_city->title ?></option>
                            <?php endforeach ;}?>
                    </select>
                </div>
               
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> الحي  </label>

                    <select name="district_id_fk" class="form-control  " onchange="GetF2a()" id="center_option" name="" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-2 padding-4" id="hai_name" style="display:none;">
                    
                </div>
                <div class=" col-sm-6  col-md-1 padding-4">
                    <label class="label label-green  ">عدد الذكور
                    </label>
                    <input type="text" name="male_number" id="male_number" onkeypress="validate(event)"
                    data-validation="required" onkeyup="getFamilyNumber();" value=""
                           class="form-control  input-style"/>
                </div>
                <div class=" col-sm-6  col-md-1 padding-4">
                    <label class="label label-green  ">عدد الإناث
                    </label>
                    <input type="text" name="female_number" id="female_number" onkeypress="validate(event)"
                    data-validation="required" onkeyup="getFamilyNumber();" value="" class="form-control  input-style"/>
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">اجمالي عدد الأفراد
                    </label>
                    <input type="text" name="family_members_number" id="family_members_number"
                    onkeypress="validate(event)" data-validation="required" readonly
                    value="" class="form-control  input-style"/>
                </div>
               

            </div>


            

           

            

            <div class="form-group col-sm-4">
                <h5>
                <input tabindex="11" type="radio" id="square-radio-1" class="large-radio">
                <label for="square-checkbox-1">أوافق على الاقرار</label>
                </h5>
            </div>
            <div class="col-xs-12 text-center">
                <button  type="submit" id="button" name="ADD" value="ADD"  class="btn btn-success " style="font-size: 16px;width: 150px;">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>




            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div><!-- col-xs-12 -->

</div>
</section>




<!-- Modal newspaper effects -->
<div class="md-modal md-effect-4" id="modal-1" data-modal="modal-1">
 <div class="md-content">
     <h3>الشروط المطلوبة</h3>
     <div class="n-modal-body green" style="min-height: 300px">
       <h5 class="title-h5">شروط وإجراءات تسجيل المستفيدين:</h5>
         <?php
         if (isset($cond) && !empty($cond)){
             ?>
         <ol>
         <?php
             foreach ($cond as $cond ){
                 ?>
                 <li>
                     <?php

                        echo $cond->title;

                     ?>
                 </li>

             <?php

             }

         ?>

       </ol>
         <?php
         }
         ?>


   </div>
   <div class="modal-footer">
    <button class="btn btn-add btn-success ">طباعة</button>

    <button class="btn btn-add btn-danger md-close">أغلق!</button>
</div>
</div>
</div>

<!-- Modal newspaper effects -->
<div class="md-modal md-effect-4" id="modal-2" data-modal="modal-2">
 <div class="md-content">
     <h3>المستندات الأولية المطلوبة</h3>
     <div class="n-modal-body green" style="min-height: 300px">
       <h5 class="title-h5">المستندات الأولية عند تقديم الطلب</h5>
         <?php
         if (isset($file) && !empty($file)){
             ?>
             <ol>
                 <?php
                 foreach ($file as $file ){
                     ?>
                     <li>
                         <?php

                             echo $file->title;

                         ?>
                     </li>

                     <?php

                 }

                 ?>

             </ol>
             <?php
         }
         ?>
   </div>
   <div class="modal-footer">
    <button class="btn btn-add btn-success ">طباعة</button>

    <button class="btn btn-add btn-danger md-close">أغلق!</button>
</div>
</div>
</div>

<!-- Modal newspaper effects -->
<div class="md-modal md-effect-4" id="modal-3" data-modal="modal-3">
 <div class="md-content">
     <h3>المستندات التالية المطلوبة </h3>
     <div class="n-modal-body green" style="min-height: 300px">
       <h5 class="title-h5">عند قبول الطلب لإعتماد تسجيلها</h5>
         <?php
         if (isset($accept) && !empty($accept)){
             ?>
             <ol>
                 <?php
                 foreach ($accept as $accept ){
                     ?>
                     <li>
                         <?php

                         echo $accept->title;

                         ?>
                     </li>

                     <?php

                 }

                 ?>

             </ol>
             <?php
         }
         ?>

   </div>
   <div class="modal-footer">
    <button class="btn btn-add btn-success ">طباعة</button>

    <button class="btn btn-add btn-danger md-close">أغلق!</button>
</div>
</div>
</div>
<div class="md-overlay"></div>





<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>





<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>







<!-------------------------------------------------->




<!-- display mother data -->





<script>
    function check_num(){
        var national_id_type =$('#national_id_type').val();
        var dataString =  "chek_mother_national_num=" + $("#mother_national_num").val();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>registration/Family/CheckNationalNum',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                if(html == "1"){
                    $("#mother_national_num").css("border-color" , "red");
                    $("#result_span_num").html("رقم السجل مسجل من قبل ");
                    $('button[type="submit"]').attr("disabled","disabled");
                }else {
                    //---------------
                    if($("#mother_national_num").val().length != 10   ){
                        $("#mother_national_num").css("border-color" , "red");
                        if(national_id_type !=0){
                            $("#result_span_num").html("الرقم مكون من"  +10+"أرقام" );
                        }
                        $('button[type="submit"]').attr("disabled","disabled");
                    }else{
                        $("#mother_national_num").css("border-color" , "green");
                        $("#result_span_num").html("");
                        $('button[type="submit"]').removeAttr("disabled");
                    }
                    //---------------
                }
            }
        });
    }
</script>
<script>
    function check_length_num(this_input,max_lenth,span_id) {
        if($(this_input).val().length != max_lenth   ){
            $(this_input).css("border-color" , "red");
            $("#"+span_id).html("الرقم مكون من"  +max_lenth+"أرقام" );
            $('button[type="submit"]').attr("disabled","disabled");
        }else{
            $(this_input).css("border-color" , "green");
            $("#"+span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>


<script>
    function getFamilyNumber() {
        if ($('#male_number').val() > 0) {
            var males = parseInt($('#male_number').val());
        } else {
            var males = 0;
        }
        if ($('#female_number').val() > 0) {
            var females = parseInt($('#female_number').val());
        } else {
            var females = 0;
        }
        var all = males + females;
        $('#family_members_number').val(all);
    }
</script>
<script>
    function getRent() {
        var building_type = $("#building_type").val();
        if (building_type === 'rent') {
            document.getElementById("h_rent_amount").removeAttribute("disabled", "disabled");
            document.getElementById("h_rent_amount").setAttribute("data-validation", "required");
        } else {
            document.getElementById("h_rent_amount").value = "";
            document.getElementById("h_rent_amount").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function get_sub_select(this_value,sub_id){
        if(this_value !="" && this_value!=0){
            var dataString =  "get_sub_id=" + this_value;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>registration/Family/GetArea',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#"+sub_id).html(html);
                    $("#"+sub_id).selectpicker("refresh");
                }
            });
        }
    }
</script>
<script>
    function get_num_fk(pass_value){
        var option_name=$("#person_relationship option:selected").text();
        if(pass_value =="41"){
            $("#person_national_card").val($("#mother_national_num").val());
        }else if(option_name == "أم"){
            $("#person_national_card").val($("#mother_national_num").val());
        }else{
            $("#person_national_card").val("");
        }
    }
</script>
<script>
    function GetNationalidType(national_type) {
        if( national_type !=''){
            document.getElementById("mother_national_num").removeAttribute("disabled","disabled");
            if( national_type === '0'){
                document.getElementById("mother_national_num").removeAttribute("maxlength");
                document.getElementById("mother_national_num").setAttribute("onkeyup", "check_num();");
                document.getElementById("result_span_num").html("");
            } else {
                document.getElementById("mother_national_num").setAttribute("maxlength", "10");
                document.getElementById("mother_national_num").setAttribute("onkeyup", "check_num();check_length_num(this,10,'result_span_num');");
            }
        } else {
            document.getElementById("mother_national_num").setAttribute("disabled","disabled");
        }
    }
</script>


<script>
    function check_length_num(this_input, max_lenth) {
        if ($("member_card_num_span").val().length != max_lenth) {
            $("member_card_num_span").css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled", "disabled");
        } else {
            $("member_card_num_span").css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function deleteRow(id){
        $("#" + id).remove();
        var x = document.getElementById('resultTable');
        len = x.rows.length;
        if(len == 0){
            $("#resultTable").html('<tr><td colspan="9" style="text-align: center;color: red"> لا يوجد أبناء  </td> </tr>');
        }

    }




</script>





<!-- yaraa -->
<script>
function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
<script>
function GetF2a() {
    console.log($('#center_option').val());
    if ($('#center_option').val() == 90) {
     
       $('#hai_name').show();
        $('#hai_name').append("<label id='hai_label' class='label label-green'> اسم الحي  </label><input type='text' class='form-control  '  data-validation='required' id='hai_id_fk' name='hai_name' />");
    }else
    {
        $('#hai_name').hide();
        $('#hai_id_fk').remove();
        $('#hai_label').remove();
    }
 
}
</script>
<script>
    function check_length_mob(this_input,max_lenth,span_id) {
        if($(this_input).val().length==1)
        {
            if($(this_input).val() != 0 )
        {
            $(this_input).css("border-color" , "red");
            $("#"+span_id).html("الرقم مبتدأ ب صفر" );
            $(this_input).val("");

        }

        }
        else if($(this_input).val().length != max_lenth   ){
            $(this_input).css("border-color" , "red");
            $("#"+span_id).html("الرقم مكون من"  +max_lenth+"أرقام" );
            $('button[type="submit"]').attr("disabled","disabled");
        }
        else{
            $(this_input).css("border-color" , "green");
            $("#"+span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>